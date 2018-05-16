-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 01:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpu`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ahli_waris`
--

CREATE TABLE `data_ahli_waris` (
  `ID_AHLI_WARIS` varchar(5) NOT NULL,
  `ID_TPU` varchar(5) DEFAULT NULL,
  `ID_JENAZAH` varchar(50) DEFAULT NULL,
  `NAMA_AHLI_WARIS` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(12) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `TANGGAL_SEWA` date DEFAULT NULL,
  `HABIS_SEWA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_jenazah`
--

CREATE TABLE `data_jenazah` (
  `ID_JENAZAH` varchar(50) NOT NULL,
  `ID_AHLI_WARIS` varchar(5) DEFAULT NULL,
  `NAMA_JENAZAH` varchar(50) DEFAULT NULL,
  `ALAMAT_` varchar(50) DEFAULT NULL,
  `TANGGAL_LAHIR_` timestamp NULL DEFAULT NULL,
  `JENIS_KELAMIN` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_lokasi_tpu`
--

CREATE TABLE `data_lokasi_tpu` (
  `ID_TPU` varchar(5) NOT NULL,
  `NAMA_LOKASI_` varchar(50) DEFAULT NULL,
  `ALAMAT_LOKASI_` varchar(50) DEFAULT NULL,
  `JUMLAH_MAKAM` varchar(10) DEFAULT NULL,
  `LUAS_LAHAN` varchar(10) DEFAULT NULL,
  `HARGA_SEWA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lokasi_tpu`
--

INSERT INTO `data_lokasi_tpu` (`ID_TPU`, `NAMA_LOKASI_`, `ALAMAT_LOKASI_`, `JUMLAH_MAKAM`, `LUAS_LAHAN`, `HARGA_SEWA`) VALUES
('1', 'MK Peneleh', 'jl. ', '57', '45000', 10000),
('10', 'MI Asem Jajar', 'jl.jajar', '8960', '28000', 10000),
('11', 'TPU Wonokusumo Kidul', 'jl.wonokusumo', '22720', '71000', 5000),
('12', 'TPU Keputih', 'jl. Keputih', '103360', '323000', 10000),
('13', 'TPU Babat Jerawat ', 'jl. Babaat', '29843', '93260', 10000),
('2', 'MI Ngagel Rejo', 'jl. ngagel rejo', '18804', '60000', 45000),
('3', 'MI Tembok Gede', 'jl. tembok geeeede', '52329', '140000', 5000),
('4', 'MK Kembang Kuning ', 'jl. Kembang Kuning', '47575', '367000', 5000),
('5', 'MI Kalianak', 'jl.Kalianak', '22400', '70000', 5000),
('6', 'MI Karang Tembok', 'jl. tembok ', '27200', '85000', 5000),
('7', 'TPU Putat Gede', 'jl. putat jaya', '44800', '140000', 5000),
('8', 'TPU Kapas Krampung', 'jl. Kapas krampung', '28800', '90000', 5000),
('9', 'MT Simo Kwagean', 'jl. simo', '44800', '140000', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `data_makam`
--

CREATE TABLE `data_makam` (
  `ID_MAKAM` varchar(5) NOT NULL,
  `ID_TPU` varchar(5) DEFAULT NULL,
  `NO_MAKAM` varchar(5) DEFAULT NULL,
  `LETAK_MAKAM` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `ID_PETUGAS` varchar(5) NOT NULL,
  `ID_TPU` varchar(5) DEFAULT NULL,
  `NAMA_PETUGAS` varchar(50) DEFAULT NULL,
  `ALAMAT_` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`ID_PETUGAS`, `ID_TPU`, `NAMA_PETUGAS`, `ALAMAT_`, `NO_TELP`) VALUES
('1', '1', 'Aviv', 'Wisper', '08123141'),
('2', '1', 'rusdiawan', 'sdasadasdasd', '0127317231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ahli_waris`
--
ALTER TABLE `data_ahli_waris`
  ADD PRIMARY KEY (`ID_AHLI_WARIS`),
  ADD UNIQUE KEY `DATA_AHLI_WARIS_PK` (`ID_AHLI_WARIS`),
  ADD KEY `MEMILIKI2_FK` (`ID_JENAZAH`),
  ADD KEY `MEMPUNYAI_FK` (`ID_TPU`);

--
-- Indexes for table `data_jenazah`
--
ALTER TABLE `data_jenazah`
  ADD PRIMARY KEY (`ID_JENAZAH`),
  ADD UNIQUE KEY `DATA_JENAZAH_PK` (`ID_JENAZAH`),
  ADD KEY `MEMILIKI_FK` (`ID_AHLI_WARIS`);

--
-- Indexes for table `data_lokasi_tpu`
--
ALTER TABLE `data_lokasi_tpu`
  ADD PRIMARY KEY (`ID_TPU`),
  ADD UNIQUE KEY `DATA_LOKASI_TPU_PK` (`ID_TPU`);

--
-- Indexes for table `data_makam`
--
ALTER TABLE `data_makam`
  ADD PRIMARY KEY (`ID_MAKAM`),
  ADD UNIQUE KEY `DATA_MAKAM_PK` (`ID_MAKAM`),
  ADD KEY `MEMILIKI___FK` (`ID_TPU`);

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`),
  ADD UNIQUE KEY `DATA_PETUGAS_PK` (`ID_PETUGAS`),
  ADD KEY `MENGAKSES_FK` (`ID_TPU`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_ahli_waris`
--
ALTER TABLE `data_ahli_waris`
  ADD CONSTRAINT `FK_DATA_AHL_MEMILIKI2_DATA_JEN` FOREIGN KEY (`ID_JENAZAH`) REFERENCES `data_jenazah` (`ID_JENAZAH`),
  ADD CONSTRAINT `FK_DATA_AHL_MEMPUNYAI_DATA_LOK` FOREIGN KEY (`ID_TPU`) REFERENCES `data_lokasi_tpu` (`ID_TPU`);

--
-- Constraints for table `data_jenazah`
--
ALTER TABLE `data_jenazah`
  ADD CONSTRAINT `FK_DATA_JEN_MEMILIKI_DATA_AHL` FOREIGN KEY (`ID_AHLI_WARIS`) REFERENCES `data_ahli_waris` (`ID_AHLI_WARIS`);

--
-- Constraints for table `data_makam`
--
ALTER TABLE `data_makam`
  ADD CONSTRAINT `FK_DATA_MAK_MEMILIKI__DATA_LOK` FOREIGN KEY (`ID_TPU`) REFERENCES `data_lokasi_tpu` (`ID_TPU`);

--
-- Constraints for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD CONSTRAINT `FK_DATA_PET_MENGAKSES_DATA_LOK` FOREIGN KEY (`ID_TPU`) REFERENCES `data_lokasi_tpu` (`ID_TPU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
