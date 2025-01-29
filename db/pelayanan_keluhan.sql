-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2021 at 09:27 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('332332243445224', 'Debi', 'Debian', '202cb962ac59075b964b07152d234b70', '342252'),
('4354545734234', 'Tric', 'Triccia', '202cb962ac59075b964b07152d234b70', '3453635343'),
('43742363', 'Lala', 'La', 'c20ad4d76fe97759aa27a0c99bff6710', '546635'),
('8323242027', 'Jaka', 'Jak', 'ad556d63e9333734ab1fd7e76f753269', '3453313');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(5) NOT NULL,
  `tgl_pengaduan` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(3, '2021-06-17', '1376012310010005', 'FFFFFFF', '170620215929Screenshot_2021-06-15_15-49-50.png', 'selesai'),
(9, '2021-06-17', '345253664', 'KEBAKARAN', '170620212426index.jpg', 'selesai'),
(10, '2021-06-17', '', 'KEBARKAR', '170620215749Screenshot_2021-06-15_15-52-24.png', 'proses'),
(12, '2021-06-17', '222222222', 'KEBARAKAN', '170620210011index.jpg', 'selesai'),
(13, '2021-06-17', '222222222', 'ADA BADAI', '170620214641index.jpg', 'selesai'),
(14, '2021-06-18', '3144958593038', 'ADA PETIR', '180620211509index.jpg', 'selesai'),
(16, '2021-06-18', '43742363', 'DDDDD', '180620215154Screenshot_2021-06-15_14-51-12.png', 'selesai'),
(17, '2021-06-18', '4354545734234', 'fffffff', '180620210618Screenshot_2021-06-15_15-52-24.png', 'selesai'),
(18, '2021-06-18', '332332243445224', 'Ada Banjir', '180620214820images.jpg', 'selesai'),
(19, '2021-06-18', '332332243445224', 'dfssfs', '180620212031Screenshot_2021-06-15_15-42-42.png', 'proses'),
(20, '2021-06-19', '332332243445224', 'OK', '190620211926Screenshot_2021-06-15_15-59-27.png', 'selesai'),
(21, '2021-06-26', '8323242027', 'MANTUL', '260620212331Screenshot_2021-06-22_15-33-53.png', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp_petugas` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp_petugas`, `level`) VALUES
(4, 'Lia', 'Lia Aja', '81dc9bdb52d04dc20036dbd8313ed055', '55768343', 'petugas'),
(5, 'Andrian', 'AndrianJKT', 'c20ad4d76fe97759aa27a0c99bff6710', '45653424', 'admin'),
(6, 'Jaka', 'Jack', 'c20ad4d76fe97759aa27a0c99bff6710', '43439498', 'petugas'),
(7, 'Ulisa', 'Uli', '202cb962ac59075b964b07152d234b70', '32034994', 'admin'),
(8, 'Admin', 'Admin', 'ad556d63e9333734ab1fd7e76f753269', '345525', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(5) NOT NULL,
  `id_pengaduan` int(5) NOT NULL,
  `tgl_tanggapan` varchar(20) NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(2, 3, '2021-06-17', 'OKKK', 2),
(5, 13, '2021-06-17', 'OK', 3),
(6, 14, '2021-06-18', 'PROSES LUR', 4),
(9, 17, '2021-06-18', 'ok', 4),
(10, 18, '2021-06-18', 'PROSES', 6),
(11, 20, '2021-06-19', 'PKJFJ', 6),
(12, 21, '2021-06-26', 'OK', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
