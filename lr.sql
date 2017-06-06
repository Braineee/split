-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 03:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `GroupId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Permissions` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupId`, `Name`, `Permissions`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{"admin": 1, "moderator"  : 1}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `Salt` varchar(32) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Joined` datetime(1) NOT NULL,
  `Group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Password`, `Salt`, `Name`, `Joined`, `Group`) VALUES
(1, 'David', '6815782bf7650c820416686073a4d9201ce622d8f8fba3f0fc676c940fc9a4a9', 'l<ç½eÙ·qÀŒÍ}Å''ÔéS>0ï`òŸ(péäéž', 'David Gate', '2017-05-01 18:57:07.0', 1),
(2, 'alex', 'd06c788b3a5ebe651ec4ba40aed7832b1d8bed8ec8539bd232795850c940e307', 'á^¤”!&5Y¡nÑãBIÊ`h[m''“l~OÐ', 'Alex Grifft', '2017-05-01 19:09:53.0', 1),
(3, 'grate', '517268f012ef8caeaefd3b43d233771f933fdf6d9af8d847cac82ac82c6993d2', '«aë\n¢¯fÔ¤‹qjtÞ1–!…„À¶©_"øÙ$ú2á,j', 'grate men', '2017-05-01 19:28:13.0', 1),
(4, 'glory', '2318fc5441eca392eb45d3b7a9637590fb0406bd773f03c6d78620d084b59131', ' \ZnU¯ó]âg$³…ŒÄî2‹< JHJÒÜoê4E[“', 'Glory Ries', '2017-05-01 21:27:10.0', 1),
(5, 'Gabriel', 'ec6078881b3a80311b8ae07dc735827246567987f453734fdd6b79efba4f93b2', 'öh	æ–¨­0ùEDhÇ½\r£¬(•šˆ°G»,ô', 'Gabriel monaco', '2017-05-01 21:28:15.0', 1),
(6, 'Afeez', '41d5f997c0f2577ebf461103870350d09014bfa33c129c0645495bf33ee4332e', '¶ÆöM—?¼=õçlïá‚ÏÎÑ‰P,\r-˜5c1šœ1', 'Afeez Zee', '2017-05-02 14:57:58.0', 1),
(7, 'Mayowa', 'fd1f88908081244c2fe4c26f1ea6cfc261d56ba28412a64736306c75af601e2b', '¹t®×ùŸˆô%fÑ³}^•™ôEÄYmò:.1,Ü=ßØ', 'Mayowa Kool', '2017-05-02 15:00:23.0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE IF NOT EXISTS `user_session` (
  `SessionId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`SessionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `SessionId` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
