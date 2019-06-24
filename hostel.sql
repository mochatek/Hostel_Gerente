-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2018 at 08:40 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE IF NOT EXISTS `blood` (
  `blood` varchar(10) NOT NULL,
  PRIMARY KEY (`blood`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood`) VALUES
('A+'),
('A-'),
('AB+'),
('AB-'),
('B+'),
('B-'),
('O+'),
('O-');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `cmnt` varchar(150) NOT NULL,
  `flag` int(11) NOT NULL COMMENT 'good:1 bad:0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `sid`, `cmnt`, `flag`) VALUES
(1, 22, 'Well Behaving', 1),
(2, 22, 'Not Punctual', 0),
(3, 10, 'Psycho', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(40) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`) VALUES
(1, 'I-MCA [R]'),
(2, 'II-MCA [R]'),
(3, 'III-MCA [R]'),
(4, 'I-MCA [L]'),
(5, 'II-MCA [L]'),
(6, 'I-MBA'),
(7, 'II-MBA'),
(8, 'I-MMH'),
(9, 'II-MMH'),
(10, 'I-MCMS'),
(11, 'II-MCMS'),
(12, 'I-MCOM'),
(13, 'II-MCOM'),
(14, 'I-MSC'),
(15, 'II-MSC');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `did` varchar(20) NOT NULL,
  `dstname` varchar(40) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`did`, `dstname`) VALUES
('ALP', 'ALAPPUZHA'),
('EKM', 'ERNAKULAM'),
('IDK', 'IDUKKI'),
('KGD', 'KASARAGOD'),
('KKD', 'KOZHIKODE'),
('KLM', 'KOLLAM'),
('KNR', 'KANNUR'),
('KTM', 'KOTTAYAM'),
('MLP', 'MALAPPURAM'),
('PLK', 'PALAKKAD'),
('PTA', 'PATHANAMTHITTA'),
('TSR', 'THRISSUR'),
('TVM', 'THIRUVANANTHAPURAM'),
('WND', 'WAYANAD');

-- --------------------------------------------------------

--
-- Table structure for table `hostelrent`
--

CREATE TABLE IF NOT EXISTS `hostelrent` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rdate` date NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hostelrent`
--

INSERT INTO `hostelrent` (`rid`, `rdate`, `amount`) VALUES
(4, '2018-12-10', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `msg` varchar(10000) NOT NULL,
  `sub` varchar(30) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`mid`, `date`, `from`, `to`, `msg`, `sub`) VALUES
(22, '10/12/2018', 15, 16, 'yo man ..', 'ENQUIRY'),
(23, '10/12/2018', 16, 15, 'sup bro?', 'REPLY'),
(24, '10/12/2018', 15, 16, 'nothing yaar', 'REPLY');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(40) NOT NULL,
  `pswd` varchar(40) NOT NULL,
  `role` varchar(40) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `uname`, `pswd`, `role`) VALUES
