<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Ceritasantri extends CI_Controller {


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
        $this->load->model('M_ceritasantri');
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Cerita Santri';
        $data['ceritasantri'] = $this->M_ceritasantri->tampil_data()->result_array();

        $this->load->view('admin/ceritasantri/ceritasantri',$data);
    }

    public function tambahceritasantri()
    {
        $data['title'] = 'Cerita Santril';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $this->load->view('admin/ceritasantri/tambahceritasantri',$data);
    }

    public function tambahceritasantriAct()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'judul harus diisi',
        ]);

            $config['upload_path'] = './assets/images/ceritasantri/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
                if ($this->upload->do_upload('filefoto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/ceritasantri/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 710;
                    $config['height']= 420;
                    $config['new_image']= './assets/images/ceritasantri/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $jdl=$this->input->post('judul');
                    $ceritasantri=$this->input->post('ceritasantri',true);
                    $title = trim(strtolower($jdl));
                    $out = explode(" ",$title);
                    $slug = implode("-",$out);
                    $data = [
                        'judul_ceritasantri' => htmlspecialchars($jdl,true),
                        'isi_ceritasantri' => $ceritasantri,
                        'img_ceritasantri' => $gambar,
                        'jenis_ceritasantri' => $this->input->post('jenis'),
                        'penulis_ceritasantri' => $this->input->post('penulis'),
                        'slug_ceritasantri' => $slug,
                        'tgl_ceritasantri' => date("Y-m-d H:i:s"),
                    ];

                    $this->db->insert('ceritasantri', $data);
                    redirect('Ceritasantri');
                }else{  
                    redirect('Ceritasantri/ceritasantriAct');
                }

            }else{
                redirect('ceritasantri/tambahceritasantriAct');
            }

    }

}
