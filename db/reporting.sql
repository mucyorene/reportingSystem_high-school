-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2016 at 04:18 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(50) NOT NULL,
  `acronym` varchar(50) NOT NULL,
  `maximum` int(50) NOT NULL,
  `t_id` int(50) NOT NULL,
  `d_id` int(50) NOT NULL,
  `cl_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(20, 'c++', 'c++', 60, 2, 1, 1),
(21, 'Timber', 'TMB', 120, 9, 3, 17),
(22, 'Intro to comp', 'Comp', 40, 2, 1, 20),
(23, 'INTO TO WEB ', 'WEB', 40, 1, 1, 20),
(24, 'Francais', 'fr', 10, 8, 1, 20),
(25, 'English', 'Eng', 20, 13, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(200) NOT NULL,
  `d_dpt` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`cl_id`, `classname`, `d_dpt`, `year_id`) VALUES
(1, 'S6CSC', 1, 2),
(2, 'S6CEL', 2, 2),
(3, 'S6CAP', 3, 2),
(4, 'S6ELEC', 5, 2),
(5, 'S6PWO', 6, 2),
(6, 'S5CSC', 1, 2),
(7, 'S5 PWO', 6, 2),
(8, 'S5CAP', 3, 2),
(9, 'S5ELEC', 5, 1),
(10, 'S5CEL', 2, 2),
(11, 'S6CST', 4, 2),
(14, 'S4CTR', 4, 2),
(15, 'S4ELEC', 5, 2),
(16, 'S4CEL', 2, 2),
(17, 'S4CAP', 3, 2),
(19, 'S6CTR', 7, 1),
(20, 'S4CSC', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `commenter_id` int(11) NOT NULL,
  `contents` varchar(500) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `commenter_id`, `contents`) VALUES
(7, 1, 'Already to test'),
(8, 1, 'enter your own '' this is the comment from Emile Whis'),
(9, 1, 'real friends'),
(10, 2, 'Test emile'),
(11, 3, 'This one is abiru'),
(12, 8, 'Where is my report please???'),
(13, 1, 'why not print????'),
(14, 1, 'your print work properly good and congruturation');

-- --------------------------------------------------------

--
-- Table structure for table `dean`
--

CREATE TABLE IF NOT EXISTS `dean` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `schoolname` varchar(255) NOT NULL,
  `logos` varchar(255) NOT NULL,
  `schoollocation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dean`
--

INSERT INTO `dean` (`id`, `firstname`, `lastname`, `gender`, `idnumber`, `location`, `phones`, `qualification`, `email`, `username`, `password`, `schoolname`, `logos`, `schoollocation`) VALUES
(1, 'MUCYO', 'Rene', 'male', 2147483647, 'Muhanga', '0784494820', 'A0', 'renemucyo@gmail.com', 'musa', '123', 'ECOLE TECHNIQUE SAINT KIZITO', 'log.jpg', '22');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `d_dpt` int(11) NOT NULL AUTO_INCREMENT,
  `dpt_name` varchar(255) NOT NULL,
  `acronym` varchar(20) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`d_dpt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`d_dpt`, `dpt_name`, `acronym`, `year_id`) VALUES
(1, 'computer science', 'CSC', 2),
(2, 'Computer electronics', 'CEL', 2),
(3, 'Capentry', 'CAP', 2),
(5, 'Electricity', 'ELEC', 2),
(6, 'Public Work', 'PWO', 2),
(7, 'construction', 'CST', 2);

-- --------------------------------------------------------

--
-- Table structure for table `displine`
--

CREATE TABLE IF NOT EXISTS `displine` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `displine`
--

INSERT INTO `displine` (`d_id`, `firstname`, `lastname`, `gender`, `idnumber`, `location`, `phones`, `qualification`, `email`, `username`, `password`) VALUES
(1, 'Mario', 'Barotteli', 'male', 45, '8', '0784494820', 'A0', 'rene.mucyo@yahoo.com', 'mario', '123');

