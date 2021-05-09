-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 04:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorappointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(256) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(256) NOT NULL,
  `symptoms` varchar(550) NOT NULL,
  `userDocId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `mobile`, `email`, `appointment_date`, `appointment_time`, `symptoms`, `userDocId`) VALUES
(1, 'Chetan', '7798565856', 'test@gmail.com', '2021-04-19', ' 4:30', 'Nothing', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dravailable_date_time`
--

CREATE TABLE `dravailable_date_time` (
  `id` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `available_day` varchar(256) NOT NULL,
  `available_time` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dravailable_date_time`
--

INSERT INTO `dravailable_date_time` (`id`, `docId`, `available_day`, `available_time`, `created_at`) VALUES
(1, 2, 'Monday', '4:00, 4:30, 5:00, 5:30, 6:00, 6:30, 7:00, 7:30, 8:00', '2021-05-02 03:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payment`
--

CREATE TABLE `patient_payment` (
  `id` int(11) NOT NULL,
  `patientName` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `order_id` varchar(256) NOT NULL,
  `merchant_oderId` varchar(256) NOT NULL,
  `payment_id` varchar(256) NOT NULL,
  `amount` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `paidAt` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `docId` int(11) NOT NULL,
  `amount` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `access_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `qualification` varchar(256) NOT NULL,
  `specification` text NOT NULL,
  `fee` varchar(256) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `mobile`, `qualification`, `specification`, `fee`, `role`, `password`, `username`, `created_at`) VALUES
(1, '', 'Nayan Patil', 'patilnayan092@gmail.com', '7798608014', '', '', '', 'Admin', 'admin', 'admin', '2021-04-29 13:41:47'),
(2, 'doc1.jfif', 'Doctor', 'doctor1@gmail.com', '7798605555', '', '', '1', 'Doctor', 'doctor', 'doctor', '2021-04-29 13:42:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userDocId` (`userDocId`);

--
-- Indexes for table `dravailable_date_time`
--
ALTER TABLE `dravailable_date_time`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docId` (`docId`);

--
-- Indexes for table `patient_payment`
--
ALTER TABLE `patient_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dravailable_date_time`
--
ALTER TABLE `dravailable_date_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patient_payment`
--
ALTER TABLE `patient_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `userDocId` FOREIGN KEY (`userDocId`) REFERENCES `users` (`id`);

--
-- Constraints for table `dravailable_date_time`
--
ALTER TABLE `dravailable_date_time`
  ADD CONSTRAINT `docId` FOREIGN KEY (`docId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
