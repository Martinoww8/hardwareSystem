-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 04:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hardwaresystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_branch` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `mobileNumber` int(10) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastUpdate` date NOT NULL,
  `hardware1` int(11) NOT NULL DEFAULT 0,
  `hardware2` int(11) NOT NULL DEFAULT 0,
  `hardware3` int(11) NOT NULL DEFAULT 0,
  `hardware4` int(11) NOT NULL DEFAULT 0,
  `hardware5` int(11) NOT NULL DEFAULT 0,
  `hardware6` int(11) NOT NULL DEFAULT 0,
  `hardware7` int(11) NOT NULL DEFAULT 0,
  `hardware8` int(11) NOT NULL DEFAULT 0,
  `hardware9` int(11) NOT NULL DEFAULT 0,
  `hardware10` int(11) NOT NULL DEFAULT 0,
  `hardware11` int(11) NOT NULL DEFAULT 0,
  `hardware12` int(11) NOT NULL DEFAULT 0,
  `hardware13` int(11) NOT NULL DEFAULT 0,
  `hardware14` int(11) NOT NULL DEFAULT 0,
  `hardware15` int(11) NOT NULL DEFAULT 0,
  `hardware16` int(11) NOT NULL DEFAULT 0,
  `hardware17` int(11) NOT NULL DEFAULT 0,
  `hardware18` int(11) NOT NULL DEFAULT 0,
  `hardware19` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_branch`, `fname`, `sname`, `lname`, `position`, `phoneNumber`, `mobileNumber`, `ip`, `email`, `lastUpdate`, `hardware1`, `hardware2`, `hardware3`, `hardware4`, `hardware5`, `hardware6`, `hardware7`, `hardware8`, `hardware9`, `hardware10`, `hardware11`, `hardware12`, `hardware13`, `hardware14`, `hardware15`, `hardware16`, `hardware17`, `hardware18`, `hardware19`) VALUES
(1, 'Sofia', 'Ivan', 'Boyanov', 'Martinov', 'System Administrator', 123456789, 123456789, '192.168.0.126', 'i.martinov@motopfohe.bg', '2021-04-12', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Plovdiv', 'Georgi', 'Ivanov', 'Ivanov', 'Sales ', 12345123, 12345123, '192.168.1.231', 'g.ivanov@motopfohe.bg', '2021-04-12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 123, 0, 0, 0, 0, 0, 0),
(13, '', 'Ivanaaa', 'Martinov', 'Georgiev', 'Director', 29842418, 878688529, '192.168.0.122', 'i.martinov@motopfohe.bg', '2021-04-12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Sofia', 'Ivan', 'Boyanov', 'Martinov', 'Aaaa', 1234556, 1234564, '192.168.2.123', 'ivan@ivan.bg', '2021-04-13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'Varna', 'Mitko', 'Mitkov', 'Mitkov', 'Sales', 123456, 123456, '192.168.0.175', 'mitko@abv.bg', '2021-04-13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `hardware_id` int(11) NOT NULL,
  `hardware_type` varchar(50) NOT NULL,
  `hardware_brand` varchar(50) NOT NULL,
  `hardware_model` varchar(50) NOT NULL,
  `hardware_sn` varchar(50) NOT NULL,
  `hardware_os` varchar(50) NOT NULL,
  `hardware_size` int(11) DEFAULT NULL,
  `hardware_info` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `givenTo` int(11) NOT NULL,
  `purchased` int(11) NOT NULL,
  `lastUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`hardware_id`, `hardware_type`, `hardware_brand`, `hardware_model`, `hardware_sn`, `hardware_os`, `hardware_size`, `hardware_info`, `status`, `givenTo`, `purchased`, `lastUpdate`) VALUES
(1, 'PC', 'DELL', 'Optiplex 3020', '123456', 'Windows10', 0, 'More info', '', 1, 0, '0000-00-00'),
(3, 'PC', 'DELL', 'Optiplex 3020', '123456', 'Windows10', 0, 'More info', '', 1, 0, '0000-00-00'),
(4, 'PC', 'DELL', 'Optiplex 3020', '123456', 'Windows10', 0, 'More info', '', 1, 0, '0000-00-00'),
(5, 'laptop', 'DELL', 'Inspiron', '123456', 'Windows', 0, 'info', 'in use', 4, 0, '0000-00-00'),
(6, 'Monitor', 'DELL', 'Monitor', '1234', '-', 0, 'asdddasd', 'In Use', 14, 2020, '2021-04-13'),
(7, 'Laptop', 'DELL', 'DELL', '12345', '-', 0, 'asdasdasd', 'Given', 13, 2020, '2021-04-13'),
(8, 'Printer', 'DELL', 'Monitor', '12345', '-', 0, 'Additional', 'aaa', 15, 2020, '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `mainHeader` varchar(50) NOT NULL,
  `secondaryHeader` varchar(50) NOT NULL,
  `developedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `mainHeader`, `secondaryHeader`, `developedBy`) VALUES
(1, 'Hardware Inventory', 'sdsfsfdsdfaaa', 'MOTOPFOHE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `dateCreated`) VALUES
(1, 'i.martinov', 'Ivan1234', '2021-04-09 12:09:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`hardware_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hardware`
--
ALTER TABLE `hardware`
  MODIFY `hardware_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
