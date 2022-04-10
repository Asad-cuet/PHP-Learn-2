-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 10:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `Id` int(255) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `Date` text DEFAULT NULL,
  `Image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`Id`, `Title`, `Description`, `Date`, `Image`) VALUES
(1, 'Arduino Car', 'Obstacle avoidable car', '12 December 2020', '614eb1eac3de1IMG20200925235203.jpg'),
(5, 'Portfolio Project', 'sdfe iu iu daisud dia diuasd adiuas diausdh aisud di udi sdsdas dd dsadh hasdb dasd dd d', '26 September 2021', '615015864b8a2Screenshot (113).png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(255) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Description` longtext NOT NULL,
  `Date` text NOT NULL,
  `Subject` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `Email`, `Description`, `Date`, `Subject`) VALUES
(778, 'Asadul Islam', 'bookcellar2020@gmail.com', 'erg erge erae aehaeth', 'October 6, 2021, 3:23 pm', 'test'),
(779, 'Asadul Islam', 'bookcellar2020@gmail.com', 'Hi Asad', 'October 6, 2021, 3:51 pm', 'Email Test');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `Id` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Sub_title` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `Description` longtext NOT NULL,
  `Resume` text DEFAULT NULL,
  `Small_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`Id`, `Title`, `Sub_title`, `Image`, `Description`, `Resume`, `Small_image`) VALUES
(1, 'Portfolio', 'Welcome to my Portfolio', '615d378ab9b2dbg-masthead.jpg', 'Hello, Welcome to my Portfolio. I am engineering student. Besides, I am professional Web Developer. In details, I provided a website which is developed by me.', '614f2f8bb4844ahmed.pdf', '615d53d455ec7profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `Id` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`Id`, `Title`, `Category`, `Image`) VALUES
(4, 'Me', 'None', '615d528cd3a75FB_IMG_1602703268447.jpg'),
(5, 'Me', 'None', '615d5293a3743FB_IMG_1602703501881.jpg'),
(6, 'Me', 'None', '615d52c078944IMG20200817153958.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Asad', 'asadul7733@gmail.com', '14e1b600b1fd579f47433b88e8d85291');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=780;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
