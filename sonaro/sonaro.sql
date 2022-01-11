-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2022 at 01:00 PM
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
  `siuntejas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `gavejas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `prisijungimo_vardas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `vardas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `pavarde` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `el_pastas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `slaptazodis` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `prisijungimo_vardas`, `vardas`, `pavarde`, `el_pastas`, `slaptazodis`) VALUES
(40, 'JAV', 'Abudabis', 'Latvija', 'asdassssdas@asdasdasdas.tom', 'A1'),
(41, 'Labas', 'asasa', 'asasas', 'asdasdas@asdasdasdas.tom', 'A1'),
(43, 'Cozmo', 'Erikas', 'Abukauskas', 'admin@gmail.com', 'A1'),
(42, 'Erelis', 'Borisas', 'Borisas', 'asasas@dfdf.lt', 'A1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
