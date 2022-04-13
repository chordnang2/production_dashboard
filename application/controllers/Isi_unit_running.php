<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Isi_unit_running extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->library('form_validation');
        $this->load->model('Isi_unit_running_model', 'MLiveTable');
    }

    public function index()
    {
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_unit_running');
    }
    function load_data()
    {
        $data = $this->MLiveTable->load_data();
        echo json_encode($data); // ubah array jadi json
    }

    function insert_data()
    {
        $data =
            [
                'id' => $this->input->post('id'),
                'status'   => $this->input->post('status'),
            ];

        $this->MLiveTable->insert_data($data);
    }

    function update_data()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->MLiveTable->update_data($data, $this->input->post('id'));
    }



    function delete()
    {
        $this->MLiveTable->delete($this->input->post('id'));
    }

    public function produktifitas_unit()
    {
        $data["get_unit_running"] = $this->Isi_unit_running_model->get_unit_running();

        $data["get_unit_nosetvessel6"] = $this->Isi_unit_running_model->get_unit_nosetvessel6();
        $data["get_unit_nosetvessel10"] = $this->Isi_unit_running_model->get_unit_nosetvessel10();
        $data["get_unit_nosetvessel14"] = $this->Isi_unit_running_model->get_unit_nosetvessel14();
        $data["get_unit_nosetvessel17"] = $this->Isi_unit_running_model->get_unit_nosetvessel17();
        $data["get_unit_nosetvessel18"] = $this->Isi_unit_running_model->get_unit_nosetvessel18();
        $data["get_unit_nosetvessel22"] = $this->Isi_unit_running_model->get_unit_nosetvessel22();
        $data["get_unit_nosetvessel2"] = $this->Isi_unit_running_model->get_unit_nosetvessel2();
        $data["get_unit_nosetvessel5"] = $this->Isi_unit_running_model->get_unit_nosetvessel5();

        $data["get_unit_service6"] = $this->Isi_unit_running_model->get_unit_service6();
        $data["get_unit_service10"] = $this->Isi_unit_running_model->get_unit_service10();
        $data["get_unit_service14"] = $this->Isi_unit_running_model->get_unit_service14();
        $data["get_unit_service17"] = $this->Isi_unit_running_model->get_unit_service17();
        $data["get_unit_service18"] = $this->Isi_unit_running_model->get_unit_service18();
        $data["get_unit_service22"] = $this->Isi_unit_running_model->get_unit_service22();
        $data["get_unit_service2"] = $this->Isi_unit_running_model->get_unit_service2();
        $data["get_unit_service5"] = $this->Isi_unit_running_model->get_unit_service5();

        $data["get_unit_bd6"] = $this->Isi_unit_running_model->get_unit_bd6();
        $data["get_unit_bd10"] = $this->Isi_unit_running_model->get_unit_bd10();
        $data["get_unit_bd14"] = $this->Isi_unit_running_model->get_unit_bd14();
        $data["get_unit_bd17"] = $this->Isi_unit_running_model->get_unit_bd17();
        $data["get_unit_bd18"] = $this->Isi_unit_running_model->get_unit_bd18();
        $data["get_unit_bd22"] = $this->Isi_unit_running_model->get_unit_bd22();
        $data["get_unit_bd2"] = $this->Isi_unit_running_model->get_unit_bd2();
        $data["get_unit_bd5"] = $this->Isi_unit_running_model->get_unit_bd5();

        $data["get_unit_stb6"] = $this->Isi_unit_running_model->get_unit_stb6();
        $data["get_unit_stb10"] = $this->Isi_unit_running_model->get_unit_stb10();
        $data["get_unit_stb14"] = $this->Isi_unit_running_model->get_unit_stb14();
        $data["get_unit_stb17"] = $this->Isi_unit_running_model->get_unit_stb17();
        $data["get_unit_stb18"] = $this->Isi_unit_running_model->get_unit_stb18();
        $data["get_unit_stb22"] = $this->Isi_unit_running_model->get_unit_stb22();
        $data["get_unit_stb2"] = $this->Isi_unit_running_model->get_unit_stb2();
        $data["get_unit_stb5"] = $this->Isi_unit_running_model->get_unit_stb5();

        $data["get_unit_accident6"] = $this->Isi_unit_running_model->get_unit_accident6();
        $data["get_unit_accident10"] = $this->Isi_unit_running_model->get_unit_accident10();
        $data["get_unit_accident14"] = $this->Isi_unit_running_model->get_unit_accident14();
        $data["get_unit_accident17"] = $this->Isi_unit_running_model->get_unit_accident17();
        $data["get_unit_accident18"] = $this->Isi_unit_running_model->get_unit_accident18();
        $data["get_unit_accident22"] = $this->Isi_unit_running_model->get_unit_accident22();
        $data["get_unit_accident2"] = $this->Isi_unit_running_model->get_unit_accident2();
        $data["get_unit_accident5"] = $this->Isi_unit_running_model->get_unit_accident5();

        $this->load->view('template/template_dashboard/template_atas_dashboard');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_dashboard/data_produktifitas_unit', $data);
        $this->load->view('template/template_dashboard/template_bawah_dashboard');
    }
    public function running()
    {
        $data["running"] = $this->Isi_unit_running_model->getAll();
        $this->load->view('template/template_table/template_atas_table');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/data_gabungan/data_unit_running', $data);
        $this->load->view('template/template_table/template_bawah_table');
    }

    public function add_bd()
    {
        $bd = $this->Isi_unit_running_model;
        $validation = $this->form_validation;
        $validation->set_rules($bd->rules());

        if ($validation->run()) {
            $bd->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['unit'] = $this->Isi_unit_running_model->get_unit4digit();
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view("isi/form/form_add_unit_running", $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function edit_bd($no)
    {
        // $no = urldecode($no);
        $bd = $this->Isi_unit_running_model;
        $validation = $this->form_validation;
        $validation->set_rules($bd->rules());

        if ($validation->run()) {
            $bd->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data['unit4'] = $this->Isi_unit_running_model->get_unit4digit();
        $data['running'] = $this->Isi_unit_running_model->getUserById($no);
        $this->load->view('template/template_form/template_atas_form');
        $this->load->view('template/template_kiri');
        $this->load->view('isi/form/form_edit_unit_running', $data);
        $this->load->view('template/template_form/template_bawah_form');
    }

    public function delete_bd($no)
    {
        $this->Isi_unit_running_model->delete_bd($no);
        redirect('Isi_unit_running/running');
    }
}

/* End of file Isi_unit_running.php and path /application/controllers/Isi_unit_running.php */
