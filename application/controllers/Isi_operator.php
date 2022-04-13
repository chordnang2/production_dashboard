<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi_operator extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library('form_validation');
        $this->load->model('Isi_opt_model');
    }

    public function index()
    {
     
    }

    public function operator()
    {
        $data["tbl_opt"]= $this->Isi_opt_model->getAll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data/data_operator', $data);
        $this->load->view('template/template_table/template_bawah_table');
        
    }

    public function add_opt()
    {
        $operator = $this->Isi_opt_model;
        $validation = $this->form_validation;
        $validation->set_rules($operator->rules());

        if ($validation->run()) {
            $operator->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_operator");
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit_opt($nrp)
    {
              
        $product = $this->Isi_opt_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        // $data["tbl_opt"]= $this->Isi_opt_model->getAll();
        $data['tbl_opt'] = $this->Isi_opt_model->getUserById($nrp);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_operator', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function delete_opt($nrp)
    {
        $this->Isi_opt_model->delete_opt($nrp);
        redirect('isi_operator/operator');
    }

}
