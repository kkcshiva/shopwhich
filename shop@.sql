-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2016 at 12:48 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop@`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `stadmin_id` int(20) NOT NULL,
  `mailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`stadmin_id`, `mailid`, `password`, `role`, `status`) VALUES
(1, 'ravi@gmail.com', 'shop@123', 'ADMIN', 1),
(2, 'satish@gmail.com', 'shop@123', 'SHOPADMIN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `discription`, `status`) VALUES
(1, 'Women''s Fashion', 'women cloths ', 1),
(2, 'Men''s Fashion', 'Men''s Fashion', 1),
(3, 'Mobile', 'mobile', 1),
(4, 'Sports', 'sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `storeid` int(20) NOT NULL,
  `rating` int(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `userid`, `storeid`, `rating`, `message`) VALUES
(1, 2, 1, 6, 'Good store i get all things'),
(2, 2, 2, 7, 'VaryGood store i get all things'),
(3, 1, 2, 8, 'Vary nice all things'),
(4, 1, 1, 9, 'grate things'),
(5, 3, 2, 7, 'VaryGood bazar'),
(6, 3, 1, 10, 'the best store');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_descript` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `remark` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `address` text NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `st_name`, `st_descript`, `image`, `remark`, `status`, `address`, `contactno`, `lat`, `lng`, `reg_date`, `products`) VALUES
(1, 'brand factory', 'new and good things available', './upload/stores/bf.jpg', 'tested work fine', 1, 'kukatpally,\r\nhyderabadh', '9000203799', 17.254156, 73.451256, '2016-01-31 18:54:30', 'mens,sports'),
(2, 'big bhajar', 'new and good things available', './upload/stores/bb.jpg', 'tested work fine', 1, 'ameerpet,\r\nhyderabadh', '9000203799', 17.254156, 73.451256, '2016-01-31 18:55:39', 'Woman,mobiles');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `status` int(12) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `emailid`, `password`, `phone`, `status`, `created_date`) VALUES
(1, 'satish kumar s', 'satish@ishasoftwares.com', 'isha@123', '9000203799', 1, '2016-01-31 09:16:45'),
(2, 'ravi krishna s', 'ravi@ishasoftwares.com', 'isha@123', '9000203799', 1, '2016-01-31 09:17:20'),
(3, 'siva kumar s', 'siva@ishasoftwares.com', 'isha@123', '9000203799', 0, '2016-01-31 12:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`stadmin_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
