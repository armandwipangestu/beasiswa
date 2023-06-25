<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{
    public function getMahasiswaKeluarga($id_user)
    {
        // $query = $this->db->query('SELECT * FROM mahasiswa_keluarga WHERE id_user = ' . $id_user . '')->row_array();

        // OLD QUERY

        // $query = $this->db->query('SELECT
        //         mk.id,
        //         mk.id_user,
        //         ma.nama_ayah,
        //         sh.status_hidup AS status_hidup_ayah,
        //         shb.status_hubungan AS status_hubungan_ayah,
        //         spd.status_pendidikan AS status_pendidikan_ayah,
        //         spe.status_pekerjaan AS status_pekerjaan_ayah,
        //         ma.detail_ayah,
        //         mi.nama_ibu,
        //         sh_ibu.status_hidup AS status_hidup_ibu,
        //         spd_ibu.status_pendidikan AS status_pendidikan_ibu,
        //         spe_ibu.status_pekerjaan AS status_pekerjaan_ibu,
        //         mi.detail_ibu,
        //         mk.jumlah_tanggungan,
        //         mk.no_telepon_orang_tua,
        //         mk.foto_bersama_keluarga
        //     FROM mahasiswa_keluarga AS mk
        //     LEFT JOIN mahasiswa_ayah AS ma ON mk.id_ayah = ma.id
        //     LEFT JOIN mahasiswa_ibu AS mi ON mk.id_ibu = mi.id
        //     LEFT JOIN status_hidup AS sh ON ma.id_status_hidup = sh.id
        //     LEFT JOIN status_hubungan AS shb ON ma.id_status_hubungan = shb.id
        //     LEFT JOIN status_pendidikan AS spd ON ma.id_status_pendidikan = spd.id
        //     LEFT JOIN status_pekerjaan AS spe ON ma.id_status_pekerjaan = spe.id
        //     LEFT JOIN status_hidup AS sh_ibu ON mi.id_status_hidup = sh_ibu.id
        //     LEFT JOIN status_pendidikan AS spd_ibu ON mi.id_status_pendidikan = spd_ibu.id
        //     LEFT JOIN status_pekerjaan AS spe_ibu ON mi.id_status_pekerjaan = spe_ibu.id
        //     -- WHERE mk.id_user = ' . $id_user . '
        //     -- AND ma.id_user = ' . $id_user . '
        //     -- AND mi.id_user = ' . $id_user . '
        // ')->row_array();
        // return $query;

        // NEW QUERY
        $query = $this->db->query('SELECT
                mk.id,
                mk.id_user,
                ma.nama_ayah,
                sh.id AS id_status_hidup_ayah,
                sh.status_hidup AS status_hidup_ayah,
                shb.id AS id_status_hubungan_ayah,
                shb.status_hubungan AS status_hubungan_ayah,
                spd.id AS id_status_pendidikan_ayah,
                spd.status_pendidikan AS status_pendidikan_ayah,
                spe.id AS id_status_pekerjaan_ayah,
                spe.status_pekerjaan AS status_pekerjaan_ayah,
                ma.detail_ayah,
                mi.nama_ibu,
                sh_ibu.id AS id_status_hidup_ibu,
                sh_ibu.status_hidup AS status_hidup_ibu,
                spd_ibu.id AS id_status_pendidikan_ibu,
                spd_ibu.status_pendidikan AS status_pendidikan_ibu,
                spe_ibu.id AS id_status_pekerjaan_ibu,
                spe_ibu.status_pekerjaan AS status_pekerjaan_ibu,
                mi.detail_ibu,
                mk.jumlah_tanggungan,
                mk.no_telepon_orang_tua,
                mk.foto_bersama_keluarga
            FROM mahasiswa_keluarga AS mk
            LEFT JOIN mahasiswa_ayah AS ma ON mk.id_ayah = ma.id AND ma.id_user = ' . $id_user . '
            LEFT JOIN mahasiswa_ibu AS mi ON mk.id_ibu = mi.id AND mi.id_user = ' . $id_user . '
            LEFT JOIN status_hidup AS sh ON ma.id_status_hidup = sh.id
            LEFT JOIN status_hubungan AS shb ON ma.id_status_hubungan = shb.id
            LEFT JOIN status_pendidikan AS spd ON ma.id_status_pendidikan = spd.id
            LEFT JOIN status_pekerjaan AS spe ON ma.id_status_pekerjaan = spe.id
            LEFT JOIN status_hidup AS sh_ibu ON mi.id_status_hidup = sh_ibu.id
            LEFT JOIN status_pendidikan AS spd_ibu ON mi.id_status_pendidikan = spd_ibu.id
            LEFT JOIN status_pekerjaan AS spe_ibu ON mi.id_status_pekerjaan = spe_ibu.id
            WHERE mk.id_user = ' . $id_user . '
        ')->row_array();
        return $query;
    }

    public function getMahasiswaAyahById($id_user)
    {
        $query = $this->db->query('SELECT `id` FROM mahasiswa_ayah WHERE id_user = ' . $id_user . '')->row_array();
        return $query;
    }

    public function getMahasiswaIbuById($id_user)
    {
        $query = $this->db->query('SELECT `id` FROM mahasiswa_ibu WHERE id_user = ' . $id_user . '')->row_array();
        return $query;
    }

    public function checkFieldsFilled($id_user)
    {
        $result = $this->db->query('SELECT
                mk.id,
                mk.id_user,
                ma.nama_ayah,
                sh.id AS id_status_hidup_ayah,
                sh.status_hidup AS status_hidup_ayah,
                shb.id AS id_status_hubungan_ayah,
                shb.status_hubungan AS status_hubungan_ayah,
                spd.id AS id_status_pendidikan_ayah,
                spd.status_pendidikan AS status_pendidikan_ayah,
                spe.id AS id_status_pekerjaan_ayah,
                spe.status_pekerjaan AS status_pekerjaan_ayah,
                ma.detail_ayah,
                mi.nama_ibu,
                sh_ibu.id AS id_status_hidup_ibu,
                sh_ibu.status_hidup AS status_hidup_ibu,
                spd_ibu.id AS id_status_pendidikan_ibu,
                spd_ibu.status_pendidikan AS status_pendidikan_ibu,
                spe_ibu.id AS id_status_pekerjaan_ibu,
                spe_ibu.status_pekerjaan AS status_pekerjaan_ibu,
                mi.detail_ibu,
                mk.jumlah_tanggungan,
                mk.no_telepon_orang_tua,
                mk.foto_bersama_keluarga
            FROM mahasiswa_keluarga AS mk
            LEFT JOIN mahasiswa_ayah AS ma ON mk.id_ayah = ma.id AND ma.id_user = ' . $id_user . '
            LEFT JOIN mahasiswa_ibu AS mi ON mk.id_ibu = mi.id AND mi.id_user = ' . $id_user . '
            LEFT JOIN status_hidup AS sh ON ma.id_status_hidup = sh.id
            LEFT JOIN status_hubungan AS shb ON ma.id_status_hubungan = shb.id
            LEFT JOIN status_pendidikan AS spd ON ma.id_status_pendidikan = spd.id
            LEFT JOIN status_pekerjaan AS spe ON ma.id_status_pekerjaan = spe.id
            LEFT JOIN status_hidup AS sh_ibu ON mi.id_status_hidup = sh_ibu.id
            LEFT JOIN status_pendidikan AS spd_ibu ON mi.id_status_pendidikan = spd_ibu.id
            LEFT JOIN status_pekerjaan AS spe_ibu ON mi.id_status_pekerjaan = spe_ibu.id
            WHERE mk.id_user = ' . $id_user . '
        ')->row_array();

        // Cek setiap field pada baris yang ditemukan
        foreach ($result as $field => $value) {
            if (empty($value)) {
                return false;
            }
        }

        return true;
    }
}
