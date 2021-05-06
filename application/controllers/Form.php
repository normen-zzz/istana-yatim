<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Form extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->session->set_flashdata('not-login', 'Gagal!');
        if (!$this->session->userdata('email')) {
            redirect('Auth/Admin');
        }
    }


    public function tampilform()
    {
        $this->load->model('M_acara');
        $data['title'] = 'Form Acara';
        $data['user'] = $this->db->get_where('pengurus', ['email_pengurus' =>$this->session->userdata('email')])->row_array();
        $data['form'] = $this->db->get_where('form',['acara_form' => $this->uri->segment(3)])->result_array();
        $data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $this->uri->segment(3)])->row();

        $this->load->view('admin/acara/form/form',$data);
    }

    public function tambahformAct()
    {
        $this->load->model('Kirim');
        $data = [
           'nama_form' => $this->input->post('nama'),
           'nomor_form' => $this->input->post('nomor', true),
           'kelamin_form' => $this->input->post('kelamin'),
           'acara_form' => $this->input->post('acara'),
       ];

    $this->db->insert('form', $data);
    $this->Kirim->kirimWablas($this->input->post('nomor'), 'Assalamualaikum '.$this->input->post('nama').' Terima Kasih Anda Sudah Mendaftar Event '. $this->input->post('judul'));
    redirect('user/detailacara/'. $this->input->post('acara'));

}





}
