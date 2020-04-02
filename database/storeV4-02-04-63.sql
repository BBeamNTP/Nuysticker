-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 12:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('Not paid','Paid') NOT NULL,
  `time` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `user_id`, `status`, `time`) VALUES
(1, 7, 'Paid', '2 เม.ย. 2563, 16:49 น.');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `types` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `types`, `name`, `price`, `image`, `stock`) VALUES
(1, 'Letter', 'test1', 700, 'img\\product\\Letter\\timeline_20200304_185954.jpg', 1000),
(2, 'Letter', 'test2', 650, 'img\\product\\Letter\\timeline_20200304_190042.jpg', 1000),
(3, 'Letter', 'test3', 600, 'img\\product\\Letter\\timeline_20200304_190129.jpg', 1000),
(4, 'Letter', 'test4', 800, 'img\\product\\Letter\\timeline_20200304_190212.jpg', 1000),
(5, 'Letter', 'test5', 800, 'img\\product\\Letter\\timeline_20200304_190240.jpg', 1000),
(6, 'Letter', 'test6', 700, 'img\\product\\Letter\\timeline_20200304_190320.jpg', 1000),
(7, 'Letter', 'test7', 600, 'img\\product\\Letter\\timeline_20200304_190350.jpg', 1000),
(8, 'Letter', 'test8', 500, 'img\\product\\Letter\\timeline_20200304_190421.jpg', 1000),
(9, 'Letter', 'test9', 700, 'img\\product\\Letter\\timeline_20200304_190559.jpg', 1000),
(10, 'Letter', 'test10', 650, 'img\\product\\Letter\\timeline_20200304_190648.jpg', 1000),
(11, 'Picture', 'test11', 700, 'img\\product\\Picture\\timeline_20200304_192348.jpg', 1000),
(12, 'Picture', 'test12', 650, 'img\\product\\Picture\\timeline_20200304_192350.jpg', 1000),
(13, 'Picture', 'test13', 650, 'img\\product\\Picture\\timeline_20200304_192351.jpg', 1000),
(14, 'Picture', 'test14', 700, 'img\\product\\Picture\\timeline_20200304_192407.jpg', 1000),
(15, 'Picture', 'test15', 600, 'img\\product\\Picture\\timeline_20200304_192409.jpg', 1000),
(16, 'Picture', 'test16', 800, 'img\\product\\Picture\\timeline_20200304_192410.jpg', 1000),
(17, 'Picture', 'test17', 800, 'img\\product\\Picture\\timeline_20200304_192431.jpg', 1000),
(18, 'Picture', 'test18', 700, 'img\\product\\Picture\\timeline_20200304_192432.jpg', 1000),
(19, 'Picture', 'test19', 600, 'img\\product\\Picture\\timeline_20200304_192437.jpg', 1000),
(20, 'Picture', 'test20', 500, 'img\\product\\Picture\\timeline_20200304_192439.jpg', 1000),
(21, 'DesignExample', 'test21', 700, 'img\\product\\Design\\timeline_20200308_205444.jpg', 1000),
(22, 'DesignExample', 'test22', 650, 'img\\product\\Design\\timeline_20200308_205446.jpg', 1000),
(23, 'DesignExample', 'test23', 700, 'img\\product\\Design\\timeline_20200308_205449.jpg', 1000),
(24, 'DesignExample', 'test24', 650, 'img\\product\\Design\\timeline_20200308_205451.jpg', 1000),
(25, 'DesignExample', 'test25', 600, 'img\\product\\Design\\timeline_20200308_205452.jpg', 1000),
(26, 'DesignExample', 'test26', 800, 'img\\product\\Design\\timeline_20200308_205454.jpg', 1000),
(27, 'DesignExample', 'test27', 800, 'img\\product\\Design\\timeline_20200308_205456.jpg', 1000),
(28, 'DesignExample', 'test28', 700, 'img\\product\\Design\\timeline_20200308_205457.jpg', 1000),
(29, 'DesignExample', 'test29', 600, 'img\\product\\Design\\timeline_20200308_205501.jpg', 1000),
(30, 'DesignExample', 'test30', 500, 'img\\product\\Design\\timeline_20200308_205506.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `status`) VALUES
(6, 'admin', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '', '', '', 'Admin'),
(7, 'beam', 'beam@mail.com', '14e1b600b1fd579f47433b88e8d85291', '', '', '', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL,
  `quantity` int(100) NOT NULL,
  `totalprice` float NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status`, `quantity`, `totalprice`, `bill_id`) VALUES
(297, 7, 1, 'Confirmed', 1, 700, 1),
(298, 7, 2, 'Confirmed', 1, 650, 1),
(299, 7, 1, 'Added to cart', 1, 700, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
