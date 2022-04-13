<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_bd_m extends CI_Model

{
    private $_table = "tbl_bd_unit";


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
