-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2016 at 01:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthy_corner_stores`
--

-- --------------------------------------------------------

--
-- Table structure for table `neighbourhood`
--

CREATE TABLE `neighbourhood` (
  `ID` int(11) NOT NULL,
  `hood_name` text NOT NULL,
  `hood_zip` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neighbourhood`
--

INSERT INTO `neighbourhood` (`ID`, `hood_name`, `hood_zip`) VALUES
(1, 'germantown', '19127'),
(2, 'Manayunk', '19106'),
(3, 'Chinatown', '19128'),
(4, 'Conshohecken', '19120'),
(5, 'Cherry Hill', '19128'),
(6, 'wissahickon', '19145');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `ID` int(255) NOT NULL,
  `hood_id` int(255) NOT NULL,
  `store_name` text NOT NULL,
  `store_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`ID`, `hood_id`, `store_name`, `store_area`) VALUES
(3, 6, 'Live Well', '1267'),
(4, 2, 'Healthy Living', '1500'),
(5, 4, 'GNC', '1200'),
(7, 3, 'Feng Sui', '1256');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `neighbourhood`
--
ALTER TABLE `neighbourhood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hood_id` (`hood_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `neighbourhood`
--
ALTER TABLE `neighbourhood`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`hood_id`) REFERENCES `neighbourhood` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
