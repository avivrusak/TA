-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2018 at 02:29 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

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
-- Table structure for table `data_agama`
--

CREATE TABLE `data_agama` (
  `ID_AGAMA` int(8) NOT NULL,
  `jenis_agama` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_agama`
--

INSERT INTO `data_agama` (`ID_AGAMA`, `jenis_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `data_ahli_waris`
--

CREATE TABLE `data_ahli_waris` (
  `ID_AHLI_WARIS` int(5) NOT NULL,
  `ID_JENAZAH` int(50) DEFAULT NULL,
  `nama_ahli_waris` varchar(50) DEFAULT NULL,
  `NIK_w` int(10) NOT NULL,
  `alamat_w` varchar(50) DEFAULT NULL,
  `tempat_lahir_w` varchar(10) NOT NULL,
  `tanggal_lahir_w` date NOT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `jenis_kelamin_w` varchar(10) DEFAULT NULL,
  `tanggal_sewa` date DEFAULT NULL,
  `habis_sewa` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ahli_waris`
--

INSERT INTO `data_ahli_waris` (`ID_AHLI_WARIS`, `ID_JENAZAH`, `nama_ahli_waris`, `NIK_w`, `alamat_w`, `tempat_lahir_w`, `tanggal_lahir_w`, `no_telp`, `jenis_kelamin_w`, `tanggal_sewa`, `habis_sewa`) VALUES
(1, 3, 'naryo', 0, 'Demakindah', 'Surabaya', '2018-07-02', '123213', 'qwe', '2018-07-01', '2018-07-03'),
(2, 1, 'Kosem', 0, 'Lebakjaya', 'Surabaya', '2018-07-01', '123', 'wq', '2018-07-03', '2018-07-03'),
(3, 10, 'rusdiawan', 0, 'Surabaya', 'Surabaya', '2018-02-14', '081231241', 'laki-laki', '2018-07-18', NULL),
(4, 11, 'Suprapto', 0, 'Dukuh kupang', 'Bojonegoro', '1993-08-10', '0822341452', 'laki-laki', '2018-07-24', NULL),
(5, 12, 'Luka Modric', 0, 'Mulyosari no 3', 'Surabaya', '1990-07-20', '08824152782', 'laki-laki', '2018-07-25', NULL),
(6, 14, 'Kartinah', 2147483647, 'Tenggumung Wetan 3/32 A', 'Surabaya', '1987-11-09', '081344252312', 'perempuan', '2018-08-04', NULL),
(7, 15, 'Ani Sumiati', 2147483647, 'Njagir Wonokromo', 'Surabaya', '1967-12-04', '08223141212', 'perempuan', '2018-08-05', NULL),
(8, 16, 'Dito Nanda Putra', 251248417, 'Peneleh 2 no 56 ', 'Lamongan', '1954-04-23', '0822351233', 'laki-laki', '2018-08-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_jenazah`
--

CREATE TABLE `data_jenazah` (
  `ID_JENAZAH` int(50) NOT NULL,
  `ID_MAKAM` int(8) DEFAULT NULL,
  `ID_TPU` int(8) NOT NULL,
  `nama_jenazah` varchar(50) DEFAULT NULL,
  `NIK` int(10) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tgl_pemakaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jenazah`
--

INSERT INTO `data_jenazah` (`ID_JENAZAH`, `ID_MAKAM`, `ID_TPU`, `nama_jenazah`, `NIK`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `tgl_pemakaman`) VALUES
(1, 1, 8, 'Cipto', 0, 'Demakindah', 'Surabaya', '2018-07-01', 'laki-laki', '2018-07-04'),
(3, 2, 8, 'Ipul', 0, 'Lebakjaya', 'Surabaya', '2018-07-01', 'laki-laki', '2018-07-04'),
(9, 3, 2, 'kato', 0, 'sukolilo', 'Surabaya', '2018-05-24', 'laki-laki', '2018-07-18'),
(10, 4, 1, 'kato', 0, 'sukolilo', 'Surabaya', '2018-05-24', 'laki-laki', '2018-07-18'),
(11, 5, 3, 'Suryanto', 0, 'Dukuh kupang', 'Surabaya', '1995-07-11', 'laki-laki', '2018-07-24'),
(12, 6, 8, 'ferdy sianiga', 0, 'Mulyosari no 3 ', 'Surabaya', '1992-04-16', 'laki-laki', '2018-07-25'),
(14, 9, 8, 'Slamet', 2147483647, 'Tenggumung Wetan 3/32 A', 'Surabaya', '1987-07-21', 'laki-laki', '2018-08-04'),
(15, 10, 8, 'Solikin', 2147483647, 'Semut Baru 14 A -TR', 'Jombang', '1946-07-11', 'laki-laki', '2018-08-05'),
(16, NULL, 8, 'Atim Prianto', 1224152773, 'Kapasari Pendukuhan Bey 54', 'Surabaya', '1973-02-02', 'laki-laki', '2018-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `data_komplek`
--

CREATE TABLE `data_komplek` (
  `ID_KOMPLEK` int(8) NOT NULL,
  `ID_TPU` int(8) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `nama_komplek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_komplek`
--

INSERT INTO `data_komplek` (`ID_KOMPLEK`, `ID_TPU`, `agama`, `nama_komplek`) VALUES
(1, 8, 'Islam', 'kaskdas'),
(2, 8, 'Islam', 'UMUM'),
(3, 8, 'Kristen', 'Kristern'),
(4, 8, 'Islam', 'Harsono Fatmawati'),
(5, 8, 'Islam', 'Semedie');

-- --------------------------------------------------------

--
-- Table structure for table `data_lokasi_tpu`
--

CREATE TABLE `data_lokasi_tpu` (
  `ID_TPU` int(5) NOT NULL,
  `nama_lokasi` varchar(50) DEFAULT NULL,
  `alamat_lokasi` text,
  `jumlah_makam` int(11) DEFAULT NULL,
  `luas_lahan` int(11) DEFAULT NULL,
  `harga_sewa` int(11) DEFAULT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lokasi_tpu`
--

INSERT INTO `data_lokasi_tpu` (`ID_TPU`, `nama_lokasi`, `alamat_lokasi`, `jumlah_makam`, `luas_lahan`, `harga_sewa`, `latitude`, `longitude`) VALUES
(1, 'MK Peneleh', 'Jl. Makam Peneleh No.35A, RT.006/RW.04, Peneleh, Genteng, Kota SBY, Jawa Timur 60274', 57, 45000, 1200000, -7.252824, 112.740685),
(2, 'MI Ngagel Rejo', 'Jl. Bung Tomo No.9, Ngagelrejo, Wonokromo, Kota SBY, Jawa Timur 60245', 18804, 60000, 780000, -7.291353, 112.749054),
(3, 'MI Tembok Gede', 'Jl. Tembok Dukuh, Tembok Dukuh, Bubutan, Tembok Dukuh, Surabaya, Kota SBY, Jawa Timur 60173', 52329, 140000, 800000, -7.252910, 112.727318),
(4, 'MK Kembang Kuning ', 'Jl. Kembang Kuning, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256', 47575, 367000, 670000, -7.283085, 112.726555),
(5, 'MI Kalianak', 'Jl. Demak No.380, Morokrembangan, Krembangan, Kota SBY, Jawa Timur 60178\n', 22400, 70000, 710000, -7.233343, 112.722130),
(6, 'MI Karang Tembok', 'Jl. Karang Tembok, Pegirian, Semampir, Kota SBY, Jawa Timur 60136', 27200, 85000, 810000, -7.227350, 112.749222),
(7, 'TPU Putat Gede', 'Jl. Raya Darmo Baru Barat, Putat Gede, Suko Manunggal, Kota SBY, Jawa Timur 60189', 44800, 140000, 845000, -7.285018, 112.701645),
(8, 'TPU Kapas Krampung', 'Jl. Kapas Krampung No.115, Ploso, Tambaksari, Kota SBY, Jawa Timur 60135', 28800, 90000, 200000, -7.249541, 112.760117),
(9, 'MT Simo Kwagean', 'Jl. Simo Kwagen, Banyu Urip, Kec. Sawahan, Kota SBY, Jawa Timur 60254', 44800, 140000, 640000, -7.271122, 112.716431),
(10, 'MI Asem Jajar', 'Jl. Kali Butuh No.158, Tembok Dukuh, Bubutan, Kota SBY, Jawa Timur 60252', 8960, 28000, 810000, -7.250959, 112.716194),
(12, 'TPU Keputih', 'Jl. Keputih Tegal, Medokan Semampir, Sukolilo, Kota SBY, Jawa Timur 60119', 103360, 323000, 920000, -7.303670, 112.801201),
(13, 'TPU Babat Jerawat ', 'Jl. Raya Sememi No.9, Babat Jerawat, Pakal, Kota SBY, Jawa Timur 60198', 29843, 93260, 825000, -7.245194, 112.633179);

-- --------------------------------------------------------

--
-- Table structure for table `data_makam`
--

CREATE TABLE `data_makam` (
  `ID_MAKAM` int(8) NOT NULL,
  `ID_KOMPLEK` int(8) DEFAULT NULL,
  `NO_MAKAM` varchar(100) DEFAULT NULL,
  `LETAK_MAKAM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_makam`
--

INSERT INTO `data_makam` (`ID_MAKAM`, `ID_KOMPLEK`, `NO_MAKAM`, `LETAK_MAKAM`) VALUES
(1, 1, '0909', 'mana yahhh'),
(2, 1, '09090', 'aldasljda'),
(3, 1, 'rtyry', 'kkjhlkh'),
(4, 1, 'd4wr', '954fg'),
(5, 1, 'A1', 'Blok A nomer 1 '),
(6, 1, 'A2', 'Blok A nomer 1'),
(7, 1, '1413', 'adsa'),
(8, 1, 'A1', 'Blok A nomer 1 '),
(9, 2, '15751', 'F'),
(10, 4, '15752', 'C II'),
(11, 2, '15753', 'C II'),
(12, 2, '15754', 'C'),
(13, 2, '15755', 'F'),
(14, 2, '15756', 'C II'),
(15, 2, '15757', 'C II'),
(16, 2, '15758', 'C'),
(17, 2, '15759', 'E'),
(18, 2, '15760', 'C II'),
(19, 2, '15761', 'C II'),
(20, 2, '15762', 'C II'),
(21, 2, '15763', 'C II'),
(22, 2, '15764', 'C II'),
(23, 2, '15765', 'C II'),
(24, 2, '15766', 'C II'),
(25, 2, '15767', 'C '),
(26, 2, '15768', 'C II'),
(27, 2, '15769', 'C I'),
(28, 2, '15770', 'C II'),
(29, 2, '15771', 'C II'),
(30, 2, '15772', 'F'),
(31, 2, '15773', 'C II'),
(32, 2, '15774', 'F'),
(33, 2, '15775', 'C I'),
(34, 2, '15776', 'C I'),
(35, 2, '15777', 'C I'),
(36, 2, '15778', 'A'),
(37, 2, '15779', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `ID_PETUGAS` int(5) NOT NULL,
  `ID_TPU` int(5) DEFAULT NULL,
  `NAMA_PETUGAS` varchar(50) DEFAULT NULL,
  `ALAMAT_` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(12) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `rule` int(11) NOT NULL COMMENT '1 = admin ; 2 = petugas',
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`ID_PETUGAS`, `ID_TPU`, `NAMA_PETUGAS`, `ALAMAT_`, `NO_TELP`, `password`, `rule`, `username`) VALUES
(1, 1, 'Aviv', 'Wisper', '08123141', '12345', 1, 'aviv'),
(2, 3, 'Akbar', 'Wisma permai jaya', '081333454155', '12345', 2, 'tmbk'),
(3, 1, 'Nawiwo', 'jl. raya peneleh no 21', '59326452', '12345', 2, 'mkpeneleh'),
(4, 2, '999', '999', '99', '12345', 2, 'wewe'),
(5, 6, 'Sukarjo', 'Jl. Tembok baru no 31 ', '0315932887', '12345', 2, 'tmbkkarang'),
(6, 12, 'Navas', 'Kejawan putih no 5', '087862537231', '12345', 2, 'mkkeputih'),
(7, 8, 'Agus Wahyudi', 'Sidotopo gang 2 ', '081345252312', '12345', 2, 'mkkrampung');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `accessToken` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`) VALUES
(1, 'aviv', 'aviv', 'mursit-12345', 'mumu2937412912zzzz', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_agama`
--
ALTER TABLE `data_agama`
  ADD PRIMARY KEY (`ID_AGAMA`);

--
-- Indexes for table `data_ahli_waris`
--
ALTER TABLE `data_ahli_waris`
  ADD PRIMARY KEY (`ID_AHLI_WARIS`),
  ADD UNIQUE KEY `DATA_AHLI_WARIS_PK` (`ID_AHLI_WARIS`),
  ADD KEY `MEMILIKI2_FK` (`ID_JENAZAH`);

--
-- Indexes for table `data_jenazah`
--
ALTER TABLE `data_jenazah`
  ADD PRIMARY KEY (`ID_JENAZAH`),
  ADD UNIQUE KEY `DATA_JENAZAH_PK` (`ID_JENAZAH`),
  ADD KEY `ID_MAKAM` (`ID_MAKAM`),
  ADD KEY `ID_TPU` (`ID_TPU`);

--
-- Indexes for table `data_komplek`
--
ALTER TABLE `data_komplek`
  ADD PRIMARY KEY (`ID_KOMPLEK`),
  ADD KEY `ID_AGAMA` (`agama`),
  ADD KEY `ID_TPU` (`ID_TPU`);

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
  ADD KEY `ID_KOMPLEK` (`ID_KOMPLEK`);

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`),
  ADD UNIQUE KEY `DATA_PETUGAS_PK` (`ID_PETUGAS`),
  ADD KEY `MENGAKSES_FK` (`ID_TPU`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ahli_waris`
--
ALTER TABLE `data_ahli_waris`
  MODIFY `ID_AHLI_WARIS` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_jenazah`
--
ALTER TABLE `data_jenazah`
  MODIFY `ID_JENAZAH` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `data_komplek`
--
ALTER TABLE `data_komplek`
  MODIFY `ID_KOMPLEK` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `data_lokasi_tpu`
--
ALTER TABLE `data_lokasi_tpu`
  MODIFY `ID_TPU` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `data_makam`
--
ALTER TABLE `data_makam`
  MODIFY `ID_MAKAM` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `data_petugas`
--
ALTER TABLE `data_petugas`
  MODIFY `ID_PETUGAS` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_ahli_waris`
--
ALTER TABLE `data_ahli_waris`
  ADD CONSTRAINT `data_ahli_waris_ibfk_1` FOREIGN KEY (`ID_JENAZAH`) REFERENCES `data_jenazah` (`ID_JENAZAH`);

--
-- Constraints for table `data_jenazah`
--
ALTER TABLE `data_jenazah`
  ADD CONSTRAINT `data_jenazah_ibfk_1` FOREIGN KEY (`ID_MAKAM`) REFERENCES `data_makam` (`ID_MAKAM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_jenazah_ibfk_2` FOREIGN KEY (`ID_TPU`) REFERENCES `data_lokasi_tpu` (`ID_TPU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_komplek`
--
ALTER TABLE `data_komplek`
  ADD CONSTRAINT `data_komplek_ibfk_2` FOREIGN KEY (`ID_TPU`) REFERENCES `data_lokasi_tpu` (`ID_TPU`);

--
-- Constraints for table `data_makam`
--
ALTER TABLE `data_makam`
  ADD CONSTRAINT `data_makam_ibfk_1` FOREIGN KEY (`ID_KOMPLEK`) REFERENCES `data_komplek` (`ID_KOMPLEK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD CONSTRAINT `data_petugas_ibfk_1` FOREIGN KEY (`ID_TPU`) REFERENCES `data_lokasi_tpu` (`ID_TPU`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
