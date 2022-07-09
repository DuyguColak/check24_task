-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2022 at 08:13 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `check24`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `authorid` int(11) NOT NULL,
  `articledate` date NOT NULL,
  `articletitle` varchar(1000) NOT NULL,
  `articletext` text NOT NULL,
  `articleimage` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`articleid`),
  KEY `authorid` (`authorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `usermail` varchar(1000) DEFAULT NULL,
  `commenturl` varchar(1000) DEFAULT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`commentid`),
  KEY `FK_COMMENT_ARTICLE` (`articleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `firstname` varchar(1000) DEFAULT NULL,
  `lastname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `firstname`, `lastname`, `dateofbirth`, `type`) VALUES
(1, 'Duygu', '$2y$10$NuT/JMfxv3McISw1NIkheeibkjgbRhVAlcGgZQ7kHHn5QzStDGwz.', 'duygu@c.com', NULL, NULL, NULL, 'author');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_ARTICLE_AUTHOR` FOREIGN KEY (`authorid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_COMMENT_ARTICLE` FOREIGN KEY (`articleid`) REFERENCES `articles` (`articleid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
