<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

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
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '100%';
                    $config['width']= 1159;
                    $config['height']= 600;
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
            $data['title'] = 'Ubah Slide Foto';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();

            $this->load->view('admin/cms/slidefoto/ubahslidefoto',$data);
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

        public function menu()
        {
            $this->load->model('M_menu');
            $data['title'] = 'Menu';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
            $data['menu'] = $this->M_menu->tampil_data()->result_array();

            $this->load->view('admin/cms/menu/menu',$data);
        }

        public function tambahmenu()
        {
            $data['title'] = 'Tambah Menu';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();

            $this->load->view('admin/cms/menu/tambahmenu',$data);
        }

        public function tambahmenuAct()
    {
        $config['upload_path'] = './assets/images/menu/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filelogo']['name'])){
                if ($this->upload->do_upload('filelogo')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/menu/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '100%';
                    $config['width']= 150;
                    $config['height']= 150;
                    $config['new_image']= './assets/images/menu/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];

                    $data = [

                        'judul_menu' => $this->input->post('judul'),
                        'text_menu' => $this->input->post('text'),
                        'tombol_menu' => $this->input->post('tombol'),
                        'tgl_menu' => date("Y-m-d H:i:s"),
                        'img_menu' => $gambar,
                        
                    ];

                    $this->db->insert('menu', $data);
                    redirect('Cms/menu');
                }else{  
                    redirect('cms/tambahmenu');
                }

            }else{
                redirect('cms/tambahmenu');
            }
        }

       public function ubahmenu()
    {
        $this->load->model('M_menu');
        $data['title'] = 'Ubah Menu';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['menu'] = $this->M_menu->menuWhere(['id_menu' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/cms/menu/ubahmenu', $data);
    }

    
    public function ubahmenuAct()
    {
        $this->load->model('M_menu');
        
        $id = $this->input->post('id',true);
        $judul_menu= $this->input->post('judul_menu');
        $text_menu= $this->input->post('text_menu');
        
        $tombol_menu = $this->input->post('tombol');
        $gambar = $_FILES['filefoto']['name'];
        $data['menu'] = $this->M_menu->menuWhere(['id_menu' => $id])->row_array();

        

        $config['upload_path'] = './assets/images/menu/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        $gambarLama = $data['menu']['img_menu'];
        //berhasil
        if ($this->upload->do_upload('filefoto')) {
            

            unlink(FCPATH . 'assets/images/ceritasantri/' . $gambarLama);
            $gambarBaru = $this->upload->data();
            // unlink(FCPATH . 'assets/images/ceritasantri/' . $gambar_lama);
            $config['image_library']='gd2';
                $config['source_image']='./assets/images/ceritasantri/'.$gambarBaru['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= './assets/images/ceritasantri/'.$gambarBaru['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gbr = $gambarBaru['file_name'];
            // $this->db->set('ceritasantri_img', $gambarBaru);
        } 

        else{
            $gbr = $gambarLama;
        }


        $where = array(
            'id_menu' => $id,
        );

        $data = array(
            'id_menu' => $id,
            'tgl_menu' => date("Y-m-d H:i:s"),
            'judul_menu' => $judul_menu,
            'text_menu' => $text_menu,
            'img_menu' => $gbr,
            'tombol_menu' => $tombol_menu,
            

        );

        $this->M_menu->update_data($where, $data, 'menu');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('cms/menu');
    }

        public function deletemenu($id)
    {
        $this->load->model('M_menu');
        $data['menu'] = $this->M_menu->menuWhere(['id_menu' => $this->uri->segment(3)])->row_array();
        $gambar_lama = $data['menu']['img_menu'];
        unlink(FCPATH . 'assets/images/menu/' . $gambar_lama);
        $where = array('id_menu' => $id);
        $this->M_menu->delete_menu($where, 'menu');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('Cms/menu');
    }



	 public function footer()
    {
        $this->load->model('M_footer');
		 $data['title'] = 'Footer';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['footer'] = $this->M_footer->tampil_data()->result_array();
		$this->load->view('admin/cms/footer/footer', $data);
    }
    public function tambahfooter()
        {
            $data['title'] = 'Tambah Footer';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();

            $this->load->view('admin/cms/footer/tambahfooter',$data);
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


    
}
