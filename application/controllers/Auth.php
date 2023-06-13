<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['title'] = "STMIK Beasiswa - Login";
        $this->load->view('layout/header', $data);
        $this->load->view('auth/login');
    }

    public function daftar()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_data.email]', [
            'required' => 'Email Tidak Boleh Kosong',
            'is_unique' => 'Email Sudah Digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Kata Sandi Tidak Boleh Kosong',
            'matches' => '',
            'min_length' => 'Kata Sandi terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Kata Sandi', 'required|trim|matches[password]', [
            'required' => 'Konfirmasi Kata Sandi Tidak Boleh Kosong',
            'matches' => 'Konfirmasi Kata Sandi tidak sama',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "STMIK Beasiswa - Login";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/daftar');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2
            ];

            $this->db->insert('user_data', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4">Akun berhasil dibuat! Silahkan Masuk</div>');
            redirect('auth');
        }
    }
}
