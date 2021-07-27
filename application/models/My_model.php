<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_model extends CI_Model
{
    public function ambildata($table)
    {
        return $this->db->get($table);
    }

    public function tambahdata($table, $data)
    {
        if ($this->db->insert($table, $data)) {
            return 1;
        }
    }

    public function ubahdata($table, $pk, $data)
    {
        $this->db->where($pk, $data['id']);
        if ($this->db->update($table, $data['data'])) {
            return 1;
        }
    }

    public function deletedata($table, $pk, $data)
    {
        $this->db->where($pk, $data);
        if ($this->db->delete($table)) {
            return 1;
        }
    }
}
