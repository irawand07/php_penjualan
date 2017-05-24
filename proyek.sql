-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 01:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` char(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_admin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `password`, `nama_admin`) VALUES
('irawand07', 'nikita', 'dedi irawan');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `idanggota` char(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `alamat_anggota` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dp` varchar(60) NOT NULL DEFAULT 't_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`idanggota`, `password`, `nama_anggota`, `alamat_anggota`, `no_telepon`, `email`, `dp`) VALUES
('dedi', 'c5897fbcc14ddcf30dca31b2735c3d7e', 'dedi', 'jalam, klaten, Jawa Tengah', '085728787876', 'dedi@gmail.com', 'default.png'),
('irawand', 'b00a50c448238a71ed479f81fa4d9066', 'dedi', 'shkfhf, kshfd, Yogyakarta', '093459438554', 'gsa@gmail.com', 'cocc.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE IF NOT EXISTS `detail_pesan` (
`no_detail` int(11) NOT NULL,
  `kode_makanan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `no_pesan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`no_detail`, `kode_makanan`, `qty`, `harga`, `no_pesan`) VALUES
(120, 17, 6, 10000, 61);

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE IF NOT EXISTS `makanan` (
`kode_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`kode_makanan`, `nama_makanan`, `harga`, `stock`, `foto`) VALUES
(17, 'roti', 10000, 93, '002.jpg'),
(18, 'xxx', 10000, 23, 'coc.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
`kode_agen` int(11) NOT NULL,
  `nama_agen` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`kode_agen`, `nama_agen`) VALUES
(2, 'jne'),
(3, 'pos'),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, 'aaaaa'),
(9, 'hjjfhfg'),
(10, ''),
(11, 'dhdffd`'),
(12, 'paijo');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`no_pesan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `alamat_kirim` varchar(30) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `idanggota` char(10) NOT NULL,
  `kode_agen` int(11) NOT NULL DEFAULT '2',
  `status_bayar` enum('L','B') NOT NULL DEFAULT 'B'
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`no_pesan`, `nama`, `telp`, `tgl_pesan`, `alamat_kirim`, `total_harga`, `idanggota`, `kode_agen`, `status_bayar`) VALUES
(56, 'paijo', '0823942348', '2015-12-05', 'sldhflsdkh, skdhsdk, Yogyakart', 218000, 'irawand', 2, 'B'),
(57, 'dgsgds', '028082829', '2015-12-05', 'fgdfgf, fgfdgfg, Yogyakarta', 117000, 'irawand', 2, 'L'),
(58, 'dsfsdfs', '0832362832', '2015-12-05', 'dbdb, fbfbd, Jawa Timur', 9000, 'irawand', 2, 'B'),
(59, 'dfhdfh', '078787', '2015-12-05', 'fhfdhdf, dhdfd, Yogyakarta', 132000, 'irawand', 2, 'B'),
(60, 'sfdsf', '097987', '2015-12-05', 'bffg, dff, Yogyakarta', 1000, 'irawand', 2, 'B'),
(61, 'xxx', '0708788777878', '2015-12-12', 'adad, dfsfd, Jawa Tengah', 60000, 'irawand', 2, 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
 ADD PRIMARY KEY (`idanggota`);

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
 ADD PRIMARY KEY (`no_detail`), ADD KEY `no_pesan` (`no_pesan`), ADD KEY `kode_makanan` (`kode_makanan`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
 ADD PRIMARY KEY (`kode_makanan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
 ADD PRIMARY KEY (`kode_agen`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`no_pesan`), ADD KEY `idanggota` (`idanggota`), ADD KEY `kode_agen` (`kode_agen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
MODIFY `no_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
MODIFY `kode_makanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
MODIFY `kode_agen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `no_pesan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
ADD CONSTRAINT `detail_pesan_ibfk_1` FOREIGN KEY (`no_pesan`) REFERENCES `pesan` (`no_pesan`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `detail_pesan_ibfk_2` FOREIGN KEY (`kode_makanan`) REFERENCES `makanan` (`kode_makanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`idanggota`) REFERENCES `anggota` (`idanggota`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`kode_agen`) REFERENCES `pengiriman` (`kode_agen`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
