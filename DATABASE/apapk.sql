-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2016 at 07:41 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apapk`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset_brg`
--

CREATE TABLE IF NOT EXISTS `aset_brg` (
  `no_aset` bigint(30) NOT NULL AUTO_INCREMENT,
  `kode_brg` int(10) NOT NULL,
  `stock` int(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stock_min` int(5) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  PRIMARY KEY (`no_aset`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106000001270 ;

--
-- Dumping data for table `aset_brg`
--

INSERT INTO `aset_brg` (`no_aset`, `kode_brg`, `stock`, `satuan`, `stock_min`, `lokasi`) VALUES
(106000001265, 1001, 100, 'pcs', 10, 'Gudang GA Stockyard'),
(106000001266, 1002, 50, 'pcs', 10, 'Gudang GA Stockyard'),
(106000001267, 1003, 35, 'pcs', 10, 'Gudang GA Stockyard'),
(106000001268, 1004, 15, 'pcs', 5, 'Gudang GA Stockyard'),
(106000001269, 1004, 10, 'pcs', 2, 'Gudang GA 3');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_permintaan`
--

CREATE TABLE IF NOT EXISTS `daftar_permintaan` (
  `no_dp` int(12) NOT NULL AUTO_INCREMENT,
  `ndp` int(10) NOT NULL,
  `no_aset` bigint(15) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`no_dp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `daftar_permintaan`
--

INSERT INTO `daftar_permintaan` (`no_dp`, `ndp`, `no_aset`, `qty`) VALUES
(1, 1, 106000001265, 3),
(3, 1, 106000001266, 2),
(4, 1, 106000001267, 5),
(15, 1, 106000001268, 9);

-- --------------------------------------------------------

--
-- Table structure for table `dp`
--

CREATE TABLE IF NOT EXISTS `dp` (
  `ndp` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`ndp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `dp`
--

INSERT INTO `dp` (`ndp`, `tgl`, `status`) VALUES
(1, '2016-09-01', 'Ditunda'),
(9, '2016-09-03', 'Baru Dikirimkan');

-- --------------------------------------------------------

--
-- Table structure for table `ms_brg`
--

CREATE TABLE IF NOT EXISTS `ms_brg` (
  `kode_brg` int(10) NOT NULL AUTO_INCREMENT,
  `nama_brg` varchar(25) NOT NULL,
  `mata_uang` varchar(10) NOT NULL,
  `harga_brg` int(12) NOT NULL,
  `ktrg_brg` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_brg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `ms_brg`
--

INSERT INTO `ms_brg` (`kode_brg`, `nama_brg`, `mata_uang`, `harga_brg`, `ktrg_brg`) VALUES
(1001, 'KURSI T5', 'Rp', 100, 'ukuran kursi 2x3x5'),
(1002, 'FSAP FULL 2', 'Rp', 30000, 'FORM SURAT FULL 2 RANGKAP'),
(1003, 'FSAP FULL 3', 'Rp', 32000, 'FORM SURAT FULL 3 RANGKAP'),
(1004, 'FSAP HALF 2', 'Rp', 25000, 'FORM SURAT HALF 2 RANGKAP'),
(1005, 'FSAP HALF 3', 'Rp', 27000, 'FORM SURAT HALF 3 RANGKAP');

-- --------------------------------------------------------

--
-- Table structure for table `op`
--

CREATE TABLE IF NOT EXISTS `op` (
  `nop` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_op` date NOT NULL,
  `status` varchar(35) NOT NULL,
  PRIMARY KEY (`nop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `op`
--

INSERT INTO `op` (`nop`, `tgl_op`, `status`) VALUES
(1, '2016-09-01', 'Menunggu Persetujuan'),
(2, '2016-09-09', 'Disetujui'),
(3, '2016-09-03', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `order_pemesanan`
--

CREATE TABLE IF NOT EXISTS `order_pemesanan` (
  `no_order` int(10) NOT NULL AUTO_INCREMENT,
  `nop` int(10) NOT NULL,
  `kode_brg` int(10) NOT NULL,
  `tggl_order` date NOT NULL,
  `jml_order` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `waktu_kirim` varchar(30) NOT NULL,
  `ktrgn_order` varchar(50) NOT NULL,
  PRIMARY KEY (`no_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order_pemesanan`
--

INSERT INTO `order_pemesanan` (`no_order`, `nop`, `kode_brg`, `tggl_order`, `jml_order`, `qty`, `waktu_kirim`, `ktrgn_order`) VALUES
(1, 1, 1001, '2016-09-02', 10000, 10, '3 Hari', 'Mantap Bosh'),
(2, 1, 1004, '2016-09-02', 90, 9, '90', 'op'),
(3, 1, 1002, '2016-09-03', 80000, 8, '78', 'jhjkb');

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE IF NOT EXISTS `sp` (
  `nsp` int(10) NOT NULL,
  `tgl_sp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srt_pgntr`
--

CREATE TABLE IF NOT EXISTS `srt_pgntr` (
  `no_sp` int(3) NOT NULL AUTO_INCREMENT,
  `tggl_sp` date NOT NULL,
  `kpd_sp` varchar(20) NOT NULL,
  `no_dp` int(10) NOT NULL,
  PRIMARY KEY (`no_sp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `srt_pgntr`
--

INSERT INTO `srt_pgntr` (`no_sp`, `tggl_sp`, `kpd_sp`, `no_dp`) VALUES
(1, '2016-09-04', 'untuk finance', 2),
(4, '2016-09-02', 'fsap full 3 box', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id_user` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `departemen` varchar(10) NOT NULL,
  `hak_akses` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_user`, `username`, `password`, `departemen`, `hak_akses`) VALUES
(1, 'faisal01', 'admin', 'GA', 'ADMIN'),
(3, 'faisal02', 'faisal', 'Sales ', 'USER'),
(4, 'sumboro', '12345', 'QC', 'USER');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
