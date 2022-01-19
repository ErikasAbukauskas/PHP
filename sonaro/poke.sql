-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2022 at 02:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sonaro`
--

-- --------------------------------------------------------

--
-- Table structure for table `poke`
--

DROP TABLE IF EXISTS `poke`;
CREATE TABLE IF NOT EXISTS `poke` (
  `data` text COLLATE utf8_lithuanian_ci NOT NULL,
  `siuntejas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `gavejas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `poke`
--

INSERT INTO `poke` (`data`, `siuntejas`, `gavejas`) VALUES
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija'),
('2022-01-19', 'Erikas Abukauskas', 'Abudabis Latvija');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
