<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hello extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Hello";
        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('hello/hello');
        $this->load->view('layout/footer');
    }
}
