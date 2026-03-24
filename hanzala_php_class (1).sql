-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 11:15 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hanzala_php_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollment`
--

CREATE TABLE IF NOT EXISTS `course_enrollment` (
`id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_enrollment`
--

INSERT INTO `course_enrollment` (`id`, `course_name`, `student_id`, `teacher_id`, `time`, `date`) VALUES
(1, 'Web Development', 22, 3, '2026-03-01 19:30:29', '2026-02-26'),
(2, 'Web Development', 20, 4, '2026-02-26 20:25:29', '2026-02-27'),
(4, 'Business Management', 19, 2, '2026-02-26 21:40:05', '2025-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parent_contact` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`, `parent_contact`, `date`) VALUES
(17, 'Hanzala Shahzad', 'hanzalashahzad9898@gmail.com', '1236666', 'Bahria Town', '0032158', '2025-08-09'),
(18, 'Riyyan', 'Riyyan123@gmail.com', '0312345678', 'Faisal Town phase #1', '0096534548', '2023-02-22'),
(19, 'Taha', 'taha78@gmail.com', '031655213', 'Raya', '003218956', '2024-08-09'),
(20, 'Zain', 'Zain@yahoo.com', '12332156', 'Azizi Tower', '05054214', '2026-02-10'),
(21, 'Omer', 'omer@hotmail.com', '050578958', 'Riyadh, KSA', '053259647', '2026-02-11'),
(22, 'Ismail', 'ismail@gmail.com', '056842789', 'raya', '2589631', '2021-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `degree_level` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `degree_level`, `qualification`, `date`) VALUES
(2, 'Haris Rauf', 'haris@gmail.com', '456895275', 'Master', 'CS', '2020-11-02'),
(3, 'Shaheen Shah', 'sheenu@gamil.com', '032589745', 'Bachelor', 'Engineer', '2023-08-08'),
(4, 'Amir', 'amir852@gmail.com', '56987123', 'Certification', 'Aws', '2024-10-03'),
(5, 'Mohib Khan', 'mohibkhan94@gmail.com', '65321895', 'Master', 'Information Technology', '2024-11-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
