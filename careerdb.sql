-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 12:41 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `careerdb`
--
CREATE DATABASE IF NOT EXISTS `careerdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `careerdb`;

-- --------------------------------------------------------

--
-- Table structure for table `advertice`
--

CREATE TABLE IF NOT EXISTS `advertice` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(10) unsigned DEFAULT NULL,
  `jop_name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `Category` varchar(120) CHARACTER SET utf8 NOT NULL,
  `education` varchar(100) CHARACTER SET utf8 NOT NULL,
  `degree` varchar(120) CHARACTER SET utf8 NOT NULL,
  `experince` varchar(120) CHARACTER SET utf8 NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `specification` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `addtime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ad_id`),
  KEY `id_idx` (`comp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `advertice`
--

INSERT INTO `advertice` (`ad_id`, `comp_id`, `jop_name`, `age`, `Category`, `education`, `degree`, `experince`, `salary`, `specification`, `addtime`) VALUES
(9, 1, '???? ????', 22, 'ART', 'UGRA', '?????', '5', 5555, '', '2014-01-03 01:58:25'),
(11, 1, 'Programmer', 22, 'ENG', 'Under Graduate', 'Excellent', '2', 2500, 'c++;c# ;java', '2014-01-03 14:12:37'),
(12, 1, 'Accounter', 25, 'Mgmnt', 'Under Graduate', 'Good', '4', 1200, '&#1576;&#1610;&#1593;&#1585;&#1601; &#1610;&#1593;&#1583; &#1602;&#1585;&#1608;&#1608;&#1588;', '2014-01-03 15:37:24'),
(13, 1, 'clean man', 10, 'DI', 'none', '-----', '0', 250, '&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;&#1607;', '2014-01-03 15:38:49'),
(14, 1, 'Paint man', 25, 'DI', 'Secondary', 'pass', '3', 2010, 'Knowledge Is Power', '2014-01-03 16:16:32'),
(16, 8, '????', 25, ' Artist', 'Secondary', 'Good', 'Profiessnal', 1500, '8->', '2014-01-03 17:10:38'),
(17, 9, '????', 14, '??????', '?????', '???', '?????', 2000, '??????????????', '2014-01-03 17:17:39'),
(18, 1, 'Teacher', 28, 'EDU', 'Under Graduate', 'Excellent', '2', 2111, '', '2014-01-03 17:19:57'),
(19, 1, 'moniter', 15, 'DI', 'Secondary', 'none', '0', 500, '', '2014-01-05 16:26:29'),
(20, 1, 'teacher', 25, 'EDU', 'Graduate', 'Excellence', '2', 1300, 'Hassan Bakri Hassan', '2014-01-15 21:10:44'),
(23, 1, '123', 20, 'ART', 'Under Graduate', '------', '2', 700, '0s0s0s0s0s0', '2014-01-15 21:15:06'),
(24, 1, 'xax', 15, 'ART', 'none', '-----', '1', 707, 'q', '2014-01-15 21:46:32'),
(25, 1, 'Fisher', 31, 'DI', 'none', '-', '4', 2000, 'dfgdsfg', '2014-01-15 22:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `app_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seeker_id` int(10) unsigned NOT NULL,
  `comp_id` int(10) unsigned NOT NULL,
  `jop_id` int(11) NOT NULL,
  `state` varchar(45) NOT NULL DEFAULT 'pending',
  `date` varchar(45) NOT NULL DEFAULT '-----------',
  `int_addres` varchar(500) NOT NULL DEFAULT '-----------',
  PRIMARY KEY (`app_id`),
  KEY `jop_idx_idx` (`jop_id`),
  KEY `comp_idx_idx` (`comp_id`),
  KEY `seeker_idx_idx` (`seeker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='application id' AUTO_INCREMENT=55 ;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`app_id`, `seeker_id`, `comp_id`, `jop_id`, `state`, `date`, `int_addres`) VALUES
(32, 14, 8, 16, 'pending', '-----------', '-----------'),
(33, 14, 1, 18, 'Rejected', 'Rejected', 'Rejected'),
(34, 14, 1, 19, 'Sucsess', '2014-01-14-01-00', '??????'),
(35, 14, 1, 14, 'Sucsess', '2014-01-16-01-00', 'khartoum'),
(46, 1, 1, 19, 'pending', '-----------', '-----------'),
(47, 1, 1, 18, 'pending', '-----------', '-----------'),
(48, 1, 9, 17, 'pending', '-----------', '-----------'),
(49, 1, 8, 16, 'pending', '-----------', '-----------'),
(50, 1, 1, 14, 'pending', '-----------', '-----------'),
(51, 1, 1, 19, 'pending', '-----------', '-----------'),
(53, 1, 1, 24, 'Sucsess', '2014-01-16   01:30', 'khartoum');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(120) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(120) CHARACTER SET utf8 NOT NULL,
  `specification` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`),
  UNIQUE KEY `email_3` (`email`),
  KEY `fk_comp_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `phone`, `email`, `specification`, `address`) VALUES
