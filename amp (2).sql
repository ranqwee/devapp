-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Agu 2016 pada 16.35
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_order`
--

CREATE TABLE IF NOT EXISTS `job_order` (
  `id_joborder` int(10) NOT NULL AUTO_INCREMENT,
  `id_personil` int(5) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `jam` datetime NOT NULL,
  `job` text NOT NULL,
  `material` varchar(50) NOT NULL,
  PRIMARY KEY (`id_joborder`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `job_order`
--

INSERT INTO `job_order` (`id_joborder`, `id_personil`, `shift`, `jam`, `job`, `material`) VALUES
(1, 1, 'Shift 2', '2016-08-01 08:00:00', 'Cek kelistrikan PU Cab', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE IF NOT EXISTS `kerusakan` (
  `id_kerusakan` int(10) NOT NULL AUTO_INCREMENT,
  `id_personil` int(5) NOT NULL,
  `id_mesin` int(5) NOT NULL,
  `id_shop` tinyint(3) NOT NULL,
  `tgl` date NOT NULL,
  `kerusakan` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kerusakan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `id_personil`, `id_mesin`, `id_shop`, `tgl`, `kerusakan`, `status`) VALUES
(2, 4, 4, 1, '2016-07-15', 'Dalam Penyelidikan', 'Proses'),
(3, 4, 3, 1, '2016-07-15', 'Human Error', 'Proses'),
(4, 4, 4, 3, '2016-07-09', 'Material Salah', 'Waiting Part'),
(5, 4, 1, 5, '2016-07-15', 'Human Error', 'Waiting Part'),
(6, 4, 1, 10, '2016-07-17', 'Desain Salah', 'OK'),
(13, 4, 5, 9, '2016-07-30', 'Mesin Berhenti Tiba Tiba', 'Waiting Part'),
(14, 4, 3, 12, '2016-07-31', 'Mesin Berhenti Tercium Bau Hangus', 'OK'),
(23, 4, 5, 12, '2016-08-01', 'Mesin Macet', 'Baru Dikirimkan'),
(24, 11, 9, 11, '2016-08-10', '', 'Baru Dikirimkan'),
(25, 6, 9, 17, '2016-08-19', 'dsdsdes', 'Baru Dikirimkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_mesin`
--

