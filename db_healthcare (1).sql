-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 05:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appId` int(3) NOT NULL,
  `patientIc` bigint(12) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `appSymptom` varchar(100) NOT NULL,
  `appComment` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appId`, `patientIc`, `scheduleId`, `appSymptom`, `appComment`, `status`) VALUES
(87, 1, 45, 'cold', 'feverr', 'done'),
(88, 12, 47, 'cold', 'fever', 'done'),
(89, 11, 50, 'efed', 'dnrf', 'done'),
(90, 123, 55, 'cold', 'fever', 'done'),
(91, 123, 48, '253', '26y', 'done'),
(92, 1, 49, 'gug', '.jhgu', 'done'),
(93, 1, 59, 'ygg', 'ggy', 'done'),
(94, 1, 60, 'grhh', 'grhr', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `icDoctor` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `doctorId` int(3) NOT NULL,
  `doctorFirstName` varchar(50) NOT NULL,
  `doctorLastName` varchar(50) NOT NULL,
  `doctorAddress` varchar(100) NOT NULL,
  `doctorPhone` varchar(15) NOT NULL,
  `doctorEmail` varchar(20) NOT NULL,
  `doctorDOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`icDoctor`, `password`, `doctorId`, `doctorFirstName`, `doctorLastName`, `doctorAddress`, `doctorPhone`, `doctorEmail`, `doctorDOB`) VALUES
(1, '123', 1, 'Pooja', 'korgaonkar', 'vasco', '7507986584', 'poojakorgaonkar@gmai', '2023-02-03'),
(123456789, '123', 123, 'POOJA', 'KORGAONKAR', 'vasco', '7507986584', 'poojakorgaonkar139@g', '1990-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `doctorschedule`
--

CREATE TABLE `doctorschedule` (
  `scheduleId` int(11) NOT NULL,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorschedule`
--

INSERT INTO `doctorschedule` (`scheduleId`, `scheduleDate`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(45, '2023-08-14', 'Monday', '10:00:00', '12:00:00', 'notavail'),
(47, '2023-08-15', 'Tuesday', '10:00:00', '12:00:00', 'notavail'),
(48, '2023-08-16', 'Wednesday', '10:00:00', '12:00:00', 'notavail'),
(49, '2023-08-14', 'Monday', '04:00:00', '06:00:00', 'notavail'),
(50, '2023-08-15', 'Tuesday', '04:00:00', '06:00:00', 'notavail'),
(51, '2023-08-15', 'Wednesday', '04:00:00', '06:00:00', 'available'),
(52, '2023-08-17', 'Thursday', '04:00:00', '06:00:00', 'available'),
(53, '2023-08-18', 'Friday', '09:00:00', '12:00:00', 'available'),
(54, '2023-08-21', 'Monday', '11:00:00', '02:00:00', 'available'),
(55, '2023-08-07', 'Monday', '02:00:00', '12:00:00', 'notavail'),
(56, '2023-08-12', 'Saturday', '11:59:00', '12:30:00', 'available'),
(57, '2023-08-14', 'Friday', '12:00:00', '01:00:00', 'available'),
(58, '2023-08-21', 'Monday', '00:00:00', '12:30:00', 'available'),
(59, '2023-08-17', 'Thursday', '12:00:00', '03:00:00', 'notavail'),
(60, '2023-08-15', 'Monday', '10:15:00', '01:10:00', 'notavail'),
(61, '2023-08-18', 'Monday', '11:20:00', '17:00:00', 'available'),
(62, '2023-08-18', 'Monday', '11:20:00', '17:00:00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `icPatient` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `patientFirstName` varchar(20) NOT NULL,
  `patientLastName` varchar(20) NOT NULL,
  `patientMaritialStatus` varchar(10) NOT NULL,
  `patientDOB` date NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientAddress` varchar(100) NOT NULL,
  `patientPhone` varchar(15) NOT NULL,
  `patientEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`icPatient`, `password`, `patientFirstName`, `patientLastName`, `patientMaritialStatus`, `patientDOB`, `patientGender`, `patientAddress`, `patientPhone`, `patientEmail`) VALUES
(1, '123', 'avernal', 'rodrigues', 'single', '2000-01-25', 'male', 'margao', '123456789', 'avernal2000@gmail.com'),
(11, '123', 'sahil', 'kolra', '', '1998-09-17', 'male', '', '', 'kolra@123'),
(12, '123', 'shivam', 'korgaonkar', '', '1994-11-17', 'male', '', '', 'shivam@123'),
(69, '12456789', 'warr', 'addesh', '', '1989-10-13', 'male', '', '', 'aasdfg@v.com'),
(123, '123', 'sakshi', 'patil', '', '1999-11-21', 'female', '', '', 'patil@123'),
(1234, '123', 'er', 'ttu', '', '1995-07-15', 'male', '', '', 'yr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appId`),
  ADD UNIQUE KEY `scheduleId_2` (`scheduleId`),
  ADD KEY `patientIc` (`patientIc`),
  ADD KEY `scheduleId` (`scheduleId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`icDoctor`);

--
-- Indexes for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  ADD PRIMARY KEY (`scheduleId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`icPatient`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `doctorschedule`
--
ALTER TABLE `doctorschedule`
  MODIFY `scheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`patientIc`) REFERENCES `patient` (`icPatient`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`scheduleId`) REFERENCES `doctorschedule` (`scheduleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
