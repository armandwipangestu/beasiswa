<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasProgram_model extends CI_Model
{
    public function getKelasProgramById($id)
    {
        $query = $this->db->get_where('kampus_kelas_program', ['id' => $id])->row_array();
        return $query;
    }
}
