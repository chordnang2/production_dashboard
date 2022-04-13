<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_highlight_model extends CI_Model
{

    public function cek_tanggal_terupdate()
    {
        $query = $this->db->query("SELECT date as tanggal_update FROM `tbl_wb2` ORDER BY date DESC LIMIT 1");

        return $query->result_array();
    }

    public function produksi_jam($tanggal_parameter)
    {
        $query = $this->db->query("SELECT round(SUM(nett)/1000) as produksiperjam  FROM tbl_wb2 WHERE  date = '$tanggal_parameter'");

        return $query->result_array();
    }
    public function avg_trip($tanggal_parameter)
    {
        $query = $this->db->query("SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit

        from (

            SELECT  COUNT(DISTINCT(no_unit)) curVal

            FROM tbl_wb2

            WHERE date = '$tanggal_parameter'

        ) a,

        (

            SELECT  COUNT(no_unit) curVal

            FROM tbl_wb2

            WHERE  date ='$tanggal_parameter'

        ) b");

        return $query->result_array();
    }
    public function avg_muatan($tanggal_parameter)
    {
        $query = $this->db->query("SELECT AVG(a) as avg_muatan FROM(SELECT AVG(nett)/1000 as a,nett,`tbl_wb2`.loading_point,no_unit,`tbl_km_lokasi`.nama_lokasi
        FROM `tbl_wb2`LEFT JOIN `tbl_km_lokasi` ON `tbl_km_lokasi`.`nama_lokasi` = `tbl_wb2`.`loading_point` WHERE date =  '$tanggal_parameter'  group by loading_point order by a ASC ) c");
        return $query->result_array();
    }
}


/* End of file Api_highlight_model.php and path \application\models\Api_highlight_model.php */
