-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2022 at 12:51 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_smpinh`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `foto_alumni` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `nis` int(50) NOT NULL,
  `nama_alumni` varchar(150) COLLATE utf8_swedish_ci NOT NULL,
  `tahun_lulus` varchar(4) COLLATE utf8_swedish_ci NOT NULL,
  `sekolah_lanjutan` enum('SMA','SMK','MA','MAK','PONDOK_PESANTREN') COLLATE utf8_swedish_ci NOT NULL,
  `nama_sekolah` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `jurusan_sekolah` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `alamat` text COLLATE utf8_swedish_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `email`, `foto_alumni`, `nis`, `nama_alumni`, `tahun_lulus`, `sekolah_lanjutan`, `nama_sekolah`, `jurusan_sekolah`, `alamat`, `telepon`) VALUES
(13, 'Test@gmail.com', 'gambar-1.jpg', 808877, 'Test', '2014', 'PONDOK_PESANTREN', 'Test', 'Test', 'Test', '788774'),
(20, 'TambahData@shubkhi.id', 'badminton-1.jpg', 7779, 'TambahData Test', '2015', 'MA', 'Test', 'Rekayasa Perangkat Lunak', 'Jl. Pondok Petir Sawangan Kota Depok', '08867836'),
(38, 'am@id.com', 'cross-sign.png', 866868, 'Ilham Shubkhi', '2020', 'SMK', 'SMK TM', 'RPL', 'Jl. KSj', '085656763'),
(39, 'no@gmail.com', 'abc.jpg', 77363, 'ilhammmmm', '2020', 'SMK', 'tm', 'rpl', 'pontir', '8557'),
(40, 'yes@gmail.com', 'def.jpg', 99769, 'shubkhii', '2024', 'SMA', 'sma11', 'ipa', 'pontir', '86665'),
(41, 'ko@gmail.com', 'ghi.jpeg', 77777, 'auahgelap', '2023', 'SMK', 'SMksd', 'ips', 'curug', '8997974'),
(42, 'su@gmail.com', 'ppp.png', 9999, 'udahan', '2021', 'SMA', 'kshf', 'mm', 'oajd', '97799'),
(43, 'hu@gmail.com', 'hdjd.jpg', 868, 'jahd', '2022', 'MAK', 'dkd', 'dd', 'ddd', '7585'),
(44, 'suii@gmail.com', 'iaud.jpg', 88868, 'khshfks', '2014', 'MA', 'khsff', 'sfkknsf', 'skfsf', '8877'),
(45, 'megachan@gmail.com', 'profil.jpeg', 7786387, 'Megachan', '2023', 'SMK', 'TM', 'RPL', 'Jl. in aja', '087657567638');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `foto_guru` varchar(200) COLLATE utf8_swedish_ci NOT NULL,
  `nig` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `nama_guru` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `gelar` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `mengajar_sejak` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8_swedish_ci NOT NULL,
  `telepon` varchar(30) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `foto_guru`, `nig`, `nama_guru`, `mapel`, `gelar`, `mengajar_sejak`, `tgl_lahir`, `alamat`, `telepon`) VALUES
(1, 'bu-yuni.jpg', '7897833', 'Bu', 'tik', 'S1', '2016', '2022-11-02', '1ada', '0866757736'),
(2, 'bu-tri.jpg', '7877877', 'Triwahyuni', 'PKn', 'S1', '2014', '2022-11-02', 'Jl. Reni Jaya', '087978773 (WA)');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(70) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `pesan` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `pesan`) VALUES
(2, 'ilhamm', 'ahd@shubkhi.id', 'Hi, NUDAY'),
(5, 'AUAHGELAP', 'AUAHGELAP@GELAP.CUY', 'BISMILLAH #NOBUG!!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `nama_user` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `foto`, `username`, `password`, `nama_user`, `telepon`) VALUES
(3, 'logo-smpinh.png', 'admin', '$2y$10$VTBpYSNoobFSEPpYd0C4v..MBBnmXDgCQOH3gPsg2e5XA35jn0ARi', 'Admin 1', '0812345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
