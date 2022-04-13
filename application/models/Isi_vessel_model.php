<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_vessel_model extends CI_Model
{
    private $_table = "tbl_vessel";

    public $id;
    public $nama_vessel;
    public $tipe;
    public $kapasitas;
    public $kapasitas_overload;
    public $tipe_coal;

    public function rules()
    {
        return [
            [
                'field' => 'id',
                'label' => 'ID VESSEL',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_vessel',
                'label' => 'NAMA VESSEL',
                'rules' => 'required'
            ],
            [
                'field' => 'tipe',
                'label' => 'TIPE',
                'rules' => 'required'
            ],
            [
                'field' => 'kapasitas',
                'label' => 'KAPASITAS',
                'rules' => 'numeric'
            ],
            [
                'field' => 'kapasitas_overload',
                'label' => 'KAPASITAS OVERLOAD',
                'rules' => 'numeric'
            ],
            [
                'field' => 'tipe_coal',
                'label' => 'TIPE_COAL',
                'rules' => 'required'
            ]

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    // public function id($id)
    // {
    //     return $this->db->get_where($this->_table, ["id" => $id])->row();
    // }

    public function save()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->nama_vessel= $post["nama_vessel"];
        $this->tipe= $post["tipe"];
        $this->kapasitas= $post["kapasitas"];
        $this->kapasitas_overload= $post["kapasitas_overload"];
        $this->tipe_coal = $post["tipe_coal"];
        return $this->db->insert($this->_table, $this);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('tbl_vessel', ['id' => $id])->row_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id= $post["id"];
        $this->nama_vessel= $post["nama_vessel"];
        $this->tipe= $post["tipe"];
        $this->kapasitas= $post["kapasitas"];
        $this->kapasitas_overload= $post["kapasitas_overload"];
        $this->tipe_coal = $post["tipe_coal"];
        return $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete_vessel($id)
    {
        $this->db->delete('tbl_vessel', ['id' => $id]);
    }
}
