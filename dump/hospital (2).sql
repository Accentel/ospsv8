-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2017 at 02:54 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

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
-- Table structure for table `dappointment`
--

CREATE TABLE `dappointment` (
  `aid` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `adate` date NOT NULL,
  `pname` varchar(50) NOT NULL,
  `mno` bigint(12) NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cdate` date NOT NULL,
  `user` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dappointment`
--

INSERT INTO `dappointment` (`aid`, `dname`, `adate`, `pname`, `mno`, `age`, `sex`, `address`, `cdate`, `user`, `time`) VALUES
(1, '4', '2017-03-17', 'B.Srinivas', 9676748339, '37yrs', 'male', 'Darmasagar palli; Huzurabad', '2017-03-15', 'admin', ''),
(2, '4', '2017-03-17', 'SRIMATHI', 9010723373, '60', 'female', 'Kothagattu', '2017-03-17', 'admin', '3:17:54 AM');

-- --------------------------------------------------------

--
-- Table structure for table `empdepartment`
--

CREATE TABLE `empdepartment` (
  `empid` int(10) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `CURRENTDATE` varchar(50) DEFAULT NULL,
  `AUTH_BY` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empdepartment`
--

INSERT INTO `empdepartment` (`empid`, `dept_name`, `CURRENTDATE`, `AUTH_BY`) VALUES
(1, 'RECEPTION', '11-03-2017', 'admin'),
(2, 'EMERGENCY', '11-03-2017', 'admin'),
(3, 'FRONT OFFICE', '11-03-2017', 'admin'),
(4, 'OP', '11-03-2017', 'admin'),
(5, 'PHARMACY', '11-03-2017', 'admin'),
(6, 'LABORATORY', '11-03-2017', 'admin'),
(7, 'NURSING', '11-03-2017', 'admin'),
(8, 'HOUSE KEEPING', '11-03-2017', 'admin'),
(9, 'HR', '11-03-2017', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hr_emp`
--

CREATE TABLE `hr_emp` (
  `EMP_NAME` varchar(150) DEFAULT NULL,
  `DESIGNATION` varchar(50) DEFAULT NULL,
  `JOIN_DATE` varchar(100) DEFAULT NULL,
  `QUALIFICATION` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(80) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` varchar(8) DEFAULT NULL,
  `PADDR` varchar(250) DEFAULT NULL,
  `CADDR` varchar(250) DEFAULT NULL,
  `PHONE1` varchar(25) DEFAULT NULL,
  `salary` varchar(25) DEFAULT NULL,
  `dept_code` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `accountno` varchar(20) NOT NULL,
  `bankname` varchar(20) NOT NULL,
  `branchname` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `EMP_CODE` varchar(50) NOT NULL,
  `user` varchar(25) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `labdetails`
--

CREATE TABLE `labdetails` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(30) NOT NULL,
  `lab_address` varchar(255) NOT NULL,
  `lab_tin1` varchar(20) NOT NULL,
  `lab_tin2` varchar(20) NOT NULL,
  `lab_email` varchar(25) NOT NULL,
  `lab_phone` bigint(12) NOT NULL,
  `lab_mobile` bigint(12) NOT NULL,
  `lab_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labdetails`
--

INSERT INTO `labdetails` (`id`, `lab_name`, `lab_address`, `lab_tin1`, `lab_tin2`, `lab_email`, `lab_phone`, `lab_mobile`, `lab_url`) VALUES
(1, 'durga Lab', 'Huzurabad', '123654', '12322', 'durga@gmail.com', 4422222333, 9959583024, 'www.durgahospital.com');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `FLOOR_CODE` int(10) NOT NULL,
  `FLOOR_NAME` varchar(50) DEFAULT NULL,
  `CURRENTDATE` timestamp NULL DEFAULT NULL,
  `AUTH_BY` varchar(50) DEFAULT NULL,
  `REMARKS` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`FLOOR_CODE`, `FLOOR_NAME`, `CURRENTDATE`, `AUTH_BY`, `REMARKS`) VALUES
(1, 'GROUND FLOOR ', '0000-00-00 00:00:00', 'admin', 'Store'),
(2, '1St Floor ', '0000-00-00 00:00:00', 'admin', 'Reception '),
(3, '2nd Floor ', '0000-00-00 00:00:00', 'admin', 'ICU ');

-- --------------------------------------------------------

--
-- Table structure for table `masterdept`
--

CREATE TABLE `masterdept` (
  `deptcode` varchar(255) NOT NULL DEFAULT '',
  `deptname` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterdept`
--

INSERT INTO `masterdept` (`deptcode`, `deptname`) VALUES
('BIO', 'BIOCHEMISTRY'),
('biochemistry', 'biochemistry'),
('Coag', 'COAGGULATION'),
('CP', 'CLINICAL PATHOLOGY'),
('EC', 'ECG'),
('HAE', 'HAEMOTOLOGY'),
('HP', 'HISTO PATHOLOGY'),
('IMMUNOLOGY', 'HARMONES'),
('MB', 'MICRO-BIOLOGY'),
('MICRO BIOLOGY', 'THROAT SWAB'),
('SERO', 'SEROLOGY'),
('USG', 'USG'),
('USG NECK', 'RADIOLOGY'),
('XRY', 'X-RAY');

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
(1, 'Durga Hospital', 'huzurabad', 'info@gmail.com', 8632294710, 9959583024, 'www.durgahospital.com', 'DHS125');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacydetails`
--

CREATE TABLE `pharmacydetails` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(30) NOT NULL,
  `lab_address` varchar(255) NOT NULL,
  `lab_tin1` varchar(20) NOT NULL,
  `lab_tin2` varchar(20) NOT NULL,
  `lab_email` varchar(25) NOT NULL,
  `lab_phone` bigint(12) NOT NULL,
  `lab_mobile` bigint(12) NOT NULL,
  `lab_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacydetails`
--

INSERT INTO `pharmacydetails` (`id`, `lab_name`, `lab_address`, `lab_tin1`, `lab_tin2`, `lab_email`, `lab_phone`, `lab_mobile`, `lab_url`) VALUES
(1, 'Durga Pharmacy', 'Huzurabad', '87896541', '8523697', 'durgapharmacy@gmail.com', 442322223, 9959593024, 'www.durgahospital.com');

-- --------------------------------------------------------

--
-- Table structure for table `testdetails`
--

CREATE TABLE `testdetails` (
  `id` int(11) NOT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `TestName` varchar(255) NOT NULL,
  `Amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testdetails`
--

INSERT INTO `testdetails` (`id`, `Department`, `TestName`, `Amount`) VALUES
(1, 'BIOCHEMISTRY', 'COMPLETE BLOOD  PICTURE (CBP)', '150'),
(2, 'BIOCHEMISTRY', 'COMPLETE URINE EXAMINATION(CUE)', '100'),
(3, 'BIOCHEMISTRY', 'MANTOUX TEST', '150'),
(4, 'SEROLOGY', 'C - Reactive Protein (CRP)', '250'),
(5, 'BIOCHEMISTRY', 'LIVER FUNCTION TEST', '400'),
(6, 'HAEMOTOLOGY', 'Parasite F and V', '350'),
(7, 'HAEMOTOLOGY', 'Smear for Malarial Parasite', '150'),
(8, 'BIOCHEMISTRY', 'SERUM AMYLASE', '500'),
(9, 'HAEMOTOLOGY', 'Absolute Eosinophil Count (AEC)', '150'),
(10, 'HAEMOTOLOGY', 'Erythrocyte Sedimentation Rate (ESR)', '100'),
(11, 'BIOCHEMISTRY', 'Random Blood Sugar (RBS)', '50'),
(12, 'BIOCHEMISTRY', 'Blood Urea', '200'),
(13, 'BIOCHEMISTRY', 'Serum Creatinine', '200'),
(14, 'BIOCHEMISTRY', 'Serum Electrolytes', '500'),
(15, 'BIOCHEMISTRY', 'SERUM CALCIUM', '200'),
(16, 'HAEMOTOLOGY', 'Prothrombin Time (PT)', '300'),
(17, 'HAEMOTOLOGY', 'Activated Partial Thromboplastin Time (APTT)', '400'),
(18, 'BIOCHEMISTRY', 'Serum Uric Acid', '300'),
(19, 'BIOCHEMISTRY', 'COMPLETE STOOL EXAMINATION', '150'),
(20, 'SEROLOGY', 'HBsAg', '300'),
(21, 'SEROLOGY', 'WIDAL', '200'),
(22, 'BIOCHEMISTRY', 'HAEMOGLOBIN', '100'),
(23, 'BIOCHEMISTRY', 'PLATELET COUNT', '100'),
(24, 'BIOCHEMISTRY', 'BLOOD GROUP', '80'),
(25, 'BIOCHEMISTRY', 'URINE FOR CULTURE AND SENSITIVITY', '350'),
(26, 'SEROLOGY', 'DENGUE SEROLOGY', '1500'),
(27, 'BIOCHEMISTRY', 'BLOOD SUGAR(FBS,PLBS)', '80'),
(28, 'BIOCHEMISTRY', 'LIPID PROFILE', '800'),
(29, 'SEROLOGY', 'SERUM CHOLESTEROL', '300'),
(30, 'BIOCHEMISTRY', 'SERUM TRYGLYCERIDES', '150'),
(31, 'BIOCHEMISTRY', 'ALKALINE PHOSPHATE', '150'),
(32, 'BIOCHEMISTRY', 'TOTAL PROTIENS', '150'),
(33, 'BIOCHEMISTRY', 'HBA1C', '500'),
(34, 'BIOCHEMISTRY', 'SERUM POTASSIUM', '200'),
(35, 'BIOCHEMISTRY', 'SERUM TSH', '300'),
(36, 'BIOCHEMISTRY', 'RA FACTOR', '300'),
(37, 'BIOCHEMISTRY', 'ASO TITRE', '500'),
(38, 'BIOCHEMISTRY', 'HIV 1 AND 2', '350'),
(39, 'BIOCHEMISTRY', 'HCV', '350'),
(40, 'BIOCHEMISTRY', 'VDRL', '150'),
(41, 'BIOCHEMISTRY', 'FSH,LH,PROLACTIN', '700'),
(42, 'BIOCHEMISTRY', 'PROLACTIN', '300'),
(43, 'BIOCHEMISTRY', 'SPUTUM FOR AFB', '200'),
(44, 'BIOCHEMISTRY', 'COOMBS TEST(DIRECT)', '350'),
(45, 'BIOCHEMISTRY', 'COOMBS TEST(INDIRECT)', '350'),
(46, 'BIOCHEMISTRY', 'BLEEDING TIME AND CLOTTING TIME', '100'),
(47, 'BIOCHEMISTRY', 'PACKED CELL VOLUME(PCV)', '100'),
(48, 'BIOCHEMISTRY', 'ANTI NATAL PACK', '1100'),
(49, 'BIOCHEMISTRY', 'MASTER HEALTH CHECKUP', '2200'),
(50, 'BIOCHEMISTRY', 'DIABETIC CHECK UP', '1000'),
(52, 'BIOCHEMISTRY', 'SERUM BILIRUBIN', '200'),
(53, 'HAEMOTOLOGY', 'Reducing Substance', '100'),
(54, 'BIOCHEMISTRY', 'RFT', '1100'),
(55, 'HAEMOTOLOGY', 'Smear for Microfilaria', '100'),
(56, 'HAEMOTOLOGY', 'WBC Count', '100'),
(57, 'HAEMOTOLOGY', 'Peripheral Smear', '100'),
(58, 'BIOCHEMISTRY', 'FBS', '50'),
(59, 'BIOCHEMISTRY', 'PLBS', '50'),
(60, 'HARMONES', 'TIBC', '800'),
(61, 'HARMONES', 'FERRITIN', '1000'),
(62, 'HARMONES', 'IRON ', '400'),
(63, 'HARMONES', 'VITAMIN D3', '1200'),
(64, 'MICRO-BIOLOGY', 'SPUTUM FOR AFB', '200'),
(65, 'HAEMOTOLOGY', 'RETI COUNT', '600'),
(66, 'BIOCHEMISTRY', 'STOOL FOR CULTURE AND SENSITIVITY', '300'),
(68, 'MICRO-BIOLOGY', 'blood for culture', '800'),
(69, 'HARMONES', 'tft', '500'),
(70, 'BIOCHEMISTRY', 'SGOT', '200'),
(71, 'BIOCHEMISTRY', 'SGPT', '200'),
(72, 'HAEMOTOLOGY', 'FLUID EXAMINATION-ROUTINE(PLEURAL FLUID)', '500'),
(73, 'HARMONES', 'FT4', '300'),
(74, 'HARMONES', 'TPO', '1500'),
(75, 'HAEMOTOLOGY', 'bsbp', '50'),
(76, 'CLINICAL PATHOLOGY', 'BONE MARROW', '1000'),
(77, 'MICRO-BIOLOGY', 'Gram Stain', '200'),
(78, 'BIOCHEMISTRY', '24 Hrs URINE PROTIEN', '300'),
(79, 'COAGGULATION', 'COAGGULATION(PT APTT)', '800'),
(80, 'BIOCHEMISTRY', 'FNAC', '800'),
(81, 'BIOCHEMISTRY', 'LFT(SGOT SGPT)', '300'),
(82, 'SEROLOGY', 'SEROLOGY(ASO RAF CRP)', '1000'),
(84, 'BIOCHEMISTRY', 'weilfilex', '2200'),
(85, 'HAEMOTOLOGY', 'SICKLING CELLS', '400'),
(86, 'BIOCHEMISTRY', 'Vitamin B12', '1500'),
(87, 'MICRO-BIOLOGY', 'THROAT SWAB', '300'),
(89, 'HAEMOTOLOGY', 'Coombs Direct', '350'),
(90, 'HAEMOTOLOGY', 'Coombs Indiect', '350'),
(91, 'BIOCHEMISTRY', 'Hb Electrophorosis', '1200'),
(92, 'BIOCHEMISTRY', 'Anti Cysticercosis IgG Anti body', '1600'),
(93, 'CLINICAL PATHOLOGY', 'stool for occult blood', '100'),
(97, 'BIOCHEMISTRY', 'Urine for mico albomine', '400'),
(98, 'ECG', 'ecg', '150'),
(99, 'HAEMOTOLOGY', 'ABNORMAL CELLS', '200'),
(101, 'HAEMOTOLOGY', 'Urine for Pregnancy', '100'),
(102, 'X-RAY', 'x-ray L.S. Spine Ap&Lat', '400'),
(103, 'BIOCHEMISTRY', 'BIO(CBP ESR)', '250'),
(104, 'BIOCHEMISTRY', 'BIO(Urea Creatinine)', '300'),
(105, 'SEROLOGY', 'Hepatitis A Virus IgM', '1500'),
(106, 'SEROLOGY', 'Hepatitis A Virus Total', '1600'),
(107, 'SEROLOGY', 'Hepatitis A Virus IgG', '1300'),
(108, 'USG', 'USG ABDOMEN', '600'),
(109, 'USG', 'USG SCROTUM', '1200'),
(110, 'USG', 'USG SCROTAL DOPPLER ', '1200'),
(111, 'USG', 'USG LEFT LIMB ARTERIAL DOPPLER', '1200'),
(113, 'USG', 'USG RIGHT LIMB ARTERIAL DOPPLER', '1200'),
(114, 'USG', 'USG LEFT LIMB VENOUS DOPPLER', '1200'),
(115, 'USG', 'USG RIGHT LIMB VENOUS DOPPLER', '1200'),
(116, 'USG', 'USG ABDOMEN AND PELVIS', '600'),
(117, 'USG', 'USG NEURO SONOGRAM', '1200'),
(119, 'X-RAY', 'CHEST AP & LAT', '450'),
(121, 'X-RAY', 'X-RAY SKULL AP & LAT', '460'),
(122, 'X-RAY', 'X-RAY NECK TO ABDOMEN', '230'),
(123, 'X-RAY', 'X-RAY SHOULDER AP & LAT', '460'),
(124, 'X-RAY', 'X-RAY WRIST AP & LAT', '350'),
(125, 'X-RAY', 'X-RAY BONAGE WRIST', '350'),
(126, 'X-RAY', 'X - RAY ELBOW AP & LAT', '350'),
(127, 'X-RAY', 'X-RAY FINGERS AP & LAT', '350'),
(128, 'X-RAY', 'X-RAY LS SPINE AP & LAT', '460'),
(129, 'X-RAY', 'X-RAY CERVICAL SPINE AP & LAT', '460'),
(130, 'X-RAY', 'X-RAY DORSAL SPINE AP & LAT', '460'),
(131, 'X-RAY', 'X-RAY PELVIS AP', '250'),
(132, 'X-RAY', 'X-RAY HIP JOINT AP & LAT', '460'),
(133, 'X-RAY', 'X-RAY FEMUR JOINT AP & LAT', '460'),
(134, 'X-RAY', 'X-RAY KNEE JOINT AP & LAT', '350'),
(135, 'X-RAY', 'X-RAY LEG AP & LAT', '350'),
(136, 'X-RAY', 'X-RAY ANKLE JOINT AP & LAT', '350'),
(137, 'X-RAY', 'X-RAY FOOT AP & LAT', '350'),
(138, 'X-RAY', 'X-RAY MASTOID AP & LAT ', '460'),
(139, 'X-RAY', 'X-RAY NASAL BONE BOTH LAT', '460'),
(140, 'X-RAY', 'X-RAY ADENOIDS ', '350'),
(141, 'X-RAY', 'X-RAY MANDIBLE', '250'),
(142, 'X-RAY', 'X-RAY ZYGOMATIC BONE', '250'),
(143, 'X-RAY', 'X-RAY ORBIT AP & LAT', '230'),
(144, 'X-RAY', 'X-RAY COCCYX AP & LAT', '460'),
(145, 'X-RAY', 'X-RAY PNS', '350'),
(147, 'X-RAY', 'X-RAY CHEST AP', '230'),
(148, 'X-RAY', 'X-RAY CHEST PA', '230'),
(149, 'X-RAY', 'X -RAY CHEST AP LAT ', '450'),
(150, 'X-RAY', 'X-RAY CHEST AP(RIBS)', '230'),
(151, 'MICRO-BIOLOGY', 'KETONE BODIES', '100'),
(152, 'BIOCHEMISTRY', 'ft3', '300'),
(153, 'BIOCHEMISTRY', 'Phosporous', '250'),
(154, 'USG', 'NT SCAN', '700'),
(155, 'BIOCHEMISTRY', 'G6PD', '700'),
(156, 'X-RAY', 'x-ray erect abdomen', '230'),
(157, 'CLINICAL PATHOLOGY', 'Semen Analasis', '150'),
(158, 'MICRO-BIOLOGY', 'CULTURE', '300'),
(159, 'HISTO PATHOLOGY', 'small Biopsy', '600'),
(160, 'BIOCHEMISTRY', 'Homocysteine', '1600'),
(161, 'X-RAY', 'X-RAY HAND AP & LAT', '350'),
(162, 'X-RAY', 'X-RAY FOREARM AP & LAT', '350'),
(163, 'X-RAY', 'X-RAY SHOULDER AP', '230'),
(164, 'BIOCHEMISTRY', 'Lipase', '600'),
(165, 'BIOCHEMISTRY', 'Serum Albumin', '100'),
(166, 'BIOCHEMISTRY', 'CPK', '500'),
(167, 'BIOCHEMISTRY', 'CPK-MB', '450'),
(168, 'BIOCHEMISTRY', 'ADA', '600'),
(169, 'BIOCHEMISTRY', 'Fluid analysis routine ', '300'),
(170, 'HISTO PATHOLOGY', 'Fluid Culter', '250'),
(173, 'BIOCHEMISTRY', 'IgE', '650'),
(174, 'MICRO-BIOLOGY', 'HAV Serology IgG & IgM', '1800'),
(175, 'MICRO-BIOLOGY', 'Hepatitis B Serology (HbeAg% SbsAg', '1050'),
(176, 'MICRO-BIOLOGY', 'Urine For Sugar', '50'),
(177, 'BIOCHEMISTRY', 'Folic Acid', '800'),
(178, 'BIOCHEMISTRY', 'ANA ', '1000'),
(179, 'BIOCHEMISTRY', 'Anti CCP Antibodies', '1400'),
(180, 'BIOCHEMISTRY', 'Ammonia', '1500'),
(181, 'BIOCHEMISTRY', 'Lactate', '1000'),
(182, 'BIOCHEMISTRY', 'creatinine,protine ratio', '700'),
(183, 'USG', 'Breast scan both', '1800'),
(184, 'USG', 'Breast scan single', '900'),
(185, 'CLINICAL PATHOLOGY', 'plueral fluid c/s', '400'),
(186, 'CLINICAL PATHOLOGY', 'plueral fluid  AFB', '300'),
(187, 'CLINICAL PATHOLOGY', 'CYTOLOGY', '400'),
(188, 'X-RAY', 'XRAY', '200'),
(189, 'X-RAY', 'SCANNING', '300'),
(190, 'RADIOLOGY', 'USG NECH', '1000'),
(191, 'RADIOLOGY', 'USG NECK', '1000'),
(192, 'RADIOLOGY', 'ANKLE JT AP/LAT', '350'),
(193, 'RADIOLOGY', 'LEG AP/LAT', '350'),
(194, 'BIOCHEMISTRY', 'Ionized Calcium', '700'),
(195, 'X-RAY', 'X-RAY CHEST PA', '250'),
(196, 'X-RAY', 'X-RAY CHEST PAAP', '300'),
(197, 'BIOCHEMISTRY', 'Torch Profile 10P', '2500'),
(198, 'MICRO-BIOLOGY', 'Pyoganic Culture ', '400'),
(199, 'BIOCHEMISTRY', 'D Dimar', '1000'),
(200, 'RADIOLOGY', 'kub', '350'),
(201, 'BIOCHEMISTRY', 'Folate', '850'),
(202, 'BIOCHEMISTRY', 'carbozipn levals', '1200'),
(203, 'MICRO-BIOLOGY', 'Hepatitis C serology', '500'),
(204, 'HAEMOTOLOGY', 'Hematocret', '250'),
(205, 'USG', 'tiffa Scan', '1000'),
(206, 'MICRO-BIOLOGY', 'urine criatine', '300'),
(207, 'BIOCHEMISTRY', 'S.I G A LEVELS', '1000'),
(208, 'BIOCHEMISTRY', 'C3', '600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dappointment`
--
ALTER TABLE `dappointment`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `empdepartment`
--
ALTER TABLE `empdepartment`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `hr_emp`
--
ALTER TABLE `hr_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labdetails`
--
ALTER TABLE `labdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`FLOOR_CODE`);

--
-- Indexes for table `masterdept`
--
ALTER TABLE `masterdept`
  ADD PRIMARY KEY (`deptcode`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacydetails`
--
ALTER TABLE `pharmacydetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdetails`
--
ALTER TABLE `testdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dappointment`
--
ALTER TABLE `dappointment`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empdepartment`
--
ALTER TABLE `empdepartment`
  MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `hr_emp`
--
ALTER TABLE `hr_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `labdetails`
--
ALTER TABLE `labdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `FLOOR_CODE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pharmacydetails`
--
ALTER TABLE `pharmacydetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testdetails`
--
ALTER TABLE `testdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
