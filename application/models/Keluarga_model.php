<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{
    public function getMahasiswaKeluarga($id_user)
    {
        $query = $this->db->query('SELECT * FROM mahasiswa_keluarga WHERE id_user = ' . $id_user . '')->row_array();
        return $query;
    }
}
