-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2021 at 05:28 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ordr` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `ordr`, `created_at`) VALUES
(1, 'Chapter 1', 1, '2021-02-17 14:43:03'),
(2, 'Chapter 2', 2, '2021-02-17 14:43:03'),
(3, 'Chapter 3', 3, '2021-02-17 14:43:38'),
(4, 'Chapter 4', 4, '2021-02-17 14:43:38'),
(5, 'Chapter 5 ', 5, '2021-02-17 14:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ordr` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `ordr`, `created_at`) VALUES
(1, 'Pre 9th', 1, '2021-02-17 14:43:03'),
(2, '9th Red', 3, '2021-02-17 14:43:03'),
(3, '10th Red', 4, '2021-02-17 14:43:38'),
(4, '9th Green', 2, '2021-02-17 14:43:38'),
(5, '10th Blue', 5, '2021-02-17 14:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` text,
  `logo` text,
  `phone` text,
  `email` text,
  `address` text,
  `gmaps` text,
  `cover` text,
  `post` text,
  `fpost` text,
  `facebook` text,
  `twitter` text,
  `insta` text,
  `youtube` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `sitename`, `logo`, `phone`, `email`, `address`, `gmaps`, `cover`, `post`, `fpost`, `facebook`, `twitter`, `insta`, `youtube`) VALUES
(1, 'EMS', 'b5777c0ff53dac3e89e8f26d61745e331.png', '+92 123 456789', 'company@email.com', 'Company, Lahore. (Pakistan).                                ', 'Map Code           ', 'b83d69d563a0d0469c59dbfe1cec621f1.png', '<p>test</p>\r\n', 'From the catalytic converter to the alternator, your car is filled with a host of parts that come together to power your vehicle down the road. While it may feel like a foreign language, having a working understanding of the parts of your vehicle will make you an educated consumer that will be able to converse with your mechanic when the time comes.', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.instagram.com', 'http://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

DROP TABLE IF EXISTS `editor`;
CREATE TABLE IF NOT EXISTS `editor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL,
  `area` text,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` text,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `name`, `email`, `password`, `area`, `status`, `created_at`, `phone`, `img`) VALUES
(1, 'editor', 'editor@123.com', 'editor', NULL, 0, '2021-02-17 13:52:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lques`
--

DROP TABLE IF EXISTS `lques`;
CREATE TABLE IF NOT EXISTS `lques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `chapterid` int(11) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lques`
--

INSERT INTO `lques` (`id`, `classid`, `subjectid`, `chapterid`, `typeid`, `ques`, `ans`, `created_at`) VALUES
(2, 3, 8, 1, 1, 'Shock absorbs in automobiles are one practical application of:', 'Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', '2021-02-22 02:51:46'),
(3, 3, 11, 1, 2, 'At mean position of pendulum, the potential energy of the pendulum is:', ' ', '2021-02-25 02:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

DROP TABLE IF EXISTS `mcqs`;
CREATE TABLE IF NOT EXISTS `mcqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `chapterid` int(11) DEFAULT NULL,
  `ques` text,
  `opt1` text,
  `opt2` text,
  `opt3` text,
  `opt4` text,
  `ans` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `classid`, `subjectid`, `chapterid`, `ques`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `created_at`) VALUES
(6, 3, 8, 1, 'Testing Questions 123 for Sunday night ', 'Thouth waves', 'Through matter', 'Much more', 'None of these', 'Through matter', '2021-02-22 07:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `sques`
--

DROP TABLE IF EXISTS `sques`;
CREATE TABLE IF NOT EXISTS `sques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL,
  `subjectid` int(11) DEFAULT NULL,
  `chapterid` int(11) DEFAULT NULL,
  `ques` text,
  `ans` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sques`
--

INSERT INTO `sques` (`id`, `classid`, `subjectid`, `chapterid`, `ques`, `ans`, `created_at`) VALUES
(1, 1, 8, 1, 'Testing Questions 123 for Sunday night ', 'MySQL returned an empty result set (i.e. zero rows). (Query took 0.0005 seconds.) MySQL returned an empty result set (i.e. zero rows). (Query took 0.0005 seconds.)\r\n MySQL returned an empty result set (i.e. zero rows). (Query took 0.0005 seconds.)\r\n\r\n', '2021-02-22 02:49:56'),
(2, 1, 8, 1, 'At mean position of pendulum, the potential energy of the pendulum is:', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', '2021-02-22 02:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `ordr` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `ordr`, `created_at`) VALUES
(10, 'Chemistry', 4, '2021-02-17 15:06:05'),
(9, 'Pak-Studies 2', 45, '2021-02-17 15:05:46'),
(8, 'Physics', 1, '2021-02-17 15:05:35'),
(11, 'Islamiat', 2, '2021-02-17 15:06:19'),
(12, 'English', 8, '2021-02-22 07:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL,
  `area` text,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` text,
  `img` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `area`, `status`, `created_at`, `phone`, `img`) VALUES
(1, 'teach', 'teach@123.com', 'teach', NULL, 0, '2021-02-17 13:52:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Part (a) / Theory'),
(2, 'Part (b) / Numerical');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
