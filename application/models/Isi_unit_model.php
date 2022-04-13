<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_unit_model extends CI_Model
{
    private $_table = "tbl_unit";

    public $no_unit;
    public $tipe;
    public $status;
    public $keterangan;

    public function rules()
    {
        return [
            [
                'field' => 'no_unit',
                'label' => 'NO Unit',
                'rules' => 'required'
            ],

            [
                'field' => 'tipe',
                'label' => 'TIPE',
                'rules' => 'required'
            ],

            [
                'field' => 'status',
                'label' => 'STATUS',
                'rules' => 'required'
            ],
            [
                'field' => 'keterangan',
                'label' => 'KETERANGAN',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function No_unit($no_unit)
    {
        return $this->db->get_where($this->_table, ["no_unit" => $no_unit])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no_unit = $post["no_unit"];
        $this->tipe = $post["tipe"];
        $this->status = $post["status"];
        $this->keterangan = $post["keterangan"];
        return $this->db->insert($this->_table, $this);
    }

    public function getUserById($no_unit)
    {
        return $this->db->get_where('tbl_unit', ['no_unit' => $no_unit])->row_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no_unit = $post["no_unit"];
        $this->tipe = $post["tipe"];
        $this->status = $post["status"];
        $this->keterangan = $post["keterangan"];
        return $this->db->update($this->_table, $this, array('no_unit' => $post['no_unit']));
    }

    public function delete_unit($no_unit)
    {
        $this->db->delete('tbl_unit', ['no_unit' => $no_unit]);
    }
}
