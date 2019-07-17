-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2019 at 01:54 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 5.6.40-8+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cic_agent`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis` enum('internal','external') NOT NULL,
  `keagenan` varchar(200) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `grade` enum('A','B','NON') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `kode`, `nama`, `jenis`, `keagenan`, `handphone`, `grade`) VALUES
(1, '101', 'Budi', 'internal', 'CIC', '083824055826', 'NON'),
(2, '301', 'Halim', 'external', 'SMK Negeri 1 Kedawung', '030193010', 'A'),
(5, '302', 'Alex', 'external', 'SMK MEC Majalengka', '21201', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `calon_mahasiswa`
--

CREATE TABLE `calon_mahasiswa` (
  `id` int(11) NOT NULL,
  `nomor_registrasi` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `gelombang` varchar(50) NOT NULL,
  `tanggal_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_mahasiswa`
--

INSERT INTO `calon_mahasiswa` (`id`, `nomor_registrasi`, `nama`, `jk`, `id_jurusan`, `id_agent`, `gelombang`, `tanggal_registrasi`) VALUES
(1, '14XA', 'Doni', 'L', 1, 2, '1', '2019-08-10'),
(3, '12121', 'Risna', 'P', 5, 2, '4', '2019-02-10'),
(4, '12918', 'Yani', 'P', 2, 1, '1', '2019-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `insentif`
--

CREATE TABLE `insentif` (
  `id` int(11) NOT NULL,
  `gelombang` int(11) DEFAULT '0',
  `jenjang` enum('S1','D3') NOT NULL,
  `grade` enum('A','B','NON') NOT NULL,
  `reward` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insentif`
--

INSERT INTO `insentif` (`id`, `gelombang`, `jenjang`, `grade`, `reward`) VALUES
(1, 1, 'S1', 'A', 300000),
(2, 2, 'S1', 'A', 300000),
(3, 3, 'S1', 'A', 150000),
(4, 4, 'S1', 'A', 100000),
(9, 1, 'D3', 'A', 250000),
(10, 2, 'D3', 'A', 250000),
(11, 3, 'D3', 'A', 125000),
(12, 4, 'D3', 'A', 75000),
(13, 1, 'S1', 'B', 250000),
(14, 2, 'S1', 'B', 125000),
(15, 3, 'S1', 'B', 100000),
(16, 4, 'S1', 'B', 50000),
(17, 1, 'D3', 'B', 200000),
(18, 2, 'D3', 'B', 100000),
(19, 3, 'D3', 'B', 75000),
(20, 4, 'D3', 'B', 40000),
(21, 0, 'S1', 'NON', 150000),
(22, 0, 'D3', 'NON', 125000);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `jenjang` enum('D3','D4','S1','S2','S3') NOT NULL,
  `nama_jurusan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `kode`, `jenjang`, `nama_jurusan`) VALUES
(1, '10', 'S1', 'Teknik Informatika'),
(2, '20', 'S1', 'Desain Komunikasi Visual'),
(3, '30', 'S1', 'Sistem Informasi - Komputerisasi Akuntansi'),
(4, '40', 'D3', 'Manajemen Bisnis'),
(5, '50', 'D3', 'Komputerisasi Akuntansi'),
(6, '60', 'D3', 'Manajemen Informatika - Web Programming'),
(7, '70', 'D3', 'Manajemen Informatika - Desain Komunikasi Visual');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `level` enum('MR','MN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', '$2y$10$9soP4F4O66NGIG1cIMxsx.c1A1xZbPyaywK2ivrW5NEy4SAsky276', 'Ahmad Hanafi', 'MR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calon_mahasiswa`
--
ALTER TABLE `calon_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insentif`
--
ALTER TABLE `insentif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `calon_mahasiswa`
--
ALTER TABLE `calon_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `insentif`
--
ALTER TABLE `insentif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
