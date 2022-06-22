<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_thajaran extends CI_Model
{
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function hapus_data($where2, $table)
    {
        $this->db->where($where2);
        $this->db->delete($table);
    }
}
