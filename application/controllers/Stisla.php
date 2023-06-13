<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stisla extends CI_Controller
{
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('stisla');
        $this->load->view('layout/footer');
    }
}
