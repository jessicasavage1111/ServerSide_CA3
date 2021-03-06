-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 07:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(34, 3, '11182', 'Haagen-Dazs Vanilla Ice Cream', '2021-03-18', '0.00', '11182.jpg'),
(35, 3, '76134', 'Shredded Chedder Cheese', '2021-03-17', '2.48', '76134.jpg'),
(36, 4, '53073', 'Brennan\'s Bread', '2021-03-10', '1.58', '53073.jpg'),
(37, 4, '76864', 'Mini Chocolate Chip Muffins', '2021-03-20', '3.74', '76864.jpg'),
(38, 4, '47699', 'Croissants', '2021-03-12', '1.56', '47699.jpeg'),
(39, 4, '21323', 'M&M Cookies', '2021-03-18', '2.68', '21323.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`),
  ADD UNIQUE KEY `productCode` (`code`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
