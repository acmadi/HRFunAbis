-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2013 at 05:35 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hr2fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `prj_document`
--

CREATE TABLE IF NOT EXISTS `prj_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `task_id` varchar(50) NOT NULL,
  `document_number` varchar(50) NOT NULL,
  `version` varchar(10) NOT NULL,
  `version_date` date NOT NULL,
  `owner` varchar(50) NOT NULL,
  `distribution` varchar(200) NOT NULL,
  `document_description` text NOT NULL,
  `file_attached` varchar(200) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_document`
--


-- --------------------------------------------------------

--
-- Table structure for table `prj_finance`
--

CREATE TABLE IF NOT EXISTS `prj_finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `elbi` varchar(20) NOT NULL,
  `elbi_desc` varchar(100) NOT NULL,
  `period_month` int(11) NOT NULL,
  `debit` decimal(11,2) NOT NULL,
  `credit` decimal(11,2) NOT NULL,
  `remarks` int(11) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_finance`
--


-- --------------------------------------------------------

--
-- Table structure for table `prj_personel`
--

CREATE TABLE IF NOT EXISTS `prj_personel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `position_task` text NOT NULL,
  `start_join` date NOT NULL,
  `end_join` date NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_personel`
--


-- --------------------------------------------------------

--
-- Table structure for table `prj_personel_mandays`
--

CREATE TABLE IF NOT EXISTS `prj_personel_mandays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) NOT NULL,
  `month` int(11) NOT NULL,
  `mandays` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_personel_mandays`
--


-- --------------------------------------------------------

--
-- Table structure for table `prj_procurement`
--

CREATE TABLE IF NOT EXISTS `prj_procurement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `contract` varchar(50) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `period_month` int(11) NOT NULL,
  `item` varchar(200) NOT NULL,
  `unit_price` decimal(11,2) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_procurement`
--


-- --------------------------------------------------------

--
-- Table structure for table `prj_progress`
--

CREATE TABLE IF NOT EXISTS `prj_progress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `period_date` date NOT NULL,
  `period_week` int(11) NOT NULL,
  `period_month` int(11) NOT NULL,
  `period_year` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `termin_pgn` text NOT NULL,
  `termin_vendor` text NOT NULL,
  `progress_actual` decimal(11,2) NOT NULL,
  `progress_plan` decimal(11,2) NOT NULL,
  `progress_this_week` text NOT NULL,
  `completed_work` text NOT NULL,
  `work_remaining` text NOT NULL,
  `reason_of_delay` text NOT NULL,
  `pic` varchar(50) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_progress`
--


-- --------------------------------------------------------

--
-- Table structure for table `prj_project`
--

CREATE TABLE IF NOT EXISTS `prj_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `version` varchar(20) NOT NULL,
  `version_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `status_date` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_end_date` date NOT NULL,
  `act_start_date` date NOT NULL,
  `act_end_date` date NOT NULL,
  `duration` smallint(6) NOT NULL,
  `spmk_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prj_project`
--

INSERT INTO `prj_project` (`id`, `number`, `name`, `owner`, `description`, `version`, `version_date`, `status`, `status_date`, `location`, `plan_start_date`, `plan_end_date`, `act_start_date`, `act_end_date`, `duration`, `spmk_date`, `amount`, `pic`, `created_by`, `created_date`) VALUES
(1, '01-01-01', 'project test', '', '0', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, '', NULL, NULL),
(2, '5656', 'Operasional Kantor Pusat', 'SBU 1', '0', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prj_task`
--

CREATE TABLE IF NOT EXISTS `prj_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_number` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `plan_start_date` date NOT NULL,
  `plan_end_date` date NOT NULL,
  `plan_progress` decimal(11,2) NOT NULL,
  `act_start_date` date NOT NULL,
  `act_end_date` date NOT NULL,
  `actual_progress` decimal(11,2) NOT NULL,
  `remarks` text NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prj_task`
--

