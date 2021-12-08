<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_donasi', 'donasi');
        $this->load->model('M_pengeluaran', 'pengeluaran');
    }
    

    public function index()
    {
        $data = [
            'title' => 'Donasi',
            'donasi' => $this->donasi->get_data(),
        ];

        $data['infodonasi'] = $this->db->get('update_donasi')->row_array();
        $data['donasiperbulan'] = $this->donasi->donasiperbulan(['konfirmasi' => 1])->row();
        $data['pengeluarandonasiperbulan'] = $this->pengeluaran->pengeluarandonasiperbulan()->row();
        $data['pengeluarandonasi'] = $this->pengeluaran->tampil_data()->result_array();

        $this->frontend->default('donasi', $data);
    }


}

/* End of file Donasi.php */
