-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2023 at 09:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(5, '2022-11-13-122827', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1693035420, 1),
(6, '2023-05-18-034450', 'App\\Database\\Migrations\\Peserta', 'default', 'App', 1693035422, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(100) UNSIGNED NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$12$6iOQHBqv.SkFSgbNg2V1geGgAdse4Z0gf75ZKJ2EY15tnXbW5HRPy', '2023-08-26 14:44:34', '2023-08-26 14:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(6) UNSIGNED NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `berat_badan` varchar(5) NOT NULL,
  `tinggi_badan` varchar(5) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `pilihan_pertama` varchar(50) NOT NULL,
  `pilihan_kedua` varchar(50) NOT NULL,
  `diterima` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `ktp_ibu` varchar(100) NOT NULL,
  `ktp_bpk` varchar(100) NOT NULL,
  `kk` varchar(100) NOT NULL,
  `akta_kelahiran` varchar(100) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `raport` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `nisn`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `alamat`, `asal_sekolah`, `berat_badan`, `tinggi_badan`, `desa`, `pilihan_pertama`, `pilihan_kedua`, `diterima`, `foto`, `ktp_ibu`, `ktp_bpk`, `kk`, `akta_kelahiran`, `ijazah`, `raport`, `status`, `created_at`, `updated_at`) VALUES
(1, '123456', 'tes edit lagi', 'l', 'Pandeglang', '2016-01-01', '088210830521', 'tes', 'tes', '12', '121', 'tes', 'Teknik Otomotif', 'Teknik Geologi Pertambangan', 'Teknik Otomotif', '1693035643_f20975a793916801b5c9.jpg', '1693035644_2c0125b55981ee1a9870.pdf', '1693035644_6d4214e41d1fd5786f5d.pdf', '1693035644_8cf37ac7751c76ab7b00.pdf', '1693035644_b2d27e5470872c8593bc.pdf', '1693035644_ce36fad7586957dff3fa.pdf', '1693035644_0665c84cf7b1cba9b0df.pdf', 3, '2023-08-26 02:40:44', '2023-08-27 02:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
