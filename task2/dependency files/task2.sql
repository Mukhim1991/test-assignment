-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 08:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task2`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `add_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `phone`, `email`, `add_dt`) VALUES
(1, 'Shaikh Mukhim', '7709663959', 'shaikhmdmukhim@gmail.com', '2021-06-23'),
(2, 'Shaikh Izan', '11111111111', 'izan@gmail.com', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `reimbursement`
--

CREATE TABLE `reimbursement` (
  `reimbursement_id` int(20) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `reimbursement_dt` date NOT NULL,
  `amount` float(9,2) NOT NULL,
  `add_dt` date NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reimbursement`
--

INSERT INTO `reimbursement` (`reimbursement_id`, `employee_id`, `purpose`, `reimbursement_dt`, `amount`, `add_dt`, `dt`) VALUES
(1, 1, 'Headphone', '2021-06-01', 500.00, '2021-06-23', '2021-06-23 14:21:15'),
(2, 2, 'Laptop', '2021-06-04', 25000.00, '2021-06-21', '2021-06-23 14:21:15'),
(3, 1, 'Traveling', '2021-06-09', 230.00, '2021-06-27', '2021-06-23 14:22:19'),
(4, 2, 'PC', '2021-06-10', 15000.00, '2021-06-19', '2021-06-23 14:22:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `reimbursement`
--
ALTER TABLE `reimbursement`
  ADD PRIMARY KEY (`reimbursement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reimbursement`
--
ALTER TABLE `reimbursement`
  MODIFY `reimbursement_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
