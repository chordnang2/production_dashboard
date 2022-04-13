<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_produksi_m extends CI_Model

{
    private $_table = "tbl_timbangan";


    public function ritasi_per_jam($first_date,$second_date)
    {
       $this->db->select("*");
       $this->db->from('tbl_timbangan');
       $this->db->where("DATE_FORMAT(date,'%Y-%m-%d') >='$first_date'");
       $this->db->where("DATE_FORMAT(date,'%Y-%m-%d') <='$second_date'");
       $query = $this->db->get();
       return $query->result();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
