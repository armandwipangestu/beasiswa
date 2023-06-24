-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 12:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--
CREATE DATABASE IF NOT EXISTS `beasiswa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beasiswa`;

-- --------------------------------------------------------

--
-- Table structure for table `kampus_jurusan`
--

CREATE TABLE `kampus_jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kampus_jurusan`
--

INSERT INTO `kampus_jurusan` (`id`, `jurusan`) VALUES
(1, 'S1 Teknik Informatika'),
(2, 'S1 Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `kampus_kelas_program`
--

CREATE TABLE `kampus_kelas_program` (
  `id` int(11) NOT NULL,
  `kelas_program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kampus_kelas_program`
--

INSERT INTO `kampus_kelas_program` (`id`, `kelas_program`) VALUES
(1, 'Reguler'),
(2, 'Eksekutif'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_ayah`
--

CREATE TABLE `mahasiswa_ayah` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `id_status_hidup` int(11) DEFAULT NULL,
  `id_status_hubungan` int(11) DEFAULT NULL,
  `id_status_pendidikan` int(11) DEFAULT NULL,
  `id_status_pekerjaan` int(11) DEFAULT NULL,
  `detail_ayah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_ayah`
--

INSERT INTO `mahasiswa_ayah` (`id`, `id_user`, `nama_ayah`, `id_status_hidup`, `id_status_hubungan`, `id_status_pendidikan`, `id_status_pekerjaan`, `detail_ayah`) VALUES
(1, 13, 'Test Ayah', 1, 1, 4, 3, 'Test Detail Ayah'),
(2, 12, 'Ayah Test 2', 2, 1, 5, 2, 'Ayah Test Detail'),
(6, 14, 'test', 3, 3, 2, 1, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_biodata`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_biodata`
--

INSERT INTO `mahasiswa_biodata` (`id`, `id_user`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jenis_kelamin`, `id_jurusan`, `semester`, `id_kelas_program`) VALUES
(38, 12, 'Bandung', '2002-12-15', 'Jl. Jakarta, Kelurahan Kebonwaru, Kecamatan Batununggal, Kota Bandung 40272', '089637369606', 'Laki-laki', 1, 5, 3),
(39, 13, 'Jakarta', '2011-03-01', 'Jl. Purwakarta, Kelurahan Antapani Tengah, Kecamatan Antapani, Kota Bandung', '081239876543', 'Perempuan', 2, 6, 1),
(40, 14, 'Test Biodata', '2023-06-30', 'Jl. Biodata', '01234', 'Perempuan', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_ibu`
--

CREATE TABLE `mahasiswa_ibu` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `id_status_hidup` int(11) DEFAULT NULL,
  `id_status_pendidikan` int(11) DEFAULT NULL,
  `id_status_pekerjaan` int(11) DEFAULT NULL,
  `detail_ibu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_ibu`
--

INSERT INTO `mahasiswa_ibu` (`id`, `id_user`, `nama_ibu`, `id_status_hidup`, `id_status_pendidikan`, `id_status_pekerjaan`, `detail_ibu`) VALUES
(1, 13, 'Test Ibu', 1, 2, 3, 'Test Detail Ibu'),
(2, 12, 'Ibu Test 2', 1, 4, 1, 'Test Ibu Detail'),
(6, 14, 'aqwe', 1, 5, 1, 'ewq');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_keluarga`
--

CREATE TABLE `mahasiswa_keluarga` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ayah` int(11) DEFAULT NULL,
  `id_ibu` int(11) DEFAULT NULL,
  `jumlah_tanggungan` varchar(15) DEFAULT NULL,
  `no_telepon_orang_tua` varchar(25) DEFAULT NULL,
  `foto_bersama_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_keluarga`
--

INSERT INTO `mahasiswa_keluarga` (`id`, `id_user`, `id_ayah`, `id_ibu`, `jumlah_tanggungan`, `no_telepon_orang_tua`, `foto_bersama_keluarga`) VALUES
(1, 13, 1, 1, 'Tidak ada', '08123456789', 'default.png'),
(2, 12, 2, 2, '4', '0987654321', 'default.png'),
(6, 14, 6, 6, '2', '098712345', 'photo_2021-04-15_00-04-43.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_prestasi`
--

CREATE TABLE `mahasiswa_prestasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `jenis_kegiatan` varchar(128) DEFAULT NULL,
  `tingkat` varchar(128) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `pencapaian` varchar(128) DEFAULT NULL,
  `scan_sertifikat` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_prestasi`
--

INSERT INTO `mahasiswa_prestasi` (`id`, `id_user`, `nama_kegiatan`, `jenis_kegiatan`, `tingkat`, `tahun`, `pencapaian`, `scan_sertifikat`) VALUES
(2, 13, 'Praktek Kerja Industri', 'Individual', 'Kabupaten/Kota', '2020', 'Juara 1', 'photo_2021-08-03_19-45-21.jpg'),
(3, 14, 'Ini Test Ke 3', 'Kelompok/Tim', 'Nasional', '2023', 'Juara 1', 'photo_2021-04-15_00-04-40.jpg'),
(4, 12, NULL, NULL, NULL, NULL, NULL, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `status_hidup`
--

CREATE TABLE `status_hidup` (
  `id` int(11) NOT NULL,
  `status_hidup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_hidup`
--

INSERT INTO `status_hidup` (`id`, `status_hidup`) VALUES
(1, 'Masih Hidup'),
(2, 'Wafat'),
(3, 'Bercerai');

-- --------------------------------------------------------

--
-- Table structure for table `status_hubungan`
--

CREATE TABLE `status_hubungan` (
  `id` int(11) NOT NULL,
  `status_hubungan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_hubungan`
--

INSERT INTO `status_hubungan` (`id`, `status_hubungan`) VALUES
(1, 'Ayah Kandung'),
(2, 'Ayah Tiri'),
(3, 'Wali');

-- --------------------------------------------------------

--
-- Table structure for table `status_pekerjaan`
--

CREATE TABLE `status_pekerjaan` (
  `id` int(11) NOT NULL,
  `status_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pekerjaan`
--

INSERT INTO `status_pekerjaan` (`id`, `status_pekerjaan`) VALUES
(1, 'PNS'),
(2, 'Pegawai Swasta'),
(3, 'Wirausaha'),
(4, 'TNI / Polri'),
(5, 'Petani'),
(6, 'Nelayan'),
(7, 'Tidak Bekerja');

-- --------------------------------------------------------

--
-- Table structure for table `status_pendidikan`
--

CREATE TABLE `status_pendidikan` (
  `id` int(11) NOT NULL,
  `status_pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_pendidikan`
--

INSERT INTO `status_pendidikan` (`id`, `status_pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'SD / MI / Sederajat'),
(3, 'SMP / MTs / Sederajat'),
(4, 'SMA / MA / Sederajat'),
(5, 'D1 / Sederajat'),
(6, 'D2 / Sederajat'),
(7, 'D3 / Sederajat'),
(8, 'D4 / S1 / Sederajat'),
(9, 'S2 / Sp1 / Sederajat'),
(10, 'S3 / Sp2 / Sederajat');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 2, 2),
(10, 1, 3),
(11, 1, 2),
(15, 1, 4),
(16, 9, 2),
(17, 9, 3),
(18, 9, 4),
(19, 1, 20),
(20, 2, 21),
(21, 1, 22),
(22, 1, 24),
(23, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `date_created`) VALUES
(7, 'Admin', 'admin@admin.com', 'photo_2021-04-15_00-04-43.jpg', '$2y$10$94RAzKMBzc6OUull8bZ2leTmCAyUvWpuMJ3h/YuPhFC9ZXfgnHD2O', 1, 1687161877),
(12, 'Arman Dwi Pangestu', 'arman@gmail.com', 'photo_2021-04-15_00-04-40-modified.png', '$2y$10$QYWGnH6Tx9m8CH9hu1pLG.6Kh0l7WUgpbpbCoja1m3VOJi0nL1NYu', 2, 1687356267),
(13, 'User', 'user@user.com', 'IMG_20211110_200128.jpg', '$2y$10$h9tfIXfLLx8ZSpvY7KuQq.SMtbPF2hm1JDpeauTPq1orGJtNVTvYO', 2, 1687402958),
(14, 'Test', 'test@test.com', 'default.png', '$2y$10$1a7/SbfjKD.lpnxxfu5Da.cJxkFUabVwIfYKcMr/0UDop5Pwx/msC', 2, 1687526388);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Submenu'),
(20, 'Beasiswa'),
(21, 'Dashboard'),
(22, 'Kampus'),
(25, 'Status');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-fire'),
(3, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user'),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder'),
(5, 4, 'Submenu Management', 'submenu', 'fas fa-fw fa-folder-open'),
(9, 1, 'Role Akses', 'admin/role', 'fas fa-fw fa-user-tie'),
(10, 2, 'Ubah Profil', 'user/ubah', 'fas fa-fw fa-user-edit'),
(11, 2, 'Ganti Kata Sandi', 'user/ganti_kata_sandi', 'fas fa-fw fa-key'),
(12, 1, 'User Data', 'admin/user_data', 'fas fa-fw fa-users'),
(13, 20, 'Daftar Pemohon', 'beasiswa/pemohon', 'fas fa-fw fa-graduation-cap'),
(14, 21, 'Dokumen Beasiswa', 'dashboard', 'fas fa-fw fa-graduation-cap'),
(15, 22, 'Jurusan', 'kampus/jurusan', 'fas fa-fw fa-location-arrow'),
(16, 22, 'Kelas Program', 'kampus/kelas_program', 'fas fa-fw fa-sitemap'),
(18, 25, 'Status Hidup', 'status/hidup', 'fas fa-fw fa-heart'),
(19, 25, 'Status Hubungan', 'status/hubungan', 'fas fa-fw fa-link'),
(20, 25, 'Status Pendidikan', 'status/pendidikan', 'fas fa-fw fa-school'),
(21, 25, 'Status Pekerjaan', 'status/pekerjaan', 'fas fa-fw fa-briefcase');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kampus_jurusan`
--
ALTER TABLE `kampus_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kampus_kelas_program`
--
ALTER TABLE `kampus_kelas_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_ayah`
--
ALTER TABLE `mahasiswa_ayah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_ibu`
--
ALTER TABLE `mahasiswa_ibu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_keluarga`
--
ALTER TABLE `mahasiswa_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_prestasi`
--
ALTER TABLE `mahasiswa_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_hidup`
--
ALTER TABLE `status_hidup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_hubungan`
--
ALTER TABLE `status_hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kampus_jurusan`
--
ALTER TABLE `kampus_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kampus_kelas_program`
--
ALTER TABLE `kampus_kelas_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa_ayah`
--
ALTER TABLE `mahasiswa_ayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `mahasiswa_ibu`
--
ALTER TABLE `mahasiswa_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa_keluarga`
--
ALTER TABLE `mahasiswa_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa_prestasi`
--
ALTER TABLE `mahasiswa_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_hidup`
--
ALTER TABLE `status_hidup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_hubungan`
--
ALTER TABLE `status_hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Database: `nyoba`
--
CREATE DATABASE IF NOT EXISTS `nyoba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `nyoba`;

-- --------------------------------------------------------

--
-- Table structure for table `tabel1`
--

CREATE TABLE `tabel1` (
  `id` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tabel1`
--

INSERT INTO `tabel1` (`id`, `role`, `nama`) VALUES
(1, 1, 'asep'),
(2, 2, 'adi');

-- --------------------------------------------------------

--
-- Table structure for table `tabel2`
--

CREATE TABLE `tabel2` (
  `id` int(1) NOT NULL,
  `kota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tabel2`
--

INSERT INTO `tabel2` (`id`, `kota`) VALUES
(1, 'bandung'),
(2, 'garut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel1`
--
ALTER TABLE `tabel1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel2`
--
ALTER TABLE `tabel2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel1`
--
ALTER TABLE `tabel1`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel2`
--
ALTER TABLE `tabel2`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"snap_to_grid\":\"off\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"ci-3\",\"table\":\"user\"},{\"db\":\"beasiswa\",\"table\":\"mahasiswa_biodata\"},{\"db\":\"beasiswa\",\"table\":\"mahasiswa_prestasi\"},{\"db\":\"beasiswa\",\"table\":\"mahasiswa_keluarga\"},{\"db\":\"beasiswa\",\"table\":\"mahasiswa_ibu\"},{\"db\":\"beasiswa\",\"table\":\"mahasiswa_ayah\"},{\"db\":\"beasiswa\",\"table\":\"user_data\"},{\"db\":\"beasiswa\",\"table\":\"status_hidup\"},{\"db\":\"beasiswa\",\"table\":\"mahaiswa_ibu\"},{\"db\":\"beasiswa\",\"table\":\"status_pekerjaan\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-06-24 09:24:45', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `wpu_login`
--
CREATE DATABASE IF NOT EXISTS `wpu_login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wpu_login`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Arman Dwi Pangestu', 'arman@gmail.com', 'default.jpg', '$2y$10$enu1ve.SGG8qY9/mZi70E.ZKdO/Xtvl6lU42N419Q.AqhlRmlnRNu', 1, 1, 1674703436),
(2, 'Sandhika Galih', 'sandhikagalih@unpas.ac.id', 'default.jpg', '$2y$10$kJCE8LM0RLRbPkWEFQy3IOhIcV6N.y07Mk7uduH/x/aP50ACEDHD2', 2, 1, 1674703524),
(3, 'Doddy Ferdiansyah', 'doddy@yahoo.com', 'default.jpg', '$2y$10$Z8BoXuC/R6Tum6H9fF7eRefxJfg45FArxVDLyvrJUcpT4IJZWBPEK', 2, 1, 1674703879),
(4, 'test', 'test@gmail.com', 'default.jpg', '$2y$10$9XbN41KmR.QPlNaBoeNHyeGzaJtumpvWqkL1WNwEKv6seY/Nrrwie', 2, 1, 1674703934),
(5, 'Linux', 'linux@linux.org', 'default.jpg', '$2y$10$VE66lL7IC37r8NYUGWetdedgDJ.GUQ2h7Pxw9r670juOIQBvHsDCS', 2, 1, 1674704296),
(6, 'windows', 'windows@windows.org', 'default.jpg', '$2y$10$cMTXxsKc4ZqqpynfbCh77e9vE6xioxP3ekVEfFK3GV8bgOrzHTTNy', 2, 1, 1674706169);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role Access', 'admin/role', 'fas fa-fw fa-user-admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
