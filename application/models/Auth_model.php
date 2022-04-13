<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function cek_login($username)
    {
        $hasil = $this->db->where('username', $username)->limit(100)->get('users');
        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }

    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
