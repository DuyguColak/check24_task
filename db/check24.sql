-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2022 at 11:23 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleid`, `authorid`, `articledate`, `articletitle`, `articletext`, `articleimage`) VALUES
(1, 1, '2022-07-09', 'Change car insurance - that\'s how it works', 'You can always change your car insurance :\n\nAt the end of the current car insurance contract\nIn the event of a premium increase', 'blog1.jpg'),
(2, 1, '2022-07-09', 'Bike insurance comparison', 'bicycle insurance\r\nWith a good bike, it is worth having the right insurance cover. This is the only way you will receive appropriate financial compensation after theft or damage.\r\n\r\nBicycle insurance benefits\r\nBicycle insurance or fully comprehensive bicycle insurance can be taken out in various tariff variants with different scopes of services. So every bicycle owner can find the desired insurance cover.\r\n\r\nAll bicycle insurance tariffs include protection for:\r\n\r\nTheft of the insured bicycle, e-bike or pedelec\r\nTheft of individual parts that are permanently attached to the bike (e.g. saddle)\r\ntheft of the battery\r\nComprehensive coverage\r\nIn the case of a tariff with fully comprehensive insurance, the repair costs are also covered. Compensation is paid for these damages:', 'blog2.jpg'),
(3, 1, '2022-07-09', 'Private health insurance', 'Every employee whose income is regularly above the so-called annual income limit (JAEG) can take out private health insurance (PKV). JAEG currently has a gross annual salary of 64,350 euros (as of 2022). Regardless of their income, the self-employed , freelancers, civil servants and civil servant candidates can also take out private insurance.\r\n\r\nA private health insurance enables the insured person to receive comprehensive and individualized medical care. Shorter waiting times at the doctor or treatment by proven specialists are just two of the advantages that private health insurance offers.\r\n\r\nChildren can always be privately insured, even if both parents are legally insured. The advantage: your child receives the higher-quality insurance protection of private health insurance.\r\n\r\nAt the beginning of their studies, students also have the opportunity to be exempted from compulsory insurance and take out private insurance. This decision applies to the entire study period. Insurance companies offer special student rates for this, which are particularly cheap.', 'blog4.jpg'),
(4, 1, '2022-07-09', 'personal liability insurance', 'A single second of not paying attention is often enough for a mishap to happen: crossing the street, you overlook a cyclist who falls while avoiding the road and is seriously injured.\r\n\r\nAs a rule, anyone who causes damage to someone else must be liable for it and pay for the damage. In particular, when people are injured, it can quickly amount to several million euros. Liability is a legal obligation, hence the term liability.\r\n\r\nHigh-performance liability insurance takes over the payments in the event of damage and thus protects your financial existence. If you are supposed to compensate for damage that you did not cause, the insurance company will help you, if necessary, up to the court.', 'blog3.jpg');

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
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `firstname`, `lastname`, `type`) VALUES
(1, 'Duygu', '$2y$10$NuT/JMfxv3McISw1NIkheeibkjgbRhVAlcGgZQ7kHHn5QzStDGwz.', 'duygu@c.com', 'Duygu', 'Colak', 'author');

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
