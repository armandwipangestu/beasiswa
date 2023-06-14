<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', "Menu", 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('layout/footer');
        } else {
            $menu = $this->input->post('menu');
            $this->db->insert('user_menu', ['menu' => $menu]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Menu "<b>' . $menu . '</b>" berhasil ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function get_menu($id) {
        $menu = $this->db->query('SELECT * FROM user_menu where id = ' . $id . '')->row();
        exit(json_encode((array)$menu));
    }
}
