INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Master');

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Submenu'),
(5, 'Kampus'),
(6, 'Status'),
(7, 'Dashboard'),
(8, 'Master');

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

INSERT INTO `kampus_jurusan` (`id`, `jurusan`) VALUES
(1, 'S1 Teknik Informatika'),
(2, 'S1 Sistem Informasi');

INSERT INTO `kampus_kelas_program` (`id`, `kelas_program`) VALUES
(1, 'Reguler'),
(2, 'Eksekutif'),
(3, 'Karyawan');

INSERT INTO `status_hidup` (`id`, `status_hidup`) VALUES
(1, 'Masih Hidup'),
(2, 'Wafat'),
(3, 'Bercerai');

INSERT INTO `status_hubungan` (`id`, `status_hubungan`) VALUES
(1, 'Ayah Kandung'),
(2, 'Ayah Tiri'),
(3, 'Wali');

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

INSERT INTO `status_pekerjaan` (`id`, `status_pekerjaan`) VALUES
(1, 'PNS'),
(2, 'Pegawai Swasta'),
(3, 'Wirausaha'),
(4, 'TNI / Polri'),
(5, 'Petani'),
(6, 'Nelayan'),
(7, 'Tidak Bekerja');