<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ceritasantri extends CI_Controller {


    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ceritasantri', 'cerita');
        
    }
    
    public function index()
    {
        $data = [
            'title' => 'Cerita Santri',
            'ceritasantri' => $this->cerita->get_data(),
        ];

        $this->frontend->default('ceritasantri', $data);
    }

}

/* End of file Ceritasantri.php */
