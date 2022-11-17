-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2021 at 11:57 PM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `matched`
--

DROP TABLE IF EXISTS `matched`;
CREATE TABLE IF NOT EXISTS `matched` (
  `MatchedID` int(30) NOT NULL AUTO_INCREMENT,
  `requestor` varchar(50) NOT NULL,
  `requestee` varchar(50) NOT NULL,
  `Status` enum('yes','no') NOT NULL,
  PRIMARY KEY (`MatchedID`),
  KEY `requestor` (`requestor`),
  KEY `requestee` (`requestee`)
) ENGINE=InnoDB AUTO_INCREMENT=12346 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `userType` enum('ValidUser') NOT NULL DEFAULT 'ValidUser',
  `phash` varchar(260) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `Age` int(3) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `workout_level` varchar(50) DEFAULT NULL,
  `workout_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `userType`, `phash`, `fname`, `lname`, `Age`, `Gender`, `email`, `phone`, `City`, `workout_level`, `workout_time`) VALUES
('tester', 'ValidUser', '$2y$10$.KBwbMYmtrWoaZSQRIt69uo.xNENXtj9cxeD9IGTh42raZ1v6MYiO', 'Travis', 'Smith', 20, 'Male', 'travis.smith.4@minotstateu.edu', '406-740-0391', 'Minot', 'EXTREME GYM shark', 'Early Morning');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matched`
--
ALTER TABLE `matched`
  ADD CONSTRAINT `fk_RequesteeUsername` FOREIGN KEY (`requestee`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `fk_RequestorUsername` FOREIGN KEY (`requestor`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
