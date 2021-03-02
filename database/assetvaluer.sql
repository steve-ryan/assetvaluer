-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 03:51 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `accident_status`
--

CREATE TABLE `accident_status` (
  `acc_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `pers` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accident_status`
--

INSERT INTO `accident_status` (`acc_id`, `name`, `pers`) VALUES
(2, 'average', 0.02),
(4, 'good', 0);

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
(1, 'ebf7e62abaa2db8e332e3e4662658308', 'fav@gmail.com', 'fav', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `bname` varchar(70) NOT NULL,
  `persb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `bname`, `persb`) VALUES
(10, 'toyota', 0.12);

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
(1, 'jane', 'jane@gmail.com', '2342'),
(2, 'sam', 'samuelkagocha4@gmail.com', '909090'),
(3, 'otieno', 'otieno@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `password`, `email`, `status`) VALUES
(1, 'random', '7ddf32e17a6ac5ce04a8ecbf782ca509', 'random@gmail.com', 1),
(2, 'britam', '7ef4697b7710d38deda79c172a186587', 'britam@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kondition`
--

CREATE TABLE `kondition` (
  `condition_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `pers` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondition`
--

INSERT INTO `kondition` (`condition_id`, `name`, `pers`) VALUES
(2, 'average', 0.02),
(4, 'good', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `final_cost` varchar(200) NOT NULL,
  `kdate` date NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `final_cost`, `kdate`, `vehicle_id`, `company_id`) VALUES
(4, '4,447,484.40', '2021-02-24', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `tname` varchar(70) NOT NULL,
  `tper` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `tname`, `tper`) VALUES
(7, 'commercial', 0.02),
(8, 'private', 0.01);

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
  `assessor_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `model`, `chassis_no`, `yom`, `reg_no`, `picture`, `cost`, `client_id`, `brand_id`, `type_id`, `assessor_id`, `condition_id`, `acc_id`, `company_id`) VALUES
(2, 'wagon', 'chassis1', '2021-02-01', 'reg', './../uploads/39329xavier-rabasa--zbz_ejj4to-unsplash.jpg', 4500000, 2, 10, 7, 1, 2, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accident_status`
--
ALTER TABLE `accident_status`
  ADD PRIMARY KEY (`acc_id`);

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
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `kondition`
--
ALTER TABLE `kondition`
  ADD PRIMARY KEY (`condition_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `company_id` (`company_id`);

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
  ADD KEY `assessor_id` (`assessor_id`),
  ADD KEY `condition_id` (`condition_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accident_status`
--
ALTER TABLE `accident_status`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessor`
--
ALTER TABLE `assessor`
  MODIFY `assessor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kondition`
--
ALTER TABLE `kondition`
  MODIFY `condition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `vehicle_ibfk_4` FOREIGN KEY (`assessor_id`) REFERENCES `assessor` (`assessor_id`),
  ADD CONSTRAINT `vehicle_ibfk_5` FOREIGN KEY (`condition_id`) REFERENCES `kondition` (`condition_id`),
  ADD CONSTRAINT `vehicle_ibfk_6` FOREIGN KEY (`acc_id`) REFERENCES `accident_status` (`acc_id`),
  ADD CONSTRAINT `vehicle_ibfk_7` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
