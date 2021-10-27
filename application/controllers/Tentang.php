<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tentang', 'tentang');
    }
    
    public function index()
    {
        $data = [
            'title' => 'Tentang Asrama Istana Yatim',
            'tentang' => $this->tentang->get_data()
        ];

        $this->frontend->default('tentang', $data);
    }

}

/* End of file Tentang.php */
