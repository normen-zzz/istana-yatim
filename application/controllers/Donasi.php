<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, 'id-ID');

class Donasi extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('Auth/Admin');
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
        redirect('Donasi/belumkonfirmasi');
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
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['donasi'] = $this->M_donasi->joinBank(['konfirmasi' =>'1'])->result_array();
        $data['bank'] = $this->M_bank->tampil_data()->result_array();

        $this->load->view('admin/donasi/sudahkonfirmasi',$data);
    }
    public function tambahdonasi()
    {
        $data['title'] = 'Tambah Donasi';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $this->load->view('admin/donasi/tambahdonasi',$data);
    }

    public function tambahdonasiAct()
    {
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

                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nowa' => $this->input->post('nowa',TRUE),
                        'jumlah' => $this->input->post('jumlah',TRUE),
                        'tanggal' => date("Y-m-d H:i:s"),
                        'bukti' => $gambar,
                        
                    ];

                    $this->db->insert('donasi', $data);
                    $this->session->set_flashdata('success-input', 'berhasil');
                    redirect('donasi');
                }else{  
                    redirect('donasi/tambahdonasi');
                }

            }else{
                redirect('donasi/tambahdonasi');
            }
        }
        public function deletedonasi($id)
        {
            $this->load->model('M_donasi');
            $data['donasi'] = $this->M_donasi->donasiWhere(['id_donasi' => $this->uri->segment(3)])->row_array();
            $gambar_lama = $data['donasi']['bukti'];
            unlink(FCPATH . 'assets/images/donasi/' . $gambar_lama);
            $where = array('id_donasi' => $this->uri->segment(3));
            $this->M_donasi->delete_donasi($where, 'donasi');
            $this->session->set_flashdata('user-delete', 'berhasil');
            redirect($_SERVER['HTTP_REFERER']);
        }
       public function pengeluaran_donasi()
        {
            $this->load->model('M_pengeluaran');
            $data['title'] = 'Pengeluaran Donasi';
            $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
            $data['pengeluaran'] = $this->M_pengeluaran->tampil_data()->result_array();

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
            $data['update_donasi'] = $this->db->get('update_donasi')->row_array();
            $penjumlahan = $data['update_donasi']['jumlah_update'] - $this->input->post('jumlah_pengeluaran');
            $tambah = [
                'judul_pengeluaran' => $this->input->post('judul_pengeluaran'),
                'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran'),
                'ket' => $this->input->post('ket'),
                'tanggal'=>date("Y-m-d H:i:s")
            ];

            $this->db->insert('pengeluaran_donasi', $tambah);
            $this->M_donasi->update_data(['id_update' => 1], ['jumlah_update' => $penjumlahan],'update_donasi');
            $this->session->set_flashdata('success-input', 'berhasil');
            redirect('donasi/pengeluaran_donasi');
}
}
