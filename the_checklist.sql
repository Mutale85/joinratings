-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2022 at 12:29 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_hiring_customers`
--

CREATE TABLE `car_hiring_customers` (
  `id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `licence` text NOT NULL,
  `vehicle_reg_number` text NOT NULL,
  `defaulted` int(11) NOT NULL DEFAULT 0,
  `date_defaulted` text DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `remarks` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `view` enum('1','0') NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `nrc_copy` text DEFAULT NULL,
  `license_file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_hiring_customers`
--

INSERT INTO `car_hiring_customers` (`id`, `customer_id`, `firstname`, `lastname`, `phone`, `email`, `address`, `licence`, `vehicle_reg_number`, `defaulted`, `date_defaulted`, `company_id`, `amount`, `currency`, `remarks`, `rating`, `view`, `date_added`, `nrc_copy`, `license_file`) VALUES
(1, '939887/21/1', 'Hackim', 'Banda', '260979112233', '', '   Plot 45, Lusaka', '874-OO-45', 'ABC 4532', 0, '2021-10-21', 1, '760.00', 'ZMW', 'The client borrowed the vehicle and decided not to pay for it', 3, '1', '2022-01-10 17:02:23', NULL, NULL),
(3, '5643/78/34/1', 'Morin', 'Mulenga', '0976330092', 'mule@gmail.com', ' 104 B, Pemblock Quarters, ZAF LUSAKA', '6523-12-89', 'BAP 5643', 1, '2022-01-14', 1, '350.00', 'ZMW', 'Client Skipped Payment', 1, '1', '2022-01-10 22:00:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `countryName` varchar(256) NOT NULL,
  `filename` varchar(300) NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `time_login` datetime NOT NULL DEFAULT current_timestamp(),
  `user_ip` text NOT NULL,
  `user_country` text DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `parent_id`, `email`, `password`, `time_login`, `user_ip`, `user_country`, `logout_time`) VALUES
