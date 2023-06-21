<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function index()
    {
        $data['title'] = 'Dokumen Beasiswa';

        $this->load->model('Jurusan_model', 'jurusan');
        $this->load->model('KelasProgram_model', 'kelas_program');
        $this->load->model('Beasiswa_model', 'beasiswa');

        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $init_biodata = [
            "id_user" => $this->session->userdata('id_user'),
            "tempat_lahir" => null,
            "tanggal_lahir" => null,
            "alamat" => null,
            "no_telepon" => null,
            "jenis_kelamin" => null,
            "id_jurusan" => null,
            "semester" => null,
            "id_kelas_program" => null
        ];

        $check_biodata = $this->beasiswa->getMahasiswaBiodata($this->session->userdata('id_user'));
        if (!$check_biodata) {
            $this->db->insert('mahasiswa_biodata', $init_biodata);
        }

        $data['biodata'] = $this->beasiswa->getMahasiswaBiodata($this->session->userdata('id_user'));
        if ($data['biodata'] != null) {
            $data['jurusan_user'] = $this->jurusan->getJurusanById($data['biodata']['id_jurusan']);
            $data['kelas_program_user'] = $this->kelas_program->getKelasProgramById($data['biodata']['id_kelas_program']);
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('dashboard/dokumen_beasiswa');
        $this->load->view('layout/footer');
    }

    public function user_biodata_ubah()
    {
        $data['title'] = 'Perbarui Biodata';

        $this->load->model('Jurusan_model', 'jurusan');
        $this->load->model('KelasProgram_model', 'kelas_program');
        $this->load->model('Beasiswa_model', 'beasiswa');

        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['biodata'] = $this->beasiswa->getMahasiswaBiodata($this->session->userdata('id_user'));
        $data['jurusan'] = $this->db->get('kampus_jurusan')->result_array();
        $data['kelas_program'] = $this->db->get('kampus_kelas_program')->result_array();

        if ($data['biodata'] != null) {
            $data['jurusan_user'] = $this->jurusan->getJurusanById($data['biodata']['id_jurusan']);
            $data['kelas_program_user'] = $this->kelas_program->getKelasProgramById($data['biodata']['id_kelas_program']);
        }

        $this->form_validation->set_rules('tempat_lahir', "Tempat Lahir", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('tanggal_lahir', "Tanggal Lahir", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('alamat', "Alamat", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('no_telepon', "No Telepon", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('jenis_kelamin', "Jenis Kelamin", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('id_jurusan', "Jurusan", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('id_kelas_program', "Kelas Program", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('semester', "Semester", 'required', [
            'required' => 'tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('dashboard/user_biodata_ubah');
            $this->load->view('layout/footer');
        } else {
            $data = [
                "tempat_lahir" => $this->input->post('tempat_lahir'),
                "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                "alamat" => $this->input->post('alamat'),
                "no_telepon" => $this->input->post('no_telepon'),
                "jenis_kelamin" => $this->input->post('jenis_kelamin'),
                "id_jurusan" => $this->input->post('id_jurusan'),
                "semester" => $this->input->post('semester'),
                "id_kelas_program" => $this->input->post('id_kelas_program')
            ];
            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('mahasiswa_biodata', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success neu-brutalism mb-4">Biodata berhasil diperbarui!</div>'
            );
            redirect("dashboard");
        }
    }
}
