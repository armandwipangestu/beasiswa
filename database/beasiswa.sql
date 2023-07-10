-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 05:51 AM
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
(1, 2, 'Uned', 1, 1, 8, 1, 'Ayah Detail'),
(2, 4, 'Init', 1, 2, 8, 1, 'Detail Ay4h');

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
(1, 2, 'Bandung', '2003-02-11', 'Jl. Purwakarta, No. 123, RT. 03, RW.01 Kec. Antapani Tengah, Kel. Batununggal, Kota Bandung', '0123456789', 'Laki-laki', 1, 2, 3),
(2, 4, 'Jakarta', '2023-07-10', 'Jl. Bogor, No. 321, RT. 01, RW. 01, Kel. Kebonwaru, Kec. Batununggal, Kota Bandung 40272', '0987651234', 'Perempuan', 2, 3, 1);

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
(1, 2, 'Unid', 1, 8, 3, 'Ibu Detail'),
(2, 4, 'Inut', 1, 8, 2, 'Detail 1bu');

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
(1, 2, 1, 1, '5', '0987654321', 'default.png'),
(2, 4, 2, 2, '2', '0123458769', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_pengajuan`
--

CREATE TABLE `mahasiswa_pengajuan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa_biodata` int(11) NOT NULL,
  `id_mahasiswa_prestasi` int(11) NOT NULL,
  `id_mahasiswa_keluarga` int(11) NOT NULL,
  `status_pengajuan` varchar(255) NOT NULL,
  `tanggal_pengajuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mahasiswa_pengajuan`
--

INSERT INTO `mahasiswa_pengajuan` (`id`, `id_user`, `id_mahasiswa_biodata`, `id_mahasiswa_prestasi`, `id_mahasiswa_keluarga`, `status_pengajuan`, `tanggal_pengajuan`) VALUES
(1, 2, 1, 1, 1, 'Dokumen Diterima', 1688959905),
(2, 4, 2, 2, 2, 'Dokumen Diterima', 1688960456);

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
(1, 2, 'Hackathon', 'Kelompok/Tim', 'Internasional', '2023', 'Juara 1', 'default.png'),
(2, 4, 'Hickithon', 'Individual', 'Kabupaten/Kota', '2017', 'Honorable Mention', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `review_pengajuan`
--

CREATE TABLE `review_pengajuan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_mahasiswa_pengajuan` int(11) NOT NULL,
  `tanggal_review` int(11) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_pengajuan`
--

INSERT INTO `review_pengajuan` (`id`, `id_user`, `id_mahasiswa_pengajuan`, `tanggal_review`, `alasan`, `status`) VALUES
(1, 3, 1, 1688959985, 'Selamat kamu berhak mendapatkan beasiswa dari kampus, silahkan datang ke kampus untuk info lebih lanjut nya :)', 'Diterima'),
(2, 3, 2, 1688960949, 'Kamu tidak berhak mendapatkan beasiswa, karena dokumen tidak lengkap :(', 'Ditolak');

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
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 2),
(8, 2, 7),
(9, 3, 2),
(10, 3, 8);

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
(1, 'Administrator', 'admin@admin.com', 'default.png', '$2y$10$FUpXY5FGwdHnU4qWMLu92e9K9Akxg8eO5QQzCbk4rUL92WOhITQG.', 1, 1688959437),
(2, 'User', 'user@user.com', 'default.png', '$2y$10$D.c8v6AembKEGRHja2thoOgNhk/BJiuB.XahZKO.mHl.2saw8yNTC', 2, 1688959472),
(3, 'Master', 'master@master.com', 'default.png', '$2y$10$WqWn0xMkqYLHH1SI7DwCl..qixLVBcyqyMnMGRJvwDasqf7LK30n6', 3, 1688959489),
(4, 'User2', 'user2@user2.com', 'default.png', '$2y$10$.q2hWmSLcPqAVYXLoZdX9OUUBCVjrdPRxB9WhFXykHHfFjjZf6CHi', 2, 1688960016);

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
(5, 'Kampus'),
(6, 'Status'),
(7, 'Dashboard'),
(8, 'Master');

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
(2, 'Member'),
(3, 'Master');

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
(2, 1, 'Role Akses', 'admin/role', 'fas fa-fw fa-user-tie'),
(3, 1, 'User Data', 'admin/user_data', 'fas fa-fw fa-users'),
(4, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user'),
(5, 2, 'Ubah Profil', 'user/ubah', 'fas fa-fw fa-user-edit'),
(6, 2, 'Ganti Kata Sandi', 'user/ganti_kata_sandi', 'fas fa-fw fa-key'),
(7, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder'),
(8, 4, 'Submenu Management', 'submenu', 'fas fa-fw fa-folder-open'),
(9, 5, 'Jurusan', 'kampus/jurusan', 'fas fa-fw fa-location-arrow'),
(10, 5, 'Kelas Program', 'kampus/kelas_program', 'fas fa-fw fa-sitemap'),
(11, 6, 'Status Hidup', 'status/hidup', 'fas fa-fw fa-heart'),
(12, 6, 'Status Hubungan', 'status/hubungan', 'fas fa-fw fa-link'),
(13, 6, 'Status Pendidikan', 'status/pendidikan', 'fas fa-fw fa-school'),
(14, 6, 'Status Pekerjaan', 'status/pekerjaan', 'fas fa-fw fa-briefcase'),
(15, 7, 'Dokumen Beasiswa', 'dashboard', 'fas fa-fw fa-graduation-cap'),
(16, 8, 'List Pemohon', 'master', 'fas fa-fw fa-user-secret');

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
-- Indexes for table `mahasiswa_pengajuan`
--
ALTER TABLE `mahasiswa_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_prestasi`
--
ALTER TABLE `mahasiswa_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_pengajuan`
--
ALTER TABLE `review_pengajuan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kampus_kelas_program`
--
ALTER TABLE `kampus_kelas_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa_ayah`
--
ALTER TABLE `mahasiswa_ayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa_ibu`
--
ALTER TABLE `mahasiswa_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa_keluarga`
--
ALTER TABLE `mahasiswa_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa_pengajuan`
--
ALTER TABLE `mahasiswa_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa_prestasi`
--
ALTER TABLE `mahasiswa_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review_pengajuan`
--
ALTER TABLE `review_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_hidup`
--
ALTER TABLE `status_hidup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_hubungan`
--
ALTER TABLE `status_hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
