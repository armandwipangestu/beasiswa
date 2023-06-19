<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
        $timestamp = $data['user']['date_created'];
        $date = date('d F Y', $timestamp);
        $data['tanggal_bergabung'] = $date;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('layout/footer');
    }

    public function ubah()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[3]', [
            'required' => "tidak boleh kosong"
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('user/ubah');
            $this->load->view('layout/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                // $path_file = base_url('assets/img/profile/') . $data['user']['image'];
                // unlink($path_file);
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != "default.png") {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user_data');

            $this->session->set_flashdata('message', '<div class="alert alert-success neu-brutalism">Profil berhasil diubah!</div>');
            redirect('user');
        }
    }
}
