-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 08:02 AM
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
  `Visibility` varchar(50) DEFAULT NULL,
  `Uid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Tempid` int(11) DEFAULT NULL,
  `BoardDescription` varchar(100) DEFAULT NULL,
  `Background` varchar(100) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblboard`
--

INSERT INTO `tblboard` (`Bid`, `Btitle`, `Tid`, `Visibility`, `Uid`, `Date`, `Tempid`, `BoardDescription`, `Background`, `IsActive`) VALUES
(22, 'board notification', 42, 'Team', 27, '2020-06-26', NULL, 'Notification team', '', 1),
(24, 'board3', 42, 'Team', 27, '2020-06-27', NULL, NULL, '', 0),
(25, 'Class Management-board', 42, 'Private', 26, '2020-06-27', 1, 'new board of class management template\r\n                        ', 'images/bg1.jpg', 1),
(27, 'Vacation Planning', 42, 'Team', 27, '2020-06-29', 2, 'vacaatttttiiioonnn', 'images/blog-img78.jpg', 1),
(29, 'individual', 1, 'Private', 26, '2020-07-03', NULL, NULL, '', 1),
(52, 'Households', 1, 'Private', 30, '2020-07-08', NULL, 'shopping for home decoration', 'images/bg6.jpg', 0),
(53, 'Real Estate', 51, 'Team', 30, '2020-07-08', NULL, 'Management system for summer internship 2019', 'images/bg2.jpg', 1),
(54, 'Assignments', 1, 'Private', 30, '2020-07-08', 1, 'Assignments given in class', 'images/backgrounddefault.jpg', 1),
(55, 'school Website', 51, 'Team', 30, '2020-07-08', 1, NULL, 'images/backgrounddefault.jpg', 0),
(56, 'family vacation - puri', 1, 'Private', 30, '2020-07-08', 2, NULL, 'images/blog-img78.jpg', 1),
(57, 'birthday party', 51, 'Team', 30, '2020-07-08', 2, NULL, 'images/blog-img78.jpg', 0),
(58, 'Manali tour', 52, 'Team', 31, '2020-07-26', 2, NULL, 'images/blog-img78.jpg', 1),
(59, 'book fair', 52, NULL, 31, '2020-07-26', 1, NULL, 'images/backgrounddefault.jpg', 1),
(60, 'first board', 53, NULL, 31, '2020-07-26', NULL, 'demo description', '', 1),
(61, 'Education', 53, NULL, 31, '2020-07-26', 1, NULL, 'images/backgrounddefault.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcalendar`
--

