-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2016 at 03:16 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reporting`
--

-- --------------------------------------------------------

--
-- Table structure for table `caurses`
--

CREATE TABLE IF NOT EXISTS `caurses` (
`c_id` int(11) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  `maximum` int(50) NOT NULL,
  `t_id` int(50) NOT NULL,
  `d_id` int(50) NOT NULL,
  `cl_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `caurses`
--

INSERT INTO `caurses` (`c_id`, `coursename`, `acronym`, `maximum`, `t_id`, `d_id`, `cl_id`) VALUES
(1, 'server administration', 'SA', 40, 7, 0, 1),
(2, 'Database', 'DB', 40, 1, 0, 1),
(4, 'WEB DESIGN', 'WD', 30, 1, 0, 1),
(5, 'Mathematics', 'Math', 80, 15, 0, 1),
(6, 'System analysis', 'SA', 80, 3, 0, 1),
(7, 'Francais', 'Fr', 20, 12, 0, 1),
(8, 'Power electronic', 'P.E', 60, 4, 0, 2),
(9, 'server administration', 'SA', 40, 12, 0, 6),
(10, 'Database', 'DB', 30, 1, 0, 6),
(11, 'Francais', 'Fr', 20, 14, 0, 6),
(14, 'Databases', 'DB', 30, 1, 0, 11),
(15, 'Intro to comp', 'into', 50, 3, 0, 2),
(16, 'Web design', 'WEB', 40, 1, 0, 2),
(17, 'networking', 'n/w', 30, 3, 0, 2),
(18, 'General', 'gen', 100, 2, 0, 2),
(19, 'Networking', 'N/W', 30, 3, 1, 1),
(20, 'c++', 'c++', 60, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
`cl_id` int(11) NOT NULL,
  `classname` varchar(200) NOT NULL,
  `d_dpt` int(11) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`cl_id`, `classname`, `d_dpt`, `year_id`) VALUES
(1, 'S6CSC', 1, 2),
(2, 'S6CEL', 2, 2),
(3, 'S6CAP', 3, 2),
(4, 'S6ELEC', 6, 2),
(5, 'S6PWO', 5, 2),
(6, 'S5CSC', 1, 2),
(7, 'S5 PWO', 5, 2),
(8, 'S5CAP', 3, 2),
(9, 'S5ELEC', 6, 1),
(10, 'S5CEL', 2, 2),
(11, 'S6CST', 4, 2),
(12, 'S5CTR', 4, 2),
(13, 'S4CSC', 1, 2),
(14, 'S4CTR', 4, 2),
(15, 'S4ELEC', 6, 2),
(16, 'S4CEL', 2, 2),
(17, 'S4CAP', 3, 2),
(18, 'S4PWO', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`com_id` int(11) NOT NULL,
  `commenter_id` int(11) NOT NULL,
  `contents` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `commenter_id`, `contents`) VALUES
(7, 1, 'Already to test'),
(8, 1, 'enter your own '' this is the comment from Emile Whis');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE IF NOT EXISTS `dean` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `idnumber` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phones` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `schoolname` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`id`, `firstname`, `lastname`, `gender`, `idnumber`, `location`, `phones`, `qualification`, `email`, `username`, `password`, `schoolname`) VALUES
(1, 'MUCYO TUYISENGE', 'Rene', 'male', 2147483647, 'Muhanga', '+250784494829', 'A0', 'rene.mucyo@yahoo.com', 'musa', '123', 'Ecole Technique Saint Kizito');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
`d_dpt` int(11) NOT NULL,
  `dpt_name` varchar(255) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`d_dpt`, `dpt_name`, `acronym`, `year_id`) VALUES
(1, 'computer science', 'CSC', 2),
(2, 'Computer electronics', 'CEL', 2),
(3, 'Capentry', 'CAT', 2),
(5, 'Electricity', 'ELEC', 2),
(6, 'Public Work', 'PWO', 2),
(7, 'construction', 'CST', 2),
(8, 'computer science', 'CSC', 1),
(10, '', '', 0),
(11, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `displine`
--

CREATE TABLE IF NOT EXISTS `displine` (
`d_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `idnumber` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phones` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `displine`
--

INSERT INTO `displine` (`d_id`, `firstname`, `lastname`, `gender`, `idnumber`, `location`, `phones`, `qualification`, `email`, `username`, `password`) VALUES
(1, 'MARIO', 'Baroteli', 'male', 2147483647, 'Gasabo', '08243343', 'Postgraduate', 'sajlq@mail.com', 'MARIO', 'badboi'),
(2, 'fdaljks', 'jfalk;sdf', 'female', 7777, 'Kicukiro', '', 'A2', 'mail@mail.com', 'fdaljks', 'jfalk;sdf2016');

-- --------------------------------------------------------

--
-- Table structure for table `displine_max`
--

CREATE TABLE IF NOT EXISTS `displine_max` (
`id` int(11) NOT NULL,
  `displine_max` int(11) NOT NULL,
  `y_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `displine_max`
