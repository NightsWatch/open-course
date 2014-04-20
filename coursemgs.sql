-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2014 at 02:53 AM
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
  `studmarks` int(11) DEFAULT NULL,
  PRIMARY KEY (`assignid`),
  KEY `index-courseid` (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignid`, `assign_name`, `courseid`, `assignno`, `filepath`, `deadline`, `maxmarks`, `studmarks`) VALUES
(1, 'sdfgds', 3, 1, 'sdfsdfdsfdsfdsf', '2014-04-25 00:00:00', 10, NULL),
(2, 'dfgdgds', 3, 2, 'sdfdsf', '2014-04-08 00:00:00', 10, NULL),
(3, 'dfgdgd', 1, 2, 'dfsf', '2014-04-03 00:00:00', 10, NULL),
(4, '11', 1, 1, '', '2014-08-04 00:45:00', 232, NULL),
(5, '11', 1, 1, '', '2014-08-04 00:45:00', 232, NULL),
(6, '11', 1, 1, 'assignments/6.zip', '2014-08-04 00:45:00', 232, NULL),
(7, '11', 1, 1, 'assignments/7.zip', '2014-08-04 00:45:00', 232, NULL),
(8, '11', 1, 1, 'assignments/8.pdf', '2014-08-04 00:45:00', 232, NULL),
(9, '21', 1, 43, 'assignments/9.pdf', '2016-06-04 01:00:00', 55, NULL),
(10, '21', 1, 43, '../assignments/10.pdf', '2016-06-04 01:00:00', 55, NULL),
(11, '21', 1, 43, '../assignments/11.pdf', '2016-06-04 01:00:00', 55, NULL),
(12, '32', 1, 423, '../assignments/12.pdf', '2015-12-04 05:00:00', 324, NULL),
(13, '32', 1, 423, '../assignments/13.pdf', '2015-12-04 05:00:00', 324, NULL),
(14, '3', 1, 32, '../assignments/14.pdf', '2016-06-04 05:00:00', 423, NULL),
(15, '3212321', 1, 232, '../assignments/15.pptx', '2014-02-04 05:00:00', 213, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignsubmissions`
--

CREATE TABLE IF NOT EXISTS `assignsubmissions` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(50) NOT NULL,
  `assignid` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `stime` datetime NOT NULL,
  `studid` int(11) NOT NULL,
  PRIMARY KEY (`subid`),
  KEY `index-studid` (`studid`),
  KEY `assgnid` (`assignid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `assignsubmissions`
--

INSERT INTO `assignsubmissions` (`subid`, `filepath`, `assignid`, `marks`, `stime`, `studid`) VALUES
(3, 'dsgfvsdgf', 1, NULL, '2014-04-09 06:00:00', 5),
(4, 'jhghj', 2, NULL, '0000-00-00 00:00:00', 5);

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
(3, 6),
(3, 9);

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
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `courseno`, `coursename`, `department`, `year`, `credits`) VALUES
(1, 'MA201', 'Linear Algebra', 'Mathematics', 2013, 6),
(2, 'MA201', 'Linear Algebra', 'Mathematics', 2014, 6),
(3, 'CS333', 'Multimedia Databases', 'CSE', 2014, 6);

-- --------------------------------------------------------

--
-- Table structure for table `coursestudregistration`
--

CREATE TABLE IF NOT EXISTS `coursestudregistration` (
  `courseid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`courseid`,`studentid`),
  KEY `course-stud-registration_ibfk_2` (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursestudregistration`
--

INSERT INTO `coursestudregistration` (`courseid`, `studentid`, `grade`) VALUES
(1, 5, 0),
(1, 7, 0),
(3, 5, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(6, 'Arijit Sur', 'CSE', 'Assistant Professor', 2010),
(9, 'Ranbir Singh', 'CSE', 'Assistnat Prof', 2011);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`courseid`, `threadid`, `threadtitle`, `timestamp`, `starterid`) VALUES
(3, 6, 'Hi buddies', '2014-04-20 03:54:10', 5),
(3, 7, 'sdfdsfdsf', '2014-04-20 04:24:26', 5),
(3, 8, 'sdfdsfdsf', '2014-04-20 04:25:55', 5),
(3, 9, 'sdfdsfdsf', '2014-04-20 04:26:32', 5),
(3, 10, 'sdfdsfdsf', '2014-04-20 04:28:10', 5),
(3, 11, 'sdfdsfdsf', '2014-04-20 04:28:42', 5),
(3, 12, 'jk', '2014-04-20 04:30:48', 5),
(3, 13, 'jk', '2014-04-20 04:33:17', 5),
(3, 14, 'hi checking notifs', '2014-04-20 04:35:12', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecid`, `courseid`, `lectureno`, `lecturename`, `filepath`) VALUES
(1, 3, 1, 'dfdsfsfs', 'fsdfdsfsdfsdfsdfs'),
(2, 3, 2, 'dfdsfsdfdsfdsf', 'sdfsdfdsfds'),
(8, 2, 1, 'asd', ''),
(10, 2, 2, 'Student', ''),
(11, 2, 2, 'Student', ''),
(13, 2, 4, 'asd', ''),
(14, 2, 3, 'Student', '../lectures/14.pptx'),
(15, 1, 32, '43324', '../lectures/15.pdf'),
(16, 1, 420, 'Thermodynamics', '../lectures/16.pdf'),
(17, 1, 0, '1111', '../lectures/17.pdf'),
(18, 1, 534, '342', '../lectures/18.pptx');

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
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`messageid`),
  KEY `indexsender` (`senderid`),
  KEY `indexreceiver` (`receiverid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageid`, `senderid`, `receiverid`, `message`, `seen`, `timestamp`) VALUES
