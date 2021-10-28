<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Donasi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_donasi', 'donasi');
        
    }
    

    public function index()
    {
        $data = [
            'title' => 'Donasi',
            'donasi' => $this->donasi->get_data()
        ];  

        $this->frontend->default('donasi', $data);
    }

}

/* End of file Donasi.php */
