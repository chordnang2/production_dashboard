<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Template_kiri_model extends CI_Model
{
    public function senyiur()
    {
        $hsl = $this->db->query("SELECT id_wb,(replace(replace(shift,'DS','Siang'),'NS','Malam'))as shift,DATE_FORMAT(date, '%e %M %Y') as date, time_out FROM `tbl_wb2`  
        ORDER BY `tbl_wb2`.`id_wb` DESC");

        return $hsl->result();
    }
    public function gunungsari()
    {
        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_driver_ritasi_gunungsari`  
        ORDER BY `tbl_driver_ritasi_gunungsari`.`id`  DESC");

        return $hsl->result();
    }
    public function dispatch()
    {
        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_dispatch`  
        ORDER BY `tbl_dispatch`.`id` DESC");

        return $hsl->result();
    }
    public function fms()
    {
        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `cycle_summary`  
        ORDER BY `cycle_summary`.`date` DESC");

        return $hsl->result();
    }
    public function hm()
    {
        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_hm`  
        ORDER BY `tbl_hm`.`id`  DESC");

        return $hsl->result();
    }
    public function highlight()
    {
        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_highlight`  
        ORDER BY `tbl_highlight`.`id`  DESC");

        return $hsl->result();
    }
    public function dmbd()
    {
        $hsl = $this->db->query("SELECT id,DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_dmbd`  
        ORDER BY `tbl_dmbd`.`id`  DESC");

        return $hsl->result();
    }
}
