-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2014 at 04:24 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignid`, `assign_name`, `courseid`, `assignno`, `filepath`, `deadline`, `maxmarks`) VALUES
(27, 'Introductory', 17, 1, '../assignments/27.txt', '2014-04-22 01:30:00', 32),
(28, 'Basics', 17, 2, '../assignments/28.zip', '2014-04-20 01:30:00', 21);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `assignsubmissions`
--

INSERT INTO `assignsubmissions` (`subid`, `filepath`, `assignid`, `marks`, `stime`, `studid`) VALUES
(29, '../submissions/29.txt', 27, 3, '2014-04-21 01:48:00', 22),
(30, '../submissions/30.txt', 27, NULL, '2014-04-21 01:49:16', 22);

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
(17, 31),
(18, 32);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `courseno`, `coursename`, `department`, `year`, `credits`, `slot`) VALUES
(17, 'CL201', 'Chemical Systems', 'Chemical', 2014, 8, 'A'),
(18, 'CL555', 'Thermodynamics', 'Chemical', 2014, 6, 'A');

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
(17, 22, NULL),
(17, 23, 28),
(18, 23, NULL);

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
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `examid` int(11) NOT NULL AUTO_INCREMENT,
  `examno` int(11) NOT NULL,
  `examtitle` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `maxmarks` int(11) NOT NULL,
  PRIMARY KEY (`examid`),
  KEY `courseid` (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `examsolutions`
--

CREATE TABLE IF NOT EXISTS `examsolutions` (
  `solid` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `filepath` int(11) NOT NULL,
  `studcomments` text NOT NULL,
  `marks` int(11) NOT NULL,
  `reeval` varchar(10) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`solid`),
  KEY `studentid` (`studentid`,`examid`,`filepath`)
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
(26, 'Ranbir Singh', 'CSE', 'Assistant Prof', 2009),
(27, 'Arnab Sarkar', 'CSE', 'Assistant Prof', 2010),
(28, 'Arijit Sur', 'CSE', 'Assistant Prof', 2012),
(31, 'BKPatel', 'Chemical', 'Professor', 1999),
(32, 'Mohan Singh', 'Chemical', 'Professor', 2005),
(33, 'SB Nair', 'CSE', 'Professor', 2004);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`courseid`, `threadid`, `threadtitle`, `timestamp`, `starterid`) VALUES
(17, 16, 'Hi! Course Textbook', '2014-04-21 00:37:17', 31),
(17, 18, 'Doubt', '2014-04-21 00:46:55', 22);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecid`, `courseid`, `lectureno`, `lecturename`, `filepath`) VALUES
(19, 17, 1, 'Basics', '../lectures/19.pptx'),
(20, 17, 2, 'Enzyme', '../lectures/20.zip');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageid`, `senderid`, `receiverid`, `message`, `seen`, `timestamp`) VALUES
(1, 22, 31, 'Hi Sir. How are you?', 1, '2014-04-21 01:50:52'),
(2, 31, 22, 'H', 1, '2014-04-21 04:00:57');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `notifsassignments`
--

INSERT INTO `notifsassignments` (`notifid`, `foruserid`, `assignments`, `seen`, `timestamp`) VALUES
(10, 22, 17, 1, '0000-00-00 00:00:00'),
(11, 22, 17, 1, '0000-00-00 00:00:00'),
(12, 22, 17, 1, '0000-00-00 00:00:00'),
(13, 22, 17, 1, '0000-00-00 00:00:00'),
(14, 22, 17, 1, '0000-00-00 00:00:00'),
(15, 22, 17, 1, '0000-00-00 00:00:00'),
(16, 22, 17, 1, '0000-00-00 00:00:00'),
(17, 22, 17, 1, '0000-00-00 00:00:00'),
(18, 22, 17, 1, '0000-00-00 00:00:00'),
(19, 22, 17, 1, '0000-00-00 00:00:00'),
(20, 22, 17, 1, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `notifslectures`
--

INSERT INTO `notifslectures` (`notifid`, `foruserid`, `lectures`, `seen`, `timestamp`) VALUES
(8, 22, 17, b'1', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `notifsthreads`
--

INSERT INTO `notifsthreads` (`notifid`, `foruserid`, `threadid`, `seen`, `timestamp`) VALUES
(13, 22, 18, b'1', '2014-04-21 00:46:56');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`threadid`, `postid`, `userid`, `timestamp`, `content`) VALUES
(16, 9, 31, '2014-04-21 00:39:25', 'This is by ABC'),
(16, 10, 22, '2014-04-21 00:46:20', 'Hi SIr'),
(16, 11, 22, '2014-04-21 04:07:38', 'Sure man'),
(16, 12, 22, '2014-04-21 04:08:22', 'Their primary weakness was that they were almost entirely reliant upon cavalry. Mongol tactics, training and organization were focused on mounted combat, and although they could be flexible -- for example, by using Chinese and other engineers for help with breaching defenses when it came to siege warfare (which required infantry units as well) -- they were inevitably hampered by more mountainous, broken terrain compared to their success in the open Steppes. The army was almost entirely composed of cavalry, with forty percent heavy cavalry, and the remaining sixty percent designated light cavalry. There were no organic Mongol infantry units, but often units of conquered peoples (or even their civilian populations) were pressed into service for specific campaigns. These units were considered entirely expendable. It was common Mongol practice to attack the outlying and less defended cities and towns before bringing a major city or fortress under attack. The captured populations of these t'),
(16, 13, 22, '2014-04-21 04:08:57', 'Their primary weakness was that they were almost entirely reliant upon cavalry. Mongol tactics, training and organization were focused on mounted combat, and although they could be flexible -- for example, by using Chinese and other engineers for help with breaching defenses when it came to siege warfare (which required infantry units as well) -- they were inevitably hampered by more mountainous, broken terrain compared to their success in the open Steppes. The army was almost entirely composed of cavalry, with forty percent heavy cavalry, and the remaining sixty percent designated light cavalry. There were no organic Mongol infantry units, but often units of conquered peoples (or even their civilian populations) were pressed into service for specific campaigns. These units were considered entirely expendable. It was common Mongol practice to attack the outlying and less defended cities and towns before bringing a major city or fortress under attack. The captured populations of these towns were then driven forward in advance of the Mongol army and forced directly against the enemy army. Often these "infantry" were used as laborers in sieges, or driven against the walls of a city where they suffered terrible casualties...." Genghis Khan''s Greatest General: Subotai the Valiant[1] by Richard A. Gabriel Common Mongol cavalry tactics -- for example, the devastating hit-and-run tactic of circling with light cavalry and chipping away at enemy formations with flights of arrows, then retreating swiftly -- don''t adapt well to infantry combat. In addition, the ability to cover great distances so as to take an enemy by surprise is hampered to a degree by the mountainous (and forested) terrain of Europe and the Caucasus. Not that these problems couldn''t be overcome: Mongol forces easily won most of their major engagements with Europeans. But the terrain wasn''t a natural fit for their most successful tactics. Massive cavalry armies also have a serious logistical problem. A Mongolian "tuman," the largest military division, consisted of 10,000 mounted soldiers, each of whom traveled with and often fought with 3-4 spare mounts. 40,000 horses require a lot of forage, and overgrazing was a continual issue.');

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
(22, 'Rahul Huilgol', 'B.Tech', '2011', 'CSE', 11010156, 0, 22),
(23, 'Harshith Reddy', 'B.Tech', '2011', 'CSE', 11010149, 0, 22),
(24, 'Harsha Tirumala', 'B.Tech', '2011', 'CSE', 1101010120, 0, 22),
(29, 'Gowtam Dora', 'B.Tech', '2011', 'Civil', 11010565, 0, 22),
(30, 'Sameer Nekalapu', 'B.Tech', '2011', 'EEE', 11010456, 0, 22);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

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
(33, 'sbn', '202cb962ac59075b964b07152d234b70', 'HOD', 'sbn@iitg.ernet.in', 1);

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

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `facultyr` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentr` FOREIGN KEY (`studentid`) REFERENCES `students` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
