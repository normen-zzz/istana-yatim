<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, 'id-ID');


class Cms extends CI_Controller {

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


    public function index()
    {
        $data['title'] = 'Slide Foto';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['slidefoto'] = $this->db->get('slidefoto')->result_array();

        $this->load->view('admin/cms/slidefoto/slidefoto',$data);
    }

    public function tambahslidefoto()
    {
        $data['title'] = 'Tambah Slide Foto';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();

        $this->load->view('admin/cms/slidefoto/tambahslidefoto',$data);
    }

    public function tambahslidefotoAct()
    {
        $config['upload_path'] = './assets/images/slidefoto/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
         $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

         $this->upload->initialize($config);
         if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                    //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/slidefoto/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;

                $config['width']= 1159;
                $config['height']= 500;
                $config['new_image']= './assets/images/slidefoto/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];

                $data = [

                    'img_slidefoto' => $gambar,
                    'tgl_slidefoto' => date("Y-m-d H:i:s"),
                ];

                $this->db->insert('slidefoto', $data);
                redirect('Cms');
            }else{  
                redirect('cms/tambahslidefoto');
            }

        }else{
            redirect('cms/tambahslidefoto');
        }
    }

    public function ubahslidefoto()
    {
        $this->load->model('M_slidefoto');
        $data['title'] = 'Ubah Slide Foto';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['slidefoto'] = $this->M_slidefoto->slidefotoWhere(['id_slidefoto' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/cms/slidefoto/ubahslidefoto',$data);
    }
    public function ubahslidefotoAct()
    {
        $this->load->model('M_slidefoto');

        $id = $this->input->post('id',true);


        $gambar = $_FILES['filefoto']['name'];
        $data['slidefoto'] = $this->M_slidefoto->slidefotoWhere(['id_slidefoto' => $id])->row_array();



        $config['upload_path'] = './assets/images/slidefoto/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        $gambarLama = $data['slidefoto']['img_slidefoto'];
        //berhasil
        if ($this->upload->do_upload('filefoto')) {


            unlink(FCPATH . 'assets/images/slidefoto/' . $gambarLama);
            $gambarBaru = $this->upload->data();
            // unlink(FCPATH . 'assets/images/ceritasantri/' . $gambar_lama);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/slidefoto/'.$gambarBaru['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 710;
            $config['height']= 420;
            $config['new_image']= './assets/images/slidefoto/'.$gambarBaru['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gbr = $gambarBaru['file_name'];
            // $this->db->set('ceritasantri_img', $gambarBaru);
        } 

        else{
            $gbr = $gambarLama;
        }


        $where = array(
            'id_slidefoto' => $id,
        );

        $data = array(
            'id_slidefoto'=>$id,
            'img_slidefoto' => $gbr,
            'tgl_slidefoto'=>date("Y-m-d H:i:s"),
            


        );

        $this->M_slidefoto->update_data($where, $data, 'slidefoto');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('cms/index');
    }


    public function deleteslidefoto($id)
    {
        $this->load->model('M_slidefoto');
        $data['slidefoto'] = $this->M_slidefoto->slidefotoWhere(['id_slidefoto' => $this->uri->segment(3)])->row_array();
        $gambar_lama = $data['slidefoto']['img_slidefoto'];
        unlink(FCPATH . 'assets/images/slidefoto/' . $gambar_lama);
        $where = array('id_slidefoto' => $id);
        $this->M_slidefoto->delete_slidefoto($where, 'slidefoto');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('Cms');
    }


    public function footer()
    {
        $this->load->model('M_footer');
        $data['title'] = 'Footer';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['footer'] = $this->M_footer->tampil_data()->result_array();
        $this->load->view('admin/cms/footer/footer', $data);
    }
    
    public function ubahfooter()
    {
        $this->load->model('M_footer');
        $data['title'] = 'Ubah Footer';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['footer'] = $this->M_footer->footerWhere(['id_footer' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/cms/footer/ubahfooter', $data);
    }
    public function ubahfooterAct()
    {
        $this->load->model('M_footer');
        
        $id = $this->input->post('id',true);
        $link_facebook = $this->input->post('link_facebook');
        $link_twitter = $this->input->post('link_twitter');
        $link_instagram = $this->input->post('link_instagram');
        $text_copyright = $this->input->post('text_copyright');

        $data['footer'] = $this->M_footer->footerWhere(['id_footer' => $id])->row_array();

        $where = array(
            'id_footer' => $id,
        );

        $data = array(
            'id_footer' => $id,
            'link_facebook' => $link_facebook,
            'link_twitter' => $link_twitter,
            'link_instagram' => $link_instagram,
            'text_copyright' => $text_copyright,
            

        );

        $this->M_footer->update_data($where, $data, 'footer');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('cms/footer');
    }

    

    public function bank()
    {
        $this->load->model('M_bank');
        $data['title'] = 'Daftar Bank';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();

        $this->load->view('admin/cms/bank/bank',$data);
    }
    public function tambahbank()
    {
        $data['title'] = 'Tambah Bank';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $this->load->view('admin/cms/bank/tambahbank',$data);
    }
    public function tambahbankAct()
    {

        $this->load->model('M_bank');
        $data['title'] = 'Daftar Bank';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();
        $data['modal'] = "$('#exampleModal').modal('show');";

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('bank', 'Bank', 'required', [
            'required' => 'Harap isi kolom Bank.',
        ]);

        $this->form_validation->set_rules('norek', 'Norek', 'required|min_length[4]', [
            'required' => 'Harap isi kolom Nomor Rekening.',
            'min_length' => 'Nomor Rekening terlalu pendek.',
        ]);




        if ($this->form_validation->run() == false) {
           
            $this->load->view('Admin/cms/bank/bank',$data);
        } else {
        $hasil = [
            'bank' => $this->input->post('bank'),
            'nama_bank' => $this->input->post('nama'),
            'norek' => $this->input->post('norek'),

        ];

        $this->db->insert('bank', $hasil);
        $this->session->set_flashdata('success-input', 'berhasil');
        redirect('Cms/bank');
    }
    }
    public function deletebank($id)
    {
        $this->load->model('M_bank');
        $data['donasi'] = $this->M_bank->bankWhere(['id_bank' => $this->uri->segment(3)])->row_array();
        $where = array('id_bank' => $id);
        $this->M_bank->delete_bank($where, 'bank');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('Cms/bank');
    }




    public function ubahbank()
    {
        $this->load->model('M_bank');
        $data['title'] = 'Ubah Bank';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['bank'] = $this->M_bank->bankWhere(['id_bank' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/cms/bank/ubahbank', $data);
    }
    public function ubahbankAct()
    {
        $this->load->model('M_bank');
        
        $id = $this->input->post('id',true);
        $bank = $this->input->post('bank');
        $nama = $this->input->post('nama');
        $norek = $this->input->post('norek');

        $data['bank'] = $this->M_bank->bankWhere(['id_bank' => $id])->row_array();

        $where = array(
            'id_bank' => $id,
        );

        $data = array(
            'id_bank' => $id,
            'bank' => $bank,
            'nama_bank' => $nama,
            'norek' => $norek,            

        );

        $this->M_bank->update_data($where, $data, 'bank');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('cms/bank');
    }


    //Youtube
     public function youtube()
    {
        $this->load->model('M_youtube');
        $data['title'] = 'Daftar Youtube';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['youtube'] = $this->M_youtube->tampil_data()->result_array();

        $this->load->view('admin/cms/youtube/youtube',$data);
    }

     public function ubahyoutube()
    {
        $this->load->model('M_youtube');
        $data['title'] = 'Ubah Bank';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['youtube'] = $this->M_youtube->youtubeWhere(['id_youtube' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/cms/youtube/ubahyoutube', $data);
    }

    public function ubahyoutubeAct()
    {
        $this->load->model('M_youtube');
        
        $id = $this->input->post('id',true);
        $youtube = $this->input->post('youtube');
        $keterangan = $this->input->post('keterangan');


        $data['youtube'] = $this->M_youtube->youtubeWhere(['id_youtube' => $id])->row_array();

        $where = array(
            'id_youtube' => $id,
        );

        $data = array(
            'id_youtube' => $id,
            'link_youtube' => $youtube,   
            'ket_youtube' =>  $keterangan,  

        );

        $this->M_youtube->update_data($where, $data, 'youtube');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('cms/youtube');
    }


}





