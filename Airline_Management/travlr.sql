-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 06:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travlr`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE IF NOT EXISTS `airline` (
  `from_s` varchar(50) NOT NULL,
  `to_s` varchar(50) NOT NULL,
  `airline_name` varchar(50) NOT NULL,
  `duration` int(4) NOT NULL,
  `seats_left` int(3) NOT NULL,
  `airline_number` varchar(10) NOT NULL,
  `price` int(6) NOT NULL,
  `from_t` time NOT NULL,
  `to_t` time NOT NULL,
  PRIMARY KEY (`airline_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`from_s`, `to_s`, `airline_name`, `duration`, `seats_left`, `airline_number`, `price`, `from_t`, `to_t`) VALUES
('Delhi', 'Chennai', 'Air India', 150, 50, 'AI-439', 4500, '18:00:00', '20:30:00'),
('Delhi', 'Chennai', 'Indigo', 145, 100, 'IN-877', 6500, '15:30:00', '17:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `airline_days`
--

CREATE TABLE IF NOT EXISTS `airline_days` (
  `mon` int(11) NOT NULL,
  `tue` int(11) NOT NULL,
  `wed` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `fri` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `sun` int(11) NOT NULL,
  `airline_number` varchar(10) NOT NULL,
  PRIMARY KEY (`airline_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airline_days`
--

INSERT INTO `airline_days` (`mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`, `airline_number`) VALUES
(1, 0, 0, 1, 0, 1, 0, 'AI-439');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `hotel_name` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `hotel_code` int(5) NOT NULL,
  `star` int(1) NOT NULL,
  PRIMARY KEY (`hotel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_name`, `city`, `address`, `hotel_code`, `star`) VALUES
('Hotel Shivalik View', 'Agra', 'Near Durga Mandir,Agra,Uttar Pradesh', 12457, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE IF NOT EXISTS `hotel_room` (
  `hotel_code` int(11) NOT NULL,
  `deluxe` int(11) NOT NULL DEFAULT '-1',
  `super_deluxe` int(11) NOT NULL DEFAULT '-1',
  `suite` int(11) NOT NULL DEFAULT '-1',
  `deluxe_p` int(6) NOT NULL,
  `superdeluxe_p` int(6) NOT NULL,
  `suite_p` int(6) NOT NULL,
  PRIMARY KEY (`hotel_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_code`, `deluxe`, `super_deluxe`, `suite`, `deluxe_p`, `superdeluxe_p`, `suite_p`) VALUES
(12457, 7, 5, -1, 2500, 3500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `from_s` varchar(30) NOT NULL,
  `to_s` varchar(30) NOT NULL,
  `from_t` time NOT NULL,
  `to_t` time NOT NULL,
  `train_number` int(6) NOT NULL,
  `train_name` varchar(30) NOT NULL,
  `duration` int(4) NOT NULL,
  `seats_available` int(11) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`from_s`, `to_s`, `from_t`, `to_t`, `train_number`, `train_name`, `duration`, `seats_available`, `price`) VALUES
('Delhi', 'Agra', '16:30:00', '20:00:00', 45778, 'Agra Express', 210, 100, 550);

-- --------------------------------------------------------

--
-- Table structure for table `train_days`
--

CREATE TABLE IF NOT EXISTS `train_days` (
  `train_number` int(6) NOT NULL,
  `mon` int(11) NOT NULL DEFAULT '0',
  `tue` int(11) NOT NULL DEFAULT '0',
  `wed` int(11) NOT NULL DEFAULT '0',
  `thu` int(11) NOT NULL DEFAULT '0',
  `fri` int(11) NOT NULL DEFAULT '0',
  `sat` int(11) NOT NULL DEFAULT '0',
  `sun` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_days`
--

INSERT INTO `train_days` (`train_number`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `sun`) VALUES
(45778, 1, 1, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`) VALUES
('Abhishek Kumar Tiwari', 'aktiwari158@gmail.com', ''),
('Hello', 'hem@gmail.com', 'asd'),
('Abhishek Kumar Tiwari', 'aktiwar@gmail.com', 'abh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