CREATE TABLE `tblcalendar` (
  `Calendarid` int(11) NOT NULL,
  `CalendarTitle` varchar(255) NOT NULL,
  `CalendarStart` datetime NOT NULL,
  `CalendarEnd` datetime DEFAULT NULL,
  `CalendarStatus` tinyint(7) NOT NULL,
  `Uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcalendar`
--

INSERT INTO `tblcalendar` (`Calendarid`, `CalendarTitle`, `CalendarStart`, `CalendarEnd`, `CalendarStatus`, `Uid`) VALUES
(1, 'HeadStart', '2020-06-03 00:00:00', '2020-06-04 00:00:00', 1, 20),
(2, 'heading', '2020-06-04 00:00:00', '2020-06-05 00:00:00', 1, 20),
(3, 'abcd', '2020-06-03 00:00:00', '2020-06-04 00:00:00', 1, 20),
(4, 'new task', '2020-06-03 00:00:00', '2020-06-04 00:00:00', 1, 20),
(5, 'new event', '2020-06-17 00:00:00', '2020-06-18 00:00:00', 1, 27),
(7, 'meeting for manali trip', '2020-07-29 00:00:00', '2020-07-30 00:00:00', 1, 31),
(8, 'meeting today', '2020-07-28 00:00:00', '2020-07-29 00:00:00', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tblcard`
--

CREATE TABLE `tblcard` (
  `Cardid` int(11) NOT NULL,
  `CardName` varchar(100) NOT NULL,
  `Label` varchar(100) DEFAULT NULL,
  `LabelColor` varchar(100) DEFAULT NULL,
  `DueDate` date DEFAULT NULL,
  `CreationDate` date NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Listid` int(11) NOT NULL,
  `Bid` int(11) NOT NULL,
  `IsActive` tinyint(7) NOT NULL,
  `Percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcard`
--

INSERT INTO `tblcard` (`Cardid`, `CardName`, `Label`, `LabelColor`, `DueDate`, `CreationDate`, `Description`, `Listid`, `Bid`, `IsActive`, `Percentage`) VALUES
(46, ',m skadnjqfk', '', '#000000', '0000-00-00', '2020-06-28', '', 1, 26, 1, 0),
(88, 'Syllabus 1', '', '#000000', '0000-00-00', '2020-06-30', '', 4, 25, 1, 0),
(89, 'Syllabus 1 remain', '', '#000000', '0000-00-00', '2020-06-30', '', 4, 25, 1, 0),
(90, 'syllabus 2', '', '#000000', '0000-00-00', '2020-06-30', '', 5, 25, 1, 0),
(91, 'syllabus 2 remain', '', '#000000', '0000-00-00', '2020-06-30', '', 5, 25, 1, 0),
(92, 'syllabus 3', '', '#000000', '0000-00-00', '2020-06-30', '', 6, 25, 1, 0),
(93, 'syllabus 3 remain', '', '#000000', '0000-00-00', '2020-06-30', '', 6, 25, 1, 0),
(94, 'assign', '', '#000000', '0000-00-00', '2020-06-30', '', 7, 25, 1, 0),
(95, 'assignment', '', '#000000', '0000-00-00', '2020-06-30', '', 7, 25, 1, 0),
(96, 'todo1', 'new', '#ff0000', '2020-07-04', '2020-06-30', '', 1, 22, 1, 0),
(97, 'todoo', '', '#000000', '0000-00-00', '2020-06-30', '', 1, 22, 1, 0),
(102, 'doinggg', '', '#000000', '2020-10-23', '2020-06-30', '', 2, 22, 1, 100),
(103, 'doneeee', '', '#000000', '0000-00-00', '2020-06-30', '', 3, 22, 1, 0),
(104, 'done', '', '#000000', '0000-00-00', '2020-06-30', '', 3, 22, 1, 0),
(106, 'before trip', '', '#000000', '0000-00-00', '2020-06-30', '', 8, 27, 1, 0),
(107, 'before', '', '#000000', '0000-00-00', '2020-06-30', '', 8, 27, 1, 0),
(108, 'holiday', '', '#000000', '0000-00-00', '2020-06-30', '', 9, 27, 1, 0),
(109, 'In Holiday', '', '#000000', '0000-00-00', '2020-06-30', '', 9, 27, 1, 0),
(110, 'eat', '', '#000000', '0000-00-00', '2020-06-30', '', 10, 27, 1, 0),
(111, 'eat and drink', '', '#000000', '0000-00-00', '2020-06-30', '', 10, 27, 1, 0),
(112, 'work', '', '#000000', '0000-00-00', '2020-06-30', '', 11, 27, 1, 0),
(113, 'work done', '', '#000000', '0000-00-00', '2020-06-30', '', 11, 27, 1, 0),
(114, 'Database', 'important', '#f10404', '0000-00-00', '2020-07-08', 'Designing database', 2, 53, 1, 0),
(115, 'Flow design', '', '#000000', '2020-07-30', '2020-07-08', 'Decide the flow of website', 3, 53, 1, 0),
(116, 'Real estate name', 'Suggestion', '#fad000', '2020-08-08', '2020-07-08', 'suggest name', 1, 53, 1, 50),
(117, 'wall hanging', '', '#000000', '2020-07-10', '2020-07-08', '', 3, 52, 1, 0),
(118, 'furniture', 'important', '#f51414', '2020-07-31', '2020-07-08', '', 2, 52, 1, 0),
(119, 'start newspaper', '', '#000000', '2020-07-15', '2020-07-08', '', 1, 52, 1, 0),
(120, 'Class-9', '', '#000000', '2020-07-17', '2020-07-08', 'Physics', 7, 54, 1, 0),
(121, 'Class-8', 'Tommorrow', '#f40606', '2020-07-09', '2020-07-08', '', 5, 54, 1, 0),
(122, 'class-6', '', '#000000', '0000-00-00', '2020-07-08', '', 6, 54, 1, 0),
(123, 'Class-7', 'Algebra', '#000000', '2020-07-15', '2020-07-08', 'Mathematics', 4, 54, 1, 0),
(125, 'work remain', '', '#000000', '0000-00-00', '2020-07-08', '', 4, 55, 1, 0),
(126, 'covered today', '', '#000000', '2020-07-17', '2020-07-08', '', 5, 55, 1, 0),
(127, 'Completed', '', '#af0808', '0000-00-00', '2020-07-08', '', 6, 55, 1, 0),
(128, 'first assignmnt', '', '#000000', '2020-07-24', '2020-07-08', '', 7, 55, 1, 0),
(129, 'new', '', '#000000', '2020-07-30', '2020-07-08', '', 8, 56, 1, 0),
(130, 'newwwww', '', '#000000', '2020-08-07', '2020-07-08', '', 8, 57, 1, 0),
(131, 'book tickets', 'urgent', '#d80e0e', '2020-08-07', '2020-07-26', 'from pune to manali', 8, 58, 1, 0),
(132, 'buy clothes', 'money needed', '#b3c819', '0000-00-00', '2020-07-26', '', 9, 58, 1, 0),
(133, 'task 1', 'important', '#e71d1d', '2020-08-08', '2020-07-26', '', 2, 60, 1, 100);

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

--
-- Dumping data for table `tblchecklist`
--

INSERT INTO `tblchecklist` (`Checklistid`, `ChecklistName`, `Cardid`, `IsActive`) VALUES
(12, 'abcd', 88, 1),
(15, 'new', 88, 1),
(18, 'photo frames', 117, 1),
(19, 'mirror', 117, 1),
(20, 'lights', 117, 1),
(22, 'chairs', 118, 1),
(23, 'Dining Table', 118, 1),
(27, 'sweet home', 116, 0),
(28, 'gharana', 116, 1),
(29, 'new books', 102, 1),
(30, 'checklist todo', 133, 0);

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
(32, 'Abhilasha', 7689567543, 'Poojakusingh40@gmail.com', 'Enquiry', 'How to use templates??'),
(33, 'riya', 4433221143, 'riyajain@gmail.com', 'Contact testing ', 'User id 20');

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
  `Uid` int(11) NOT NULL,
  `Cardid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmembercard`
--

INSERT INTO `tblmembercard` (`Mcardid`, `Uid`, `Cardid`) VALUES
(22, 27, 42),
(25, 0, 45),
(26, 27, 46),
(64, 27, 88),
(65, 27, 89),
(66, 27, 90),
(67, 27, 91),
(68, 27, 92),
(69, 0, 93),
(70, 27, 94),
(71, 0, 95),
(72, 27, 96),
(73, 0, 97),
(78, 27, 102),
(79, 0, 103),
(80, 27, 104),
(82, 27, 106),
(83, 0, 107),
(84, 0, 108),
(85, 27, 109),
(86, 0, 110),
(87, 27, 111),
(88, 0, 112),
(89, 27, 113),
(90, 27, 114),
(91, 30, 115),
(92, 0, 116),
(93, 0, 117),
(94, 0, 118),
(95, 0, 119),
(96, 0, 120),
(97, 0, 121),
(98, 0, 122),
(99, 0, 123),
(101, 30, 125),
(102, 30, 126),
(103, 30, 127),
(104, 30, 128),
(105, 0, 129),
(106, 30, 130),
(107, 31, 131),
(108, 31, 132),
(109, 31, 133);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `Notificationid` int(11) NOT NULL,
  `NotificationEmail` varchar(100) NOT NULL,
  `Bid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `IsRead` tinyint(7) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`Notificationid`, `NotificationEmail`, `Bid`, `Tid`, `IsRead`, `Time`, `Date`) VALUES
(3, 'poojakusingh40@gmail.com', 22, 42, 0, '12:00:00', '2020-06-27'),
(4, 'poojakusingh40@gmail.com', 23, 42, 0, '00:40:00', '2020-06-27'),
(5, 'poojakusingh40@gmail.com', 24, 42, 0, '00:28:32', '2020-06-27'),
(6, 'jigneshmahadik777@gmail.com', 23, 42, 0, '00:49:14', '2020-06-27'),
(7, 'jigneshmahadik777@gmail.com', 25, 42, 0, '12:13:28', '2020-06-27'),
(8, 'poojakusingh40@gmail.com', 25, 42, 0, '01:03:51', '2020-06-28'),
(9, 'jigneshmahadik777@gmail.com', 22, 42, 0, '15:21:33', '2020-06-28'),
(10, 'poojakusingh40@gmail.com', 26, 44, 0, '17:10:39', '2020-06-28'),
(11, 'riya.jain9497@gmail.com', 24, 42, 1, '00:37:27', '2020-06-29'),
(12, 'jigneshmahadik777@gmail.com', 28, 42, 0, '01:16:43', '2020-06-29'),
(13, 'riya.jain9497@gmail.com', 27, 42, 1, '01:43:33', '2020-06-29'),
(14, 'riya.jain9497@gmail.com', 25, 42, 1, '23:57:29', '2020-06-29'),
(15, 'poojakusingh40@gmail.com', 27, 42, 0, '02:01:46', '2020-06-30'),
(16, 'poojakusingh40@gmail.com', 33, 46, 0, '21:35:44', '2020-07-06'),
(17, 'poojakusingh40@gmail.com', 32, 46, 0, '21:35:50', '2020-07-06'),
(18, 'poojakusingh40@gmail.com', 31, 46, 0, '21:35:57', '2020-07-06'),
(19, 'poojakusingh40@gmail.com', 34, 46, 0, '21:46:03', '2020-07-06'),
(20, 'poojakusingh40@gmail.com', 35, 46, 0, '21:46:16', '2020-07-06'),
(21, 'abhilashakumari9797@gmail.com', 40, 49, 0, '14:00:28', '2020-07-07'),
(22, 'abhilashakumari9797@gmail.com', 42, 49, 0, '14:00:34', '2020-07-07'),
(23, 'abhilashakumari9797@gmail.com', 49, 50, 0, '14:06:48', '2020-07-07'),
(24, 'abhilashakumari9797@gmail.com', 51, 50, 0, '14:06:59', '2020-07-07'),
(25, 'abhilashakumari9797@gmail.com', 50, 50, 0, '14:07:04', '2020-07-07'),
(26, 'poojakusingh40@gmail.com', 43, 49, 0, '14:08:15', '2020-07-07'),
(27, 'abhilashakumari9797@gmail.com', 53, 51, 0, '22:43:01', '2020-07-08'),
(28, 'poojakusingh40@gmail.com', 53, 51, 0, '22:43:35', '2020-07-08'),
(29, 'abhilashakumari9797@gmail.com', 55, 51, 0, '23:27:43', '2020-07-08'),
(30, 'abhilashakumari9797@gmail.com', 57, 51, 0, '23:51:53', '2020-07-08'),
(31, 'abhi1234@gmail.com', 58, 52, 0, '10:25:07', '2020-07-26'),
(32, 'poojakusingh40@gmail.com', 58, 52, 1, '10:40:40', '2020-07-26'),
(33, 'abhi1234@gmail.com', 59, 52, 0, '10:52:11', '2020-07-26'),
(34, 'abhi1234@gmail.com', 60, 53, 0, '11:08:04', '2020-07-26'),
(35, 'puja1234@gmail.com', 60, 53, 1, '11:16:21', '2020-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `tblrecent`
--

CREATE TABLE `tblrecent` (
  `Rid` int(11) NOT NULL,
  `Bid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrecent`
--

INSERT INTO `tblrecent` (`Rid`, `Bid`, `Tid`, `Uid`, `Date`, `IsActive`) VALUES
(7, 22, 42, 27, '2020-07-26', 1),
(8, 25, 42, 27, '2020-07-06', 1),
(9, 27, 42, 27, '2020-07-06', 1),
(10, 29, 1, 26, '2020-07-03', 1),
(11, 25, 42, 26, '2020-07-05', 1),
(12, 22, 42, 26, '2020-07-05', 1),
(13, 27, 42, 26, '2020-07-05', 1),
(14, 24, 42, 27, '2020-07-04', 1),
(15, 30, 1, 27, '2020-07-06', 1),
(16, 31, 46, 27, '2020-07-06', 1),
(17, 32, 46, 27, '2020-07-06', 1),
(18, 33, 46, 27, '2020-07-06', 1),
(19, 35, 46, 27, '2020-07-06', 1),
(20, 34, 46, 27, '2020-07-06', 1),
(21, 36, 46, 27, '2020-07-06', 1),
(22, 38, 1, 27, '2020-07-06', 1),
(23, 37, 46, 27, '2020-07-06', 1),
(24, 39, 48, 27, '2020-07-07', 1),
(25, 29, 1, 29, '2020-07-07', 1),
(26, 41, 1, 29, '2020-07-08', 1),
(27, 40, 49, 29, '2020-07-08', 1),
(28, 42, 49, 29, '2020-07-08', 1),
(29, 43, 49, 29, '2020-07-07', 1),
(30, 44, 1, 29, '2020-07-08', 1),
(31, 45, 1, 29, '2020-07-08', 1),
(32, 46, 1, 29, '2020-07-08', 1),
(33, 47, 1, 29, '2020-07-08', 1),
(34, 48, 1, 29, '2020-07-08', 1),
(35, 49, 50, 29, '2020-07-08', 1),
(36, 50, 50, 29, '2020-07-07', 1),
(37, 51, 50, 29, '2020-07-07', 1),
(38, 42, 49, 27, '2020-07-07', 1),
(39, 40, 49, 27, '2020-07-07', 1),
(40, 43, 49, 27, '2020-07-07', 1),
(41, 53, 51, 30, '2020-07-26', 1),
(42, 52, 1, 30, '2020-07-08', 1),
(43, 54, 1, 30, '2020-07-08', 1),
(44, 55, 51, 30, '2020-07-09', 1),
(45, 56, 1, 30, '2020-07-08', 1),
(46, 57, 51, 30, '2020-07-09', 1),
(47, 58, 52, 31, '2020-07-26', 1),
(48, 59, 52, 31, '2020-07-26', 1),
(49, 60, 53, 31, '2020-07-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblteam`
--

CREATE TABLE `tblteam` (
  `Tid` int(11) NOT NULL,
  `Tname` varchar(100) NOT NULL,
  `Ttype` varchar(100) NOT NULL,
  `TeamDescription` varchar(100) NOT NULL,
  `Uid` int(11) NOT NULL,
  `Date` date NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `ProfilePic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteam`
--

INSERT INTO `tblteam` (`Tid`, `Tname`, `Ttype`, `TeamDescription`, `Uid`, `Date`, `IsActive`, `ProfilePic`) VALUES
(1, 'No Team', 'others', 'For individual Boards', 1, '2020-06-01', 1, NULL),
(42, 'team notification', 'Others', 'abcd', 27, '2020-06-26', 1, 'about-img9.jpg'),
(43, 'team check', 'Marketing', 'new team ', 26, '2020-06-28', 1, NULL),
(51, 'Developers', 'Education', 'Different Websites', 30, '2020-07-08', 1, 'contact-img2.jpg'),
(52, 'team traveller', 'Personal', 'travelling team', 31, '2020-07-26', 1, 'blog-img54.jpg'),
(53, 'team one', 'Others', 'demo ', 31, '2020-07-26', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblteammember`
--

CREATE TABLE `tblteammember` (
  `Tmid` int(11) NOT NULL,
  `Tid` int(11) NOT NULL,
  `Uid` int(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Bid` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `IsActive` tinyint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblteammember`
--

INSERT INTO `tblteammember` (`Tmid`, `Tid`, `Uid`, `Email`, `Bid`, `Date`, `IsActive`) VALUES
(37, 42, 27, 'poojakusingh40@gmail.com', NULL, '2020-06-26', 1),
(38, 42, 27, 'poojakusingh40@gmail.com', 22, '2020-06-26', 1),
(40, 42, 27, 'poojakusingh40@gmail.com', 24, '2020-06-27', 1),
(42, 42, 26, 'jigneshmahadik777@gmail.com', 25, '2020-06-27', 1),
(43, 42, 27, 'poojakusingh40@gmail.com', 25, '2020-06-28', 1),
(45, 43, 26, 'jigneshmahadik777@gmail.com', NULL, '2020-06-28', 1),
(51, 42, 28, 'riya.jain9497@gmail.com', 27, '2020-06-29', 1),
(52, 42, 28, 'riya.jain9497@gmail.com', 25, '2020-06-29', 1),
(53, 42, 27, 'poojakusingh40@gmail.com', 27, '2020-06-30', 1),
(70, 51, 30, 'abhilashakumari9797@gmail.com', NULL, '2020-07-08', 1),
(71, 51, 30, 'abhilashakumari9797@gmail.com', 53, '2020-07-08', 1),
(72, 51, 27, 'poojakusingh40@gmail.com', 53, '2020-07-08', 1),
(73, 51, 30, 'abhilashakumari9797@gmail.com', 55, '2020-07-08', 1),
(74, 51, 30, 'abhilashakumari9797@gmail.com', 57, '2020-07-08', 1),
(75, 52, 31, 'abhi1234@gmail.com', NULL, '2020-07-26', 1),
(76, 52, 31, 'abhi1234@gmail.com', 58, '2020-07-26', 1),
(77, 52, 27, 'poojakusingh40@gmail.com', 58, '2020-07-26', 1),
(78, 52, 31, 'abhi1234@gmail.com', 59, '2020-07-26', 1),
(79, 53, 31, 'abhi1234@gmail.com', NULL, '2020-07-26', 1),
(80, 53, 31, 'abhi1234@gmail.com', 60, '2020-07-26', 1),
(81, 53, NULL, 'puja1234@gmail.com', 60, '2020-07-26', 0);

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
  `ProfilePic` varchar(100) DEFAULT NULL,
  `Token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`Uid`, `Fname`, `Lname`, `Email`, `Password`, `Mobile`, `Date`, `IsActive`, `ProfilePic`, `Token`) VALUES
(26, 'Jigneshkumar', 'Mahadik', 'jigneshmahadik777@gmail.com', 'jignesh', 9967543621, '2020-06-25', 1, 'avtar-15.jpg', '40f77517b570558baf1f2dd1de2a8f'),
(27, 'Abhilasha', 'Kumari', 'poojakusingh40@gmail.com', 'pujasingh', 7684905419, '2020-06-26', 1, 'avtar-14.jpg', '8ac545db3046f5e19985388adb9104'),
(28, 'Riya', 'Jain', 'riya.jain9497@gmail.com', 'riya jain', 9876543219, '2020-06-29', 1, NULL, '22ecf09288bd00e68a3504ddfd0c36'),
(30, 'Abhilasha', 'Kumari', 'abhilashakumari9797@gmail.com', 'abhilasha1234', 7684905416, '2020-07-08', 1, 'avtar-08.jpg', 'b60f929d29a0fc5824a04b254215f3'),
(31, 'Abhishek', 'Kumar', 'abhi1234@gmail.com', 'abhi1234', 9988776655, '2020-07-26', 1, NULL, '6f7e2dc38380d9ae5e535247231f7d'),
(32, 'Abhilasha', 'Kumari', 'abhilasha9797@gmail.com', 'abhi1234', 5566778899, '2020-07-26', 1, NULL, '72a89491fa4ad832e8bbfc4b17f177');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblboard`
--
ALTER TABLE `tblboard`
  ADD PRIMARY KEY (`Bid`);

--
-- Indexes for table `tblcalendar`
--
ALTER TABLE `tblcalendar`
  ADD PRIMARY KEY (`Calendarid`);

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
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`Notificationid`);

--
-- Indexes for table `tblrecent`
--
ALTER TABLE `tblrecent`
  ADD PRIMARY KEY (`Rid`);

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
  MODIFY `Bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tblcalendar`
--
ALTER TABLE `tblcalendar`
  MODIFY `Calendarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcard`
--
ALTER TABLE `tblcard`
  MODIFY `Cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tblchecklist`
--
ALTER TABLE `tblchecklist`
  MODIFY `Checklistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbllist`
--
ALTER TABLE `tbllist`
  MODIFY `Listid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblmembercard`
--
ALTER TABLE `tblmembercard`
  MODIFY `Mcardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `Notificationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblrecent`
--
ALTER TABLE `tblrecent`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tblteam`
--
ALTER TABLE `tblteam`
  MODIFY `Tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblteammember`
--
ALTER TABLE `tblteammember`
  MODIFY `Tmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbltemplate`
--
ALTER TABLE `tbltemplate`
  MODIFY `Tempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
