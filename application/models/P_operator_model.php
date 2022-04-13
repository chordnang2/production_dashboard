<?php

defined('BASEPATH') or exit('No direct script access allowed');

class P_operator_model extends CI_Model
{
    public function count_all_nrp()
    {
        $query = $this->db->query("SELECT `tbl_highlight`.nrp,`tbl_opt`.`nama_operator`, COUNT(`tbl_highlight`.`nomer_wb`) as count 
        FROM `tbl_highlight`  
            LEFT JOIN `tbl_wb2` ON `tbl_highlight`.`nomer_wb` = `tbl_wb2`.`no_transaction`
            JOIN`tbl_opt` ON `tbl_highlight`.`nrp` = `tbl_opt`.`nrp`
            WHERE `shift`='DS' AND `tbl_highlight`.status='OK'");


        return $query->result();
    }
    public function count_nrp_bawaan($nrp)
    {
        $query = $this->db->query("SELECT `tbl_highlight`.`nrp `,`tbl_opt`.`nama_operator`, COUNT(`tbl_highlight`.`nomer_wb`) as count 
        FROM `tbl_highlight`  
            LEFT JOIN `tbl_wb2` ON `tbl_highlight`.`nomer_wb` = `tbl_wb2`.`no_transaction`
            JOIN`tbl_opt` ON `tbl_highlight`.`nrp` = `tbl_opt`.`nrp`
            WHERE `shift`='DS' AND `tbl_highlight`.status='OK' AND `tbl_highlight`.`nrp`='$nrp'");


        return $query->result();
    }
    public function count_nrp_gantungan($nrp)
    {
        $query = $this->db->query(" SELECT `tbl_highlight`.nrp_gantungan, COUNT(`tbl_highlight`.`nomer_wb`) as count 
        FROM `tbl_highlight`  
            LEFT JOIN `tbl_wb2` ON `tbl_highlight`.`nomer_wb` = `tbl_wb2`.`no_transaction`
            WHERE `shift`='DS' AND `tbl_highlight`.status='OK' AND nrp_gantungan='$nrp'");


        return $query->result();
    }
    public function group_by_nrp()
    {
        $query = $this->db->query(" SELECT `tbl_highlight`.nrp
        FROM `tbl_highlight`  
            LEFT JOIN `tbl_wb2` ON `tbl_highlight`.`nomer_wb` = `tbl_wb2`.`no_transaction`
            WHERE `shift`='DS' AND `tbl_highlight`.status='OK' GROUP BY nrp");


        return $query->result();
    }
}


/* End of file P_operator_model_model.php and path /application/models/P_operator_model_model.php */
