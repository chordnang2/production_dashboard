<?php
defined('BASEPATH') or exit('No direct script access allowed');

class analisa_opt extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('analisa_opt_model');
  }

  public function index()
  {
    $data['unitsc'] = $this->analisa_opt_model->unitSchedule();
    // $this->load->view('dynamic_chart', $data);
    $this->load->view('template/template_table/template_atas_table');
    $this->load->view('template/template_kiri');
    $this->load->view('isi/data_dashboard/data_produktifitas_unit', $data);
    $this->load->view('template/template_table/template_bawah_table');
    // $this->load->helper('url');
    // $this->load->helper('form');

    // $tanggal = $this->analisa_opt->get_list_tanggal();
    // $nrp = $this->analisa_opt->get_list_nrp();
    // $trip = $this->analisa_opt->get_list_trip();

    // $opt = array('' => 'SEMUA TANGGAL');
    // foreach ($tanggal as $tanggal_tpl) {
    //     $opt[$tanggal_tpl] = $tanggal_tpl;
    // }
    // $opt2 = array('' => 'SEMUA NRP');
    // foreach ($nrp as $nrp_tpl) {
    //     $opt2[$nrp_tpl] = $nrp_tpl;
    // }
    // $opt3 = array('' => 'SEMUA JUMLAH TRIP');
    // foreach ($trip as $trip_tpl) {
    //     $opt3[$trip_tpl] = $trip_tpl;
    // }

    // $data['tanggal_tpl'] = form_dropdown('', $opt, '', 'id="tanggal" class="form-control"');
    // $data['nrp_tpl'] = form_dropdown('', $opt2, '', 'id="nrp" class="form-control"');
    // $data['trip_tpl'] = form_dropdown('', $opt3, '', 'id="trip" class="form-control"');
    // $this->load->view('template/template_table_search/template_atas_table_search');
    // $this->load->view('template/template_kiri');
    // $this->load->view('isi/data_gabungan/backup/data_analisa_opt copy', $data);
    // $this->load->view('template/template_table_search/template_bawah_table_search');
  }

  // public function pencarian()
  // {
  //   $tanggal = $this->input->get('tanggal');
  //   $nrp = $this->input->get('nrp');
  //   $data['hasil'] = $this->analisa_opt_model->pencarian_d($tanggal, $nrp)->result_array();
  //   $this->load->view('template/template_table/template_atas_table');
  //   $this->load->view('template/template_kiri');
  //   $this->load->view('isi/data_dashboard/data_produktifitas_unit', $data);
  //   $this->load->view('template/template_table/template_bawah_table'); // ini view menampilkan hasil pencarian
  // }
  // function fetch_data()
  // {
  //   if ($this->input->post('tanggal')) {
  //     $chart_data = $this->analisa_opt_model->fetch_chart_data($this->input->post('tanggal'));

  //     foreach ($chart_data->result_array() as $row) {
  //       $output[] = array(
  //         'nrp'  => $row["nrp"],
  //         'trip' => floatval($row["trip"])
  //       );
  //     }
  //     echo json_encode($output);
  //   }
  // }

  // public function load_anal_opt()
  // {
  //   $data['opt'] = $this->analisa_opt_model->get_all();

  //   $this->load->view('template/template_table/template_atas_table');
  //   $this->load->view('template/template_kiri');
  //   $this->load->view('isi/data_gabungan/data_analisa_opt', $data);
  //   $this->load->view('template/template_table/template_bawah_table');
  // }
  // public function load_anal_opt_jan()
  // {
  //   $data['jan'] = $this->analisa_opt_model->januari();
  //   $this->load->view('template/template_table/template_atas_table');
  //   $this->load->view('template/template_kiri');
  //   $this->load->view('isi/data_gabungan/data_analisa_opt', $data);
  //   $this->load->view('template/template_table/template_bawah_table');
  // }

  // public function ajax_list()
  // {
  //     $list = $this->analisa_opt->get_datatables();
  //     $data = array();
  //     $no = $_POST['start'];
  //     // $hmunit = $this->analisa_opt->hm_unit;
  //     // $trip = $this->analisa_opt->trip;

  //     foreach ($list as $analisa_opt) {
  //         $no++;
  //         // $hmunit = $this->rowanalisa_opt->hm_unit;
  //         // $trip = $this->analisa_opt->trip;
  //         // $jam_trip=$hmunit/$trip;

  //         $row = array();
  //         $row[] = $no;
  //         $row[] = $analisa_opt->tanggal;
  //         $row[] = $analisa_opt->nrp;
  //         $row[] = $analisa_opt->trip;
  //         $row[] = $analisa_opt->location;
  //         $row[] = $analisa_opt->shift;
  //         $row[] = $analisa_opt->unit;
  //         $row[] = $analisa_opt->hm_unit;
  //         $row[] = $analisa_opt->jam_trip;
  //         $row[] = $analisa_opt->keterangan;

  //         $data[] = $row;
  //     }

  //     $output = array(
  //         "draw" => $_POST['draw'],
  //         "recordsTotal" => $this->analisa_opt->count_all(),
  //         "recordsFiltered" => $this->analisa_opt->count_filtered(),
  //         "data" => $data,
  //     );
  //     //output to json format
  //     echo json_encode($output);
  // }
}
