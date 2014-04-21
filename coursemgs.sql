-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 12:05 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coursemgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `assignid` int(11) NOT NULL AUTO_INCREMENT,
  `assign_name` text NOT NULL,
  `courseid` int(11) NOT NULL,
  `assignno` int(11) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `maxmarks` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`assignid`),
  KEY `index-courseid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignid`, `assign_name`, `courseid`, `assignno`, `filepath`, `deadline`, `maxmarks`) VALUES
(36, 'Sorting', 25, 1, '../assignments/36.zip', '2014-04-20 23:00:00', 20),
(37, 'Quick Sort', 25, 2, '../assignments/37.zip', '2014-04-29 23:00:00', 25),
(38, 'Merge Sort', 25, 3, '../assignments/38.pptx', '2014-04-29 23:00:00', 35),
(39, 'Test', 25, 4, '../assignments/39.zip', '2014-04-22 23:30:00', 22);

-- --------------------------------------------------------

--
-- Table structure for table `assignsubmissions`
--

CREATE TABLE IF NOT EXISTS `assignsubmissions` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(50) NOT NULL,
  `assignid` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `stime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `studid` int(11) NOT NULL,
  PRIMARY KEY (`subid`),
  KEY `index-studid` (`studid`),
  KEY `assgnid` (`assignid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `assignsubmissions`
--

INSERT INTO `assignsubmissions` (`subid`, `filepath`, `assignid`, `marks`, `stime`, `studid`) VALUES
(35, '../submissions/35.zip', 37, 22, '2014-04-21 23:55:17', 23);

-- --------------------------------------------------------

--
-- Table structure for table `coursefacallotment`
--

CREATE TABLE IF NOT EXISTS `coursefacallotment` (
  `courseid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  PRIMARY KEY (`courseid`,`facultyid`),
  KEY `facultyid` (`facultyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursefacallotment`
--

INSERT INTO `coursefacallotment` (`courseid`, `facultyid`) VALUES
(25, 26),
(26, 27),
(24, 32),
(25, 33);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `courseno` varchar(10) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `credits` int(10) NOT NULL,
  `slot` varchar(2) NOT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `courseno`, `coursename`, `department`, `year`, `credits`, `slot`) VALUES
(24, 'CL 201', 'Chemical Systems', 'Chemical', 2014, 8, 'A'),
(25, 'CS201', 'Algorithms', 'CSE', 2014, 8, 'B'),
(26, 'CS200', 'Data Structures', 'CSE', 2014, 6, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `coursestudregistration`
--

CREATE TABLE IF NOT EXISTS `coursestudregistration` (
  `courseid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `grade` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`courseid`,`studentid`),
  KEY `course-stud-registration_ibfk_2` (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursestudregistration`
--

INSERT INTO `coursestudregistration` (`courseid`, `studentid`, `grade`) VALUES
(24, 23, NULL),
(24, 37, NULL),
(25, 23, NULL),
(25, 34, NULL),
(25, 37, 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `coursetaallotment`
--

CREATE TABLE IF NOT EXISTS `coursetaallotment` (
  `ctallotid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `taid` int(11) NOT NULL,
  PRIMARY KEY (`ctallotid`),
  KEY `course-ta-allotment_ibfk_2` (`taid`),
  KEY `index-courseid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `coursetaallotment`
--

INSERT INTO `coursetaallotment` (`ctallotid`, `courseid`, `taid`) VALUES
(10, 25, 22);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `examid` int(11) NOT NULL AUTO_INCREMENT,
  `examtitle` varchar(50) NOT NULL,
  `courseid` int(11) NOT NULL,
  `maxmarks` int(11) NOT NULL,
  `weightage` text NOT NULL,
  `filepath` varchar(1000) NOT NULL,
  PRIMARY KEY (`examid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`examid`, `examtitle`, `courseid`, `maxmarks`, `weightage`, `filepath`) VALUES
