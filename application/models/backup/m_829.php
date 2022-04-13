<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_829 extends CI_Model

{
    private $_table = "tbl_fms_geofence";
    private $_table2 = "tbl_fms_unit";


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function listunit()
    {
        // return $this->db->get($this->_table2)->result();
        $query =$this->db->query( "SELECT `tbl_fms_geofence`.*, `tbl_lokasi`.*
		FROM tbl_fms_geofence
        LEFT JOIN `tbl_lokasi` ON `tbl_fms_geofence`.`geofence` = `tbl_lokasi`.`id_lokasi`
        WHERE unit='MHA PM-829'
        AND tipe='travel'       
        ");
       return $query->result();
    }
}
