-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db729435483.db.1and1.com
-- Generation Time: May 30, 2018 at 07:17 PM
-- Server version: 5.5.60-0+deb7u1-log
-- PHP Version: 5.4.45-0+deb7u14

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
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `colour` varchar(7) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `company_id`, `user_id`, `colour`, `created_at`, `updated_at`) VALUES
(7, 1, 2, '#ff9900', 1527697985, 1527697985),
(8, 1, 6, '#0000ff', 1527698001, 1527698001),
(9, 6, 8, '#3d85c6', 1527698019, 1527698019);

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
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `therapist_id` (`therapist_id`),
  KEY `client_id` (`client_id`),
  KEY `therapy_price_id` (`therapy_price_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrator', '2', 1525542115),
('super', '1', 1525206388),
('therapist', '3', 1525790993);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrator', 1, 'test', NULL, NULL, 1525120712, 1527695712),
('client', 1, '', NULL, NULL, 1525120740, 1525206481),
('createAdministrator', 2, '', NULL, NULL, 1525807675, 1527695991),
('createAppointment', 2, '', NULL, NULL, 1525727079, 1525727079),
('createClient', 2, '', NULL, NULL, 1525727264, 1525727264),
('createCompany', 2, '', NULL, NULL, 1525727327, 1525727327),
('createLocation', 2, '', NULL, NULL, 1525727377, 1525727377),
('createRoom', 2, '', NULL, NULL, 1525727413, 1525727413),
('createRoomSupportsTherapy', 2, '', NULL, NULL, 1525727481, 1525727481),
('createTherapist', 2, '', NULL, NULL, 1525728910, 1525728910),
('createTherapistDoesTherapy', 2, '', NULL, NULL, 1525727675, 1525727675),
('createTherapy', 2, '', NULL, NULL, 1525727539, 1525727539),
('createTherapyPrice', 2, '', NULL, NULL, 1525727847, 1525727847),
('deleteAdministrator', 2, '', NULL, NULL, 1525807705, 1525807705),
('deleteAppointment', 2, '', NULL, NULL, 1525727127, 1525727127),
('deleteClient', 2, '', NULL, NULL, 1525727298, 1525727298),
('deleteCompany', 2, '', NULL, NULL, 1525727369, 1525727369),
('deleteLocation', 2, '', NULL, NULL, 1525727641, 1525727641),
('deleteRoom', 2, '', NULL, NULL, 1525727435, 1525727435),
('deleteRoomSupportsTherapy', 2, '', NULL, NULL, 1525727516, 1525727516),
('deleteTherapist', 2, '', NULL, NULL, 1525728932, 1525728932),
('deleteTherapistDoesTherapy', 2, '', NULL, NULL, 1525727705, 1525727705),
('deleteTherapy', 2, '', NULL, NULL, 1525727568, 1525727568),
('deleteTherapyPrice', 2, '', NULL, NULL, 1525727865, 1525727865),
('editAdministrator', 2, '', NULL, NULL, 1525807714, 1525807769),
('editAppointment', 2, '', NULL, NULL, 1525728516, 1525731660),
('editClient', 2, '', NULL, NULL, 1525728533, 1525728719),
('editCompany', 2, '', NULL, NULL, 1525728540, 1525728763),
('editLocation', 2, '', NULL, NULL, 1525728549, 1525728794),
('editRoom', 2, '', NULL, NULL, 1525728558, 1525728826),
('editRoomSupportsTherapy', 2, '', NULL, NULL, 1525728570, 1525728854),
('editTherapist', 2, '', NULL, NULL, 1525728581, 1525728971),
('editTherapistDoesTherapy', 2, '', NULL, NULL, 1525728598, 1525728999),
('editTherapy', 2, '', NULL, NULL, 1525728608, 1525729049),
('editTherapyPrice', 2, '', NULL, NULL, 1525728623, 1525729082),
('super', 1, '', NULL, NULL, 1525120471, 1525798071),
('therapist', 1, '', NULL, NULL, 1525120727, 1525120727),
('updateAdministrator', 2, '', NULL, NULL, 1525807695, 1525807695),
('updateAppointment', 2, '', NULL, NULL, 1525727117, 1525727117),
('updateClient', 2, '', NULL, NULL, 1525727285, 1525727285),
('updateCompany', 2, '', NULL, NULL, 1525727360, 1525727360),
('updateLocation', 2, '', NULL, NULL, 1525727632, 1525727632),
('updateRoom', 2, '', NULL, NULL, 1525727427, 1525727427),
('updateRoomSupportsTherapy', 2, '', NULL, NULL, 1525727507, 1525727507),
('updateTherapist', 2, '', NULL, NULL, 1525728924, 1525728924),
('updateTherapistDoesTherapy', 2, '', NULL, NULL, 1525727693, 1525727693),
('updateTherapy', 2, '', NULL, NULL, 1525727560, 1525727560),
('updateTherapyPrice', 2, '', NULL, NULL, 1525727859, 1525727859),
('viewAdministrator', 2, '', NULL, NULL, 1525807685, 1525807685),
('viewAppointment', 2, '', NULL, NULL, 1525727039, 1525727097),
('viewClient', 2, '', NULL, NULL, 1525727274, 1525727274),
('viewCompany', 2, '', NULL, NULL, 1525727335, 1525727335),
('viewLocation', 2, '', NULL, NULL, 1525727384, 1525727384),
('viewRoom', 2, '', NULL, NULL, 1525727420, 1525727420),
('viewRoomSupportsTherapy', 2, '', NULL, NULL, 1525727492, 1525727492),
('viewTherapist', 2, '', NULL, NULL, 1525728916, 1525728916),
('viewTherapistDoesTherapy', 2, '', NULL, NULL, 1525727685, 1525727685),
('viewTherapy', 2, '', NULL, NULL, 1525727551, 1525727551),
('viewTherapyPrice', 2, '', NULL, NULL, 1525727853, 1525727853);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('super', 'administrator'),
('editAdministrator', 'createAdministrator'),
('editAppointment', 'createAppointment'),
('editClient', 'createClient'),
('editCompany', 'createCompany'),
('editLocation', 'createLocation'),
('editRoom', 'createRoom'),
('editRoomSupportsTherapy', 'createRoomSupportsTherapy'),
('editTherapist', 'createTherapist'),
('editTherapistDoesTherapy', 'createTherapistDoesTherapy'),
('editTherapy', 'createTherapy'),
('editTherapyPrice', 'createTherapyPrice'),
('editAdministrator', 'deleteAdministrator'),
('editAppointment', 'deleteAppointment'),
('editClient', 'deleteClient'),
('editCompany', 'deleteCompany'),
('editLocation', 'deleteLocation'),
('editRoom', 'deleteRoom'),
('editRoomSupportsTherapy', 'deleteRoomSupportsTherapy'),
('editTherapist', 'deleteTherapist'),
('editTherapistDoesTherapy', 'deleteTherapistDoesTherapy'),
('editTherapy', 'deleteTherapy'),
('editTherapyPrice', 'deleteTherapyPrice'),
('administrator', 'editAdministrator'),
('administrator', 'editAppointment'),
('administrator', 'editClient'),
('super', 'editCompany'),
('administrator', 'editLocation'),
('administrator', 'editRoom'),
('administrator', 'editRoomSupportsTherapy'),
('administrator', 'editTherapist'),
('administrator', 'editTherapistDoesTherapy'),
('administrator', 'editTherapy'),
('administrator', 'editTherapyPrice'),
('editAdministrator', 'updateAdministrator'),
('editAppointment', 'updateAppointment'),
('editClient', 'updateClient'),
('editCompany', 'updateCompany'),
('editLocation', 'updateLocation'),
('editRoom', 'updateRoom'),
('editRoomSupportsTherapy', 'updateRoomSupportsTherapy'),
('editTherapist', 'updateTherapist'),
('editTherapistDoesTherapy', 'updateTherapistDoesTherapy'),
('editTherapy', 'updateTherapy'),
('editTherapyPrice', 'updateTherapyPrice'),
('editAdministrator', 'viewAdministrator'),
('editAppointment', 'viewAppointment'),
('editClient', 'viewClient'),
('editCompany', 'viewCompany'),
('editLocation', 'viewLocation'),
('editRoom', 'viewRoom'),
('editRoomSupportsTherapy', 'viewRoomSupportsTherapy'),
('editTherapist', 'viewTherapist'),
('editTherapistDoesTherapy', 'viewTherapistDoesTherapy'),
('editTherapy', 'viewTherapy'),
('editTherapyPrice', 'viewTherapyPrice');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address_line_1`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 'BTC', '101 Test Road', 'SW90210', 1524949499, 1527695411),
(4, 'Testco', '202 Avenue Lane Road', 'E90210', 1526133669, 1527695444),
(6, 'Newco', '303 The Street', 'N90210', 1527695464, 1527695464);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `postcode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `company_id`, `name`, `address_line_1`, `postcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'BTC Therapy Centre', '101 A Road', '90210', 1525797213, 1527698094),
(2, 6, 'Newco Head Office', '123 Road Street', '90210', 1526133720, 1527698129),
(3, 6, 'Newco Alt Location', '9178 The Avenue', '90210', 1526135714, 1527698342),
(4, 4, 'Healing Centre', '1203981203 Road Lane', '90210', 1527698289, 1527698327);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE latin1_general_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1521156914),
('m130524_201442_init', 1521156917),
('m140209_132017_init', 1524999119),
('m140403_174025_create_account_table', 1524999119),
('m140504_113157_update_tables', 1524999120),
('m140504_130429_create_token_table', 1524999120),
('m140506_102106_rbac_init', 1524993406),
('m140830_171933_fix_ip_field', 1524999120),
('m140830_172703_change_account_table_name', 1524999120),
('m141222_110026_update_ip_field', 1524999121),
('m141222_135246_alter_username_length', 1524999121),
('m150614_103145_update_social_account_table', 1524999121),
('m150623_212711_fix_username_notnull', 1524999121),
('m151218_234654_add_timezone_to_profile', 1524999121),
('m160929_103127_add_last_login_at_to_user_table', 1524999121),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1524993406);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'client_name', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `colour` varchar(7) COLLATE latin1_general_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `location_id`, `name`, `colour`, `created_at`, `updated_at`) VALUES
(1, 1, 'Main Room', '#e06666', 0, 1527697386),
(2, 1, 'Specialist Room A', '#f1c232', 0, 1527540420),
(3, 1, 'Specialist Room B', '#6aa84f', 0, 0),
(4, 2, 'Room A', '#ff0000', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `room_supports_therapy`
--

INSERT INTO `room_supports_therapy` (`id`, `room_id`, `therapy_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE IF NOT EXISTS `therapist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `colour` varchar(7) COLLATE latin1_general_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `therapist_therapy_price`
--

CREATE TABLE IF NOT EXISTS `therapist_therapy_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `therapist_id` int(11) NOT NULL,
  `therapy_price_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `therapist_id` (`therapist_id`),
  KEY `therapy_price_id` (`therapy_price_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `therapy`
--

CREATE TABLE IF NOT EXISTS `therapy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `needs_special_room` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `therapy`
--

INSERT INTO `therapy` (`id`, `company_id`, `name`, `needs_special_room`, `created_at`, `updated_at`) VALUES
(1, 1, 'Osteopathy', 1, 1527516208, 1527579656),
(2, 1, 'Life Coaching', 0, 1527687849, 1527695388);

-- --------------------------------------------------------

--
-- Table structure for table `therapy_price`
--

CREATE TABLE IF NOT EXISTS `therapy_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `therapy_id` int(11) NOT NULL,
  `minutes_duration` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `therapy_id` (`therapy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `therapy_price`
--

INSERT INTO `therapy_price` (`id`, `therapy_id`, `minutes_duration`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 30, '', '30.00', 0, 0),
(2, 1, 60, '', '61.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `first_name`, `last_name`) VALUES
(1, 'simon', 'chrts.offire+rooms_simon@gmail.com', '$2y$10$afu05QQqu8.e3p30oXsIKOnl8jcv1zAG9WzaMN8GXsB.Mty6uzn2S', '6dCXLjMZxgNFezxsI3zCF2-UKFHqrYHs', 1525206516, NULL, NULL, '2001:8b0:fb81:9331:4568:8298:d585:cc07', 1525001655, 1527696266, 0, 1527690437, 'Simon', 'Superuser'),
(2, 'mardi', 'chrts.offire+rooms_mardi@gmail.com', '$2y$10$q4uFZroTpuJOjblVKwZn/uAsbp.y0ZEjAOYQvXb5aO2gzbuxNKC9.', 'ifBSJhMLbIMguaAlIsEB4TzzFTs1l9fK', 1525002221, NULL, NULL, '2001:8b0:fb81:9331:4568:8298:d585:cc07', 1525002221, 1527696252, 0, 1527697378, 'Mardi', 'Adminuser'),
(3, 'therapistuser', 'chrts.offire+rooms_therapist@gmail.com', '$2y$10$10rKfAPElBYmeEI9PDSOh.1AZTawkn5jJDDYywE9p0VIAq9mysf9a', 'e19z1KCCRX4s3H--SqFdAhj94Qkx1UbS', 1525034518, NULL, NULL, '2001:8b0:fb81:9331:d982:c779:c132:b188', 1525034518, 1527696221, 0, 1527534700, 'Jane', 'Doe'),
(4, 'clientuser', 'chrts.offire+rooms_client@gmail.com', '$2y$10$Ply0NMocdpO5TMSYT8qZ6eWimFl2vttUNItssRXwQZkd9x4wGeJlm', 'SfCjEsVDt1syOKBjUbIw7YWIZkwsObG3', 1525120627, NULL, NULL, '2001:8b0:fb81:9331:1c2c:6756:be70:8e45', 1525120627, 1527695501, 0, 1527534714, 'Joe', 'Bloggs'),
(6, 'adminuser', 'chrts.offire+rooms_admin@gmail.com', '$2y$10$IByRuOTb2tuoOzNE20MHj.B98FaG2wgYR2vXlLmO7.iH6bwEBOtuG', 'wahKkbcCabzIALK4l67c-RSoix6wC2RI', 1527696362, NULL, NULL, '2001:8b0:fb81:9331:ad9c:eba2:65d9:7206', 1527696362, 1527696362, 0, NULL, 'John', 'Smith'),
(7, 'kieran', 'chrts.offire+rooms_kieran@gmail.com', '$2y$10$W2kyMV.l3INLasJFXZc31ewVUQR2N7A5g9AKzj6NuKcrbSiKSFcD6', 'AZK1TqMxqMouSzDiw1FCNJbQN7RpYPwn', 1527696582, NULL, NULL, '2001:8b0:fb81:9331:ad9c:eba2:65d9:7206', 1527696582, 1527696582, 0, NULL, 'Kieran', 'Superuser'),
(8, 'admin_newco', 'chrts.offire+rooms_admin_newco@gmail.com', '$2y$10$fRp.RpTx6X/9BTTEDN.84eyMpUBZteFruUNm7uCqNZ6PSrRobDFEG', 'dCNQVOl-7gWaehB6tdLM417_BfMsFVFY', 1527696745, NULL, NULL, '2001:8b0:fb81:9331:ad9c:eba2:65d9:7206', 1527696745, 1527696833, 0, NULL, 'Chadmin', 'Valley'),
(9, 'client_newco', 'chrts.offire+rooms_client_newco@gmail.com', '$2y$10$1BAL8/S0kFUHoFt6I1n85.CIV6zFhdAKfNS4d2nh9iarq2lSKXdli', '6qg5mkaLB-jme-67Iqx5HKDfLZd-IQ1H', 1527696908, NULL, NULL, '2001:8b0:fb81:9331:ad9c:eba2:65d9:7206', 1527696908, 1527696908, 0, NULL, 'Clint', 'Clienté'),
(10, 'therapist_newco', 'chrts.offire+rooms_therapist_newco@gmail.com', '$2y$10$RykCGTeY3RNd5d00cLOlCu1MAEQ9PmJBYwNSvCAftk7D63Fz58V76', 'hpxAEMK8uuWtM5MtIp1avMQK12oT__gV', 1527696964, NULL, NULL, '2001:8b0:fb81:9331:ad9c:eba2:65d9:7206', 1527696964, 1527697142, 0, NULL, 'Thierry', 'Piste');

-- --------------------------------------------------------

--
-- Table structure for table `user_bak`
--

CREATE TABLE IF NOT EXISTS `user_bak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `auth_key` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password_hash` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `first_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_bak`
--

INSERT INTO `user_bak` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'simon', '-ZYgi2IZglnC5gwsbpypcBJTXEZb9ULK', '$2y$13$UbKuU.Cxm2a09Wr00DvjV.yWf60nJI8bRxEmIyX8u1mYTvy1Xa4mS', NULL, 'simonjadams@gmail.com', 10, '', '', 1521160101, 1521160101);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `administrator_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`therapy_price_id`) REFERENCES `therapy_price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `therapist`
--
ALTER TABLE `therapist`
  ADD CONSTRAINT `therapist_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `therapist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `therapist_does_therapy`
--
ALTER TABLE `therapist_does_therapy`
  ADD CONSTRAINT `therapist_does_therapy_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `therapist_does_therapy_ibfk_2` FOREIGN KEY (`therapy_id`) REFERENCES `therapy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `therapist_therapy_price`
--
ALTER TABLE `therapist_therapy_price`
  ADD CONSTRAINT `therapist_therapy_price_ibfk_1` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `therapist_therapy_price_ibfk_2` FOREIGN KEY (`therapy_price_id`) REFERENCES `therapy_price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `therapy`
--
ALTER TABLE `therapy`
  ADD CONSTRAINT `therapy_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `therapy_price`
--
ALTER TABLE `therapy_price`
  ADD CONSTRAINT `therapy_price_ibfk_1` FOREIGN KEY (`therapy_id`) REFERENCES `therapy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
