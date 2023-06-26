<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function getAllNamaPengajuan()
    {
        $query = $this->db->query("SELECT `ud`.`nama`, `mp`.`id`, `mp`.`id_user`, `mp`.`status_pengajuan` FROM mahasiswa_pengajuan AS mp JOIN user_data AS ud ON `ud`.`id` = `mp`.`id_user`");
        return $query->result_array();
    }

    public function getDokumenById($id_user)
    {
        $query = $this->db->query(
            'SELECT
                mp.id,
                ud.nama,
                mb.tempat_lahir,
                mb.tanggal_lahir,
                mb.alamat,
                mb.no_telepon,
                mb.jenis_kelamin,
                kj.jurusan,
                mb.semester,
                kp.kelas_program,
                mpr.nama_kegiatan,
                mpr.jenis_kegiatan,
                mpr.tingkat,
                mpr.tahun,
                mpr.pencapaian,
                mpr.scan_sertifikat,
                ma.nama_ayah,
                sh.status_hidup,
                shb.status_hubungan,
                spd.status_pendidikan,
                spe.status_pekerjaan,
                ma.detail_ayah,
                sh_ibu.status_hidup,
                spd_ibu.status_pendidikan,
                spe_ibu.status_pekerjaan,
                mi.detail_ibu,
                mk.jumlah_tanggungan,
                mk.no_telepon_orang_tua,
                mk.foto_bersama_keluarga
            FROM
            mahasiswa_pengajuan AS mp
            JOIN user_data AS ud ON mp.id_user = ud.id
            JOIN mahasiswa_biodata AS mb ON mp.id_mahasiswa_biodata = mb.id
            JOIN kampus_jurusan AS kj ON mb.id_jurusan = kj.id
            JOIN kampus_kelas_program AS kp ON mb.id_kelas_program = kp.id
            JOIN mahasiswa_prestasi AS mpr ON mp.id_mahasiswa_prestasi = mpr.id
            JOIN mahasiswa_keluarga AS mk ON mp.id_mahasiswa_keluarga = mk.id
            JOIN mahasiswa_ayah AS ma ON mk.id_ayah = ma.id
            JOIN status_hidup AS sh ON ma.id_status_hidup = sh.id
            JOIN status_hubungan AS shb ON ma.id_status_hubungan = shb.id
            JOIN status_pendidikan AS spd ON ma.id_status_pendidikan = spd.id
            JOIN status_pekerjaan AS spe ON ma.id_status_pekerjaan = spe.id
            JOIN mahasiswa_ibu AS mi ON mk.id_ayah = mi.id
            JOIN status_hidup AS sh_ibu ON mi.id_status_hidup = sh_ibu.id
            JOIN status_pendidikan AS spd_ibu ON mi.id_status_pendidikan = spd_ibu.id
            JOIN status_pekerjaan AS spe_ibu ON mi.id_status_pekerjaan = spe_ibu.id
            WHERE mp.id = ' . $id_user . ''
        )->row_array();

        return $query;
    }
}
