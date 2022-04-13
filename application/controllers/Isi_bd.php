<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Isi_bd extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library('form_validation');
        $this->load->model('Isi_bd_m');
    }

    public function index()
    {
   
    }

    public function bd()
    {
        $data["tbl_bd"]=$this->Isi_bd_m->getAll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_bd', $data);
        $this->load->view('template/template_table/template_bawah_table');
        
    }

    public function add_bd()
    {
        $bd = $this->Isi_bd_m;
        $validation = $this->form_validation;
        $validation->set_rules($bd->rules());

        if ($validation->run()) {
            $bd->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_bd");
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit_bd($id_bd)
    {
        $data["tbl_bd"]= $this->Isi_bd_m->getAll();
        $data['tbl_bd'] = $this->Isi_bd_m->getUserById($id_bd);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_bd', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function delete_bd($id_bd)
    {
        $this->Isi_bd_m->delete_bd($id_bd);
        redirect('isi_bd/bd');
    }

}
