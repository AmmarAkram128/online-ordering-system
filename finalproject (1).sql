-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 05:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `clientlogin`
--

CREATE TABLE `clientlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `telephoneNo` varchar(25) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clientlogin`
--

INSERT INTO `clientlogin` (`id`, `username`, `telephoneNo`, `address`, `email`, `password`) VALUES
(12, 'Ammar', '0764424906', '22matara', 'user@gmail.com', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `clientorder`
--

CREATE TABLE `clientorder` (
  `orderId` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `registationNumber` varchar(50) NOT NULL,
  `directorName` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `shippingAddress` text NOT NULL,
  `deliveryDate` date NOT NULL,
  `product` varchar(200) NOT NULL,
  `quantity` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clientorder`
--

INSERT INTO `clientorder` (`orderId`, `companyName`, `registationNumber`, `directorName`, `email`, `phoneNumber`, `shippingAddress`, `deliveryDate`, `product`, `quantity`) VALUES
(83, 'ammarrrrr', 'nibm', 'nibm', 'akramammar698@gmail.com', '0764424906', 'nibm.kandy', '2024-11-19', '', '{\"Wood Apple\":0,\"Neem\":\"22\",\"Bamboo\":\"33\",\"Termind\":\"44\"}'),
(84, 'ammarrrrr', 'nibm', 'nibm', 'akramammar698@gmail.com', '0764424906', 'nibm.kandy', '2024-11-07', '', '{\"Wood Apple\":0,\"Neem\":\"22\",\"Bamboo\":\"33\",\"Termind\":\"44\"}'),
(85, 'ammarrrrr', 'nibm', 'nibm', 'akramammar698@gmail.com', '0764424906', 'nibm.kandy', '2024-11-15', '', '{\"Wood Apple\":0,\"Neem\":\"22\",\"Bamboo\":\"33\",\"Termind\":\"44\"}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`) VALUES
(24, '6731030097cc6.jpg', 'Wood Apple', 'A tree bearing hard-shelled fruits with aromatic,   health-promoting pulp,\r\n                         often used in beverages, jams, and folk medicine.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientlogin`
--
ALTER TABLE `clientlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientorder`
--
ALTER TABLE `clientorder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientlogin`
--
ALTER TABLE `clientlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clientorder`
--
ALTER TABLE `clientorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
