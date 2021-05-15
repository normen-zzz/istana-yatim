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

        $this->load->view('Admin/acara/form/form',$data);
    }


    public function tampilform()
    {
        $this->load->model('M_acara');
        $data['title'] = 'Form Acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['form'] = $this->db->get_where('form',['acara_form' => $this->uri->segment(3)])->result_array();
        $data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $this->uri->segment(3)])->row();

        $this->load->view('admin/acara/form/detailform',$data);
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
     $this->Waapi->kirimWablas($this->input->post('nomor'), 'Assalamualaikum '.$this->input->post('nama').' Terima Kasih Anda Sudah Mendaftar Event '. $this->input->post('judul'));
     redirect('user/detailacara/'. $this->input->post('slug'));

 }


 public function deleteform($id)
 {
    $this->load->model('M_form');
    $data['slidefoto'] = $this->M_form->formWhere(['id_form' => $this->uri->segment(3)])->row_array();
    $where = array('id_form' => $id);
    $this->M_form->delete_form($where, 'form');
    $this->session->set_flashdata('user-delete', 'berhasil');
    redirect('Form');
}



public function reminder()
{
    $this->load->model('M_form');
    $this->load->model('Waapi');

    $orang = $this->db->get_where('form',['acara_form' => $this->uri->segment(3)])->result_array();

    foreach ($orang as $o) {
        $this->Waapi->kirimWablas($o['nomor_form'], 'Assalamualaikum '.$o['nama_form'].' DIingatkan kembali untuk acara ');
    }
}



public function pemberitahuan()
{
    $this->load->model('M_form');
    $this->load->model('Waapi');

    $orang = $this->M_form->duplikatForm()->result_array();

    foreach ($orang as $o) {
        $this->Waapi->kirimWablas($o['nomor_form'], 'Assalamualaikum '.$o['nama_form'].' Test Pemberitahuan ');
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
             //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
                if ($this->upload->do_upload('filefoto')){
                    $gbr = $this->upload->data();
                    $gambar=$gbr['file_name'];
                    

                    foreach ($orang as $o) {
                        $this->Waapi->kirimWablasfile($o['nomor_form'], 'Assalamualaikum', base_url('assets/images/wa/') . $gambar);
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



    }
