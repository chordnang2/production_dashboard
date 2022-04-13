<?php

defined('BASEPATH') or exit('No direct script access allowed');

class P_operator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('P_operator_model');
    }
    public function index()
    {
    }

    public function all_nrp()
    {
        $data["cn"] = $this->P_operator_model->count_all_nrp();
        $data["gn"] = $this->P_operator_model->group_by_nrp();
        $this->load->view('template/template_simpletable/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_detail_dashboard/data_detail_dashboard_operator', $data);
        $this->load->view('template/template_simpletable/template_bawah_table');
    }
    public function select_nrp()
    {
        $nrp = $this->input->post('nrp');
        $data["cb"] = $this->P_operator_model->count_nrp_bawaan($nrp);
        $data["cg"] = $this->P_operator_model->count_nrp_gantungan($nrp);
        $data["gn"] = $this->P_operator_model->group_by_nrp();

        $this->load->view('template/template_simpletable/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_detail_dashboard/data_detail_dashboard_operator_1', $data);
        $this->load->view('template/template_simpletable/template_bawah_table');
    }
}

/* End of file P_operator.php and path /application/controllers/P_operator.php */
