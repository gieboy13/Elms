-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Generation Time: Mar 06, 2020 at 08:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '93813f00d2920b8b2790cdc580d1f247', '2019-03-23 20:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `empcredits`
--

CREATE TABLE `empcredits` (
  `empid` int(11) NOT NULL,
  `sick_credits` decimal(10,2) NOT NULL,
  `vacation_credits` decimal(10,2) NOT NULL,
  `date_reset` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empcredits`
--

INSERT INTO `empcredits` (`empid`, `sick_credits`, `vacation_credits`, `date_reset`) VALUES
(0, '3.75', '3.75', '2020-03-06'),
(12, '3.75', '3.75', '2020-03-06'),
(13, '3.75', '3.75', '2020-03-06'),
(14, '3.75', '3.75', '2020-03-06'),
(15, '3.75', '3.75', '2020-03-06'),
(16, '3.75', '3.75', '2020-03-06'),
(17, '3.75', '3.75', '2020-03-06'),
(18, '3.75', '3.75', '2020-03-06'),
(19, '3.75', '3.75', '2020-03-06'),
(20, '3.75', '3.75', '2020-03-06'),
(21, '3.75', '3.75', '2020-03-06'),
(22, '3.75', '3.75', '2020-03-06'),
(23, '1.75', '3.75', '2020-03-06'),
(24, '3.75', '3.75', '2020-03-06'),
(25, '3.75', '3.75', '2020-03-06'),
(26, '3.75', '3.75', '2020-03-06'),
(27, '3.75', '3.75', '2020-03-06'),
(28, '3.75', '3.75', '2020-03-06'),
(29, '3.75', '3.75', '2020-03-06'),
(30, '3.75', '3.75', '2020-03-06'),
(31, '3.75', '3.75', '2020-03-06'),
(32, '3.75', '3.75', '2020-03-06'),
(33, '3.75', '3.75', '2020-03-06'),
(34, '3.75', '3.75', '2020-03-06'),
(35, '3.75', '3.75', '2020-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'supervisor', '93813f00d2920b8b2790cdc580d1f247', '2020-03-04 01:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'Human Resource Management Department', 'HRMD', '001', '2017-11-01 07:16:25'),
(2, 'Information Technology', 'IT', '002', '2017-11-01 07:19:37'),
(3, 'Operations', 'OP', '003', '2017-12-02 21:28:56'),
(5, 'College of Computer and Information Sciences', 'CCIS', '004', '2019-03-23 21:54:51'),
(6, 'College of Architecture and Fine Arts', 'CAFA', '005', '2019-03-23 21:55:28'),
(7, 'College of Accountancy and Finance ', 'CAF', '006', '2019-03-27 09:08:59'),
(8, 'College of Arts and Letters', 'CAL', '007', '2019-03-27 09:11:25'),
(9, 'College of Business Administration', 'CBA', '008', '2019-03-27 09:11:42'),
(10, 'College of Communication', 'COC', '009', '2019-03-27 09:12:00'),
(11, 'College of Education ', 'COED', '010', '2019-03-27 09:12:19'),
(12, 'College of Engineering', 'CE', '011', '2019-03-27 09:12:39'),
(13, 'College of Human Kinetics', 'CHK', '012', '2019-03-27 09:12:52'),
(14, 'College of Law', 'CL', '013', '2019-03-27 09:13:30'),
(15, 'College of Political Science and Public Administration', 'CPSPA', '014', '2019-03-27 09:13:49'),
(16, 'College of Social Sciences and Development', 'CSSD', '015', '2019-03-27 09:14:44'),
(17, 'College of Science', 'CS', '016', '2019-03-27 09:14:57'),
(18, 'College of Tourism, Hospitality and Transportation Management', 'CTHTM', '017', '2019-03-27 09:15:22'),
(19, ' Institute of Technology', 'ITech', '018', '2019-03-27 09:15:50'),
(20, 'Office of the President', 'Pres', '019', '2019-03-27 09:17:37'),
(21, 'Office of the Executive Vice President', 'OEVP', '020', '2019-03-27 09:18:09'),
(22, 'Office of the Vice President for Academic Affairs', 'OVPAA', '021', '2019-03-27 09:18:31'),
(23, 'Office of the Vice President for Administration', 'OVPA', '022', '2019-03-27 09:18:55'),
(24, 'Office of the Vice President for Student Affairs and Services', 'OVPSAS', '023', '2019-03-27 09:19:29'),
(25, 'Office of the Vice President for Research, Extension, and Development', 'OVPRED', '024', '2019-03-27 09:19:55'),
(26, 'Office of the Vice President for Finance', 'OVPF', '025', '2019-03-27 09:20:11'),
(27, 'Office of the Vice President for Branches and Satellite Campuses', 'OVPBSC', '026', '2019-03-27 09:20:35'),
(28, 'Office of the University Board Secretary', 'OUBS', '027', '2019-03-27 09:21:04'),
(29, 'University Legal Counsel Office', 'ULCO', '028', '2019-03-27 09:21:37'),
(30, 'Communication Management Office', 'CMO', '029', '2019-03-27 09:21:53'),
(31, 'Creative Media Services', 'CMS', '030', '2019-03-27 09:22:12'),
(32, 'Media Relations Services', 'MRS', '031', '2019-03-27 09:22:29'),
(33, 'PUP CreaTV', 'PUPCTV', '032', '2019-03-27 09:22:47'),
(34, 'Internal Audit Office', 'IAO', '033', '2019-03-27 09:23:00'),
(35, 'Financial Management Unit', 'FMU', '034', '2019-03-27 09:23:16'),
(36, 'Inspection Management Unit', 'IMU', '035', '2019-03-27 09:23:41'),
(37, 'Operation Management Unit', 'OMU', '036', '2019-03-27 09:24:00'),
(38, 'Branch and Campus Coordinator', 'BCC', '037', '2019-03-27 09:24:15'),
(39, 'Special Programs and Projects Office', 'SPPO', '038', '2019-03-27 09:24:30'),
(40, 'Business Process Outsourcing Incubation Contact Center', 'BPOICC', '039', '2019-03-27 09:24:47'),
(41, 'Infrastructure and Personnel Management', 'IPM', '040', '2019-03-27 09:25:01'),
(42, 'Safety and Security Services', 'SSS', '041', '2019-03-27 09:25:17'),
(43, 'Security for Main, Branches and Campuses Section', 'SMBCS', '042', '2019-03-27 09:25:33'),
(44, 'President Security Guards Section', 'PSGS', '043', '2019-03-27 09:25:50'),
(45, 'Office of International Affairs', 'OIA', '044', '2019-03-27 09:26:08'),
(46, 'Sports Development Program Office', 'SDPO', '045', '2019-03-27 09:26:36'),
(47, 'University Printing Press Office', 'UPPO', '046', '2019-03-27 09:26:50'),
(48, 'Information and Communications Technology Office', 'ICTO', '047', '2019-03-27 09:27:02'),
(49, 'Information Systems Development Section', 'ISDS', '048', '2019-03-27 09:27:24'),
(50, 'Network and Systems Administration Section', 'NSAS', '049', '2019-03-27 09:27:38'),
(51, 'Technical Support', 'TS', '050', '2019-03-27 09:27:51'),
(52, 'Operations Section (Help Desk, PUP SIS and PUP iApply concerns)', 'OS', '051', '2019-03-27 09:29:14'),
(53, 'Quality Assurance Center', 'QAC', '052', '2019-03-27 09:29:29'),
(54, 'PASUC Office for NBC 461 Evaluation', 'PASUC', '053', '2019-03-27 09:29:43'),
(55, 'National Service Training Program Office', 'NSTPO', '054', '2019-03-27 09:29:57'),
(56, 'Civic Welfare Training Services', 'CWTS', '055', '2019-03-27 09:30:10'),
(57, 'Reserved Officers Training Course', 'ROTC', '056', '2019-03-27 09:30:29'),
(58, 'Literacy Training Services', 'LTS', '057', '2019-03-27 09:30:42'),
(59, 'Ninoy Aquino Library and Learning Resources Center', 'NALLRC', '058', '2019-03-27 09:31:01'),
(60, 'Graduate School', 'GS', '059', '2019-03-27 09:31:15'),
(61, 'GS Registrar', 'GSR', '060', '2019-03-27 09:32:35'),
(62, 'Research and Accreditation Office', 'RAO', '061', '2019-03-27 09:32:47'),
(63, 'Extension Office', 'EO', '062', '2019-03-27 09:32:58'),
(64, 'Open University System', 'OUS', '063', '2019-03-27 09:33:09'),
(65, 'Institute of Open and Distance Education', 'IODE', '064', '2019-03-27 09:33:44'),
(66, 'Institute of Non-Traditional Study Program and ETEEAP', 'INTSP', '065', '2019-03-27 09:34:02'),
(67, 'Institute of Continuing and Professional Development', 'ICPD', '066', '2019-03-27 09:34:15'),
(68, 'Office of the Academic Program Heads', 'OAPH', '067', '2019-03-27 09:34:28'),
(69, 'Registrar and Admission Office', 'RAO', '068', '2019-03-27 09:34:44'),
(70, 'Instructional Media Production Office', 'IMPO', '069', '2019-03-27 09:35:07'),
(71, 'Learning Management Section / eMabini Portal', 'LMS', '070', '2019-03-27 09:35:27'),
(72, 'Undergraduate Programs', 'UP', '071', '2019-03-27 09:36:00'),
(73, 'Research, Extension and Accreditation Office', 'REAO', '072', '2019-03-27 09:36:14'),
(74, 'Registrar and Admission', 'RA', '073', '2019-03-27 09:36:32'),
(75, 'Research and Publication', 'RP', '074', '2019-03-27 09:36:49'),
(76, 'Laboratory High School', 'LHS', '075', '2019-03-27 09:37:36'),
(77, 'Medical Services Department', 'MSD', '076', '2019-03-27 09:39:01'),
(78, 'Procurement Management Office', 'PMO', '077', '2019-03-27 09:39:16'),
(79, 'Bids and Awards Committee', 'BAC', '078', '2019-03-27 09:39:29'),
(80, 'Property and Supplies Management Office', 'PSMO', '079', '2019-03-27 09:39:42'),
(81, 'Facility Management Office', 'FAMO', '080', '2019-03-27 09:39:57'),
(82, 'Physical Planning and Development Office', 'PPDO', '081', '2019-03-27 09:40:48'),
(83, 'Central Records Section', 'CRS', '082', '2019-03-27 09:41:01'),
(84, 'Office of the University Registrar', 'OUR', '083', '2019-03-27 09:41:14'),
(85, 'Admission Services', 'AS', '084', '2019-03-27 09:41:26'),
(86, 'Student Records Services', 'SRS', '085', '2019-03-27 09:41:36'),
(87, 'Office of the Student Services', 'OSS', '086', '2019-03-27 09:41:48'),
(88, 'Scholarship and Financial Assistance Services', 'SFAS', '087', '2019-03-27 09:42:00'),
(89, 'Counseling and Psychological Services Office', 'CPSO', '088', '2019-03-27 09:42:14'),
(90, 'Career Development and Placement Services', 'CDPS', '089', '2019-03-27 09:42:44'),
(91, 'Alumni Relations', 'ALUMNI', '090', '2019-03-27 09:42:58'),
(92, 'University Center for Culture and the Arts', 'UCCA', '091', '2019-03-27 09:43:15'),
(93, 'Accounting Department', 'AD', '092', '2019-03-27 09:43:33'),
(94, 'Payroll Section', 'PS', '093', '2019-03-27 09:44:08'),
(95, 'Budget Services Office', 'BSO', '094', '2019-03-27 09:44:20'),
(96, 'Fund Management Office', 'FMO', '095', '2019-03-27 09:44:33'),
(97, 'Resource Generation Office', 'RGO', '096', '2019-03-27 09:44:48'),
(98, 'Provident Fund Office', 'PFO', '097', '2019-03-27 09:45:05'),
(99, 'Research Management Office', 'RMO', '098', '2019-03-27 09:45:22'),
(100, 'Extension Management Office', 'EMO', '099', '2019-03-27 09:45:35'),
(101, 'Intellectual Property Management Office	', 'IPMO', '100', '2019-03-27 09:45:50'),
(102, 'Institutional Planning Office', 'IPO', '101', '2019-03-27 09:46:04'),
(103, 'Institute for Data and Statistical Analysis', 'IDSA', '102', '2019-03-27 09:46:17'),
(104, 'Publications Office', 'PUBL', '103', '2019-03-27 09:46:41'),
(105, 'Institute for Culture and Language Studies', 'ICLS', '104', '2019-03-27 09:46:59'),
(106, 'Institute for Science and Technology Research', 'SCITECH', '105', '2019-03-27 09:47:15'),
(107, 'Institute for Human and Social Development', 'IHSD', '106', '2019-03-27 09:47:29'),
(108, 'PUP Multipurpose Cooperative', 'COOP', '107', '2019-03-27 09:48:20'),
(109, 'COA Field Office', 'COA-FO', '108', '2019-03-27 09:48:42'),
(110, 'Janitorial Services', 'JS', '109', '2019-03-27 09:48:52'),
(111, 'PUP Alumni Association', 'PUP AA', '110', '2019-03-27 09:49:21'),
(112, 'PUP Faculty Association', 'PUP FA', '111', '2019-03-27 09:49:37'),
(113, 'PUP Administrative Employees Union', 'PUP AEU', '112', '2019-03-27 09:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Position` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `salary` int(11) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `EmpImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `City`, `Position`, `Phonenumber`, `Status`, `RegDate`, `salary`, `MiddleName`, `EmpImage`) VALUES
(14, '1233545', 'Maida', 'Frias', 'maida123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '2 August, 1991', 'College of Computer and Information Sciences', 'Antipolo', 'Antipolo', 'Manager', '9435346345', 1, '2019-08-19 09:35:38', 3, 'Silva', ''),
(15, '1324235235', 'Glory', 'Traballo', 'glory123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '', 'Human Resource Management Department', 'Pandacan', 'Manila', 'Supervisor', '9312423532', 1, '2019-08-19 09:37:14', 6, '', ''),
(16, '1231352534624', 'Janlie Aaron', 'Banhaon', 'janlie123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '15 January, 1998', 'Office of the Executive Vice President', 'Binan', 'Laguna', 'Janitor', '9523534634', 1, '2019-08-21 13:53:56', 1, '', ''),
(17, 'mdasb4124141', 'Kenneth', 'Natural', 'kenneth123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '3 February, 2000', 'President Security Guards Section', 'Market Place', 'Mandaluyong', 'Chief', '9523624622', 1, '2019-08-21 20:43:03', 2, '', ''),
(18, '43245fdfds', 'Axel John', 'Borromeo', 'axel123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '15 October, 1997', 'National Service Training Program Office', '69 Race Court', 'Paranaque', 'Teacher', '9346246246', 1, '2019-08-21 20:44:17', 1, '', ''),
(19, '323ggsbvbd', 'Anthony Jude', 'Rono', 'aj123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '18 March, 2000', 'Learning Management Section / eMabini Portal', 'Montalban', 'Rizal', 'Chairperson', '9235236522', 1, '2019-08-21 20:45:42', 3, '', ''),
(20, 'afasdfasf23412', 'Adrian', 'Belir', 'adrian123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '17 December, 1997', 'Open University System', 'Navotas', 'Navotas', 'Janitor', '9526262463', 1, '2019-08-21 20:46:46', 4, '', ''),
(21, 'fdsfsd', 'Jan Cyrill', 'Arcilla', 'jc123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '8 May, 1998', 'President Security Guards Section', 'Quezon Ave.', 'Quezon', 'Janitor', '9252465346', 1, '2019-08-21 20:48:05', 6, '', ''),
(22, '3124hiihi', 'Virginia', 'Consuelo', 'ginie123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '15 May, 1999', 'Research and Publication', 'Cainta', 'Rizal', 'Manager', '9523526523', 1, '2019-08-21 20:51:20', 2, '', ''),
(23, '423gugkg', 'Melody', 'Acdog', 'mel123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '17 July, 1996', 'Security for Main, Branches and Campuses Section', 'Marikina', 'Marikina', 'Supervisor', '9523563245', 1, '2019-08-21 20:52:21', 1, 'Silva', ''),
(24, '423hghgvsa', 'Hayania', 'Ampuan', 'haya123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '14 November, 1996', 'Inspection Management Unit', 'Caloocan', 'Caloocan', 'Sweeper', '9523523534', 1, '2019-08-21 20:53:09', 4, '', ''),
(25, 'dasd3432432', 'Mark Anthony', 'Mercado', 'mark123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '3 August, 2000', 'Institute for Science and Technology Research', 'Paranaque', 'Paranaque', 'Manager', '9523523532', 1, '2019-08-21 20:54:50', 1, '', ''),
(26, '7676sadfsdf', 'Edgar', 'David', 'edgar123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '3 August, 1984', 'Central Records Section', 'Tondo', 'Manila', 'Boss', '9532534543', 1, '2019-08-21 20:55:51', 1, '', ''),
(27, '432sdsds', 'Ernel', 'Guarino', 'ernel123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '12 February, 1995', 'Office of the Vice President for Academic Affairs', 'Quezon', 'Quezon ', 'Sweeper', '9235235324', 1, '2019-08-21 20:56:43', 9, '', ''),
(28, '422fsafsd532', 'Robinson', 'Joaquin', 'rob123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '', 'Learning Management Section / eMabini Portal', 'manila', 'manila', 'mamama', '9436346346', 1, '2019-09-19 13:47:27', 9, '', ''),
(29, '2016-00574-MN-0', 'Alex Joseph', 'Rosdy', 'rosdy123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '3 April, 1991', 'Inspection Management Unit', 'Manila', 'Manila', 'Chief', '9534534634', 1, '2019-10-09 11:06:03', 3, 'Rosdy', ''),
(30, '2016-00362-MN-1', 'Ria', 'Sagum', 'sagum123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '', 'Office of the Vice President for Research, Extension, and Development', 'Manila', 'Manila', 'Professor', '9423523532', 1, '2019-10-10 10:14:02', 15, 'Sagum', ''),
(31, '2017-00483-MN-0', 'Vivien', 'Domingo', 'domingo123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '1 October, 1984', 'College of Architecture and Fine Arts', 'Marikina', 'Marikina', 'Professor', '9523534534', 1, '2019-10-10 10:18:06', 12, 'Domingo', ''),
(32, '2015-00421-MN-1', 'Anne Joenelle', 'Castanares', 'anne123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '16 November, 1996', 'PUP Faculty Association', 'Cainta', 'Rizal', 'Manager', '9758318213', 1, '2019-10-13 14:25:43', 0, 'Awayan', ''),
(33, '12306', 'Arapia', 'Ariraya', 'arapia123@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Female', '29 February, 1984', 'College of Communication', 'Quezon', 'Quezon', 'Instructor I', '9299939227', 1, '2019-10-14 08:29:34', 12, 'Ariraya', ''),
(34, '2011-00594-MN-0', 'Michael', 'Dela Fuente', 'mike123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Male', '3 May, 2007', 'College of Computer and Information Sciences', 'San Juan', 'Juan', 'Instructor I', '9543646456', 1, '2019-10-15 06:20:12', 12, 'M.', ''),
(35, '2010-00654-MN-0', 'Elias', 'Austria', 'eli123@gmail.com', '3733736264c7b323acea96855e5cf643', 'Female', '2 March, 2005', 'Information Technology', 'Manila', 'Manila', 'Instructor II', '9533055388', 1, '2019-10-15 06:22:08', 13, 'A.', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(250) NOT NULL,
  `FromDate` varchar(250) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `casesick` varchar(255) DEFAULT NULL,
  `casesickdesc` varchar(255) DEFAULT NULL,
  `casevac` varchar(255) DEFAULT NULL,
  `casevacdesc` varchar(255) DEFAULT NULL,
  `commutation` varchar(255) DEFAULT NULL,
  `justification` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`, `casesick`, `casesickdesc`, `casevac`, `casevacdesc`, `commutation`, `justification`) VALUES
