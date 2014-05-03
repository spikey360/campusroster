-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2014 at 10:17 AM
-- Server version: 5.5.37
-- PHP Version: 5.5.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `campusroster`
--

-- --------------------------------------------------------

--
-- Table structure for table `academ`
--

CREATE TABLE IF NOT EXISTS `academ` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `backCurr` varchar(128) NOT NULL,
  `backPrev` varchar(128) NOT NULL,
  `sgpa1` float DEFAULT NULL,
  `sgpa2` float DEFAULT NULL,
  `sgpa3` float DEFAULT NULL,
  `sgpa4` float DEFAULT NULL,
  `sgpa5` float DEFAULT NULL,
  `sgpa6` float DEFAULT NULL,
  `sgpa7` float DEFAULT NULL,
  `sgpa8` float DEFAULT NULL,
  `cgpa` float DEFAULT NULL,
  `avg` float DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='the academic credentials' AUTO_INCREMENT=169 ;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `addid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `houseNum` varchar(8) NOT NULL,
  `street` varchar(128) NOT NULL,
  `locality` varchar(48) NOT NULL,
  `city` varchar(48) NOT NULL,
  `district` varchar(48) NOT NULL,
  `state` varchar(48) NOT NULL,
  `pin` varchar(16) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0 for permanent, 1 for correspondence',
  PRIMARY KEY (`addid`),
  UNIQUE KEY `eid_type_combo` (`eid`,`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `basic`
--

CREATE TABLE IF NOT EXISTS `basic` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `stream` varchar(3) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='basic details of an entity' AUTO_INCREMENT=628 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `addrPerma` varchar(128) NOT NULL,
  `addrPresent` varchar(128) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='contact details of each entity' AUTO_INCREMENT=170 ;

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE IF NOT EXISTS `entity` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(64) NOT NULL,
  `uniroll` varchar(11) NOT NULL,
  `name` varchar(48) NOT NULL,
  `delStatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Binds mail to university roll' AUTO_INCREMENT=630 ;

-- --------------------------------------------------------

--
-- Table structure for table `generatedRandoms`
--

CREATE TABLE IF NOT EXISTS `generatedRandoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `random` varchar(16) NOT NULL,
  `mail` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores the generated randoms against a mail address' AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `hid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `pct10` float NOT NULL,
  `board10` varchar(24) NOT NULL,
  `yop10` int(11) NOT NULL,
  `pct12` float NOT NULL,
  `board12` varchar(24) NOT NULL,
  `yop12` int(11) NOT NULL,
  `category` varchar(8) NOT NULL,
  `pctDip` float NOT NULL,
  `boardDip` varchar(24) NOT NULL,
  `yopDip` int(11) NOT NULL,
  `rankWbjee` int(11) NOT NULL,
  `rankJelet` int(11) NOT NULL,
  PRIMARY KEY (`hid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='historical academic details' AUTO_INCREMENT=621 ;

-- --------------------------------------------------------

--
-- Table structure for table `history_marks`
--

CREATE TABLE IF NOT EXISTS `history_marks` (
  `hmid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `matriculation` tinyint(4) NOT NULL COMMENT '1 for X, 0 for XII marks',
  `secured` int(11) NOT NULL,
  `maximum` int(11) NOT NULL,
  `partOfTotal` tinyint(4) NOT NULL COMMENT '1 if part of Total, 0 if not',
  `subjid` int(11) NOT NULL,
  PRIMARY KEY (`hmid`),
  KEY `subjid` (`subjid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subj` varchar(32) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores all messages sent' AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE IF NOT EXISTS `monitors` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL,
  `pass` varchar(48) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `moderator` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'the moderator field 1 if mod',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if admin, else 0',
  PRIMARY KEY (`mid`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='the monitors who''re allowed to view the db' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `subjid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(16) NOT NULL,
  `science` tinyint(4) NOT NULL COMMENT '1 if science, 0 if non-science',
  PRIMARY KEY (`subjid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `trainDetail` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `entity` (`eid`);

--
-- Constraints for table `history_marks`
--
ALTER TABLE `history_marks`
  ADD CONSTRAINT `history_marks_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `entity` (`eid`),
  ADD CONSTRAINT `history_marks_ibfk_3` FOREIGN KEY (`subjid`) REFERENCES `subjects` (`subjid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
