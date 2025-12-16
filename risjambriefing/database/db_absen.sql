-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 02:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `id` int(11) NOT NULL,
  `id_rapat` int(11) DEFAULT NULL,
  `poin_penting` text DEFAULT NULL,
  `keputusan` text DEFAULT NULL,
  `tindakan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notulen`
--

INSERT INTO `notulen` (`id`, `id_rapat`, `poin_penting`, `keputusan`, `tindakan`) VALUES
(7, 5, 'Rapat ', 'Setuju', 'Evaluasi');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanda_tangan` varchar(255) NOT NULL,
  `waktu_hadir` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_rapat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `divisi`, `jenis_kelamin`, `tanda_tangan`, `waktu_hadir`, `id_rapat`) VALUES
(1, 'Muhammad Fauzan', 'Sekretaris 1', 'Laki-laki', 'signatures/67def721709d5.png', '2025-03-22 17:45:05', NULL),
(21, 'Muhammad Fauzan', 'Seretaris ', 'Laki-laki', 'signatures/69415a2a925b4.png', '2025-12-16 13:10:02', 5),
(22, 'Aji', 'Ketua ', 'Laki-laki', 'signatures/69415bab30ecd.png', '2025-12-16 13:16:27', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `id` int(11) NOT NULL,
  `nama_rapat` varchar(255) NOT NULL,
  `tanggal_rapat` date NOT NULL,
  `jam_rapat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id`, `nama_rapat`, `tanggal_rapat`, `jam_rapat`) VALUES
(1, 'Rapat Perdana TIM', '2025-03-23', '01:18:00'),
(4, 'Absen Pengajian', '2025-12-25', '20:47:00'),
(5, 'Rapat Kerja ', '2025-12-26', '20:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rapat` (`id_rapat`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rapat` (`id_rapat`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notulen`
--
ALTER TABLE `notulen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rapat`
--
ALTER TABLE `rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notulen`
--
ALTER TABLE `notulen`
  ADD CONSTRAINT `notulen_ibfk_1` FOREIGN KEY (`id_rapat`) REFERENCES `rapat` (`id`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_rapat`) REFERENCES `rapat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