(95, 'Sick Leave', '2019-08-01', '2019-08-02', '', '2019-08-19 09:38:57', 'wqwqwqw', '2019-08-19 15:09:41 ', 2, 1, 15, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Sick Leave', '2019-08-01', '2019-08-02', '', '2019-08-19 09:54:20', 'huhj78gyf7h', '2019-08-19 15:24:51 ', 1, 1, 15, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Sick Leave', '2020-08-01', '2020-08-02', '', '2020-08-19 10:00:28', 'okay!', '2020-08-19 15:34:20 ', 1, 1, 14, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Sick Leave', '2019-08-01', '2019-08-02', '', '2019-08-19 10:29:51', 'yesas', '2019-08-19 16:00:21 ', 1, 1, 15, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'Vacation Leave', '2019-08-28', '2019-08-29', '', '2019-08-20 09:18:38', 'asfsadfasdf', '2019-08-20 14:49:33 ', 1, 1, 14, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'Sick Leave', '2019-08-01', '2019-08-02', '', '2019-08-21 13:40:49', 'hahaha', '2019-08-21 19:12:42 ', 1, 1, 14, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'Sick Leave', '2019-08-01', '2019-08-02', '', '2019-08-22 06:45:01', 'haha', '2019-08-22 12:15:30 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'Vacation Leave', '2019-08-23', '2019-08-25', '', '2019-08-22 06:48:50', 'dasfas', '2019-08-22 12:20:03 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'Sick Leave', '2019-08-01', '2019-08-03', '', '2019-08-22 07:07:29', 'hahaha', '2019-08-22 12:37:46 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'Sick Leave', '2019-08-01', '2019-08-03', '', '2019-08-22 07:13:12', 'aaaaaaaad', '2019-08-22 12:43:36 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'Sick Leave', '2019-08-01', '2019-08-04', '', '2019-08-22 07:20:19', 'adasd', '2019-08-22 12:50:58 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'Sick Leave', '2019-08-01', '2019-08-03', '', '2019-08-22 07:47:52', 'aaaaadas', '2019-08-22 13:18:12 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'Sick Leave', '2019-08-01', '2019-08-03', '', '2019-08-22 07:52:50', 'eeeee', '2019-08-22 13:23:08 ', 1, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'Sick Leave', '2019-08-01', '2019-08-03', '', '2019-08-22 07:55:11', 'hahahaa', '2019-08-22 13:25:31 ', 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'Vacation Leave', '2019-08-24', '2019-08-26', '', '2019-08-22 10:20:07', '', '2019-08-22 15:55:12 ', 1, 1, 15, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'Sick Leave', '2019-08-20', '2019-08-21', '', '2019-08-22 10:27:36', '', '2019-08-22 15:57:57 ', 1, 1, 14, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'Sick Leave', '2019-09-09', '2019-09-09', '', '2019-09-09 11:01:26', '', '2019-09-19 20:24:24 ', 1, 1, 19, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'Sick Leave', '2019-09-14', '2019-09-26', '', '2019-09-13 01:36:06', '', '2019-09-19 20:24:43 ', 2, 1, 20, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'Sick Leave', '2019-09-12', '2019-09-14', '', '2019-09-19 13:47:59', '', '2019-09-19 20:45:26 ', 1, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'Vacation Leave', '2019-09-27', '2019-09-30', '', '2019-09-19 15:23:50', '', '2019-09-19 21:05:13 ', 1, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Sick Leave', '2019-09-01', '2019-09-05', '', '2019-09-19 15:41:17', NULL, NULL, 0, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Vacation Leave', '2019-09-27', '2019-09-30', '', '2019-09-19 15:47:23', 's', '2019-09-19 20:24:43 ', 3, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Sick Leave', '2019-09-12', '2019-09-22', '', '2019-09-20 05:37:34', NULL, NULL, 3, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'Immediate Family', '2019-10-11', '2019-10-23', '', '2019-10-04 09:45:55', NULL, NULL, 3, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'Sick Leave', '2019-09-03', '2019-09-04', '', '2019-10-04 09:53:26', 'sige lang', '2019-10-04 15:26:09 ', 1, 1, 23, 'In Hospital (Specify)', 'Tayuman Corona', 'Within the Philippines', 'Abroad Desc', 'Requested', NULL),
(120, 'Vacation Leave', '2019-11-04', '2019-10-11', '', '2019-10-09 15:19:54', '', '2019-10-09 20:50:43 ', 1, 1, 29, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'Sick Leave', '2019-10-01', '2019-10-07', '', '2019-10-09 15:22:11', '', '2019-10-09 20:52:45 ', 2, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'Sick Leave', '2019-10-01', '2019-10-08', '', '2019-10-09 15:23:26', '', '2019-10-09 20:53:43 ', 1, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'Vacation Leave', '2019-10-17', '2019-10-21', '', '2019-10-10 10:22:05', '', '2019-10-10 15:52:20 ', 1, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'Sick Leave', '2019-10-09', '2019-10-20', '', '2019-10-10 12:29:39', '', '2019-10-10 18:00:00 ', 1, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Vacation Leave', '2019-10-14', '2019-10-14', '', '2019-10-11 02:42:29', '', '2019-10-11 8:13:05 ', 1, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Vacation Leave', '2019-10-15', '2019-10-14', '', '2019-10-11 03:05:50', '', '2019-10-11 8:36:18 ', 1, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Vacation Leave', '2019-10-01', '2019-11-01', '', '2019-10-11 03:09:05', NULL, NULL, 0, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Vacation Leave', '2019-10-20', '2019-11-01', '', '2019-10-11 03:09:27', NULL, NULL, 0, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Vacation Leave', '2019-10-18', '2019-10-14', '', '2019-10-11 03:15:35', '', '10-11-2019 8:46:23 ', 1, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Vacation Leave', '2019-10-14', '2019-10-11', '', '2019-10-11 08:55:19', '', '10-11-2019 14:25:39 ', 1, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Maternity Leave', '2019-10-25', '2019-10-14', '', '2019-10-11 18:10:49', NULL, NULL, 0, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Vacation Leave', '2019-11-30', '2019-11-01', '', '2019-10-13 14:26:35', '', '10-13-2019 19:57:03 ', 1, 1, 32, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Vacation Leave', '2019-10-31', '2019-10-14', '', '2019-10-13 14:31:23', '', '10-13-2019 20:02:41 ', 1, 1, 32, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Vacation Leave', '2019-10-21', '2019-10-18', '', '2019-10-14 08:02:08', '', '10-14-2019 13:32:28 ', 1, 1, 30, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'Vacation Leave', '2019-10-15', '2019-10-14', '', '2019-10-14 08:32:45', '', '10-14-2019 14:04:31 ', 1, 1, 33, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Vacation Leave', '2019-11-04', '2019-10-31', '', '2019-10-14 21:56:51', '', '10-15-2019 3:28:10 ', 1, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'Sick Leave', '2019-10-01', '2019-10-03', '', '2019-10-14 22:09:53', '', '10-15-2019 3:40:13 ', 1, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'Sick Leave', '2019-10-04', '2019-10-01', '', '2019-10-14 22:12:07', '', '10-15-2019 3:42:23 ', 1, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'Vacation Leave', '2019-11-04', '2019-10-31', '', '2019-10-14 22:13:33', '', '10-15-2019 3:43:55 ', 1, 1, 28, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'Leave of Absence', '2019-10-28', '2019-10-24', '', '2019-10-15 06:24:50', 'okay', '10-15-2019 12:03:11 ', 1, 1, 34, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'Vacation Leave', '2019-11-01', '2019-10-25', '', '2019-10-15 06:26:08', 'Need to report in HR Office', '10-15-2019 12:02:46 ', 1, 1, 35, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'Vacation Leave', '2019-11-01', '2019-10-25', '', '2019-10-15 06:33:16', NULL, NULL, 0, 1, 35, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'Sick Leave', '03/03/2020', '03/05/2020', '', '2020-03-05 02:44:27', NULL, NULL, 3, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Sick Leave', '03/03/2020', '03/05/2020', '', '2020-03-05 02:45:17', NULL, NULL, 3, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Leave of Absence', '03/13/2020', '03/10/2020', '', '2020-03-05 02:45:34', NULL, NULL, 3, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'Sick Leave', '03/04/2020', '03/02/2020', '', '2020-03-05 02:46:01', 'Sige absent ka muna oks lang naman', '03-05-2020 8:18:37 ', 1, 1, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'Cumulation of Leave Credits', '03/20/2020', '03/12/2020', '', '2020-03-05 06:34:21', NULL, NULL, 3, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'Sick Leave', '03/04/2020', '03/02/2020', '', '2020-03-05 09:38:10', NULL, NULL, 3, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'Sick Leave', '03/04/2020', '03/02/2020', '', '2020-03-05 09:38:10', NULL, NULL, 0, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'Sick Leave', '03/02/2020', '03/04/2020', '', '2020-03-05 09:45:29', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'Sick Leave', '03/02/2020', '03/04/2020', '', '2020-03-05 09:46:23', NULL, NULL, 0, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'Vacation Leave', '03/09/2020', '03/19/2020', '', '2020-03-05 09:48:47', NULL, NULL, 3, 0, 23, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'Sick Leave', '03/02/2020', '03/04/2020', '', '2020-03-05 09:51:12', NULL, NULL, 0, 0, 23, 'In Hospital', 'Tayuman Hospital', '', '', 'notrequested', NULL),
(154, 'Immediate Family', '03/10/2020', '03/18/2020', '', '2020-03-05 09:55:42', NULL, NULL, 0, 0, 23, '', '', '', '', 'requested', NULL),
(155, 'Immediate Family', '03/10/2020', '03/18/2020', '', '2020-03-05 09:55:43', NULL, NULL, 0, 0, 23, '', '', '', '', 'requested', NULL),
(159, 'Commutation of Leave Credits', '03/10/2020', '03/19/2020', '', '2020-03-05 10:08:10', NULL, NULL, 0, 1, 23, '', '', '', '', 'requested', NULL),
(160, 'Immediate Family', '03/17/2020', '03/12/2020', '', '2020-03-05 10:11:20', NULL, NULL, 3, 0, 23, '', '', '', '', 'requested', NULL),
(161, 'Cumulation of Leave Credits', '03/17/2020', '03/19/2020', '', '2020-03-05 10:13:36', NULL, NULL, 3, 1, 23, '', '', '', '', 'requested', NULL),
(162, 'Sick Leave', '03/02/2020', '03/05/2020', '', '2020-03-06 01:48:47', 'sigi pagaling ka baby', '03-06-2020 7:19:38 ', 1, 1, 23, 'In Hospital', 'Masakit ang katawan ko ndi ako nakapasok', '', '', 'notrequested', NULL),
(163, 'Sick Leave', '03/02/2020', '03/05/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:13:53', NULL, NULL, 0, 1, 14, 'Out Patient (Specify)', 'Sa bahay lang kaya naman ', '', '', 'Not Requested', NULL),
(164, 'Sick Leave', '03/02/2020', '03/05/2020', '100000 capacity with aircon na malaming', '2020-03-06 02:32:30', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', 'medcert test', '', '', 'Not Requested', NULL),
(165, 'Sick Leave', '03/02/2020', '03/05/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:34:07', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', '123', '', '', 'Not Requested', NULL),
(166, 'Sick Leave', '03/02/2020', '03/05/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:34:35', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', '123', '', '', 'Not Requested', NULL),
(167, 'Sick Leave', '03/02/2020', '03/04/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:35:42', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', '123', '', '', 'Requested', 'C:\\fakepath\\Justification.docx'),
(168, 'Sick Leave', '03/02/2020', '03/04/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:37:34', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', '123', '', '', 'Not Requested', 'C:\\fakepath\\Justification.docx'),
(169, 'Sick Leave', '03/03/2020', '03/05/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:38:30', NULL, NULL, 0, 1, 14, 'Out Patient (Specify)', '123', '', '', 'Not Requested', 'C:\\fakepath\\Justification.docx'),
(170, 'Sick Leave', '03/02/2020', '03/04/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 02:42:33', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', '123', '', '', 'Not Requested', 'Justification.docx'),
(171, 'Sick Leave', '03/02/2020', '03/05/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 03:30:13', NULL, NULL, 0, 0, 14, 'Out Patient (Specify)', 'test upload', '', '', 'Not Requested', 'Justification.docx'),
(172, 'Sick Leave', '03/02/2020', '03/05/2020', 'We are the best reflexologist in town, our spa is in full air conditioned.', '2020-03-06 03:30:30', NULL, NULL, 0, 1, 14, 'Out Patient (Specify)', 'test upload', '', '', 'Not Requested', 'Justification.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(4, 'Leave of Absence', 'It is generally defined as a right granted to officials and employees not to report for work with or without pay as may be provided by law and as the rules prescribe in Rule XVI hereof.', '2019-10-02 15:06:11'),
(5, 'Commutation of Leave Credits', 'It refers to conversion of unused leave credits to their corresponding money value.', '2019-10-02 15:08:31'),
(6, 'Cumulation of Leave Credits', 'It refers to incremental acquisition of unused leave credits by an official or employee.', '2019-10-02 15:10:23'),
(7, 'Immediate Family', 'It refers to the spouse, children, parents, unmarried brothers and sisters and any relative living under the same roof or dependent upon the employee for support. (Amended by CSC MC 6, s. 1999)', '2019-10-02 15:12:50'),
(8, 'Sick Leave', 'It refers to leave of absence granted only on account of sickness or disability on the part of the employee concerned or any member of his immediate family.', '2019-10-02 15:15:42'),
(9, 'Vacation Leave', 'It refers to leave of absence granted to officials and employees for personal reasons, the approval of which is contingent upon the necessities pf the service. ', '2019-10-02 15:17:10'),
(10, 'Monetization', 'It refers to payment in advance under prescribed limits and subject to specified terms and conditions of the money value of leave credits of an employee upon his request without actually going on leave.', '2019-10-02 15:19:19'),
(11, 'Pregnancy', 'It refers to the period between conception and delivery or birth of a child. For purposes of maternity leave, miscarriage is within the period of pregnancy.', '2019-10-02 15:21:01'),
(12, 'Maternity Leave', 'It refers to leave of absence granted to female government employees legally entitled thereto  in addition to vacation and sick leave. The primary intent or purpose of granting maternity leave is to extend working mothers some measure of financial help and to provide her a period of rest and recuperation in connection with her pregnancy.', '2019-10-02 15:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblsalarygrade`
--

CREATE TABLE `tblsalarygrade` (
  `sg_id` int(11) NOT NULL,
  `salarygrade` int(11) NOT NULL,
  `salaryrange` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsalarygrade`
--

INSERT INTO `tblsalarygrade` (`sg_id`, `salarygrade`, `salaryrange`) VALUES
(1, 1, '11,068 - 11,732'),
(2, 2, '11,761 - 12,407'),
(3, 3, '12,466 - 13,152'),
(4, 4, '13,214 - 13,941'),
(5, 5, '14,007 - 14,777'),
(6, 6, '14,847 - 15,664'),
(7, 7, '15,738 - 16,604'),
(8, 8, '16,758 - 17,848'),
(9, 9, '17,975 - 19,054'),
(10, 10, '19,233 - 20,387'),
(11, 11, '20,754 - 22,829'),
(12, 12, '22,938 - 25,003'),
(13, 13, '25,232 - 27,503'),
(14, 14, '27,755 - 30,253'),
(15, 15, '30,531 - 33,279'),
(16, 16, '33,584 - 36,606'),
(17, 17, '36,942 - 40,267'),
(18, 18, '40,637 - 44,294'),
(19, 19, '45,269 - 50,702'),
(20, 20, '51,155 - 57,293'),
(21, 21, '57,805 - 64,741'),
(22, 22, '65,319 - 73,157'),
(23, 23, '73,811 - 82,668'),
(24, 24, '83,406 - 93,415'),
(25, 25, '95,083 - 106,493'),
(26, 26, '107,444 - 120,337'),
(27, 27, '121,411 - 135,981'),
(28, 28, '137,195 - 153,658'),
(29, 29, '155,030 - 173,634'),
(30, 30, '175,184 - 196,206'),
(31, 31, '257,809 - 295,191'),
(32, 32, '307,365 - 353,470'),
(33, 33, '388,096 - 399,739');

-- --------------------------------------------------------

--
-- Table structure for table `tblsl`
--

CREATE TABLE `tblsl` (
  `id` int(11) NOT NULL,
  `InCaseOfSl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsl`
--

INSERT INTO `tblsl` (`id`, `InCaseOfSl`) VALUES
(1, 'In Hospital (Specify)'),
(2, 'Out Patient (Specify)');

-- --------------------------------------------------------

--
-- Table structure for table `tblvl`
--

CREATE TABLE `tblvl` (
  `id` int(11) NOT NULL,
  `InCaseOfVl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvl`
--

INSERT INTO `tblvl` (`id`, `InCaseOfVl`) VALUES
(1, 'Within the Philippines'),
(2, 'Abroad (Specify)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empcredits`
--
ALTER TABLE `empcredits`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsalarygrade`
--
ALTER TABLE `tblsalarygrade`
  ADD PRIMARY KEY (`sg_id`);

--
-- Indexes for table `tblsl`
--
ALTER TABLE `tblsl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvl`
--
ALTER TABLE `tblvl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblsalarygrade`
--
ALTER TABLE `tblsalarygrade`
  MODIFY `sg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblsl`
--
ALTER TABLE `tblsl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblvl`
--
ALTER TABLE `tblvl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD CONSTRAINT `tblleaves_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `empcredits` (`empid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
