-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2019 at 08:20 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`, `status`) VALUES
(1, 'admin', 'admin', '2019-06-13 16:54:17', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `title` varchar(111) NOT NULL,
  `code` varchar(111) NOT NULL,
  `unit` int(11) NOT NULL,
  `level` varchar(111) NOT NULL,
  `semester` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `studentid`, `title`, `code`, `unit`, `level`, `semester`, `date`, `status`) VALUES
(1, 1, 'computer light', 'com114', 3, 'nd1', 'first', '2019-06-13 15:22:42', '0'),
(2, 1, 'computer graphics ', 'com 112', 2, 'nd1', '', '2019-06-13 21:07:22', '0'),
(3, 1, 'computer logic', 'com 115', 3, 'nd1', '', '2019-06-13 21:07:28', '0'),
(4, 1, 'computer file', 'com200', 3, 'nd1', '', '2019-06-13 21:07:32', '0'),
(5, 1, 'computer file', 'com200', 3, 'nd1', '', '2019-06-13 21:07:14', '0'),
(6, 1, 'computer file', 'com200', 3, 'nd1', '', '2019-06-13 21:07:07', '0'),
(7, 1, 'computer boll', 'com 117', 2, 'nd1', 'first', '2019-06-13 21:06:49', '0');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `officer` int(11) NOT NULL,
  `matric` varchar(111) NOT NULL,
  `level` varchar(222) NOT NULL,
  `course_code` varchar(211) NOT NULL,
  `course_title` varchar(211) NOT NULL,
  `semester` varchar(111) NOT NULL,
  `course_unit` int(11) NOT NULL,
  `exam_score` int(11) NOT NULL,
  `test_score` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `officer`, `matric`, `level`, `course_code`, `course_title`, `semester`, `course_unit`, `exam_score`, `test_score`, `total`, `date`, `status`) VALUES
(1, 2, '15/69/0002', 'nd1', 'com123', 'Computer light', 'first', 3, 55, 29, 84, '2019-06-13 15:46:45', '0'),
(2, 1, '15/69/0002', 'first', 'com 112', 'computer graphics ', '', 3, 27, 0, 27, '2019-06-13 21:47:08', '0'),
(3, 1, '15/69/0002', 'first', 'com 112', 'computer graphics ', '', 3, 27, 0, 27, '2019-06-13 21:48:52', '0'),
(4, 1, '15/69/0002', 'nd1', 'com 115', 'computer logic', 'first', 0, 27, 0, 27, '2019-06-13 21:49:30', '0'),
(5, 1, '15/69/0002', 'nd1', 'com 115', 'computer logic', 'first', 0, 27, 0, 27, '2019-06-13 21:50:27', '0'),
(6, 1, '15/69/0002', 'nd1', 'com200', 'computer file', 'first', 3, 67, 21, 88, '2019-06-13 21:51:06', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(222) NOT NULL,
  `matric` varchar(111) NOT NULL,
  `password` varchar(211) NOT NULL,
  `level` varchar(111) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `matric`, `password`, `level`, `date`, `status`) VALUES
(1, 'all mind ', '15/69/0002', 'eeeee', 'nd1', '2019-06-13 13:56:08', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
