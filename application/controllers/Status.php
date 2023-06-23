<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function hidup()
    {
        $data['title'] = 'Status Hidup';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_hidup'] = $this->db->get('status_hidup')->result_array();

        $this->form_validation->set_rules('status_hidup', 'Status Hidup', 'required|is_unique[status_hidup.status_hidup]', [
            'required' => 'Nama Status Hidup tidak boleh kosong',
            'is_unique' => 'Status Hidup ' . $this->input->post('status_hidup') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_hidup', $data);
            $this->load->view('layout/footer');
        } else {
            $status_hidup = $this->input->post('status_hidup');
            $this->db->insert('status_hidup', ['status_hidup' => $status_hidup]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Status Hidup <b>' . $status_hidup . '</b> berhasil ditambahkan!</div>');
            redirect('status/hidup');
        }
    }

    public function ubah_status_hidup()
    {
        $data['title'] = 'Status Hidup';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_hidup'] = $this->db->get('status_hidup')->result_array();

        $this->form_validation->set_rules('status_hidup', 'Status Hidup', 'required|is_unique[status_hidup.status_hidup]', [
            'required' => 'Nama Status Hidup tidak boleh kosong',
            'is_unique' => 'Status Hidup ' . $this->input->post('status_hidup') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_hidup', $data);
            $this->load->view('layout/footer');
        } else {
            $id = $this->input->post('id');
            $status_hidup = $this->input->post('status_hidup');
            $status_hidup_sebelum = $this->db->get_where('status_hidup', ['id' => $id])->row_array()['status_hidup'];

            $this->db->where('id', $id);
            $this->db->update('status_hidup', ['status_hidup' => $status_hidup]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning neu-brutalism mb-4">Status Hidup <b>' . $status_hidup_sebelum . '</b> berhasil diubah menjadi <b>' . $status_hidup . '</b>!</div>');
            redirect('status/hidup');
        }
    }

    public function get_status_hidup($id)
    {
        $status_hidup = $this->db->query('SELECT * FROM status_hidup WHERE id = ' . $id . '')->row();
        exit(json_encode((array)$status_hidup));
    }

    public function hapus_status_hidup()
    {
        $id_status_hidup = $this->uri->segment(3);
        $status_hidup = $this->db->get_where('status_hidup', ['id' => $id_status_hidup])->row_array()['status_hidup'];
        $this->db->where('id', $id_status_hidup);
        $this->db->delete('status_hidup');
        $this->session->set_flashdata('message', '<div class="alert alert-danger neu-brutalism mb-4">Status Hidup <b>' . $status_hidup . '</b> berhasil dihapus!</div>');
        redirect('status/hidup');
    }

    public function hubungan()
    {
        $data['title'] = 'Status Hubungan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_hubungan'] = $this->db->get('status_hubungan')->result_array();

        $this->form_validation->set_rules('status_hubungan', 'Status Hubungan', 'required|is_unique[status_hubungan.status_hubungan]', [
            'required' => 'Nama Status Hubungan tidak boleh kosong',
            'is_unique' => 'Status Hubungan ' . $this->input->post('status_hubungan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_hubungan', $data);
            $this->load->view('layout/footer');
        } else {
            $status_hubungan = $this->input->post('status_hubungan');
            $this->db->insert('status_hubungan', ['status_hubungan' => $status_hubungan]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Status Hubungan <b>' . $status_hubungan . '</b> berhasil ditambahkan!</div>');
            redirect('status/hubungan');
        }
    }

    public function ubah_status_hubungan()
    {
        $data['title'] = 'Status Hubungan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_hubungan'] = $this->db->get('status_hubungan')->result_array();

        $this->form_validation->set_rules('status_hubungan', 'Status Hubungan', 'required|is_unique[status_hubungan.status_hubungan]', [
            'required' => 'Nama Status Hubungan tidak boleh kosong',
            'is_unique' => 'Status Hubungan ' . $this->input->post('status_hubungan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_hubungan', $data);
            $this->load->view('layout/footer');
        } else {
            $id = $this->input->post('id');
            $status_hubungan = $this->input->post('status_hubungan');
            $status_hubungan_sebelum = $this->db->get_where('status_hubungan', ['id' => $id])->row_array()['status_hubungan'];

            $this->db->where('id', $id);
            $this->db->update('status_hubungan', ['status_hubungan' => $status_hubungan]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning neu-brutalism mb-4">Status Hubungan <b>' . $status_hubungan_sebelum . '</b> berhasil diubah menjadi <b>' . $status_hubungan . '</b>!</div>');
            redirect('status/hubungan');
        }
    }

    public function get_status_hubungan($id)
    {
        $status_hubungan = $this->db->query('SELECT * FROM status_hubungan WHERE id = ' . $id . '')->row();
        exit(json_encode((array)$status_hubungan));
    }

    public function hapus_status_hubungan()
    {
        $id_status_hubungan = $this->uri->segment(3);
        $status_hubungan = $this->db->get_where('status_hubungan', ['id' => $id_status_hubungan])->row_array()['status_hubungan'];
        $this->db->where('id', $id_status_hubungan);
        $this->db->delete('status_hubungan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger neu-brutalism mb-4">Status Hubungan <b>' . $status_hubungan . '</b> berhasil dihapus!</div>');
        redirect('status/hubungan');
    }
}
