-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2020 at 10:22 PM
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
-- Database: `autosparecar`
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
(1, 'Scania', 'Euro-Trucker', 2018, '01-thumbnail.jpg'),
(2, 'IVECO', '70121948', 2010, 'mercedes.jpg'),
(3, 'Ivicon', 'euro-cargo', 2014, '02-thumbnail-.jpg'),
(18, 'Piguet', 'truck ergo cargo', 2020, '03-thumbnail+.jpg'),
(22, 'MAN', '92837', 2020, '03-thumbnail--.jpg');

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

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`ExportID`, `LocalCompanyID`, `PartNumber`, `PartName`, `partQuantity`, `ItemPrice`, `TotalPrice`) VALUES
(1, 26, 2850040, '0', 20, 100, 2000),
(2, 26, 66, 'filter', 1, 55, 88344),
(3, 26, 66, 'filter', 1, 55, 4264),
(4, 26, 66, 'filter', 1, 55, 4264),
(5, 26, 66, 'filter', 1, 55, 4264),
(6, 26, 66, 'Filter', 1, 55, 251),
(7, 26, 66, 'Filter', 1, 55, 502),
(8, 26, 66, 'Filter', 1, 55, 564),
(9, 26, 66, 'Filter', 1, 55, 63),
(10, 26, 66, 'Filter', 1, 55, 125),
(11, 26, 66, 'Filter', 1, 55, 188),
(12, 26, 66, 'Filter', 1, 55, 188),
(13, 26, 66, 'Filter', 1, 55, 251),
(14, 26, 66, 'Filter', 1, 55, 16653),
(15, 26, 66, 'Filter', 1, 55, 16716),
(16, 26, 66, 'Filter', 1999, 55, 125337),
(17, 26, 66, 'Filter', 1, 55, 63),
(18, 26, 66, 'Filter', 1, 55, 125),
(19, 26, 66, 'Filter', 1, 55, 188),
(20, 26, 669, 'filter', 1, 77, 150),
(21, 26, 66, 'Filter', 155, 55, 19437),
(22, 26, 66, 'Filter', 1, 55, 63),
(23, 26, 66, 'Filter', 18, 55, 1129),
(24, 26, 66, 'Filter', 14, 55, 878);

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
(27, 'user', 'username@123', 2147483647, 2147483647, 2147483647),
(28, 'mostafa', 'mosatafa@123', 2147483647, 12345678, 98765432),
(29, 'user', 'user@gmail', 2147483647, 12345678, 9876543),
(54, 'rola', 'monica1702399@miuegypt.edu.eg', 2147483647, 12345678, 9876543),
(56, 'ww', 'jj', 11, 11, 11),
(57, 'ww', 'jj', 11, 11, 11);

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
(66, 'Filter', 'cairo', 55, 1993, '2.jpg', 1, 24),
(669, 'filter', 'hh', 77, 77, '3.jpg', 1, 24),
(50493, 'Turbo', 'Italy', 788, 900, '3.jpg', 18, 24),
(84937, 'tubepump', 'Italy', 400, 600, '3.jpg', 22, 24),
(742987, 'GasFilter', 'Italy', 888, 800, '3.jpg', 2, 24),
(2850040, 'Piston', 'Turkey', 100, 100001, '5.jpg', 1, 24),
(2995665, 'sebeka', 'Italy', 100, 100000, '1.jpg', 1, 24),
(7838923, 'piston', 'Germany', 799, 2000, '3.jpg', 3, 24);

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
(1, 'amal', 'Monica1702399', 'monica1702399@miuegypt.edu.eg', 'b2f30a8213d3ec0b844ad88d42df516a74d18437be7cb32bab249f92bfbe0e0528a9b51cf259dbb45c49de66c2eaa229a2ce5fb0fcc654eaef2a97c4e33ef786', 60, 1234567890, 'Employee'),
(22, 'Gad', 'andrewGad', 'Gad@123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 22, 2147483647, 'Manger'),
(23, 'Madonna', 'MadonnaSaid', 'm@123', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 22, 123456789, 'employee'),
(24, 'monica', 'Monica1702399', 'monica1702399@miuegypt.edu.eg', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 43, 1277199403, 'Manger'),
(25, 'user', 'username', 'user@gmail', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 23, 2147483647, 'Manger'),
(41, '13', '13', '123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 0, 0, 'Manger'),
(42, 'Da3dor', 'Da3dorx', 'Da3dor@miu.com', 'd332a8e0ed9c2c7a25863f6f86a4daa19222e0a94ad958889e0a50ed97cf07102a390154adbbaea8419357002d9a307ba54d04341a95a7c5415c2692a6f42ce4', 23, 1225728779, 'employee');

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
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `CarID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `ExportID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `localcompany`
--
ALTER TABLE `localcompany`
  MODIFY `LocalCompanyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
