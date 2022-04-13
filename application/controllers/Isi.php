<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/template_dashboard/template_atas_dashboard');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/isi_awal');
        $this->load->view('template/template_dashboard/template_bawah_dashboard');
    }
}