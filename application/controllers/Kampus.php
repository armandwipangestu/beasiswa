<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kampus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function daftar_jurusan()
    {
        $data['title'] = 'Daftar Jurusan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->db->get('kampus_jurusan')->result_array();

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|is_unique[kampus_jurusan.jurusan]', [
            'required' => 'Nama Jurusan tidak boleh kosong',
            'is_unique' => 'Jurusan ' . $this->input->post('jurusan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('kampus/daftar_jurusan');
            $this->load->view('layout/footer');
        } else {
            $jurusan_name = $this->input->post('jurusan');
            $this->db->insert('kampus_jurusan', ['jurusan' => $jurusan_name]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Jurusan <b>' . $jurusan_name . '</b> berhasil ditambahkan!</div>');
            redirect('kampus/daftar_jurusan');
        }
    }

    public function ubah_jurusan()
    {
        $data['title'] = 'Daftar Jurusan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->db->get('kampus_jurusan')->result_array();

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|is_unique[kampus_jurusan.jurusan]', [
            'required' => 'Nama Jurusan tidak boleh kosong',
            'is_unique' => 'Jurusan ' . $this->input->post('jurusan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('kampus/daftar_jurusan');
            $this->load->view('layout/footer');
        } else {
            $id = $this->input->post('id');
            $jurusan = $this->input->post('jurusan');
            $jurusanSebelum = $this->db->get_where('kampus_jurusan', ['id' => $id])->row_array();

            $this->db->where('id', $id);
            $this->db->update('kampus_jurusan', ['jurusan' => $jurusan]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning neu-brutalism mb-4">Jurusan <b>' . $jurusanSebelum['jurusan'] . '</b> berhasil diubah menjadi <b>' . $jurusan . '</b>!</div>');
            redirect('kampus/daftar_jurusan');
        }
    }

    public function get_jurusan($id)
    {
        $menu = $this->db->query('SELECT * FROM kampus_jurusan WHERE id = ' . $id . '')->row();
        exit(json_encode((array)$menu));
    }

    public function hapus_jurusan()
    {
        $jurusan_id = $this->uri->segment(3);
        $jurusan = $this->db->get_where('kampus_jurusan', ['id' => $jurusan_id])->row_array()['jurusan'];
        $this->db->where('id', $jurusan_id);
        $this->db->delete('kampus_jurusan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger neu-brutalism mb-4">Jurusan <b>' . $jurusan . '</b> berhasil dihapus!</div>');
        redirect('kampus/daftar_jurusan');
    }
}
