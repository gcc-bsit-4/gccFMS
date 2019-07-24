-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 09:52 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gccis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `username`, `password`, `date_time`) VALUES
(1000, 'Arlkheem Rey', 'Galario', 'admin', '$2y$10$WDZx3YUzDBVCO88u6J3Uw.72p73Wkne6waCLojcfJkD9snU8T2hjy', '2019-07-21 10:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_code` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prog_head` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_code`, `description`, `prog_head`, `date_time`) VALUES
(1000, 'BSIT', 'Bachelor of Science in Information Technology', '1001', '2019-07-16 13:11:48'),
(1001, 'BSBA', 'Bacherlor of Sciencein Business Administration', '1002', '2019-07-17 07:37:31'),
(1002, 'BSCRIM', 'Bachelor of Science in Criminology', '1003', '2019-07-17 07:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `description`, `amount`, `dept_id`, `date_time`) VALUES
(1000, 'Cheerdance Costume', '1500', 1000, '2019-07-18 09:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous`
--

CREATE TABLE `miscellaneous` (
  `msc_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miscellaneous`
--

INSERT INTO `miscellaneous` (`msc_id`, `description`, `amount`, `dept_id`, `date_time`) VALUES
(1000, 'Sinulog', 250, 1000, '2019-07-16 21:15:05'),
(1001, 'Intrams', 150, 1000, '2019-07-16 21:15:18'),
(1002, 'Team Building', 200, 1000, '2019-07-16 21:15:35'),
(1003, 'Sinulog', 200, 1001, '2019-07-17 15:39:03'),
(1004, 'Intrams', 150, 1001, '2019-07-17 15:49:20'),
(1005, 'Cheerdance Costume', 200, 1001, '2019-07-17 17:51:18'),
(1006, 'Cheerdance Costume', 300, 1000, '2019-07-18 10:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `msc_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `st_id`, `msc_id`, `amount`, `datetime`) VALUES
(1, 2140141, 1000, 250, '2019-07-16 21:15:56'),
(2, 2140141, 1001, 150, '2019-07-16 21:16:01'),
(3, 2140141, 1002, 200, '2019-07-16 21:16:07'),
(4, 2140142, 1000, 250, '2019-07-16 21:41:51'),
(5, 2140142, 1001, 150, '2019-07-16 21:42:32'),
(6, 2140142, 1002, 200, '2019-07-16 21:42:38'),
(7, 2140144, 1003, 200, '2019-07-17 15:39:13'),
(8, 2140144, 1004, 150, '2019-07-17 15:49:29'),
(9, 2140143, 1000, 250, '2019-07-17 17:08:46'),
(10, 2140143, 1001, 150, '2019-07-17 17:10:55'),
(11, 2140143, 1002, 100, '2019-07-17 17:11:55'),
(12, 2140144, 1005, 200, '2019-07-17 17:51:28'),
(13, 2140141, 1006, 300, '2019-07-18 13:30:36'),
(14, 2140145, 1000, 250, '2019-07-18 13:33:57'),
(15, 2140145, 1001, 150, '2019-07-18 13:34:17'),
(16, 2140145, 1002, 200, '2019-07-18 13:36:41'),
(17, 2140148, 1003, 200, '2019-07-21 10:16:26'),
(18, 2140148, 1004, 150, '2019-07-21 10:17:00'),
(19, 2140148, 1005, 200, '2019-07-21 10:17:13'),
(20, 2140145, 1006, 200, '2019-07-22 03:53:37'),
(21, 2140142, 1006, 300, '2019-07-24 14:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `payment_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`payment_id`, `dept_id`, `st_id`, `user_id`, `amount`, `date_time`) VALUES
(1, 1000, 2140141, 1001, 250, '2019-07-16 21:15:56'),
(2, 1000, 2140141, 1001, 150, '2019-07-16 21:16:01'),
(3, 1000, 2140141, 1001, 100, '2019-07-16 21:16:06'),
(4, 1000, 2140142, 1001, 250, '2019-07-16 21:41:51'),
(5, 1000, 2140142, 1001, 150, '2019-07-16 21:42:32'),
(6, 1000, 2140142, 1001, 150, '2019-07-16 21:42:38'),
(7, 1000, 2140141, 1001, 100, '2019-07-17 12:45:30'),
(8, 1000, 2140142, 1001, 30, '2019-07-17 15:35:21'),
(9, 1000, 2140142, 1001, 20, '2019-07-17 15:35:26'),
(10, 1001, 2140144, 1002, 100, '2019-07-17 15:39:13'),
(11, 1001, 2140144, 1002, 100, '2019-07-17 15:39:29'),
(12, 1001, 2140144, 1002, 100, '2019-07-17 15:49:29'),
(13, 1001, 2140144, 1002, 50, '2019-07-17 15:49:46'),
(14, 1000, 2140143, 2140141, 250, '2019-07-17 17:08:46'),
(15, 1000, 2140143, 1001, 100, '2019-07-17 17:10:55'),
(16, 1000, 2140143, 1001, 50, '2019-07-17 17:11:49'),
(17, 1000, 2140143, 1001, 100, '2019-07-17 17:11:55'),
(18, 1001, 2140144, 1002, 100, '2019-07-17 17:51:28'),
(19, 1001, 2140144, 1002, 100, '2019-07-17 17:53:02'),
(20, 1000, 2140141, 1001, 200, '2019-07-18 13:30:36'),
(21, 1000, 2140145, 1001, 250, '2019-07-18 13:33:57'),
(22, 1000, 2140145, 1001, 150, '2019-07-18 13:34:17'),
(23, 1000, 2140145, 2140141, 100, '2019-07-18 13:36:41'),
(24, 1000, 2140145, 2140141, 50, '2019-07-18 13:36:47'),
(25, 1000, 2140141, 1001, 100, '2019-07-19 23:12:13'),
(26, 1000, 2140145, 1001, 50, '2019-07-20 06:29:44'),
(27, 1001, 2140148, 1002, 200, '2019-07-21 10:16:26'),
(28, 1001, 2140148, 1002, 200, '2019-07-21 10:17:00'),
(29, 1001, 2140148, 1002, 200, '2019-07-21 10:17:13'),
(30, 1000, 2140145, 2140141, 200, '2019-07-22 03:53:37'),
(31, 1000, 2140142, 1001, 200, '2019-07-24 14:09:55'),
(32, 1000, 2140142, 1001, 100, '2019-07-24 14:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `prog_head`
--

CREATE TABLE `prog_head` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prog_head`
--

INSERT INTO `prog_head` (`id`, `fname`, `mname`, `sname`, `gender`, `dept_id`, `timestamp`, `f_id`) VALUES
(1001, 'Arlkheem Rey', 'R', 'Galario', 'Male', 1000, '', 0),
(1002, 'Jomar', 'J', 'Dagondon', 'Male', 1001, '', 0),
(1003, 'Roxelle', 'C', 'katian', 'Female', 1002, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `s_lname` varchar(30) NOT NULL,
  `s_fname` varchar(30) NOT NULL,
  `s_mname` char(1) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `yrlvl` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `payment` int(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_id`, `dept_id`, `s_lname`, `s_fname`, `s_mname`, `gender`, `yrlvl`, `address`, `position`, `payment`, `date_time`) VALUES
(2140141, 0, 1000, 'Magramo', 'Dixter Jake', 'M', 'Male', '4th', 'Pazvillage', 'Treasurer', 900, '2019-07-16 21:12:38'),
(2140142, 0, 1000, 'Matayabas', 'Aldrin John', 'M', 'Male', '4th', 'qweqeq', '', 900, '2019-07-16 21:39:17'),
(2140143, 0, 1000, 'Villadores', 'Gerald', 'G', 'Male', '4th', 'Lunao', '', 500, '2019-07-17 15:36:34'),
(2140144, 0, 1001, 'Pearl', 'Magada', 'C', 'Female', '1st', 'Pazvillage', 'Treasurer', 550, '2019-07-17 15:38:44'),
(2140145, 0, 1000, 'Cagas', 'Louie', 'D', 'Male', '3rd', 'Lunao', '', 800, '2019-07-18 13:32:28'),
(2140148, 0, 1001, 'Rife', 'Winjee', 'L', 'Male', '4th', 'Murallon', '', 600, '2019-07-21 00:13:01'),
(2140149, 0, 1000, 'Madronero', 'Dixter', 'M', 'Male', '4th', 'Pazvillage', '', 0, '2019-07-21 00:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_systat`
--

CREATE TABLE `tbl_systat` (
  `ys_id` int(11) NOT NULL,
  `sy` varchar(15) NOT NULL,
  `semester` int(1) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_systat`
--

INSERT INTO `tbl_systat` (`ys_id`, `sy`, `semester`, `dateAdded`, `status`) VALUES
(1, '2019 - 2020', 1, '2019-07-10 05:40:06', 1),
(2, '2019 - 2020', 2, '2019-07-10 05:41:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `fname`, `lname`, `username`, `password`, `user_type`) VALUES
(1, 1000, 'Arl Kheem', 'Galario', 'admin', '$2y$10$WDZx3YUzDBVCO88u6J3Uw.72p73Wkne6waCLojcfJkD9snU8T2hjy', 'Admin'),
(13, 1001, 'Arlkheem Rey', 'Galario', '1001', '$2y$10$4KOu7jJd.NewoTipM8NZYuJMTmJ5f0XVwzIrIja9Za0pNM0KX5Fc2', 'Dean'),
(14, 2140141, 'Dixter Jake', 'Magramo', '2140141', '$2y$10$gKGJKItJu5tCRs.HwLEC1ensrvcYMJhJGe6BvfQa10y52RtntSq2e', 'Treasurer'),
(15, 2140142, 'Aldrin John', 'Matayabas', '2140142', '$2y$10$Xmn0w44bRlZqVu7LD1/nge794zn0PODlMlvBxsio3nUqR.HfhG1ty', 'Student'),
(16, 2140143, 'Villadores', 'Gerald', '2140143', '$2y$10$cG59nSyTPW.yvKr2IX5g6OUIGz/QGlP0Rh.v8MzOUXrx.3j3PsNeW', 'Student'),
(17, 1002, 'Jomar', 'Dagondon', '1002', '$2y$10$0Ak0FPDC3bnMgb9SGhKgte7.rQqS7VGetOaynNoF2JQiWm4bl0vG6', 'Dean'),
(18, 2140144, 'Magada', 'Pearl', '2140144', '$2y$10$g0Hd5TotsXDhtlyEj217JOPiDAccJq53SOe4V7XO28cOxVa/dUQQa', 'Treasurer'),
(19, 1003, 'Roxelle', 'katian', '1003', '$2y$10$qYCaDZsWI8Fvsm2PWlkXbOcvtIFBZdDYRvWeZGDmtux0L4FYViNIy', 'Dean'),
(20, 2140145, 'Louie', 'Cagas', '2140145', '$2y$10$QloLQ4/kwJTxdIkK.GEANeB/pMpF8mO8Jv6MRElaW6okmS3SCOqeC', 'Student'),
(21, 2140148, 'Winjee', 'Rife', '2140148', '$2y$10$Uawv4PJ5t/9euL.3PYvTEecxeL0NWTOo7NtCQrrJOgrqJbcW0OXHe', 'Student'),
(22, 2140149, 'Dixter', 'Madronero', '2140149', '$2y$10$FBXV2TIF4pvKNe7BaGeulOTyQFeY/cINFlHZXcrsVUPOA2UnivheK', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  ADD PRIMARY KEY (`msc_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prog_head`
--
ALTER TABLE `prog_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_systat`
--
ALTER TABLE `tbl_systat`
  ADD PRIMARY KEY (`ys_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2140150;

--
-- AUTO_INCREMENT for table `tbl_systat`
--
ALTER TABLE `tbl_systat`
  MODIFY `ys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
