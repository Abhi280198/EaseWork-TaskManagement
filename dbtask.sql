-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 10:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblboard`
--

CREATE TABLE `tblboard` (
  `Bid` int(11) NOT NULL,
  `Btitle` varchar(100) NOT NULL,
  `Tid` int(11) NOT NULL,
  `Visibility` varchar(50) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Tempid` int(11) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Background` varchar(100) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table dbtask.tblboard: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `dbtask`.`tblboard`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tblcard`
--

CREATE TABLE `tblcard` (
  `Cardid` int(11) NOT NULL,
  `CardName` varchar(100) NOT NULL,
  `Label` varchar(100) DEFAULT NULL,
  `DueDate` datetime DEFAULT NULL,
  `CreationDate` date NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Listid` int(11) NOT NULL,
  `Bid` int(11) NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblchecklist`
--

CREATE TABLE `tblchecklist` (
  `Checklistid` int(11) NOT NULL,
  `ChecklistName` varchar(100) DEFAULT NULL,
  `Cardid` int(11) NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `Cid` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`Cid`, `Name`, `Mobile`, `Email`, `Subject`, `Description`) VALUES
(1, 'abhilasha', 2084905416, 'poojakusingh40@gmail.com', 'Task Info', 'How to allocate task before login'),
(2, 'puja', 1684905416, 'pooja@gmail.com', 'Reply', 'I didn\'t get any reply'),
(17, 'Riya jain', 2147483647, 'ee@gh.com', 'enquiry', 'how to add members?'),
(18, 'Riya jain', 2147483647, 'ee@gh.com', 'enquiry', 'how to add members?'),
(19, 'Riya jain', 2147483647, 'ee@gh.com', 'enquiry', 'how to add members?'),
(20, 'Riya jain', 2147483647, 'ee@gh.com', 'enquiry', 'how to add members?'),
(21, 'Riya jain', 2147483647, 'ee@gh.com', 'enquiry', 'how to add members?'),
(22, 'abcd', 2147483647, 'abcd@gmail.com', 'abcdefg', 'abcdefghijklmnopqrstuvwxyz'),
(23, 'abcd', 2147483647, 'abcd@gmail.com', 'abcdefg', 'abcdefghijklmnopqrstuvwxyz'),
(24, 'skm', 2147483647, 'aaa@gmail.com', 'hwjo', 'nhgfdsr67t8y9uipk;lmn'),
(25, 'skm', 2147483647, 'aaa@gmail.com', 'hwjo', 'nhgfdsr67t8y9uipk;lmn'),
(26, 'xyz', 9947483647, 'xyz@gmail.com', 'gjkbjjkkk', 'hjksadlkmqwpok,.kpkp'),
(27, 'xyz', 2341564328, 'xyz@gmail.com', 'gjkbjjkkk', 'hjksadlkmqwpok,.kpkp'),
(28, 'xyz', 2341564328, 'xyz@gmail.com', 'gjkbjjkkk', 'hjksadlkmqwpok,.kpkp'),
(29, 'Abhilasha', 6667777333, 'pooja@gmail.com', 'viuhjmgghhe', 'fnksdkNOJ'),
(30, 'Abhilasha', 6667777333, 'pooja@gmail.com', 'viuhjmgghhe', 'fnksdkNOJ'),
(31, 'Abhilasha', 9988776655, 'abcd@gmail.com', 'vbnnmm', 'n nm m ,bjkbjkknlk'),
(32, 'Abhilasha', 7689567543, 'Poojakusingh40@gmail.com', 'Enquiry', 'How to use templates??');

-- --------------------------------------------------------

--
-- Table structure for table `tbllist`
--

CREATE TABLE `tbllist` (
  `Listid` int(11) NOT NULL,
  `ListName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllist`
--

INSERT INTO `tbllist` (`Listid`, `ListName`) VALUES
(1, 'Todo'),
(2, 'Doing'),
(3, 'Done'),
(4, 'Syllabus Remaining'),
(5, 'Syllabus For Today'),
(6, 'Syllabus Covered'),
(7, 'Assignments'),
(8, 'Before Trip '),
(9, 'At Vacation'),
(10, 'To Eat and Drink'),
(11, 'Done in Vacation');

-- --------------------------------------------------------

--
-- Table structure for table `tblmembercard`
--

CREATE TABLE `tblmembercard` (
  `Mcardid` int(11) NOT NULL,
  `Tmid` int(11) NOT NULL,
  `Cardid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

CREATE TABLE `tblteam` (
  `Tid` int(11) NOT NULL,
  `Tname` varchar(100) NOT NULL,
  `Ttype` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `ProfilePic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`Tid`, `Tname`, `Ttype`, `Description`, `Uid`, `Date`, `IsActive`, `ProfilePic`) VALUES
(1, 'No Team', 'others', 'Used for Individual Board', 1, '2020-06-14', 1, NULL),
(2, 'teamone', 'Marketing', 'team for develpoing', 1, '2020-06-15', 1, NULL),
(3, 'Summer Internship project', 'Educational', 'Developing a website to present in college', 1, '2020-06-15', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblteammember`
--

CREATE TABLE `tblteammember` (
  `Tmid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Bid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbltemplate`
--

CREATE TABLE `tbltemplate` (
  `Tempid` int(11) NOT NULL,
  `TempName` varchar(100) NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltemplate`
--

INSERT INTO `tbltemplate` (`Tempid`, `TempName`, `IsActive`) VALUES
(1, 'Class Management', 1),
(2, 'Vacation Planning', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `Uid` int(11) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Date` date NOT NULL,
  `IsActive` tinyint(7) NOT NULL,
  `ProfilePic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`Uid`, `Fname`, `Lname`, `Email`, `Password`, `Mobile`, `Date`, `IsActive`, `ProfilePic`) VALUES
(10, 'Abhilasha', 'Kumari', 'pooja@gmail.com', 'pooja', 2147483647, '2020-06-13', 1, NULL),
(15, 'abcd', 'efgh', 'abcd@gmail.com', 'abcdefgh', 2147483647, '2020-06-14', 1, NULL),
(16, 'Abhilasha', 'Kumari', 'poojakusingh$0@gmail.com', 'pujasingh', 7684905416, '2020-06-14', 1, NULL),
(17, 'Abhilasha', 'Kumari', 'poojakusingh$0@gmail.com', 'pujasingh', 7684905416, '2020-06-14', 1, NULL),
(18, 'Abhilasha', 'Kumari', 'poojakusingh0@gmail.com', 'poojakusingh', 5566778899, '2020-06-14', 1, NULL),
(19, 'Abhilasha', 'Kumari', 'poojakusingh35@gmail.com', 'pujasingh', 9437649345, '2020-06-14', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblboard`
--
ALTER TABLE `tblboard`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `tblcard`
--
ALTER TABLE `tblcard`
  ADD PRIMARY KEY (`Cardid`);

--
-- Indexes for table `tblchecklist`
--
ALTER TABLE `tblchecklist`
  ADD PRIMARY KEY (`Checklistid`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `tbllist`
--
ALTER TABLE `tbllist`
  ADD PRIMARY KEY (`Listid`);

--
-- Indexes for table `tblmembercard`
--
ALTER TABLE `tblmembercard`
  ADD PRIMARY KEY (`Mcardid`);

--
-- Indexes for table `tblteam`
--
ALTER TABLE `tblteam`
  ADD PRIMARY KEY (`Tid`);

--
-- Indexes for table `tblteammember`
--
ALTER TABLE `tblteammember`
  ADD PRIMARY KEY (`Tmid`);

--
-- Indexes for table `tbltemplate`
--
ALTER TABLE `tbltemplate`
  ADD PRIMARY KEY (`Tempid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblboard`
--
ALTER TABLE `tblboard`
  MODIFY `Bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcard`
--
ALTER TABLE `tblcard`
  MODIFY `Cardid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblchecklist`
--
ALTER TABLE `tblchecklist`
  MODIFY `Checklistid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbllist`
--
ALTER TABLE `tbllist`
  MODIFY `Listid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblmembercard`
--
ALTER TABLE `tblmembercard`
  MODIFY `Mcardid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblteammember`
--
ALTER TABLE `tblteammember`
  MODIFY `Tmid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltemplate`
--
ALTER TABLE `tbltemplate`
  MODIFY `Tempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
