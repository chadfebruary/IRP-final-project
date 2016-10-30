-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2016 at 01:29 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `MembershipID` int(11) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Name`, `MembershipID`, `Username`, `Password`) VALUES
(3, 'Name', NULL, 'username', 'password'),
(4, 'a', NULL, 'b', 'c'),
(6, 'Chad', NULL, 'February', 'password'),
(7, 'test', NULL, 'test', 'test'),
(8, 'sdfhg', NULL, 'rth', 'ty'),
(9, 'anita', NULL, 'anita', 'anita');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `productID` varchar(10) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `weight` varchar(50) NOT NULL,
  `price` float DEFAULT NULL,
  `amountavailable` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`productID`, `picture`, `name`, `description`, `weight`, `price`, `amountavailable`) VALUES
('COFFEE003', 'camera.jpg', 'Sumatra Supreme Coffee', 'One of the finest coffees in the world, medium roasted to accentuate its robust character.', '5 pounds', 29.95, 23),
('COFFEE004', 'camera.jpg', 'Pure Kona Coffee', 'Grown and processed using traditional Hawaiian methods, then roasted in small batches to maintain peak freshness and flavor.', '10 ounces', 21.45, 432),
('COFFEE005', 'camera.jpg', 'Guatemala Antigua Coffee', 'An outstanding coffee with a rich, spicy, and smokey flavor.', '10 ounces', 7.5, 45),
('COFFEE001', 'camera.jpg', 'Jamaican Blue Mountain Coffee', 'This extraordinary coffee, famous for its exquisite flavor and strong body, is grown in teh majestic Blue Mountain range in Jamaica.', '1 pound', 22.95, 564),
('COFFEE002', 'camera.jpg', 'Blue Grove Hawaiian Maui Premium Coffee', 'This delightful coffee has an aroma that is captivatingly rich and nutty with a faint hint of citrus.', '1 pound', 18.89, 12),
('test', 'camera.jpg', 'test', 'test', 'test', 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemID` int(11) NOT NULL,
  `MenuID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemID`, `MenuID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `MembershipID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `RegistrationDate` datetime DEFAULT NULL,
  `MembershipType` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(11) NOT NULL,
  `ItemName` varchar(30) DEFAULT NULL,
  `ItemPrice` float DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `ItemName`, `ItemPrice`, `Quantity`, `Description`) VALUES
(1, 'Coffee', 10, 1, 'Coffee');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `ProductID` varchar(255) NOT NULL,
  `CustomerUsername` varchar(200) DEFAULT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `ProductID`, `CustomerUsername`, `Quantity`) VALUES
(81, 'COFFEE004', 'username', 7),
(82, 'COFFEE002', 'username', 92),
(83, 'COFFEE005', 'username', 3),
(84, 'COFFEE001', 'username', 14),
(85, 'COFFEE002', '', 92),
(86, 'COFFEE001', '', 14),
(87, 'COFFEE002', '', 92),
(88, 'COFFEE002', '', 92);

-- --------------------------------------------------------

--
-- Table structure for table `store_info`
--

CREATE TABLE `store_info` (
  `storeID` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `welcome` text,
  `css_file` varchar(250) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `TransactionDate` datetime DEFAULT NULL,
  `Total` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `ProductID` varchar(200) DEFAULT NULL,
  `CustomerUsername` varchar(15) DEFAULT NULL,
  `transactiondate` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `quantity`, `price`, `ProductID`, `CustomerUsername`, `transactiondate`) VALUES
(55, 100, 18.89, 'COFFEE002', '', '2016/10/29 10:21:56am'),
(54, 14, 22.95, 'COFFEE001', '', '2016/10/29 10:21:56am'),
(53, 100, 18.89, 'COFFEE002', '', '2016/10/29 10:21:56am'),
(52, 14, 22.95, 'COFFEE001', 'username', '2016/10/29 10:21:56am'),
(51, 3, 7.5, 'COFFEE005', 'username', '2016/10/29 10:21:56am'),
(50, 100, 18.89, 'COFFEE002', 'username', '2016/10/29 10:21:56am'),
(49, 7, 21.45, 'COFFEE004', 'username', '2016/10/29 10:21:56am'),
(48, 1, 18.89, 'COFFEE002', '', '2016/10/29 10:19:20am'),
(47, 1, 18.89, 'COFFEE002', '', '2016/10/29 10:19:20am'),
(46, 14, 22.95, 'COFFEE001', '', '2016/10/29 10:19:20am'),
(45, 1, 18.89, 'COFFEE002', '', '2016/10/29 10:19:20am'),
(44, 14, 22.95, 'COFFEE001', 'username', '2016/10/29 10:19:20am'),
(43, 3, 7.5, 'COFFEE005', 'username', '2016/10/29 10:19:20am'),
(42, 3, 18.89, 'COFFEE002', 'username', '2016/10/29 10:19:20am'),
(41, 7, 21.45, 'COFFEE004', 'username', '2016/10/29 10:19:20am'),
(56, 100, 18.89, 'COFFEE002', '', '2016/10/29 10:21:56am'),
(57, 7, 21.45, 'COFFEE004', 'username', '2016/10/29 12:44:08pm'),
(58, 97, 18.89, 'COFFEE002', 'username', '2016/10/29 12:44:08pm'),
(59, 3, 7.5, 'COFFEE005', 'username', '2016/10/29 12:44:08pm'),
(60, 14, 22.95, 'COFFEE001', 'username', '2016/10/29 12:44:08pm'),
(61, 97, 18.89, 'COFFEE002', '', '2016/10/29 12:44:08pm'),
(62, 14, 22.95, 'COFFEE001', '', '2016/10/29 12:44:08pm'),
(63, 97, 18.89, 'COFFEE002', '', '2016/10/29 12:44:08pm'),
(64, 97, 18.89, 'COFFEE002', '', '2016/10/29 12:44:08pm'),
(65, 7, 21.45, 'COFFEE004', 'username', '2016/10/29 01:29:07pm'),
(66, 92, 18.89, 'COFFEE002', 'username', '2016/10/29 01:29:07pm'),
(67, 3, 7.5, 'COFFEE005', 'username', '2016/10/29 01:29:07pm'),
(68, 14, 22.95, 'COFFEE001', 'username', '2016/10/29 01:29:07pm'),
(69, 92, 18.89, 'COFFEE002', '', '2016/10/29 01:29:07pm'),
(70, 14, 22.95, 'COFFEE001', '', '2016/10/29 01:29:07pm'),
(71, 92, 18.89, 'COFFEE002', '', '2016/10/29 01:29:07pm'),
(72, 92, 18.89, 'COFFEE002', '', '2016/10/29 01:29:07pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `MembershipID` (`MembershipID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `MenuID` (`MenuID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`MembershipID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CustomerUsername` (`CustomerUsername`);

--
-- Indexes for table `store_info`
--
ALTER TABLE `store_info`
  ADD PRIMARY KEY (`storeID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CustomerUsername` (`CustomerUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `MembershipID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
