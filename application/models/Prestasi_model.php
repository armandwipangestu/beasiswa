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

    public function checkFieldsFilled($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->from('mahasiswa_prestasi');
        $result = $this->db->get()->row();

        // Cek setiap field pada baris yang ditemukan
        foreach ($result as $field => $value) {
            if (empty($value)) {
                return false;
            }
        }

        return true;
    }
}
