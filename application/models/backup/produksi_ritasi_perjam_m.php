<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_ritasi_perjam_m extends CI_Model

{

    public function jam7r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '07:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam8r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '08:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam9r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '09:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam10r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '10:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam11r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '11:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam12r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '12:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam13r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '13:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam14r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '14:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam15r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '15:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam16r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '16:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam17r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '17:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }

    public function jam18r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '07:00:00' AND '18:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    // DIbawah malam    
    public function jam19r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '19:00:00' AND '19:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam20r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '19:00:00' AND '20:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam21r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '19:00:00' AND '21:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam22r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '19:00:00' AND '22:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam23r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '19:00:00' AND '23:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam00r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '00:01:00' AND '00:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam1r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '01:00:00' AND '01:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam2r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '02:00:00' AND '02:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam3r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '03:00:00' AND '03:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam4r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '04:00:00' AND '04:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam5r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '05:00:00' AND '05:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam6r()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT  COUNT(tbl_timbangan.id_timbangan) as total
        FROM `tbl_timbangan` 
        LEFT JOIN `tbl_unit` ON `tbl_timbangan`.`no_unit` = `tbl_unit`.`no_unit`
        WHERE time_out
        BETWEEN '06:00:00' AND '06:59:00'
        AND date ='$now'
        AND status='RFU' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
   
   
}
