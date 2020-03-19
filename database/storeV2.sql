-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 09:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `types` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `types`, `name`, `price`, `image`) VALUES
(1, 'Letter', 'test1', 700, 'img\\product\\Letter\\timeline_20200304_185954.jpg'),
(2, 'Letter', 'test2', 650, 'img\\product\\Letter\\timeline_20200304_190042.jpg'),
(3, 'Letter', 'test3', 600, 'img\\product\\Letter\\timeline_20200304_190129.jpg'),
(4, 'Letter', 'test4', 800, 'img\\product\\Letter\\timeline_20200304_190212.jpg'),
(5, 'Letter', 'test5', 800, 'img\\product\\Letter\\timeline_20200304_190240.jpg'),
(6, 'Letter', 'test6', 700, 'img\\product\\Letter\\timeline_20200304_190320.jpg'),
(7, 'Letter', 'test7', 600, 'img\\product\\Letter\\timeline_20200304_190350.jpg'),
(8, 'Letter', 'test8', 500, 'img\\product\\Letter\\timeline_20200304_190421.jpg'),
(9, 'Letter', 'test9', 700, 'img\\product\\Letter\\timeline_20200304_190559.jpg'),
(10, 'Letter', 'test10', 650, 'img\\product\\Letter\\timeline_20200304_190648.jpg'),
(11, 'Picture', 'test11', 700, 'img\\product\\Picture\\timeline_20200304_192348.jpg'),
(12, 'Picture', 'test12', 650, 'img\\product\\Picture\\timeline_20200304_192350.jpg'),
(13, 'Picture', 'test13', 650, 'img\\product\\Picture\\timeline_20200304_192351.jpg'),
(14, 'Picture', 'test14', 700, 'img\\product\\Picture\\timeline_20200304_192407.jpg'),
(15, 'Picture', 'test15', 600, 'img\\product\\Picture\\timeline_20200304_192409.jpg'),
(16, 'Picture', 'test16', 800, 'img\\product\\Picture\\timeline_20200304_192410.jpg'),
(17, 'Picture', 'test17', 800, 'img\\product\\Picture\\timeline_20200304_192431.jpg'),
(18, 'Picture', 'test18', 700, 'img\\product\\Picture\\timeline_20200304_192432.jpg'),
(19, 'Picture', 'test19', 600, 'img\\product\\Picture\\timeline_20200304_192437.jpg'),
(20, 'Picture', 'test20', 500, 'img\\product\\Picture\\timeline_20200304_192439.jpg'),
(21, 'DesignExample', 'test21', 700, 'img\\product\\Design\\timeline_20200308_205444.jpg'),
(22, 'DesignExample', 'test22', 650, 'img\\product\\Design\\timeline_20200308_205446.jpg'),
(23, 'DesignExample', 'test23', 700, 'img\\product\\Design\\timeline_20200308_205449.jpg'),
(24, 'DesignExample', 'test24', 650, 'img\\product\\Design\\timeline_20200308_205451.jpg'),
(25, 'DesignExample', 'test25', 600, 'img\\product\\Design\\timeline_20200308_205452.jpg'),
(26, 'DesignExample', 'test26', 800, 'img\\product\\Design\\timeline_20200308_205454.jpg'),
(27, 'DesignExample', 'test27', 800, 'img\\product\\Design\\timeline_20200308_205456.jpg'),
(28, 'DesignExample', 'test28', 700, 'img\\product\\Design\\timeline_20200308_205457.jpg'),
(29, 'DesignExample', 'test29', 600, 'img\\product\\Design\\timeline_20200308_205501.jpg'),
(30, 'DesignExample', 'test30', 500, 'img\\product\\Design\\timeline_20200308_205506.jpg');

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
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(4, 'yugesh verma', 'yugeshverma32@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '6263056779', 'bhilai', '25 commercial complex, nehru nagar,east near vijya bank, bhilai C.G.'),
(5, 'yugesh', 'yugeshverma@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9165063741', 'bhilai', 'bhilai'),
(6, 'admin', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '', '', '');

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
  `totalprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
