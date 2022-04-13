<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi_unit extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Isi_unit_model');
    }

    public function index()
    {
   
    }

    public function unit()
    {
        $data["tbl_unit"]=$this->Isi_unit_model->getAll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data/data_unit', $data);
        $this->load->view('template/template_table/template_bawah_table');
        
    }

    public function add_unit()
    {
        $unit = $this->Isi_unit_model;
        $validation = $this->form_validation;
        $validation->set_rules($unit->rules());

        if ($validation->run()) {
            $unit->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_unit");
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit_unit($no_unit)
    {
     
        $no_unit = urldecode($no_unit);
        $product = $this->Isi_unit_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['tbl_unit'] = $this->Isi_unit_model->getUserById($no_unit);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_unit', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function delete_unit($no_unit)
    {
        $this->Isi_unit_model->delete_unit($no_unit);
        redirect('Isi_unit/unit');
    }

}
