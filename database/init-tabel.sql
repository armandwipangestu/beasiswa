CREATE TABLE `kampus_jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `kampus_kelas_program` (
  `id` int(11) NOT NULL,
  `kelas_program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mahasiswa_ayah` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `id_status_hidup` int(11) DEFAULT NULL,
  `id_status_hubungan` int(11) DEFAULT NULL,
  `id_status_pendidikan` int(11) DEFAULT NULL,
  `id_status_pekerjaan` int(11) DEFAULT NULL,
  `detail_ayah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mahasiswa_biodata` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `id_kelas_program` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mahasiswa_ibu` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `id_status_hidup` int(11) DEFAULT NULL,
  `id_status_pendidikan` int(11) DEFAULT NULL,
  `id_status_pekerjaan` int(11) DEFAULT NULL,
  `detail_ibu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mahasiswa_keluarga` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ayah` int(11) DEFAULT NULL,
  `id_ibu` int(11) DEFAULT NULL,
  `jumlah_tanggungan` varchar(15) DEFAULT NULL,
  `no_telepon_orang_tua` varchar(25) DEFAULT NULL,
  `foto_bersama_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `mahasiswa_pengajuan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa_biodata` int(11) NOT NULL,
  `id_mahasiswa_prestasi` int(11) NOT NULL,
  `id_mahasiswa_keluarga` int(11) NOT NULL,
  `status_pengajuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_pengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `mahasiswa_prestasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `jenis_kegiatan` varchar(128) DEFAULT NULL,
  `tingkat` varchar(128) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `pencapaian` varchar(128) DEFAULT NULL,
  `scan_sertifikat` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `review_pengajuan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa_pengajuan` int(11) NOT NULL,
  `tanggal_review` int(11) NOT NULL,
  `alasan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `status_hidup` (
  `id` int(11) NOT NULL,
  `status_hidup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `status_hubungan` (
  `id` int(11) NOT NULL,
  `status_hubungan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `status_pekerjaan` (
  `id` int(11) NOT NULL,
  `status_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `status_pendidikan` (
  `id` int(11) NOT NULL,
  `status_pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `kampus_jurusan`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `kampus_kelas_program`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `mahasiswa_ayah`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `mahasiswa_biodata`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `mahasiswa_ibu`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `mahasiswa_keluarga`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `mahasiswa_pengajuan`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `mahasiswa_prestasi`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `review_pengajuan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status_hidup`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status_hubungan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status_pekerjaan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status_pendidikan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `kampus_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `kampus_kelas_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mahasiswa_ayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mahasiswa_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mahasiswa_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mahasiswa_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mahasiswa_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mahasiswa_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `review_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `status_hidup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `status_hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `status_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `status_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;