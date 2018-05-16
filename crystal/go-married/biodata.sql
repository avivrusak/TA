-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 01:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_married`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(11) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status_wn` varchar(255) NOT NULL,
  `status_kawin` varchar(255) NOT NULL,
  `nama_cw` varchar(255) NOT NULL,
  `tempat_lahir_cw` varchar(255) NOT NULL,
  `tgl_lahir_cw` date NOT NULL,
  `umur_cw` int(11) NOT NULL,
  `agama_cw` varchar(255) NOT NULL,
  `alamat_cw` varchar(255) NOT NULL,
  `status_wn_cw` varchar(255) NOT NULL,
  `status_kawin_cw` varchar(255) NOT NULL,
  `nama_ay` varchar(255) NOT NULL,
  `tgl_lahir_ay` date NOT NULL,
  `agama_ay` varchar(255) NOT NULL,
  `alamat_ay` varchar(255) NOT NULL,
  `nama_ay_cw` varchar(255) NOT NULL,
  `tgl_lahir_ay_cw` date NOT NULL,
  `agama_ay_cw` varchar(255) NOT NULL,
  `alamat_ay_cw` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `agama_ibu` varchar(255) NOT NULL,
  `alamat_ibu` varchar(255) NOT NULL,
  `nama_ibu_cw` varchar(255) NOT NULL,
  `tgl_lahir_ibu_cw` date NOT NULL,
  `agama_ibu_cw` varchar(255) NOT NULL,
  `alamat_ibu_cw` varchar(255) NOT NULL,
  `nama_s` varchar(255) NOT NULL,
  `tgl_lahir_s` date NOT NULL,
  `alamat_s` varchar(255) NOT NULL,
  `nama_scw` varchar(255) NOT NULL,
  `tgl_lahir_scw` date NOT NULL,
  `alamat_scw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama`, `tempat_lahir`, `tgl_lahir`, `umur`, `agama`, `alamat`, `status_wn`, `status_kawin`, `nama_cw`, `tempat_lahir_cw`, `tgl_lahir_cw`, `umur_cw`, `agama_cw`, `alamat_cw`, `status_wn_cw`, `status_kawin_cw`, `nama_ay`, `tgl_lahir_ay`, `agama_ay`, `alamat_ay`, `nama_ay_cw`, `tgl_lahir_ay_cw`, `agama_ay_cw`, `alamat_ay_cw`, `nama_ibu`, `tgl_lahir_ibu`, `agama_ibu`, `alamat_ibu`, `nama_ibu_cw`, `tgl_lahir_ibu_cw`, `agama_ibu_cw`, `alamat_ibu_cw`, `nama_s`, `tgl_lahir_s`, `alamat_s`, `nama_scw`, `tgl_lahir_scw`, `alamat_scw`) VALUES
(3, '', '', '0000-00-00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', ''),
(4, 'Sunaryo', '', '0000-00-00', 0, '', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', ''),
(5, 'Sunaryo', '', '1970-12-12', 28, 'Islam', '', 'WNI', 'Belum Kawin', '', '', '0000-00-00', 0, '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', ''),
(6, 'Sunaryo', 'Surabaya', '1970-02-01', 28, 'Islam', '', 'WNI', 'Belum Kawin', '', '', '0000-00-00', 0, '', '', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', ''),
(7, 'Rusdiawan', 'Surabaya', '1995-05-10', 21, 'Islam', 'Wisma Permai', 'WNI', 'Belum Kawin', 'Neng', 'Bandung', '1995-09-14', 22, 'Islam', 'Dago', 'WNI', 'Belum Kawin', 'Kusnarto', '1960-12-14', 'Islam', 'Lebak jaya', 'Sony', '1962-10-11', 'Islam', 'Njagir', 'Herni', '1968-12-16', 'Islam', 'Lebak jaya', 'Sunny', '1965-08-16', 'Islam', 'Njagir', 'Akbar', '1980-06-20', 'Mulyosari', 'Rosa', '1982-04-17', 'Mulyorejo'),
(8, 'Rusdiawan', 'Surabaya', '1995-05-10', 21, 'Islam', 'Wisma Permai', 'WNI', 'Belum Kawin', 'Neng', 'Bandung', '1995-09-14', 22, 'Islam', 'Dago', 'WNI', 'Belum Kawin', 'Kusnarto', '1960-12-14', 'Islam', 'Lebak jaya', 'Sony', '1962-10-11', 'Islam', 'Njagir', 'Herni', '1968-12-16', 'Islam', 'Lebak jaya', 'Sunny', '1965-08-16', 'Islam', 'Njagir', 'Akbar', '1980-06-20', 'Mulyosari', 'Rosa', '1982-04-17', 'Mulyorejo'),
(9, 'Rusdiawan', 'Surabaya', '1995-05-10', 21, 'Islam', 'Wisma Permai', 'WNI', 'Belum Kawin', 'Neng', 'Bandung', '1995-09-14', 22, 'Islam', 'Dago', 'WNI', 'Belum Kawin', 'Kusnarto', '1960-12-14', 'Islam', 'Lebak jaya', 'Sony', '1962-10-11', 'Islam', 'Njagir', 'Herni', '1968-12-16', 'Islam', 'Lebak jaya', 'Sunny', '1965-08-16', 'Islam', 'Njagir', 'Akbar', '1980-06-20', 'Mulyosari', 'Rosa', '1982-04-17', 'Mulyorejo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