(9, '??????? ???????', '0924564566', 'a@b.c00', '???? ??????? ????? -_-', '????????? ?????? ?? ?????'),
(11, 'polo', '0912465005', 'amin@gmail.com', 'sell isber', 'sudan'),
(1, 'Zain Sudan', '0925829520', 'info@zainsd.com', 'sdsddsds', '5555'),
(8, 'sudani', '0120120000', 'sudani@sudatel.com', '54cdfd', 'scds52');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `experience_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `s_id` int(10) unsigned NOT NULL,
  `work_place` varchar(120) CHARACTER SET utf8 NOT NULL,
  `du` int(11) NOT NULL,
  `position` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`experience_id`),
  KEY `s_idx_idx` (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `s_id`, `work_place`, `du`, `position`) VALUES
(3, 12, 'ariport', 4, 'cleaner'),
(5, 13, 'ariport', 0, 'cleaner'),
(6, 13, 'POTIKE', 0, '?????'),
(7, 14, 'none', 4, 'a'),
(11, 1, 'putt', 100, 'axax'),
(14, 1, 'ass', 123, 'asd'),
(16, 1, 'ass', 123, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `seekerlogin`
--

CREATE TABLE IF NOT EXISTS `seekerlogin` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(120) CHARACTER SET utf8 NOT NULL,
  `password` varchar(120) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `seekerlogin`
--

INSERT INTO `seekerlogin` (`user_id`, `user_email`, `password`) VALUES
(1, 'hassanbakry@gmail.com', '123456789'),
(2, 'mo7md@hotmail.com', '0000'),
(3, 'mo7md1@hotmail.com', '12345'),
(4, 'mo7mdx1@hotmail.com', 'xxxx'),
(5, 'mo7madx1@hotmail.com', 'aaa'),
(6, 'mo7madx1@hot1mail.com', '789'),
(8, 'mo7mad0x1@hot1mail.com', '0000'),
(9, 'as@bd.com', '147852'),
(10, 'as@b0d.com', ''),
(12, 'ad@bdv.com', '123456'),
(13, 'ad@bdZv.com', 'pass'),
(14, 'ayman1793@hotmail.com', '12465005');

-- --------------------------------------------------------

--
-- Table structure for table `seekers`
--

CREATE TABLE IF NOT EXISTS `seekers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `birthdate` varchar(14) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 NOT NULL,
  `nationality` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(120) CHARACTER SET utf8 NOT NULL,
  `university` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `collage` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `spc` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `date` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `Language` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `computer` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `phone2` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(14) CHARACTER SET utf8 NOT NULL,
  `degree` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `seekers`
--

INSERT INTO `seekers` (`id`, `name`, `birthdate`, `gender`, `nationality`, `address`, `university`, `collage`, `spc`, `date`, `Language`, `computer`, `phone2`, `phone`, `degree`) VALUES
(13, 'aja0x', '2014-01-01', '', 'sd', 'plaplapla', 'sudan', 'math', '3weer', '2014-01-31', 'english', 'naroto', '0921212121', '0925874122', 'z-'),
(12, 'ASDASD11', '65145654', 'MALE', 'SD', 'RBFVDC\r\n8754', 'FDCDCX', 'DSXQ', 'DS', 'DFCX', NULL, NULL, NULL, '0923125469X', 'V+'),
(14, 'ayman', '13/2/1993', 'male', 'sd', 'sudan', 'sudan', 'computer', 'i am student', '10/10/2010', 'arabic', 'programmer', '', '0915006642', 'A+'),
(10, 'dfgdfd00', '74152963', 'male', 'sd', 'jiooijlkoijkml', 'liuknjkkio', 'oijklm', 'sjoilkm', '9521753', 'arabic', 'ghjkl', NULL, '123456789x', 'A+++'),
(1, 'hassan', '2014-01-01', 'male', 'sd', '615546566', 'sudan', 'computer scince', 'java c c++ qt php', '2014-01-01', '???? ????', 'Compact', '', '099999999', 'b+'),
(3, 'mo7md1', '1980-10-10', 'male', 'sd', 'dffdd', 'lfdskfd', 'lkmkmlk', 'klmlk', '2014-01-01', 'jhnm', 'kln', '0927539514', '', 'A+'),
(5, 'moh1d1b', '1985-10-30', 'male', 'sd', 'kh', 'sudan', 'busness', 'ghhghghghg', '2014-01-01', '208906230', NULL, NULL, '1230031231', NULL),
(2, 'mohd', '1958-10-30', 'male', 'sd', 'khartoum', 'sudan', 'busnise', 'ssdsdsds', '2014-01-01', 'arabic', 'dfmd', NULL, '0924567890', NULL),
(4, 'mohd1b', '1985-10-30', 'male', 'sd', 'kh', 'sudan', 'busness', 'ghhghghghg', '2014-01-01', '208956230', NULL, NULL, '1231231231', NULL),
(9, 'qq', '1478552', 'male', 'sd', '74185', '656652', 'ddd8', 'bgfd', 'bvgfc481', 'nbvcx', 'nbvc', NULL, '09278978899', 'A++'),
(6, 'XAX', '147852369', 'M', 'SD', 'SADFG', 'FCDF', 'XCXV', 'XVX', '741852639', '144SSS', '514S', '', '1111111110', 'X+'),
(8, 'xaxsw', '0000000000', 'male', 'sd', 'sdsd', 'dsdedf', 'bvcf', 'd', '025874112', 'ars', NULL, NULL, '9090909090', 'v');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_email` varchar(120) NOT NULL,
  `user_pass` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_email_3` (`user_email`),
  KEY `user_email_2` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `user_pass`) VALUES
(1, 'info@zainsd.com', '123456789'),
(8, 'sudani@sudatel.com', '456456456'),
(9, 'a@b.c00', 'Ø­Ø³Ø³Ù†'),
(11, 'amin@gmail.com', '12465005');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertice`
--
ALTER TABLE `advertice`
  ADD CONSTRAINT `id` FOREIGN KEY (`comp_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `comp_idx` FOREIGN KEY (`comp_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jop_idx` FOREIGN KEY (`jop_id`) REFERENCES `advertice` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seeker_idkf` FOREIGN KEY (`seeker_id`) REFERENCES `seekers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `s_idx` FOREIGN KEY (`s_id`) REFERENCES `seekerlogin` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seekers`
--
ALTER TABLE `seekers`
  ADD CONSTRAINT `seeker_id` FOREIGN KEY (`id`) REFERENCES `seekerlogin` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
