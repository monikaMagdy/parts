-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 09:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
(1, 'sasa ', 'Euro-Trucker', 2011, '01-thumbnail.jpg'),
(3, 'Ivicon', 'euro-cargo', 2014, '01-thumbnail.jpg'),
(5, 'Man', 'cope', 2020, '02-thumbnail-.jpg'),
(6, 'King Long', 'WP10.200N', 2013, '02-thumbnail-.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `ExportID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `localCompanyID` int(255) NOT NULL,
  `CarID` int(255) NOT NULL,
  `PartNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL,
  `itemPrice` int(255) NOT NULL,
  `TotalCost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`ExportID`, `userID`, `localCompanyID`, `CarID`, `PartNumber`, `PartName`, `Quantity`, `itemPrice`, `TotalCost`) VALUES
(14, 21, 12, 1, 2652, 'piston', 10000000, 100, 200),
(20, 0, 0, 1, 2060821, 'eng', 1, 100, 100),
(21, 0, 0, 1, 2060821, 'eng', 12, 100, 1200),
(22, 0, 0, 1, 0, 'eng', 1, 100, 100),
(23, 0, 0, 1, 0, 'pistion', 1, 100, 100),
(24, 0, 0, 1, 0, 'eng', 11, 100, 1100),
(25, 0, 0, 1, 0, 'eng', 111, 100, 11100),
(26, 0, 0, 1, 0, 'pistion', 10, 100, 1000);

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
(15, 'sas', 'mostaf@hh.com', 1120750, 111111, 111111),
(33, 'sasads', 'mostafaelshanett@outlook.com', 1120750444, 0, 0),
(34, 'dsvzxv', 'mostafaelshanett@outlook.com', 2147483647, 1999, 0),
(35, 'mostafa', 'mostafa1710792@miuegypt.edu.eg', 1120750444, 19999, 888),
(36, 'mostafa', 'mostafa1710792@miuegypt.edu.eg', 1120750444, 19999, 888),
(37, 'sasa1', 'monica1702399', 2147483647, 19999, 0),
(38, 'sasa1', 'monica1702399', 2147483647, 19999, 0),
(39, 'sasa', 'monica1702399@miuegypt.edu.eg', 1120750444, 19999, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rpassword`
--

CREATE TABLE `rpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rpassword`
--

INSERT INTO `rpassword` (`id`, `email`, `code`) VALUES
(1, 'kosomelmshsalk@gmail.com', '3a0c6af6df'),
(2, 'hi@mail.com', 'e58524e12c'),
(3, 'hi@mail.com', '7d7cc2763d');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `PartNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `partCountry` varchar(255) NOT NULL,
  `carName` varchar(255) NOT NULL,
  `partPrice` int(255) NOT NULL,
  `partQuantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `CarID` int(255) NOT NULL,
  `user_ID` int(255) NOT NULL,
  `LocalCompanyID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`PartNumber`, `PartName`, `partCountry`, `carName`, `partPrice`, `partQuantity`, `image`, `CarID`, `user_ID`, `LocalCompanyID`) VALUES
(2060821, 'eng', 'cairo', 'scania', 100, 30000000, '3.jpg', 1, 0, 0),
(2995665, 'pistion', 'germany', 'scnia', 100, 10000, '1.jpg', 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `ExportID` int(255) NOT NULL,
  `companyID` int(255) NOT NULL,
  `CarID` int(255) NOT NULL,
  `PartNumber` int(255) NOT NULL,
  `PartName` varchar(255) NOT NULL,
  `partQuantity` int(255) NOT NULL,
  `partPrice` int(255) NOT NULL,
  `TotalPrice` int(255) NOT NULL,
  `carName` varchar(255) NOT NULL,
  `partCountry` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(22, 'Gad', 'new', 'hi@mail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 22, 2147483647, 'Manger'),
(23, 'Madonna', 'MadonnaSaid', 'm@123', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 22, 123456789, 'Manger'),
(24, 'monica', 'esraa1', 'monica1702399@miuegypt.edu.eg', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 22, 2147483647, 'Manger'),
(25, 'sasa', 'sasa', 'mostafaelshanett@outlook.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 15, 1120750444, 'Empolyee'),
(26, 'sas', 'sasa', 'mostafaelshanett@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 15, 0, 'Empolyee'),
(31, 's', 'sasa', 'mostafaelshanett@outlook.com', '0753dedf0f5965ee46dd7cf9deca7ebf7ca0b48ea895933b81252bd2dc0eb8e4972340f66f878b1f082c1825b74c8578b6898294c27e12ff7ac6f3914350db72', 15, 0, 'Empolyee'),
(33, 'sa', 'sasa', 'mostafaelshanett@outlook.com', 'e9e97ceb185bf0bdab6a9bf7ecc66a0f7c99039c1e19b33f4fabb07c01d4dcdf1f0e952cc5c35dff208c4ea77923d55f2fa76d8df7c2b49ef4caafbca1ad9afe', 15, 0, 'Empolyee'),
(34, 's', 'sasa', 'mostafaelshanett@outlook.com', '4e6a06897e469a17f8f6e8b61cc228101da3bcb6981c135cff0c2e4d25e21c866c0867e20753c7065f1282ddc8f230370e18fddb81b255cdc8a98992c5b4a252', 15, 0, 'Empolyee'),
(35, 'sasa', 'sasa', 'mostafaelshanett@outlook.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 15, 0, 'Manager'),
(36, 'sasa', 'Monica1702399', 'mostafaelshanett@outlook.com', 'f10127742e07a7705735572f823574b89aaf1cbe071935cb9e75e5cfeb817700cb484d1100a10ad5c32b59c3d6565211108aa9ef0611d7ec830c1b66f60e614d', 15, 0, 'Manager'),
(37, 'sasafff', 'sasa', 'mostafaelshanett@outlook.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 15, 0, 'Empolyee'),
(38, 'sasafff', 'sasa', 'mostafaelshanett@outlook.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 15, 0, 'Empolyee'),
(42, 'sa sa', 'Monica1702399', 'mostafa1710792@miuegypt.edu.eg', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 15, 0, 'Empolyee'),
(45, 'ahmed shaban', 'shaban', 'mostafa1710792@miuegypt.edu.eg', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 23, 2147483647, 'Manager'),
(46, 'Test New', 'newtest', 'new@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 10, 0, 'Employee'),
(47, 'omk', 'sasa', 'omk@gmail.com', '4af08c11d5d3d92bfa7bb61d374c99b54a7ef6498a56f30ab20a78b342d5543772955f787f343968723ba6f33ef529c0a2370ebe10bca9595c4aa9a675972e18', 15, 0, 'Manager');

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
  ADD PRIMARY KEY (`ExportID`);

--
-- Indexes for table `localcompany`
--
ALTER TABLE `localcompany`
  ADD PRIMARY KEY (`LocalCompanyID`);

--
-- Indexes for table `rpassword`
--
ALTER TABLE `rpassword`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`PartNumber`),
  ADD KEY `CarID` (`CarID`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD KEY `CarID` (`CarID`),
  ADD KEY `PartNumber` (`PartNumber`);

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
  MODIFY `CarID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `ExportID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `localcompany`
--
ALTER TABLE `localcompany`
  MODIFY `LocalCompanyID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rpassword`
--
ALTER TABLE `rpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `car` (`CarID`);

--
-- Constraints for table `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `car` (`CarID`),
  ADD CONSTRAINT `template_ibfk_2` FOREIGN KEY (`PartNumber`) REFERENCES `sparepart` (`PartNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
