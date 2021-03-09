-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 10:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videomotion`
--

-- --------------------------------------------------------

--
-- Table structure for table `exclusive`
--

CREATE TABLE `exclusive` (
  `exclu_id` int(11) NOT NULL,
  `exclu_title` varchar(255) NOT NULL,
  `exclu_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newarrival`
--

CREATE TABLE `newarrival` (
  `newarr_title` int(11) NOT NULL,
  `newarr_image` varchar(255) NOT NULL,
  `newarr_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `popular`
--

CREATE TABLE `popular` (
  `pop_id` int(11) NOT NULL,
  `pop_title` varchar(255) NOT NULL,
  `pop_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popular`
--

INSERT INTO `popular` (`pop_id`, `pop_title`, `pop_image`) VALUES
(1, 'Demo TItle', 'pic2.jpg'),
(2, 'The Popular 1', 'pic21.jpg'),
(3, 'The Popular 2', 'pic3.jpg'),
(4, 'This is the demo popular 3', 'pic31.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recommended`
--

CREATE TABLE `recommended` (
  `rec_id` int(11) NOT NULL,
  `rec_title` varchar(255) NOT NULL,
  `rec_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `screenvideo`
--

CREATE TABLE `screenvideo` (
  `scvid_id` int(11) NOT NULL,
  `scvid_title` varchar(255) NOT NULL,
  `scvid_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screenvideo`
--

INSERT INTO `screenvideo` (`scvid_id`, `scvid_title`, `scvid_file`) VALUES
(7, 'Demo Video', 'sample-mp4-file5.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exclusive`
--
ALTER TABLE `exclusive`
  ADD PRIMARY KEY (`exclu_id`);

--
-- Indexes for table `newarrival`
--
ALTER TABLE `newarrival`
  ADD PRIMARY KEY (`newarr_title`);

--
-- Indexes for table `popular`
--
ALTER TABLE `popular`
  ADD PRIMARY KEY (`pop_id`);

--
-- Indexes for table `recommended`
--
ALTER TABLE `recommended`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `screenvideo`
--
ALTER TABLE `screenvideo`
  ADD PRIMARY KEY (`scvid_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exclusive`
--
ALTER TABLE `exclusive`
  MODIFY `exclu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newarrival`
--
ALTER TABLE `newarrival`
  MODIFY `newarr_title` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `popular`
--
ALTER TABLE `popular`
  MODIFY `pop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recommended`
--
ALTER TABLE `recommended`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `screenvideo`
--
ALTER TABLE `screenvideo`
  MODIFY `scvid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
