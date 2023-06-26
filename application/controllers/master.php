<?php
defined('BASEPATH') or exit('No direct script access allowed');

class master extends CI_Controller
{
              public function __construct()
              {
                            parent::__construct();
                            cek_sudah_masuk();
              }
              public function index()
              {
                            $data['title'] = 'Dashboard';
                            $data['user'] = $this->db->get_where('user_data', ['email' => $this->session->userdata('email')])->row_array();
                            
                            $this->load->model('master_model', 'master');
                            $data['pengajuan'] = $this->master->getAllNamaPengajuan();

                            $this->load->view('layout/header', $data);
                            $this->load->view('layout/topbar');
                            $this->load->view('layout/sidebar');
                            $this->load->view('master/index');
                            $this->load->view('layout/footer');
              }
}
