-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 05:41 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bij`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catagoryID` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catagoryID`, `name`) VALUES
('c1', 'CPU'),
('com1', 'Computer'),
('grap1', 'Graphic Card'),
('io1', 'IO Devices'),
('main1', 'Mainboard'),
('mo1', 'Monitor'),
('mou1', 'Mouse'),
('nb1', 'Notebook'),
('ot1', 'Other Electronic Devices'),
('p1', 'Power Supply'),
('r1', 'Ram'),
('ram01', 'RAM1'),
('test1', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `computerpart`
--

CREATE TABLE `computerpart` (
  `ComputerPartSSN` int(10) NOT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(10) NOT NULL,
  `catagoryID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computerpart`
--

INSERT INTO `computerpart` (`ComputerPartSSN`, `item_name`, `Detail`, `Price`, `catagoryID`) VALUES
(60, 'notebook1', 'CPU : INTEL CORE I5-8250U \r\nRAM : 8 GB DDR4 \r\nHDD : 1 TB 5400 RPM\r\nDISPLAY : 15.6 FHD IPS\r\nVGA : GEFORCE MX150 2 GB\r\nOS : WINDOWS 10 HOME 64 BIT', 25, 'nb1'),
(63, 'MOUSE (เม้าส์) NEOLUTION E-SPORT PANTHER (BLACK) RGB', 'Rainbow Colour LED\r\n\r\n12 LED Modes switch by press wheel roller and forward key together\r\n\r\nGolden USB Plug\r\n\r\nBlack Braided Cable with Magnet with Golden USB Plug, 1.8 meter longer move freely\r\n\r\nAvago Optical Gaming Sensor\r\n\r\nAvago 3050 Gaming sensor, R', 790, 'mou1'),
(64, 'notebook2', 'this is notebook2', 35, 'nb1');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_detail`
--

