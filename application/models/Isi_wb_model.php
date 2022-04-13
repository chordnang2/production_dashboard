<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_wb_model extends CI_Model

{
    private $_table = "tbl_wb2";

    public $no_transaction;
    public $shift;
    public $no_unit;

    public function rules()
    {
        return [
            [
                'field' => 'no_transaction',
                'label' => 'NOMER TRANSAKSI',
                'rules' => 'required'
            ],

            [
                'field' => 'shift',
                'label' => 'SHIFT',
                'rules' => 'required'
            ],
            [
                'field' => 'no_unit',
                'label' => 'NO UNIT',
                'rules' => 'required'
            ],
            [
                'field' => 'tipe_vessel',
                'label' => 'TIPE VESSEL',
                'rules' => 'required'
            ],
            [
                'field' => 'loading_point',
                'label' => 'LOADING POINT',
                'rules' => 'required'
            ],
            [
                'field' => 'type',
                'label' => 'TYPE',
                'rules' => 'required'
            ],
            [
                'field' => 'weighbridge',
                'label' => 'WEIGHBRIDGE',
                'rules' => 'required'
            ],
            [
                'field' => 'gross',
                'label' => 'GROSS',
                'rules' => 'required'
            ],
            [
                'field' => 'tare',
                'label' => 'TARE',
                'rules' => 'required'
            ],
            [
                'field' => 'nett',
                'label' => 'NETT',
                'rules' => 'required'
            ],
            [
                'field' => 'time_in',
                'label' => 'TIME IN',
                'rules' => 'required'
            ],
            [
                'field' => 'time_out',
                'label' => 'TIME OUT',
                'rules' => 'required'
            ],
            [
                'field' => 'tipping',
                'label' => 'TIPPING',
                'rules' => 'required'
            ],
            [
                'field' => 'target',
                'label' => 'TARGET',
                'rules' => 'required'
            ],
            [
                'field' => 'precentage',
                'label' => 'PERCENTAGE',
                'rules' => 'required'
            ],
            [
                'field' => 'loss_weight',
                'label' => 'LOSS WEIGHT',
                'rules' => 'required'
            ],
            [
                'field' => 'keterangan',
                'label' => 'KETERANGAN',
                'rules' => 'required'
            ],
            [
                'field' => 'status',
                'label' => 'STATUS',
                'rules' => 'required'
            ],
            [
                'field' => 'date',
                'label' => 'DATE',
                'rules' => 'required'
            ],


        ];
    }

    public function __construct()
    {
        $this->load->database();
    }



    // public function save($shift, $no_unit, $tipe_vessel, $loading_point, $type, $weighbridge, $no_transaction, $gross, $tare, $nett, $time_in, $time_out, $tipping, $remaks, $target, $precentage, $loss_weight, $keterangan, $status, $date)
    // {
    //     $query = "insert into tbl_wb2 values('','$shift','$no_unit','$tipe_vessel','$loading_point' ,'$type' ,'$weighbridge' ,'$no_transaction' ,'$gross' ,'$tare'  ,'$nett' ,'$time_in' ,'$time_out' ,'$tipping' ,'$remaks' ,'$target' ,'$precentage' ,'$loss_weight' ,'$keterangan' ,'$status' ,'$date' ')";
    //     $this->db->query($query);

    // }
    public function insert_item($data)
    {

        return $this->db->insert('tbl_wb2', $data);
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
                $order = " ORDER BY id_wb ASC";
            } else {
                $order = " ORDER BY" . $order;
            }
            $sql = "SELECT * FROM tbl_wb2 WHERE 1=1 $condition $order $limit";


            $model = $this->db->query($sql);
            $model = $model->result_array();

            return $model;
        }
    }

    public function update_handson($data)
    {
        $column = ["shift", "no_unit", "tipe_vessel", "loading_point", "type", "weighbridge", "no_transaction", "gross", "tare", "nett", "time_in", "time_out", "tipping", "remaks", "target", "precentage", "loss_weight", "keterangan", "status", "date"];

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
                $insert_sql[] = "INSERT INTO tbl_wb2 $insert_column VALUES $value_dalam";
            }


            $value_date = $data[0][19];
            $this->db->trans_start();
            $delete_query = "DELETE FROM tbl_wb2 WHERE date LIKE '$value_date'";
            $this->db->query($delete_query);
            foreach ($insert_sql as $key => $value) {
                $this->db->query($value);
            }
            $this->db->trans_complete();
            return "ok";
        } else
            return "error";
    }
    public function last_date_update()
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_wb2`  
        ORDER BY `tbl_wb2`.`date` DESC");

        return $hsl->result_array();
    }
    public function wb_hanson_gunungsari($data = null, $limit = null, $not = null, $order = null)
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
            $sql = "SELECT * FROM tbl_driver_ritasi_gunungsari WHERE 1=1 $condition $order $limit";


            $model = $this->db->query($sql);
            $model = $model->result_array();

            return $model;
        }
    }

    public function update_handson_gunungsari($data)
    {
        $column = ["date", "nrp", "driver_1", "nrp2", "driver_2", "unit", "vessel_type", "shift", "rekap_ritase_opt", "number_of_trip", "time_in", "time_out", "dari", "ke", "tonase", "gross", "tare", "nett", "id_transaksi", "tipe_coal", "wb"];

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
                $insert_sql[] = "INSERT INTO tbl_driver_ritasi_gunungsari $insert_column VALUES $value_dalam";
            }


            $value_date = $data[0][19];
            $this->db->trans_start();
            $delete_query = "DELETE FROM tbl_driver_ritasi_gunungsari WHERE date LIKE '$value_date'";
            $this->db->query($delete_query);
            foreach ($insert_sql as $key => $value) {
                $this->db->query($value);
            }
            $this->db->trans_complete();
            return "ok";
        } else
            return "error";
    }
    public function last_date_update_gunungsari()
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM `tbl_driver_ritasi_gunungsari`  
        ORDER BY `tbl_driver_ritasi_gunungsari`.`date` DESC");

        return $hsl->result_array();
    }
    public function get_all($tanggal, $bulan, $tahun)
    {
        $query  = $this->db->query("   SELECT * FROM
        ( 
            SELECT *,DATE_FORMAT(date,'%d') as tanggal , 
            DATE_FORMAT(date,'%m') as bulan, 
            DATE_FORMAT(date,'%Y') as tahun  FROM `tbl_wb2` 
            
             )
            as inner_query WHERE tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun' order by `id_wb` DESC");
        return $query->result();
    }
    public function get_tanggal()
    {
        $query  = $this->db->query("SELECT DATE_FORMAT(date,'%d') as tanggal FROM `tbl_wb2` WHERE nett IS NOT NULL AND date IS NOT NULL group by tanggal ORDER BY tanggal DESC");
        return $query->result();
    }
    public function get_bulan()
    {
        $query  = $this->db->query("SELECT DATE_FORMAT(date,'%m') as bulan FROM `tbl_wb2` WHERE nett IS NOT NULL AND date IS NOT NULL group by bulan ORDER BY bulan DESC ");
        return $query->result();
    }
    public function get_tahun()
    {
        $query  = $this->db->query("SELECT DATE_FORMAT(date,'%Y') as tahun FROM `tbl_wb2` WHERE nett IS NOT NULL AND date IS NOT NULL group by tahun ORDER BY tahun DESC ");
        return $query->result();
    }

    public function filter_date($tanggal, $bulan, $tahun)
    {
        $query  = $this->db->query("SELECT * FROM
        (
        SELECT *,DATE_FORMAT(date,'%d') as tanggal , 
            DATE_FORMAT(date,'%m') as bulan, 
            DATE_FORMAT(date,'%Y') as tahun 
        FROM tbl_wb2    
            )
            as inner_query WHERE tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun' order by id DESC ");
        return $query->result();
    }
    public function double()
    {
        $query = $this->db->query("SELECT a.*
        FROM tbl_wb2 a
        JOIN (SELECT  `no_transaction`, COUNT(*)
        FROM tbl_wb2 
        GROUP BY  `no_transaction`
        HAVING count(*) > 1 ) b
        ON a.`no_transaction` = b.`no_transaction`
        ORDER BY a.`no_transaction` DESC");

        return $query->result();
    }
    public function get_uncomplete()
    {
        $query  = $this->db->query("SELECT * FROM `tbl_wb2` WHERE nett IS NULL ORDER BY id_wb DESC");
        return $query->result();
    }
    public function get_complete()
    {
        $query  = $this->db->query("SELECT * FROM `tbl_wb2` WHERE status='COMPLETE'");
        return $query->result();
    }

    public function no($no)
    {
        return $this->db->get_where($this->_table, ["no" => $no])->row();
    }
    public function get_no_unit()
    {
        $query  = $this->db->query("SELECT `tbl_unit4digit`.`no_unit4`
        FROM tbl_unit4digit
        GROUP BY no_unit4");


        return $query->result();
    }

    public function get_vessel($id)
    {
        $hsl = $this->db->query("SELECT * FROM tbl_vessel WHERE id='$id'");
        // if ($hsl->num_rows() > 0) {
        //     foreach ($hsl->result() as $data) {
        //         $hasil = array(
        //             'id' => $data->id,
        //             'kapasitas' => $data->kapasitas,
        //             'kapasitas overload' => $data->overload,

        //         );
        //     }
        // }
        return $hsl->result();
    }

    public function vessel()
    {
        $query  = $this->db->query("SELECT `tbl_vessel`.`id`
        FROM tbl_vessel
        GROUP BY id");
        return $query->result();
    }

    public function get_load_point()
    {
        $query  = $this->db->query("SELECT `tbl_km_lokasi`.`nama_lokasi`
        FROM tbl_km_lokasi
        GROUP BY nama_lokasi");


        return $query->result();
    }
    public function get_wb()
    {
        $query  = $this->db->query("SELECT `tbl_wb2`.`weighbridge`
        FROM tbl_wb2
        GROUP BY weighbridge");


        return $query->result();
    }
    public function get_tipping()
    {
        $query  = $this->db->query("SELECT `tbl_wb2`.`tipping`
        FROM tbl_wb2
        GROUP BY tipping");


        return $query->result();
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }


    public function getUserById($no_transaction)
    {
        return $this->db->get_where('tbl_wb2', ['no_transaction ' => $no_transaction])->row_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_transaction = $post["no_transaction"];
        $this->shift = $post["shift"];
        $this->no_unit = $post["no_unit"];
        $this->tipe_vessel = $post["tipe_vessel"];
        $this->loading_point = $post["loading_point"];
        $this->type = $post["type"];
        $this->weighbridge = $post["weighbridge"];
        $this->gross = $post["gross"];
        $this->tare = $post["tare"];
        $this->nett = $post["nett"];
        $this->time_in = $post["time_in"];
        $this->time_out = $post["time_out"];
        $this->tipping = $post["tipping"];
        $this->target = $post["target"];
        $this->precentage = $post["precentage"];
        $this->loss_weight = $post["loss_weight"];
        $this->keterangan = $post["keterangan"];
        $this->status = $post["status"];
        $this->date = $post["date"];

        return $this->db->update($this->_table, $this, array('no_transaction' => $post['no_transaction']));
    }
    // public function update_uncomplete()
    // {
    //     $post = $this->input->post();
    //     $this->no_transaction = $post["no_transaction"];
    //     $this->time_out = $post["time_out"];
    //     $this->tipping = $post["tipping"];
    //     $this->status = $post["status"];
    //     return $this->db->update($this->_table, $this, array('no_transaction' => $post['no_transaction']));
    // }

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
        $this->db->insert_batch('tbl_wb2', $data);
    }
    public function delete_wb($no_transaction)
    {
        $this->db->delete('tbl_wb2', ['id_wb' => $no_transaction]);
    }
}
