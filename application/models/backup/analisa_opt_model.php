<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa_opt_model extends CI_Model
{


    public function unitSchedule()
    {
        $unit = "MHA PM-829";
        $exception = [ 
            "'Side Dump 1_Hopper'",
            "'Side Dump 2_Hopper'",
            "'Side Dump 3_Hopper'",
            "'Side Dump 4_Hopper'",
            "'Side Dump 5_Hopper'",
            "'Side Dump 1&2'",
            "'Side Dump 5'"
            
        ];

        $exception_in = implode(",", $exception);

        $sql = "SELECT `fms`.unit, `fms`.geofence, `fms`.time_in, `fms`.time_out, `tbl_lokasi`.tipe FROM tbl_fms_geofence fms
                    JOIN tbl_lokasi ON `fms`.geofence = `tbl_lokasi`.id_lokasi
                    WHERE `tbl_lokasi`.tipe IN ('Loading','Travel', 'Tipping') AND `fms`.unit LIKE '$unit' AND `fms`.geofence NOT IN($exception_in) 
                    ORDER BY `fms`.unit, `fms`.time_in ASC";

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

}
