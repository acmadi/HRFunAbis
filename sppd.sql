-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2013 at 06:41 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr2fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `sppd_form`
--

CREATE TABLE IF NOT EXISTS `sppd_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) COLLATE latin1_bin NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  `service_provider` varchar(20) COLLATE latin1_bin NOT NULL,
  `unit` varchar(20) COLLATE latin1_bin NOT NULL,
  `class` char(1) COLLATE latin1_bin NOT NULL,
  `destination` varchar(100) COLLATE latin1_bin NOT NULL,
  `purpose` text COLLATE latin1_bin NOT NULL,
  `departure` date NOT NULL,
  `arrival` date NOT NULL,
  `transport_type` varchar(10) COLLATE latin1_bin NOT NULL,
  `transport_vehicle` varchar(15) COLLATE latin1_bin NOT NULL,
  `sppd_type` varchar(10) COLLATE latin1_bin NOT NULL,
  `statement_letter` varchar(200) COLLATE latin1_bin DEFAULT NULL,
  `support_letter` varchar(200) COLLATE latin1_bin DEFAULT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_form_persekot`
--

CREATE TABLE IF NOT EXISTS `sppd_form_persekot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_id` int(11) NOT NULL,
  `paid_to` varchar(50) COLLATE latin1_bin NOT NULL,
  `received_from` varchar(50) COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_in_words` text COLLATE latin1_bin NOT NULL,
  `check_giro_date` date NOT NULL,
  `check_giro_number` varchar(20) COLLATE latin1_bin NOT NULL,
  `currency_code` char(3) COLLATE latin1_bin NOT NULL,
  `bank_code` char(3) COLLATE latin1_bin NOT NULL,
  `journal_number` varchar(20) COLLATE latin1_bin NOT NULL,
  `voucher_number` varchar(20) COLLATE latin1_bin NOT NULL,
  `voucher_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_letter_cost`
--

CREATE TABLE IF NOT EXISTS `sppd_letter_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airport_tax_cost` int(11) NOT NULL,
  `airport_tax_quantity` int(11) NOT NULL,
  `laundry_cost` int(11) NOT NULL,
  `laundry_quantity` int(11) NOT NULL,
  `airline_cost` int(11) NOT NULL,
  `airline_quantity` int(11) NOT NULL,
  `hotel_cost` int(11) NOT NULL,
  `hotel_quantity` int(11) NOT NULL,
  `transportation_cost` int(11) NOT NULL,
  `transportation_quantity` int(11) NOT NULL,
  `from_to_cost` int(11) NOT NULL,
  `from_to_quantity` int(11) NOT NULL,
  `lumpsum_cost` int(11) NOT NULL,
  `lumpsum_quantity` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_master_cost`
--

CREATE TABLE IF NOT EXISTS `sppd_master_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` char(1) COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(100) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_master_destination`
--

CREATE TABLE IF NOT EXISTS `sppd_master_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_other_reimburse`
--

CREATE TABLE IF NOT EXISTS `sppd_other_reimburse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cc` varchar(50) COLLATE latin1_bin NOT NULL,
  `elbi` varchar(20) COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_persekot_detail`
--

CREATE TABLE IF NOT EXISTS `sppd_persekot_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_code` char(6) COLLATE latin1_bin NOT NULL,
  `description` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_personnel`
--

CREATE TABLE IF NOT EXISTS `sppd_personnel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sppd_id` int(11) NOT NULL,
  `employee_id` varchar(50) COLLATE latin1_bin NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_rab_dinas`
--

CREATE TABLE IF NOT EXISTS `sppd_rab_dinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE latin1_bin NOT NULL,
  `sppd_id` int(11) NOT NULL,
  `cost_description` text COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_rab_nondinas`
--

CREATE TABLE IF NOT EXISTS `sppd_rab_nondinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `explanation` text COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `additional_description` text COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_reimburse_bbm`
--

CREATE TABLE IF NOT EXISTS `sppd_reimburse_bbm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `transaction_description` text COLLATE latin1_bin NOT NULL,
  `amount` int(11) NOT NULL,
  `cc` varchar(50) COLLATE latin1_bin NOT NULL,
  `usage_type` varchar(20) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sppd_reimburse_jamuan`
--

CREATE TABLE IF NOT EXISTS `sppd_reimburse_jamuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `transaction_description` date NOT NULL,
  `amount` int(11) NOT NULL,
  `cc` varchar(50) COLLATE latin1_bin NOT NULL,
  `usage_type` varchar(50) COLLATE latin1_bin NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
