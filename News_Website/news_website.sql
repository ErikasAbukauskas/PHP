-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2022 at 09:14 AM
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
-- Database: `news_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  `category_date` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`, `category_date`) VALUES
(24, 'Keliones', '2022-07-07 17:49:21'),
(20, 'Technologijos', '2022-07-07 16:22:24'),
(19, 'Mokslas', '2022-07-07 16:22:15'),
(21, 'Sveikas gyvenimo budas', '2022-07-07 16:22:47'),
(22, 'Sportas', '2022-07-07 16:23:15'),
(23, 'Naujienos', '2022-07-07 16:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `comment_date` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `email`, `comment`, `comment_date`) VALUES
(89, 'aaaa@gmail.com', 'aaaa', '2022-07-07 17:47:59'),
(90, 'erwerwer@gmail.com', 'sssss', '2022-07-07 18:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `product_description` longtext COLLATE utf8_lithuanian_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_image1` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  `product_date` varchar(255) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_category_id`, `product_image1`, `product_date`) VALUES
(28, 'Sportas', 'SportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportasSportas', 19, 'image_4.jpg', '2022-07-08 12:12:40'),
(21, 'Mokslas', 'MokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslasMokslas', 19, 'image_1.jpg', '2022-07-07 16:24:08'),
(22, 'Mokslas1', 'Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1Mokslas1', 19, 'image_1.jpg', '2022-07-07 16:29:41'),
(23, 'Technologijos', 'TechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijosTechnologijos', 20, 'image_1111.jpg', '2022-07-07 16:30:11'),
(24, 'Keliones', 'KelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKelionesKeliones', 24, 'bg_4.jpg', '2022-07-07 16:30:32'),
(25, 'Keliones1', 'Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1Keliones1', 24, 'author.jpg', '2022-07-07 16:30:53'),
(26, 'Keliones2', 'Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2Keliones2', 24, 'image_6.jpg', '2022-07-07 16:31:16'),
(27, 'Keliones3', 'Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3Keliones3', 24, 'sunset.jpg', '2022-07-07 16:31:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
