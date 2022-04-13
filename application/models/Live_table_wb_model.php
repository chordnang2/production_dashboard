<?php
class Live_table_wb_model extends CI_Model
{
    //ambil semua data
    function load_data()
    {
        date_default_timezone_set('Asia/Singapore');
        $t = strtotime("today");
        $y = strtotime("yesterday");
        $hariini = date("Y-m-d", $t);
        $kemaren = date("Y-m-d", $y);

        $jamini = date("H");
        $menitini = date("m", $t);
        $detikini = date("s", $t);


        if ($jamini >= 00 && $jamini < 07) {
            $a =  $kemaren;
        } else {
            $a =  $hariini;
        }
        $this->db->order_by('id_wb', 'DESC');
        // $this->db->where('date', $a);
        $query = $this->db->get('tbl_wb2');
        return $query->result_array();
    }

    // simpan data
    function insert_data($data)
    {
        $this->db->insert('tbl_wb2', $data);
    }

    //update data
    function update_data($data, $id_wb)
    {
        $this->db->where('id_wb', $id_wb);
        $this->db->update('tbl_wb2', $data);
    }

    //delete data
    function delete($id_wb)
    {
        $this->db->where('id_wb', $id_wb);
        $this->db->delete('tbl_wb2');
    }


    public function get_no_unit()
    {
        $query  = $this->db->query("SELECT `tbl_unit4digit`.`no_unit4`
        FROM tbl_unit4digit
        GROUP BY no_unit4");


        return $query->result();
    }

    public function get_load_point()
    {
        $query  = $this->db->query("SELECT `tbl_km_lokasi`.`nama_lokasi`
        FROM tbl_km_lokasi
        GROUP BY nama_lokasi");


        return $query->result();
    }
}
