<?php defined('BASEPATH') or exit('No direct script access allowed');

class Isi_opt_model extends CI_Model
{
    private $_table = "tbl_opt";

    public $nrp;
    public $nama_operator;

    public function rules()
    {
        return [
            [
                'field' => 'nrp',
                'label' => 'NRP',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_operator',
                'label' => 'NAMA',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function Nrp($nrp)
    {
        return $this->db->get_where($this->_table, ["nrp" => $nrp])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nrp = $post["nrp"];
        $this->nama_operator = $post["nama_operator"];
        return $this->db->insert($this->_table, $this);
    }

    public function getUserById($nrp)
    {
        return $this->db->get_where('tbl_opt', ['nrp' => $nrp])->row_array();
    }
    public function update()
    {
        $post = $this->input->post();
        $this->nrp = $post["nrp"];
        $this->nama_operator = $post["nama_operator"];
        return $this->db->update($this->_table, $this, array('nrp' => $post['nrp']));
    }

    public function delete_opt($nrp)
    {
        $this->db->delete('tbl_opt', ['nrp' => $nrp]);
    }
}
