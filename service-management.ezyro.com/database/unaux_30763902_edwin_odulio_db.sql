-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 10:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esms_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_information_table`
--

CREATE TABLE `shop_information_table` (
  `Id` int(11) NOT NULL,
  `Shop Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Shop Owner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technicians_list_table`
--

CREATE TABLE `technicians_list_table` (
  `Id` int(11) NOT NULL,
  `First Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Last Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Contact Number` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units_archive`
--

CREATE TABLE `units_archive` (
  `Id` int(11) NOT NULL,
  `Date Repaired` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Warranty Exp Date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Client Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Code Number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Issue` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Technician Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units_claimed_today`
--

CREATE TABLE `units_claimed_today` (
  `Id` int(11) NOT NULL,
  `Date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Technician Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Issue` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Labor` float NOT NULL,
  `Additional Fees` float NOT NULL,
  `Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units_to_repair_table`
--

CREATE TABLE `units_to_repair_table` (
  `Id` int(11) NOT NULL,
  `Code Number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Brand` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Unit Model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Client First Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Client Last Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Client Contact Number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_information_table`
--
ALTER TABLE `shop_information_table`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `technicians_list_table`
--
ALTER TABLE `technicians_list_table`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `units_archive`
--
ALTER TABLE `units_archive`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `units_claimed_today`
--
ALTER TABLE `units_claimed_today`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `units_to_repair_table`
--
ALTER TABLE `units_to_repair_table`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_information_table`
--
ALTER TABLE `shop_information_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technicians_list_table`
--
ALTER TABLE `technicians_list_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units_archive`
--
ALTER TABLE `units_archive`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units_claimed_today`
--
ALTER TABLE `units_claimed_today`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units_to_repair_table`
--
ALTER TABLE `units_to_repair_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
