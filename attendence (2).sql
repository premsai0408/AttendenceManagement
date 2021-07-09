-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendence`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `email` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `att`
--

CREATE TABLE `att` (
  `Cid` varchar(6) NOT NULL,
  `rollno` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `attend` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Cid` varchar(6) NOT NULL,
  `Tid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Cid` varchar(6) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `Rollno` int(11) NOT NULL,
  `date` date NOT NULL,
  `attend` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `per`
--

CREATE TABLE `per` (
  `Cid` varchar(6) NOT NULL,
  `rollno` int(11) NOT NULL,
  `noof` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `percentace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Rollno` int(11) NOT NULL,
  `Regno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456',
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Tid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `Wid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `att`
--
ALTER TABLE `att`
  ADD PRIMARY KEY (`Cid`,`rollno`,`date`,`time`),
  ADD KEY `rollno` (`rollno`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Cid`,`Tid`),
  ADD KEY `Tid` (`Tid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`Rollno`,`date`);

--
-- Indexes for table `per`
--
ALTER TABLE `per`
  ADD PRIMARY KEY (`Cid`,`rollno`),
  ADD KEY `rollno` (`rollno`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Rollno`),
  ADD UNIQUE KEY `Regno` (`Regno`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Tid`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`Wid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `att`
--
ALTER TABLE `att`
  ADD CONSTRAINT `att_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`),
  ADD CONSTRAINT `att_ibfk_2` FOREIGN KEY (`rollno`) REFERENCES `student` (`Rollno`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`Tid`) REFERENCES `teacher` (`Tid`);

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `hostel_ibfk_1` FOREIGN KEY (`Rollno`) REFERENCES `student` (`Rollno`);

--
-- Constraints for table `per`
--
ALTER TABLE `per`
  ADD CONSTRAINT `per_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`),
  ADD CONSTRAINT `per_ibfk_2` FOREIGN KEY (`rollno`) REFERENCES `student` (`Rollno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
