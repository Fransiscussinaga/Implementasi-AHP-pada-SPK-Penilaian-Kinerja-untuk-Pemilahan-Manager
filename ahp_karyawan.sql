-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 06:07 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', '$2y$10$j.093Q1Fzo/GHTxuLqgcluPxfOebCxTQYC4GICL2JDm6UL40sbtcu', 'Admin'),
(2, 'Pimpinan', 'pimpinan', '$2y$10$7//FPwv6guvKiCXVE.r2kuxnfe4mcTV0bGQ7HPNHKVHm2UNV29kVC', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `bidang_pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `bidang_pekerjaan`) VALUES
(4, 'Partnership'),
(5, 'Shipping'),
(6, 'HRD');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai_hasil` float NOT NULL,
  `id_periode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_karyawan`, `nilai_hasil`, `id_periode`) VALUES
(39, 1, 0.39168, 2),
(40, 2, 0.38495, 2),
(41, 3, 0.44008, 2),
(42, 4, 0.43521, 2),
(43, 5, 0.42184, 2),
(44, 6, 0.3658, 2),
(45, 7, 0.26702, 2),
(46, 8, 0.37147, 2);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `syarat` text NOT NULL,
  `pemimpin_project` enum('Ya','Tidak') NOT NULL,
  `minimal_s1` enum('Ya','Tidak') NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `id_periode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `id_bidang`, `syarat`, `pemimpin_project`, `minimal_s1`, `pendidikan_terakhir`, `id_periode`) VALUES
(1, '880037', 'NAILA FITHRIA', 'Perempuan', 4, 'bca7.png', 'Ya', 'Ya', 'S2', 2),
(2, '916325', 'AGUNG MULYAWAN', 'Laki-laki', 4, 'bca6.png', 'Ya', 'Ya', 'S2', 2),
(3, '810047', 'ELFIDA NURMATASARI', 'Perempuan', 4, 'bca5.png', 'Ya', 'Ya', 'S2', 2),
(4, '920209', 'QOLIQINA ZOLLA SABRINA', 'Perempuan', 4, 'bca4.png', 'Ya', 'Ya', 'S2', 2),
(5, '940161', 'TANTRI MAWARSIH', 'Perempuan', 4, 'bca3.png', 'Ya', 'Ya', 'S2', 2),
(6, '670072', 'MAULUD SYAFA\'AT', 'Laki-laki', 4, 'bca2.png', 'Ya', 'Ya', 'S2', 2),
(7, '830083', 'DYAH AYU', 'Perempuan', 4, 'bca1.png', 'Ya', 'Ya', 'S2', 2),
(8, '906529', 'ARWAN KURNIAWAN', 'Laki-laki', 4, 'bca.png', 'Ya', 'Ya', 'S2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_kriteria`
--

CREATE TABLE `karyawan_kriteria` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_nilai` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_kriteria`
--

