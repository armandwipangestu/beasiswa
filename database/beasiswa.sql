-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 04:59 PM
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
(38, 12, 'Bandung', '2002-12-15', 'Jl. Jakarta, Kelurahan Kebonwaru, Kecamatan Batununggal, Kota Bandung 40272', '089637369606', 'Laki-laki', 1, 5, 3);

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
(21, 1, 22);

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
(12, 'Arman Dwi Pangestu', 'arman@gmail.com', 'photo_2021-04-15_00-04-40-modified.png', '$2y$10$QYWGnH6Tx9m8CH9hu1pLG.6Kh0l7WUgpbpbCoja1m3VOJi0nL1NYu', 2, 1687356267);

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
(22, 'Kampus');

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
(16, 22, 'Kelas Program', 'kampus/kelas_program', 'fas fa-fw fa-sitemap');

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
-- Indexes for table `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
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
-- AUTO_INCREMENT for table `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
