-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 02:59 PM
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
-- Database: `ezyro_31767275_users_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `Id` int(11) NOT NULL,
  `First Name` varchar(100) NOT NULL,
  `Last Name` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Database Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`Id`, `First Name`, `Last Name`, `Username`, `Password`, `Destination`, `Database Name`) VALUES
(1, 'Ting', 'Yardz', 'admin', 'admin123', 'esms', 'ezyro_31767275_esms_db');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
