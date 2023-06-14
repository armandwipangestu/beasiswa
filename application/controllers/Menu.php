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

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        // $this->form_validation->set_rules('menu', "Menu", 'required');

        $getData = $this->input->post();
        $id = $getData['id'];

        if (!empty($id)) {
            // Ubah
            $menu = $getData['menu'];
            $menuSebelum = $this->db->get_where('user_menu', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('user_menu', ['menu' => $menu]);

            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Menu "<b>' . $menuSebelum['menu'] . '</b>" berhasil diubah menjadi "<b>' . $menu . '</b>"!</div>');
        } else {
            // Tambah
            $menu = $this->input->post('menu');
            $this->db->insert('user_menu', ['menu' => $menu]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Menu "<b>' . $menu . '</b>" berhasil ditambahkan!</div>');
        }
        redirect('menu');
    }

    public function hapus_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $result = array(
            'code'          => '200',
            'message'       => 'Menu berhasil berhasil!',
        );

        echo json_encode($result);
    }

    public function get_menu($id)
    {
        $menu = $this->db->query('SELECT * FROM user_menu where id = ' . $id . '')->row();
        exit(json_encode((array)$menu));
    }
}
