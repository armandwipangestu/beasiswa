<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{
    public function getJurusanById($id)
    {
        $query = $this->db->get_where('kampus_jurusan', ['id' => $id])->row_array();
        return $query;
    }
}
