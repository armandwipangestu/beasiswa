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
        $this->load->model('Prestasi_model', 'prestasi');
        $this->load->model('Keluarga_model', 'keluarga');

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

        $init_prestasi = [
            'id_user' => $this->session->userdata('id_user'),
            "nama_kegiatan" => null,
            "jenis_kegiatan" => null,
            "tingkat" => null,
            "tahun" => null,
            "pencapaian" => null,
            "scan_sertifikat" => 'default.png'
        ];

        $check_prestasi = $this->prestasi->getMahasiswaPrestasi($this->session->userdata('id_user'));
        if (!$check_prestasi) {
            $this->db->insert('mahasiswa_prestasi', $init_prestasi);
        }

        $init_keluarga = [
            'id_user' => $this->session->userdata('id_user'),
            'id_ayah' => null,
            'id_ibu' => null,
            "jumlah_tanggungan" => null,
            "no_telepon_orang_tua" => null,
            "foto_bersama_keluarga" => "default.png"
        ];

        $check_keluarga = $this->keluarga->getMahasiswaKeluarga($this->session->userdata('id_user'));
        if (!$check_keluarga) {
            $this->db->insert('mahasiswa_keluarga', $init_keluarga);
        }

        $init_mahasiswa_ayah = [
            'id_user' => $this->session->userdata('id_user'),
            'nama_ayah' => null,
            'id_status_hidup' => null,
            'id_status_hubungan' => null,
            'id_status_pendidikan' => null,
            'id_status_pekerjaan' => null,
            'detail_ayah' => null
        ];

        $check_mahasiswa_ayah = $this->keluarga->getMahasiswaAyahById($this->session->userdata('id_user'));
        if (!$check_mahasiswa_ayah) {
            $this->db->insert('mahasiswa_ayah', $init_mahasiswa_ayah);
        }

        $init_mahasiswa_ibu = [
            'id_user' => $this->session->userdata('id_user'),
            'nama_ibu' => null,
            'id_status_hidup' => null,
            'id_status_pendidikan' => null,
            'id_status_pekerjaan' => null,
            'detail_ibu' => null
        ];

        $check_mahasiswa_ibu = $this->keluarga->getMahasiswaIbuById($this->session->userdata('id_user'));
        if (!$check_mahasiswa_ibu) {
            $this->db->insert('mahasiswa_ibu', $init_mahasiswa_ibu);
        }

        $data['biodata'] = $this->beasiswa->getMahasiswaBiodata($this->session->userdata('id_user'));
        if ($data['biodata'] != null) {
            $data['jurusan_user'] = $this->jurusan->getJurusanById($data['biodata']['id_jurusan']);
            $data['kelas_program_user'] = $this->kelas_program->getKelasProgramById($data['biodata']['id_kelas_program']);
        }

        $data['prestasi'] = $this->prestasi->getMahasiswaPrestasi($this->session->userdata('id_user'));
        $data['keluarga'] = $this->keluarga->getMahasiswaKeluarga($this->session->userdata('id_user'));

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

    public function user_prestasi_ubah()
    {
        $data['title'] = 'Perbarui Prestasi';
        $this->load->model('Prestasi_model', 'prestasi');

        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['prestasi'] = $this->prestasi->getMahasiswaPrestasi($this->session->userdata('id_user'));

        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('pencapaian', 'Pencapaian', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('dashboard/user_prestasi_ubah');
            $this->load->view('layout/footer');
        } else {
            $data = [
                "nama_kegiatan" => $this->input->post('nama_kegiatan'),
                "jenis_kegiatan" => $this->input->post('jenis_kegiatan'),
                "tingkat" => $this->input->post('tingkat'),
                "tahun" => $this->input->post('tahun'),
                "pencapaian" => $this->input->post('pencapaian'),
            ];

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                // $path_file = base_url('assets/img/profile/') . $data['user']['image'];
                // unlink($path_file);
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/sertifikat/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $this->prestasi->getMahasiswaPrestasi($this->session->userdata('id_user'))['scan_sertifikat'];
                    if ($gambar_lama != "default.png") {
                        unlink(FCPATH . 'assets/img/sertifikat/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('scan_sertifikat', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('mahasiswa_prestasi', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success neu-brutalism mb-4">Data prestasi berhasil diperbarui!</div>'
            );
            redirect("dashboard");
        }
    }

    public function user_keluarga_ubah()
    {
        $data['title'] = 'Perbarui Keluarga';
        $this->load->model('Keluarga_model', 'keluarga');

        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $data['keluarga'] = $this->keluarga->getMahasiswaKeluarga($this->session->userdata('id_user'));
        $data['status_hidup'] = $this->db->get('status_hidup')->result_array();
        $data['status_hubungan'] = $this->db->get('status_hubungan')->result_array();
        $data['status_pendidikan'] = $this->db->get('status_pendidikan')->result_array();
        $data['status_pekerjaan'] = $this->db->get('status_pekerjaan')->result_array();

        // Form Input Data Ayah

        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_hidup_ayah', 'Status Ayah', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_hubungan_ayah', 'Status Hubungan Ayah', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_pendidikan_ayah', 'Pendidikan Ayah', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_pekerjaan_ayah', 'Pekerjaan Ayah', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('detail_ayah', 'Detail Ayah', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        // Form Input Data Ibu

        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_hidup_ibu', 'Status Ibu', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_pendidikan_ibu', 'Pendidikan Ibu', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('status_pekerjaan_ibu', 'Pekerjaan Ibu', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('detail_ibu', 'Detail Ibu', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        // Form Input Data Keluarga

        $this->form_validation->set_rules('jumlah_tanggungan', 'Jumlah Tanggungan', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        $this->form_validation->set_rules('no_telepon_orang_tua', 'No Telepon Orang Tua', 'required', [
            'required' => "tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('dashboard/user_keluarga_ubah', $data);
            $this->load->view('layout/footer');
        } else {

            $data_mahasiswa_keluarga = [
                'id_user' => $this->session->userdata('id_user'),
                'id_ayah' => $this->keluarga->getMahasiswaAyahById($this->session->userdata('id_user'))['id'],
                'id_ibu' => $this->keluarga->getMahasiswaIbuById($this->session->userdata('id_user'))['id'],
                'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan'),
                'no_telepon_orang_tua' => $this->input->post('no_telepon_orang_tua')
            ];

            $data_mahasiswa_ayah = [
                'id_user' => $this->session->userdata('id_user'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'id_status_hidup' => $this->input->post('status_hidup_ayah'),
                'id_status_hubungan' => $this->input->post('status_hubungan_ayah'),
                'id_status_pendidikan' => $this->input->post('status_pendidikan_ayah'),
                'id_status_pekerjaan' => $this->input->post('status_pekerjaan_ayah'),
                'detail_ayah' => $this->input->post('detail_ayah')
            ];

            $data_mahasiswa_ibu = [
                'id_user' => $this->session->userdata('id_user'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'id_status_hidup' => $this->input->post('status_hidup_ibu'),
                'id_status_pendidikan' => $this->input->post('status_pendidikan_ibu'),
                'id_status_pekerjaan' => $this->input->post('status_pekerjaan_ibu'),
                'detail_ibu' => $this->input->post('detail_ibu')
            ];

            // var_dump($data_mahasiswa_ayah);
            // var_dump($data_mahasiswa_ibu);
            // var_dump($data_mahasiswa_keluarga);
            // die;

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/foto_bersama_keluarga/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $this->keluarga->getMahasiswaKeluarga($this->session->userdata('id_user'))['foto_bersama_keluarga'];
                    if ($gambar_lama != "default.png") {
                        unlink(FCPATH . 'assets/img/foto_bersama_keluarga/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('foto_bersama_keluarga', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('mahasiswa_keluarga', $data_mahasiswa_keluarga);

            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('mahasiswa_ayah', $data_mahasiswa_ayah);

            $this->db->where('id_user', $this->session->userdata('id_user'));
            $this->db->update('mahasiswa_ibu', $data_mahasiswa_ibu);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success neu-brutalism mb-4">Data keluarga berhasil diperbarui!</div>'
            );
            redirect("dashboard");
        }
    }
}
