<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi_model extends CI_Model
{
    public function getMahasiswaPrestasi($id_user)
    {
        $query = $this->db->query('SELECT * FROM mahasiswa_prestasi WHERE id_user = ' . $id_user . '')->row_array();
        return $query;
    }

    // public function deleteMahasiswaBiodataById($id_user)
    // {
    //     $this->db->where('id_user', $id_user);
    //     $this->db->delete('mahasiswa_biodata');
    // }
}
