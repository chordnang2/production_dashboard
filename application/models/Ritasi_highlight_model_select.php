<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ritasi_highlight_model_select extends CI_Model
{
    public function average_ritasi_jam_7($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '07:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_8($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '08:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_9($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '09:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_10($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '10:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_11($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '11:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_12($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '12:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_13($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '13:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_14($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '14:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_15($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '15:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_16($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '16:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_17($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '17:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi_jam_18($a)
    {
        

        $query = $this->db->query(" SELECT a.curval as a, b.curval as b, (b.curVal / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date = '$a'
        ) a,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'07:00:00'AND '18:59:00' AND date ='$a'
        ) b ");


        return $query->result();
    }
    public function average_ritasi2_jam_19($a)
    {
        

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
    public function average_ritasi2_jam_20($a)
    {
        


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
    public function average_ritasi2_jam_21($a)
    {
        

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
    public function average_ritasi2_jam_22($a)
    {
       

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
    public function average_ritasi2_jam_23($a)
    {
    



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
    public function average_ritasi2_jam_00($a)
    {
   

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '00:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '00:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_01($a)
    {
     

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '01:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '01:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_02($a)
    {

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '02:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '02:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_03($a)
    {
      
       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '03:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '03:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }
    public function average_ritasi2_jam_04($a)
    {
        
       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '04:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '04:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }

    public function average_ritasi2_jam_05($a)
    {
        

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '05:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '05:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }

    public function average_ritasi2_jam_06($a)
    {
       

        $query = $this->db->query(" SELECT c.curval + b.curval as b, a.curval as a, ((b.curVal+c.curval) / a.curVal) as avgrit
        from (
            SELECT  COUNT(DISTINCT(no_unit)) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date = '$a' 
            OR time_out BETWEEN'00:01:00'AND '06:59:00' AND date = '$a'
        ) a,
              (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'19:00:00'AND '23:59:00' AND date ='$a'
        ) b,
        (
            SELECT  COUNT(no_unit) curVal
            FROM tbl_wb2
            WHERE time_out BETWEEN'00:01:00'AND '06:59:00' AND date ='$a'
        ) c 
        
        ");


        return $query->result();
    }
}


/* End of file Ritasi_highlight_model.php and path /application/models/models/ritasi_highlight_model.php */
