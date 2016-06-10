-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2015 at 06:12 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `course_title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `course_title`) VALUES
(1, 'CS5900', 'Advanced Software Engineering'),
(2, 'CS5400', 'Advanced Operating Systems'),
(3, 'CS5100', 'Compiler Design & Construction'),
(4, 'CS6100', 'Android App Developement'),
(5, 'CS6200', 'Advanced Database Management Systems'),
(6, 'CS5810', 'Internet Programming'),
(7, 'CS7100', 'Server Side Programming'),
(8, 'CS7300', 'Computer Organization'),
(9, 'CS7500', 'Network Security'),
(10, 'CS7510', 'Client Side Programming'),
(11, 'CS7600', 'Advanced Application Development using Java'),
(12, 'CS8200', 'Distributed Systems'),
(13, 'CS6300', 'Design & Development of Algorithms'),
(14, 'CS6400', 'Cloud Computing'),
(15, 'CS6500', 'Network Architecture');

-- --------------------------------------------------------

--
-- Table structure for table `courses_enrolled`
--

CREATE TABLE IF NOT EXISTS `courses_enrolled` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_enrolled`
--

INSERT INTO `courses_enrolled` (`id`, `sid`, `cid`, `classid`, `status`) VALUES
(11, 1, 1, 3, 1),
(14, 1, 9, 9, 1),
(17, 3, 2, 1, 1),
(19, 2, 3, 2, 0),
(25, 3, 9, 9, 0),
(27, 12, 10, 11, 1),
(28, 12, 1, 3, 0),
(30, 1, 10, 11, 0),
(31, 1, 6, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_classes`
--

CREATE TABLE IF NOT EXISTS `course_classes` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `classroom` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `class_strength` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_classes`
--

INSERT INTO `course_classes` (`id`, `cid`, `classroom`, `day`, `time`, `instructor`, `semester`, `class_strength`) VALUES
(1, 3, 'CS125', 'R', '08:30', 'Floyd Barber', 's2016', 0),
(2, 1, 'CS125', 'F', '18:00', 'Ziyuan Meng', 'f2015', 0),
(3, 2, 'CS130', 'M', '10:30', 'Bo Lee', 's2016', 2),
(4, 6, 'CS140', 'T', '13:00', 'Henry  Patrick', 's2016', 0),
(5, 1, 'CS126', 'T', '15:30', 'Jay Wilson', 'f2015', 0),
(6, 4, 'CS130', 'W', '16:30', 'Austin Ames', 'f2015', 0),
(7, 5, 'CS125', 'R', '14:00', 'Jay Wilson', 'f2015', 0),
(8, 3, 'CS126', 'F', '14:00', 'Tianyang Wang', 'f2015', 0),
(9, 9, 'CS130', 'S', '17:30', 'Wilston Brown', 'f2015', 0),
(10, 11, 'CS140', 'T', '12:00', 'Ziyuan Meng', 'f2015', 0),
(11, 8, 'CS145', 'R', '14:00', 'Wilston Brown', 'f2015', 0),
(12, 12, 'CS145', 'M', '09:30', 'Wilston Brown', 'f2015', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `role`, `email`, `location`) VALUES
(1, 'saisthota', 'Sai Sandeep', 'Thota', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', 'thota.s.sundeep@gmail.com', 'Warrensburg, MO'),
(2, 'pavan', 'Pavan Kumar', 'Gudapati', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', 'pavankumargudapati5@gmail.com', 'Lees Summit, MO'),
(3, 'sannihitha', 'Sannihitha', 'Tummala', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', 'sannihithatummala@gmail.com', 'Lee''s Summit, MO'),
(4, 'james', 'James', 'Lawson', '5f4dcc3b5aa765d61d8327deb882cf99', 'registrar', 'james_lawson@hotmail.com', 'Kansas City, MO'),
(5, 'louis', 'Louis', 'Phillip', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 'luis@ucmo.edu', 'Warrensburg, MO'),
(6, 'zmeng', 'Ziyuan', 'Meng', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'zmeng@ucmo.edu', 'Lee''s Summit, MO'),
(7, 'patrick', 'Henry ', 'Patrick', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'hpatrick@ucmo.edu', 'Warrensburg, MO'),
(8, 'jay', 'Jay', 'Wilson', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'jwilson@ucmo.edu', 'Kansas City, MO'),
(9, 'flyod', 'Flyod', 'Barber', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'flyod@ucmo.edu', 'Warresnburg, MO'),
(10, 'max', 'Max', 'Johnson', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'max@ucmo.edu', 'Lee''s Summit, MO'),
(11, 'austin', 'Austin', 'Ames', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'austin@ucmo.edu', 'Kansas City, MO'),
(12, 'dnag', 'Dallas', 'Nageswara Rao', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', 'dnag@ucmo.edu', 'Warresnburg, MO'),
(13, 'wilston', 'Wilston', 'Brown', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'wilson@ucmo.edu', 'Warrensburg, MO'),
(14, 'twang', 'Tianyang', 'Wang', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'twang@ucmo.edu', 'Warrensburg, MO'),
(15, 'blee', 'Bo', 'Lee', '5f4dcc3b5aa765d61d8327deb882cf99', 'instructor', 'blee@ucmo.edu', 'Warrensburg, MO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_enrolled`
--
ALTER TABLE `courses_enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_classes`
--
ALTER TABLE `course_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `courses_enrolled`
--
ALTER TABLE `courses_enrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `course_classes`
--
ALTER TABLE `course_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
