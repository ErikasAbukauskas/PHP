-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 18, 2022 at 10:27 PM
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
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8_lithuanian_ci NOT NULL,
  `siuntejas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `gavejas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `poke`
--

INSERT INTO `poke` (`ID`, `data`, `siuntejas`, `gavejas`) VALUES
(55, '2022-02-16', 'cozmo cozmo', 'admin admin'),
(54, '2022-02-16', 'cozmo cozmo', 'Moderator Moderator'),
(53, '2022-02-16', 'cozmo cozmo', 'cozmo cozmo'),
(52, '2022-02-16', 'cozmo cozmo', 'Jon Jon'),
(51, '2022-02-16', 'cozmo cozmo', 'admin admin'),
(50, '2022-02-16', 'cozmo cozmo', 'Moderator Moderator'),
(49, '2022-02-16', 'cozmo cozmo', 'cozmo cozmo'),
(48, '2022-02-16', 'cozmo cozmo', 'Jon Jon'),
(47, '2022-02-16', 'cozmo cozmo', 'admin admin'),
(46, '2022-02-16', 'cozmo cozmo', 'Moderator Moderator'),
(45, '2022-02-16', 'cozmo cozmo', 'cozmo cozmo'),
(44, '2022-02-16', 'cozmo cozmo', 'Jon Jon'),
(43, '2022-02-16', 'cozmo cozmo', 'admin admin'),
(42, '2022-02-16', 'cozmo cozmo', 'Moderator Moderator'),
(41, '2022-02-16', 'cozmo cozmo', 'cozmo cozmo'),
(56, '2022-02-16', 'cozmo cozmo', 'Jon Jon');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ID`, `prisijungimo_vardas`, `vardas`, `pavarde`, `el_pastas`, `slaptazodis`) VALUES
(14, 'cozmo', 'cozmo', 'cozmo', 'admcozmoin@gmail.com', 'A1'),
(13, 'Moderator', 'Moderator', 'Moderator', 'admModeratorin@gmail.com', 'A1'),
(10, 'admin', 'admin', 'admin', 'adminadmin@gmail.com', 'A1'),
(12, 'Jon', 'Jon', 'Jon', 'adJonmin@gmail.com', 'A1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
