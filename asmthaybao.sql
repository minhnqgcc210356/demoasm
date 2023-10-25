-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 06:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asmthaybao`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clieid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clieid`, `name`, `password`, `phone`, `gmail`) VALUES
(1, 'asd', '123123', '012313123', '2313123@gmail.com'),
(2, 'asdasd', '123123', '123123123', '123123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emid` int(20) NOT NULL,
  `emname` varchar(30) NOT NULL,
  `emphone` varchar(20) NOT NULL,
  `emaddress` varchar(30) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `emgender` tinyint(1) NOT NULL,
  `emdayofbirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emid`, `emname`, `emphone`, `emaddress`, `gmail`, `emgender`, `emdayofbirth`) VALUES
(1, 'minh', '0978211212', 'An Giang', 'asdasd@gmail.com', 0, '2023-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `order detail`
--

CREATE TABLE `order detail` (
  `ordid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantiy` int(11) NOT NULL,
  `proid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `orddate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `emid` int(11) NOT NULL,
  `clieid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proid` int(11) NOT NULL,
  `stoid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `emid` int(20) NOT NULL,
  `supid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proid`, `stoid`, `name`, `price`, `quantity`, `image`, `dob`, `emid`, `supid`) VALUES
(1, 1, 'Professors of Hogwarts™', '339000', 50, 'image2.png', '2023-10-18', 1, 1),
(2, 1, 'Mini Disney The Haunted Mansion', '379000', 50, 'image3.png', '2023-10-18', 1, 1),
(3, 1, 'The Pumpkin Farm', '269000', 50, 'image6.png', '2023-10-18', 1, 1),
(4, 1, 'Ghostbusters™ ECTO-1', '185000', 50, 'image4.png', '2023-10-18', 1, 1),
(5, 1, 'Viking Village', '269000', 50, 'image7.png', '2023-10-16', 1, 2),
(6, 1, 'Venomized Groot', '219000', 40, 'image5.png', '2023-10-16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `stoid` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`stoid`, `address`, `phone`, `gmail`) VALUES
(1, 'An Giang', '024564928', 'asm1644@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supid` int(20) NOT NULL,
  `supname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supid`, `supname`) VALUES
(1, 'assembly model'),
(2, 'kit model');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clieid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emid`);

--
-- Indexes for table `order detail`
--
ALTER TABLE `order detail`
  ADD PRIMARY KEY (`ordid`,`proid`),
  ADD KEY `odt2_fk` (`proid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordid`),
  ADD KEY `ord1_fk` (`emid`),
  ADD KEY `ord2_fk` (`clieid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proid`),
  ADD KEY `pro1_fk` (`emid`),
  ADD KEY `pro2_fk` (`supid`),
  ADD KEY `pro3_fk` (`stoid`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`stoid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clieid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `stoid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order detail`
--
ALTER TABLE `order detail`
  ADD CONSTRAINT `odt1_fk` FOREIGN KEY (`ordid`) REFERENCES `orders` (`ordid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
