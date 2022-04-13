<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class isi_db_opt_model extends CI_Model {


    private $tabel = 'tb_analisa_opt';


    function __construct() {   

    }


    function get_chart_data($start_date, $end_date) {

        $sql = 'SELECT * FROM ' . $this->tabel . ' WHERE DATE(date)>=' . $this->db->escape($start_date) . ' AND DATE(date)<=' . $this->db->escape($end_date);

        $query = $this->db->query($sql);

        $results = $query->result();

        return $results;

    }

}