INSERT INTO `karyawan_kriteria` (`id`, `id_karyawan`, `id_kriteria`, `id_nilai`, `nilai`) VALUES
(1, 1, 3, 4, 75),
(2, 1, 4, 4, 80),
(3, 1, 5, 3, 85),
(4, 1, 6, 4, 75),
(5, 1, 7, 3, 85),
(6, 1, 8, 3, 85),
(7, 1, 9, 3, 88),
(8, 2, 3, 4, 78),
(9, 2, 4, 3, 85),
(10, 2, 5, 4, 80),
(11, 2, 6, 4, 75),
(12, 2, 7, 4, 80),
(13, 2, 8, 4, 80),
(14, 2, 9, 3, 90),
(15, 3, 3, 4, 78),
(16, 3, 4, 3, 90),
(17, 3, 5, 3, 89),
(18, 3, 6, 4, 75),
(19, 3, 7, 3, 88),
(20, 3, 8, 3, 85),
(21, 3, 9, 3, 90),
(22, 4, 3, 4, 77),
(23, 4, 4, 3, 88),
(24, 4, 5, 3, 85),
(25, 4, 6, 3, 85),
(26, 4, 7, 4, 80),
(27, 4, 8, 3, 90),
(28, 4, 9, 3, 90),
(29, 5, 3, 4, 75),
(30, 5, 4, 3, 88),
(31, 5, 5, 3, 90),
(32, 5, 6, 4, 78),
(33, 5, 7, 4, 78),
(34, 5, 8, 3, 85),
(35, 5, 9, 3, 85),
(36, 6, 3, 5, 70),
(37, 6, 4, 3, 90),
(38, 6, 5, 3, 85),
(39, 6, 6, 4, 75),
(40, 6, 7, 4, 80),
(41, 6, 8, 3, 88),
(42, 6, 9, 3, 90),
(43, 7, 3, 5, 70),
(44, 7, 4, 4, 80),
(45, 7, 5, 4, 77),
(46, 7, 6, 5, 70),
(47, 7, 7, 4, 75),
(48, 7, 8, 4, 80),
(49, 7, 9, 3, 88),
(50, 8, 3, 4, 75),
(51, 8, 4, 3, 85),
(52, 8, 5, 4, 80),
(53, 8, 6, 5, 70),
(54, 8, 7, 4, 77),
(55, 8, 8, 4, 80),
(56, 8, 9, 3, 85);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `prioritas` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `prioritas`) VALUES
(3, 'K01', 'Leadership Skill', 0.31333),
(4, 'K02', 'Kemampuan terhadap Jobdesk', 0.27289),
(5, 'K03', 'Communication Skill', 0.16344),
(6, 'K04', 'Prestasi', 0.07536),
(7, 'K05', 'Decision Making Skill', 0.10283),
(8, 'K06', 'Pengetahuan Budaya Perusahaan', 0.04453),
(9, 'K07', 'Digital Maturity', 0.02762);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_ahp`
--

CREATE TABLE `kriteria_ahp` (
  `id` int(11) NOT NULL,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `nilai_1` float NOT NULL,
  `nilai_2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_ahp`
--

INSERT INTO `kriteria_ahp` (`id`, `id_kriteria_1`, `id_kriteria_2`, `nilai_1`, `nilai_2`) VALUES
(190, 3, 4, 7, 0.143),
(191, 3, 5, 3, 0.333),
(192, 3, 6, 1, 1),
(193, 3, 7, 6, 0.167),
(194, 3, 8, 4, 0.25),
(195, 3, 9, 7, 0.143),
(196, 4, 5, 6, 0.167),
(197, 4, 6, 9, 0.111),
(198, 4, 7, 5, 0.2),
(199, 4, 8, 7, 0.143),
(200, 4, 9, 7, 0.143),
(201, 5, 6, 9, 0.111),
(202, 5, 7, 4, 0.25),
(203, 5, 8, 5, 0.2),
(204, 5, 9, 3, 0.333),
(205, 6, 7, 1, 1),
(206, 6, 8, 1, 1),
(207, 6, 9, 1, 1),
(208, 7, 8, 7, 0.143),
(209, 7, 9, 7, 0.143),
(210, 8, 9, 3, 0.333);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `batas_1` float NOT NULL,
  `batas_2` float NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prioritas` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `batas_1`, `batas_2`, `nama`, `prioritas`) VALUES
(2, 91, 100, 'Sangat Bagus', 1),
(3, 81, 90, 'Bagus', 0.50903),
(4, 71, 80, 'Cukup', 0.33165),
(5, 61, 70, 'Kurang', 0.15278),
(6, 0, 60, 'Buruk', 0.06314);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ahp`
--

CREATE TABLE `nilai_ahp` (
  `id` int(11) NOT NULL,
  `id_nilai_1` int(11) NOT NULL,
  `id_nilai_2` int(11) NOT NULL,
  `nilai_1` float NOT NULL,
  `nilai_2` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_ahp`
--

INSERT INTO `nilai_ahp` (`id`, `id_nilai_1`, `id_nilai_2`, `nilai_1`, `nilai_2`) VALUES
(51, 2, 3, 3, 0.33333),
(52, 2, 4, 5, 0.2),
(53, 2, 5, 7, 0.14286),
(54, 2, 6, 9, 0.11111),
(55, 3, 4, 3, 0.33333),
(56, 3, 5, 5, 0.2),
(57, 3, 6, 7, 0.14286),
(58, 4, 5, 5, 0.2),
(59, 4, 6, 7, 0.14286),
(60, 5, 6, 5, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `periode_penilaian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `periode_penilaian`) VALUES
(2, 'Periode I');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `karyawan_kriteria`
--
ALTER TABLE `karyawan_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_ahp`
--
ALTER TABLE `kriteria_ahp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria_1` (`id_kriteria_1`),
  ADD KEY `id_kriteria_2` (`id_kriteria_2`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `nilai_ahp`
--
ALTER TABLE `nilai_ahp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nilai_1` (`id_nilai_1`),
  ADD KEY `id_nilai_2` (`id_nilai_2`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `karyawan_kriteria`
--
ALTER TABLE `karyawan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria_ahp`
--
ALTER TABLE `kriteria_ahp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_ahp`
--
ALTER TABLE `nilai_ahp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `karyawan_kriteria`
--
ALTER TABLE `karyawan_kriteria`
  ADD CONSTRAINT `karyawan_kriteria_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `karyawan_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `karyawan_kriteria_ibfk_3` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `kriteria_ahp`
--
ALTER TABLE `kriteria_ahp`
  ADD CONSTRAINT `kriteria_ahp_ibfk_1` FOREIGN KEY (`id_kriteria_1`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `kriteria_ahp_ibfk_2` FOREIGN KEY (`id_kriteria_2`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `nilai_ahp`
--
ALTER TABLE `nilai_ahp`
  ADD CONSTRAINT `nilai_ahp_ibfk_1` FOREIGN KEY (`id_nilai_1`) REFERENCES `nilai` (`id_nilai`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `nilai_ahp_ibfk_2` FOREIGN KEY (`id_nilai_2`) REFERENCES `nilai` (`id_nilai`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
