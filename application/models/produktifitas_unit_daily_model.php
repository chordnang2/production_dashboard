<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produktifitas_unit_daily_model extends CI_Model
{
    public function gettonhmvolvo($tanggal)
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $tahun = date("Y",$t);
        $bulan = date("m",$t);
        for ($i=1; $i <32 ; $i++) { 
            $tanggal= '0'$i;
        }
        
        
        $query = $this->db->query("    SELECT AVG(a) as a
        FROM
        (
            SELECT unit,SUM(`tbl_highlight`.`tonase`)/tbl_hm.total_hm as a                     
        FROM `tbl_unit4digit` 
            LEFT JOIN `tbl_highlight` ON `tbl_highlight`.`unit` = `tbl_unit4digit`.`id` 
            LEFT JOIN `tbl_hm` ON `tbl_hm`.`unit_day` = `tbl_unit4digit`.`id` WHERE  date='$tahun-$bulan-$tanggal' AND tanggal='$tahun-$bulan-$tanggal' AND tbl_unit4digit.vessel4 NOT in ('SCANIA sst 82')  group by tbl_unit4digit.id) as inner_query");

        return $query->result();
    }

}
