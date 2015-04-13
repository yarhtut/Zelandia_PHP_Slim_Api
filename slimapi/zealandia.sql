-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2015 at 03:17 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zealandia`
--

-- --------------------------------------------------------

--
-- Table structure for table `listview`
--

CREATE TABLE IF NOT EXISTS `listview` (
  `list_id` int(50) NOT NULL AUTO_INCREMENT,
  `list_cat` varchar(10) NOT NULL,
  `list_name` varchar(15) NOT NULL,
  `list_img` varchar(50) NOT NULL,
  `list_sound` varchar(50) NOT NULL,
  `list_desc` mediumtext NOT NULL,
  `list_points` int(3) NOT NULL DEFAULT '0',
  `list_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `listview`
--

INSERT INTO `listview` (`list_id`, `list_cat`, `list_name`, `list_img`, `list_sound`, `list_desc`, `list_points`, `list_active`) VALUES
(1, 'bird', 'tui', 'ruru.jpg', 'tui.mp3', 'my tui has been updated', 30, 0),
(2, 'bird', 'tui1', 'ruru.jpg', 'tui.mp3', 'my tui', 50, 0),
(3, 'bird', 'tui2', 'ruru.jpg', 'tui.mp3', 'my tui', 150, 0),
(4, 'bird', 'kaka', 'kaka.jpg', 'tui.mp3', 'Test kaka', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(12) NOT NULL,
  `cellnumber` int(10) NOT NULL,
  `type_admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_name`, `pass_word`, `cellnumber`, `type_admin`) VALUES
(1, 'yar', '123', 0, 1),
(3, 'leon', '123', 0, 1),
(4, 'zealandia', '123', 0, 1),
(7, 'Gwen', '123', 800, 0),
(8, 'Jesse', '123', 111, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
