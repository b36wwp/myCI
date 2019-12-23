-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 05:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myci`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(10) NOT NULL,
  `member_code` varchar(50) DEFAULT NULL,
  `member_fname` varchar(50) DEFAULT NULL,
  `member_lname` varchar(50) DEFAULT NULL,
  `member_citizen_id` varchar(15) DEFAULT NULL,
  `member_gender` varchar(50) DEFAULT NULL,
  `member_tel` text,
  `member_address` text,
  `member_expired_date` date DEFAULT NULL,
  `member_date_create` date DEFAULT NULL,
  `member_point` int(11) DEFAULT NULL,
  `member_datetime_create` datetime DEFAULT NULL,
  `member_datetime_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_prefix` varchar(10) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` text NOT NULL,
  `user_status` int(10) NOT NULL,
  `user_date_create` date NOT NULL,
  `user_datetime_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_prefix`, `user_fname`, `user_lname`, `user_email`, `user_status`, `user_date_create`, `user_datetime_create`) VALUES
(1, 'admin', 'admin', 'Mr.', 'Administrator', 'Ci', 'north.thunpisit@hotmail.com', 999, '2019-02-20', '2019-02-20 17:07:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
