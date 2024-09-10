-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 06:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_jwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_mahasiswa`
--

CREATE TABLE `daftar_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `beasiswa` varchar(30) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_mahasiswa`
--

INSERT INTO `daftar_mahasiswa` (`id`, `nama`, `email`, `hp`, `semester`, `ipk`, `beasiswa`, `berkas`, `status`) VALUES
(30, 'Ramshal Hussein', 'ramshalhussein15@gmail.com', '081263796804', 5, 3.8, 'Akademik', 'Tanda Tangan.jpg', 'Belum Diverifikasi'),
(31, 'Suneo Honekawa', 'suneo@gmail.com', '08312347123', 2, 3.2, 'Non Akademik', 'Suneo_versi_2005.png', 'Belum Diverifikasi'),
(32, 'Shizuka Minamoto', 'shizuka@gmail.com', '0812312631', 4, 3.9, 'Akademik', '25e260f03592519dd684ca344f45c0f8.jpeg', 'Belum Diverifikasi'),
(33, 'Dico Jati', 'dico09@gmail.com', '0832132141', 5, 3.5, 'Akademik', 'location.png', 'Belum Diverifikasi'),
(34, 'Suneo Honekawa', 'suneo@gmail.com', '3127312632', 6, 3.2, 'Akademik', 'Suneo_versi_2005.png', 'Belum Diverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_mahasiswa`
--
ALTER TABLE `daftar_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_mahasiswa`
--
ALTER TABLE `daftar_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