(31, 5, 6, 'fddsfdsfds', 0, '0000-00-00 00:00:00'),
(32, 5, 7, 'dfsfgdsgfdsgsd', 0, '0000-00-00 00:00:00'),
(33, 5, 8, 'ghfdhfh', 0, '2000-00-00 00:00:00'),
(37, 5, 7, 'ewq43q2', 0, '0000-00-00 00:00:00'),
(38, 5, 7, 'ewq43q2', 0, '0000-00-00 00:00:00'),
(39, 5, 7, 'ewq43q2', 0, '0000-00-00 00:00:00'),
(40, 5, 7, 'ewq43q2fsd', 0, '0000-00-00 00:00:00'),
(41, 5, 7, 'ewq43q2fsddf', 0, '0000-00-00 00:00:00'),
(42, 5, 7, 'ewsdf', 0, '0000-00-00 00:00:00'),
(43, 5, 7, 'ewsdf', 0, '0000-00-00 00:00:00'),
(44, 5, 7, 'ewsdf', 0, '0000-00-00 00:00:00'),
(45, 5, 7, 'ewsdf', 0, '0000-00-00 00:00:00'),
(46, 5, 7, 'ewsdf', 0, '0000-00-00 00:00:00'),
(47, 5, 7, 'ewsdf', 0, '0000-00-00 00:00:00'),
(48, 5, 8, 'dasd', 0, '1900-00-00 00:00:00'),
(49, 5, 8, '5-8', 0, '0001-00-00 00:00:00'),
(50, 7, 6, 'dsfdsf', 0, '0000-00-00 00:00:00'),
(51, 7, 6, 'dsfdsf', 0, '0000-00-00 00:00:00'),
(52, 7, 6, 'dsfdsf', 0, '0000-00-00 00:00:00'),
(53, 7, 6, 'dsfdsf', 0, '0000-00-00 00:00:00'),
(54, 7, 6, 'dsfdsf', 0, '0000-00-00 00:00:00'),
(55, 7, 6, 'dsfdsf', 0, '0000-00-00 00:00:00'),
(56, 7, 6, 'sadas', 0, '0000-00-00 00:00:00'),
(57, 7, 6, 'ahukghjk', 0, '0000-00-00 00:00:00'),
(58, 7, 5, 'sadasdafds', 1, '2014-04-18 21:33:28'),
(59, 5, 8, 'asdasdasdf', 0, '2014-04-18 22:07:18'),
(60, 8, 5, 'asdfsafda', 1, '2014-04-18 22:49:14'),
(64, 5, 7, 'afsa', 0, '2014-04-19 23:49:43'),
(65, 5, 6, 'asd', 0, '2014-04-19 23:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `notifsassignments`
--

CREATE TABLE IF NOT EXISTS `notifsassignments` (
  `notifid` int(11) NOT NULL AUTO_INCREMENT,
  `foruserid` int(11) NOT NULL,
  `assignments` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`notifid`),
  KEY `useridindex` (`foruserid`),
  KEY `courselect` (`assignments`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `notifsassignments`
--

INSERT INTO `notifsassignments` (`notifid`, `foruserid`, `assignments`, `seen`, `timestamp`) VALUES
(5, 6, 1, 1, '2014-04-17 00:00:00'),
(6, 5, 3, 1, '2014-04-16 00:00:00'),
(7, 5, 1, 1, '0000-00-00 00:00:00'),
(8, 5, 1, 1, '0000-00-00 00:00:00'),
(9, 5, 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifslectures`
--

CREATE TABLE IF NOT EXISTS `notifslectures` (
  `notifid` int(11) NOT NULL AUTO_INCREMENT,
  `foruserid` int(11) NOT NULL,
  `lectures` int(11) NOT NULL,
  `seen` bit(1) NOT NULL DEFAULT b'0',
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`notifid`),
  KEY `useridindex` (`foruserid`),
  KEY `courselect` (`lectures`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notifslectures`
--

INSERT INTO `notifslectures` (`notifid`, `foruserid`, `lectures`, `seen`, `timestamp`) VALUES
(1, 5, 2, b'1', '2014-04-25 00:00:00'),
(2, 5, 2, b'1', '2014-04-24 00:00:00'),
(3, 7, 3, b'1', '2014-04-03 00:00:00'),
(4, 5, 1, b'1', '0000-00-00 00:00:00'),
(5, 5, 1, b'1', '0000-00-00 00:00:00'),
(6, 5, 1, b'1', '0000-00-00 00:00:00'),
(7, 5, 1, b'0', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notifsthreads`
--

INSERT INTO `notifsthreads` (`notifid`, `foruserid`, `threadid`, `seen`, `timestamp`) VALUES
(9, 5, 13, b'1', '2014-04-20 04:33:17'),
(10, 5, 14, b'1', '2014-04-20 04:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `threadid` int(11) NOT NULL,
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`postid`),
  KEY `useridindex` (`userid`),
  KEY `tidindex` (`threadid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`threadid`, `postid`, `userid`, `timestamp`, `content`) VALUES
(6, 1, 5, '2014-04-20 04:08:25', 'hi there'),
(6, 2, 5, '2014-04-20 04:17:46', 'bfgfcb'),
(6, 3, 5, '2014-04-20 04:18:29', 'go '),
(6, 4, 5, '2014-04-20 04:31:46', 'fs'),
(6, 5, 5, '2014-04-20 04:33:19', 'fsddfs'),
(6, 6, 5, '2014-04-20 04:35:42', 'fsddfsdfsfsddvfd');

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
  PRIMARY KEY (`userid`),
  UNIQUE KEY `roll` (`roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`userid`, `name`, `program`, `batch`, `department`, `roll`, `ista`) VALUES
(5, 'h', 'B.TECH', '2015', 'CSE', 11010158, 0),
(7, 'A', 'B.Tech', '2012', 'CS', 11010155, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studtaallotment`
--

CREATE TABLE IF NOT EXISTS `studtaallotment` (
  `studid` int(11) NOT NULL,
  `ctallotid` int(11) NOT NULL,
  PRIMARY KEY (`studid`,`ctallotid`),
  KEY `stud-ta-allotment_ibfk_2` (`ctallotid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `usertype`, `email_id`, `fill`) VALUES
(5, 'r', 'c4ca4238a0b923820dcc509a6f75849b', 'Student', 'r', 0),
(6, 'a', 'c4ca4238a0b923820dcc509a6f75849b', 'Faculty', 'rahulhuilgol@gmail.com', 0),
(7, 'b', 'c4ca4238a0b923820dcc509a6f75849b', 'Student', 'b', 0),
(8, 'c', 'c4ca4238a0b923820dcc509a6f75849b', 'Student', 'c', 0),
(9, 'ranbir', 'c4ca4238a0b923820dcc509a6f75849b', 'Faculty', 'ranbirsingh', 0);

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
-- Constraints for table `studtaallotment`
--
ALTER TABLE `studtaallotment`
  ADD CONSTRAINT `studtaallotment_ibfk_1` FOREIGN KEY (`studid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studtaallotment_ibfk_2` FOREIGN KEY (`ctallotid`) REFERENCES `coursetaallotment` (`ctallotid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
