-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 11:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missingchild`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldistrict`
--

CREATE TABLE `tbldistrict` (
  `ID` int(11) NOT NULL,
  `District` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldistrict`
--

INSERT INTO `tbldistrict` (`ID`, `District`) VALUES
(2, 'Davangere'),
(3, 'Chitradurga');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoundkids`
--

CREATE TABLE `tblfoundkids` (
  `ID` int(11) NOT NULL,
  `KidName` varchar(100) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `ReportedPerson` varchar(100) NOT NULL,
  `ReportedPersonAddress` varchar(300) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `FoundDate` date NOT NULL,
  `FoundPlace` varchar(200) NOT NULL,
  `District` varchar(100) NOT NULL,
  `IdentificationMarks` varchar(200) NOT NULL,
  `ContactForKid` varchar(20) NOT NULL,
  `Station` varchar(50) NOT NULL,
  `KidPic` varchar(200) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfoundkids`
--

INSERT INTO `tblfoundkids` (`ID`, `KidName`, `Sex`, `ReportedPerson`, `ReportedPersonAddress`, `Mobile`, `Age`, `FoundDate`, `FoundPlace`, `District`, `IdentificationMarks`, `ContactForKid`, `Station`, `KidPic`, `Status`) VALUES
(2, 'Krishna', 'Male', 'dgfdg', 'fdgfd', '8722864794', 13, '2018-04-01', 'dffgdfg', 'Davangere', 'dfg', '3333333333', 'PS-002', 'FoundKidImage/58adc6655aafe_thumb900.jpg', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`ID`, `UserID`, `Password`, `UserType`) VALUES
(1, 'admin', 'admin', 'Admin'),
(3, 'PS-001', '123456', 'Police'),
(4, 'PS-002', 'rXm8o', 'Police');

-- --------------------------------------------------------

--
-- Table structure for table `tblmissingklds`
--

CREATE TABLE `tblmissingklds` (
  `ID` int(11) NOT NULL,
  `KidName` varchar(100) NOT NULL,
  `ParentName` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Sex` varchar(40) NOT NULL,
  `DOB` date NOT NULL,
  `Height` varchar(50) NOT NULL,
  `Weight` varchar(50) NOT NULL,
  `DateofDisappear` date NOT NULL,
  `PlaceofDisappear` varchar(100) NOT NULL,
  `IdentificationMarks` varchar(200) NOT NULL,
  `Station` varchar(20) NOT NULL,
  `KidPic` varchar(300) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmissingklds`
--

INSERT INTO `tblmissingklds` (`ID`, `KidName`, `ParentName`, `Address`, `Mobile`, `Sex`, `DOB`, `Height`, `Weight`, `DateofDisappear`, `PlaceofDisappear`, `IdentificationMarks`, `Station`, `KidPic`, `Status`) VALUES
(5, 'Nayana', 'Rajappa', 'Vidya Nagar\r\nDavangere', '8722864794', 'Female', '2009-04-06', '121', '12', '2018-04-01', 'Vidya Nagar', 'Black mark on hand', 'PS-001', 'MissingKidImage/College.jpg', 'Solved');

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicestation`
--

CREATE TABLE `tblpolicestation` (
  `ID` int(11) NOT NULL,
  `PoliceStation` varchar(100) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `PSIName` varchar(100) NOT NULL,
  `LandLine` varchar(20) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `District` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpolicestation`
--

INSERT INTO `tblpolicestation` (`ID`, `PoliceStation`, `Code`, `PSIName`, `LandLine`, `Mobile`, `Address`, `District`) VALUES
(2, 'Vidya Nagar ', 'PS-001', 'Sideesh S', '08192-232323', '8907654321', 'Vidya Nagar', 'Davangere'),
(3, 'Davangere Rural', 'PS-002', 'Raju', '08192-232323', '8722864794', 'Rural Police', 'Davangere');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldistrict`
--
ALTER TABLE `tbldistrict`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoundkids`
--
ALTER TABLE `tblfoundkids`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmissingklds`
--
ALTER TABLE `tblmissingklds`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpolicestation`
--
ALTER TABLE `tblpolicestation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldistrict`
--
ALTER TABLE `tbldistrict`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblfoundkids`
--
ALTER TABLE `tblfoundkids`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblmissingklds`
--
ALTER TABLE `tblmissingklds`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblpolicestation`
--
ALTER TABLE `tblpolicestation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
