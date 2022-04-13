<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_dmbd_model extends CI_Model

{
    public function get_all()
    {
        return $this->db->get('tbl_dmbd')->result();
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
        $this->db->insert_batch('tbl_dmbd', $data);
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
            $sql = "SELECT * FROM tbl_dmbd WHERE 1=1 $condition $order $limit";


            $model = $this->db->query($sql);
            $model = $model->result_array();

            return $model;
        }
    }

    public function update_handson($data)
    {
        $column = ["bulan", "date", "mo", "kode_unit", "kode_vessel", "model_unit", "model_vessel", "hm", "km", "task", "job_type", "kerusakan", "jenis_perbaikan", "jam_mulai", "jam_selesai", "total_bd", "status", "lokasi", "remark", "pic", "pa", "shift"];

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
                $insert_sql[] = "INSERT INTO tbl_dmbd $insert_column VALUES $value_dalam";
            }

            $value_date = $data[0][2];
            $this->db->trans_start();
            $delete_query = "DELETE FROM tbl_dmbd WHERE date LIKE '$value_date'";
            $no_new_line_query_kerusakan = "UPDATE tbl_dmbd SET kerusakan = TRIM(REPLACE(REPLACE(REPLACE(`kerusakan`, '\n', ' '), '\r', ' '), '\t', ' '))";
            $no_petik_query_kerusakan = "UPDATE tbl_dmbd SET kerusakan = REPLACE(kerusakan,  '\'', '`')";
            $no_new_line_query_jp = "UPDATE tbl_dmbd SET jenis_perbaikan = TRIM(REPLACE(REPLACE(REPLACE(`jenis_perbaikan`, '\n', ' '), '\r', ' '), '\t', ' '))";
            $no_petik_query_jp = "UPDATE tbl_dmbd SET jenis_perbaikan = REPLACE(jenis_perbaikan,  '\'', '`')";

            $this->db->query($delete_query);
            foreach ($insert_sql as $key => $value) {
                $this->db->query($value);
            }
            $this->db->query($no_new_line_query_kerusakan);
            $this->db->query($no_petik_query_kerusakan);
            $this->db->query($no_new_line_query_jp);
            $this->db->query($no_petik_query_jp);
            $this->db->trans_complete();
            return "ok";
        } else
            return "error";
    }
    public function last_date_update()
    {
        $hsl = $this->db->query("SELECT DATE_FORMAT(date, '%e %M %Y') as date FROM tbl_dmbd ORDER BY date DESC");

        return $hsl->result_array();
    }
}
