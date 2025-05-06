-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2024 at 09:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_rijal`
--

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kriteria` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kriteria` enum('Benefit','Cost') COLLATE utf8mb4_general_ci NOT NULL,
  `bobot_kriteria` float NOT NULL,
  `simpan_kriteria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `jenis_kriteria`, `bobot_kriteria`, `simpan_kriteria`) VALUES
('C1', 'Kemampuan Musisi', 'Benefit', 0.35, '2024-07-12 16:30:49'),
('C2', 'Pengalaman Panggung', 'Benefit', 0.25, '2024-07-12 16:31:17'),
('C3', 'Kepekaan Musikal', 'Benefit', 0.2, '2024-07-12 16:31:40'),
('C4', 'Kreatifitas Arrangement', 'Benefit', 0.1, '2024-07-12 16:32:36'),
('C5', 'Keragaman', 'Benefit', 0.1, '2024-07-12 16:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nisn` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `C1` int NOT NULL,
  `C2` int NOT NULL,
  `C3` int NOT NULL,
  `C4` int NOT NULL,
  `C5` int NOT NULL,
  `simpan_nilai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nisn`, `C1`, `C2`, `C3`, `C4`, `C5`, `simpan_nilai`) VALUES
('102179038', 5, 3, 5, 3, 3, '2024-07-12 18:32:03'),
('102441679', 1, 1, 1, 1, 1, '2024-07-12 18:32:03'),
('102875506', 5, 5, 3, 5, 5, '2024-07-12 18:32:03'),
('102887574', 1, 1, 1, 1, 1, '2024-07-12 18:32:03'),
('103030095', 5, 1, 5, 1, 1, '2024-07-12 18:32:03'),
('103137773', 3, 5, 3, 3, 3, '2024-07-12 18:32:03'),
('103628092', 5, 3, 5, 1, 1, '2024-07-12 18:32:03'),
('103721516', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('105776654', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('106384272', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('107674264', 3, 3, 3, 3, 1, '2024-07-12 18:32:03'),
('108670242', 1, 1, 1, 1, 1, '2024-07-12 18:32:03'),
('111881570', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('111909074', 3, 3, 3, 1, 3, '2024-07-12 18:32:03'),
('119935428', 1, 3, 1, 1, 1, '2024-07-12 18:32:03'),
('3114103975', 5, 1, 5, 1, 1, '2024-07-12 18:32:03'),
('82055096', 3, 3, 3, 1, 3, '2024-07-12 18:32:03'),
('82063108', 3, 1, 3, 1, 1, '2024-07-12 18:32:03'),
('87272106', 3, 3, 3, 1, 1, '2024-07-12 18:32:03'),
('88081892', 3, 3, 3, 1, 3, '2024-07-12 18:32:03'),
('88788003', 3, 3, 3, 1, 3, '2024-07-12 18:32:03'),
('89314213', 1, 1, 1, 1, 1, '2024-07-12 18:32:03'),
('91228356', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('92307945', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('92929853', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('94805203', 5, 3, 5, 5, 5, '2024-07-12 18:32:03'),
('96017421', 1, 1, 1, 1, 1, '2024-07-12 18:32:03'),
('97688665', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('97747598', 3, 1, 3, 3, 3, '2024-07-12 18:32:03'),
('﻿116911880', 3, 1, 3, 1, 1, '2024-07-12 18:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pengguna` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` enum('Kepala Sekolah','Operator Sekolah') COLLATE utf8mb4_general_ci NOT NULL,
  `foto_pengguna` text COLLATE utf8mb4_general_ci NOT NULL,
  `simpan_pengguna` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_pengguna`, `jabatan`, `foto_pengguna`, `simpan_pengguna`) VALUES
(1, 'admin', 'admin', 'Aprilian Gevindo', 'Operator Sekolah', 'Aprilian Gevindo097346900_1443162687-tut_wuri.jpg', '2024-07-12 08:55:30'),
(5, 'root', 'root', 'Si Anu', 'Kepala Sekolah', 'Si Anudownload.jpeg', '2024-07-12 08:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_siswa` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `jk_siswa` enum('Laki-laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `simpan_siswa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_siswa`, `jk_siswa`, `simpan_siswa`) VALUES
('102179038', 'Hadid Mughaffal', 'Perempuan', '2024-07-12 18:30:20'),
('102441679', 'Muhammad Zacky', 'Laki-laki', '2024-07-12 18:30:20'),
('102875506', 'Zahira Enita', 'Perempuan', '2024-07-12 18:30:20'),
('102887574', 'Aira Selvino Putri', 'Laki-laki', '2024-07-12 18:30:20'),
('103030095', 'Rifki Julian Hendri', 'Perempuan', '2024-07-12 18:30:20'),
('103137773', 'Naadhirah Irwadi', 'Perempuan', '2024-07-12 18:30:20'),
('103628092', 'Safa Putri Rahma', 'Laki-laki', '2024-07-12 18:30:20'),
('103721516', 'Fadhil Aprizal', 'Perempuan', '2024-07-12 18:30:20'),
('105776654', 'Naya Myeisha Istiqomah', 'Perempuan', '2024-07-12 18:30:20'),
('106384272', 'Reza Gelfani', 'Laki-laki', '2024-07-12 18:30:20'),
('107674264', 'Surya Kurnia Fala', 'Perempuan', '2024-07-12 18:30:20'),
('108670242', 'Azizah Lutfiah Wandra', 'Perempuan', '2024-07-12 18:30:20'),
('111881570', 'Alexi Nayara Valerie', 'Perempuan', '2024-07-12 18:30:20'),
('111909074', 'Sari Putri Yana', 'Laki-laki', '2024-07-12 18:30:20'),
('119935428', 'Avrillya Amanda Putri', 'Perempuan', '2024-07-12 18:30:20'),
('3114103975', 'Rahma Yani Daulay', 'Perempuan', '2024-07-12 18:30:20'),
('82055096', 'Farel Fernando', 'Perempuan', '2024-07-12 18:30:20'),
('82063108', 'Alfino Putra Antoni', 'Laki-laki', '2024-07-12 18:30:20'),
('87272106', 'Adelia Rahmadani', 'Perempuan', '2024-07-12 18:30:20'),
('88081892', 'Sekar Ayu Larasati', 'Perempuan', '2024-07-12 18:30:20'),
('88788003', 'Nabilah Nafis', 'Perempuan', '2024-07-12 18:30:20'),
('89314213', 'Nurul Fayzha', 'Perempuan', '2024-07-12 18:30:20'),
('91228356', 'Nur Aliza', 'Laki-laki', '2024-07-12 18:30:20'),
('92307945', 'Nazifatur Rahmi', 'Perempuan', '2024-07-12 18:30:20'),
('92929853', 'Nabila Gustania', 'Laki-laki', '2024-07-12 18:30:20'),
('94805203', 'Nabilla Junita Putri', 'Laki-laki', '2024-07-12 18:30:20'),
('96017421', 'Zulfa Inayah', 'Perempuan', '2024-07-12 18:30:20'),
('97688665', 'Nabila Desrianti', 'Perempuan', '2024-07-12 18:30:20'),
('97747598', 'Ericko Ramadan', 'Laki-laki', '2024-07-12 18:30:20'),
('﻿116911880', 'Aira Aisyah Putri Endrosa', 'Perempuan', '2024-07-12 18:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub` int NOT NULL,
  `kode_kriteria` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_sub` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_sub` int NOT NULL,
  `simpan_sub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub`, `kode_kriteria`, `nama_sub`, `nilai_sub`, `simpan_sub`) VALUES
(1, 'C1', 'Sangat Bagus', 5, '2024-07-12 16:46:51'),
(2, 'C1', 'Cukup Bagus', 3, '2024-07-12 16:48:21'),
(3, 'C1', 'Kurang Bagus', 1, '2024-07-12 16:48:34'),
(4, 'C2', 'Besar Dari 5 Tahun', 5, '2024-07-12 16:50:07'),
(5, 'C2', '2 Sampai 4 Tahun', 3, '2024-07-12 16:50:21'),
(6, 'C2', 'Kecil Sama Dengan 2 Tahun', 1, '2024-07-12 16:50:37'),
(7, 'C3', 'Sangat Baik', 5, '2024-07-12 16:55:14'),
(8, 'C3', 'Cukup Baik', 3, '2024-07-12 16:55:21'),
(10, 'C3', 'Kurang Baik', 1, '2024-07-12 16:55:31'),
(11, 'C4', 'Sangat Bagus', 5, '2024-07-12 16:55:46'),
(12, 'C4', 'Cukup Bagus', 3, '2024-07-12 16:55:54'),
(13, 'C4', 'Kurang Bagus', 1, '2024-07-12 16:55:59'),
(14, 'C5', 'Sangat Banyak', 5, '2024-07-12 16:56:17'),
(15, 'C5', 'Cukup Banyak', 3, '2024-07-12 16:56:27'),
(16, 'C5', 'Kurang Banyak', 1, '2024-07-12 16:56:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
