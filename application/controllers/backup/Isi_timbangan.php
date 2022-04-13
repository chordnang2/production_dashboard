<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Isi_timbangan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('isi_timbangan_m');
    $this->load->model('Produksi_net_perjam_m');
    $this->load->model('Produksi_ritasi_perjam_m');
  }



  public function index()
  {
  }

  public function load_timbangan()
  {
    $data["data_timbangan"] = $this->isi_timbangan_m->timbangan();
    $this->load->view('template/template_table/template_atas_table');
    $this->load->view('template/template_kiri');
    $this->load->view('isi/data_gabungan/data_timbangan', $data);
    $this->load->view('template/template_table/template_bawah_table');
  }
  public function produksiperjam()
  {
    $data['jam7'] = $this->Produksi_net_perjam_m->jam7();
    $data['jam8'] = $this->Produksi_net_perjam_m->jam8();
    $data['jam9'] = $this->Produksi_net_perjam_m->jam9();
    $data['jam10'] = $this->Produksi_net_perjam_m->jam10();
    $data['jam11'] = $this->Produksi_net_perjam_m->jam11();
    $data['jam12'] = $this->Produksi_net_perjam_m->jam12();
    $data['jam13'] = $this->Produksi_net_perjam_m->jam13();
    $data['jam14'] = $this->Produksi_net_perjam_m->jam14();
    $data['jam15'] = $this->Produksi_net_perjam_m->jam15();
    $data['jam16'] = $this->Produksi_net_perjam_m->jam16();
    $data['jam17'] = $this->Produksi_net_perjam_m->jam17();
    $data['jam18'] = $this->Produksi_net_perjam_m->jam18();

    $data['jam7r'] = $this->Produksi_ritasi_perjam_m->jam7r();
    $data['jam8r'] = $this->Produksi_ritasi_perjam_m->jam8r();
    $data['jam9r'] = $this->Produksi_ritasi_perjam_m->jam9r();
    $data['jam10r'] = $this->Produksi_ritasi_perjam_m->jam10r();
    $data['jam11r'] = $this->Produksi_ritasi_perjam_m->jam11r();
    $data['jam12r'] = $this->Produksi_ritasi_perjam_m->jam12r();
    $data['jam13r'] = $this->Produksi_ritasi_perjam_m->jam13r();
    $data['jam14r'] = $this->Produksi_ritasi_perjam_m->jam14r();
    $data['jam15r'] = $this->Produksi_ritasi_perjam_m->jam15r();
    $data['jam16r'] = $this->Produksi_ritasi_perjam_m->jam16r();
    $data['jam17r'] = $this->Produksi_ritasi_perjam_m->jam17r();
    $data['jam18r'] = $this->Produksi_ritasi_perjam_m->jam18r();


    $data['jum_ri_shift1'] = $this->isi_timbangan_m->jumlah_ritasi_shift1();
    $data['jum_unit_rfu'] = $this->isi_timbangan_m->jumlah_unit_rfu();

    $data['jum_silo_shift1'] = $this->isi_timbangan_m->jumlah_silo_shift1();
    $data['jum_coalpad2lh_shift1'] = $this->isi_timbangan_m->jumlah_coalpad2lh_shift1();
    $data['jum_coalpad3a__shift1'] = $this->isi_timbangan_m->jumlah_coalpad3a_shift1();
    $data['jum_coalpad2_shift1'] = $this->isi_timbangan_m->jumlah_coalpad2_shift1();
    $data['jum_coalpad3_shift1'] = $this->isi_timbangan_m->jumlah_coalpad3_shift1();
    $data['jum_icfrom1_shift1'] = $this->isi_timbangan_m->jumlah_icfrom1_shift1();
    $data['jum_panel1icf_shift1'] = $this->isi_timbangan_m->jumlah_panel1icf_shift1();
    $data['jum_f31icf_shift1'] = $this->isi_timbangan_m->jumlah_f31icf_shift1();
    $data['jum_coalpadfsp_shift1'] = $this->isi_timbangan_m->jumlah_coalpadfsp_shift1();
    
    $data['jum_silo_shift2'] = $this->isi_timbangan_m->jumlah_silo_shift2();
    $data['jum_coalpad2lh_shift2'] = $this->isi_timbangan_m->jumlah_coalpad2lh_shift2();
    $data['jum_coalpad3a__shift2'] = $this->isi_timbangan_m->jumlah_coalpad3a_shift2();
    $data['jum_coalpad2_shift2'] = $this->isi_timbangan_m->jumlah_coalpad2_shift2();
    $data['jum_coalpad3_shift2'] = $this->isi_timbangan_m->jumlah_coalpad3_shift2();
    $data['jum_icfrom1_shift2'] = $this->isi_timbangan_m->jumlah_icfrom1_shift2();
    $data['jum_panel1icf_shift2'] = $this->isi_timbangan_m->jumlah_panel1icf_shift2();
    $data['jum_f31icf_shift2'] = $this->isi_timbangan_m->jumlah_f31icf_shift2();
    $data['jum_coalpadfsp_shift2'] = $this->isi_timbangan_m->jumlah_coalpadfsp_shift2();
    
    $data['jum_silo_shift3'] = $this->isi_timbangan_m->jumlah_silo_shift3();
    $data['jum_coalpad2lh_shift3'] = $this->isi_timbangan_m->jumlah_coalpad2lh_shift3();
    $data['jum_coalpad3a__shift3'] = $this->isi_timbangan_m->jumlah_coalpad3a_shift3();
    $data['jum_coalpad2_shift3'] = $this->isi_timbangan_m->jumlah_coalpad2_shift3();
    $data['jum_coalpad3_shift3'] = $this->isi_timbangan_m->jumlah_coalpad3_shift3();
    $data['jum_icfrom1_shift3'] = $this->isi_timbangan_m->jumlah_icfrom1_shift3();
    $data['jum_panel1icf_shift3'] = $this->isi_timbangan_m->jumlah_panel1icf_shift3();
    $data['jum_f31icf_shift3'] = $this->isi_timbangan_m->jumlah_f31icf_shift3();
    $data['jum_coalpadfsp_shift3'] = $this->isi_timbangan_m->jumlah_coalpadfsp_shift3();

    $data['jum_underload_shift1'] = $this->isi_timbangan_m->jumlah_underload_shift1();
    $data['under_silo_shift1'] = $this->isi_timbangan_m->under_silo_shift1();
    $data['under_silo_minus_shift1'] = $this->isi_timbangan_m->under_silo_minus_shift1();
    $data['under_coalpad2lh_shift1'] = $this->isi_timbangan_m->under_coalpad2lh_shift1();
    $data['under_coalpad2lh_minus_shift1'] = $this->isi_timbangan_m->under_coalpad2lh_minus_shift1();
    $data['under_coalpad3a_shift1'] = $this->isi_timbangan_m->under_coalpad3a_shift1();
    $data['under_coalpad3a_minus_shift1'] = $this->isi_timbangan_m->under_coalpad3a_minus_shift1();
    $data['under_coalpad2_shift1'] = $this->isi_timbangan_m->under_coalpad2_shift1();
    $data['under_coalpad2_minus_shift1'] = $this->isi_timbangan_m->under_coalpad2_minus_shift1();
    $data['under_coalpad3_shift1'] = $this->isi_timbangan_m->under_coalpad3_shift1();
    $data['under_coalpad3_minus_shift1'] = $this->isi_timbangan_m->under_coalpad3_minus_shift1();
    $data['under_icfrom1_shift1'] = $this->isi_timbangan_m->under_icfrom1_shift1();
    $data['under_icfrom1_minus_shift1'] = $this->isi_timbangan_m->under_icfrom1_minus_shift1();
    $data['under_panel1icf_shift1'] = $this->isi_timbangan_m->under_panel1icf_shift1();
    $data['under_panel1icf_minus_shift1'] = $this->isi_timbangan_m->under_panel1icf_minus_shift1();
    $data['under_f31icf_shift1'] = $this->isi_timbangan_m->under_f31icf_shift1();
    $data['under_f31icf_minus_shift1'] = $this->isi_timbangan_m->under_f31icf_minus_shift1();
    $data['under_coalpadfsp_shift1'] = $this->isi_timbangan_m->under_coalpadfsp_shift1();
    $data['under_coalpadfsp_minus_shift1'] = $this->isi_timbangan_m->under_coalpadfsp_minus_shift1();
    $this->load->view('template/template_dashboard/template_atas_dashboard');
    $this->load->view('template/template_kiri');
    $this->load->view('isi/data_dashboard/data_produksi_perjam', $data);
    $this->load->view('template/template_dashboard/template_bawah_dashboard');
  }

  public function add_timbangan()
  {
    $data["opt"] = $this->isi_timbangan_m->data_tambah_opt();
    $data["unit"] = $this->isi_timbangan_m->data_tambah_unit();
    $data["lokasi"] = $this->isi_timbangan_m->data_tambah_lokasi();
    $data["vessel"] = $this->isi_timbangan_m->data_tambah_vessel();
    $timbangan = $this->isi_timbangan_m;
    $validation = $this->form_validation;
    $validation->set_rules($timbangan->rules());

    if ($validation->run()) {
      $timbangan->save();
      $this->session->set_flashdata('success', 'Berhasil disimpan');
    }
    $this->load->view('template/template_form/template_atas_form');
    $this->load->view('template/template_kiri');
    $this->load->view("isi/form/form_add_timbangan", $data);
    $this->load->view('template/template_form/template_bawah_form');
  }

  public function edit_timbangan($id_timbangan)
  {
    $data["tbl_timbangan"] = $this->isi_timbangan_m->getAll();
    $data['tbl_timbangan'] = $this->isi_timbangan_m->getUserById($id_timbangan);
    $data["opt"] = $this->isi_timbangan_m->data_tambah_opt();
    $data["unit"] = $this->isi_timbangan_m->data_tambah_unit();
    $data["lokasi"] = $this->isi_timbangan_m->data_tambah_lokasi();
    $data["vessel"] = $this->isi_timbangan_m->data_tambah_vessel();
    $this->load->view('template/template_form/template_atas_form');
    $this->load->view('template/template_kiri');
    $this->load->view('isi/form/form_edit_timbangan', $data);
    $this->load->view('template/template_form/template_bawah_form');
  }

  public function delete_timbangan($id_timbangan)
  {
    $this->isi_timbangan_m->delete_timbangan($id_timbangan);
    redirect('isi_timbangan/load_timbangan');
  }
}
