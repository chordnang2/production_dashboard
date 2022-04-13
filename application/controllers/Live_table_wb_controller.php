<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Live_table_wb_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Live_table_wb_model', 'MLiveTable');
    }

    function inline()
    {

        $this->load->view("inlineediting");
    }
    function index()
    {
        $data["unit"] = $this->MLiveTable->get_no_unit();
        $data["loadp"] = $this->MLiveTable->get_load_point();
        $this->load->view("live_table", $data);
    }

    function load_data()
    {
        $data = $this->MLiveTable->load_data();
        echo json_encode($data); // ubah array jadi json
    }

    // method simpan data ke db
    function insert_data()
    {
        $data = [
            'shift'        => $this->input->post('shift'),
            'no_unit'        => $this->input->post('no_unit'),
            'tipe_vessel' => $this->input->post('tipe_vessel'),
            'loading_point' => $this->input->post('loading_point'),
            'type' => $this->input->post('type'),
            'weighbridge' => $this->input->post('weighbridge'),
            'no_transaction' => $this->input->post('no_transaction'),
            'gross' => $this->input->post('gross'),
            'tare' => $this->input->post('tare'),
            'nett' => $this->input->post('nett'),
            'time_in' => $this->input->post('time_in'),
            'time_out' => $this->input->post('time_out'),
            'tipping' => $this->input->post('tipping'),
            'remaks' => $this->input->post('remaks'),
            'target' => $this->input->post('target'),
            'precentage' => $this->input->post('precentage'),
            'loss_weight' => $this->input->post('loss_weight'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
            'date' => $this->input->post('date')
        ];
        $this->MLiveTable->insert_data($data);
    }

    //method udpate data
    function update_data()
    {
        $data = [
            $this->input->post('table_column') => $this->input->post('value')
        ];
        $this->MLiveTable->update_data($data, $this->input->post('id_wb'));
    }

    // method delete data
    function delete()
    {
        $this->MLiveTable->delete($this->input->post('id_wb'));
    }
}
