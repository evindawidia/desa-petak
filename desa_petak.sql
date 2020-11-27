-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 02:24 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_petak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `password`, `email`, `date_created`) VALUES
(1, 'Evinda Widia', 'evinda01', 'evindawidiacahyaningrum@gmail.com', '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `balasan`
--

CREATE TABLE `balasan` (
  `id_balasan` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_created` date NOT NULL,
  `pengaduan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `content_berita` text NOT NULL,
  `date_created` date NOT NULL,
  `url_segment` varchar(255) NOT NULL,
  `kat_berita_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `comment` text NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `berita_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kat_berita`
--

CREATE TABLE `kat_berita` (
  `id_kat_berita` int(11) NOT NULL,
  `kat_berita` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_berita`
--

INSERT INTO `kat_berita` (`id_kat_berita`, `kat_berita`, `date_created`) VALUES
(1, 'berita', '2020-11-20'),
(2, 'event', '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `kat_sarana`
--

CREATE TABLE `kat_sarana` (
  `id_kat_sarana` int(11) NOT NULL,
  `kat_sarana` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_sarana`
--

INSERT INTO `kat_sarana` (`id_kat_sarana`, `kat_sarana`, `date_created`) VALUES
(1, 'Aset Prasarana Umum', '2020-11-20'),
(2, 'Aset Prasarana Pendidikan', '2020-11-20'),
(3, 'Aset Prasarana Kesehatan', '2020-11-20'),
(4, 'Aset Prasarana Ekonomi', '2020-11-20'),
(5, 'Kelompok Usaha Ekonomi Produktif', '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `kat_sdm`
--

CREATE TABLE `kat_sdm` (
  `id_kat_sdm` int(11) NOT NULL,
  `kat_sdm` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_sdm`
--

INSERT INTO `kat_sdm` (`id_kat_sdm`, `kat_sdm`, `date_created`) VALUES
(1, 'Penduduk dan Keluarga', '2020-11-20'),
(2, 'Mata Pencaharian Utama Penduduk', '2020-11-20'),
(3, 'Tenaga Kerja Latar Belakang Pendidikan', '2020-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `uraian_organisasi` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id_organisasi`, `uraian_organisasi`, `volume`, `satuan_id`, `date_created`) VALUES
(1, 'BPD', 7, 4, '2020-11-21'),
(2, 'LPMD', 9, 4, '2020-11-21'),
(3, 'PKK', 83, 4, '2020-11-21'),
(4, 'KPMD', 2, 4, '2020-11-21'),
(5, 'BUMDES', 5, 4, '2020-11-21'),
(6, 'KARTAR', 370, 4, '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `sender_name`, `nik`, `comment`, `address`, `date_created`) VALUES
(1, 'Utami Dewi', '3991110000', 'Masalah air sering mati', 'Rt 06 Rw 02 Dusun Mojoroto', '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `sarana`
--

CREATE TABLE `sarana` (
  `id_sarana` int(11) NOT NULL,
  `uraian_sarana` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  `kat_sarana_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarana`
--

INSERT INTO `sarana` (`id_sarana`, `uraian_sarana`, `volume`, `satuan_id`, `date_created`, `kat_sarana_id`) VALUES
(1, 'Jalan', 30000, 2, '2020-11-21', 1),
(2, 'Jembatan', 4, 5, '2020-11-21', 1),
(3, 'Gedung PAUD', 2, 5, '2020-11-21', 2),
(4, 'Gedung TK', 2, 5, '2020-11-21', 2),
(5, 'Gedung SD', 2, 5, '2020-11-21', 2),
(6, 'Taman Pendidikan Al-Qur\'an', 5, 5, '2020-11-21', 2),
(7, 'Posyandu', 5, 5, '2020-11-21', 3),
(8, 'Polindes', 1, 5, '2020-11-21', 3),
(9, 'MCK', 5, 5, '2020-11-21', 3),
(10, 'Sarana Air Bersih', 5, 5, '2020-11-21', 3),
(11, 'Pasar Desa / Rakyat', 1, 5, '2020-11-21', 4),
(12, 'Kelompok Usaha', 1, 6, '2020-11-21', 5),
(13, 'Kelompok Usaha Sehat', 1, 6, '2020-11-21', 5);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `jenis_satuan` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `jenis_satuan`, `date_created`) VALUES
(1, 'ha', '2020-11-21'),
(2, 'm', '2020-11-21'),
(3, 'kg', '2020-11-21'),
(4, 'orang', '2020-11-21'),
(5, 'gedung', '2020-11-21'),
(6, 'kelompok', '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `sda`
--

CREATE TABLE `sda` (
  `id_sda` int(11) NOT NULL,
  `uraian_sda` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sda`
--

INSERT INTO `sda` (`id_sda`, `uraian_sda`, `volume`, `satuan_id`, `date_created`) VALUES
(1, 'Lahan Persawahan', 200, 1, '2020-11-21'),
(2, 'Sumber Air', 1, 5, '2020-11-21'),
(3, 'Lahan Tegalan', 5910, 1, '2020-11-21'),
(4, 'Sungai', 6000, 2, '2020-11-21'),
(5, 'Tanaman Pertanian dan Perkebunan', 6000, 3, '2020-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `sdm`
--

CREATE TABLE `sdm` (
  `id_sdm` int(11) NOT NULL,
  `uraian_sdm` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  `kat_sdm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdm`
--

INSERT INTO `sdm` (`id_sdm`, `uraian_sdm`, `volume`, `satuan_id`, `date_created`, `kat_sdm_id`) VALUES
(1, 'Laki-Laki', 1846, 4, '2020-11-21', 1),
(2, 'Perempuan', 1892, 4, '2020-11-21', 1),
(3, 'Pertanian & Peternakan', 795, 4, '2020-11-21', 2),
(4, 'Perdagangan Besar/Eceran dan Rumah Makan', 147, 4, '2020-11-21', 2),
(5, 'Angkutan, Pergudangan, Komunikasi', 5, 4, '2020-11-21', 2),
(6, 'Jasa', 2, 4, '2020-11-21', 2),
(7, 'Lainnya (konstruksi, perbankan, dll)', 15, 4, '2020-11-21', 2),
(8, 'Lulusan S-1 Keatas', 34, 4, '2020-11-21', 3),
(9, 'Lulusan D1, D2, D3', 26, 4, '2020-11-21', 3),
(10, 'Lulusan SLTA', 202, 4, '2020-11-21', 3),
(11, 'Lulusan SMP', 344, 4, '2020-11-21', 3),
(12, 'Lulusan SD', 1986, 4, '2020-11-21', 3),
(13, 'Tidak Tamat SD/ Tidak Sekolah', 241, 4, '2020-11-21', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sosbud`
--

CREATE TABLE `sosbud` (
  `id_sosbud` int(11) NOT NULL,
  `uraian_sosbud` varchar(255) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sosbud`
--

INSERT INTO `sosbud` (`id_sosbud`, `uraian_sosbud`, `volume`, `satuan_id`, `date_created`) VALUES
(1, 'Budaya Gotong-Royong', 5, 6, '2020-11-21'),
(2, 'Seni', 2, 6, '2020-11-21'),
(3, 'Kelompok Musik', 3, 6, '2020-11-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `balasan`
--
ALTER TABLE `balasan`
  ADD PRIMARY KEY (`id_balasan`),
  ADD KEY `balasan_ibfk_1` (`pengaduan_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `kat_berita_id` (`kat_berita_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indexes for table `kat_berita`
--
ALTER TABLE `kat_berita`
  ADD PRIMARY KEY (`id_kat_berita`);

--
-- Indexes for table `kat_sarana`
--
ALTER TABLE `kat_sarana`
  ADD PRIMARY KEY (`id_kat_sarana`);

--
-- Indexes for table `kat_sdm`
--
ALTER TABLE `kat_sdm`
  ADD PRIMARY KEY (`id_kat_sdm`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`id_sarana`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kat_sarana_id` (`kat_sarana_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `sda`
--
ALTER TABLE `sda`
  ADD PRIMARY KEY (`id_sda`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `sdm`
--
ALTER TABLE `sdm`
  ADD PRIMARY KEY (`id_sdm`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kat_sdm_id` (`kat_sdm_id`);

--
-- Indexes for table `sosbud`
--
ALTER TABLE `sosbud`
  ADD PRIMARY KEY (`id_sosbud`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balasan`
--
ALTER TABLE `balasan`
  MODIFY `id_balasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kat_berita`
--
ALTER TABLE `kat_berita`
  MODIFY `id_kat_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kat_sarana`
--
ALTER TABLE `kat_sarana`
  MODIFY `id_kat_sarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kat_sdm`
--
ALTER TABLE `kat_sdm`
  MODIFY `id_kat_sdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id_sarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sda`
--
ALTER TABLE `sda`
  MODIFY `id_sda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sdm`
--
ALTER TABLE `sdm`
  MODIFY `id_sdm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sosbud`
--
ALTER TABLE `sosbud`
  MODIFY `id_sosbud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balasan`
--
ALTER TABLE `balasan`
  ADD CONSTRAINT `balasan_ibfk_1` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id_pengaduan`) ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kat_berita_id`) REFERENCES `kat_berita` (`id_kat_berita`) ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id_berita`) ON UPDATE CASCADE;

--
-- Constraints for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD CONSTRAINT `organisasi_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE;

--
-- Constraints for table `sarana`
--
ALTER TABLE `sarana`
  ADD CONSTRAINT `sarana_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sarana_ibfk_2` FOREIGN KEY (`kat_sarana_id`) REFERENCES `kat_sarana` (`id_kat_sarana`) ON UPDATE CASCADE;

--
-- Constraints for table `sda`
--
ALTER TABLE `sda`
  ADD CONSTRAINT `sda_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE;

--
-- Constraints for table `sdm`
--
ALTER TABLE `sdm`
  ADD CONSTRAINT `sdm_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sdm_ibfk_2` FOREIGN KEY (`kat_sdm_id`) REFERENCES `kat_sdm` (`id_kat_sdm`) ON UPDATE CASCADE;

--
-- Constraints for table `sosbud`
--
ALTER TABLE `sosbud`
  ADD CONSTRAINT `sosbud_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