-- --------------------------------------------------------

--
-- Table structure for table `displine_max`
--

CREATE TABLE IF NOT EXISTS `displine_max` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displine_max` int(11) NOT NULL,
  `y_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `displine_max`
--

INSERT INTO `displine_max` (`id`, `displine_max`, `y_id`) VALUES
(1, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(200) NOT NULL,
  PRIMARY KEY (`district_id`)
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
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `marks` int(20) NOT NULL,
  `term_status` varchar(20) NOT NULL,
  `year_dis` int(11) NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `itmanager`
--

CREATE TABLE IF NOT EXISTS `itmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
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
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) NOT NULL,
  `s_id` int(20) NOT NULL,
  `cat_marks` float NOT NULL,
  `exams_marks` float NOT NULL,
  `term_stutus` varchar(255) NOT NULL,
  `y_id` int(15) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`m_id`, `c_id`, `s_id`, `cat_marks`, `exams_marks`, `term_stutus`, `y_id`) VALUES
(1, 8, 6, 26, 22, 'term 1', 2),
(2, 8, 7, 28, 22, 'term 1', 2),
(3, 8, 9, 24, 19, 'term 1', 2),
(4, 8, 10, 25, 22, 'term 1', 2),
(5, 8, 11, 20, 19, 'term 1', 2),
(6, 8, 12, 14, 20, 'term 1', 2),
(7, 8, 13, 11, 24, 'term 1', 2),
(8, 15, 6, 24, 22, 'term 1', 2),
(9, 15, 7, 21, 19, 'term 1', 2),
(10, 15, 9, 20, 16, 'term 1', 2),
(11, 15, 10, 19, 22, 'term 1', 2),
(12, 15, 11, 24, 20, 'term 1', 2),
(13, 15, 12, 19, 12, 'term 1', 2),
(14, 15, 13, 14, 11, 'term 1', 2),
(15, 17, 6, 12, 11, 'term 1', 2),
(16, 17, 7, 14, 11, 'term 1', 2),
(17, 17, 9, 15, 12, 'term 1', 2),
(18, 17, 10, 9, 8, 'term 1', 2),
(19, 17, 11, 10, 14, 'term 1', 2),
(20, 17, 12, 12, 14, 'term 1', 2),
(21, 17, 13, 11, 15, 'term 1', 2),
(22, 18, 6, 33, 35, 'term 1', 2),
(23, 18, 7, 33, 29, 'term 1', 2),
(24, 18, 9, 24, 33, 'term 1', 2),
(25, 18, 10, 25, 33, 'term 1', 2),
(26, 18, 11, 28, 34, 'term 1', 2),
(27, 18, 12, 22, 28, 'term 1', 2),
(28, 18, 13, 29, 32, 'term 1', 2),
(29, 16, 6, 16, 11, 'term 1', 2),
(30, 16, 7, 14, 16, 'term 1', 2),
(31, 16, 9, 20, 14, 'term 1', 2),
(32, 16, 10, 20, 11, 'term 1', 2),
(33, 16, 11, 14, 19, 'term 1', 2),
(34, 16, 12, 13, 17, 'term 1', 2),
(35, 16, 13, 19, 16, 'term 1', 2),
(36, 22, 16, 16, 11, 'term 2', 2),
(37, 22, 17, 14, 15, 'term 2', 2),
(38, 23, 16, 14, 15, 'term 2', 2),
(39, 23, 17, 11, 14, 'term 2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `percentages`
--

CREATE TABLE IF NOT EXISTS `percentages` (
  `perid` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `term_status` varchar(30) NOT NULL,
  `y_id` int(11) NOT NULL,
  PRIMARY KEY (`perid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `percentages`
--

INSERT INTO `percentages` (`perid`, `student_id`, `percentage`, `term_status`, `y_id`) VALUES
(1, 6, 66, 'term 1', 2),
(2, 7, 63, 'term 1', 2),
(3, 9, 58, 'term 1', 2),
(4, 10, 58, 'term 1', 2),
(5, 11, 60, 'term 1', 2),
(6, 12, 50, 'term 1', 2),
(7, 13, 53, 'term 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `place` float NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `place` int(11) NOT NULL,
  `cl_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `y_id` int(11) NOT NULL,
  PRIMARY KEY (`place_id`)
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
  `id_rep` int(11) NOT NULL AUTO_INCREMENT,
  `rep_subject` varchar(100) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `times` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rep`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `reported`
--

INSERT INTO `reported` (`id_rep`, `rep_subject`, `reporter_id`, `contents`, `times`) VALUES
(8, 'no report found to day ;', 1, 'yes', '2016-09-11 06:42:05'),
(9, 'this is Emile Whispa', 1, 'guifgkfjh', '2016-09-11 06:42:05'),
(10, 'I have no report', 3, 'dia leaders i have no report', '2016-09-11 06:42:05'),
(12, 'test', 1, 'once test time stamp', '2016-09-11 06:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `settingid` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `markset` int(20) NOT NULL,
  `y_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`settingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingid`, `s_id`, `markset`, `y_id`, `c_id`) VALUES
(1, 16, 59, 2, 0),
(2, 17, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `firstname`, `lastname`, `gender`, `DOB`, `location`, `phones`, `fathername`, `mathername`, `email`, `username`, `password`, `cl_id`, `profile`, `status`) VALUES
(1, 'MUCYO', 'Rene', 'male', '1996-6-10', '1', '+250784494820', 'TUYISENGE', 'SY', 'renemucyo@gmail.com', 'rene', '123', 1, 'betterone.jpg', 'checked'),
(2, 'KWIZERA', 'Emile', 'male', '1998-2-12', '21', '0783434203', 'NDISTE', 'NY', 'emile@mail.com', 'Emile', 'KWIZERA2016', 1, 'IMG_20160905_170940.jpg', 'check'),
(3, 'ABIRU', 'MAJEST', 'male', '2002-7-15', '1', '0788554775', 'Bizima', 'nana', 'abiru@mail.com', 'MAJEST', 'ABIRU2016', 1, 'Desert.jpg', 'checked'),
(4, 'DIANE', 'UMUTONIWASE', 'female', '1998-6-13', '27', '+2545544425', 'MARIO', 'nana', 'diggy@mail.com', 'UMUTONIWASE', 'DIANE2016', 1, 'Chella.jpg', 'checked'),
(5, 'Noah', 'Khadafi', 'male', '1999-7-8', '3', '+2349623469', 'Noah', 'da', 'noah@mail.com', 'Khadafi', 'Noah2016', 6, 'nn.jpg', 'checked'),
(6, 'Zahallah', 'Rusanganwa', 'male', '1997-8-9', '11', '+72374923', 'rusa', 'mare', 'zaha@mail.com', 'Rusanganwa', 'Zahallah2016', 2, 'B.boy.jpg', 'checked'),
(7, 'Dely', 'IRADU', 'female', '1999-10-7', '21', '+92837466', 'dea', 'dony', 'del@mail.com', 'IRADU', 'Dely2016', 2, 'IMG_20160905_170617.jpg', 'checked'),
(8, 'KANANI', 'Evaliste', 'male', '1985-3-5', '1', '0583045083', 'kanamugire', 'marthe', 'rere@mail.com', 'Evaliste', 'KANANI2016', 6, 'picture000.jpg', 'checked'),
(9, 'KUNDWA', 'KAY', 'male', '1997-5-9', '8', '039939388', 'Bizimana', 'Marthe', 'kay@mail.com', 'KAY', 'KUNDWA2016', 2, 'IMG_20160905_170738.jpg', 'checked'),
(10, 'Khadafi', 'MUKIMBILI', 'male', '1998-4-5', '11', '099388888', 'Noah', 'Muka', 'ka@mail.com', 'MUKIMBILI', 'Khadafi2016', 2, 'rwanda.jpg', 'check'),
(11, 'Rusanganwa', 'zaha', 'female', '1999-3-4', '7', '039939388', 'rusa', 'mere', 'rusa@mail.com', 'zaha', 'Rusanganwa2016', 2, 'Jellyfish.jpg', 'check'),
(12, 'NSHUTI', 'Sandra', 'female', '1999-8-10', '3', '0782211233', 'NSHUTI', 'MA', 'sa@mail.com', 'Sandra', 'NSHUTI2016', 2, 'Coutinho.png', 'checked'),
(13, 'NIYONGABO ', 'Florien', 'male', '1993-12-14', '10', '0784882545', 'NH', 'MK', 'waka@mail.co', 'Florien', 'NIYONGABO 2016', 2, 'IMG_20160905_170633.jpg', 'checked'),
(15, 'UMURUNGI', 'Nicole', 'male', '1999-7-7', '3', '0784425488', 'Nigra', 'muk', 'nick@1.com', 'nicole', '123', 13, 'Desert.jpg', 'checked'),
(16, 'TUYIZERE', 'Esther', 'female', '1999-4-5', '9', '0784487558', 'tuyise', 'tuy', 'tu@f.co', 'Esther', 'TUYIZERE2016', 20, 'IMG_20160905_170608.jpg', 'check'),
(17, 'Divine', 'Ikirezi', 'female', '1997-4-4', '27', '0788555447', 'nd', 'kk', 'f@1.co', 'Ikirezi', 'Divine2016', 20, 'IMG_20160905_170731.jpg', 'checked'),
(18, 'MUSINGA', 'Honore', 'male', '2000-8-9', '14', '0788555447', 'jkkll', 'kkk', 'ma@mail.com', 'Honore', 'MUSINGA2016', 19, '', 'check'),
(19, 'Rene', 'Mucyo', 'male', '2012-3-2', '5', '0789958887', 'MUCYO', 'nana', 'abiru@mail.com', 'Mucyo', 'Rene2016', 3, 'fastedit.jpg', 'check');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phones` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(16, 'BANYANGIRIKI', 'Vencent', 'male', '447788855996', 'KIGALI', '+025441152', 'MASTERS', 'ba@mail.com', 'Vencent', 'BANYANGIRIKI16'),
(17, 'BIZIMANA', 'Didier', 'male', '8328392329', '8', '0786688787', 'A1', 'kay@mail.com', 'Didier', 'BIZIMANA16'),
(18, 'TWAHIRWA', 'Richard', 'male', '8394839434', '5', '0786688787', 'A1', 'kd@mail.com', 'Richard', 'TWAHIRWA16'),
(19, 'NIYONGABO ', 'Florien', 'male', '8328392329', '15', '0786688787', 'A1', 'kay@mail.com', 'Florien', 'NIYONGABO 16'),
(20, 'Kangabe', 'Carine', 'female', '1194545454542154', '8', '0784454588', '12554511145', '12@1.com', 'Carine', 'Kangabe16'),
(21, 'Kangabe', 'Rene', 'female', '1194545154542154', '3', '0785787844', '', '1@m.com', 'Rene', 'Kangabe16'),
(22, 'Test', 'Testla', 'male', '1194578788874645', '5', '0788447755', 'A0', 'm@1.c', 'Testla', 'Test16');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_name` varchar(30) NOT NULL,
  `year_id` int(11) NOT NULL,
  PRIMARY KEY (`term_id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dptID` int(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `yearperce`
--

CREATE TABLE IF NOT EXISTS `yearperce` (
  `pery_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `ypercentages` int(11) NOT NULL,
  `y_id` int(11) NOT NULL,
  PRIMARY KEY (`pery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `y_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`y_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`y_id`, `year`) VALUES
(1, 2014),
(2, 2015),
(3, 2016),
(4, 2017),
(5, 2018),
(6, 2019);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
