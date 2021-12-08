<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Home_page extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ceritasantri', 'ceritasantri');
        
    }
    
    public function index()
    {   
        $data = [
            'title' => 'Asrama Istana Yatim, Yayasan Keluarga Muslim The Castilla',
            'ceritasantri' => $this->ceritasantri->get_data(),
            'bank' => $this->db->get('bank')->result_array()
        ];
        $this->frontend->default('home_page', $data);
    }

    public function tambahdonasi()
    {

        $data['modal'] = 'ada';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[4]', [
            'required' => 'Harap isi kolom nama.',
            'min_length' => 'nama terlalu pendek.',
        ]);

        $this->form_validation->set_rules('nowa', 'Nowa', 'required|numeric', [
            'required' => 'Harap isi kolom Nomor.',
            'numeric' => 'Nomor tidak Valid'
        ]);

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric|xss_clean', [
            'required' => 'Harap isi kolom jumlah.',
            'numeric' => 'Harap Isi dengan Angka'
        ]);


        if ($this->form_validation->run() == false) {
            $this->frontend->default('home_page', $data);
        } else {
            
            $config['upload_path'] = './assets/images/donasi/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!empty($_FILES['filebukti']['name'])) {
                if ($this->upload->do_upload('filebukti')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/donasi/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '100%';
                    $config['width'] = 710;
                    $config['height'] = 420;
                    $config['new_image'] = './assets/images/donasi/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name'];

                    $data = [
                        'nama' => $this->input->post('nama'),
                        'nowa' => $this->input->post('nowa', TRUE),
                        'jumlah' => $this->input->post('jumlah', TRUE),
                        'id_bank' => $this->input->post('bank'),
                        'tanggal' => date("Y-m-d H:i:s"),
                        'bukti' => $gambar,

                    ];

                    $this->db->insert('donasi', $data);
                    $this->db->insert('formall', ['nama_formall' => $this->input->post('nama'), 'nomor_formall' => $this->input->post('nowa', TRUE)]);
                    $this->session->set_flashdata('success-donasi', 'berhasil');
                    $this->Waapi->kirimWablas($this->input->post('nowa'), "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu " . $this->input->post('nama') . ' Terima Kasih Anda Sudah Melakukan Donasi Sebesar ' . ("Rp " . number_format($this->input->post('jumlah'), 2, ',', '.')));
                    redirect('home_page');
                } else {
                    redirect('home_page');
                }
            } else {
                redirect('home_page');
            }
        }
    }


}

/* End of file Home_page.php */
