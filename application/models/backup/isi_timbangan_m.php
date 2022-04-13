<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_timbangan_m extends CI_Model

{
    private $_table = "tbl_timbangan";

    public function rules()
    {
        return [
            [
                'field' => 'no_unit',
                'label' => 'NO Unit',
                'rules' => 'required'
            ],

            [
                'field' => 'nrp',
                'label' => 'NRP',
                'rules' => 'numeric'
            ],

            [
                'field' => 'nrp_pegangan',
                'label' => 'NRP PEGANGAN',
                'rules' => 'numeric'
            ],

        ];
    }
    public function timbangan()
    {
        $query  = $this->db->query("SELECT tbl_timbangan.* ,id_timbangan, 
        `nrp_a`.nama_operator AS nrp_nama, 
        `nrp_b`.nama_operator AS nrp_peganagan_nama,
        `lok_a`.tipe AS dari,
        `lok_b`.tipe AS ke  
        FROM tbl_timbangan 
        JOIN tbl_opt nrp_a ON `tbl_timbangan`.nrp = `nrp_a`.nrp 
        JOIN tbl_opt nrp_b ON `tbl_timbangan`.nrp_peganagan = `nrp_b`.nrp
        JOIN tbl_lokasi lok_a ON `tbl_timbangan`.id_lokasi_from = `lok_a`.id_lokasi 
        JOIN tbl_lokasi lok_b ON `tbl_timbangan`.id_lokasi_to = `lok_b`.id_lokasi  ");


        return $query->result();
    }

    // public function getprodksiperjam(){
    // $new_time = date("Y-m-d H:i:s", strtotime('+8 hours')).
    // $query =$this->db->query("SELECT *
    // FROM tbl_timbangan
    // WHERE time_out
    // BETWEEN '07:00:00' AND '19:00:00'
    // AND date =$new_time");
    //  return $query->result();
    // }

    public function jumlah_ritasi_shift1()
    {
        
        // date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        // $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan
            WHERE time_out
            BETWEEN '07:00:00' AND '19:00:00'
            AND date =curdate() ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_net_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = "SELECT SUM(berat_bersih) as total
        FROM tbl_timbangan
        WHERE time_out
        BETWEEN '07:00:00' AND '18:59:00'
        AND date ='$now' ";
        $result = $this->db->query($query);
        return $result->row()->total;
    }


    public function jumlah_unit_rfu()
    {
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_unit
        WHERE status='RFU'");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_silo_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_silo_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_silo_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_silo_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_silo_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_silo_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_silo_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='80' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad2lh_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad2lh_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad2lh_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2lh_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2lh_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2lh_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2lh_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='124' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad3a_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad3a_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad3a_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3a_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3a_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3a_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3a_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='75' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad2_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad2_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad2_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad2_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='73' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad3_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad3_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpad3_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpad3_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='74' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_icfrom1_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_icfrom1_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_icfrom1_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_icfrom1_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_icfrom1_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_icfrom1_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_icfrom1_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='125' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_panel1icf_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_panel1icf_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_panel1icf_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_panel1icf_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_panel1icf_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_panel1icf_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_panel1icf_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='126' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_f31icf_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_f31icf_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_f31icf_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_f31icf_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_f31icf_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_f31icf_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_f31icf_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='127' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpadfsp_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpadfsp_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_coalpadfsp_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpadfsp_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpadfsp_minus_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpadfsp_minus_shift2()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '19:01:00' AND '23:59:00'
        AND date ='$now'
        AND berat_bersih <kapasitas
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function under_coalpadfsp_minus_shift3()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, SUM(berat_bersih-kapasitas) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '00:01:00' AND '06:59:00'
        AND date =subdate(curdate(), 1)
        AND berat_bersih <kapasitas
        AND id_lokasi_to='128' ");
        $row = $query->row();
        return $row->total;
    }
    public function jumlah_underload_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT tbl_timbangan.*, tbl_vessel.*, COUNT(tbl_timbangan.id_timbangan) as total
        FROM tbl_timbangan
        LEFT JOIN `tbl_vessel` ON `tbl_timbangan`.`id_vessel` = `tbl_vessel`.`id_vessel`
        WHERE time_out
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now'
        AND berat_bersih <kapasitas");
        $row = $query->row();
        return $row->total;
    }




    public function uncompleted_shift1()
    {
        date_default_timezone_set('Asia/Singapore'); # add your city to set local time zone
        $now = date('y-m-d');
        $query = $this->db->query("SELECT COUNT(*) as total
        FROM tbl_timbangan WHERE time_out= ''
        BETWEEN '07:00:00' AND '19:00:00'
        AND date ='$now' AND time_in is NOT NULL
        ");
        $row = $query->row();
        return $row->total;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function data_tambah_opt()
    {
        $query = $this->db->get('tbl_opt');
        return $query->result();
    }
    public function data_tambah_unit()
    {
        $query = $this->db->get('tbl_unit');
        return $query->result();
    }
    public function data_tambah_vessel()
    {
        $query = $this->db->get('tbl_vessel');
        return $query->result();
    }
    public function data_tambah_lokasi()
    {
        $query = $this->db->get('tbl_lokasi');
        return $query->result();
    }


    public function save()
    {

        $post = $this->input->post();
        $this->no_unit = $post["no_unit"];
        $this->nrp = $post["nrp"];
        $this->nrp_peganagan = $post["nrp_peganagan"];
        $this->id_vessel = $post["id_vessel"];
        $this->id_lokasi_from = $post["id_lokasi_from"];
        $this->id_lokasi_to = $post["id_lokasi_to"];
        $this->no_timbangan = $post["no_timbangan"];
        $this->nama_wb = $post["nama_wb"];
        $this->date = $post["date"];
        $this->time_in = $post["time_in"];
        $this->time_out = $post["time_out"];
        $this->berat_kotor = $post["berat_kotor"];
        $this->berat_bersih = $post["berat_bersih"];
        $this->berat_kosongan = $post["berat_kosongan"];
        $this->km_awal = $post["km_awal"];
        $this->km_akhir = $post["km_akhir"];
        $this->hm_awal = $post["hm_awal"];
        $this->hm_akhir = $post["hm_akhir"];
        return $this->db->insert($this->_table, $this);
    }

    public function getUserById($id_timbangan)
    {
        return $this->db->get_where('tbl_timbangan', ['id_timbangan' => $id_timbangan])->row_array();
    }

    public function delete_timbangan($id_timbangan)
    {
        $this->db->delete('tbl_timbangan', ['id_timbangan' => $id_timbangan]);
    }
}
