-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 10:59 PM
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
-- Database: `ca2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Fruit'),
(2, 'Vegetable'),
(3, 'Dairy'),
(4, 'Bakery');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `reason` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `date`, `reason`, `message`) VALUES
('Jessica Savage', 'JessicaSavage1111@Hotmail.com', '2021-04-15', 'Late Delivery', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
CREATE TABLE `deliveries` (
  `deliveryID` int(11) NOT NULL,
  `progress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`deliveryID`, `progress`) VALUES
(1, 'Delivered'),
(2, 'Dispatched'),
(3, 'Order Processing');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `foodID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expiryDate` date NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `categoryID`, `code`, `name`, `expiryDate`, `price`, `image`) VALUES
(20, 1, '47103', 'Apples', '2021-03-11', '4.10', '47103.jpg'),
(21, 1, '43253', 'Oranges', '2021-02-13', '7.50', '43253.jpg'),
(22, 1, '12462', 'Bananas', '2021-03-16', '1.98', '12462.jpeg\r\n'),
(23, 1, '31888', 'Grapes', '2021-03-14', '2.99', '31888.jpg'),
(24, 1, '80261', 'Strawberries', '2021-03-15', '7.10', '80261.jpg'),
(26, 2, '31115', 'Peppers', '2021-03-22', '5.00', '31115.jpeg'),
(27, 2, '74499', 'Onions', '2021-03-19', '4.75', '74499.jpg'),
(28, 2, '40161', 'Potatoes', '2021-03-26', '14.60', '40161.jpg'),
(29, 2, '41234', 'Carrots', '2021-03-19', '3.56', '41234.jpg'),
(30, 2, '95779', 'Broccoli', '2021-03-16', '1.05', '95779.jpg'),
(31, 3, '32631', 'Whole Milk', '2021-03-10', '2.68', '32631.jpg'),
(32, 3, '39104', 'Low Fat Milk', '2021-03-14', '2.99', '39104.webp'),
(33, 3, '51764', 'Yogurt', '2021-03-13', '3.00', '51764.jpg'),
(34, 3, '11182', 'Haagen-Dazs Vanilla Ice Cream', '2021-03-18', '4.50', '11182.jpg'),
(35, 3, '76134', 'Shredded Chedder Cheese', '2021-03-17', '2.48', '76134.jpg'),
(36, 4, '53073', 'Brennan\'s Bread', '2021-03-10', '1.58', '53073.jpg'),
(37, 4, '76864', 'Mini Chocolate Chip Muffins', '2021-03-20', '3.74', '76864.jpg'),
(38, 4, '47699', 'Croissants', '2021-03-12', '1.56', '47699.jpeg'),
(39, 4, '21323', 'M&M Cookies', '2021-03-18', '2.68', '21323.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `foodID` int(11) NOT NULL,
  `deliveryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `foodID`, `deliveryID`, `name`, `address`, `email`, `number`) VALUES
(1, 20, 1, 'Jessica Savage', '4 Ballygarth Manor', 'JessicaSavage1111@Hotmail.com', 2),
(2, 33, 2, 'Emma Savage', '4 Ballygarth Manor', 'EmmaSavage1111@Hotmail.com', 1),
(3, 38, 3, 'Sarah Savage', '17 Grange Rath', 'Sarah@hotmail.com', 4),
(4, 26, 2, 'Laura Savage', '12 Shire Ridge', 'Laura1111@Hotmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(6, 'D00227023', '$2y$12$ecvAolMmMo.yl.7U7W4wy.kMo2NJkrBcZd9IkjM.fiUfiWQhFYwEa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`deliveryID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`),
  ADD UNIQUE KEY `productCode` (`code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `deliveryID` (`deliveryID`),
  ADD KEY `foodID` (`foodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
