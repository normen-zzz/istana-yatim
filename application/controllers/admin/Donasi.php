<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, "id_ID.UTF8");

class Donasi extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('auth/Admin');
        }
        
    }


    public function konfirmasi(){
        $this->load->model('M_donasi');
        $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
        $data['donasi'] = $this->db->get_where('donasi',['id_donasi' => $this->uri->segment(3)])->row_array();
        $penjumlahan = $data['update_donasi']['jumlah_update'] + $data['donasi']['jumlah'];


        $update = array(
            'konfirmasi' => 1,
            
        );

        $this->M_donasi->update_data(['id_donasi' => $this->uri->segment(3)], $update, 'donasi');
        $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');

        $this->session->set_flashdata('user-konfirmasi', 'berhasil');
        redirect('admin/donasi/belumkonfirmasi');
    }

    public function belumkonfirmasi()
    {
        $this->load->model('M_donasi');
        $this->load->model('M_bank');
        $data['title'] = 'Donasi';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->joinBank(['konfirmasi' =>'0'])->result_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();

        $this->load->view('admin/donasi/belumkonfirmasi',$data);
    }



    public function sudahkonfirmasi()
    {
        $this->load->model('M_donasi');
        $this->load->model('M_bank');

        $data['title'] = 'Donasi';
        $data['nama'] = '';
        $data['tombol'] = '<button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Donasi</button>';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->joinBank(['konfirmasi' => 1])->result_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();

        $this->load->view('admin/donasi/sudahkonfirmasi',$data);
    }

    public function sudahkonfirmasifilter()
    {
        $this->load->model('M_donasi');
        $this->load->model('M_bank');

        $filter = $this->input->post('filter');

        $data['title'] = 'Donasi';
        $data['nama'] = 'Filter';
        $data['tombol'] = '';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->joinBankfilter(['konfirmasi' => 1], $filter)->result_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();

        $this->load->view('admin/donasi/sudahkonfirmasi',$data);
    }



    public function tambahdonasiAct()
    {
        $this->load->model('M_donasi');
        $this->load->model('Waapi');

        $this->load->model('M_bank');
        $data['title'] = 'Tambah Donasi';
        $data['nama'] = '';
        $data['tombol'] = '<button style="margin-bottom: 20px" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Donasi</button>';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->joinBank(['konfirmasi' => 1])->result_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();
        $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
        $data['modal'] = 'ada';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'Nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('nowa', 'Nowa', 'required|numeric|xss_clean', [
            'required' => 'Harap isi kolom nowa.',
            'numeric' => 'Harap Isi dengan Angka'
        ]);

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric|xss_clean', [
            'required' => 'Harap isi kolom jumlah.',
            'numeric' => 'Harap Isi dengan Angka'
        ]);



        if ($this->form_validation->run() == false) {

            $this->load->view('admin/donasi/sudahkonfirmasi', $data);
        } else {
            $penjumlahan = $data['update_donasi']['jumlah_update'] + $this->input->post('jumlah',TRUE);
        $config['upload_path'] = './assets/images/donasi/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filebukti']['name'])){
                if ($this->upload->do_upload('filebukti')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/donasi/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '100%';
                    $config['width']= 710;
                    $config['height']= 420;
                    $config['new_image']= './assets/images/donasi/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];

                    $tambah = [
                        'nama' => $this->input->post('nama'),
                        'nowa' => $this->input->post('nowa',TRUE),
                        'id_bank' => $this->input->post('bank'),
                        'jumlah' => $this->input->post('jumlah',TRUE),
                        'tanggal' => date("Y-m-d H:i:s"),
                        'bukti' => $gambar,
                        'konfirmasi' => 1,
                        
                    ];

                    $this->db->insert('donasi', $tambah);
                    $this->db->insert('formall',['nama_formall' => $this->input->post('nama'),'nomor_formall' => $this->input->post('nowa',TRUE)]);
                    $this->Waapi->kirimWablas($this->input->post('nowa'), "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$this->input->post('nama').' Terima Kasih Anda Sudah Melakukan Donasi Sebesar '. ("Rp " . number_format($this->input->post('jumlah'),2,',','.')));
                    $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');
                    $this->session->set_flashdata('success-input', 'berhasil');
                    redirect($_SERVER['HTTP_REFERER']);
                }else{  
                    redirect('admin/donasi/tambahdonasi');
                }

            }else{
                redirect('admin/donasi/tambahdonasi');
            }
        }
    }
    public function deletedonasibelumkonfirmasi($id)
    {
        $this->load->model('M_donasi');
        $data['donasi'] = $this->M_donasi->donasiWhere(['id_donasi' => $this->uri->segment(3),'konfirmasi' => 0])->row_array();
        $gambar_lama = $data['donasi']['bukti'];
        unlink(FCPATH . 'assets/images/donasi/' . $gambar_lama);
        $where = array('id_donasi' => $this->uri->segment(3));
        $this->M_donasi->delete_donasi($where, 'donasi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deletedonasisudahkonfirmasi($id)
    {
        $this->load->model('M_donasi');
        $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
        $data['donasi'] = $this->M_donasi->donasiWhere(['id_donasi' => $this->uri->segment(3),'konfirmasi' => 1])->row_array();
        $penjumlahan = $data['update_donasi']['jumlah_update'] - $data['donasi']['jumlah'];
        $gambar_lama = $data['donasi']['bukti'];
        unlink(FCPATH . 'assets/images/donasi/' . $gambar_lama);
        $where = array('id_donasi' => $this->uri->segment(3));
        $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');
        $this->M_donasi->delete_donasi($where, 'donasi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function pengeluaran_donasi()
    {
        $this->load->model('M_pengeluaran');
        $data['tombol'] = '';
        $data['title'] = 'Pengeluaran Donasi';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['pengeluaran'] = $this->M_pengeluaran->tampil_data()->result_array();

        $this->load->view('admin/donasi/pengeluarandonasi',$data);
    }

    public function pengeluaran_donasifilter()
    {
        $this->load->model('M_pengeluaran');
        $filter = $this->input->post('filter');
        $data['tombol'] = '';
        $data['title'] = 'Pengeluaran Donasi';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['pengeluaran'] = $this->M_pengeluaran->pengeluaranfilter($filter)->result_array();

        $this->load->view('admin/donasi/pengeluarandonasi',$data);
    }
    public function tambahpengeluaran()
    {
        $data['title'] = 'Tambah Pengeluaran Donasi';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $this->load->view('admin/donasi/tambahpengeluaran',$data);
    }


    public function tambahpengeluaranAct(){
        $this->load->model('M_donasi');
        $this->load->model('M_pengeluaran');
        $data['tombol'] = '';
        $data['title'] = 'Pengeluaran Donasi';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['pengeluaran'] = $this->M_pengeluaran->tampil_data()->result_array();
        $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
        $data['modal'] = 'ada';
        

        $this->form_validation->set_rules('judul_pengeluaran', 'Judul_pengeluaran', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom judul.',
            'min_length' => 'judul terlalu pendek.',
        ]);

        $this->form_validation->set_rules('jumlah_pengeluaran', 'Jumlah_pengeluaran', 'required|numeric|xss_clean', [
            'required' => 'Harap isi kolom jumlah.',
            'numeric' => 'Harap Isi dengan Angka'
        ]);



        if ($this->form_validation->run() == false) {

            $this->load->view('admin/donasi/pengeluarandonasi', $data);
        } else {
            $penjumlahan = $data['update_donasi']['jumlah_update'] - $this->input->post('jumlah_pengeluaran');

            $config['upload_path'] = './assets/images/pengeluarandonasi/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['foto_pengeluaran']['name'])){
                if ($this->upload->do_upload('foto_pengeluaran')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/pengeluarandonasi/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['width']= 710;
                    $config['height']= 420;
                    $config['new_image']= './assets/images/pengeluarandonasi/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar=$gbr['file_name'];
                    $tambah = [
                        'judul_pengeluaran' => $this->input->post('judul_pengeluaran'),
                        'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran'),
                        'ket' => $this->input->post('ket'),
                        'img_pengeluaran' => $gambar,
                        'tanggal_pengeluaran'=>date("Y-m-d H:i:s")
                    ];

                    $this->db->insert('pengeluaran_donasi', $tambah);
                    $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');
                    $this->session->set_flashdata('success-input', 'berhasil');
                    redirect('admin/donasi/pengeluaran_donasi');
                }else{  
                    redirect('admin/donasi/tambahpengeluaran');
                }

            }else{
                redirect('admin/donasi/tambahpengeluaran');
            }
        }
        }

        public function ubahpengeluaran()
        {
            $this->load->model('M_pengeluaran');
            $data['title'] = 'Tambah Pengeluaran Donasi';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
            $data['pengeluaran'] = $this->M_pengeluaran->pengeluaranWhere(['id_pengeluaran' => $this->uri->segment(3)])->row_array();
            $this->load->view('admin/donasi/ubahpengeluaran',$data);
        }


        public function ubahpengeluaranAct()
        {
            $this->load->model('M_pengeluaran');
            $this->load->model('M_donasi');

            $id = $this->input->post('id',true);
            $judul = $this->input->post('judul');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('keterangan');
            $gambar = $_FILES['filefoto']['name'];

            $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
            $data['pengeluaran'] = $this->M_pengeluaran->pengeluaranWhere(['id_pengeluaran' => $id])->row_array();

            $penjumlahan = ($data['update_donasi']['jumlah_update'] - $data['pengeluaran'] ['jumlah_pengeluaran']) + $this->input->post('jumlah');

        $config['upload_path'] = './assets/images/pengeluarandonasi/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        $gambarLama = $data['pengeluaran']['img_pengeluaran'];
        //berhasil
        if ($this->upload->do_upload('fileposter')) {


            unlink(FCPATH . 'assets/images/pengeluarandonasi/' . $gambarLama);
            $gambarBaru = $this->upload->data();
            // unlink(FCPATH . 'assets/images/pengeluaran/' . $gambar_lama);
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/pengeluarandonasi/'.$gambarBaru['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 710;
            $config['height']= 420;
            $config['new_image']= './assets/images/pengeluarandonasi/'.$gambarBaru['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gbr = $gambarBaru['file_name'];

            
        } 

        else{
            $gbr = $gambarLama;
        }


        $where = array(
            'id_pengeluaran' => $id,
        );

        $data = array(
            'id_pengeluaran' => $id,
            'judul_pengeluaran' => $judul,
            'img_pengeluaran' => $gbr,
            'jumlah_pengeluaran' => $jumlah,
            'ket' => $keterangan,

        );

        $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');
        $this->M_pengeluaran->update_data($where, $data, 'pengeluaran_donasi');
        $this->session->set_flashdata('success-edit', 'berhasil');
        redirect('admin/onasi/pengeluaran_donasi');
    }

    public function deletepengeluaran($id)
    {
        $this->load->model('M_pengeluaran');
        $this->load->model('M_donasi');
        $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
        $data['pengeluaran'] = $this->M_pengeluaran->pengeluaranWhere(['id_pengeluaran' => $this->uri->segment(3)])->row_array();
        $penjumlahan = $data['update_donasi']['jumlah_update'] + $data['pengeluaran']['jumlah_pengeluaran'];
        $gambar_lama = $data['pengeluaran']['img_pengeluaran'];
        unlink(FCPATH . 'assets/images/pengeluarandonasi/' . $gambar_lama);
        $where = array('id_pengeluaran' => $this->uri->segment(3));

        $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');
        $this->M_pengeluaran->delete_pengeluaran($where, 'pengeluaran_donasi');
        $this->session->set_flashdata('user-delete', 'berhasil');
        redirect($_SERVER['HTTP_REFERER']);
    }
}
