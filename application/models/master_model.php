<?php
defined('BASEPATH') or exit('No direct script access allowed');

class master_model extends CI_Model
{
              public function getAllNamaPengajuan()
              {
                            $query = $this->db->query('SELECT `ud`.`nama`,`mp`.`id`,`mp`.`status_pengajuan` FROM mahasiswa_pengajuan AS mp JOIN user_data AS ud ON `ud`.`id` = `mp`.`id_user`');
                            return $query->result_array();
              }

              public function getDokumenById($id)
              {
                            
              }
}