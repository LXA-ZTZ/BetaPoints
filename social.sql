-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2015 at 02:01 PM
-- Server version: 5.0.27-community-nt
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social`
--
CREATE DATABASE IF NOT EXISTS `social` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `social`;

-- --------------------------------------------------------

--
-- Table structure for table `evets`
--

CREATE TABLE IF NOT EXISTS `evets` (
  `EName` varchar(100) NOT NULL,
  `EType` int(11) NOT NULL,
  `EValue` int(11) NOT NULL,
  PRIMARY KEY  (`EName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evets`
--
--multiple = 0
--onetime = 1
--
INSERT INTO `evets` (`EName`, `EType`, `EValue`) VALUES
('Attend Bluegrass Conclave', 1, 100),
('Attend Lambda Chi Alpha Philanthropy', 1, 100),
('KD War of theWIngs', 1, 100),
('Phi Mu Philanthropy', 1, 100),
('Alpha Gam Philanthropy', 1, 100),
('Delta Gamma Philanthropy', 1, 100),
('Alpha Delta Phi Philanthropy', 0, 100),
('Pi Phi Philanthropy', 1, 100),
('Attend up til Dawn Finale', 1, 75),
('Attend Greek Sing', 1, 60),
('Brotherhood event', 0, 40),
('Officer position outside of Lambda Chi Alpha', 0, 15),
('Bring out a recruit', 0, 15),
('Service outside of Lambda Chi Alpha (per hour)', 0, 10),
('Attend intramural Game', 0, 10),
('Participate in an intramural Game', 0, 15),
('Participate in an RSO outside of Lambda Chi Alpha', 0, 10),
('Attend U of M athletic event', 0, 10),
('Brother of the Week', 1, 50),
('Rock for a Cure', 1, 75),
('Buying one flower', 1, 10),
('Buying two flowers', 1, 20),
('Buying three flowers', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL default '',
  `password` varchar(50) default NULL,
  `email` varchar(70) NOT NULL default '',
  `gender` varchar(10) default NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email`, `gender`) VALUES
('lahiru', '123', 'ekanayakelahiru@gmail.com', 'M'),
('jeewani', '555', 'lahiruadds@gmail.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `email` varchar(50) default NULL,
  `title` varchar(200) default NULL,
  `message` varchar(300) default NULL,
  `category` varchar(20) default NULL,
  `DandT` datetime default NULL,
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`email`, `title`, `message`, `category`, `DandT`) VALUES
('lahiruadds@gmail.com', 'HelpMe', 'Message new', 'Random', '2014-06-08 20:14:09'),
('ekanayakelahiru@gmail.com', 'Car Technology', 'Mind Blowing', 'Technology', '2014-06-08 05:06:13'),
('ekanayakelahiru@gmail.com', 'Car Technology', 'Mind Blowing', 'Technology', '2014-06-08 05:06:13'),
('ekanayakelahiru@gmail.com', 'Car Technology', 'Mind Blowing', 'Technology', '2014-06-08 05:06:13'),
('ekanayakelahiru@gmail.com', 'Car Technology', 'Mind Blowing', 'Technology', '2014-06-08 05:06:13'),
('ekanayakelahiru@gmail.com', 'Mafia', 'yeh finally won', 'Random', '2014-06-08 05:12:37'),
('ekanayakelahiru@gmail.com', 'computers', 'new 11pm', 'Technology', '2014-06-08 05:58:15'),
('ekanayakelahiru@gmail.com', 'computers', 'new 11pm', 'Technology', '2014-06-08 05:58:15'),
('ekanayakelahiru@gmail.com', 'computers', 'new 11pm', 'Technology', '2014-06-08 05:58:15'),
('ekanayakelahiru@gmail.com', 'computers', 'new 11pm', 'Technology', '2014-06-08 05:58:15'),
('ekanayakelahiru@gmail.com', '', '', 'Technology', '2014-06-09 01:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `userandevents`
--

CREATE TABLE IF NOT EXISTS `userandevents` (
  `zeta` int(11) NOT NULL,
  `eID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userandevents`
--

INSERT INTO `userandevents` (`zeta`, `eID`) VALUES
(123, 'testEvent1'),
(123, 'testEventX'),
(123, 'testEventX'),
(123, 'testEventX'),
(555, 'testEvent1'),
(555, 'testEventX');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `login` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
