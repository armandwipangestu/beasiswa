<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_sudah_masuk();
    }

    public function index()
    {
        $data['title'] = 'List Pemohon';
        $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Master_model', 'master');
        $data['nama_pengajuan'] = $this->master->getAllNamaPengajuan();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('master/list_pemohon', $data);
        $this->load->view('layout/footer');
    }

    public function get_dokumen($id)
    {
        $this->load->model('Master_model', 'master');
        $dokumen = $this->master->getDokumenById($id);

        exit(json_encode((array)$dokumen));
    }
}
