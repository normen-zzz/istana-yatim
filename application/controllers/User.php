<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->session->set_flashdata('not-login', 'Gagal!');
    }

	public function index(){
		$this->load->model('M_menu');
		$this->load->model('M_slidefoto');
		$this->load->model('M_footer');
		$data['active'] = 'active';
		$data['slidefoto'] = $this->M_slidefoto->tampil_data()->result_array();
		$data['menu'] = $this->M_menu->tampil_data()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/index',$data);
	}



	public function artikel(){
		$this->load->model('M_footer');
		$this->load->model('M_artikel');
		$data['active'] = 'active';
		$data['title'] = 'Artikel';
		$data['artikel'] = $this->M_artikel->tampil_data()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/artikel/artikel',$data);
	}

	public function detailartikel(){
		$this->load->model('M_footer');
		$this->load->model('M_artikel');
		$data['active'] = 'active';
		$data['title'] = 'Artikel';
		$data['artikel'] = $this->M_artikel->artikelWhere(['slug_artikel' => $this->uri->segment(3)])->row();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/artikel/detailartikel',$data);
	}


}
