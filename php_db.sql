-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 08:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `q_id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `tid` varchar(255) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`q_id`, `assignment_name`, `tid`, `class`, `Address`) VALUES
(1, 'Chemistry', 'ssd', 12, 'Experiment 1.docx'),
(2, 'REDA', 'ssd', 12, 'a.html');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classid` int(10) NOT NULL,
  `classteacher` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classid`, `classteacher`) VALUES
(11, 'akag'),
(8, 'ays'),
(9, 'gau'),
(12, 'rht'),
(10, 'ssd');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(50) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `uid`, `password`, `subject`) VALUES
('Akshay', 'akag', 'akag', 'Physics'),
('Ayush', 'ays', 'ays', 'English'),
('Gaurav', 'gau', 'gau', 'Computer'),
('Rohit', 'rht', 'rht', 'History'),
('Suysh', 'ssd', 'ssd', 'chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `id` varchar(10) NOT NULL,
  `class` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`password`, `name`, `id`, `class`) VALUES
('100', 'A', '100', 8),
('102', 'B', '102', 8),
('104', 'C', '104', 8),
('200', 'D', '200', 9),
('202', 'E', '202', 9),
('204', 'F', '204', 9),
('300', 'G', '300', 10),
('302', 'H', '302', 10),
('304', 'I', '304', 10),
('400', 'J', '400', 11),
('402', 'K', '402', 11),
('404', 'L', '404', 11),
('500', 'M', '500', 12),
('502', 'N', '502', 12),
('504', 'O', '504', 12),
('506', 'P', '506', 12);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `assignment_name` varchar(255) DEFAULT NULL,
  `question_id` int(225) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `sid`, `assignment_name`, `question_id`, `class`, `Address`) VALUES
(1, '500', 'My submission', 2, 12, 'DemoServlet.java');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `tid` (`tid`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classid`),
  ADD KEY `classteacher` (`classteacher`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `srno` (`sid`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `class` (`class`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `faculty` (`uid`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`class`) REFERENCES `class` (`classid`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`classteacher`) REFERENCES `faculty` (`uid`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`classid`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `assignments` (`q_id`),
  ADD CONSTRAINT `submission_ibfk_3` FOREIGN KEY (`class`) REFERENCES `class` (`classid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
