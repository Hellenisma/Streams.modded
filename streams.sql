-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2014 at 01:47 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `streams`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `game` varchar(150) NOT NULL DEFAULT '-',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `status`, `game`, `update_time`) VALUES
(1, 'pundurs', 0, ' ', '2014-09-16 22:24:00'),
(2, 'vitoventura', 0, ' ', '2014-09-16 22:24:00'),
(3, 'lv_jj', 0, ' ', '2014-09-16 22:26:13'),
(4, 'lvgee', 0, ' ', '2014-04-04 08:40:54'),
(5, 'andrinja', 0, ' ', '2014-09-16 22:26:13'),
(6, 'mentalais', 0, ' ', '2014-04-25 08:50:01'),
(7, 'nevardplays', 0, ' ', '2014-04-17 06:35:01'),
(11, 'putra3214', 0, ' ', '2014-04-13 03:55:01'),
(12, 'skurstenis', 0, ' ', '2014-05-14 08:10:01'),
(13, 'Hellenisma', 0, ' ', '2014-09-16 22:08:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
