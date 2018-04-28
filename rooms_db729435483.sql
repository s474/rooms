-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db729435483.db.1and1.com
-- Generation Time: Apr 28, 2018 at 12:20 PM
-- Server version: 5.5.59-0+deb7u1-log
-- PHP Version: 5.4.45-0+deb7u13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db729435483`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `therapy_price_id` int(11) NOT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `minutes_duration` smallint(4) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `therapist_id` (`therapist_id`),
  KEY `client_id` (`client_id`),
  KEY `therapy_price_id` (`therapy_price_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `room_id`, `therapist_id`, `client_id`, `therapy_price_id`, `timestamp`, `minutes_duration`, `start`, `end`) VALUES
(59, 2, 3, 2, 40, NULL, 0, '2018-04-18 18:35:00', '2018-04-18 19:05:00'),
(60, 1, 1, 2, 36, NULL, 0, '2018-04-06 06:30:00', '2018-04-06 07:40:00'),
(61, 3, 3, 2, 40, NULL, 0, '2018-04-04 13:45:00', '2018-04-04 14:15:00'),
(62, 1, 1, 1, 36, NULL, 0, '2018-04-17 14:15:00', '2018-04-17 15:25:00'),
(63, 1, 1, 1, 42, NULL, 0, '2018-04-26 13:25:00', '2018-04-26 14:25:00'),
(64, 1, 1, 4, 36, NULL, 0, '2018-04-26 16:00:00', '2018-04-26 17:10:00'),
(65, 2, 1, 1, 42, NULL, 0, '2018-04-26 15:00:00', '2018-04-26 16:00:00'),
(66, 2, 1, 1, 42, NULL, 0, '2018-04-27 10:30:00', '2018-04-27 11:30:00'),
(67, 1, 1, 1, 42, NULL, 0, '2018-04-28 11:55:00', '2018-04-28 12:55:00'),
(68, 4, 1, 1, 42, NULL, 0, '2018-04-27 15:00:00', '2018-04-27 16:00:00'),
(69, 1, 2, 3, 41, NULL, 0, '2018-04-27 12:30:00', '2018-04-27 13:30:00'),
(70, 3, 3, 2, 39, NULL, 0, '2018-04-28 09:45:00', '2018-04-28 10:30:00'),
(71, 1, 1, 1, 36, NULL, 0, '2018-04-29 09:00:00', '2018-04-29 10:10:00'),
(72, 1, 1, 2, 37, NULL, 0, '2018-04-29 11:00:00', '2018-04-29 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`) VALUES
(1, 'Stacey'),
(2, 'Stewart'),
(3, 'Stella'),
(4, 'Ellie'),
(5, 'Fiona'),
(6, 'Fat Tony'),
(7, 'Thin Lee');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `address_line_1` varchar(256) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `postcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address_line_1`, `postcode`) VALUES
(1, 'Brixton Therapy Centre', '510 Brixton Road', 'SW9 8EN'),
(2, 'Somewhere Else', '101', '90210'),
(4, 'A Third Location', '102', '90210');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE latin1_general_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1521156914),
('m130524_201442_init', 1521156917);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `colour` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `location_id`, `name`, `colour`) VALUES
(1, 1, 'Main Room', '#e69138'),
(2, 1, 'Specialist Room One', '#6aa84f'),
(3, 1, 'Specialist Room Two', '#a64d79'),
(4, 2, 'Room Loc. 2', '#3d85c6');

-- --------------------------------------------------------

--
-- Table structure for table `room_supports_therapy`
--

CREATE TABLE IF NOT EXISTS `room_supports_therapy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `therapy_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `therapy_id` (`therapy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `room_supports_therapy`
--

INSERT INTO `room_supports_therapy` (`id`, `room_id`, `therapy_id`) VALUES
(9, 2, 4),
(10, 1, 4),
(11, 3, 4),
(14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE IF NOT EXISTS `therapist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`id`, `name`) VALUES
(1, 'Simon Adams'),
(2, 'Kieran Jamieson'),
(3, 'Hugh Franklin');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_does_therapy`
--

CREATE TABLE IF NOT EXISTS `therapist_does_therapy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `therapist_id` int(11) NOT NULL,
  `therapy_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `therapist_id` (`therapist_id`),
  KEY `therapy_id` (`therapy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `therapist_does_therapy`
--

INSERT INTO `therapist_does_therapy` (`id`, `therapist_id`, `therapy_id`) VALUES
(16, 1, 1),
(17, 3, 4),
(21, 1, 5),
(23, 3, 2),
(24, 1, 2),
(25, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `therapy`
--

CREATE TABLE IF NOT EXISTS `therapy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `needs_special_room` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `therapy`
--

INSERT INTO `therapy` (`id`, `name`, `needs_special_room`) VALUES
(1, 'Acupuncture', 1),
(2, 'Ayurveda', 0),
(3, 'Ayurvedic Hot Oil', 0),
(4, 'Bowen Technique', 1),
(5, 'Coaching', 0);

-- --------------------------------------------------------

--
-- Table structure for table `therapy_price`
--

CREATE TABLE IF NOT EXISTS `therapy_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `therapy_id` int(11) NOT NULL,
  `minutes_duration` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `therapy_id` (`therapy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `therapy_price`
--

INSERT INTO `therapy_price` (`id`, `therapy_id`, `minutes_duration`, `description`, `price`) VALUES
(36, 1, 70, 'Initial session', '70.00'),
(37, 1, 60, '', '60.00'),
(38, 2, 30, 'Initial session', '45.00'),
(39, 2, 45, '', '45.00'),
(40, 4, 30, '', '50.00'),
(41, 3, 60, '', '60.00'),
(42, 5, 60, '', '65.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'simon', '-ZYgi2IZglnC5gwsbpypcBJTXEZb9ULK', '$2y$13$UbKuU.Cxm2a09Wr00DvjV.yWf60nJI8bRxEmIyX8u1mYTvy1Xa4mS', NULL, 'simonjadams@gmail.com', 10, 1521160101, 1521160101);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`therapy_price_id`) REFERENCES `therapy_price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_supports_therapy`
--
ALTER TABLE `room_supports_therapy`
  ADD CONSTRAINT `room_supports_therapy_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_supports_therapy_ibfk_2` FOREIGN KEY (`therapy_id`) REFERENCES `therapy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `therapist_does_therapy`
--
ALTER TABLE `therapist_does_therapy`
  ADD CONSTRAINT `therapist_does_therapy_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `therapist_does_therapy_ibfk_2` FOREIGN KEY (`therapy_id`) REFERENCES `therapy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `therapy_price`
--
ALTER TABLE `therapy_price`
  ADD CONSTRAINT `therapy_price_ibfk_1` FOREIGN KEY (`therapy_id`) REFERENCES `therapy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
