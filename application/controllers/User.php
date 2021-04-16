<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
        }


	public function index()
	{
		$this->load->model('M_menu');
		$this->load->model('M_slidefoto');
		$data['active'] = 'active';
		$data['slidefoto'] = $this->M_slidefoto->tampil_data()->result_array();
		$data['menu'] = $this->M_menu->tampil_data()->result_array();
		$this->load->view('user/index',$data);
	}
}
