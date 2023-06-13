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
        // $this->_alreadyLogin();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            "required" => "Email tidak boleh kosong",
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            "required" => "Password tidak boleh kosong",
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "STMIK Beasiswa - Masuk";
            $this->load->view('layout/header', $data);
            $this->load->view('auth/login');
        } else {
            $this->_masuk();
        }
    }

    private function _masuk()
    {
        $email = htmlspecialchars($this->input->post('email'), true);
        $password = $this->input->post('password');

        $user = $this->db->get_where('user_data', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->sesion->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 neu-brutalism">Password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 neu-brutalism">Email belum terdaftar</div>');
            redirect('auth');
        }
    }

    private function _alreadyLogin()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        }
        if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        }
    }

    public function daftar()
    {
        // $this->_alreadyLogin();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_data.email]', [
            'required' => 'Email tidak boleh kosong',
            'is_unique' => 'Email sudah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Kata Sandi tidak boleh kosong',
            'matches' => '',
            'min_length' => 'Kata Sandi terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Kata Sandi', 'required|trim|matches[password]', [
            'required' => 'Konfirmasi Kata Sandi tidak boleh kosong',
            'matches' => 'Konfirmasi Kata Sandi tidak sama',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "STMIK Beasiswa - Daftar";
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
