<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, 'id-ID');


class Berkah extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('Auth/Admin');
        }
    }


    public function index()
    {
        $this->load->model('M_berkah');

        





        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'berkah';
        $data['berkah'] = $this->M_berkah->tampil_data()->result_array();

        $this->load->view('admin/berkah/berkah',$data);
    }

    public function tambahberkah()
    {
        $data['title'] = 'Tambah berkah';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $this->load->view('admin/berkah/tambahberkah',$data);
    }

    public function tambahberkahAct()
    {

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            'required' => 'judul harus diisi',
        ]);

            $config['upload_path'] = './assets/images/berkah/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
                if ($this->upload->do_upload('filefoto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/berkah/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 710;
                    $config['height']= 420;
                    $config['new_image']= './assets/images/berkah/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $jdl=$this->input->post('judul');
                    $berkah=$this->input->post('berkah',true);
                    $title = trim(strtolower($jdl));
                    $out = explode(" ",$title);
                    $slug = implode("-",$out);
                    $data = [
                        'judul_berkah' => htmlspecialchars($jdl,true),
                        'isi_berkah' => $berkah,
                        'img_berkah' => $gambar,
                        'jenis_berkah' => $this->input->post('jenis'),
                        'penulis_berkah' => $this->input->post('penulis'),
                        'slug_berkah' => $slug,
                        'tgl_berkah' => date("Y-m-d H:i:s"),
                    ];

                    $this->db->insert('berkah', $data);
                    $this->session->set_flashdata('success-input', 'berhasil');
                    redirect('berkah');
                }else{  
                    redirect('berkah/tambahberkah');
                }

            }else{
                redirect('berkah/tambahberkah');
            }

        }


        public function ubahberkah()
        {
            $this->load->model('M_berkah');
            $data['title'] = 'Ubah berkah';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
            $data['berkah'] = $this->M_berkah->berkahWhere(['slug_berkah' => $this->uri->segment(3)])->row_array();
            $this->load->view('admin/berkah/ubahberkah', $data);
        }

        public function ubahberkahAct()
        {
            $this->load->model('M_berkah');
            
            $id = $this->input->post('id',true);
            $judul = $this->input->post('judul');
            $title = trim(strtolower($judul));
            $out = explode(" ",$title);
            $slug = implode("-",$out);
            $jenis = $this->input->post('jenis');
            $penulis = $this->input->post('penulis');
            $berkah = $this->input->post('berkah');
            $gambar = $_FILES['filefoto']['name'];
            $data['berkah'] = $this->M_berkah->berkahWhere(['id_berkah' => $id])->row_array();

            

        $config['upload_path'] = './assets/images/berkah/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        $gambarLama = $data['berkah']['img_berkah'];
        //berhasil
        if ($this->upload->do_upload('filefoto')) {


            unlink(FCPATH . 'assets/images/berkah/' . $gambarLama);
            $gambarBaru = $this->upload->data();
            // unlink(FCPATH . 'assets/images/berkah/' . $gambar_lama);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/berkah/'.$gambarBaru['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 710;
            $config['height']= 420;
            $config['new_image']= './assets/images/berkah/'.$gambarBaru['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gbr = $gambarBaru['file_name'];
            // $this->db->set('artikel_img', $gambarBaru);
        } 

        else{
            $gbr = $gambarLama;
        }


        $where = array(
            'id_berkah' => $id,
        );

        $data = array(
            'id_berkah' => $id,
            'tgl_berkah' => date("Y-m-d H:i:s"),
            'judul_berkah' => $judul,
            'isi_berkah' => $berkah,
            'img_berkah' => $gbr,
            'jenis_berkah' => $jenis,
            'penulis_berkah' => $penulis,
            'slug_berkah' => $slug,

        );

        $this->M_berkah->update_data($where, $data, 'berkah');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('berkah');
    }



    public function deleteberkah($slug)
    {
        $this->load->model('M_berkah');
        $data['berkah'] = $this->M_berkah->berkahWhere(['slug_berkah' => $this->uri->segment(3)])->row_array();
        $gambar_lama = $data['berkah']['img_berkah'];
        unlink(FCPATH . 'assets/images/berkah/' . $gambar_lama);
        $where = array('slug_berkah' => $slug);
        $this->M_berkah->delete_berkah($where, 'berkah');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect('berkah');
    }


}
