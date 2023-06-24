-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2023 pada 12.30
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `kampus_jurusan`
--

CREATE TABLE `kampus_jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kampus_jurusan`
--

INSERT INTO `kampus_jurusan` (`id`, `jurusan`) VALUES
(1, 'S1 Teknik Informatika'),
(2, 'S1 Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kampus_kelas_program`
--

CREATE TABLE `kampus_kelas_program` (
  `id` int(11) NOT NULL,
  `kelas_program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kampus_kelas_program`
--

INSERT INTO `kampus_kelas_program` (`id`, `kelas_program`) VALUES
(1, 'Reguler'),
(2, 'Eksekutif'),
(3, 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_ayah`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_ayah`
--

INSERT INTO `mahasiswa_ayah` (`id`, `id_user`, `nama_ayah`, `id_status_hidup`, `id_status_hubungan`, `id_status_pendidikan`, `id_status_pekerjaan`, `detail_ayah`) VALUES
(1, 13, 'Test Ayah', 1, 1, 4, 3, 'Test Detail Ayah'),
(2, 12, 'Ayah Test 2', 2, 1, 5, 2, 'Ayah Test Detail'),
(6, 14, 'test', 3, 3, 2, 1, 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_biodata`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_biodata`
--

INSERT INTO `mahasiswa_biodata` (`id`, `id_user`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `jenis_kelamin`, `id_jurusan`, `semester`, `id_kelas_program`) VALUES
(38, 12, 'Bandung', '2002-12-15', 'Jl. Jakarta, Kelurahan Kebonwaru, Kecamatan Batununggal, Kota Bandung 40272', '089637369606', 'Laki-laki', 1, 5, 3),
(39, 13, 'Jakarta', '2011-03-01', 'Jl. Purwakarta, Kelurahan Antapani Tengah, Kecamatan Antapani, Kota Bandung', '081239876543', 'Perempuan', 2, 6, 1),
(40, 14, 'Test Biodata', '2023-06-30', 'Jl. Biodata', '01234', 'Perempuan', 2, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_ibu`
--

CREATE TABLE `mahasiswa_ibu` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `id_status_hidup` int(11) DEFAULT NULL,
  `id_status_pendidikan` int(11) DEFAULT NULL,
  `id_status_pekerjaan` int(11) DEFAULT NULL,
  `detail_ibu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_ibu`
--

INSERT INTO `mahasiswa_ibu` (`id`, `id_user`, `nama_ibu`, `id_status_hidup`, `id_status_pendidikan`, `id_status_pekerjaan`, `detail_ibu`) VALUES
(1, 13, 'Test Ibu', 1, 2, 3, 'Test Detail Ibu'),
(2, 12, 'Ibu Test 2', 1, 4, 1, 'Test Ibu Detail'),
(6, 14, 'aqwe', 1, 5, 1, 'ewq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_keluarga`
--

CREATE TABLE `mahasiswa_keluarga` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ayah` int(11) DEFAULT NULL,
  `id_ibu` int(11) DEFAULT NULL,
  `jumlah_tanggungan` varchar(15) DEFAULT NULL,
  `no_telepon_orang_tua` varchar(25) DEFAULT NULL,
  `foto_bersama_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_keluarga`
--

INSERT INTO `mahasiswa_keluarga` (`id`, `id_user`, `id_ayah`, `id_ibu`, `jumlah_tanggungan`, `no_telepon_orang_tua`, `foto_bersama_keluarga`) VALUES
(1, 13, 1, 1, 'Tidak ada', '08123456789', 'default.png'),
(2, 12, 2, 2, '4', '0987654321', 'default.png'),
(6, 14, 6, 6, '2', '098712345', 'photo_2021-04-15_00-04-43.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_prestasi`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_prestasi`
--

INSERT INTO `mahasiswa_prestasi` (`id`, `id_user`, `nama_kegiatan`, `jenis_kegiatan`, `tingkat`, `tahun`, `pencapaian`, `scan_sertifikat`) VALUES
(2, 13, 'Praktek Kerja Industri', 'Individual', 'Kabupaten/Kota', '2020', 'Juara 1', 'photo_2021-08-03_19-45-21.jpg'),
(3, 14, 'Ini Test Ke 3', 'Kelompok/Tim', 'Nasional', '2023', 'Juara 1', 'photo_2021-04-15_00-04-40.jpg'),
(4, 12, NULL, NULL, NULL, NULL, NULL, 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_hidup`
--

CREATE TABLE `status_hidup` (
  `id` int(11) NOT NULL,
  `status_hidup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_hidup`
--

INSERT INTO `status_hidup` (`id`, `status_hidup`) VALUES
(1, 'Masih Hidup'),
(2, 'Wafat'),
(3, 'Bercerai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_hubungan`
--

CREATE TABLE `status_hubungan` (
  `id` int(11) NOT NULL,
  `status_hubungan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_hubungan`
--

INSERT INTO `status_hubungan` (`id`, `status_hubungan`) VALUES
(1, 'Ayah Kandung'),
(2, 'Ayah Tiri'),
(3, 'Wali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pekerjaan`
--

CREATE TABLE `status_pekerjaan` (
  `id` int(11) NOT NULL,
  `status_pekerjaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pekerjaan`
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
-- Struktur dari tabel `status_pendidikan`
--

CREATE TABLE `status_pendidikan` (
  `id` int(11) NOT NULL,
  `status_pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pendidikan`
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
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
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
(23, 1, 25),
(24, 3, 2),
(25, 3, 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `date_created`) VALUES
(7, 'Admin', 'admin@admin.com', 'photo_2021-04-15_00-04-43.jpg', '$2y$10$94RAzKMBzc6OUull8bZ2leTmCAyUvWpuMJ3h/YuPhFC9ZXfgnHD2O', 1, 1687161877),
(12, 'Arman Dwi Pangestu', 'arman@gmail.com', 'photo_2021-04-15_00-04-40-modified.png', '$2y$10$QYWGnH6Tx9m8CH9hu1pLG.6Kh0l7WUgpbpbCoja1m3VOJi0nL1NYu', 2, 1687356267),
(13, 'jijan', 'user@user.com', '724925827.jpg', '$2y$10$h9tfIXfLLx8ZSpvY7KuQq.SMtbPF2hm1JDpeauTPq1orGJtNVTvYO', 2, 1687402958),
(14, 'Test', 'test@test.com', 'default.png', '$2y$10$1a7/SbfjKD.lpnxxfu5Da.cJxkFUabVwIfYKcMr/0UDop5Pwx/msC', 2, 1687526388),
(15, 'master', 'master@master.com', 'default.png', '$2y$10$Kp38OeTKTr6VZUHZIEKzRuz4YuMlT2UqodcHigPOiI0CYgqJAPioO', 3, 1687601987);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Submenu'),
(20, 'Beasiswa'),
(21, 'Dashboard'),
(22, 'Kampus'),
(25, 'Status'),
(26, 'master menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
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
(21, 25, 'Status Pekerjaan', 'status/pekerjaan', 'fas fa-fw fa-briefcase'),
(22, 26, 'list pemohon', 'master', 'fas fa-fw fa-user-secret');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kampus_jurusan`
--
ALTER TABLE `kampus_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kampus_kelas_program`
--
ALTER TABLE `kampus_kelas_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_ayah`
--
ALTER TABLE `mahasiswa_ayah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_ibu`
--
ALTER TABLE `mahasiswa_ibu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_keluarga`
--
ALTER TABLE `mahasiswa_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa_prestasi`
--
ALTER TABLE `mahasiswa_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_hidup`
--
ALTER TABLE `status_hidup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_hubungan`
--
ALTER TABLE `status_hubungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kampus_jurusan`
--
ALTER TABLE `kampus_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kampus_kelas_program`
--
ALTER TABLE `kampus_kelas_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_ayah`
--
ALTER TABLE `mahasiswa_ayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_biodata`
--
ALTER TABLE `mahasiswa_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_ibu`
--
ALTER TABLE `mahasiswa_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_keluarga`
--
ALTER TABLE `mahasiswa_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_prestasi`
--
ALTER TABLE `mahasiswa_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_hidup`
--
ALTER TABLE `status_hidup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_hubungan`
--
ALTER TABLE `status_hubungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_pekerjaan`
--
ALTER TABLE `status_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `status_pendidikan`
--
ALTER TABLE `status_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
