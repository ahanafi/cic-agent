-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2019 at 03:55 PM
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
  `int` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis` enum('internal','external') NOT NULL,
  `keagenan` varchar(200) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `grade` enum('A','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `calon_mahasiswa`
--

CREATE TABLE `calon_mahasiswa` (
  `id` int(11) NOT NULL,
  `nomor_registrasi` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `gelombang` varchar(50) NOT NULL,
  `tanggal_registrasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insentif`
--

CREATE TABLE `insentif` (
  `id` int(11) NOT NULL,
  `grade` enum('A','B','NON') NOT NULL,
  `gelombang` int(11) DEFAULT NULL,
  `jenjang` enum('S1','D3') NOT NULL,
  `reward` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insentif`
--

INSERT INTO `insentif` (`id`, `grade`, `gelombang`, `jenjang`, `reward`) VALUES
(1, 'A', 1, 'S1', 300000),
(2, 'A', 2, 'S1', 300000),
(3, 'A', 3, 'S1', 150000),
(4, 'A', 4, 'S1', 100000),
(9, 'A', 1, 'D3', 250000),
(10, 'A', 2, 'D3', 250000),
(11, 'A', 3, 'D3', 125000),
(12, 'A', 4, 'D3', 75000),
(13, 'B', 1, 'S1', 250000),
(14, 'B', 2, 'S1', 125000),
(15, 'B', 3, 'S1', 100000),
(16, 'B', 4, 'S1', 50000),
(17, 'B', 1, 'D3', 200000),
(18, 'B', 2, 'D3', 100000),
(19, 'B', 3, 'D3', 75000),
(20, 'B', 4, 'D3', 40000),
(21, 'NON', NULL, 'S1', 150000),
(22, 'NON', NULL, 'D3', 125000);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jenjang` enum('D3','D4','S1','S2','S3') NOT NULL,
  `nama_jurusan` varchar(200) NOT NULL,
  `kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`int`),
  ADD UNIQUE KEY `kode` (`kode`);

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
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
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
  MODIFY `int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `calon_mahasiswa`
--
ALTER TABLE `calon_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insentif`
--
ALTER TABLE `insentif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
