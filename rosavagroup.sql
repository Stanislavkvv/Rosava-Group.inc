-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 03:07 PM
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
  `App_ID` int(11) NOT NULL,
  `App_Name` varchar(50) NOT NULL,
  `App_Mail` varchar(80) NOT NULL,
  `App_Phone` varchar(15) NOT NULL,
  `App_Code` varchar(20) NOT NULL,
  `App_Services` varchar(15) NOT NULL,
  `App_Driving_Experience` varchar(15) NOT NULL,
  `App_HowKnow` varchar(20) NOT NULL,
  `App_Checked` tinyint(4) NOT NULL,
  `App_DateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`App_ID`, `App_Name`, `App_Mail`, `App_Phone`, `App_Code`, `App_Services`, `App_Driving_Experience`, `App_HowKnow`, `App_Checked`, `App_DateTime`) VALUES
(24, 'Serhiy Paziuk', 'paz.serhiy@gmail.com', '+380950218131', '59400', 'Solo', '<1', 'Referral', 1, '2022-05-28 12:07:54'),
(25, 'Serhiy', 'paz.serhiy@gmail.com', '+380950218131', '59400', 'Owner', '0', 'Craigslist', 0, '2022-05-28 12:08:37'),
(26, 'Serhiy', 'paz.serhiy@gmail.com', '+380950218131', '59400', 'Solo', '0', 'Facebook', 1, '2022-05-28 12:12:52'),
(27, 'Slavik', 'paz.serhiy@gmail.com', '+380950218131', '59400', 'Team', '1+', 'Google', 1, '2022-05-28 22:27:11'),
(28, 'Serhiy Paziuk', 'paz.serhiy@gmail.com', '+380950218131', '59400', 'Team', '<1', 'Craigslist', 0, '2022-06-02 22:01:43');

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
(2, 'phone', '+17736278837', '2022-05-26 22:47:29'),
(3, 'fax', '+13312252028', '2022-05-26 22:47:50'),
(4, 'location', '4612 Hirschberg Ave Schiller Park, IL 60176 USA', '2022-05-26 22:49:06'),
(5, 'mail', 'rosavagroup@yahoo.com', '2022-05-26 22:50:10'),
(6, 'facebook', 'https://www.facebook.com', '2022-05-26 22:52:39'),
(7, 'instagram', 'https://www.instagram.com', '2022-05-26 22:53:10'),
(8, 'siteDescription', 'Rosava group is a rapidly growing company located in Chicagoland area, operating in 48 states with more then 20 trucks', '2022-05-26 22:56:15');

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
(5, 1, 'admin', '$2y$12$uy/Lqohqr9fw06d.NeXNue5XtSKEs93aP69SXV6eK2hrSNRDKcLNC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`App_ID`);

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
  MODIFY `App_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
