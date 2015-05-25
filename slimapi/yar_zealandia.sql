-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 02:57 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yar_zealandia`
--

-- --------------------------------------------------------

--
-- Table structure for table `listview`
--

CREATE TABLE IF NOT EXISTS `listview` (
  `list_id` int(50) NOT NULL AUTO_INCREMENT,
  `list_cat` varchar(10) NOT NULL,
  `list_name` varchar(15) NOT NULL,
  `list_type` varchar(20) NOT NULL,
  `list_img` varchar(50) NOT NULL,
  `list_sound` varchar(50) NOT NULL,
  `list_desc` mediumtext NOT NULL,
  `list_points` int(3) NOT NULL DEFAULT '0',
  `list_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `listview`
--

INSERT INTO `listview` (`list_id`, `list_cat`, `list_name`, `list_type`, `list_img`, `list_sound`, `list_desc`, `list_points`, `list_active`) VALUES
(1, 'birds', 'tui', 'Critical', 'ruru.jpg', 'tui.mp3', 'my tui has been updated Tested', 40, 1),
(2, 'birds', 'tuiTest7', 'Endangered', 'ruru.jpg', 'tui.mp3', 'my tui', 50, 0),
(3, 'birds', 'tui2', 'Vulnerable', 'ruru.jpg', 'tui.mp3', 'my tui', 150, 1),
(4, 'birds', 'kaka', 'Declining', 'kaka.jpg', 'tui.mp3', 'Test kaka', 200, 0),
(5, 'plants', 'watercress', 'Recovering', 'ruru.jpg', 'tui.mp3', 'Testing the plants JSON', 200, 1),
(6, 'insects', 'Spider', 'Relict', 'ruru.jpg', 'tui.mp3', 'Spider had been added', 200, 0),
(7, 'birds', 'test', 'Uncommon', 'kaka.jpg', 'tui.mp3', 'asldfasdf', 10, 1),
(8, 'others', 'Leopard', '0', 'kaka.jpg', 'tui.mp3', 'Leopard is my favourite animal', 1000, 0),
(10, 'other', 'Yosemite', '0', 'kaka.jpg', 'tui.mp3', 'This is the latest version of Mac Os X', 2000, 0),
(11, 'other', 'Lion', '0', 'kaka.jpg', 'tui.mp3', 'On Lion os which is 10,8 u can still install Xcode5 not 6 but u can still code', 3000, 0),
(12, 'insects', 'Marvick', 'Endangered', 'kaka.jpg', 'tui.mp3', 'test', 4000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(12) NOT NULL,
  `school_name` varchar(20) NOT NULL,
  `cellnumber` int(10) NOT NULL,
  `type_admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `user_name`, `pass_word`, `school_name`, `cellnumber`, `type_admin`) VALUES
(1, 'yar', '123', 'Zealandia', 0, 1),
(3, 'leon', '123', 'Zealandia', 0, 1),
(4, 'zealandia', '123', 'zealandia', 0, 1),
(7, 'Luke', '123', 'Tawa Collage', 800, 0),
(9, 'Brenda', '123', 'Whitireia', 123, 0),
(10, 'George', '123', 'Whitireia', 0, 0),
(11, 'Maen', '123', 'test1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `schools_id` int(12) NOT NULL AUTO_INCREMENT,
  `schools_name` varchar(50) NOT NULL,
  PRIMARY KEY (`schools_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schools_id`, `schools_name`) VALUES
(1, 'Ngati Toa'),
(2, 'Tawa Collage'),
(3, 'Zealandia');

-- --------------------------------------------------------

--
-- Table structure for table `school_activity`
--

CREATE TABLE IF NOT EXISTS `school_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `clicked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `school_activity`
--

INSERT INTO `school_activity` (`id`, `user_id`, `list_id`, `clicked`) VALUES
(1, 0, 0, 0),
(13, 1, 5, 11),
(14, 1, 6, 6),
(15, 1, 4, 7),
(16, 1, 7, 3),
(17, 1, 5, 11),
(18, 1, 6, 6),
(19, 1, 4, 7),
(20, 1, 7, 3),
(21, 1, 3, 1),
(22, 3, 10, 2),
(23, 3, 2, 1),
(24, 4, 10, 1),
(25, 4, 2, 1),
(26, 4, 1, 1),
(27, 4, 10, 1),
(28, 4, 1, 1),
(29, 4, 2, 1),
(30, 3, 10, 1),
(31, 3, 8, 1),
(32, 3, 6, 1),
(33, 3, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
