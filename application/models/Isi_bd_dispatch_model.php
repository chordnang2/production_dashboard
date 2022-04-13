<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Isi_bd_dispatch_model extends CI_Model
{

    private $_table = "tbl_dispatch";

    function load_data()
    {
        // $this->db->order_by('id', 'DESC');
        // $query = $this->db->get('tbl_dispatch');
        // return $query->result_array();
        $query  = $this->db->query("SELECT * FROM `tbl_dispatch` WHERE date>= now() - interval 1 day  order by id DESC  ");


        return $query->result();
    }

    function insert_data($data)
    {
        $this->db->insert('tbl_dispatch', $data);
    }

    function update_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_dispatch', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_dispatch');
    }

    public function get_no_unit()
    {
        $query  = $this->db->query("SELECT `tbl_unit4digit`.`id`
        FROM tbl_unit4digit
        GROUP BY id");


        return $query->result();
    }

    public function get_kosong()
    {
        $query  = $this->db->query("SELECT * FROM `tbl_dispatch` WHERE DATE_FORMAT(start,'%H:%i:%s')  = '00:00:00'  OR DATE_FORMAT(time_out,'%H:%i:%s')  = '00:00:00' OR DATE_FORMAT(operasi,'%H:%i:%s')  = '00:00:00'  ORDER BY `date` DESC");


        return $query->result();
    }

    public function getAll()
    {
        return $this->db->get('tbl_dispatch')->result(); // Tampilkan semua data yang ada di tabel siswa
    }
    public function get_bd_today()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("yesterday");
        $y = strtotime("2 days ago");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);


        if ($jamini >= 00 && $jamini < 06) {
            $a = $kemaren;
        } else {
            $a =  $hariini;
        }

        $query  = $this->db->query("SELECT * FROM `tbl_dispatch` WHERE date = '$a' ");


        return $query->result();
    }

    public function wb_hanson($data = null, $limit = null, $not = null, $order = null)
    {
        $condition = '';
        if (!empty($data)) {


            foreach ($data as $key => $value) {
                $condition .= ' AND ' . $key . " LIKE '$value'";
            }
            if (!empty($not)) {
                $not = string_esc($not);
                foreach ($not as $key => $value) {
                    $condition .= ' AND ' . $key . " NOT LIKE '$value'";
                }
            }
            if (!empty($limit)) {
                $limit = " LIMIT $limit";
            }
            if (empty($order)) {
                $order = " ORDER BY id ASC";
            } else {
                $order = " ORDER BY" . $order;
            }
            $sql = "SELECT * FROM tbl_dispatch WHERE 1=1 $condition $order $limit";


            $model = $this->db->query($sql);
            $model = $model->result_array();

            return $model;
        }
    }
    public function update_handson($data)
    {
        $column = ["date", "shift", "no_unit", "problem", "aktivity", "preparation", "start", "time_out", "operasi", "hm", "km", "location"];

        $final_data = array();
        // $final_data = str_replace(".", "", $final_data);
        $data_complete = 1;
        foreach ($data as $key => $detail_data) {
            if (!$detail_data[count($column) - 1]) {
                $data_complete = 0;
                break;
            }

            foreach ($detail_data as $key2 => $value) {
                $final_data[$key][] = "'" . $this->db->escape_str($value) . "'";
            }
        }

        if ($data_complete == 1) {
            $insert_column = "(" . implode(",", $column) . ")";
            $insert_sql = array();
            foreach ($final_data as $key => $value) {
                $value_dalam = "(" . implode(",", str_replace(",", "", $value)) . ")";
                $insert_sql[] = "INSERT INTO tbl_dispatch $insert_column VALUES $value_dalam";
            }


            $value_date = $data[0][0];
            $this->db->trans_start();
            $delete_query = "DELETE FROM tbl_dispatch WHERE date LIKE '$value_date'";
            $delete_duplicate = "delete t1 FROM tbl_dispatch t1
            INNER  JOIN tbl_dispatch t2
            WHERE
            t1.id < t2.id AND
            t1.`problem` = t2.`problem` AND
            t1.`aktivity` = t2.`aktivity` AND 
            t1.`no_unit` = t2.`no_unit` AND 
            t1.`preparation` = t2.`preparation`";
            $no_new_line_query = "UPDATE tbl_dispatch SET problem = TRIM(REPLACE(REPLACE(REPLACE(`problem`, '\n', ' '), '\r', ' '), '\t', ' '))";
            $no_petik_query = "UPDATE tbl_dispatch SET problem = REPLACE(problem,  '\'', '`')";

            $this->db->query($delete_query);
            foreach ($insert_sql as $key => $value) {
                $this->db->query($value);
            }
            $this->db->query($delete_duplicate);
            $this->db->query($no_new_line_query);
            $this->db->query($no_petik_query);
            $this->db->trans_complete();
            return "ok";
        } else
            return "error";
    }
    public function wb_hanson_byOperasi()
    {

        $sql = "SELECT * FROM tbl_dispatch WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00' order by date ASC";


        $model = $this->db->query($sql);
        $model = $model->result_array();

        return $model;
    }

    public function update_handson_byOperasi($data)
    {
        $column = ["date", "shift", "no_unit", "problem", "aktivity", "preparation", "start", "time_out", "operasi", "hm", "km", "location"];

        $final_data = array();
        // $final_data = str_replace(".", "", $final_data);
        $data_complete = 1;
        foreach ($data as $key => $detail_data) {
            if (!$detail_data[count($column) - 1]) {
                $data_complete = 0;
                break;
            }

            foreach ($detail_data as $key2 => $value) {
                $final_data[$key][] = "'" . $this->db->escape_str($value) . "'";
            }
        }

        if ($data_complete == 1) {
            $insert_column = "(" . implode(",", $column) . ")";
            $insert_sql = array();
            foreach ($final_data as $key => $value) {
                $value_dalam = "(" . implode(",", str_replace(",", "", $value)) . ")";
                $insert_sql[] = "INSERT INTO tbl_dispatch $insert_column VALUES $value_dalam";
            }


            $this->db->trans_start();
            $delete_query = "DELETE FROM tbl_dispatch WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00'";
            $delete_duplicate = "delete t1 FROM tbl_dispatch t1
            INNER  JOIN tbl_dispatch t2
            WHERE
                t1.id < t2.id AND
                t1.`problem` = t2.`problem` AND
                t1.`aktivity` = t2.`aktivity` AND 
                t1.`no_unit` = t2.`no_unit` AND 
                t1.`preparation` = t2.`preparation`";
            $no_new_line_query = "UPDATE tbl_dispatch SET problem = TRIM(REPLACE(REPLACE(REPLACE(`problem`, '\n', ' '), '\r', ' '), '\t', ' '))";
            $no_petik_query = "UPDATE tbl_dispatch SET problem = REPLACE(problem,  '\'', '`')";

            $this->db->query($delete_query);
            foreach ($insert_sql as $key => $value) {
                $this->db->query($value);
            }
            $this->db->query($delete_duplicate);
            $this->db->query($no_new_line_query);
            $this->db->query($no_petik_query);
            $this->db->trans_complete();
            return "ok";
        } else
            return "error";
    }


    public function get_aktifity_group()
    {
        $query  = $this->db->query("SELECT id ,count(aktivity),date,aktivity FROM `tbl_dispatch` group by aktivity  
        ORDER BY `tbl_dispatch`.`aktivity`  ASC");


        return $query->result();
    }
    public function get_status_unit_based_on()
    {
        $query  = $this->db->query("SELECT id,aktivity FROM (SELECT no_unit,aktivity FROM `tbl_dispatch` WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00'
        GROUP BY no_unit ORDER BY no_unit ASC )as a RIGHT JOIN (  
       SELECT id FROM tbl_unit4digit ORDER BY id )as b ON a.no_unit=b.id");


        return $query->result();
    }
    public function get_unit_running()
    {
        $query  = $this->db->query("SELECT no_unit2-no_unit as running FROM 
        (SELECT count(no_unit) as no_unit,aktivity FROM `tbl_dispatch` WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00') as a JOIN
        (SELECT count(unit_camp4) as no_unit2 FROM `tbl_unit4digit` WHERE 1) as b");


        return $query->result();
    }
    public function get_unit_not_running()
    {
        $query  = $this->db->query("SELECT count(no_unit) as no_unit,aktivity FROM `tbl_dispatch` WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00' group by aktivity");


        return $query->result();
    }

    public function running_detail()
    {
        $query = $this->db->query("SELECT id,vessel4 FROM(SELECT * FROM `tbl_unit4digit` ) as a LEFT JOIN (SELECT no_unit FROM tbl_dispatch WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00') as b on a.id=b.no_unit WHERE b.no_unit IS NULL");
        return $query->result_array();
    }
    public function not_running_detail()
    {
        $query = $this->db->query("SELECT * FROM(SELECT * FROM `tbl_unit4digit` ) as a RIGHT JOIN (SELECT no_unit,aktivity,problem,location FROM tbl_dispatch WHERE HOUR(operasi) ='00' AND MINUTE(operasi)='00') as b on a.id=b.no_unit");
        return $query->result_array();
    }
    public function last_date_update()
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_dispatch`  
        ORDER BY `tbl_dispatch`.`date` DESC");

        return $hsl->result_array();
    }
}


/* End of file Isi_bd_dispatch_model_model.php and path /application/models/Isi_bd_dispatch_model_model.php */
