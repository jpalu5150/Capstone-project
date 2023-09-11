-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 11:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `capstone_orders`
--

CREATE TABLE `capstone_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_Number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_array` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capstone_orders`
--

INSERT INTO `capstone_orders` (`id`, `name`, `phone_Number`, `email`, `state`, `address`, `order_array`) VALUES
(1, 'Simon Brian Mbira', '+254768018446', 'bransin024@gmail.com', 'Central', 'Nairobi', 'a:2:{s:7:\"papa354\";a:5:{s:4:\"name\";s:12:\"Papaya Fruit\";s:4:\"code\";s:7:\"papa354\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:5:\"45.00\";s:5:\"image\";s:22:\"item-images/papaya.jpg\";}s:6:\"trop98\";a:5:{s:4:\"name\";s:14:\"Tropical-fruit\";s:4:\"code\";s:6:\"trop98\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:6:\"150.00\";s:5:\"image\";s:21:\"item-images/fruit.jpg\";}}'),
(5, 'Yobra Coder', '0768018446', 'yobracoder@gmail.com', 'nai', '00100', 'a:4:{s:7:\"papa354\";a:5:{s:4:\"name\";s:12:\"Papaya Fruit\";s:4:\"code\";s:7:\"papa354\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:5:\"45.00\";s:5:\"image\";s:22:\"item-images/papaya.jpg\";}s:7:\"pine767\";a:5:{s:4:\"name\";s:15:\"Pineapple Fruit\";s:4:\"code\";s:7:\"pine767\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:5:\"90.00\";s:5:\"image\";s:25:\"item-images/pineapple.jpg\";}s:6:\"PzLWuq\";a:5:{s:4:\"name\";s:8:\"Tropical\";s:4:\"code\";s:6:\"PzLWuq\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:6:\"300.00\";s:5:\"image\";s:58:\"item-images/1694437215istockphoto-1253407262-1024x1024.jpg\";}s:6:\"ClhfBk\";a:5:{s:4:\"name\";s:5:\"Guava\";s:4:\"code\";s:6:\"ClhfBk\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:5:\"10.00\";s:5:\"image\";s:74:\"item-images/1694414082360_F_308442270_cH4cpqdjrZsMwMtJX3P9T813ZynNKF4n.jpg\";}}'),
(6, 'Yobra Coder', '0768018446', 'bransin024@gmail.com', 'nai', '00100', 'a:2:{s:6:\"mix289\";a:5:{s:4:\"name\";s:12:\"Mixed-Fruits\";s:4:\"code\";s:6:\"mix289\";s:8:\"quantity\";s:1:\"1\";s:5:\"price\";s:6:\"200.00\";s:5:\"image\";s:28:\"item-images/mixed-fruits.jpg\";}s:6:\"bSlvIW\";a:5:{s:4:\"name\";s:6:\"banana\";s:4:\"code\";s:6:\"bSlvIW\";s:8:\"quantity\";s:1:\"6\";s:5:\"price\";s:5:\"30.00\";s:5:\"image\";s:133:\"item-images/1694333308png-transparent-juice-banana-food-auglis-flavor-banana-natural-foods-leaf-orange-thumbnail-removebg-preview.png\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `itemstable`
--

CREATE TABLE `itemstable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemstable`
--

INSERT INTO `itemstable` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Mango Fruit', 'mango63', 'item-images/mango.jpg', 20.00),
(2, 'Papaya Fruit', 'papa354', 'item-images/papaya.jpg', 45.00),
(3, 'Pineapple Fruit', 'pine767', 'item-images/pineapple.jpg', 90.00),
(5, 'Tropical-fruit', 'trop98', 'item-images/fruit.jpg', 150.00),
(6, 'banana', 'bSlvIW', 'item-images/1694333308png-transparent-juice-banana-food-auglis-flavor-banana-natural-foods-leaf-orange-thumbnail-removebg-preview.png', 30.00),
(8, 'Avocado', 'XrT87o', 'item-images/1694333551h0618g16207257173805.jpg', 50.00),
(9, 'Guava', 'ClhfBk', 'item-images/1694414082360_F_308442270_cH4cpqdjrZsMwMtJX3P9T813ZynNKF4n.jpg', 10.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `capstone_orders`
--
ALTER TABLE `capstone_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemstable`
--
ALTER TABLE `itemstable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capstone_orders`
--
ALTER TABLE `capstone_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itemstable`
--
ALTER TABLE `itemstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
