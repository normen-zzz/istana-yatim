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

    public function view($slug = NULL)
    {
        $ceritasantri =  $this->cerita->get_ceritasantri($slug);
       
        $data =  [
            'title' => 'Cerita Santri',
            'ceritasantri' => $this->cerita->get_ceritasantri(),
            'ceritasantri_item' => $ceritasantri,
        ];

        if (empty($data['ceritasantri_item'])) {

            redirect('ceritasantri', 'refresh');
        }

        $this->frontend->default('detailceritasantri', $data);
    }

}

/* End of file Ceritasantri.php */
