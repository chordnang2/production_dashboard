<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi_lokasi extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library('form_validation');
        $this->load->model('Isi_lokasi_model');
    }

    public function index()
    {
   
    }

    public function lokasi()
    {
        $data["tbl_lokasi"]=$this->Isi_lokasi_model->getAll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data/data_lokasi', $data);
        $this->load->view('template/template_table/template_bawah_table');
        
    }

    public function add_lokasi()
    {
        $lokasi = $this->Isi_lokasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($lokasi->rules());

        if ($validation->run()) {
            $lokasi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_lokasi");
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit_lokasi($id_lokasi)
    {
        $id_lokasi = urldecode($id_lokasi);
        $product = $this->Isi_lokasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['tbl_lokasi'] = $this->Isi_lokasi_model->getUserById($id_lokasi);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_lokasi', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function delete_lokasi($id_lokasi)
    {
        $this->Isi_lokasi_model->delete_lokasi($id_lokasi);
        redirect('Isi_lokasi/lokasi');
    }

}
