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
            'ceritasantri' => $this->ceritasantri->get_data()
        ];
        $this->frontend->default('home_page', $data);
    }

}

/* End of file Home_page.php */