(10, 'ajo', '123', 'student'),
(15, 'maxi', '123', 'student'),
(16, 'admin', '123', 'admin'),
(22, 'mocha', '123', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `messfees`
--

CREATE TABLE IF NOT EXISTS `messfees` (
  `fid` int(20) NOT NULL AUTO_INCREMENT,
  `fdate` date NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `messfees`
--

INSERT INTO `messfees` (`fid`, `fdate`, `amount`) VALUES
(21, '2018-12-10', 2800);

-- --------------------------------------------------------

--
-- Table structure for table `messpay`
--

CREATE TABLE IF NOT EXISTS `messpay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `pdate` date DEFAULT NULL,
  `paid` int(11) NOT NULL COMMENT 'Paid:1  NotPaid:0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `messpay`
--

INSERT INTO `messpay` (`id`, `sid`, `fid`, `pdate`, `paid`) VALUES
(18, 10, 21, NULL, 0),
(19, 16, 21, '2018-12-10', 1),
(20, 22, 21, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rentpay`
--

CREATE TABLE IF NOT EXISTS `rentpay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `pdate` date DEFAULT NULL,
  `paid` int(11) NOT NULL COMMENT 'paid:1 not paid:0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rentpay`
--

INSERT INTO `rentpay` (`id`, `sid`, `rid`, `pdate`, `paid`) VALUES
(8, 10, 4, NULL, 0),
(9, 16, 4, '2018-12-10', 1),
(10, 22, 4, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `rid` varchar(5) NOT NULL,
  `block` varchar(2) NOT NULL,
  `type` int(1) NOT NULL,
  `sid` int(4) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `stud_id` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `block`, `type`, `sid`) VALUES
('DR1A', 'B', 2, NULL),
('DR1B', 'B', 2, 16),
('SR1', 'C', 1, NULL),
('TR1A', 'A', 3, NULL),
('TR1B', 'A', 3, 22),
('TR1C', 'A', 3, 10),
('TR2A', 'A', 3, NULL),
('TR2B', 'A', 3, NULL),
('TR2C', 'A', 3, NULL),
('TR3A', 'A', 3, NULL),
('TR3B', 'A', 3, NULL),
('TR3C', 'A', 3, NULL),
('TR4A', 'A', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sname` varchar(40) NOT NULL,
  `nname` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `blood` varchar(5) NOT NULL,
  `adrno` int(11) NOT NULL,
  `sphone` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gname` varchar(40) NOT NULL,
  `gphone` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `fphone` int(11) NOT NULL,
  `mname` varchar(40) NOT NULL,
  `mphone` int(11) NOT NULL,
  `house` varchar(40) NOT NULL,
  `place` varchar(40) NOT NULL,
  `po` bigint(20) NOT NULL,
  `dist` varchar(40) NOT NULL,
  `pin` int(11) NOT NULL,
  `photo` varchar(60) NOT NULL,
  `doj` varchar(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:New 1:Accepted 2:Vacated',
  `lid` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `nname`, `age`, `dob`, `course`, `blood`, `adrno`, `sphone`, `email`, `gname`, `gphone`, `fname`, `fphone`, `mname`, `mphone`, `house`, `place`, `po`, `dist`, `pin`, `photo`, `doj`, `room`, `status`, `lid`) VALUES
(10, 'Ajo', 'Vavachy', 21, '1997-01-01', 'I-MCA [R]', 'O+', 1234567890, 1234567890, 'mocha@gmail.com', 'Mani', 1234567890, 'Bolan', 1234567890, 'Alphy', 1234567890, 'BPC ', 'Piravom', 0, 'ERNAKULAM', 666666, '13.png', '05-11-2018', 'TR1C', 1, 10),
(16, 'Akhil', 'Maxi', 22, '2018-10-02', 'I-MCA [L]', 'AB-', 1234567890, 1234567890, 'maxi@ymail.com', 'Shaiju', 1234567890, 'Markose', 1234567890, 'Mary', 1234567890, 'Maxi Nilayam', 'Poojappura', 0, 'THIRUVANANTHAPURAM', 666666, '10.png', '09-11-2018', 'DR1B', 1, 15),
(22, 'Akash', 'mocha', 21, '2018-11-06', 'I-MBA', 'B+', 1234567890, 1234567890, 'akashsabu@ymail.com', 'Shaiju', 1234567890, 'Sabu', 1234567890, 'Mini', 1234567890, 'Mocha Bhavan', 'Vaikom', 0, 'KOTTAYAM', 666666, '11.png', '10-11-2018', 'TR1B', 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `swaproom`
--

CREATE TABLE IF NOT EXISTS `swaproom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `sdate` varchar(40) NOT NULL,
  `rid` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'request=0; useraccept=1; adminaccept=2; reject=3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `swaproom`
--

INSERT INTO `swaproom` (`id`, `sid`, `sdate`, `rid`, `status`) VALUES
(9, 16, '10-12-2018', 'DR1B', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