(135, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-17 22:41:54', '::1', NULL, NULL),
(136, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-17 22:42:57', '::1', NULL, NULL),
(137, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-17 22:59:22', '::1', NULL, NULL),
(138, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-18 17:10:06', '::1', NULL, NULL),
(139, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-18 17:14:30', '::1', NULL, NULL),
(140, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-18 17:14:59', '::1', NULL, NULL),
(141, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-19 00:12:30', '::1', NULL, '2021-11-19 00:18:06'),
(142, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-19 00:22:08', '::1', NULL, '2021-11-19 06:15:05'),
(143, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2021-11-21 11:08:24', '::1', NULL, '2021-11-21 19:22:28'),
(144, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-07 15:16:44', '::1', NULL, NULL),
(145, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-09 13:52:32', '::1', NULL, NULL),
(146, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-10 10:20:26', '::1', NULL, NULL),
(147, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-12 17:29:42', '::1', NULL, '2022-01-15 11:19:20'),
(148, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-16 02:34:25', '::1', NULL, NULL),
(149, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-16 02:40:12', '::1', NULL, '2022-01-16 02:46:19'),
(150, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-16 17:52:38', '::1', NULL, '2022-01-17 10:51:44'),
(151, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-17 14:44:33', '::1', NULL, '2022-01-17 16:45:34'),
(152, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-17 16:45:56', '::1', NULL, '2022-01-17 17:13:14'),
(153, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-21 13:41:30', '::1', NULL, '2022-01-21 13:45:04'),
(154, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-21 13:46:08', '::1', NULL, '2022-01-21 16:05:36'),
(155, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-26 14:50:17', '::1', NULL, '2022-01-26 14:52:54'),
(156, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-01-26 22:28:37', '::1', NULL, '2022-01-26 23:35:33'),
(157, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-26 23:35:57', '::1', NULL, '2022-01-27 00:02:05'),
(158, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-01-29 11:04:48', '::1', NULL, '2022-01-30 08:45:55'),
(159, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-05-02 13:23:15', '::1', NULL, '2022-05-10 23:54:35'),
(160, 1, 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', '2022-05-10 23:55:12', '::1', NULL, '2022-05-14 18:51:48'),
(161, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-05-14 18:52:16', '::1', NULL, '2022-05-14 21:01:01'),
(162, 2, 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', '2022-05-23 18:47:32', '::1', NULL, '2022-05-23 18:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullnames` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `company_name` text NOT NULL,
  `business_type` enum('Money Lending','Car Hiring') NOT NULL,
  `country` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `activate` enum('0','1') NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullnames`, `email`, `password`, `company_name`, `business_type`, `country`, `parent_id`, `activate`, `date_added`) VALUES
(1, 'George Mutale Mulenga', 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', 'OSABOX', 'Car Hiring', NULL, 1, '1', '2021-11-17 22:28:58'),
(2, 'Hope Chilekwa', 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', 'Cosa Lending', 'Money Lending', NULL, 2, '1', '2022-01-16 02:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `money_lending_customers`
--

CREATE TABLE `money_lending_customers` (
  `id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `defaulted` int(11) NOT NULL DEFAULT 0,
  `date_borrowed` date NOT NULL,
  `date_defaulted` text DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `remarks` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `view` enum('1','0') NOT NULL,
  `nrc_copy` text DEFAULT NULL,
  `borrowing_proof` text DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `money_lending_customers`
--

INSERT INTO `money_lending_customers` (`id`, `customer_id`, `firstname`, `lastname`, `phone`, `email`, `address`, `defaulted`, `date_borrowed`, `date_defaulted`, `company_id`, `amount`, `currency`, `remarks`, `rating`, `view`, `nrc_copy`, `borrowing_proof`, `date_added`) VALUES
(4, '098909/67/1', 'Pascal', 'Mbale', '260977002211', 'pascal@hotmail.com', 'Ndeke Village', 1, '2022-01-17', '2022-01-17', 2, '8900.00', 'ZMW', 'Borrowed and has not honoured', 1, '1', 'pexels-teddy-tavan-1685955.jpeg', 'BBA 105 INTRODUCTION TO MACROECONOMICS MODULE (Repaired).pdf', '2022-01-17 15:07:40'),
(6, '676721/67/1', 'Maureen', 'Nagiye', '+260976331192', 'muar@gmail.com', ' Kalulushi', 1, '2022-01-05', '2022-05-11', 2, '7000.00', 'ZMW', 'Client has not paid', 1, '1', 'joinratings1.png', 'BBA 105 INTRODUCTION TO MACROECONOMICS MODULE (Repaired).pdf', '2022-05-02 15:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `money_lending_list`
--

CREATE TABLE `money_lending_list` (
  `id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `licence` text NOT NULL,
  `defaulted` int(11) NOT NULL DEFAULT 0,
  `date_defaulted` date DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `amount_defaulted` decimal(10,2) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `searches_done`
--

CREATE TABLE `searches_done` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `client_id` text NOT NULL,
  `search_result` text NOT NULL,
  `client_status` text DEFAULT NULL,
  `search_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `searches_done`
--

INSERT INTO `searches_done` (`id`, `parent_id`, `client_id`, `search_result`, `client_status`, `search_date`) VALUES
(1, 1, '414166/67/1', 'Not Listed', '0', '2022-05-13 22:32:37'),
(2, 1, '414166/67/1', 'Not Listed', '0', '2022-05-13 22:37:09'),
(3, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 07:33:09'),
(4, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 07:34:24'),
(5, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:03:58'),
(6, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:06:13'),
(7, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:06:27'),
(8, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:06:54'),
(9, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:07:25'),
(10, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:07:47'),
(11, 1, '414166/67/1', 'Not Listed', '0', '2022-05-14 12:13:06'),
(12, 1, '675434/87/2', 'Not Listed', '0', '2022-05-14 12:16:39'),
(13, 1, '908647-23-2', 'Not Listed', '0', '2022-05-14 12:17:35'),
(14, 2, '414166/67/1', 'Not Listed', '0', '2022-05-14 19:46:23'),
(15, 2, '99873/98/1', 'Not Listed', '0', '2022-05-14 19:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `search_counter`
--

CREATE TABLE `search_counter` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `search` int(11) NOT NULL DEFAULT 0,
  `customer_id` text NOT NULL,
  `last_searched` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search_counter`
--

INSERT INTO `search_counter` (`id`, `parent_id`, `user_id`, `search`, `customer_id`, `last_searched`) VALUES
(1, 1, 1, 18, '6523-12-89', '2022-01-15 00:35:37'),
(2, 2, 2, 9, '939887/21/1', '2022-01-17 15:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `earned_tokens` int(11) NOT NULL,
  `paid_for_tokens` int(11) NOT NULL DEFAULT 0,
  `total_tokens` int(11) DEFAULT 0,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `parent_id`, `earned_tokens`, `paid_for_tokens`, `total_tokens`, `amount_paid`, `currency`, `transaction_id`, `email`, `phone`, `date_added`) VALUES
(1, 1, 3, 0, 0, NULL, NULL, NULL, 'mule@gmail.com', '0976330092', '2022-01-10 22:00:24'),
(2, 2, 4, 0, 0, NULL, NULL, NULL, 'mutamuls@gmail.com', '260977002211', '2022-01-17 15:07:40'),
(3, 2, 3, 0, -1, NULL, NULL, NULL, 'mutamuls@gmail.com', '260976001122', '2022-05-02 15:09:47'),
(4, 2, 3, 0, -1, NULL, NULL, NULL, 'mutamuls@gmail.com', '+260976331192', '2022-05-02 15:13:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_hiring_customers`
--
ALTER TABLE `car_hiring_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_lending_customers`
--
ALTER TABLE `money_lending_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_lending_list`
--
ALTER TABLE `money_lending_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches_done`
--
ALTER TABLE `searches_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_counter`
--
ALTER TABLE `search_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_hiring_customers`
--
ALTER TABLE `car_hiring_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `money_lending_customers`
--
ALTER TABLE `money_lending_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `money_lending_list`
--
ALTER TABLE `money_lending_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `searches_done`
--
ALTER TABLE `searches_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `search_counter`
--
ALTER TABLE `search_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
