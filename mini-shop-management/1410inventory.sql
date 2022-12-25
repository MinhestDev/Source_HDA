-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 01:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1410inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `password` char(60) NOT NULL,
  `role` char(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `last_seen` datetime NOT NULL,
  `last_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_status` char(1) NOT NULL DEFAULT '1',
  `deleted` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile1`, `mobile2`, `password`, `role`, `created_on`, `last_login`, `last_seen`, `last_edited`, `account_status`, `deleted`) VALUES
(1, 'Admin', 'Demo', 'demo@1410inc.xyz', '08021111111', '07032222222', '$2y$10$xv9I14OlR36kPCjlTv.wEOX/6Dl7VMuWCl4vCxAVWP1JwYIaw4J2C', 'Super', '2017-01-04 22:19:16', '2022-12-23 12:12:09', '2022-12-23 12:17:06', '2022-12-23 05:17:06', '1', '0'),
(2, 'Admin', 'Admin', 'admin@gmail.com', '01234567892', '09831031898', '$2y$10$Z0PFVMdLAmNqqhZIRUe1CuImNv.hOauoPiqCpRCOfVXWwuYyHOnWm', 'Super', '2022-12-23 12:13:29', '2022-12-25 17:43:00', '2022-12-25 18:27:50', '2022-12-25 11:27:50', '1', '0'),
(3, 'Nhân', 'Viên 1', 'nhanvien1@gmail.com', '012345678899', '01234567898', '$2y$10$J5Chwlq/gZadervz3XGM3O2rC6XKF.EZEGias8HitnE6JwP5YCiB6', 'Basic', '2022-12-25 17:38:43', '2022-12-25 17:42:34', '2022-12-25 17:42:53', '2022-12-25 10:42:53', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `eventlog`
--

CREATE TABLE `eventlog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(200) NOT NULL,
  `eventRowIdOrRef` varchar(20) DEFAULT NULL,
  `eventDesc` text,
  `eventTable` varchar(20) DEFAULT NULL,
  `staffInCharge` bigint(20) UNSIGNED NOT NULL,
  `eventTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `eventRowIdOrRef`, `eventDesc`, `eventTable`, `staffInCharge`, `eventTime`) VALUES
(1, 'Creation of new item', '1', 'Addition of 400 quantities of a new item \'Demo Product\' with a unit price of &#8358;500.00 to stock', 'items', 1, '2022-12-23 05:14:28'),
(2, 'Item Update', '1', 'Details of item with code \'001\' was updated', 'items', 1, '2022-12-23 05:14:45'),
(3, 'T?o m?i', '1', 'B? sung 500 s? l??ng cho s?n ph?m m?i \'Demo\' v?i ??n giá &#8358;5,000.00 ??n kho hàng', 's?n ph?m', 2, '2022-12-25 10:39:45'),
(4, 'Stock Update (Kho hàng m?i)', '1', '<p>4000 s? l??ng Demo ?ã ?ã thêm ??n kho</p>\r\n                Lý do: <p>New items were purchased</p>', 'items', 2, '2022-12-25 10:41:55'),
(5, 'Giao d?ch m?i', '43691024', '1 các m?t hàng t?ng c?ng &#8358;20,000 v?i s? tham chi?u 43691024 ?ã ???c mua', 'transactions', 2, '2022-12-25 10:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text,
  `unitPrice` decimal(10,2) NOT NULL,
  `quantity` int(6) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `description`, `unitPrice`, `quantity`, `dateAdded`, `lastUpdated`) VALUES
(1, 'Demo', '001', 'New', '5000.00', 4496, '2022-12-25 17:39:45', '2022-12-25 10:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `lk_sess`
--

CREATE TABLE `lk_sess` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transId` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(10) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemCode` varchar(50) NOT NULL,
  `description` text,
  `quantity` int(6) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `totalMoneySpent` decimal(10,2) NOT NULL,
  `amountTendered` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `discount_percentage` decimal(10,2) NOT NULL,
  `vatPercentage` decimal(10,2) NOT NULL,
  `vatAmount` decimal(10,2) NOT NULL,
  `changeDue` decimal(10,2) NOT NULL,
  `modeOfPayment` varchar(20) NOT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `cust_phone` varchar(15) DEFAULT NULL,
  `cust_email` varchar(50) DEFAULT NULL,
  `transType` char(1) NOT NULL,
  `staffId` bigint(20) UNSIGNED NOT NULL,
  `transDate` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cancelled` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transId`, `ref`, `itemName`, `itemCode`, `description`, `quantity`, `unitPrice`, `totalPrice`, `totalMoneySpent`, `amountTendered`, `discount_amount`, `discount_percentage`, `vatPercentage`, `vatAmount`, `changeDue`, `modeOfPayment`, `cust_name`, `cust_phone`, `cust_email`, `transType`, `staffId`, `transDate`, `lastUpdated`, `cancelled`) VALUES
(1, '43691024', 'Demo', '001', '', 4, '5000.00', '20000.00', '20000.00', '25000.00', '0.00', '0.00', '0.00', '0.00', '5000.00', 'Cash', 'Khahcs hàng 1', '012345678965', 'khachhang1@gmail.com', '1', 2, '2022-12-25 17:44:39', '2022-12-25 10:44:39', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile1` (`mobile1`);

--
-- Indexes for table `eventlog`
--
ALTER TABLE `eventlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventlog`
--
ALTER TABLE `eventlog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
