-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2014 at 10:56 PM
-- Server version: 5.5.33
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sidp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pengunjung`
--

CREATE TABLE IF NOT EXISTS `data_pengunjung` (
  `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengunjung` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `tanggalkunjung` date NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id_pengunjung`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `data_pengunjung`
--

INSERT INTO `data_pengunjung` (`id_pengunjung`, `nama_pengunjung`, `alamat`, `kategori`, `jumlah`, `telp`, `tanggalkunjung`, `id`) VALUES
(5, 'Sukiman', 'Jalan Bima 1 no 45', 'Wisman', 1, '08995212356', '2014-06-05', 2),
(6, 'TK Ajur Sari', 'Desa Genuk Semarang', 'TK/SD', 50, '021567332', '2014-06-05', 2),
(7, 'Azka Ghausta', 'Jalan Sunan Kuning No. 69', 'Pengunjung Umum Dewasa', 2, '085225123456', '2014-06-05', 2),
(8, 'Universitas Dian Nuswantoro', 'Jalan Nakula 5 Semarang', 'Peneliti', 4, '021772332', '2014-06-05', 2),
(9, 'Erwin Rizki Ariyanto', 'Jalan Bima 1 no. 4F Semarang', 'Peneliti', 1, '081915160170', '2014-06-05', 3),
(10, 'SMA N 2 Rembang', 'Jalan Gajah Mada no. 2 Rembang', 'SLTA', 200, '0295691110', '2014-06-05', 3),
(11, 'SMA N 1 Rembang', 'Jalan Gajah Mada no. 3 Rembang', 'SLTA', 250, '0295691111', '2014-06-05', 3),
(12, 'AGKJ', 'Waru', 'Pengunjung Umum Anak', 1, '0295532235', '2014-06-05', 3),
(13, 'Cak Brenjung', 'Jalan Bima 1 no. 69', 'Peneliti', 5, '0295691114', '2014-06-05', 4),
(14, 'Jumintono', 'Kendal no.69 cus ah', 'Mahasiswa', 2, '085465464798', '2014-06-16', 3),
(15, 'Kos Oplosan', 'Palsu', 'Tamu Negara', 2, '0295532234', '2014-09-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE IF NOT EXISTS `data_petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`id`, `nama`, `username`, `password`) VALUES
(2, 'Aan Galih', 'unyu2', 'bisma'),
(3, 'Fadhel', 'maho', 'permanen'),
(4, 'Yohan', 'yantari', 'cute'),
(5, 'Ki Prana Lewu', 'hadir', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `secret`
--

CREATE TABLE IF NOT EXISTS `secret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `secret`
--

INSERT INTO `secret` (`id`, `username`, `password`) VALUES
(2, 'admin', 'b49728019442d090c225428f9a2ea611');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
