<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{



    public function admin()
    {
        if (!$this->session->userdata('email')) {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Harap isi bidang email!',
            'valid_email' => 'Email tidak valid!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Harap isi bidang password!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/loginn');
        } else {
            //validasi sukses
            $this->adminlogin();
        }}
        else{
            redirect('Admin');
        }
    }

    private function adminlogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('pengurus', ['email_pengurus' => $email])->row_array();

        if ($user) {
            //cek password
            if (password_verify($password, $user['password_pengurus'])) {
                $data = [

                    'email' => $user['email_pengurus'],
                    'nama' => $user['nm_pengurus'],

                ];
                $this->session->set_userdata($data);
                redirect(base_url('Donasi/belumkonfirmasi'));
            } else {

                $this->session->set_flashdata('fail-pass', 'Gagal!');
                redirect(base_url('auth/admin'));
            }
        } else {

            $this->session->set_flashdata('fail-login', 'Gagal!');
            redirect(base_url('auth/admin'));
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('success-logout', 'Berhasil!');
        redirect(base_url('User'));
    }



}
