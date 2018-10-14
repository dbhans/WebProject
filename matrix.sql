-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 11:50 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adresses`
--

INSERT INTO `adresses` (`id`, `country`, `state`, `city`, `adress`, `zipcode`, `clientid`, `employeeid`, `createdbyid`, `modifybyid`) VALUES
(1, 'asdf', 'asdf', 'asdf', 'asdgf', 'asdgf', NULL, 1, NULL, NULL),
(2, 'asdgg', 'asgas', 'asdfsadg', 'asdgag', 'asgdsda', 2, NULL, NULL, NULL),
(3, 'awgfawe r', 'asgfasegf', 'as', 'as g', 'awgfer', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `compagnyid` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `sex`, `phone`, `email`, `compagnyid`, `employeeid`, `createdbyid`, `modifybyid`) VALUES
(2, 'asdf', 'asdf', 'edfsaf', 13424535, 'asdfa@dff.df', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `compagnies`
--

CREATE TABLE `compagnies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `compagnies`
--

INSERT INTO `compagnies` (`id`, `name`, `description`, `created`, `modified`, `clientid`, `createdbyid`, `modifybyid`) VALUES
(1, 'asdf', 'asdfdgfas', NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `type` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sieze` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cellphone` int(11) DEFAULT NULL,
  `san` int(11) DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `sex` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `cellphone`, `san`, `startdate`, `sex`, `birthday`, `email`, `createdbyid`, `modifybyid`) VALUES
(1, 'bert', 'elf', 23453445, 23423545, '2022-12-19 00:00:00', 'm', '2020-09-30 00:00:00', 'afawf@asdf.com', 1, NULL),
(2, 'toto9', 'assdf', 3425, 2453245, '2019-06-13 00:00:00', 'as', '2020-09-15 00:00:00', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(11) NOT NULL,
  `typem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taskdescription` longtext COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `clientid` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `selldate` datetime DEFAULT NULL,
  `discount` decimal(4,0) DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `clientid` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `documentid` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `information` longtext COLLATE utf8_unicode_ci,
  `note` longtext COLLATE utf8_unicode_ci,
  `time` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `readed` int(11) NOT NULL,
  `created` date DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `employeeid`, `message`, `readed`, `created`, `clientid`, `createdbyid`, `modifybyid`) VALUES
(1, 1, 'Allo Venfre', 0, '2017-12-20', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descriptionname` longtext COLLATE utf8_unicode_ci,
  `quantity` int(11) DEFAULT NULL,
  `sell` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `productdate` datetime DEFAULT NULL,
  `createdbyid` int(11) DEFAULT NULL,
  `modifybyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_control`
--

CREATE TABLE `user_control` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `employeeid` int(11) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `active_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_control`
--

INSERT INTO `user_control` (`id`, `email`, `username`, `password`, `roles`, `employeeid`, `clientid`, `active_user`) VALUES
(1, NULL, 'toto', '$2y$13$alipz4EDhl/GINqgN3NkVe1d4ZAdQysPHAB6t7naHRCH76GOosTji', 'a:1:{i:0;s:15:\"ROLE_SUPERVISOR\";}', 0, NULL, 1),
(2, NULL, 'client1', '$2y$13$WpraP/Qn31PiYnVVBfs9Hu1XD92qLKqjxzaKx7sD.MAcRFNKmD58O', 'a:1:{i:0;s:11:\"ROLE_CLIENT\";}', NULL, 2, 1),
(3, NULL, 'employ1', '$2y$13$grX69Pe.r79C5tKNkBi8DuQWaOoEVjY4sr4Qv39bDMqS5RgS0/H/q', 'a:1:{i:0;s:13:\"ROLE_EMPLOYEE\";}', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compagnies`
--
ALTER TABLE `compagnies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_control`
--
ALTER TABLE `user_control`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `compagnies`
--
ALTER TABLE `compagnies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_control`
--
ALTER TABLE `user_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
