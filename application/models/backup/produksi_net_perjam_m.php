<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_net_perjam_m extends CI_Model

{

    public function jam7()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '07:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam8()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '08:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam9()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '09:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam10()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '10:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam11()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '11:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam12()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '12:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam13()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '13:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam14()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '14:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam15()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '15:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam16()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '16:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam17()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '17:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam18()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '18:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam19()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '19:00:00' AND '19:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam20()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '19:00:00' AND '20:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam21()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '19:00:00' AND '21:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam22()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '19:00:00' AND '22:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam23()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '19:00:00' AND '23:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam00()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '00:01:00' AND '00:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '01:00:00' AND '01:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '02:00:00' AND '02:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '03:00:00' AND '03:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam4()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '04:00:00' AND '04:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam5()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '05:00:00' AND '05:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
    public function jam6()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('d-m-y');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '06:00:00' AND '06:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }
}
