<?php



if (!defined('BASEPATH'))

  exit('No direct script access allowed');



class Isi_produksi extends CI_Controller

{

  public function __construct()

  {

    parent::__construct();

    $this->load->library('form_validation');

    $this->load->model('isi_produksi_m');

  }







  public function index()

  {

  }



  public function load_produksi()

  {

    $data["data_produksi"] = $this->isi_produksi_m->ritasi_perjam();

    $this->load->view('template/template_table/template_atas_table');

    $this->load->view('template/template_kiri');

    $this->load->view('isi/data_gabungan/data_produksi', $data);

    $this->load->view('template/template_table/template_bawah_table');

  }



//   public function add_timbangan()

//   {

//     $data["opt"] = $this->isi_timbangan_m->data_tambah_opt();

//     $data["unit"] = $this->isi_timbangan_m->data_tambah_unit();

//     $data["lokasi"] = $this->isi_timbangan_m->data_tambah_lokasi();

//     $data["vessel"] = $this->isi_timbangan_m->data_tambah_vessel();

//     $timbangan = $this->isi_timbangan_m;

//     $validation = $this->form_validation;

//     $validation->set_rules($timbangan->rules());



//     if ($validation->run()) {

//       $timbangan->save();

//       $this->session->set_flashdata('success', 'Berhasil disimpan');

//     }

//     $this->load->view('template/template_form/template_atas_form');

//     $this->load->view('template/template_kiri');

//     $this->load->view("isi/form/form_add_timbangan", $data);

//     $this->load->view('template/template_form/template_bawah_form');

//   }



//   public function edit_timbangan($id_timbangan)

//   {

//     $data["tbl_timbangan"] = $this->isi_timbangan_m->getAll();

//     $data['tbl_timbangan'] = $this->isi_timbangan_m->getUserById($id_timbangan);

//     $data["opt"] = $this->isi_timbangan_m->data_tambah_opt();

//     $data["unit"] = $this->isi_timbangan_m->data_tambah_unit();

//     $data["lokasi"] = $this->isi_timbangan_m->data_tambah_lokasi();

//     $data["vessel"] = $this->isi_timbangan_m->data_tambah_vessel();

//     $this->load->view('template/template_form/template_atas_form');

//     $this->load->view('template/template_kiri');

//     $this->load->view('isi/form/form_edit_timbangan', $data);

//     $this->load->view('template/template_form/template_bawah_form');

//   }



//   public function delete_timbangan($id_timbangan)

//   {

//     $this->isi_timbangan_m->delete_timbangan($id_timbangan);

//     redirect('isi_timbangan/load_timbangan');

//   }

}

