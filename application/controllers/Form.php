<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Form extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('Auth/Admin');
        }
    }

    public function index(){

        $this->load->model('M_form');
        $data['title'] = 'Form Acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['form'] = $this->M_form->duplikatForm()->result_array();

        $this->load->view('admin/form/formacara',$data);
    }


    public function tampilform()
    {
        $this->load->model('M_acara');
        $data['title'] = 'Form Acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['form'] = $this->db->get_where('form',['acara_form' => $this->uri->segment(3)])->result_array();
        $data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $this->uri->segment(3)])->row();

        $this->load->view('admin/acara/detailform',$data);
    }

    public function tambahformAct()
    {
        $this->load->model('Waapi');
        $data = [
           'nama_form' => $this->input->post('nama'),
           'nomor_form' => $this->input->post('nomor', true),
           'kelamin_form' => $this->input->post('kelamin'),
           'acara_form' => $this->input->post('acara'),
       ];

       $this->db->insert('form', $data);
       $this->Waapi->kirimWablas($this->input->post('nomor'), "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$this->input->post('nama').' Terima Kasih Anda Sudah Mendaftar Event '. $this->input->post('judul'));
       redirect('user/detailacara/'. $this->input->post('slug'));

   }


   public function deleteform($id)
   {
    $this->load->model('M_form');
    $data['slidefoto'] = $this->M_form->formWhere(['id_form' => $this->uri->segment(3)])->row_array();
    $where = array('id_form' => $id);
    $this->M_form->delete_form($where, 'form');
    $this->session->set_flashdata('user-delete', 'berhasil');
    redirect($_SERVER['HTTP_REFERER']);
}



public function reminder()
{
    $this->load->model('M_form');
    $this->load->model('Waapi');

    $orang = $this->db->get_where('form',['acara_form' => $this->uri->segment(3)])->result_array();

    foreach ($orang as $o) {
        $this->Waapi->kirimWablas($o['nomor_form'], "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$o['nama_form'].' DIingatkan kembali untuk acara ');
    }
}



public function pemberitahuan()
{
    $this->load->model('M_form');
    $this->load->model('Waapi');

    $orang = $this->M_form->duplikatForm()->result_array();
    $teks = $this->input->post('text');

    foreach ($orang as $o) {
        $this->Waapi->kirimWablas($o['nomor_form'], "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$o['nama_form']."\r\n\r\n". $teks);
    }
    $this->session->set_flashdata('success-input', 'berhasil');
    redirect('Form');
}

public function pemberitahuanfile()
{
    $this->load->model('M_form');
    $this->load->model('Waapi');

    $orang = $this->M_form->duplikatForm()->result_array();
    $pesan = $this->input->post('pesan');

    $config['upload_path'] = './assets/images/wa/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
         $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

         $this->upload->initialize($config);
         if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();

                $gambar = $gbr['file_name'];

                foreach ($orang as $o) {
                    $this->Waapi->kirimWablasfile($o['nomor_form'], "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ". $o['nama_form']."\r\n\r\n". $pesan,$gambar);
                }
                $this->session->set_flashdata('success-input', 'berhasil');
                redirect('Form');
            }else{  
                redirect('Form');
            }

        }else{
            redirect('Form');
        }




    }


    public function formdonasi()
    {
        $this->load->model('M_donasi');
        $data['title'] = 'Form Acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->duplikatdonasi()->result_array();

        $this->load->view('admin/form/formdonasi',$data);
    }


    public function pemberitahuandonasi()
    {
        $this->load->model('M_donasi');
        $this->load->model('Waapi');

        $orang = $this->M_donasi->duplikatdonasi()->result_array();
        $teks = $this->input->post('text');

        foreach ($orang as $o) {
            $this->Waapi->kirimWablas($o['nowa'], "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$o['nama']."\r\n\r\n". $teks);
        }
        $this->session->set_flashdata('success-input', 'berhasil');
        redirect('Form/formdonasi');
    }

    public function pemberitahuanfiledonasi()
    {
        $this->load->model('M_donasi');
        $this->load->model('Waapi');

        $orang = $this->M_donasi->duplikatdonasi()->result_array();
        $pesan = $this->input->post('pesan');

    $config['upload_path'] = './assets/images/wa/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
         $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

         $this->upload->initialize($config);
         if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();

                $gambar = $gbr['file_name'];

                foreach ($orang as $o) {
                    $this->Waapi->kirimWablasfile($o['nowa'], "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ". $o['nama']."\r\n\r\n". $pesan,$gambar);
                }
                $this->session->set_flashdata('success-input', 'berhasil');
                redirect('Form/formdonasi');
            }else{  
                redirect('Form/formdonasi');
            }

        }else{
            redirect('Form/formdonasi');
        }
    }


    public function formall()
    {
        $this->load->model('M_donasi');
        $this->load->model('M_form');
        $data['title'] = 'Form Acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->duplikatdonasi()->result_array();
        $data['form'] = $this->M_form->duplikatFormall()->result_array();

        $this->load->view('admin/form/formall',$data);
    }

    public function deleteformall($id)
   {
    $this->load->model('M_form');
    $where = array('id_formall' => $id);
    $this->M_form->delete_form($where, 'formall');
    $this->session->set_flashdata('user-delete', 'berhasil');
    redirect($_SERVER['HTTP_REFERER']);
}

     public function tambahformallAct()
    {
        $data = [
           'nama_formall' => $this->input->post('nama'),
           'nomor_formall' => $this->input->post('nomor', true),
       ];

       $this->db->insert('formall', $data);
        $this->session->set_flashdata('success-input', 'berhasil');
       redirect($_SERVER['HTTP_REFERER']);

   }


    public function pemberitahuanall()
    {
        $this->load->model('M_form');
        $this->load->model('Waapi');

        $orang = $this->M_form->duplikatFormall()->result_array();
        $teks = $this->input->post('text');

        foreach ($orang as $o) {
             $this->Waapi->kirimWablas($o['nomor_formall'],"Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$o['nama_formall']."\r\n\r\n". $teks);
        }
    
        $this->session->set_flashdata('success-input', 'berhasil');
        redirect('Form/formall');
    }

    public function pemberitahuanfileall()
    {
        $this->load->model('M_donasi');
        $this->load->model('M_form');
        $this->load->model('Waapi');
        $orang = $this->M_form->duplikatFormall()->result_array();
        $pesan = $this->input->post('pesan');

    $config['upload_path'] = './assets/images/wa/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
         $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

         $this->upload->initialize($config);
         if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();

                $gambar = $gbr['file_name'];

                foreach ($orang as $a) {
                    $this->Waapi->kirimWablasfile($a['nomor_formall'], "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ". $a['nama_formall']."\r\n\r\n". $pesan,$gambar);
                }
                $this->session->set_flashdata('success-input', 'berhasil');
                redirect('Form/formall');
            }else{  
                redirect('Form/formall');
            }

        }else{
            redirect('Form/formall');
        }
    }


}
