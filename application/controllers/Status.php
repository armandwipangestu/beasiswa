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

    public function pendidikan()
    {
        $data['title'] = 'Status Pendidikan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_pendidikan'] = $this->db->get('status_pendidikan')->result_array();

        $this->form_validation->set_rules('status_pendidikan', 'Status Pendidikan', 'required|is_unique[status_pendidikan.status_pendidikan]', [
            'required' => 'Nama Status Pendidikan tidak boleh kosong',
            'is_unique' => 'Status Pendidikan ' . $this->input->post('status_pendidikan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_pendidikan', $data);
            $this->load->view('layout/footer');
        } else {
            $status_pendidikan = $this->input->post('status_pendidikan');
            $this->db->insert('status_pendidikan', ['status_pendidikan' => $status_pendidikan]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Status Pendidikan <b>' . $status_pendidikan . '</b> berhasil ditambahkan!</div>');
            redirect('status/pendidikan');
        }
    }

    public function ubah_status_pendidikan()
    {
        $data['title'] = 'Status Pendidikan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_pendidikan'] = $this->db->get('status_pendidikan')->result_array();

        $this->form_validation->set_rules('status_pendidikan', 'Status Pendidikan', 'required|is_unique[status_pendidikan.status_pendidikan]', [
            'required' => 'Nama Status Pendidikan tidak boleh kosong',
            'is_unique' => 'Status Pendidikan ' . $this->input->post('status_pendidikan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_pendidikan', $data);
            $this->load->view('layout/footer');
        } else {
            $id = $this->input->post('id');
            $status_pendidikan = $this->input->post('status_pendidikan');
            $status_pendidikan_sebelum = $this->db->get_where('status_pendidikan', ['id' => $id])->row_array()['status_pendidikan'];

            $this->db->where('id', $id);
            $this->db->update('status_pendidikan', ['status_pendidikan' => $status_pendidikan]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning neu-brutalism mb-4">Status Pendidikan <b>' . $status_pendidikan_sebelum . '</b> berhasil diubah menjadi <b>' . $status_pendidikan . '</b>!</div>');
            redirect('status/pendidikan');
        }
    }

    public function get_status_pendidikan($id)
    {
        $status_pendidikan = $this->db->query('SELECT * FROM status_pendidikan WHERE id = ' . $id . '')->row();
        exit(json_encode((array)$status_pendidikan));
    }

    public function hapus_status_pendidikan()
    {
        $id_status_pendidikan = $this->uri->segment(3);
        $status_pendidikan = $this->db->get_where('status_pendidikan', ['id' => $id_status_pendidikan])->row_array()['status_pendidikan'];
        $this->db->where('id', $id_status_pendidikan);
        $this->db->delete('status_pendidikan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger neu-brutalism mb-4">Status Pendidikan <b>' . $status_pendidikan . '</b> berhasil dihapus!</div>');
        redirect('status/pendidikan');
    }

    public function pekerjaan()
    {
        $data['title'] = 'Status Pekerjaan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_pekerjaan'] = $this->db->get('status_pekerjaan')->result_array();

        $this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required|is_unique[status_pekerjaan.status_pekerjaan]', [
            'required' => 'Nama Status Pekerjaan tidak boleh kosong',
            'is_unique' => 'Status Pekerjaan ' . $this->input->post('status_pekerjaan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_pekerjaan', $data);
            $this->load->view('layout/footer');
        } else {
            $status_pekerjaan = $this->input->post('status_pekerjaan');
            $this->db->insert('status_pekerjaan', ['status_pekerjaan' => $status_pekerjaan]);
            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism mb-4">Status Pekerjaan <b>' . $status_pekerjaan . '</b> berhasil ditambahkan!</div>');
            redirect('status/pekerjaan');
        }
    }

    public function ubah_status_pekerjaan()
    {
        $data['title'] = 'Status Pekerjaan';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['status_pekerjaan'] = $this->db->get('status_pekerjaan')->result_array();

        $this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required|is_unique[status_pekerjaan.status_pekerjaan]', [
            'required' => 'Nama Status Pekerjaan tidak boleh kosong',
            'is_unique' => 'Status Pekerjaan ' . $this->input->post('status_pekerjaan') .  ' sudah ada!'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('status/status_pekerjaan', $data);
            $this->load->view('layout/footer');
        } else {
            $id = $this->input->post('id');
            $status_pekerjaan = $this->input->post('status_pekerjaan');
            $status_pekerjaan_sebelum = $this->db->get_where('status_pekerjaan', ['id' => $id])->row_array()['status_pekerjaan'];

            $this->db->where('id', $id);
            $this->db->update('status_pekerjaan', ['status_pekerjaan' => $status_pekerjaan]);
            $this->session->set_flashdata('message', '<div class="alert alert-warning neu-brutalism mb-4">Status Pekerjaan <b>' . $status_pekerjaan_sebelum . '</b> berhasil diubah menjadi <b>' . $status_pekerjaan . '</b>!</div>');
            redirect('status/pekerjaan');
        }
    }

    public function get_status_pekerjaan($id)
    {
        $status_pekerjaan = $this->db->query('SELECT * FROM status_pekerjaan WHERE id = ' . $id . '')->row();
        exit(json_encode((array)$status_pekerjaan));
    }

    public function hapus_status_pekerjaan()
    {
        $id_status_pekerjaan = $this->uri->segment(3);
        $status_pekerjaan = $this->db->get_where('status_pekerjaan', ['id' => $id_status_pekerjaan])->row_array()['status_pekerjaan'];
        $this->db->where('id', $id_status_pekerjaan);
        $this->db->delete('status_pekerjaan');
        $this->session->set_flashdata('message', '<div class="alert alert-danger neu-brutalism mb-4">Status Pekerjaan <b>' . $status_pekerjaan . '</b> berhasil dihapus!</div>');
        redirect('status/pekerjaan');
    }
}
