-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2024 at 01:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `matriks`
--

CREATE TABLE `matriks` (
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Primary Key',
  `mtk` double DEFAULT NULL,
  `fsk` double DEFAULT NULL,
  `bing` double DEFAULT NULL,
  `gajiortu` double DEFAULT NULL,
  `minat` double DEFAULT NULL,
  `fisik` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `matriks`
--

INSERT INTO `matriks` (`alt`, `mtk`, `fsk`, `bing`, `gajiortu`, `minat`, `fisik`) VALUES
('A1', 0.5, 0.75, 0.5, 0.75, 0.6, 0.5),
('A2', 0.75, 0.5, 0.5, 0.5, 0.6, 0.75),
('A3', 0.25, 0.5, 0.5, 1, 0.9, 0.25),
('A4', 0.5, 0.5, 1, 0.5, 0.3, 0.75),
('A5', 1, 0.75, 0.5, 0.5, 0.3, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `matriks_normalisasi`
--

CREATE TABLE `matriks_normalisasi` (
  `alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Primary Key',
  `mtk` double DEFAULT NULL,
  `fsk` double DEFAULT NULL,
  `bing` double DEFAULT NULL,
  `gajiortu` double DEFAULT NULL,
  `minat` double DEFAULT NULL,
  `fisik` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `alt` varchar(255) NOT NULL,
  `skor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matriks`
--
ALTER TABLE `matriks`
  ADD PRIMARY KEY (`alt`);

--
-- Indexes for table `matriks_normalisasi`
--
ALTER TABLE `matriks_normalisasi`
  ADD PRIMARY KEY (`alt`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`alt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
