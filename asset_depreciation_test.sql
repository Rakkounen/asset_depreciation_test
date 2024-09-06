-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_depreciation_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(200) NOT NULL,
  `asset_price` int(11) NOT NULL,
  `asset_lifetime` int(11) NOT NULL,
  `asset_value` int(11) NOT NULL,
  `asset_settle_date` date NOT NULL,
  `asset_remaining_lifetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`asset_id`, `asset_name`, `asset_price`, `asset_lifetime`, `asset_value`, `asset_settle_date`, `asset_remaining_lifetime`) VALUES
(1001, 'Motor A', 200, 20, 200, '2024-09-03', 20),
(1002, 'Motor B', 250, 10, 250, '2024-09-03', 10),
(1003, 'Motor C', 180, 15, 168, '2024-08-03', 14),
(2004, 'Komputer EM', 80, 10, 56, '2024-06-24', 7),
(2005, 'Forklift A', 120, 15, 128, '2024-10-24', 16),
(2006, 'Kompputer EM2', 100, 10, 80, '2024-07-24', 8),
(10003, 'Motor 4', 300, 20, 165, '2023-12-09', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sub_asset`
--

CREATE TABLE `sub_asset` (
  `sub_asset_id` int(11) NOT NULL,
  `sub_asset_name` varchar(200) NOT NULL,
  `sub_asset_price` int(11) NOT NULL,
  `sub_asset_lifetime` int(11) NOT NULL,
  `sub_asset_value` int(11) NOT NULL,
  `sub_asset_settle_date` date NOT NULL,
  `asset_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `sub_asset`
--
ALTER TABLE `sub_asset`
  ADD PRIMARY KEY (`sub_asset_id`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_asset`
--
ALTER TABLE `sub_asset`
  ADD CONSTRAINT `sub_asset_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`asset_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
