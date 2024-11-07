-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 12:39 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `acyear`
--

CREATE TABLE `acyear` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `user` varchar(25) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acyear`
--

INSERT INTO `acyear` (`id`, `year`, `user`, `cdate`) VALUES
(1, '2017-18', 'admin', '2017-12-20 08:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `addsub`
--

CREATE TABLE `addsub` (
  `id` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `user` varchar(25) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subject` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsub`
--

INSERT INTO `addsub` (`id`, `class`, `user`, `cdate`, `subject`) VALUES
(1, '2', 'admin', '2017-12-21 12:57:26', 'Hindi1'),
(2, '2', 'admin', '2017-12-21 12:57:32', 'Telugu1'),
(3, '3', 'admin', '2017-12-21 12:57:39', 'English'),
(4, '2', 'admin', '2017-12-21 12:02:33', 'Mathematics'),
(5, '2', 'admin', '2017-12-21 12:02:33', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user`, `pwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `caste`
--

CREATE TABLE `caste` (
  `id` int(11) NOT NULL,
  `caste_name` varchar(25) NOT NULL,
  `user` varchar(25) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caste`
--

INSERT INTO `caste` (`id`, `caste_name`, `user`, `cdate`) VALUES
(1, 'OC', 'admin', '2017-12-22 07:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `cname`, `user`, `cdate`) VALUES
(2, 'Ist class', 'admin', '2017-12-20 12:07:45'),
(3, '2nd class', 'admin', '2017-12-20 12:07:51'),
(4, '3rd class', 'admin', '2017-12-20 12:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `empname` varchar(40) NOT NULL,
  `empid` varchar(20) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `bgroup` varchar(5) NOT NULL,
  `mtounge` varchar(20) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `religion` int(11) NOT NULL,
  `caste` int(11) NOT NULL,
  `subcaste` varchar(25) NOT NULL,
  `mstatus` varchar(15) NOT NULL,
  `aadharno` varchar(12) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `presentaddress` varchar(255) NOT NULL,
  `permientaddress` varchar(255) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `experience` varchar(25) NOT NULL,
  `reference` varchar(15) NOT NULL,
  `doj` date NOT NULL,
  `staffcategory` varchar(15) NOT NULL,
  `designitaion` varchar(25) NOT NULL,
  `salary` float(10,2) NOT NULL,
  `user` varchar(25) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `empname`, `empid`, `gender`, `dob`, `bgroup`, `mtounge`, `nationality`, `religion`, `caste`, `subcaste`, `mstatus`, `aadharno`, `mobile`, `email`, `presentaddress`, `permientaddress`, `qualification`, `experience`, `reference`, `doj`, `staffcategory`, `designitaion`, `salary`, `user`, `cdate`, `photo`) VALUES
(2, 'admin', 'E-10', 'Male', '2018-11-12', 'A+', 'Telugu', 'Indian', 1, 1, 'Vysya', 'Single', '323451952426', 9959583024, 'tes@gmail.com', 'Hyderabad', 'Hyderabd', 'MCA', '3 Years', 'no', '2018-08-12', 'Teaching', 'Class Teacher', 25000.00, 'admin', '2017-12-23 07:22:45', '2017-12-23-Hydrangeas.jpg'),
(3, 'k srinivasa rao', 'E-15', 'Male', '2018-08-12', 'A+', 'Telugu', 'Indian', 1, 1, 'Vysya', 'Single', '323451952426', 9959583024, 'tes@gmail.com', 'Hyderabad', 'Hyderabd', 'MCA', '3 Years', 'no', '2019-03-12', 'Teaching', 'Class Teacher', 25000.00, 'admin', '2017-12-23 06:08:37', '2017-12-23-Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_name` varchar(25) NOT NULL,
  `org_address` varchar(255) NOT NULL,
  `org_email` varchar(30) NOT NULL,
  `org_phone` bigint(12) NOT NULL,
  `org_mobile` bigint(12) NOT NULL,
  `org_url` varchar(150) NOT NULL,
  `org_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_name`, `org_address`, `org_email`, `org_phone`, `org_mobile`, `org_url`, `org_code`) VALUES
(1, 'Radiant High School', 'D.No:8-3-721/1,Yellareddy Guda,Ameerpet,Hyderabad-500073', 'info@gmail.com', 9030050155, 9491066884, 'www.radianthighschool.com', 'DHS125');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `rname` varchar(20) NOT NULL,
  `user` varchar(25) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `rname`, `user`, `cdate`) VALUES
(1, 'Hindu', 'admin', '2017-12-22 07:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `sname`, `user`, `cdate`) VALUES
(1, 'A', 'admin', '2017-12-20 12:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `acyear` int(11) NOT NULL,
  `admdate` date NOT NULL,
  `admno` varchar(15) NOT NULL,
  `class` int(11) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `medium` varchar(15) NOT NULL,
  `section` varchar(12) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `fqualification` varchar(20) NOT NULL,
  `foccupation` varchar(20) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `mqualification` varchar(20) NOT NULL,
  `moccupation` varchar(20) NOT NULL,
  `bg` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `caste` int(11) NOT NULL,
  `scaste` varchar(25) NOT NULL,
  `mtounge` varchar(20) NOT NULL,
  `aadhar` varchar(12) NOT NULL,
  `nativeplace` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phoneno` bigint(12) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mark1` varchar(255) NOT NULL,
  `mark2` varchar(255) NOT NULL,
  `ftype` varchar(20) NOT NULL,
  `flangruage` varchar(20) NOT NULL,
  `slanguage` varchar(20) NOT NULL,
  `docupload` varchar(255) NOT NULL,
  `pclass` varchar(5) NOT NULL,
  `yearpass` varchar(20) NOT NULL,
  `schoolname` varchar(150) NOT NULL,
  `tcno` varchar(30) NOT NULL,
  `pmedium` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`id`, `photo`, `acyear`, `admdate`, `admno`, `class`, `rollno`, `medium`, `section`, `sname`, `gender`, `fname`, `fqualification`, `foccupation`, `mname`, `mqualification`, `moccupation`, `bg`, `dob`, `nationality`, `religion`, `caste`, `scaste`, `mtounge`, `aadhar`, `nativeplace`, `address`, `phoneno`, `emailid`, `mark1`, `mark2`, `ftype`, `flangruage`, `slanguage`, `docupload`, `pclass`, `yearpass`, `schoolname`, `tcno`, `pmedium`, `user`, `cdate`) VALUES
(1, '2017-12-26-Jellyfish.jpg', 1, '2017-12-26', '1', 2, '1', 'E.M', '1', 'ksr', 'Male', 'kgn', '10 th class', 'business', 'knl', '3rd class', 'house wife', 'O+', '2018-06-12', 'Indian', '1', 1, 'vysya', 'telugu', '353925812426', 'gogulamudi', 'guntur', 9959583024, 'srinu100@gmail.com', 'a mole on the left thumb', 'a mole on the right neck', 'Monthly', 'HINDI', '', '2017-12-25-Jellyfish.jpg', '2', '2016-17', 'zphschool', 'tc-2589', 'E.M', 'admin', '2017-12-26 10:18:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acyear`
--
ALTER TABLE `acyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addsub`
--
ALTER TABLE `addsub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caste`
--
ALTER TABLE `caste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acyear`
--
ALTER TABLE `acyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addsub`
--
ALTER TABLE `addsub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `caste`
--
ALTER TABLE `caste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
