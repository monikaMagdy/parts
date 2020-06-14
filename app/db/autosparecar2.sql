-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2020 at 11:26 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autosparecar2`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `CarID` int(255) NOT NULL,
  `CarName` varchar(255) NOT NULL,
  `CarModel` varchar(255) NOT NULL,
  `CarYear` int(255) NOT NULL,
  `imgName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarID`, `CarName`, `CarModel`, `CarYear`, `imgName`) VALUES
(34, 'scania', 'G410', 2010, '01-thumbnail.jpg'),
(35, 'MAN', 'TGS', 2012, '03-thumbnail.jpg'),
(36, 'IVECO', '2-ASSI', 2019, '02-thumbnail-.jpg'),
(37, 'Mercedes', 'Arocs', 2012, 'mercedes.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `companyID` int(11) DEFAULT 26,
  `partNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `PartPrice` int(255) NOT NULL,
  `partQuantity` int(255) NOT NULL,
  `timStamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `ExportID` int(255) NOT NULL,
  `LocalCompanyID` int(255) NOT NULL,
  `PartNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `partQuantity` int(255) NOT NULL,
  `ItemPrice` int(255) NOT NULL,
  `TotalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `localcompany`
--

CREATE TABLE `localcompany` (
  `LocalCompanyID` int(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` int(255) NOT NULL,
  `RegisterSupplierNumber` int(255) NOT NULL,
  `CommercialRecord` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localcompany`
--

INSERT INTO `localcompany` (`LocalCompanyID`, `CompanyName`, `email`, `phoneNumber`, `RegisterSupplierNumber`, `CommercialRecord`) VALUES
(26, 'monica', 'monica1702399@miuegypt.edu.eg', 2147483647, 2345678, 98765432),
(27, 'userss', 'username@123', 2147483647, 2147483647, 2147483647),
(28, 'mostafaa', 'mosatafa@123', 2147483647, 12345678, 98765432),
(54, 'rola', 'monica1702399@miuegypt.edu.eg', 2147483647, 12345678, 9876543);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `PartNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `partCountry` varchar(255) NOT NULL,
  `partPrice` int(255) NOT NULL,
  `partQuantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `CarID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`PartNumber`, `PartName`, `partCountry`, `partPrice`, `partQuantity`, `image`, `CarID`, `user_ID`) VALUES
(2850040, 'Piston', 'Turkey', 3600, 3458, 'pistionChamber.jpg', 34, 54);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `phoneNumber` int(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FullName`, `username`, `email`, `password`, `Age`, `phoneNumber`, `Role`) VALUES
(54, 'Madonna', 'donnasaid63', 'donnasaid63@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 23, 1225728779, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partNumber` (`partNumber`),
  ADD KEY `companyID` (`companyID`);

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`ExportID`),
  ADD KEY `companyID` (`LocalCompanyID`),
  ADD KEY `PartNumber` (`PartNumber`);

--
-- Indexes for table `localcompany`
--
ALTER TABLE `localcompany`
  ADD PRIMARY KEY (`LocalCompanyID`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`PartNumber`),
  ADD KEY `ID` (`user_ID`),
  ADD KEY `CarID` (`CarID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `CarID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `ExportID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `localcompany`
--
ALTER TABLE `localcompany`
  MODIFY `LocalCompanyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`partNumber`) REFERENCES `sparepart` (`PartNumber`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`companyID`) REFERENCES `localcompany` (`LocalCompanyID`);

--
-- Constraints for table `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_ibfk_2` FOREIGN KEY (`LocalCompanyID`) REFERENCES `localcompany` (`LocalCompanyID`),
  ADD CONSTRAINT `export_ibfk_3` FOREIGN KEY (`PartNumber`) REFERENCES `sparepart` (`PartNumber`);

--
-- Constraints for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `sparepart_ibfk_2` FOREIGN KEY (`CarID`) REFERENCES `car` (`CarID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