CREATE TABLE `delivery_detail` (
  `OrderID` varchar(20) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_detail`
--

INSERT INTO `delivery_detail` (`OrderID`, `MemberID`, `firstname`, `lastname`, `email`, `address`, `status`) VALUES
('48239717', 17, 'sdasd', 'sadasda', 'sdasd', 'asdasdasd', 0),
('49088717', 17, 'sdasd', 'sadasda', 'sdasd', 'asdasdasd', 1),
('16274616', 16, 'sadasd', 'asdasd', 'asdasda', 'sdsadsd', 1),
('37167416', 16, 'sadasd', 'asdas', 'asdasd', 'asdasda', 0),
('41969516', 16, 'asdasd', 'asdasd', 'asdsad', 'asdasd', 0),
('37467916', 16, 'sadasd', 'asdas', 'asdsad', 'asdasdada', 0),
('41957416', 16, 'sadasd', 'asdas', 'asdsad', 'asdasdada', 0),
('41842316', 16, 'sadasd', 'asdas', 'asdsad', 'asdasdada', 0),
('17991716', 16, 'sadasd', 'sadasd', 'asdasd', 'asdasdad', 0),
('21267616', 16, 'asdas', 'asdasd', 'asdad', 'asdasdasd', 0),
('20614116', 16, '???????', '??????', 'aladen009@hotmail.com', 'thailand prathum thani', 0),
('10527216', 16, 'sda', 'asdasd', 'sdad', 'sdasdad', 0),
('27550216', 16, 'sadasd', 'adsa', 'asdasd', 'asdadas', 0),
('22567017', 17, 'test', 'daas', 'sdsa', 'asdadad', 1),
('13511017', 17, 'test', 'daas', 'sdsa', 'asdadad', 0),
('45806717', 17, '???????', '??????', 'aladen0009@gmail.com', 'sadasdsadad', 0),
('16189316', 16, 'ณัฐพนธ์', 'ขามกุล', 'aladen009@hotmail.com', 'thailand prathum thani', 0),
('26976316', 16, 'nuttapon', 'khamkul', 'test@example.com', 'sadasdasdadasds', 0),
('41612317', 17, 'nuttapon', 'khamkul', 'aladen009@hotmail.com', 'example address', 0),
('16189022', 22, 'ram', 'ramram', 'example@hotmail.com', 'thailand', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_directory`
--

CREATE TABLE `image_directory` (
  `ComputerPartSSN` int(10) NOT NULL,
  `directory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_directory`
--

INSERT INTO `image_directory` (`ComputerPartSSN`, `directory`) VALUES
(60, '/upload/60.jpg'),
(63, '/upload/63.jpg'),
(64, '/upload/64.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemberID` int(11) NOT NULL,
  `fname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `lname` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `birthdate` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `distrinct` varchar(15) NOT NULL,
  `road` varchar(15) NOT NULL,
  `postcode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemberID`, `fname`, `lname`, `birthdate`, `Gender`, `Email`, `city`, `distrinct`, `road`, `postcode`) VALUES
(16, 'Nuttapon', 'Khamkul', '1998-01-12', 'Male', 'aladen009@hotmail.co', 'Udonthani', 'Udonthani', '491/300', 41000),
(17, 'ณัฐพนธ์', 'ขามกุล', '1998-01-12', 'Male', 'aladen009@hotmail.co', 'udonthani', 'thailand', 'test', 41000),
(18, 'sdsadsad', 'asdsadas', '1916-10-18', 'Male', 'sadsadad', 'sdasdsadsadasd', 'sdasdasd', 'sdasdasd', 0),
(21, 'ทดสอบ', 'ผู้ใช้', '1931-08-17', 'Male', 'aladen009@hotmail.co', 'sadada', 'asdasd', 'sadasdad', 2132123),
(22, 'ram', 'lekjam', '1916-03-02', 'Male', 'example@example.com', 'prathum tharam', 'test', 'ramram', 12120);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(20) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `Price` int(10) NOT NULL,
  `OrderDate` varchar(100) NOT NULL,
  `ComputerPartName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `MemberID`, `Price`, `OrderDate`, `ComputerPartName`) VALUES
('48239717', 17, 2590, '2018-06-10 10:45:07pm', 'NOTEBOOK (โน้ตบุ๊ค) ACER ASPIRE A515-51G-560N (GRAY)'),
('49088717', 17, 2590, '2018-06-10 10:46:08pm', 'NOTEBOOK (โน้ตบุ๊ค) ACER ASPIRE A515-51G-560N (GRAY)'),
('16274616', 16, 2590, '2018-06-11 12:57:20am', 'NOTEBOOK (โน้ตบุ๊ค) ACER ASPIRE A515-51G-560N (GRAY)'),
('16274616', 16, 0, '2018-06-11 12:57:20am', 'test1'),
('37167416', 16, 2590, '2018-06-11 12:59:12am', 'MAINBOARD (เมนบอร์ด) 1151 ASROCK H270 PRO4 (KABY LAKE)'),
('41969516', 16, 0, '2018-06-11 01:00:07am', 'test1'),
('37467916', 16, 0, '2018-06-11 01:00:28am', 'test1'),
('41957416', 16, 0, '2018-06-11 01:01:02am', 'test1'),
('41842316', 16, 0, '2018-06-11 01:01:40am', 'test1'),
('17991716', 16, 2590, '2018-06-11 01:02:14am', 'NOTEBOOK (โน้ตบุ๊ค) ACER ASPIRE A515-51G-560N (GRAY)'),
('21267616', 16, 2590, '2018-06-11 01:03:03am', 'NOTEBOOK (โน้ตบุ๊ค) ACER ASPIRE A515-51G-560N (GRAY)'),
('20614116', 16, 2590, '2018-06-11 01:04:50am', 'NOTEBOOK (โน้ตบุ๊ค) ACER ASPIRE A515-51G-560N (GRAY)'),
('10527216', 16, 2590, '2018-06-11 01:05:48am', 'MAINBOARD (เมนบอร์ด) 1151 ASROCK H270 PRO4 (KABY LAKE)'),
('27550216', 16, 0, '2018-06-11 01:08:34am', 'test1'),
('22567017', 17, 0, '2018-06-11 01:10:48am', 'test1'),
('13511017', 17, 0, '2018-06-11 01:11:38am', 'test1'),
('45806717', 17, 0, '2018-06-11 01:12:11am', 'test1'),
('16189316', 16, 0, '2018-06-11 07:31:38am', 'test1'),
('26976316', 16, 0, '2018-06-11 07:37:48am', 'test1'),
('41612317', 17, 790, '2018-06-12 08:23:48am', 'MOUSE (เม้าส์) NEOLUTION E-SPORT PANTHER (BLACK) RGB'),
('16189022', 22, 35, '2018-06-12 09:07:34am', 'notebook2');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `MemberID` int(11) NOT NULL,
  `perm` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`MemberID`, `perm`) VALUES
(16, 1),
(17, 0),
(18, 0),
(21, 0),
(22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permission_list`
--

CREATE TABLE `permission_list` (
  `Perm_number` int(11) NOT NULL,
  `Perm_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_list`
--

INSERT INTO `permission_list` (`Perm_number`, `Perm_name`) VALUES
(0, 'Regular'),
(1, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE `profile_picture` (
  `MemberID` int(11) NOT NULL,
  `directory` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`MemberID`, `directory`) VALUES
(16, 'profile/16.jpg'),
(17, 'profile/17.jpg'),
(18, '/profile/man.jpg'),
(21, '/profile/man.jpg'),
(22, '/profile/man.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusID` int(2) NOT NULL,
  `Status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusID`, `Status_name`) VALUES
(0, 'Pending'),
(1, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `ComputerPartSSN` int(10) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`ComputerPartSSN`, `amount`) VALUES
(60, 20),
(63, 0),
(64, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(20) NOT NULL,
  `OrderID` varchar(20) NOT NULL,
  `Price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `OrderID`, `Price`) VALUES
(25099816, '22567017', 0),
(30842516, '16274616', 2771),
(34715916, '27214416', 2771),
(38348916, '49088717', 2771);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `MemberID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`MemberID`, `username`, `password`) VALUES
(16, 'admin', 'admin'),
(17, 'test', 'test'),
(18, 'sadasdsad', 'asdasdasdasdass'),
(21, 'username2', 'username2'),
(22, 'ram', 'ramram');

-- --------------------------------------------------------

--
-- Table structure for table `waranty`
--

CREATE TABLE `waranty` (
  `ComputerPartSSN` int(10) NOT NULL,
  `WarantyAmount` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waranty`
--

INSERT INTO `waranty` (`ComputerPartSSN`, `WarantyAmount`) VALUES
(60, 3),
(63, 1),
(64, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catagoryID`);

--
-- Indexes for table `computerpart`
--
ALTER TABLE `computerpart`
  ADD PRIMARY KEY (`ComputerPartSSN`);

--
-- Indexes for table `delivery_detail`
--
ALTER TABLE `delivery_detail`
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `image_directory`
--
ALTER TABLE `image_directory`
  ADD KEY `image_check` (`ComputerPartSSN`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD KEY `member_to_profile` (`MemberID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD KEY `perm` (`MemberID`);

--
-- Indexes for table `permission_list`
--
ALTER TABLE `permission_list`
  ADD PRIMARY KEY (`Perm_number`);

--
-- Indexes for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD KEY `stock_check` (`ComputerPartSSN`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `waranty`
--
ALTER TABLE `waranty`
  ADD KEY `waranty_check` (`ComputerPartSSN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computerpart`
--
ALTER TABLE `computerpart`
  MODIFY `ComputerPartSSN` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_directory`
--
ALTER TABLE `image_directory`
  ADD CONSTRAINT `image_check` FOREIGN KEY (`ComputerPartSSN`) REFERENCES `computerpart` (`ComputerPartSSN`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_to_profile` FOREIGN KEY (`MemberID`) REFERENCES `user` (`MemberID`);

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `perm` FOREIGN KEY (`MemberID`) REFERENCES `user` (`MemberID`);

--
-- Constraints for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD CONSTRAINT `profile-pic` FOREIGN KEY (`MemberID`) REFERENCES `user` (`MemberID`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_check` FOREIGN KEY (`ComputerPartSSN`) REFERENCES `computerpart` (`ComputerPartSSN`);

--
-- Constraints for table `waranty`
--
ALTER TABLE `waranty`
  ADD CONSTRAINT `waranty_check` FOREIGN KEY (`ComputerPartSSN`) REFERENCES `computerpart` (`ComputerPartSSN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
