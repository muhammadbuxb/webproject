-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 07:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `product_price` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `c_id` int(44) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `Gmail` varchar(55) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`c_id`, `Name`, `Mobile`, `Gmail`, `Adress`, `amount`, `time`, `status`) VALUES
(29, 'wajee', '3434521445', 'wajee@gmail.com', 'Hyderabad', 0, '2021-10-13 11:40:16', 'Delivered'),
(30, 'Ghulam Nabi', '03211112120', 'gnabi@gmail.com', 'Jamshoro', 0, '2021-10-14 10:19:04', 'Delivered'),
(35, 'muhammad bux', '03123092323', 'ahmed@gmail.com', 'Village Muhammad Rahib Buriro Tal, Moro Distt, Naushahro  Feroze', 0, '2021-10-17 14:31:48', 'Delivered'),
(36, 'muhammad bux', '03123092323', 'ahmed@gmail.com', 'Village Muhammad Rahib Buriro Tal, Moro Distt, Naushahro  Feroze', 0, '2021-10-17 14:31:48', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user_name` varchar(55) NOT NULL,
  `phone` int(22) NOT NULL,
  `gmail` varchar(55) NOT NULL,
  `city` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_name`, `phone`, `gmail`, `city`, `password`) VALUES
(17, 'muhammadbuxb', 0, '', '', 'muhammad');

-- --------------------------------------------------------

--
-- Table structure for table `no_order`
--

CREATE TABLE `no_order` (
  `order_item_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `c_id` varchar(44) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_order`
--

INSERT INTO `no_order` (`order_item_id`, `product_id`, `date`, `c_id`, `quantity`) VALUES
(10, 32, '2021-10-14 10:19:05', '30', 3),
(19, 31, '2021-10-17 14:31:48', '35', 2),
(20, 31, '2021-10-17 14:31:48', '36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `product_price` int(11) NOT NULL,
  `image_path` varchar(44) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `image_path`, `date`) VALUES
(29, 'Jumbo Fajita', 1999, 'image/pizza5.png', '2021-10-10 18:30:01'),
(30, 'Large Fajita', 1299, 'image/pizza5.png', '2021-10-10 18:30:36'),
(31, 'Large Creamy', 2699, 'image/creemy.png', '2021-10-10 20:07:16'),
(32, 'Small Tikka', 499, 'image/pizza8.png', '2021-10-10 20:07:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `no_order`
--
ALTER TABLE `no_order`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `c_id` int(44) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `no_order`
--
ALTER TABLE `no_order`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
