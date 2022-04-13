<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_opt_model extends CI_Model
{


    public function unit_produksi()
    {
        $query = $this->db->query("SELECT COUNT(tbl_unit.status) as a
       FROM `tbl_unit` WHERE tbl_unit.status='Produksi'");
        $row = $query->row();
        return $row->a;
    }
    public function detail_produksi()
    {
        $query = $this->db->query("SELECT `tbl_unit`.*
        FROM `tbl_unit` WHERE status='Produksi'");
        return $query->result();
    }
    public function unit_bd_unscedulemayor_()
    {
        $query = $this->db->query("SELECT COUNT(tbl_unit.status) as b
       FROM `tbl_unit` WHERE tbl_unit.status='BD Unschedule Mayor'");
        $row = $query->row();
        return $row->b;
    }
    public function unit_bd_unsceduleminor_()
    {
        $query = $this->db->query("SELECT COUNT(tbl_unit.status) as b
       FROM `tbl_unit` WHERE tbl_unit.status='BD Unschedule Minor'");
        $row = $query->row();
        return $row->b;
    }
    public function unit_bd_schedule_()
    {
        $query = $this->db->query("SELECT COUNT(tbl_unit.status) as b
       FROM `tbl_unit` WHERE tbl_unit.status='BD Schedule'");
        $row = $query->row();
        return $row->b;
    }
    public function travel_time()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`unit`) as b ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Travel' AND `tbl_fms_geofence`.`duration` >='0:30:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' ORDER BY `tbl_fms_geofence`.`duration` DESC");
        $row = $query->row();
        return $row->b;
    }
    public function top_travel_delay()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`id`) as travel_delay ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Travel' AND `tbl_fms_geofence`.`duration` >='0:30:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' GROUP BY `tbl_fms_geofence`.`geofence` ORDER BY COUNT(`tbl_fms_geofence`.`id`) DESC limit 2");
        return $query->result();
    }
    public function loading_time()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`unit`) as b ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Loading' AND `tbl_fms_geofence`.`duration` >='0:30:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' ORDER BY `tbl_fms_geofence`.`duration` DESC");
        $row = $query->row();
        return $row->b;
    }
    public function top_loading_delay()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`id`) as loading_delay ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Loading' AND `tbl_fms_geofence`.`duration` >='0:30:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' GROUP BY `tbl_fms_geofence`.`geofence` ORDER BY COUNT(`tbl_fms_geofence`.`id`) DESC limit 2 ");
        return $query->result();
    }
    public function tipping_time()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`unit`) as b ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Tipping' AND `tbl_fms_geofence`.`duration` >='0:30:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' ORDER BY `tbl_fms_geofence`.`duration` DESC");
        $row = $query->row();
        return $row->b;
    }

    public function top_tipping_delay()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`id`) as tipping_delay ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Tipping' AND `tbl_fms_geofence`.`duration` >='0:30:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' GROUP BY `tbl_fms_geofence`.`geofence` ORDER BY COUNT(`tbl_fms_geofence`.`id`) DESC limit 2");
        return $query->result();
    }
    public function top_pitstop_delay()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $query = $this->db->query("SELECT COUNT(`tbl_fms_geofence`.`id`) as pitstop_delay ,`tbl_fms_geofence`.`time_in`,`tbl_fms_geofence`.`geofence`,`tbl_fms_geofence`.`duration`, `tbl_lokasi`.`tipe`,`tbl_fms_geofence`.`unit` FROM `tbl_fms_geofence` JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi` JOIN `tbl_unit` ON `tbl_fms_geofence`.`unit` = `tbl_unit`.`no_unit` WHERE `tbl_lokasi`.`tipe`='Pit Stop' AND `tbl_fms_geofence`.`duration` >='0:45:00' AND `tbl_fms_geofence`.time_in BETWEEN ' $hariini  00:01:00' AND ' $hariini  23:59:00' GROUP BY `tbl_fms_geofence`.`geofence` ORDER BY COUNT(`tbl_fms_geofence`.`id`) DESC limit 2");
        return $query->result();
    }
    public function group_by_time_in()
    {
        $query = $this->db->query("SELECT COUNT(`id`), DATE(time_in) as count
        FROM tbl_fms_geofence
        GROUP BY DATE(time_in);");
        return $query->result();
    }
    public function grup_unit()
    {
        $query = $this->db->query("SELECT COUNT(id), unit as unit
        FROM tbl_fms_geofence
        GROUP BY unit;");
        return $query->result();
    }
    public function detail_cycle_time($unit, $kemaren)
    {

        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        $exception = [
            "'Side Dump 1_Hopper'",
            "'Side Dump 2_Hopper'",
            "'Side Dump 3_Hopper'",
            "'Side Dump 4_Hopper'",
            "'Side Dump 5_Hopper'",
            "'CHR FSP KM 23 - CHR BT'",
            "'CHR FSP KM 22'",
            "'CHR FSP KM 23'",
            "'CHR FSP-ICF CHR BT'",
            "'Side Dump 1&2'",
            "'Side Dump 5'",
            "'Stockpile KM 5'",
            "'Stockpile KM 6'",
            "'NOT RFU'"

        ];

        $exception_in = implode(",", $exception);

        $sql = "SELECT `fms`.duration, `fms`.unit, `fms`.geofence, `fms`.time_in, `fms`.time_out, `tbl_lokasi`.tipe ,`tbl_unit`.status  FROM tbl_fms_geofence fms
                    JOIN tbl_lokasi ON `fms`.geofence = `tbl_lokasi`.id_lokasi JOIN `tbl_unit` ON `fms`.`unit` = `tbl_unit`.`no_unit`
                    WHERE `tbl_lokasi`.tipe IN ('Loading','Travel', 'Tipping')  AND `fms`.unit= '$unit' AND `fms`.geofence NOT IN($exception_in) AND `tbl_unit`.status NOT IN ($exception_in) AND `fms`.time_in BETWEEN '$kemaren 00:01:00' AND '$kemaren 23:59:00'  ORDER BY `fms`.unit, `fms`.time_in ASC";
        // AND `fms`.unit LIKE '$unit' 
        $model = $this->db->query($sql);
        $model = $model->result_array();

        $final_data = [];
        $current_type = "";

        foreach ($model as $key => $value) {

            if ($value["tipe"] == "Travel" && empty($final_data))
                continue;

            if (empty($final_data))
                $current_trip = "1";
            else {
                $current_trip = key(array_reverse($final_data));
                $current_trip = explode("-", $current_trip)[1];
            }

            if ($current_type == "" || $value["tipe"] != $current_type)
                $current_type = $value["tipe"];

            //Bila $final_data masi kosong, masukin datanya ke $final_data
            if ($current_type == "Loading" && empty($final_data)) {
                $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang Loading dan sebelumnya juga Loading, Skip
            elseif ($current_type == "Loading" && $value["tipe"] == end($final_data["TRIP-" . $current_trip])["tipe"])
                continue;

            elseif ($current_type == "Loading")
                $final_data["TRIP-" . ($current_trip + 1)][] = $value;

            elseif ($current_type == "Tipping") {
                //Bila setelah Tipping, Tipping juga, Skip
                if (isset($model[$key + 1]) && $model[$key + 1]["tipe"] == "Tipping")
                    continue;

                else
                    $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang travel dan datanya bukanyang pertama
            elseif ($current_type == "Travel" && !empty($final_data))
                $final_data["TRIP-" . $current_trip][] = $value;
        }



        // echo "<pre>";
        // print_r($final_data);
        // echo "</pre>";
        // die();

        return $final_data;
    }
    public function cycle_time()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        //    $s = strtotime("yesterday");
        // $kemaren = date("Y-m-d ", $s);
        // $kemaren = " $hariini ";
        // $unit = "MHA PM-831";
        // $unit = urldecode($unit);
        $exception = [
            "'Side Dump 1_Hopper'",
            "'Side Dump 2_Hopper'",
            "'Side Dump 3_Hopper'",
            "'Side Dump 4_Hopper'",
            "'Side Dump 5_Hopper'",
            "'CHR FSP KM 23 - CHR BT'",
            "'CHR FSP KM 22'",
            "'CHR FSP KM 23'",
            "'CHR FSP-ICF CHR BT'",
            "'Side Dump 1&2'",
            "'Side Dump 5'",
            "'NOT RFU'"

        ];

        $exception_in = implode(",", $exception);

        $sql = "SELECT `fms`.duration, `fms`.unit, `fms`.geofence, `fms`.time_in, `fms`.time_out, `tbl_lokasi`.tipe ,`tbl_unit`.status  FROM tbl_fms_geofence fms
                    JOIN tbl_lokasi ON `fms`.geofence = `tbl_lokasi`.id_lokasi JOIN `tbl_unit` ON `fms`.`unit` = `tbl_unit`.`no_unit`
                    WHERE `tbl_lokasi`.tipe IN ('Loading','Travel', 'Tipping') AND `fms`.time_in BETWEEN '$kemaren 00:01:00' AND '$kemaren 23:59:00'  AND `fms`.geofence NOT IN($exception_in) AND `tbl_unit`.status NOT IN ($exception_in) AND `fms`.time_in   ORDER BY `fms`.unit, `fms`.time_in ASC";
        // AND `fms`.unit LIKE '$unit' 
        // AND `fms`.unit= '$unit'
        // BETWEEN '$kemaren 00:01:00' AND '$kemaren 23:59:00'
        $model = $this->db->query($sql);
        $model = $model->result_array();

        $final_data = [];
        $current_type = "";

        foreach ($model as $key => $value) {

            if ($value["tipe"] == "Travel" && empty($final_data))
                continue;

            if (empty($final_data))
                $current_trip = "1";
            else {
                $current_trip = key(array_reverse($final_data));
                $current_trip = explode("-", $current_trip)[1];
            }

            if ($current_type == "" || $value["tipe"] != $current_type)
                $current_type = $value["tipe"];

            //Bila $final_data masi kosong, masukin datanya ke $final_data
            if ($current_type == "Loading" && empty($final_data)) {
                $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang Loading dan sebelumnya juga Loading, Skip
            elseif ($current_type == "Loading" && $value["tipe"] == end($final_data["TRIP-" . $current_trip])["tipe"])
                continue;

            elseif ($current_type == "Loading")
                $final_data["TRIP-" . ($current_trip + 1)][] = $value;

            elseif ($current_type == "Tipping") {
                //Bila setelah Tipping, Tipping juga, Skip
                if (isset($model[$key + 1]) && $model[$key + 1]["tipe"] == "Tipping")
                    continue;

                else
                    $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang travel dan datanya bukanyang pertama
            elseif ($current_type == "Travel" && !empty($final_data))
                $final_data["TRIP-" . $current_trip][] = $value;
        }



        // echo "<pre>";
        // print_r($final_data);
        // echo "</pre>";
        // die();

        return $final_data;
    }


    public function count()
    {
        $s = strtotime("yesterday");
        $today = date("Y-m-d ", $s);

        $query = $this->db->query("SELECT COUNT(jam_operasi_kembali) AS count, SUM(TIME_TO_SEC(jam_operasi_kembali)-TIME_TO_SEC(jam_breakdown)) as sum_detik FROM tbl_bd_unit bd WHERE problem IN ('Change Shift','Rest time') AND jam_operasi_kembali BETWEEN '$today  00:01:00' AND '$today  23:59:00'");
        // AND `fms`.unit LIKE '$unit' 
        $row = $query->row();
        return $row->count;
    }
    public function sum_detik()
    {
        $s = strtotime("yesterday");
        $today = date("Y-m-d ", $s);

        $query = $this->db->query("SELECT COUNT(jam_operasi_kembali) AS count, SUM(TIME_TO_SEC(jam_operasi_kembali)-TIME_TO_SEC(jam_breakdown)) as sum_detik FROM tbl_bd_unit bd WHERE problem IN ('Change Shift','Rest time') AND jam_operasi_kembali BETWEEN '$today  00:01:00' AND '$today  23:59:00'");
        // AND `fms`.unit LIKE '$unit' 
        $row = $query->row();
        return $row->sum_detik;
    }




    // var $table = 'tbl_analisa_opt';
    // var $column_order = array(null, 'tanggal', 'nrp', 'trip', 'location', 'shift', 'Unit', 'hm_unit', 'jam_trip', 'keterangan'); //set column field database for datatable orderable
    // var $column_search = array('tanggal', 'nrp', 'trip', 'location', 'shift', 'Unit', 'hm_unit', 'jam_trip', 'keterangan'); //set column field database for datatable searchable 
    // var $order = array('id_a_opt' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function dari_tanggal()
    {
        $query = $this->db->query('SELECT tanggal
        FROM tbl_analisa_opt 
        GROUP BY DATE_FORMAT(tanggal,"%d/%m/%Y")
        ORDER BY YEAR(tanggal) DESC, MONTH(tanggal) DESC ');
        return $query->result();
    }

    public function fetch_chart_data($tanggal)
    {
        $query = $this->db->query('SELECT  DATE_FORMAT(tanggal, " %Y%m%d") AS filter_tanggal FROM tbl_analisa_opt GROUP BY tanggal');
        return $query->result();
    }

    public function pencarian_d($tanggal, $nrp)
    {
        $this->db->where("tanggal", $tanggal);
        $this->db->where("nrp", $nrp);
        return $this->db->get("tbl_analisa_opt");
    }
    // private function _get_datatables_query()
    // {

    //     //add custom filter here
    //     if ($this->input->post('tanggal')) {
    //         $this->db->where('tanggal', $this->input->post('tanggal'));
    //     }
    //     if ($this->input->post('nrp')) {
    //         $this->db->like('nrp', $this->input->post('nrp'));
    //     }
    //     if ($this->input->post('trip')) {
    //         $this->db->like('trip', $this->input->post('trip'));
    //     }
    //     if ($this->input->post('location')) {
    //         $this->db->like('location', $this->input->post('location'));
    //     }
    //     if ($this->input->post('shift')) {
    //         $this->db->like('shift', $this->input->post('shift'));
    //     }
    //     if ($this->input->post('unit')) {
    //         $this->db->like('unit', $this->input->post('unit'));
    //     }

    //     if ($this->input->post('hm_unit')) {
    //         $this->db->like('unit', $this->input->post('unit'));
    //     }
    //     if ($this->input->post('hm_unit')) {
    //         $this->db->like('hm_unit', $this->input->post('hm_unit'));
    //     }
    //     if ($this->input->post('jam_trip')) {
    //         $this->db->like('jam_trip', $this->input->post('jam_trip'));
    //     }
    //     if ($this->input->post('keterangan')) {
    //         $this->db->like('keterangan', $this->input->post('keterangan'));
    //     }

    //     $this->db->from($this->table);
    //     $i = 0;

    //     foreach ($this->column_search as $item) // loop column 
    //     {
    //         if ($_POST['search']['value']) // if datatable send POST for search
    //         {

    //             if ($i === 0) // first loop
    //             {
    //                 $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
    //                 $this->db->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->db->or_like($item, $_POST['search']['value']);
    //             }

    //             if (count($this->column_search) - 1 == $i) //last loop
    //                 $this->db->group_end(); //close bracket
    //         }
    //         $i++;
    //     }

    //     if (isset($_POST['order'])) // here order processing
    //     {
    //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     } else if (isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }

    // public function get_datatables()
    // {
    //     $this->_get_datatables_query();
    //     if ($_POST['length'] != -1)
    //         $this->db->limit($_POST['length'], $_POST['start']);
    //     $query = $this->db->get();
    //     // $query = $this->db->get("SELECT *, hm_unit/trip as a FROM tbl_analisa_opt");
    //     return $query->result();
    // }

    public function get_all()
    {
        // $this->_get_datatables_query();
        // if ($_POST['length'] != -1)
        //     $this->db->limit($_POST['length'], $_POST['start']);
        // $query = $this->db->get();
        $query = $this->db->query("SELECT *, hm_unit/trip as a FROM tbl_analisa_opt");
        return $query->result();
    }


    // public function count_filtered()
    // {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // public function count_all()
    // {
    //     $this->db->from($this->table);
    //     return $this->db->count_all_results();
    // }

    // public function get_list_tanggal()
    // {
    //     $this->db->select('tanggal');
    //     $this->db->from($this->table);
    //     $query = $this->db->get();
    //     $result = $query->result();

    //     $tanggal = array();
    //     foreach ($result as $row) {
    //         $tanggal[] = $row->tanggal;
    //     }
    //     return $tanggal;
    // }
    // public function get_list_nrp()
    // {
    //     $this->db->select('nrp');
    //     $this->db->from($this->table);
    //     $query = $this->db->get();
    //     $result = $query->result();

    //     $nrp = array();
    //     foreach ($result as $row) {
    //         $nrp[] = $row->nrp;
    //     }
    //     return $nrp;
    // }
    // public function get_list_trip()
    // {
    //     $this->db->select('trip');
    //     $this->db->from($this->table);
    //     $query = $this->db->get();
    //     $result = $query->result();

    //     $trip = array();
    //     foreach ($result as $row) {
    //         $trip[] = $row->trip;
    //     }
    //     return $trip;
    // }

    public function unitSchedule($unit, $kemaren)
    {
        // $unit = "MHA PM-829";
        $exception = [
            "'Side Dump 1_Hopper'",
            "'Side Dump 2_Hopper'",
            "'Side Dump 3_Hopper'",
            "'Side Dump 4_Hopper'",
            "'Side Dump 5_Hopper'",
            "'CHR FSP KM 23 - CHR BT'",
            "'CHR FSP KM 22'",
            "'CHR FSP KM 23'",
            "'CHR FSP-ICF CHR BT'",
            "'Side Dump 1&2'",
            "'Side Dump 5'",
            "'NOT RFU'"
        ];
        // $kemaren = " $hariini ";
        $type = "('Loading', 'Travel', 'Tipping', 'Parking Bay', 'Pit Stop', 'Refueling', 'Weighbridge', 'Workshop')";

        $exception_in = implode(",", $exception);

        $sql = "SELECT `fms`.unit, `fms`.geofence, `fms`.time_in, `fms`.time_out, `tbl_lokasi`.tipe FROM tbl_fms_geofence fms
                JOIN tbl_lokasi ON `fms`.geofence = `tbl_lokasi`.id_lokasi
                WHERE `tbl_lokasi`.tipe IN $type AND `fms`.unit LIKE '$unit' AND `fms`.time_in BETWEEN '$kemaren 00:01:00' AND '$kemaren 23:59:00' AND `fms`.geofence NOT IN($exception_in) 
                ORDER BY `fms`.unit, `fms`.time_in ASC";

        $model = $this->db->query($sql);
        $model = $model->result_array();

        $final_data = [];
        $current_type = "";

        foreach ($model as $key => $value) {
            //Buang data travel awal awal, sampai ketemu Loading
            if ($value["tipe"] == "Travel" && empty($final_data))
                continue;
            //Continue itu untuk lanjut ke indexs selanjutnya dan melewati indexs ini.

            //Kalau $final_data msh kosong berarti itu adalah Trip pertama
            if (empty($final_data))
                $current_trip = "1";
            else {
                //Ini logic untuk melihat sekarang Trip yang paling terkahir trip keberapa
                $current_trip = key(array_reverse($final_data));
                $current_trip = explode("-", $current_trip)[1];
            }

            //Untuk melihat tipe nya apakah "Loading, Travel, Tipping" dan apakah berbeda dari type indexs sebelumnya.
            if ($current_type == "" || $value["tipe"] != $current_type)
                $current_type = $value["tipe"];

            //Bila $final_data masi kosong dan typenya "Loading", masukin datanya ke $final_data
            if ($current_type == "Loading" && empty($final_data)) {
                $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang Loading dan sebelumnya juga Loading, Skip
            elseif ($current_type == "Loading" && $value["tipe"] == end($final_data["TRIP-" . $current_trip])["tipe"])
                continue;

            elseif ($current_type == "Loading")
                $final_data["TRIP-" . ($current_trip + 1)][] = $value;

            elseif ($current_type == "Tipping") {
                //Bila setelah Tipping, Tipping juga, Skip
                if (isset($model[$key + 1]) && $model[$key + 1]["tipe"] == "Tipping")
                    continue;

                else
                    $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang travel dan datanya bukanyang pertama
            elseif (!empty($final_data))
                $final_data["TRIP-" . $current_trip][] = $value;
        }

        return $final_data;
    }
    public function unitSchedule_polosan()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);
        //     $unit = "MHA PM-830";
        $exception = [
            "'Side Dump 1_Hopper'",
            "'Side Dump 2_Hopper'",
            "'Side Dump 3_Hopper'",
            "'Side Dump 4_Hopper'",
            "'Side Dump 5_Hopper'",
            "'CHR FSP KM 23 - CHR BT'",
            "'CHR FSP KM 22'",
            "'CHR FSP KM 23'",
            "'CHR FSP-ICF CHR BT'",
            "'Side Dump 1&2'",
            "'Side Dump 5'",
            "'NOT RFU'"
        ];

        $type = "('Loading', 'Travel', 'Tipping', 'Parking Bay', 'Pit Stop', 'Refueling', 'Weighbridge', 'Workshop')";

        $exception_in = implode(",", $exception);

        $sql = "SELECT `fms`.unit, `fms`.geofence, `fms`.time_in, `fms`.time_out, `tbl_lokasi`.tipe FROM tbl_fms_geofence fms
                JOIN tbl_lokasi ON `fms`.geofence = `tbl_lokasi`.id_lokasi
                WHERE `tbl_lokasi`.tipe IN $type   AND `fms`.geofence NOT IN($exception_in) 
                
                AND `fms`.time_in BETWEEN '$kemaren 00:01:00' AND '$kemaren 23:59:00'
                ORDER BY `fms`.unit, `fms`.time_in ASC";
        // AND `fms`.unit LIKE '$unit' 

        $model = $this->db->query($sql);
        $model = $model->result_array();

        $final_data = [];
        $current_type = "";

        foreach ($model as $key => $value) {
            //Buang data travel awal awal, sampai ketemu Loading
            if ($value["tipe"] == "Travel" && empty($final_data))
                continue;
            //Continue itu untuk lanjut ke indexs selanjutnya dan melewati indexs ini.

            //Kalau $final_data msh kosong berarti itu adalah Trip pertama
            if (empty($final_data))
                $current_trip = "1";
            else {
                //Ini logic untuk melihat sekarang Trip yang paling terkahir trip keberapa
                $current_trip = key(array_reverse($final_data));
                $current_trip = explode("-", $current_trip)[1];
            }

            //Untuk melihat tipe nya apakah "Loading, Travel, Tipping" dan apakah berbeda dari type indexs sebelumnya.
            if ($current_type == "" || $value["tipe"] != $current_type)
                $current_type = $value["tipe"];

            //Bila $final_data masi kosong dan typenya "Loading", masukin datanya ke $final_data
            if ($current_type == "Loading" && empty($final_data)) {
                $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang Loading dan sebelumnya juga Loading, Skip
            elseif ($current_type == "Loading" && $value["tipe"] == end($final_data["TRIP-" . $current_trip])["tipe"])
                continue;

            elseif ($current_type == "Loading")
                $final_data["TRIP-" . ($current_trip + 1)][] = $value;

            elseif ($current_type == "Tipping") {
                //Bila setelah Tipping, Tipping juga, Skip
                if (isset($model[$key + 1]) && $model[$key + 1]["tipe"] == "Tipping")
                    continue;

                else
                    $final_data["TRIP-" . $current_trip][] = $value;
            }

            //Bila sekarang travel dan datanya bukanyang pertama
            elseif (!empty($final_data))
                $final_data["TRIP-" . $current_trip][] = $value;
        }

        return $final_data;
    }

    public function upload_file($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '10000';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function insert_multiple($data)
    {
        $this->db->insert_batch('tbl_fms_geofence', $data);
    }
    public function upload_file_loading($filename)
    {
        $this->load->library('upload'); // Load librari upload

        $config['upload_path'] = './excel/';
        $config['allowed_types'] = 'xlsx';
        $config['max_size']  = '10000';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
    public function insert_multiple_loading($data)
    {
        $this->db->insert_batch('tbl_geofence_loading', $data);
    }

    public function data_geo_filter_loading()
    {
        $query = $this->db->query("SELECT *
        FROM `tbl_geofence_loading` WHERE unit='MHA PM-829' AND DATE_FORMAT(time_in,'%m%d')='1107' ");
        return $query->result_array();
    }
    public function data_geo_filter_all()
    {
        $query = $this->db->query("SELECT *
        FROM `tbl_fms_geofence` WHERE unit='MHA PM-829' AND DATE_FORMAT(time_in,'%m%d')='1107' ");
        return $query->result();
    }
}
