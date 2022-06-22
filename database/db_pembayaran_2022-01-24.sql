-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2022 at 08:26 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` varchar(5) CHARACTER SET latin1 NOT NULL,
  `nama_bulan` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
('01', 'Januari'),
('02', 'Februari'),
('03', 'Maret'),
('04', 'April'),
('05', 'Mei'),
('06', 'Juni'),
('07', 'Juli'),
('08', 'Agustus'),
('09', 'September'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jen_pembayaran` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `besar_tagihan` varchar(20) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jen_pembayaran`, `jenis_pembayaran`, `besar_tagihan`, `date_created`) VALUES
(12, 'Semester 5', '500000', 1640367395),
(32, 'Semester 1', '300000', 1640367395),
(38, 'Semester 4', '600000', 1640285362),
(41, 'Semester 3', '500000', 1640275207),
(55, 'Semester 6', '500000', 1640367389),
(87, 'Semester 2', '200000', 1640274312);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`) VALUES
(1, 'Paket 1'),
(2, 'Paket 2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_bulanan`
--

CREATE TABLE `pembayaran_bulanan` (
  `id_pem_bulan` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `jenis_pembayaran` varchar(128) NOT NULL,
  `tahun_ajaran` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_bulanan`
--

INSERT INTO `pembayaran_bulanan` (`id_pem_bulan`, `nisn`, `jenis_pembayaran`, `tahun_ajaran`) VALUES
(7260, 2147483647, 'Spp Bulanan', 2021),
(7261, 546456456, 'Spp Bulanan', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id` int(11) NOT NULL,
  `rombel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id`, `rombel`) VALUES
(1, 'IPS'),
(2, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `spp_bulanan`
--

CREATE TABLE `spp_bulanan` (
  `id_transaksi` varchar(128) NOT NULL,
  `nisn` varchar(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_bulan` varchar(5) NOT NULL,
  `id_tahun` int(4) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `metode_pembayaran` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `status` char(1) DEFAULT '' COMMENT '0=lunas, 1=pending, 2=error',
  `order_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp_bulanan`
--

INSERT INTO `spp_bulanan` (`id_transaksi`, `nisn`, `nama`, `id_bulan`, `id_tahun`, `tanggal_bayar`, `metode_pembayaran`, `jumlah`, `id`, `status`, `order_id`) VALUES
('SPP-050122001', '546456456', 'Dani Lukman', '01', 17, '2022-01-05', 'Manual', 200000, 1, '0', ''),
('SPP-050122002', '546456456', 'Dani Lukman', '02', 17, '2022-01-05', 'Manual', 200000, 1, '0', ''),
('SPP-220122001', '546456456', 'Dani Lukman', '03', 17, '2022-01-22', 'Online', 200000, 1, '1', '1617036026'),
('SPP-220122002', '546456456', 'Dani Lukman', '04', 17, '2022-01-22', 'Online', 200000, 1, '1', '1617036026');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_buku`
--

CREATE TABLE `tagihan_buku` (
  `id_tag_buku` int(11) NOT NULL,
  `nisn` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `user_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `besar_tagihan` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `metode_pembayaran` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `paket` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `status_bayar` char(1) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '0=Lunas,\r1=Pending, 2=Error',
  `is_active` int(1) NOT NULL,
  `order_id` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Dumping data for table `tagihan_buku`
--

INSERT INTO `tagihan_buku` (`id_tag_buku`, `nisn`, `user_id`, `tahun_ajaran_id`, `jenis_pembayaran`, `besar_tagihan`, `tanggal_bayar`, `metode_pembayaran`, `deadline`, `paket`, `status_bayar`, `is_active`, `order_id`) VALUES
(2794, '546456456', 1, 17, '', '', NULL, '', '2021-12-31 00:00:00', 'Paket 1', '', 0, ''),
(4281, '5170411330', 1, 17, '', '', NULL, '', '2022-01-08 00:00:00', 'Paket 1', '', 0, ''),
(4282, '546456456', 1, 17, 'Semester 5', '500000', '2022-01-23', 'Online', '2022-01-08 00:00:00', 'Paket 1', '1', 0, '1117316715'),
(9538, '546456456', 1, 17, 'Semester 2', '200000', NULL, 'Manual', '2022-01-26 00:00:00', '', '0', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `besar_spp` varchar(20) NOT NULL,
  `Status` enum('ON','OFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun`, `tahun_ajaran`, `besar_spp`, `Status`) VALUES
(17, '2021', '200000', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `tunggakan`
--

CREATE TABLE `tunggakan` (
  `id` int(11) NOT NULL,
  `nis` varchar(9) NOT NULL,
  `id_tahun` varchar(4) NOT NULL,
  `tunggakan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nisn` varchar(60) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL,
  `jenis_kelamin` int(1) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nisn`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, '3423423', 'Ade Rohmat Maulana', 'aderohmatmaulana77@gmail.com', 0, '', NULL, NULL, '', 'default.png', '$2y$10$KUeg0TzG5NpZq4Nuzfa2j.8LDB96OCEA58Kj078paKpsB4Sy.5nWi', 1, 1, 1639647816),
(2, '5170411330', 'Ade Rohmat Maulana', 'aderohmatmaulana22@gmail.com', 1, 'Majalengka', '1998-08-04', '089612664228', 'Desa Burujul Wetan', 'default.png', '$2y$10$0AQT5ZRllhFKVdrkVqLMpuHCb.r/awXyIir8l.YuIDg3.IZEri5Hy', 2, 1, 1639647902),
(32, '546456456', 'Dani Lukman', 'danilukman2206@gmail.com', 1, 'Banyumas', '2021-12-01', '085797887711', 'Banyumas', 'default.jpg', '$2y$10$0AQT5ZRllhFKVdrkVqLMpuHCb.r/awXyIir8l.YuIDg3.IZEri5Hy', 2, 1, 1639647902);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'ADMIN'),
(2, 'USER'),
(3, 'MENU');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'coba10');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'home', 1),
(2, 2, 'Dashboard', 'user', 'home', 1),
(3, 3, 'Menu Management', 'menu', 'menu', 1),
(4, 3, 'Submenu Management', 'menu/submenu', 'folder', 1),
(5, 1, 'Role', 'admin/role', 'settings', 1),
(8, 1, 'Pembayaran', 'pembayaran', 'dollar-sign', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jen_pembayaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  ADD PRIMARY KEY (`id_pem_bulan`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spp_bulanan`
--
ALTER TABLE `spp_bulanan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nis` (`nisn`);

--
-- Indexes for table `tagihan_buku`
--
ALTER TABLE `tagihan_buku`
  ADD PRIMARY KEY (`id_tag_buku`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tunggakan`
--
ALTER TABLE `tunggakan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jen_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran_bulanan`
--
ALTER TABLE `pembayaran_bulanan`
  MODIFY `id_pem_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7262;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tagihan_buku`
--
ALTER TABLE `tagihan_buku`
  MODIFY `id_tag_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9539;

--
-- AUTO_INCREMENT for table `tunggakan`
--
ALTER TABLE `tunggakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
