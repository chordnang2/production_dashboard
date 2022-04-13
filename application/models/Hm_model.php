<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hm_model extends CI_Model

{
    public function all()
    {
        $data = $this->db->query("SELECT * from tbl_hm");
        return $data->result();
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
        $this->db->insert_batch('tbl_hm', $data);
    }

    public function get_opt_nik_nama($nrp)
    {
        $hsl = $this->db->query("SELECT * FROM tbl_opt WHERE nrp ='$nrp'");

        return $hsl->result();
    }
    public function get_opt_nik_nama2($nrp2)
    {
        $hsl = $this->db->query("SELECT nrp as nrp2, nama_operator as nama_operator2 FROM tbl_opt WHERE nrp ='$nrp2'");

        return $hsl->result();
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
            $sql = "SELECT * FROM tbl_hm WHERE 1=1 $condition $order $limit";


            $model = $this->db->query($sql);
            $model = $model->result_array();

            return $model;
        }
    }

    public function update_handson($data)
    {
        $column = ["no_day", "nik_day", "nama_day", "ritase_day", "unit_day", "start_day", "end_day", "hours_day", "wh_day", "ganti_shift_day", "p5m_day", "p2h_day", "isi_solar_day", "coal_limit_day", "ism_day", "no_driver_day", "periksa_ban_day", "sholat_day", "cuci_unit_day", "silo_bd_day", "hopper_bd_day", "external_prob_day", "antri_load_day", "antri_dump_day", "antri_wb_day", "total_stb_day", "repair_day", "service_day", "accident_day", "total_bd_day", "pa_day", "ua_day", "no_night", "nik_night", "nama_night", "ritase_night", "unit_night", "start_night", "end_night", "hours_night", "wh_night", "ganti_shift_night", "p5m_night", "p2h_night", "isi_solar_night", "coal_limit_night", "ism_night", "no_driver_night", "periksa_ban_night", "sholat_night", "cuci_unit_night", "silo_bd_night", "hopper_bd_night", "external_prob_night", "antri_load_night", "antri_dump_night", "antri_wb_night", "total_stb_night", "repair_night", "service_night", "accident_night", "total_bd_night", "pa_night", "ua_night", "total_hm", "date",];

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
                $insert_sql[] = "INSERT INTO tbl_hm $insert_column VALUES $value_dalam";
            }

            $value_date = $data[0][65];
            $this->db->trans_start();
            $delete_query = "DELETE FROM tbl_hm WHERE date LIKE '$value_date'";

            $this->db->query($delete_query);
            foreach ($insert_sql as $key => $value) {
                $this->db->query($value);
            }
            // $this->db->query($no_0);
            $this->db->trans_complete();
            return "ok";
        } else
            return "error";
    }

    public function last_date_update()
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM tbl_hm ORDER BY date DESC");

        return $hsl->result_array();
    }
}
