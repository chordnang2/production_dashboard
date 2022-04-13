<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_lokasi_model extends CI_Model
{
    private $_table = "tbl_lokasi";

    public $id_lokasi;
    public $tipe;

    public function rules()
    {
        return [
            [
                'field' => 'id_lokasi',
                'label' => 'ID LOKASI',
                'rules' => 'required'
            ],

            [
                'field' => 'tipe',
                'label' => 'TIPE LOKASI',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function id_lokasi($id_lokasi)
    {
        return $this->db->get_where($this->_table, ["id_lokasi" => $id_lokasi])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_lokasi = $post["id_lokasi"];
        $this->tipe = $post["tipe"];
        return $this->db->insert($this->_table, $this);
    }

    public function getUserById($id_lokasi)
    {
        return $this->db->get_where('tbl_lokasi', ['id_lokasi' => $id_lokasi])->row_array();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_lokasi = $post["id_lokasi"];
        $this->tipe = $post["tipe"];
        return $this->db->update($this->_table, $this, array('id_lokasi' => $post['id_lokasi']));
    }

    public function delete_lokasi($id_lokasi)
    {
        $this->db->delete('tbl_lokasi', ['id_lokasi' => $id_lokasi]);
    }
}
