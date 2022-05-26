-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 10:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rosavagroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `ID` int(11) NOT NULL,
  `App_Name` varchar(50) NOT NULL,
  `App_Mail` varchar(80) NOT NULL,
  `App_Phone` varchar(15) NOT NULL,
  `App_Code` varchar(20) NOT NULL,
  `App_Services` varchar(15) NOT NULL,
  `App_Driving_Experience` varchar(15) NOT NULL,
  `App_HowKnow` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `config_value` varchar(255) NOT NULL,
  `config_timeAdd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `config_key`, `config_value`, `config_timeAdd`) VALUES
(1, 'phone', '+13312252027', '2022-05-26 22:46:19'),
(2, 'phone2', '+17736278837', '2022-05-26 22:47:29'),
(3, 'fax', '+13312252028', '2022-05-26 22:47:50'),
(4, 'location', '4612 Hirschberg Ave Schiller Park, IL 60176 USA', '2022-05-26 22:49:06'),
(5, 'mail', 'rosavaGroup@yahoo.com', '2022-05-26 22:50:10'),
(6, 'facebook', 'https://www.facebook.com', '2022-05-26 22:52:39'),
(7, 'instagram', 'https://www.instagram.com', '2022-05-26 22:53:10'),
(8, 'siteDescription', 'TOP Masonry&Tuckpointing is a full service masonry, E.I.F.S./stucco and caulking contractor serving architects, construction managers, condominium associations, developers, general contractors, homeowners and private and public institutions.', '2022-05-26 22:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `username`, `password`) VALUES
(5, 1, 'admin', '$2y$12$e1MIES4UJ2ZHKMsiv5x/fOFPErnTGZBUXMhs.oTUDmDHt79HsP7zG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
