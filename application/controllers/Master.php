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

    public function review()
    {
        $data = [
            "id_user" => $this->session->userdata('id_user'),
            "id_mahasiswa_pengajuan" => $this->input->post('id_mahasiswa_pengajuan'),
            'tanggal_review' => time(),
            'alasan' => $this->input->post('alasan'),
            'status' => $this->input->post('status_button')
        ];

        $this->db->insert('review_pengajuan', $data);
        $this->db->where('id', $this->input->post('id_mahasiswa_pengajuan'));
        $this->db->update('mahasiswa_pengajuan', ['status_pengajuan' => "Dokumen Diterima"]);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success neu-brutalism mb-4">Dokumen berhasil dikirim!</div>'
        );
        redirect("master");
    }

    public function get_dokumen($id, $id_user)
    {
        $this->load->model('Master_model', 'master');
        $status_pengajuan = $this->master->getStatusPengajuanById($id_user);
        if ($status_pengajuan['status_pengajuan'] == "Menunggu Pengecekan") {
            $this->db->where('id', $status_pengajuan['id']);
            $this->db->update('mahasiswa_pengajuan', ['status_pengajuan' => "Dalam Pengecekan"]);
        }
        $dokumen = $this->master->getDokumenById($id);

        exit(json_encode((array)$dokumen));
    }

    public function pdf()
    {
        $this->load->model('Master_model', 'master');
        $data['nama_pengajuan'] = $this->master->getAllNamaPengajuan();
        $data['title'] = 'Laporan Dokumen Pengajuan Penerima Beasiswa Yayasan STMIK Bandung';

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan-Dokumen-Pengajuan-Penerima-Beasiswa-Yayasan-STMIK-Bandung_" . bulan_indonesia(time()) . ".pdf";
        $this->pdf->load_view('master/laporan_pdf', $data);
    }

    public function get_review($id)
    {
        $this->load->model('Master_model', 'master');
        $cek = $this->master->getReview($id);

        exit(json_encode((array)$cek));
    }
}
