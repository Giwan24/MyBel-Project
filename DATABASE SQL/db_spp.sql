-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 03:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'XII RPL 1', 'Rekayasa Perangkat Lunak'),
(6, 'XII DKV 1', 'Desain Komunikasi Visual'),
(8, 'XII TP', 'Teknik Permesinan'),
(9, 'XII HR', 'Hotel & Restauran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kosong`
--

CREATE TABLE `tbl_kosong` (
  `kosong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `nisn_siswa` varchar(15) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `bulan_bayar` varchar(8) DEFAULT NULL,
  `tahun_bayar` varchar(9) DEFAULT NULL,
  `spp_id` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `petugas_id`, `nisn_siswa`, `tanggal_bayar`, `bulan_bayar`, `tahun_bayar`, `spp_id`, `jumlah_bayar`, `ket`) VALUES
(71, 6, '12345', '2023-03-17', '3', '2023', 24, 450000, 'lunas'),
(72, 6, '20103424', '2023-03-20', '3', '2023', 24, 450000, 'lunas'),
(102, 6, '12345', '2023-03-17', '3', '2023', 34, 450000, 'lunas'),
(103, 6, '20103424', '2023-03-20', '3', '2023', 34, 450000, 'lunas'),
(149, 6, '20103415', '2023-03-17', '3', '2023', 24, 450000, 'lunas'),
(150, 6, '20103415', '2023-03-17', '3', '2023', 34, 450000, 'lunas'),
(175, 6, '4567', '2023-03-18', '3', '2023', 24, 450000, 'lunas'),
(176, 6, '4567', '2023-03-18', '3', '2023', 34, 450000, 'lunas'),
(177, 6, '12345', '2023-03-18', '3', '2023', 43, 450000, 'lunas'),
(178, 6, '20103415', '2023-03-18', '3', '2023', 43, 450000, 'lunas'),
(179, 6, '20103424', '2023-03-20', '3', '2023', 43, 450000, 'lunas'),
(180, 6, '4567', '2023-03-18', '3', '2023', 43, 450000, 'lunas'),
(181, 6, '12345', '2023-03-18', '3', '2023', 44, 450000, 'lunas'),
(182, 6, '20103415', '2023-03-18', '3', '2023', 44, 450000, 'lunas'),
(183, 6, '20103424', '2023-03-20', '3', '2023', 44, 450000, 'lunas'),
(184, 6, '4567', '2023-03-18', '3', '2023', 44, 450000, 'lunas'),
(185, 6, '12345', '2023-03-18', '3', '2023', 45, 450000, 'lunas'),
(186, 6, '20103415', '2023-03-18', '3', '2023', 45, 450000, 'lunas'),
(187, 6, '20103424', '2023-03-20', '3', '2023', 45, 450000, 'lunas'),
(188, 6, '4567', '2023-03-18', '3', '2023', 45, 450000, 'lunas'),
(189, 6, '20103423', NULL, NULL, NULL, 24, 450000, 'belum'),
(190, 6, '20103423', NULL, NULL, NULL, 34, 450000, 'belum'),
(191, 6, '20103423', '2023-03-20', '3', '2023', 43, 450000, 'lunas'),
(192, 6, '20103423', '2023-03-20', '3', '2023', 44, 450000, 'lunas'),
(193, 6, '20103423', '2023-03-20', '3', '2023', 45, 450000, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `created_at`, `updated_at`) VALUES
(4, 'petugas', '$2y$10$mEUU46ZMYK12S9T31l9Do.93W1ngI9ZHEwTxnA0OCwncCK9SaULxu', 'Staff TU', 'petugas', '2021-03-01 01:51:36', '2021-03-01 01:51:36'),
(6, 'Giwan24', '$2y$10$I9Kd7ipRnp7txTtiy6mcgecMgKD4ZvdiC2OS8h22rSOt6wpWs/gDS', 'Giwan', 'admin', '2023-03-12 09:34:13', '2023-03-12 09:34:13'),
(7, 'Ela123', '$2y$10$T4.54ZUjpOxeNKlPk.mwRel5.DYdK9eVau1NHC5QO.jZiMquN9c7C', 'Ela', 'petugas', '2023-03-13 05:13:59', '2023-03-13 05:13:59'),
(9, 'Cyberlab', '$2y$10$OTt8h7c/lfI4W/zJJ0KseOmQoWFEWoIqAQZ6x.Lw2jA9TIxISheRS', 'CyberLab', 'admin', '2023-03-15 13:51:34', '2023-03-15 13:51:34'),
(11, '1234', '$2y$10$mj2irqYaq2espfDlgkXoAuYX06HqKVadi1P2E18uP3mxBmkfzv1PK', 'Asde', 'admin', '2023-03-18 12:04:25', '2023-03-18 12:04:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nisn` char(15) NOT NULL,
  `nis` char(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `spp_id` int(11) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nisn`, `nis`, `nama`, `kelas_id`, `alamat`, `no_telp`, `spp_id`, `password`, `created_at`) VALUES
('12345', '12345', 'Asep Supratman', 1, 'Jl. Cibuntu Tengah 2', '085897896', NULL, '$2y$10$.QLKT121YhWG26tGSFlc9OgLgNumGPXLH0ijW.2tFfOcCtS39ZA1a', '2023-03-15 14:23:03'),
('20103415', '20102415', 'Anita Tasyara', 6, 'Jl. Pungkur', '0809798687', NULL, '$2y$10$20U62TY7JL0mkURx8QeE2.gsH4ZECpUhOI0OhGBSv9lJijnXRXEkG', '2023-03-17 00:50:58'),
('20103423', '20103423', 'Syarifudin', 6, 'Jl. Inhoftank, Bandung', '08XXXXXXXX', NULL, '$2y$10$4wFGfDGX.qMtZtjcueJHR.4kCeMIJR.BnhhWojSoetmtPzpgzYMdC', '2023-03-20 01:06:19'),
('20103424', '20103424', 'Giwan Purnama', 1, 'Jl. Cibuntu Tengah', '082130908661', NULL, '$2y$10$G813g4asirAVfpPAQdIWF.9hm7wmDCX29vQ1xCEW9VPCn2qN2qfVG', '2023-03-15 14:23:03'),
('4567', '4567', 'Qarissa', 6, 'Jl. Cibuntu Tengah', '08121459538', NULL, '$2y$10$nvt6Quo5xoMiwEeTccApkO.tQ3WAcAIIw76QY5azc1zxds2GjY3sW', '2023-03-18 09:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spp`
--

CREATE TABLE `tbl_spp` (
  `id_spp` int(11) NOT NULL,
  `nama_spp` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_spp`
--

INSERT INTO `tbl_spp` (`id_spp`, `nama_spp`, `tahun`, `nominal`, `created_at`) VALUES
(24, 'Maret', '2022/2023', 450000, '2023-03-14 03:53:27'),
(34, 'April', '2022/2023', 450000, '2023-03-14 06:27:27'),
(43, 'Mei', '2022/2023', 450000, '2023-03-18 09:34:19'),
(44, 'Juni', '2022/2023', 450000, '2023-03-18 09:34:37'),
(45, 'Juli', '2022/2023', 450000, '2023-03-18 11:55:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nisn_siswa` (`nisn_siswa`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indexes for table `tbl_spp`
--
ALTER TABLE `tbl_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_spp`
--
ALTER TABLE `tbl_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_4` FOREIGN KEY (`nisn_siswa`) REFERENCES `tbl_siswa` (`nisn`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_pembayaran_ibfk_5` FOREIGN KEY (`petugas_id`) REFERENCES `tbl_petugas` (`id_petugas`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_pembayaran_ibfk_6` FOREIGN KEY (`spp_id`) REFERENCES `tbl_spp` (`id_spp`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `tbl_siswa_ibfk_2` FOREIGN KEY (`spp_id`) REFERENCES `tbl_spp` (`id_spp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
