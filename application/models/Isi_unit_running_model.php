<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Isi_unit_running_model extends CI_Model
{
    private $_table = "tbl_dispatch";

    function load_data()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('tbl_unit4digit');
        return $query->result_array();
    }

    function insert_data($data)
    {
        $this->db->insert('tbl_unit4digit', $data);
    }

    function update_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_unit4digit', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_unit4digit');
    }
    public function get_unit4()
    {
        $query  = $this->db->query("SELECT `tbl_unit4digit`.`id`
        FROM tbl_unit4digit
      ORDER BY `id` DESC");


        return $query->result();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function rules()
    {
        return [
            [
                'field' => 'unit',
                'label' => 'UNIT',
                'rules' => 'required'
            ],
            [
                'field' => 'status',
                'label' => 'STATUS',
                'rules' => 'required'
            ],
            [
                'field' => 'jam',
                'label' => 'JAM',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal',
                'label' => 'TANGGAL',
                'rules' => 'required'
            ],
            [
                'field' => 'keterangan',
                'label' => 'AKTIFITAS',
                'rules' => 'required'
            ],
        ];
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->no = $post["no"];
        $this->unit = $post["unit"];
        $this->status = $post["status"];
        $this->jam = $post["jam"];
        $this->tanggal = $post["tanggal"];
        $this->keterangan = $post["keterangan"];
        return $this->db->insert($this->_table, $this);
    }

    public function getUserById($no)
    {
        return $this->db->get_where('tbl_running_unit', ['no' => $no])->row_array();
    }

    public function get_unit4digit()
    {
        $query = $this->db->query("SELECT tbl_unit4digit.id FROM tbl_unit4digit");
        return $query->result();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->no = $post["no"];
        $this->unit = $post["unit"];
        $this->status = $post["status"];
        $this->jam = $post["jam"];
        $this->tanggal = $post["tanggal"];
        $this->keterangan = $post["keterangan"];
        return $this->db->update($this->_table, $this, array('no' => $post['no']));
    }

    public function delete_bd($no)
    {
        $this->db->delete('tbl_running_unit', ['no' => $no]);
    }
    public function get_all()
    {

        $query = $this->db->query("SELECT count(tbl_unit4digit.id) as no FROM `tbl_unit4digit` WHERE id NOT IN ('8027','8039') ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_all()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE status='RUNNING' AND id NOT IN ('8027','8039') ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }

    public function get_unit_running()
    {

        $query = $this->db->query("SELECT count(tbl_unit4digit.id) as no FROM `tbl_unit4digit` WHERE id NOT IN ('8027','8039') AND status='RUNNING'   ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_unit_running()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE id NOT IN ('8027','8039') AND status='RUNNING'  ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }

    public function get_no_set_vessel()
    {
        $query = $this->db->query("SELECT count(id) as no FROM `tbl_unit4digit` WHERE status='NO SET VESSEL' ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_no_set_vessel()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE status='NO SET VESSEL'  ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }

    public function get_unit_service()
    {
        $query = $this->db->query("SELECT count(id) as no FROM `tbl_unit4digit` WHERE status='SERVICE' ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_unit_service()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE status='SERVICE'  ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }

    public function get_unit_bd()
    {
       
        $query = $this->db->query("SELECT count(id) as no FROM `tbl_unit4digit` WHERE  id NOT IN ('8027','8039') AND status='BREAKDOWN' ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_unit_bd()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE status='BREAKDOWN'  ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }

    public function get_unit_stb()
    {
       
        $query = $this->db->query("SELECT count(id) as no FROM `tbl_unit4digit` WHERE status='STANDBY READY' ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_unit_stb()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE status='STANDBY READY'  ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }


    public function get_unit_accident()
    {
       
        $query = $this->db->query("SELECT count(id) as no FROM `tbl_unit4digit` WHERE status='ACCIDENT' ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
    public function get_detail_unit_accident()
    {

        $query = $this->db->query("SELECT id, vessel4, status, unit_camp4 FROM `tbl_unit4digit` WHERE status='ACCIDENT'  ");
        // status_highlight IS NULL OR status_highlight='' AND 
        return $query->result();
    }
}


/* End of file Isi_unit_running_model.php and path /application/models/Isi_unit_running_model.php */
