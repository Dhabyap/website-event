-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2023 at 10:43 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stmik_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `created_at`, `updated_at`, `password`) VALUES
(33, 'dhaby', 'dhabyap@gmail.com', '2023-07-17 00:44:58', '2023-07-17 00:44:58', 'e10adc3949ba59abbe56e057f20f883e'),
(34, 'dimas', 'dimas@gmail.com', '2023-07-17 02:21:19', '2023-07-17 02:21:19', '3d186804534370c3c817db0563f0e461');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text,
  `lokasi` varchar(50) DEFAULT NULL,
  `dari_tanggal` date DEFAULT NULL,
  `sampai_tanggal` date DEFAULT NULL,
  `status` enum('AKTIF','TIDAK') NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama`, `deskripsi`, `lokasi`, `dari_tanggal`, `sampai_tanggal`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EVENT DI STMIK', 'yuhu meluncuur', 'BANDOENG', '2023-07-24', '2023-07-25', 'AKTIF', '2023-07-17 09:44:54', '2023-07-20 08:11:16'),
(3, 'Mantapuu', 'mantapuuu yuhu meluncuu', 'Cikarang', '2023-07-27', '2023-07-28', 'TIDAK', '2023-07-18 04:13:34', '2023-07-20 09:27:11'),
(4, 'JUDULL', 'mantapuuu yuhu meluncuu', NULL, '2023-07-24', '2023-07-25', 'AKTIF', '2023-07-18 04:13:43', '2023-07-18 04:13:43'),
(6, 'aaaa', 'mantapuuu yuhu meluncuu', 'Bandoeng', '2023-07-27', '2023-07-28', 'AKTIF', '2023-07-18 04:13:43', '2023-07-20 09:15:32'),
(8, 'mantapp', 'mantapuuu yuhu meluncuu', 'yuhuu', '2023-07-27', '2023-07-28', 'AKTIF', '2023-07-18 04:13:48', '2023-07-20 09:16:29'),
(13, 'ini judul event', 'Ini deskripsi', NULL, '2023-07-30', '2023-07-31', 'AKTIF', '2023-07-18 00:17:33', '2023-07-18 00:17:33'),
(17, 'Dabi', 'Ap', NULL, '2023-07-30', '2023-07-31', 'AKTIF', '2023-07-18 00:33:24', '2023-07-18 00:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int NOT NULL,
  `id_event` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `handphone` varchar(30) NOT NULL,
  `gender` enum('P','W') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `id_event`, `nama`, `email`, `handphone`, `gender`, `created_at`, `updated_at`) VALUES
(1, 1, 'dhaby', 'dhabyap@gmail.com', '012332112', 'P', '2023-07-20 07:50:57', '2023-07-20 07:50:57'),
(3, 3, 'aaa', 'admin@gmail.com', '31232312', 'W', '2023-07-20 09:08:15', '2023-07-20 09:08:15'),
(4, 1, 'dela', 'test@gmail.com', '32123', 'W', '2023-07-20 09:13:16', '2023-07-20 09:13:16'),
(5, 17, 'INI NAMA', 'yuhuu@gmail.com', '09282812', 'P', '2023-07-20 09:19:10', '2023-07-20 09:19:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