(8, 'Quiz 1', 25, 30, '30', '../exams/questions/8.zip'),
(9, 'Midsem', 25, 60, '60', '../exams/questions/9.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `examsolutions`
--

CREATE TABLE IF NOT EXISTS `examsolutions` (
  `solid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `studcomments` text NOT NULL,
  `marks` int(11) NOT NULL,
  `reeval` varchar(10) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`solid`),
  KEY `studentid` (`studentid`,`examid`,`filepath`),
  KEY `exfk` (`examid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `examsolutions`
--

INSERT INTO `examsolutions` (`solid`, `studentid`, `examid`, `filepath`, `studcomments`, `marks`, `reeval`) VALUES
(32, 23, 9, '../exams/solutions/32.pptx', '', 50, 'no'),
(33, 23, 8, '../exams/solutions/33.zip', 'Question 1 I used this which is right accd to Cormen', 12, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `joined` year(4) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`userid`, `name`, `department`, `designation`, `joined`) VALUES
(26, 'Ranjan Singh', 'CSE', 'Assistant Prof', 2009),
(27, 'Arnab Sarkar', 'CSE', 'Assistant Prof', 2010),
(28, 'Arijit Sur', 'CSE', 'Assistant Prof', 2012),
(31, 'BKPatel', 'Chemical', 'Professor', 1999),
(32, 'Mohan Singh', 'Chemical', 'Professor', 2005),
(33, 'SB Nair', 'CSE', 'Professor', 2004),
(36, 'HK Singh', 'Design', 'HOD', 2004);

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `courseid` int(11) NOT NULL,
  `threadid` int(11) NOT NULL AUTO_INCREMENT,
  `threadtitle` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `starterid` int(11) NOT NULL,
  PRIMARY KEY (`threadid`),
  KEY `courseidindex` (`courseid`),
  KEY `id` (`starterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`courseid`, `threadid`, `threadtitle`, `timestamp`, `starterid`) VALUES
(25, 26, 'Hello Students, Course Book', '2014-04-21 23:09:03', 33),
(25, 27, 'I''m new here', '2014-04-21 23:16:50', 23),
(25, 28, 'Doubt', '2014-04-21 23:18:33', 23),
(25, 29, 'Another doubt', '2014-04-21 23:19:06', 23),
(25, 30, 'Website course', '2014-04-21 23:19:17', 23);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `lecid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) DEFAULT NULL,
  `lectureno` int(11) NOT NULL,
  `lecturename` varchar(60) NOT NULL,
  `filepath` text NOT NULL,
  PRIMARY KEY (`lecid`),
  KEY `cid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecid`, `courseid`, `lectureno`, `lecturename`, `filepath`) VALUES
(23, 25, 1, 'Intro', '../lectures/23.pptx'),
(24, 25, 2, 'Basics', '../lectures/24.zip'),
(25, 25, 3, 'Sorting', '../lectures/25.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageid`),
  KEY `indexsender` (`senderid`),
  KEY `indexreceiver` (`receiverid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageid`, `senderid`, `receiverid`, `message`, `seen`, `timestamp`) VALUES
(1, 22, 31, 'Hi Sir. How are you?', 1, '2014-04-21 01:50:52'),
(4, 34, 23, 'This is a test message! Hi!', 1, '2014-04-21 14:10:28'),
(5, 23, 34, 'reply back', 1, '2014-04-21 14:11:52'),
(6, 28, 22, 'Your grades are very low. Meet me in the office tomorrow.', 1, '2014-04-21 14:30:49'),
(19, 33, 23, 'Meet me in office', 1, '2014-04-21 23:28:48'),
(20, 33, 23, 'Meet me', 1, '2014-04-21 23:29:13'),
(21, 33, 22, 'Hi', 1, '2014-04-21 23:29:27'),
(23, 33, 23, 'Hi', 1, '2014-04-21 23:31:07'),
(24, 33, 23, 'Hi', 1, '2014-04-21 23:33:05'),
(25, 33, 34, 'Hi', 0, '2014-04-21 23:33:44'),
(26, 33, 34, 'Meet me in office tmrw', 0, '2014-04-21 23:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `notifsassignments`
--

CREATE TABLE IF NOT EXISTS `notifsassignments` (
  `notifid` int(11) NOT NULL AUTO_INCREMENT,
  `foruserid` int(11) NOT NULL,
  `assignments` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notifid`),
  KEY `useridindex` (`foruserid`),
  KEY `courselect` (`assignments`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `notifsassignments`
--

INSERT INTO `notifsassignments` (`notifid`, `foruserid`, `assignments`, `seen`, `timestamp`) VALUES
(27, 23, 25, 0, '2014-04-21 23:39:22'),
(28, 34, 25, 0, '2014-04-21 23:39:23'),
(29, 37, 25, 0, '2014-04-21 23:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `notifslectures`
--

CREATE TABLE IF NOT EXISTS `notifslectures` (
  `notifid` int(11) NOT NULL AUTO_INCREMENT,
  `foruserid` int(11) NOT NULL,
  `lectures` int(11) NOT NULL,
  `seen` bit(1) NOT NULL DEFAULT b'0',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notifid`),
  KEY `useridindex` (`foruserid`),
  KEY `courselect` (`lectures`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `notifslectures`
--

INSERT INTO `notifslectures` (`notifid`, `foruserid`, `lectures`, `seen`, `timestamp`) VALUES
(11, 23, 25, b'0', '2014-04-21 23:23:34'),
(12, 34, 25, b'0', '2014-04-21 23:23:35'),
(13, 37, 25, b'0', '2014-04-21 23:23:36'),
(14, 23, 25, b'0', '2014-04-21 23:23:45'),
(15, 34, 25, b'0', '2014-04-21 23:23:45'),
(16, 37, 25, b'0', '2014-04-21 23:23:46'),
(17, 23, 25, b'0', '2014-04-21 23:23:55'),
(18, 34, 25, b'0', '2014-04-21 23:23:55'),
(19, 37, 25, b'0', '2014-04-21 23:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `notifsthreads`
--

CREATE TABLE IF NOT EXISTS `notifsthreads` (
  `notifid` int(11) NOT NULL AUTO_INCREMENT,
  `foruserid` int(11) NOT NULL,
  `threadid` int(11) NOT NULL,
  `seen` bit(1) NOT NULL DEFAULT b'0',
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notifid`),
  KEY `useridindex` (`foruserid`),
  KEY `threadid` (`threadid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `notifsthreads`
--

INSERT INTO `notifsthreads` (`notifid`, `foruserid`, `threadid`, `seen`, `timestamp`) VALUES
(37, 26, 26, b'1', '2014-04-21 23:09:04'),
(38, 33, 26, b'1', '2014-04-21 23:09:04'),
(39, 23, 27, b'1', '2014-04-21 23:16:50'),
(40, 34, 27, b'1', '2014-04-21 23:16:51'),
(41, 37, 27, b'1', '2014-04-21 23:16:51'),
(42, 26, 27, b'1', '2014-04-21 23:16:52'),
(43, 33, 27, b'1', '2014-04-21 23:16:52'),
(44, 34, 28, b'1', '2014-04-21 23:18:33'),
(45, 37, 28, b'1', '2014-04-21 23:18:33'),
(46, 26, 28, b'1', '2014-04-21 23:18:33'),
(47, 33, 28, b'1', '2014-04-21 23:18:34'),
(48, 34, 29, b'1', '2014-04-21 23:19:06'),
(49, 37, 29, b'1', '2014-04-21 23:19:07'),
(50, 26, 29, b'1', '2014-04-21 23:19:08'),
(51, 33, 29, b'1', '2014-04-21 23:19:08'),
(52, 34, 30, b'1', '2014-04-21 23:19:17'),
(53, 37, 30, b'1', '2014-04-21 23:19:17'),
(54, 26, 30, b'1', '2014-04-21 23:19:17'),
(55, 33, 30, b'1', '2014-04-21 23:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `threadid` int(11) NOT NULL,
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`postid`),
  KEY `useridindex` (`userid`),
  KEY `tidindex` (`threadid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`threadid`, `postid`, `userid`, `timestamp`, `content`) VALUES
(26, 16, 33, '2014-04-21 23:09:10', 'Is this');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `program` varchar(20) NOT NULL,
  `batch` varchar(4) NOT NULL,
  `department` varchar(20) NOT NULL,
  `roll` int(10) NOT NULL,
  `ista` tinyint(1) NOT NULL DEFAULT '0',
  `maxcredits` int(11) NOT NULL DEFAULT '48',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `roll` (`roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`userid`, `name`, `program`, `batch`, `department`, `roll`, `ista`, `maxcredits`) VALUES
(22, 'Rahul Huilgol', 'B.Tech', '2011', 'CSE', 11010156, 2, 25),
(23, 'Harshith Reddy', 'B.Tech', '2011', 'CSE', 11010149, 0, 25),
(24, 'Harsha Tirumala', 'B.Tech', '2011', 'CSE', 11010120, 0, 25),
(29, 'Gowtam Dora', 'B.Tech', '2011', 'Civil', 11010565, 2, 25),
(30, 'Sameer Nekalapu', 'B.Tech', '2011', 'EEE', 11010456, 0, 25),
(34, 'Simrat', 'B.Tech', '2011', 'CSE', 11010165, 3, 25),
(37, 'Harsha Nadimpalli', 'B.Tech', '2011', 'CSE', 11010144, 0, 25);

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE IF NOT EXISTS `thesis` (
  `studentid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `title` text NOT NULL,
  `year` year(4) NOT NULL,
  `field` text NOT NULL,
  PRIMARY KEY (`studentid`),
  KEY `facultyid` (`facultyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`studentid`, `facultyid`, `title`, `year`, `field`) VALUES
(22, 31, 'Dynamics of RDBMS', 2014, 'ML'),
(23, 33, 'AI of Robot', 2015, 'AI'),
(24, 31, 'Randomized Algorithms', 2000, 'ML'),
(34, 36, 'Dynamics of Human Brain', 2014, 'Inter'),
(37, 33, 'RDMS', 2008, 'DBMS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `fill` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `usertype`, `email_id`, `fill`) VALUES
(22, 'rahul', '202cb962ac59075b964b07152d234b70', 'Student', 'rahulhuilgol@gmail.com', 1),
(23, 'harshith', '202cb962ac59075b964b07152d234b70', 'Student', 'harshith2794@gmail.com', 1),
(24, 'harsha', '202cb962ac59075b964b07152d234b70', 'Student', 'harsha1469@gmail.com', 1),
(25, 'Bhanu', '202cb962ac59075b964b07152d234b70', 'Student', 'bhanu@iitg.ernet.in', 0),
(26, 'ranbir', '202cb962ac59075b964b07152d234b70', 'Faculty', 'ranbir@iitg.ernet.in', 1),
(27, 'arnab', '202cb962ac59075b964b07152d234b70', 'Faculty', 'arnabsarkar@iitg.ernet.in', 1),
(28, 'arijit', '202cb962ac59075b964b07152d234b70', 'Faculty', 'arijitsur@iitg.ernet.in', 1),
(29, 'gowtam', '202cb962ac59075b964b07152d234b70', 'Student', 'sunkavalli@live.com', 1),
(30, 'sameer', '202cb962ac59075b964b07152d234b70', 'Student', 'sameer@iitg.ernet.in', 1),
(31, 'bkpatel', '202cb962ac59075b964b07152d234b70', 'HOD', 'bkpatel@iitg.ernet.in', 1),
(32, 'mohan', '202cb962ac59075b964b07152d234b70', 'Faculty', 'mohansingh@iitg.ernet.in', 1),
(33, 'sbn', '202cb962ac59075b964b07152d234b70', 'HOD', 'sbn@iitg.ernet.in', 1),
(34, 'simrat', '81cd19286e44dc52c7a5b15379427d7f', 'Student', 'simratsingh@something.com', 1),
(36, 'hksingh', '202cb962ac59075b964b07152d234b70', 'HOD', 'hksingh', 1),
(37, 'nadim', '202cb962ac59075b964b07152d234b70', 'Student', 'nadim', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignsubmissions`
--
ALTER TABLE `assignsubmissions`
  ADD CONSTRAINT `fkey-assgnid` FOREIGN KEY (`assignid`) REFERENCES `assignments` (`assignid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey-studid` FOREIGN KEY (`studid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursefacallotment`
--
ALTER TABLE `coursefacallotment`
  ADD CONSTRAINT `coursefacallotment_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursefacallotment_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursestudregistration`
--
ALTER TABLE `coursestudregistration`
  ADD CONSTRAINT `coursestudregistration_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursestudregistration_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coursetaallotment`
--
ALTER TABLE `coursetaallotment`
  ADD CONSTRAINT `coursetaallotment_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursetaallotment_ibfk_2` FOREIGN KEY (`taid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examsolutions`
--
ALTER TABLE `examsolutions`
  ADD CONSTRAINT `a2` FOREIGN KEY (`examid`) REFERENCES `exams` (`examid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `a1` FOREIGN KEY (`studentid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `fkey_user` FOREIGN KEY (`starterid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_fkey1` FOREIGN KEY (`receiverid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_fkey2` FOREIGN KEY (`senderid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifsassignments`
--
ALTER TABLE `notifsassignments`
  ADD CONSTRAINT `fkey_cid` FOREIGN KEY (`assignments`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey_userid` FOREIGN KEY (`foruserid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifslectures`
--
ALTER TABLE `notifslectures`
  ADD CONSTRAINT `fkey23` FOREIGN KEY (`lectures`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkeyid` FOREIGN KEY (`foruserid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifsthreads`
--
ALTER TABLE `notifsthreads`
  ADD CONSTRAINT `asd` FOREIGN KEY (`threadid`) REFERENCES `forums` (`threadid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`foruserid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `dsfds` FOREIGN KEY (`threadid`) REFERENCES `forums` (`threadid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `facultyr` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentr` FOREIGN KEY (`studentid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
