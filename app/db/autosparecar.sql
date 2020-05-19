-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 11:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

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
(1, 'Scania', 'Euro-Trucker', 2011, '01-thumbnail.jpg'),
(2, 'Mercedes', '70121948', 2015, 'mercedes.jpg'),
(3, 'Ivicon', 'euro-cargo', 2014, '02-thumbnail-.jpg'),
(4, 'volvo', 'v-b7r', 2015, 'volvo.jpg'),
(5, 'Man', 'cope', 2020, '01-thumbnail-.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `ExportID` int(255) DEFAULT NULL,
  `LocalCompanyID` int(255) NOT NULL,
  `CarID` int(255) NOT NULL,
  `PartNumber` int(255) NOT NULL,
  `PartName` int(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
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
(27, 'user', 'username@123', 2147483647, 2147483647, 2147483647),
(28, 'mostafa', 'mosatafa@123', 2147483647, 12345678, 98765432),
(29, 'user', 'user@gmail', 2147483647, 12345678, 9876543),
(54, 'rola', 'monica1702399@miuegypt.edu.eg', 2147483647, 12345678, 9876543);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `PartNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `carName` varchar(255) NOT NULL,
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

INSERT INTO `sparepart` (`PartNumber`, `PartName`, `carName`, `partCountry`, `partPrice`, `partQuantity`, `image`, `CarID`, `user_ID`) VALUES
(2850040, 'Piston', 'Scania', 'Turkey', 100, 100000, '5.jpg', 1, 24),
(2995665, 'sebeka', 'scania', 'Italy', 100, 100000, '1.jpg', 1, 24),
(4897481, 'tube oil pump', 'scania', 'Italy', 100, 10000, 'oil tube pump.jpg', 1, 24);

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
(1, 'amal', 'Monica1702399', 'monica1702399@miuegypt.edu.eg', 'b2f30a8213d3ec0b844ad88d42df516a74d18437be7cb32bab249f92bfbe0e0528a9b51cf259dbb45c49de66c2eaa229a2ce5fb0fcc654eaef2a97c4e33ef786', 60, 1234567890, 'Manger'),
(21, 'Gad', 'andrewGad', 'Gad@123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 22, 2147483647, 'Manger'),
(22, 'Gad', 'andrewGad', 'Gad@123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 22, 2147483647, 'Manger'),
(23, 'Madonna', 'MadonnaSaid', 'm@123', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 22, 123456789, 'Manger'),
(24, 'monica', 'Monica1702399', 'monica1702399@miuegypt.edu.eg', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 22, 2147483647, 'Manger'),
(25, 'user', 'username', 'user@gmail', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 23, 2147483647, 'Employe'),
(26, 'Essam', 'userEssam', 'Essam@123', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 23, 2147483647, 'Manger'),
(27, 'rola ebrahim william', 'rola', 'rola@123', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 22, 2147483647, 'Employe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`CarID`);

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD KEY `CarID` (`CarID`),
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
  MODIFY `CarID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `localcompany`
--
ALTER TABLE `localcompany`
  MODIFY `LocalCompanyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `car` (`CarID`),
  ADD CONSTRAINT `export_ibfk_2` FOREIGN KEY (`LocalCompanyID`) REFERENCES `localcompany` (`LocalCompanyID`),
  ADD CONSTRAINT `export_ibfk_3` FOREIGN KEY (`PartNumber`) REFERENCES `sparepart` (`PartNumber`);

--
-- Constraints for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
