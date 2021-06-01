<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, 'id-ID');
class Acara extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->library('upload'); // memanggil library upload
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) { //pengecekan login atau tidak
            redirect('Auth/Admin');
        }
    }

    // Menampilkan View Acara di Admin
    public function index()
    {
        $this->load->model('M_acara'); // Memanggil Model Acara
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array(); //Mengambil data berdasarkan email dari tabel Pengurus
        $data['title'] = 'Acara'; // Judul
        $data['acara'] = $this->M_acara->tampil_data()->result_array(); // Mengambil Data dari Tabel Acara

        $this->load->view('admin/acara/acara',$data);
    }



    // Fungsi Menambahkan Acara
     public function tambahacaraAct()
    {
            $config['upload_path'] = './assets/images/acara/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config); // Upload Data dengan settingan Config diatas
            if(!empty($_FILES['fileposter']['name'])){ 
                if ($this->upload->do_upload('fileposter')){
                    $gbr = $this->upload->data();
                    //Compress Gambar
                    $config['image_library']='gd2'; //Memanggil Library image
                    $config['source_image']='./assets/images/acara/'.$gbr['file_name']; //Menentukan Source gambar
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '100%'; //Menetukan Kualitas
                    $config['width']= 710; // Menentukan Lebar
                    $config['height']= 420; // Menentukan Tinggi
                    $config['new_image']= './assets/images/acara/'.$gbr['file_name']; //Menentukan Path Hasil Kompress
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize(); //Melakukan Resize

                    $gambar=$gbr['file_name'];


                    $namaacara = $this->input->post('nama');
                    $title = trim(strtolower($namaacara));
                    $out = explode(" ",$title);
                    $slug = implode("-",$out); //Membuat Slug

                    $data = [

                        'nama_acara' => $this->input->post('nama'),
                        'tema_acara' => $this->input->post('tema'),
                        'tgl_acara' => $this->input->post('date'),
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


        // Menampilkan View Untuk Ubah Acara
        public function ubahacara()
    {
        $this->load->model('M_acara');
        $data['title'] = 'Ubah acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/acara/ubahacara', $data);
    }

    // Fungsi Untuk Mengubah Acara
    public function ubahacaraAct()
    {
        $this->load->model('M_acara');
        
        $id = $this->input->post('id',true);
        $judul = $this->input->post('nama');
        $title = trim(strtolower($judul));
        $out = explode(" ",$title);
        $slug = implode("-",$out);
        $tema = $this->input->post('tema');
        $date = $this->input->post('date');
        $gambar = $_FILES['filefoto']['name'];


        $data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $id])->row_array();
        $config['upload_path'] = './assets/images/acara/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        $gambarLama = $data['acara']['img_acara'];
        //berhasil
        if ($this->upload->do_upload('fileposter')) {
            

            unlink(FCPATH . 'assets/images/acara/' . $gambarLama);
            $gambarBaru = $this->upload->data();
            // unlink(FCPATH . 'assets/images/acara/' . $gambar_lama);
            $config['image_library']='gd2';
                $config['source_image']='./assets/images/acara/'.$gambarBaru['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 710;
                $config['height']= 420;
                $config['new_image']= './assets/images/acara/'.$gambarBaru['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gbr = $gambarBaru['file_name'];
            // $this->db->set('artikel_img', $gambarBaru);
        } 

        else{
            $gbr = $gambarLama;
        }


        $where = array(
            'id_acara' => $id,
        );

        $data = array(
            'id_acara' => $id,
            'tgl_acara' => $date,
            'nama_acara' => $judul,
            'img_acara' => $gbr,
            'tema_acara' => $tema,
            'slug_acara' => $slug,

        );

        $this->M_acara->update_data($where, $data, 'acara');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('acara');
    }


        // Fungsi Menghapus Acara
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
