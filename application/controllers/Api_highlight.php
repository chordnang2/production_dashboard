<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_highlight extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_highlight_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url_helper', 'form']);
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Method:PUT,GET,POST,DELETE,OPTIONS');
        header('Access-Control-Allow-Header:Content-Type,x-xsrf-token');
    }
    public function index()
    {
        $cek_tanggal_terupdate = $this->Api_highlight_model->cek_tanggal_terupdate();
        $tanggal_parameter = $cek_tanggal_terupdate[0]['tanggal_update'];

        // hasil
        $data['produksi_jam'] = $this->Api_highlight_model->produksi_jam($tanggal_parameter);
        $data['avg_trip'] = $this->Api_highlight_model->avg_trip($tanggal_parameter);
        $data['avg_muatan'] = $this->Api_highlight_model->avg_muatan($tanggal_parameter);


        // echo "<pre>";
        // print_r ($data['avg_muatan']);
        // echo "</pre>";
        // die();

        $json = array();
        if (!empty($data)) {
            $json = array(
                $data['produksi_jam'][0]['produksiperjam'],
                ROUND($data['avg_trip'][0]['avgrit'],
                $data['avg_trip'][0]['a'],
                $data['avg_trip'][0]['b'],
                $data['avg_muatan'][0]['avg_muatan'],
            );
        } else {
            $json = array();
        }
        echo json_encode($json);

        // echo "<pre>";
        // print_r($json);
        // echo "</pre>";

        // 

    }
}

/* End of file Api_highlight.php and path \application\controllers\Api_highlight.php */
