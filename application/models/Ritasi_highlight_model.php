<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ritasi_highlight_model extends CI_Model
{
    public function average_ritasi_jam_7()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_8()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_9()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_10()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_11()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_12()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_13()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_14()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_15()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_16()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_17()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_18()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date = '$hariini'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date ='$hariini'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_19()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '19:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '19:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_20()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }




        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '20:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '20:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_21()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);
        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }




        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '21:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '21:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_22()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);
        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }

       



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '22:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '22:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_23()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);
        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t); if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }

       



        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_00()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '00:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '00:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_01()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '01:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '01:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_02()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '02:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '02:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_03()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '03:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '03:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_04()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '04:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '04:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }

    public function average_ritasi2_jam_05()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '05:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '05:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }

    public function average_ritasi2_jam_06()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$kemaren' 
            OR time_out BETWEEN'00:01:00'AND '06:59:00' AND date = '$kemaren'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$kemaren'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '06:59:00' AND date ='$kemaren'
        ) c 
        
        ");


        return $query->result();
    }
}


/* End of file Ritasi_highlight_model.php and path /application/models/models/ritasi_highlight_model.php */
