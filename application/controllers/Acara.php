<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

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
        $this->load->model('M_acara');
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Acara';
        $data['acara'] = $this->M_acara->tampil_data()->result_array();

        $this->load->view('admin/acara/acara',$data);
    }

     public function tambahacara()
    {
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Tambah Acara';

        $this->load->view('admin/acara/tambahacara',$data);
    }

     public function tambahacaraAct()
    {
            $config['upload_path'] = './assets/images/acara/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['fileposter']['name'])){
                if ($this->upload->do_upload('fileposter')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/acara/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '100%';
                    $config['width']= 710;
                    $config['height']= 420;
                    $config['new_image']= './assets/images/acara/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $namaacara = $this->input->post('nama');
                    $title = trim(strtolower($namaacara));
                    $out = explode(" ",$title);
                    $slug = implode("-",$out);

                    $data = [

                        'nama_acara' => $this->input->post('nama'),
                        'tema_acara' => $this->input->post('tema'),
                        'tgl_acara' => date("Y-m-d H:i:s"),
                        'img_acara' => $gambar,
                        'slug_acara' => $slug,
                        
                    ];

                    $this->db->insert('acara', $data);
                    $this->session->set_flashdata('success-input', 'berhasil');
                    redirect('Acara');
                }else{  
                    redirect('acara/tambahacara');
                }

            }else{
                redirect('acara/tambahacara');
            }
        }


        public function deleteacara($id)
    {
        $this->load->model('M_acara');
        $data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $this->uri->segment(3)])->row_array();
        $gambar_lama = $data['acara']['img_acara'];
        unlink(FCPATH . 'assets/images/acara/' . $gambar_lama);
        $where = array('id_acara' => $id);
        $this->M_acara->delete_acara($where, 'acara');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('Acara');
    }


}
