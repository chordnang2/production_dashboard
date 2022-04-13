<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi_vessel extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library('form_validation');
        $this->load->model('Isi_vessel_model');
    }

    public function index()
    {
    }

    public function vessel()
    {
        $data["tbl_vessel"] = $this->Isi_vessel_model->getAll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data/data_vessel', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }

    public function add_vessel()
    {
        $vessel = $this->Isi_vessel_model;
        $validation = $this->form_validation;
        $validation->set_rules($vessel->rules());

        if ($validation->run()) {
            $vessel->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_vessel");
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit_vessel($id)
    {
        $id = urldecode($id);
        $vessel = $this->Isi_vessel_model;
        $validation = $this->form_validation;
        $validation->set_rules($vessel->rules());

        if ($validation->run()) {
            $vessel->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['tbl_vessel'] = $this->Isi_vessel_model->getUserById($id);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_vessel', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function delete_vessel($id)
    {
        $this->Isi_vessel_model->delete_vessel($id);
        redirect('Isi_vessel/vessel');
    }
}