CREATE TABLE IF NOT EXISTS `ms_mesin` (
  `id_mesin` int(5) NOT NULL AUTO_INCREMENT,
  `nama_mesin` varchar(50) NOT NULL,
  `type_mesin` varchar(50) NOT NULL,
  `merek_mesin` varchar(50) NOT NULL,
  `noseri_mesin` varchar(30) NOT NULL,
  `tahun_mesin` year(4) NOT NULL,
  `jml_mesin` tinyint(3) NOT NULL,
  `id_shop` tinyint(5) NOT NULL,
  `id_personil` int(5) NOT NULL,
  `tgl_mesin` date NOT NULL,
  `supp_mesin` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mesin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `ms_mesin`
--

INSERT INTO `ms_mesin` (`id_mesin`, `nama_mesin`, `type_mesin`, `merek_mesin`, `noseri_mesin`, `tahun_mesin`, `jml_mesin`, `id_shop`, `id_personil`, `tgl_mesin`, `supp_mesin`) VALUES
(1, 'Strapping Machine', 'TP-6010-Y', 'TRANSPAK', '111014212', 2014, 2, 3, 2, '2011-12-27', 'SYSPEX KEMASINDO'),
(2, 'Earth Continuity Tester', 'Digital', 'KIKUSUI', '334443', 2014, 2, 3, 3, '2015-01-20', 'Arta Kukusui'),
(3, 'Uryu Ratchet Wrench 6', 'URW-6', 'Uryu', 'N43252', 2011, 1, 2, 3, '2011-11-25', 'DITOSA'),
(4, 'Hotmelt #2', 'Durablue 16', 'Nordson', 'NC11K00292', 2012, 1, 6, 3, '2012-01-10', 'Amasindo'),
(5, '110B Komatsu', 'OBW-110-2', 'Komatsu', '10084', 1984, 1, 9, 3, '0000-00-00', ''),
(6, '2550B', 'PHS110x2550', 'Komatsu', 'WSH230', 1990, 1, 9, 3, '2011-07-04', 'Maruka Indonesia'),
(7, 'Uryu Ratchet Wrench 5', 'UW-6SSLDK', 'Uryu', 'N43241', 2011, 1, 1, 2, '2011-11-25', 'DITOSA'),
(8, 'Uryu Ratchet Wrench 4', 'URW-6', 'Uryu', 'N43251', 2011, 1, 1, 2, '2011-11-25', 'DITOSA'),
(9, 'Boiler', 'HDO-1600/10', 'SCHNEIDER-GERMANY', '02-TJ15-1198', 2008, 1, 16, 4, '2008-11-20', 'TRIMITRA WISESA ABADI'),
(10, 'Okamoto', 'PB2-7', 'Okamoto', '2394-42-4', 1995, 1, 9, 3, '2007-06-06', 'AMASINDO BINTANG CEMERLANG PT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_personil`
--

CREATE TABLE IF NOT EXISTS `ms_personil` (
  `id_personil` int(5) NOT NULL AUTO_INCREMENT,
  `tgl_personil` date DEFAULT NULL,
  `nama_personil` varchar(30) NOT NULL,
  `alamat_personil` text NOT NULL,
  `telp_personil` varchar(15) DEFAULT NULL,
  `hp_personil` varchar(15) DEFAULT NULL,
  `id_shop` tinyint(5) NOT NULL,
  `skill` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_personil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `ms_personil`
--

INSERT INTO `ms_personil` (`id_personil`, `tgl_personil`, `nama_personil`, `alamat_personil`, `telp_personil`, `hp_personil`, `id_shop`, `skill`, `keterangan`) VALUES
(1, '2009-07-16', 'Ahmad Fuadi', 'Petamburan Jakarta Pusat', '92193993', '081511710289', 6, 'Leader', ''),
(2, '2009-07-17', 'Darman', 'Cilandak Jakarta Selatan', '3443554', '08654433526', 6, 'Fabrikasi', ''),
(3, '2009-07-26', 'Arso Wibowo', 'Cempaka Putih Jakarta Pusat', '87766554', '0876554433', 6, 'Pneumatik', ''),
(4, '2010-10-09', 'Joko Susilo', 'Kemayoran Jakarta Pusat', '7665643', '08567653785', 6, 'Elektrikal', ''),
(5, '2010-01-05', 'Judi Komusa', 'Cakung Jakarta Timur', '4533322', '0815435643', 10, 'Helper', ''),
(6, '2013-06-15', 'Anwar Joko', 'Cilincing Jakarta Timur', '34444333', '0867655443', 3, 'Helper', ''),
(7, '2014-08-10', 'Koko', 'Bekasi Barat', '4455353', '081256776453', 5, 'Helper', ''),
(8, '2013-02-09', 'Santoso', 'Bekasi Timur', '7310887', '08571244563', 6, 'Mekanikal', ''),
(9, '2010-01-13', 'Sudarmadji', 'Ciledug Tangerang', '5544333', '0833221112', 2, 'Plumber', ''),
(10, '2010-01-08', 'Setyu Hartono', 'Joglo Jakarta Selatan', '5664433', '0896755344', 6, 'Mekanikal', '-'),
(11, '2010-08-14', 'Edi Yunanto', 'Tambun kab, Bekasi', '083899633320', '089671605950', 6, 'Helper', '-'),
(12, '2009-12-10', 'Adiman', 'Pondok Pucung', '344422233', '08676655443', 6, 'Helper', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_shop`
--

CREATE TABLE IF NOT EXISTS `ms_shop` (
  `id_shop` tinyint(5) NOT NULL AUTO_INCREMENT,
  `nama_shop` varchar(25) NOT NULL,
  PRIMARY KEY (`id_shop`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `ms_shop`
--

INSERT INTO `ms_shop` (`id_shop`, `nama_shop`) VALUES
(1, 'Final 1A'),
(2, 'Final 1B'),
(3, 'Final 2A'),
(4, 'Final 2B'),
(5, 'All Shop'),
(6, 'Maintenance'),
(7, 'Pre Assy A'),
(8, 'Pree Assy B'),
(9, 'Press'),
(10, 'PU CAB'),
(11, 'PU DOOR'),
(12, 'Silk Screen'),
(13, 'Sub Assy'),
(14, 'Vacuum Forming'),
(15, 'Pipa'),
(16, 'Painting'),
(17, 'Service'),
(19, 'WIP'),
(20, 'Spot'),
(21, 'Touch Up');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaan`
--

CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `id_pemeliharaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_joborder` int(10) NOT NULL,
  `tgl` date NOT NULL,
  `job` text NOT NULL,
  `id_mesin` int(5) NOT NULL,
  `id_shop` tinyint(5) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `loss` varchar(50) DEFAULT NULL,
  `job_type` varchar(20) NOT NULL,
  `job_status` varchar(15) NOT NULL,
  `id_personil` int(5) NOT NULL,
  `material` varchar(50) DEFAULT NULL,
  `penyebab` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pemeliharaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `id_joborder`, `tgl`, `job`, `id_mesin`, `id_shop`, `shift`, `loss`, `job_type`, `job_status`, `id_personil`, `material`, `penyebab`) VALUES
(1, 1, '2016-06-10', 'Mengganti V-Belt PU Door', 6, 11, 'Shift 1', '12.30 - 14.30', 'Corrective', 'Close', 12, 'V-Belt 5 pcs', ''),
(2, 2, '2016-07-15', 'aaaaaaaa', 4, 11, 'Shift 3', '14.20', 'Preventive', 'Close', 4, 'dddddd', ''),
(3, 3, '2016-07-23', 'aaaaaaaa', 6, 12, 'Shift 1', '18:00', 'Corrective', 'Open', 12, 'ddddddd', ''),
(4, 8, '2016-07-22', 'Menggantu Oli PU Cab  ', 6, 10, 'Shift 2', '08:00', 'Preventive', 'Waiting Part', 6, 'Oli 3 Liter  ', ''),
(5, 4, '2016-08-01', 'Periksa Electrical PU Door ', 5, 11, 'Shift 1', '40 Menit', 'Preventive', 'Open', 3, '', ''),
(6, 4, '2016-08-01', 'Gun bocor karena teplon dan baut stelan    ', 3, 16, 'Shift 2', '5 Menit', 'Corrective', 'Close', 3, 'Teplon     ', ''),
(7, 1, '2016-08-01', 'Mengganti Vbelt PU Door', 5, 9, 'Shift 1', '30 Menit', 'Preventive', 'Close', 6, 'Vbelt PU Door', 'Umur Tercapai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` tinyint(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'ahmadfuadi', '12345', 'SHOPF'),
(2, 'sumboro', '12345', 'ADMIN'),
(3, 'darmanwijaya', '12345', 'TEKNISI'),
(4, 'Sutrisno', '12345', 'KASHOP'),
(18, 'supono', '12345', 'TEKNISI'),
(19, 'sukirno', '12345', 'TEKNISI');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
