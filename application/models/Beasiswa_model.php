<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa_model extends CI_Model
{
    public function getMahasiswaBiodata($id_user)
    {
        $query = $this->db->query('SELECT * FROM mahasiswa_biodata WHERE id_user = ' . $id_user . '')->row_array();
        return $query;
    }
}
