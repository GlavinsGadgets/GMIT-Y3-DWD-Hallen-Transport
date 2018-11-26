-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 02:31 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hallen-delivery-sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL DEFAULT '20000',
  `customer_name` text NOT NULL,
  `customer_details` longtext,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_details`) VALUES
(1, 'Tony Soprano', 'New Jersey, USA'),
(2, 'Harry Giles', 'Clarenbridge, Galway'),
(3, 'Conor O Donoughe', 'Clarenbridge, Galway'),
(4, 'Marie Walsh', 'Drogheda, Louth'),
(5, 'Colm Meaney', 'Roscrea, Tipperary'),
(6, 'Aidan Quinn', 'Arklow, Wicklow'),
(10, 'Conor OD', 'Clarenbridge'),
(11, 'Conor Nally', 'Claregalway');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_route_location`
--

DROP TABLE IF EXISTS `delivery_route_location`;
CREATE TABLE IF NOT EXISTS `delivery_route_location` (
  `location_code` int(11) NOT NULL,
  `location_name` text NOT NULL,
  `location_address` longtext,
  `other_site_details` longtext,
  PRIMARY KEY (`location_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

DROP TABLE IF EXISTS `delivery_status`;
CREATE TABLE IF NOT EXISTS `delivery_status` (
  `delivery_status_code` int(11) NOT NULL,
  `delivery_status_description` longtext,
  PRIMARY KEY (`delivery_status_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` text,
  `other_employee_details` longtext,
  `employee_username` text,
  `employee_password` text,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `other_employee_details`, `employee_username`, `employee_password`) VALUES
(1, 'Eanna Glavin', NULL, NULL, NULL),
(2, 'Mark Reidy', NULL, NULL, NULL),
(3, 'Bill Bailey', NULL, NULL, NULL),
(4, 'Billy Walsh', NULL, NULL, NULL),
(5, 'Hunter S. Thompson', NULL, NULL, NULL),
(6, 'JJ Marlboro', NULL, NULL, NULL),
(9999999, 'Eanna Glavin', NULL, 'eannaglavin', '59eea54dcd4065473150ed398d7ebeb8');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(10) UNSIGNED NOT NULL,
  `package_employee` int(11) NOT NULL,
  `package_customer` int(11) NOT NULL,
  `package_status` int(11) NOT NULL,
  `package_details` text,
  PRIMARY KEY (`package_id`),
  UNIQUE KEY `package_id` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_employee`, `package_customer`, `package_status`, `package_details`) VALUES
(1, 3, 1, 6, 'Xbox One'),
(2, 2, 2, 5, 'Play Station 4'),
(4, 1, 4, 6, 'One Plus 5T Phone'),
(10, 1, 10, 4, 'Car Lights'),
(11, 5, 11, 1, 'Book');

-- --------------------------------------------------------

--
-- Table structure for table `package_delivery_time_card`
--

DROP TABLE IF EXISTS `package_delivery_time_card`;
CREATE TABLE IF NOT EXISTS `package_delivery_time_card` (
  `package_id` int(11) NOT NULL,
  `delivery_stage_date` date NOT NULL,
  `location_code` int(11) NOT NULL,
  `delivery_status_code` int(11) NOT NULL,
  `service_class_code` int(11) NOT NULL,
  `other_details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package_status`
--

DROP TABLE IF EXISTS `package_status`;
CREATE TABLE IF NOT EXISTS `package_status` (
  `package_status_code` int(11) NOT NULL,
  `package_status_description` text NOT NULL,
  PRIMARY KEY (`package_status_code`),
  UNIQUE KEY `package_status_code` (`package_status_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package_status`
--

INSERT INTO `package_status` (`package_status_code`, `package_status_description`) VALUES
(1, 'Waiting to Receive Package'),
(2, 'Package Received, Package Being Processed'),
(3, 'Package Processed, Waiting on Driver'),
(4, 'Package Has been collected by our Driver, He''ll soon be with you!'),
(5, 'Package Has been Delivered'),
(6, 'Package has been lost/Misplaced'),
(7, 'Package has been damaged/mishandled');

-- --------------------------------------------------------

--
-- Table structure for table `service_class`
--

DROP TABLE IF EXISTS `service_class`;
CREATE TABLE IF NOT EXISTS `service_class` (
  `service_class_code` int(11) NOT NULL,
  `secuity_level` int(11) NOT NULL,
  `service_class_description` longtext NOT NULL,
  `other_service_class_details` longtext NOT NULL,
  PRIMARY KEY (`service_class_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
