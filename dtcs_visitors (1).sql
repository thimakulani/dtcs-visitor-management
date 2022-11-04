-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 11:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtcs_visitors`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `Name` longtext DEFAULT NULL,
  `Lastname` longtext DEFAULT NULL,
  `Email` longtext DEFAULT NULL,
  `PhoneNumber` longtext DEFAULT NULL,
  `IdNumber` longtext DEFAULT NULL,
  `Username` longtext DEFAULT NULL,
  `Password` longtext DEFAULT NULL,
  `Role` int(11) NOT NULL,
  `AccountStatus` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Name`, `Lastname`, `Email`, `PhoneNumber`, `IdNumber`, `Username`, `Password`, `Role`, `AccountStatus`) VALUES
(1, 'Thima', 'Sigauque', 'thimakulani@gmail.com', '0713934923', '23456789', NULL, '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 1, 'Active'),
(2, 'Admin', 'User', 'admin@admin.com', '1234567890', '1234567890', NULL, 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `afterhourregisters`
--

CREATE TABLE `afterhourregisters` (
  `Id` int(11) NOT NULL,
  `Percal` int(11) NOT NULL,
  `Purpose` longtext DEFAULT NULL,
  `DateIn` date NOT NULL,
  `DateOut` date NOT NULL,
  `TimeIn` time(6) NOT NULL,
  `TimeOut` time(6) NOT NULL,
  `EntranceId` int(11) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `SecurityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `District_Id` int(11) NOT NULL,
  `District` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`District_Id`, `District`) VALUES
(1, 'Head Office : Pool Section'),
(2, 'Head Office : Manenu'),
(3, 'Head Office : Traffic Management'),
(4, 'Head Office : MEC Office'),
(5, 'Capricorn : District Office'),
(6, 'Capricorn : Seshego Govt Garage'),
(9, 'Capricorn : Polokwane Traffic Station'),
(10, 'Capricorn : Mogwadi Traffic Station'),
(13, 'Capricorn : Polokwane Traffic Station'),
(14, 'Capricorn : Polokwane Weight Bridge'),
(15, 'Capricorn : Lebowakgomo Traffic Station'),
(16, 'Capricorn : Mokomene Traffic Station'),
(17, 'Sekhukhune: Dilokong Traffic Station'),
(18, 'Sekhukhune: District Office'),
(22, 'Sekhukhune: Lebowakgomo Govt Garage'),
(24, 'Sekhukhune: Moutse Traffic Station'),
(26, 'Sekhukhune: Nebo Government Garage'),
(27, 'Sekhukhune: Nebo Traffic Station'),
(28, 'Sekhukhune: Rathoke Weighbridge'),
(32, 'Vhembe: District Office'),
(34, 'Vhembe: Makhado Traffic Station'),
(35, 'Vhembe: Dzanani Traffic Station'),
(37, 'Vhembe: Malamulele Traffic Station'),
(38, 'Vhembe: Musina Weigh Bridge'),
(39, 'Vhembe: Mutale Traffic Station'),
(40, 'Vhembe: Sibasa Govt Garage'),
(41, 'Vhembe: Thohoyandou Traffic Station'),
(42, 'Vhembe: Mampakuil Weigh Bridge'),
(43, 'Vhembe: Rabali Traffic Station'),
(45, 'Mopani: Bolobedu Traffic Station'),
(46, 'Mopani: District Office'),
(50, 'Mopani: Giyani Traffic Station'),
(51, 'Mopani: Giyani Government Garage'),
(52, 'Mopani: Mooketsi T-C-Centre'),
(55, 'Mopani: Hoedspruit Traffic Station'),
(58, 'Mopani: Ba-Phalaborwa Traffic Station'),
(63, 'Mopani: Naphuno Traffic Station'),
(67, 'Mopani: Ritavi Traffic Station'),
(70, 'Mopani: Tzaneen Traffic Station'),
(71, 'Mopani: Maruleng Traffic Station'),
(79, 'Waterberg: District Office'),
(82, 'Waterberg: Groblersbrug Traffic Control'),
(86, 'Waterberg: Lephalale Traffic Centre'),
(87, 'Waterberg: Mahwelereng Govt Garage'),
(88, 'Waterberg: Mantsole Traffic Centre'),
(91, 'Waterberg: Modimolle Traffic Centre'),
(94, 'Waterberg: Mokopane Traffic Station'),
(98, 'Waterberg: Northam Traffic Station'),
(99, 'Waterberg: Nylstroom Traffic Station'),
(105, 'Waterberg: Zebetiela Traffic Control Cen'),
(106, 'Thima'),
(107, 'Thima2');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Id` int(11) NOT NULL,
  `Percal` int(11) NOT NULL,
  `Name` longtext DEFAULT NULL,
  `LastName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Id`, `Percal`, `Name`, `LastName`) VALUES
(1, 1234, 'Thima', 'sigauque'),
(2, 2147483647, 'Thima', 'Sigauque'),
(4, 333333, 'xdgfh', 'Sigauque'),
(5, 108813, 'Thima', 'Sigauque'),
(6, 123456, 'Thima', 'Sigauque');

-- --------------------------------------------------------

--
-- Table structure for table `entrances`
--

CREATE TABLE `entrances` (
  `Id` int(11) NOT NULL,
  `Name` longtext DEFAULT NULL,
  `DistrictId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laptopsheets`
--

CREATE TABLE `laptopsheets` (
  `Id` int(11) NOT NULL,
  `Percal` int(11) NOT NULL,
  `DateIn` date NOT NULL,
  `DateOut` date DEFAULT NULL,
  `TimeIn` time(6) NOT NULL,
  `TimeOut` time(6) DEFAULT NULL,
  `AssetNumber` longtext DEFAULT NULL,
  `AssetName` longtext DEFAULT NULL,
  `Ownership` longtext DEFAULT NULL,
  `EntranceId` int(11) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `SecurityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptopsheets`
--

INSERT INTO `laptopsheets` (`Id`, `Percal`, `DateIn`, `DateOut`, `TimeIn`, `TimeOut`, `AssetNumber`, `AssetName`, `Ownership`, `EntranceId`, `DistrictId`, `SecurityId`) VALUES
(1, 123456, '2022-10-18', NULL, '02:22:00.000000', '00:00:00.000000', '108813', 'Gigabyte', 'Personal', 0, 0, 23456789),
(2, 108813, '2022-10-18', '2022-10-20', '02:22:00.000000', '11:01:00.000000', '108813', 'Gigabyte', 'Personal', 0, 0, 23456789),
(3, 108813, '2022-10-20', '2022-10-20', '06:49:00.000000', '11:01:00.000000', '108813', 'Gigabyte', 'Personal', 0, 0, 23456789);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleId` int(11) NOT NULL,
  `RoleName` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`) VALUES
(1, 'Administrator'),
(2, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `visitorlogsheets`
--

CREATE TABLE `visitorlogsheets` (
  `Id` int(11) NOT NULL,
  `DateIn` date NOT NULL,
  `TimeIn` time(6) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `VisitorId` int(11) NOT NULL,
  `EntranceId` int(11) NOT NULL,
  `SecurityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitorlogsheets`
--

INSERT INTO `visitorlogsheets` (`Id`, `DateIn`, `TimeIn`, `DistrictId`, `VisitorId`, `EntranceId`, `SecurityId`) VALUES
(1, '2022-08-30', '01:06:00.000000', 1, 1, 1, 0),
(2, '2022-10-18', '01:02:00.000000', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `Id` int(11) NOT NULL,
  `Name` longtext DEFAULT NULL,
  `LastName` longtext DEFAULT NULL,
  `PhoneNumber` longtext DEFAULT NULL,
  `IdNumber` varchar(255) DEFAULT NULL,
  `Address` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`Id`, `Name`, `LastName`, `PhoneNumber`, `IdNumber`, `Address`) VALUES
(1, 'Thima', 'Sigauque', '0713934923', '23456789', '377 Unit E, Mankweng');

-- --------------------------------------------------------

--
-- Table structure for table `__efmigrationshistory`
--

CREATE TABLE `__efmigrationshistory` (
  `MigrationId` varchar(150) NOT NULL,
  `ProductVersion` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__efmigrationshistory`
--

INSERT INTO `__efmigrationshistory` (`MigrationId`, `ProductVersion`) VALUES
('20220830101426_create_db', '6.0.8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `afterhourregisters`
--
ALTER TABLE `afterhourregisters`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`District_Id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `IX_Employees_Percal` (`Percal`);

--
-- Indexes for table `entrances`
--
ALTER TABLE `entrances`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `laptopsheets`
--
ALTER TABLE `laptopsheets`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `visitorlogsheets`
--
ALTER TABLE `visitorlogsheets`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `IX_Visitors_IdNumber` (`IdNumber`);

--
-- Indexes for table `__efmigrationshistory`
--
ALTER TABLE `__efmigrationshistory`
  ADD PRIMARY KEY (`MigrationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `afterhourregisters`
--
ALTER TABLE `afterhourregisters`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `District_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `entrances`
--
ALTER TABLE `entrances`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptopsheets`
--
ALTER TABLE `laptopsheets`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitorlogsheets`
--
ALTER TABLE `visitorlogsheets`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
