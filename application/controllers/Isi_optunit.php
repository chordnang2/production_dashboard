<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Isi_optunit extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->cek_login();
    $this->load->library('form_validation');
    $this->load->model('Isi_optunit_m');
  }

  public function index()
  {
  }

  public function load_optunit()
  {
    $data["data_opt_unit"] = $this->Isi_optunit_m->timbangan();
    $this->load->view('template/template_table/template_atas_table');
    $this->load->view('template/template_kiri');
    $this->load->view('isi/data_gabungan/data_optunit', $data);
    $this->load->view('template/template_table/template_bawah_table');
  }
}
