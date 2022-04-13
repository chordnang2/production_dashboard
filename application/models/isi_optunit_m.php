<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_optunit_m extends CI_Model

{
    public function optunit()
    {
        // $this->db->select('tbl_opt.*, tbl_unitmha.nrp AS nrp, tbl_opt.nama_operator,tbl_unitmha.tipe,tbl_unitmha.no_unit,tbl_unitmha.status ');
        // $this->db->join('tbl_unitmha', 'tbl_opt.nrp = tbl_unitmha.nrp');
        // $this->db->from('tbl_opt');
        // $query = $this->db->get();
        // return $query->result();

        // $this->db->select('a.*, b.*');
        // $this->db->from('tbl_opt as a');
        // $this->db->join('tbl_unitmha as b', 'a.nrp = b.nrp');
        // $query = $this->db->get();
        // return $query->result();

        $query  = $this->db->query("select a.*, b.* from tbl_opt as a inner join tbl_unitmha as b on a.nrp = b.nrp");
        return $query->result();
    }
}