--

INSERT INTO `displine_max` (`id`, `displine_max`, `y_id`) VALUES
(1, 40, 1),
(2, 40, 2),
(4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
`district_id` int(11) NOT NULL,
  `district_name` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Nyarugenge'),
(2, 'Gasabo'),
(3, 'Kicukiro'),
(4, 'Nyamagabe'),
(5, 'Nyanza'),
(6, 'Nyaruguru'),
(7, 'Ruhango'),
(8, 'Muhanga'),
(9, 'Kamonyi'),
(10, 'Musanze'),
(11, 'Rwamagana'),
(12, 'Rubavu'),
(13, 'Ngoma'),
(14, 'Ngororero'),
(15, 'Bugesera'),
(16, 'Burera'),
(17, 'Gicumbi'),
(18, 'Karongi'),
(19, 'Rulindo'),
(20, 'Kayonza'),
(21, 'Huye'),
(22, 'Gisagara'),
(23, 'Kirehe'),
(24, 'Gatsibo'),
(25, 'Nyagatare'),
(26, 'Nyabihu'),
(27, 'Rusizi'),
(29, 'Gakenke'),
(30, 'Nyamasheke'),
(31, 'Rutsiro');

-- --------------------------------------------------------

--
-- Table structure for table `dis_marks`
--

CREATE TABLE IF NOT EXISTS `dis_marks` (
`dis_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `marks` int(20) NOT NULL,
  `term_status` varchar(20) NOT NULL,
  `year_dis` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dis_marks`
--

INSERT INTO `dis_marks` (`dis_id`, `s_id`, `marks`, `term_status`, `year_dis`) VALUES
(1, 1, 32, 'term 1', 2),
(2, 2, 23, 'term 1', 2),
(3, 3, 28, 'term 1', 2),
(4, 4, 33, 'term 1', 2),
(5, 1, 32, 'term 2', 2),
(6, 2, 22, 'term 2', 2),
(7, 3, 33, 'term 2', 2),
(8, 4, 23, 'term 2', 2),
(9, 1, 32, 'term 3', 2),
(10, 2, 33, 'term 3', 2),
(11, 3, 22, 'term 3', 2),
(12, 4, 38, 'term 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `itmanager`
--

CREATE TABLE IF NOT EXISTS `itmanager` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `itmanager`
--

INSERT INTO `itmanager` (`id`, `username`, `password`) VALUES
(1, 'it', '150');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
`m_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(20) NOT NULL,
  `cat_marks` float NOT NULL,
  `exams_marks` float NOT NULL,
  `term_stutus` varchar(255) NOT NULL,
  `y_id` int(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_id`, `c_id`, `s_id`, `cat_marks`, `exams_marks`, `term_stutus`, `y_id`) VALUES
(1, 1, 1, 16, 17, 'term 1', 2),
(2, 1, 2, 17, 15, 'term 1', 2),
(3, 1, 3, 11, 13, 'term 1', 2),
(4, 1, 4, 13, 15, 'term 1', 2),
(5, 2, 1, 12, 17, 'term 1', 2),
(6, 2, 2, 18, 17, 'term 1', 2),
(7, 2, 3, 9, 14, 'term 1', 2),
(8, 2, 4, 9, 11, 'term 1', 2),
(9, 4, 1, 11, 13, 'term 1', 2),
(10, 4, 2, 14, 7, 'term 1', 2),
(11, 4, 3, 9, 12, 'term 1', 2),
(12, 4, 4, 14, 7, 'term 1', 2),
(13, 5, 1, 31, 27, 'term 1', 2),
(14, 5, 2, 29, 18, 'term 1', 2),
(15, 5, 3, 29, 20, 'term 1', 2),
(16, 5, 4, 19, 17, 'term 1', 2),
(17, 19, 1, 13, 11, 'term 1', 2),
(18, 19, 2, 4, 4, 'term 1', 2),
(19, 19, 3, 11, 12, 'term 1', 2),
(20, 19, 4, 11, 13, 'term 1', 2),
(21, 6, 1, 32, 31, 'term 1', 2),
(22, 6, 2, 8, 18, 'term 1', 2),
(23, 6, 3, 30, 19, 'term 1', 2),
(24, 6, 4, 30, 14, 'term 1', 2),
(25, 7, 1, 8, 9, 'term 1', 2),
(26, 7, 2, 3, 7, 'term 1', 2),
(27, 7, 3, 4, 7, 'term 1', 2),
(28, 7, 4, 5, 7, 'term 1', 2),
(29, 20, 1, 26, 19, 'term 1', 2),
(30, 20, 2, 18, 15, 'term 1', 2),
(31, 20, 3, 20, 15, 'term 1', 2),
(32, 20, 4, 30, 11, 'term 1', 2),
(33, 1, 1, 20, 14, 'term 2', 2),
(34, 1, 2, 18, 14, 'term 2', 2),
(35, 1, 3, 17, 13, 'term 2', 2),
(36, 1, 4, 14, 16, 'term 2', 2),
(37, 2, 1, 17, 11, 'term 2', 2),
(38, 2, 2, 17, 15, 'term 2', 2),
(39, 2, 3, 11, 12, 'term 2', 2),
(40, 2, 4, 15, 0, 'term 2', 2),
(41, 4, 1, 11, 13, 'term 2', 2),
(42, 4, 2, 11, 9, 'term 2', 2),
(43, 4, 3, 4, 9, 'term 2', 2),
(44, 4, 4, 11, 7, 'term 2', 2),
(45, 5, 1, 30, 30, 'term 2', 2),
(46, 5, 2, 29, 28, 'term 2', 2),
(47, 5, 3, 28, 17, 'term 2', 2),
(48, 5, 4, 18, 22, 'term 2', 2),
(49, 6, 1, 33, 18, 'term 2', 2),
(50, 6, 2, 28, 20, 'term 2', 2),
(51, 6, 3, 29, 22, 'term 2', 2),
(52, 6, 4, 28, 39, 'term 2', 2),
(53, 7, 1, 10, 9, 'term 2', 2),
(54, 7, 2, 4, 7, 'term 2', 2),
(55, 7, 3, 8, 9, 'term 2', 2),
(56, 7, 4, 5, 3, 'term 2', 2),
(57, 19, 1, 11, 13, 'term 2', 2),
(58, 19, 2, 13, 9, 'term 2', 2),
(59, 19, 3, 3, 2, 'term 2', 2),
(60, 19, 4, 6, 14, 'term 2', 2),
(61, 20, 1, 17, 30, 'term 2', 2),
(62, 20, 2, 11, 14, 'term 2', 2),
(63, 20, 3, 17, 22, 'term 2', 2),
(64, 20, 4, 18, 22, 'term 2', 2),
(65, 1, 1, 20, 11, 'term 3', 2),
(66, 1, 2, 17, 15, 'term 3', 2),
(67, 1, 3, 3, 17, 'term 3', 2),
(68, 1, 4, 11, 14, 'term 3', 2),
(69, 2, 1, 17, 13, 'term 3', 2),
(70, 2, 2, 17, 9, 'term 3', 2),
(71, 2, 3, 11, 12, 'term 3', 2),
(72, 2, 4, 14, 3, 'term 3', 2),
(73, 4, 1, 10, 11, 'term 3', 2),
(74, 4, 2, 13, 14, 'term 3', 2),
(75, 4, 3, 3, 13, 'term 3', 2),
(76, 4, 4, 14, 3, 'term 3', 2),
(77, 5, 1, 39, 29, 'term 3', 2),
(78, 5, 2, 28, 28, 'term 3', 2),
(79, 5, 3, 29, 17, 'term 3', 2),
(80, 5, 4, 18, 22, 'term 3', 2),
(81, 6, 1, 29, 33, 'term 3', 2),
(82, 6, 2, 26, 39, 'term 3', 2),
(83, 6, 3, 22, 23, 'term 3', 2),
(84, 6, 4, 22, 39, 'term 3', 2),
(85, 7, 1, 8, 6, 'term 3', 2),
(86, 7, 2, 5, 7, 'term 3', 2),
(87, 7, 3, 5, 6, 'term 3', 2),
(88, 7, 4, 7, 4, 'term 3', 2),
(89, 19, 1, 11, 13, 'term 3', 2),
(90, 19, 2, 11, 9, 'term 3', 2),
(91, 19, 3, 3, 13, 'term 3', 2),
(92, 19, 4, 14, 14, 'term 3', 2),
(93, 20, 1, 29, 30, 'term 3', 2),
(94, 20, 2, 11, 28, 'term 3', 2),
(95, 20, 3, 28, 22, 'term 3', 2),
(96, 20, 4, 28, 16, 'term 3', 2),
(97, 9, 5, 12, 20, 'term 1', 2),
(98, 10, 5, 11, 14, 'term 1', 2),
(99, 11, 5, 8, 9, 'term 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `percentages`
--

CREATE TABLE IF NOT EXISTS `percentages` (
`perid` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `term_status` varchar(30) NOT NULL,
  `y_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `percentages`
--

INSERT INTO `percentages` (`perid`, `student_id`, `percentage`, `term_status`, `y_id`) VALUES
(1, 2, 56, 'term 1', 2),
(2, 2, 65, 'term 2', 2),
(3, 2, 73, 'term 3', 2),
(4, 3, 62, 'term 1', 2),
(5, 3, 59, 'term 2', 2),
(6, 3, 60, 'term 3', 2),
(7, 4, 59, 'term 1', 2),
(8, 4, 63, 'term 2', 2),
(9, 4, 64, 'term 3', 2),
(10, 1, 77, 'term 1', 2),
(11, 1, 76, 'term 2', 2),
(12, 1, 81, 'term 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`place_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `place` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
`place_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `place` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `y_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `student_id`, `percentage`, `place`, `cl_id`, `term_id`, `y_id`) VALUES
(1, 1, 0, 1, 1, 1, 1),
(2, 1, 77.1053, 0, 1, 1, 0),
(3, 1, 77.1053, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reported`
--

CREATE TABLE IF NOT EXISTS `reported` (
`id_rep` int(11) NOT NULL,
  `rep_subject` varchar(100) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `contents` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reported`
--

INSERT INTO `reported` (`id_rep`, `rep_subject`, `reporter_id`, `contents`) VALUES
(8, 'no report found to day ;', 1, 'yes'),
(9, 'this is Emile Whispa', 1, 'guifgkfjh');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`set_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `markset` int(20) NOT NULL,
  `y_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`s_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phones` varchar(255) NOT NULL,
  `fathername` varchar(255) NOT NULL,
  `mathername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `firstname`, `lastname`, `gender`, `DOB`, `location`, `phones`, `fathername`, `mathername`, `email`, `username`, `password`, `cl_id`, `profile`, `status`) VALUES
(1, 'MUCYO TUYISENGE', 'Rene', 'male', '1996-6-10', '8', '+250784494820', 'TUYISENGE', 'SY', 'renemucyo@gmail.com', 'rene', '123', 1, 'IMG_201607212_074258.jpg', 'check'),
(2, 'KWIZERA', 'Emile', 'male', '1998-2-12', '21', '0783434203', 'NDISTE', 'NY', 'emile@mail.com', 'Emile', 'KWIZERA2016', 1, 'IMG_20160820_140043.jpg', 'check'),
(3, 'ABIRU', 'MAJEST', 'male', '1997-7-8', '15', '0777777', 'Bizima', 'nana', 'abiru@mail.com', 'MAJEST', 'ABIRU2016', 1, 'IMG_20160820_142531.jpg', 'check'),
(4, 'DIANE', 'UMUTONIWASE', 'female', '1998-6-13', '27', '+2545544425', 'MARIO', 'nana', 'diggy@mail.com', 'UMUTONIWASE', 'DIANE2016', 1, 'IMG_20160820_142315.jpg', 'check'),
(5, 'Noah', 'Khadafi', 'male', '1999-7-8', '3', '+2349623469', 'Noah', 'da', 'noah@mail.com', 'Khadafi', 'Noah2016', 6, 'IMG_20160820_140459.jpg', 'check'),
(6, 'Zahallah', 'Rusanganwa', 'male', '1997-8-9', '11', '+72374923', 'rusa', 'mare', 'zaha@mail.com', 'Rusanganwa', 'Zahallah2016', 2, 'IMG_20160820_140043.jpg', 'check'),
(7, 'Dely', 'IRADU', 'female', '1999-10-7', '21', '+92837466', 'dea', 'dony', 'del@mail.com', 'IRADU', 'Dely2016', 2, 'IMG_20160820_140039.jpg', 'check');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
`t_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phones` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `firstname`, `lastname`, `gender`, `idnumber`, `location`, `phones`, `qualification`, `email`, `username`, `password`) VALUES
(1, 'Ndizeye', 'Patrick', 'male', '118854447', 'KIGALI', '078855447', 'A0', 'ndi@mail.com', 'ndi', '147'),
(2, 'RUBERANDINDA', 'Pacience', 'male', '125544552', 'MUHANGA', '0755247745', 'A1', 'rubera@mail.com', 'rubera', '123'),
(3, 'Anualite', 'MUKANDAYISENGA', 'female', '144755586', 'GISAGARA', '0788785547', 'A2', 'an@mail.com', 'anua', '150'),
(4, 'NDIDIRIYIMANA', 'Eric', 'male', '2255448', 'KIGALI', '0788544544', 'A0', 'ndidi@mail.com', 'ndidi', '123'),
(5, 'Mucyo', 'Rene', 'male', '554454488', 'MUHANGA', '0784494820', 'A2', 'mucyo@mail.com', 'mucyo', '123'),
(7, 'KAMANA', 'Alex', 'male', '464441556489', 'RWAMAGANA', '+250454484458', 'A1', 'kama@mail.com', 'kama', '148'),
(8, 'UMURUNGI', 'Nicole', 'female', '11558777445', 'kigali', '+2211544545', 'A0', 'murungi@mail.com', 'muru', '147'),
(9, 'kwizera', 'Emile', 'male', '465461321', 'huye', '+2254422221', 'A2', 'kwiemile@mail.com', 'emile', '123'),
(10, 'Noah', 'Khadafi', 'male', '56464451', 'KIGALE', '+5545458885', 'A0', 'noah@gmail.com', 'noah', '150'),
(11, 'Anualite', 'muka', 'female', '488445848', 'kigali', '+2554455411', 'A2', 'anua@mail.com', 'anua', '1885'),
(12, 'RUSANGANWA', 'Zahallah', 'female', '54848518', 'RWAMAGANA', '+00225545454', 'A2', 'rusa@mail.com', 'Zahallah', 'RUSANGANWA16'),
(13, 'VENANT', 'BAN', 'male', '554442448', 'gisagara', '+2255507885511', 'A0', 'vena@vena.com', 'BAN', 'VENANT16'),
(14, 'Buzima', ' Felix', 'male', '556622444552', 'KIGALI', '+555522214', 'A1', 'bu@mail.com', ' Felix', 'Buzima16'),
(15, 'Ntabwoba', 'Felix', 'male', '411155544422', 'gisagara', '+2544411474', 'A2', 'nta@mail.com', 'Felix', 'Ntabwoba16'),
(16, 'BANYANGIRIKI', 'Vencent', 'male', '447788855996', 'KIGALI', '+025441152', 'MASTERS', 'ba@mail.com', 'Vencent', 'BANYANGIRIKI16');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
`term_id` int(11) NOT NULL,
  `term_name` varchar(30) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_name`, `year_id`) VALUES
(3, 'term 1', 2),
(4, 'term 2', 2),
(5, 'term 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dptID` int(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
`y_id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`y_id`, `year`) VALUES
(1, 2014),
(2, 2015);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caurses`
--
ALTER TABLE `caurses`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
 ADD PRIMARY KEY (`cl_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `dean`
--
ALTER TABLE `dean`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
 ADD PRIMARY KEY (`d_dpt`);

--
-- Indexes for table `displine`
--
ALTER TABLE `displine`
 ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `displine_max`
--
ALTER TABLE `displine_max`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
 ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `dis_marks`
--
ALTER TABLE `dis_marks`
 ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `itmanager`
--
ALTER TABLE `itmanager`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
 ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `percentages`
--
ALTER TABLE `percentages`
 ADD PRIMARY KEY (`perid`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
 ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `reported`
--
ALTER TABLE `reported`
 ADD PRIMARY KEY (`id_rep`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
 ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
 ADD PRIMARY KEY (`y_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caurses`
--
ALTER TABLE `caurses`
MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
MODIFY `cl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dean`
--
ALTER TABLE `dean`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
MODIFY `d_dpt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `displine`
--
ALTER TABLE `displine`
MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `displine_max`
--
ALTER TABLE `displine_max`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `dis_marks`
--
ALTER TABLE `dis_marks`
MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `itmanager`
--
ALTER TABLE `itmanager`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `percentages`
--
ALTER TABLE `percentages`
MODIFY `perid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reported`
--
ALTER TABLE `reported`
MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
MODIFY `y_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
