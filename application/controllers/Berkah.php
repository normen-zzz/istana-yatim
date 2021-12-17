<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Berkah extends CI_Controller {


    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berkah', 'berkah');
        
    }
    
    public function index()
    {
        $data = [
            'title' => 'Berkah',
            'berkah' => $this->berkah->get_data(),
        ];

        $this->frontend->default('berkah', $data);
    }

    public function view($slug = NULL)
    {
        $berkah =  $this->berkah->get_berkah($slug);
       
        $data =  [
            'title' => 'Berkah',
            'berkah' => $this->berkah->get_berkah(),
            'berkah_item' => $berkah,
        ];

        if (empty($data['berkah_item'])) {

            redirect('berkah', 'refresh');
        }

        $this->frontend->default('detailberkah', $data);
    }

}

/* End of file Ceritasantri.php */
