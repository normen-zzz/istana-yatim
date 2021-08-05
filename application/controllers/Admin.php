<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Admin';

        $this->load->view('admin/index',$data);
    }


     public function listadmin()
    {
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Admin';
        $data['admin'] = $this->db->get('pengurus')->result_array();

        $this->load->view('admin/listadmin',$data);
    }

    public function adminregistrationAct()
    {
         $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['title'] = 'Admin';
        $data['admin'] = $this->db->get('pengurus')->result_array();
        $data['modal'] = "$('#exampleModal').modal('show');";
        

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Harap isi kolom Tanggal.',
        ]);



        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom Alamat.',
            'min_length' => 'Alamat terlalu pendek.',
        ]);

         $this->form_validation->set_rules('nomor', 'Nomor', 'required|regex_match[/^[0-9]{13}$/]', [
            'required' => 'Harap isi kolom Nomor.',
            'regex_match' => 'Nomor tidak Valid'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengurus.email_pengurus]', [
            'is_unique' => 'Email ini telah digunakan!',
            'required' => 'Harap isi kolom email.',
            'valid_email' => 'Masukan email yang valid.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[retype_password]', [
            'required' => 'Harap isi kolom Password.',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek',
        ]);
        $this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Password tidak sama!',
        ]);

        if ($this->form_validation->run() == false) {
           
            $this->load->view('admin/listadmin',$data);
        } else {

            $email = $this->input->post('email', true);
            $config['upload_path'] = './assets/images/admin/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filefoto']['name'])){
                if ($this->upload->do_upload('filefoto')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/admin/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 700;
                    $config['height']= 700;
                    $config['new_image']= './assets/images/admin/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
            $hasil = [
                'nm_pengurus' => $this->input->post('nama'),
                'tgllahir_pengurus' => $this->input->post('tanggal'),
                'alamat_pengurus' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('nomor'),
                'foto_pengurus' => $gambar,
                'email_pengurus' => htmlspecialchars($email),
                'password_pengurus' =>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('pengurus', $hasil);
            // $this->db->insert('token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('success-reg', 'Berhasil!');
            redirect(base_url('admin'));
            }else{  
                    redirect($_SERVER['HTTP_REFERER']);
                }

            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

     public function ubahadmin()
    {
        $this->load->model('M_admin');
        $data['title'] = 'Ubah admin';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['admin'] = $this->M_admin->adminWhere(['id_pengurus' => $this->uri->segment(3)])->row_array();
        $this->load->view('admin/ubahadmin', $data);
    }

    public function ubahadminAct()
        {
            $this->load->model('M_admin');
            
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

            

        $config['upload_path'] = './assets/images/admin/'; //path folder
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


    public function deleteadmin($id)
        {
            $this->load->model('M_admin');
            $data['donasi'] = $this->M_admin->adminWhere(['id_pengurus' => $this->uri->segment(3)])->row_array();
            $gambar_lama = $data['pengurus']['foto_pengurus'];
            unlink(FCPATH . 'assets/images/admin/' . $gambar_lama);
            $where = array('id_pengurus' => $this->uri->segment(3));
            $this->M_admin->delete_admin($where, 'pengurus');
            $this->session->set_flashdata('user-delete', 'berhasil');
            redirect($_SERVER['HTTP_REFERER']);
        }
    

}
