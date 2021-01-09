-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2021 at 07:11 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetvaluer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(70) NOT NULL,
  `admin_password` varchar(70) NOT NULL,
  `admin_email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_email`) VALUES
(1, 'sam', '13b4ad5501469967b8ef25b73e24c3d0', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `assessor`
--

CREATE TABLE `assessor` (
  `assessor_id` int(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `name` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessor`
--

INSERT INTO `assessor` (`assessor_id`, `password`, `email`, `name`, `status`) VALUES
(7, '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', 'test', 1),
(8, 'd69403e2673e611d4cbd3fad6fd1788e', 'devsteveryan@gmail.com', 'Sprout Foundation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `pers` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `pers`) VALUES
(1, 'BMW', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone_no` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `email`, `phone_no`) VALUES
(1, 'steve', 'devsteveryan@gmail.com', '+254756949393'),
(2, 'jjjjj', 'jjjj@app.ke', '+254756949393'),
(3, 'assessor', 'assessor@gmail.com', '+254756949393'),
(4, 'test', 'testt@gmail.com', '0756121394'),
(5, 'devsteveryan@gmail.com', 'devsteveryan21@gmail.com', '+254756949393');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` varchar(70) NOT NULL,
  `vehicle_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `date`, `value`, `vehicle_id`) VALUES
(14, '2020-12-21', '12,014,984.79', 56),
(15, '2020-12-22', '3,601,338.11', 58),
(16, '2020-12-24', '5,742,643.65', 57),
(18, '2020-12-26', '5,735,481.57', 57),
(19, '2021-01-08', '138,729.74', 59);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `per` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`, `per`) VALUES
(1, 'private', 0.003),
(2, 'commercial', 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `model` varchar(70) NOT NULL,
  `chassis_no` varchar(70) NOT NULL,
  `yom` date NOT NULL,
  `reg_no` varchar(70) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `cost` int(70) NOT NULL,
  `client_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `assessor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `model`, `chassis_no`, `yom`, `reg_no`, `picture`, `cost`, `client_id`, `brand_id`, `type_id`, `assessor_id`) VALUES
(56, 'model', 'kkkkk', '2020-12-23', 'reg', './../uploads/377754booking.png', 12000000, 3, 1, 1, 7),
(57, '10', 'qq', '2020-12-08', '11', './../uploads/650300certificate.jpeg', 5800000, 2, 1, 1, 7),
(58, 'steve', 'kkkkk', '2016-06-22', 'reg1k', './../uploads/366732diplomat.png', 10000000, 1, 1, 1, 8),
(59, 'model12', 'chassis11', '2018-10-08', 'crazy11', './../uploads/677290signature_opcbe9vbjtt7ldk0ld.png', 250000, 5, 1, 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assessor`
--
ALTER TABLE `assessor`
  ADD PRIMARY KEY (`assessor_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `assessor_id` (`assessor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessor`
--
ALTER TABLE `assessor`
  MODIFY `assessor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `vehicle_ibfk_4` FOREIGN KEY (`assessor_id`) REFERENCES `assessor` (`assessor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
