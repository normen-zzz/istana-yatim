<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_event', 'event');
    }

    public function index()
    {
        $data = [
            'title' => 'Event Istana Yatim',
            'event' => $this->event->get_data(),
        ];

        $this->frontend->default('event', $data);
    }
}

/* End of file Ceritasantri.php */
