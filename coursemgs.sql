-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2014 at 04:50 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
-- Table structure for table `assign-submissions`
--

CREATE TABLE IF NOT EXISTS `assign-submissions` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `assgnid` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `stime` datetime NOT NULL,
  `studid` int(11) NOT NULL,
  PRIMARY KEY (`subid`),
  KEY `index-studid` (`studid`),
  KEY `assgnid` (`assgnid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `assignid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `assignno` int(11) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `deadline` datetime DEFAULT NULL,
  `maxmarks` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`assignid`),
  KEY `index-courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course-fac-allotment`
--

CREATE TABLE IF NOT EXISTS `course-fac-allotment` (
  `courseid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  PRIMARY KEY (`courseid`,`facultyid`),
  KEY `facultyid` (`facultyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course-stud-registration`
--

CREATE TABLE IF NOT EXISTS `course-stud-registration` (
  `courseid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`courseid`,`studentid`),
  KEY `course-stud-registration_ibfk_2` (`studentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course-ta-allotment`
--

CREATE TABLE IF NOT EXISTS `course-ta-allotment` (
  `ctallotid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `taid` int(11) NOT NULL,
  PRIMARY KEY (`ctallotid`),
  KEY `course-ta-allotment_ibfk_2` (`taid`),
  KEY `index-courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`courseid`)
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

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `courseid` int(11) NOT NULL,
  `threadid` int(11) NOT NULL,
  `postuserid` int(11) NOT NULL,
  `posttime` datetime NOT NULL,
  PRIMARY KEY (`threadid`),
  KEY `courseidindex` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `seen` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`messageid`),
  KEY `indexsender` (`senderid`),
  KEY `indexreceiver` (`receiverid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notifid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postuserid` int(11) NOT NULL,
  `threadid` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `seen` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`notifid`),
  KEY `threadidindex` (`threadid`),
  KEY `useridindex` (`userid`),
  KEY `postuseridindex` (`postuserid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `threadid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `posttime` datetime NOT NULL,
  PRIMARY KEY (`threadid`,`postid`),
  KEY `useridindex` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stud-ta-allotment`
--

CREATE TABLE IF NOT EXISTS `stud-ta-allotment` (
  `studid` int(11) NOT NULL,
  `ctallotid` int(11) NOT NULL,
  PRIMARY KEY (`studid`,`ctallotid`),
  KEY `stud-ta-allotment_ibfk_2` (`ctallotid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `is-ta` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `roll` (`roll`)
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
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign-submissions`
--
ALTER TABLE `assign-submissions`
  ADD CONSTRAINT `fkey-studid` FOREIGN KEY (`studid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey-assgnid` FOREIGN KEY (`assgnid`) REFERENCES `assignments` (`assignid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course-fac-allotment`
--
ALTER TABLE `course-fac-allotment`
  ADD CONSTRAINT `course-fac-allotment_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course-fac-allotment_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course-stud-registration`
--
ALTER TABLE `course-stud-registration`
  ADD CONSTRAINT `course-stud-registration_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course-stud-registration_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course-ta-allotment`
--
ALTER TABLE `course-ta-allotment`
  ADD CONSTRAINT `course-ta-allotment_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course-ta-allotment_ibfk_2` FOREIGN KEY (`taid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `courses` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_fkey1` FOREIGN KEY (`receiverid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_fkey2` FOREIGN KEY (`senderid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fkey3` FOREIGN KEY (`threadid`) REFERENCES `forums` (`threadid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey2` FOREIGN KEY (`postuserid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`threadid`) REFERENCES `forums` (`threadid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud-ta-allotment`
--
ALTER TABLE `stud-ta-allotment`
  ADD CONSTRAINT `stud-ta-allotment_ibfk_2` FOREIGN KEY (`ctallotid`) REFERENCES `course-ta-allotment` (`ctallotid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stud-ta-allotment_ibfk_1` FOREIGN KEY (`studid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
