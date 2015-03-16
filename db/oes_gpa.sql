-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2015 at 02:40 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oes_gpa`
--
CREATE DATABASE IF NOT EXISTS `oes_gpa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oes_gpa`;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `br_id` int(2) NOT NULL AUTO_INCREMENT,
  `subject` varchar(40) NOT NULL,
  PRIMARY KEY (`br_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Branch Selection for Paper Generation ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_gpa`
--

CREATE TABLE IF NOT EXISTS `login_gpa` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `r_id` int(12) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pswd` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `login_gpa`
--

INSERT INTO `login_gpa` (`id`, `r_id`, `user`, `pswd`) VALUES
(16, 16, 'mayur', 'mayur');

-- --------------------------------------------------------

--
-- Table structure for table `question_gpa`
--

CREATE TABLE IF NOT EXISTS `question_gpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch` varchar(50) DEFAULT NULL,
  `sem` int(2) DEFAULT NULL,
  `subject_code` varchar(40) DEFAULT NULL,
  `question` varchar(500) NOT NULL,
  `option_a` varchar(200) NOT NULL,
  `option_b` varchar(200) NOT NULL,
  `option_c` varchar(200) NOT NULL,
  `option_d` varchar(200) NOT NULL,
  `answer` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `question_gpa`
--

INSERT INTO `question_gpa` (`id`, `branch`, `sem`, `subject_code`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'bme', 2, 'biomedical2 sub1', 'new question', 'a', 'b', 'c', 'd', 'option_a');

-- --------------------------------------------------------

--
-- Table structure for table `reg_gpa`
--

CREATE TABLE IF NOT EXISTS `reg_gpa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `enroll` int(12) NOT NULL,
  `sem` int(2) NOT NULL,
  `branch` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(6) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registration Table of OES_GPA' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `reg_gpa`
--

INSERT INTO `reg_gpa` (`id`, `fname`, `lname`, `gender`, `enroll`, `sem`, `branch`, `dob`, `email`, `phone`, `address`, `city`, `pin`, `cdate`, `mdate`) VALUES
(16, 'Vish', 'Soni', 'female', 2147483647, 0, 'Computer Engineering', '1996-10-30', 'vishsoni30@gmail.com', 1235964613, 'sncskncksnvlsavnl', 'gunjgt', 46513, '2015-03-01 06:47:45', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
