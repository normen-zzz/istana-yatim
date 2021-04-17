<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Artikel extends CI_Controller {


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
        $this->load->model('M_artikel');
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Artikel';
        $data['artikel'] = $this->M_artikel->tampil_data()->result_array();

        $this->load->view('admin/artikel/artikel',$data);
    }

    public function tambahartikel()
    {
        $data['title'] = 'Artikel';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $this->load->view('admin/artikel/tambahartikel',$data);
    }

    public function tambahartikelAct()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'judul harus diisi',
        ]);

            $config['upload_path'] = './assets/images/artikel/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
                if ($this->upload->do_upload('filefoto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/artikel/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 710;
                    $config['height']= 420;
                    $config['new_image']= './assets/images/artikel/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $jdl=$this->input->post('judul');
                    $artikel=$this->input->post('artikel',true);
                    $title = trim(strtolower($jdl));
                    $out = explode(" ",$title);
                    $slug = implode("-",$out);
                    $data = [
                        'judul_artikel' => htmlspecialchars($jdl,true),
                        'isi_artikel' => $artikel,
                        'img_artikel' => $gambar,
                        'jenis_artikel' => $this->input->post('jenis'),
                        'penulis_artikel' => $this->input->post('penulis'),
                        'slug_artikel' => $slug,
                        'tgl_artikel' => date("Y-m-d H:i:s"),
                    ];

                    $this->db->insert('artikel', $data);
                    redirect('Artikel');
                }else{  
                    redirect('Artikel/tambahartikelAct');
                }

            }else{
                redirect('artikel/tambahartikelAct');
            }

    }

}
