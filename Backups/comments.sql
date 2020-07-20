-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 09:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `EnglishComment` varchar(255) NOT NULL,
  `KhmerComment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `EnglishComment`, `KhmerComment`) VALUES
(1, 'has performed exceptionally online.', ''),
(2, 'has performed well online.', ''),
(3, 'has performed well but needs to improve attendance.', ''),
(4, 'has attended all classes; however could put in more effort into their work.', ''),
(5, 'regulary turns in incomplete work.', ''),
(6, 'completes the required work, but often incorrectly.', ''),
(7, 'completes the required work, but often misses deadlines.', ''),
(8, 'is a polite and respectful student.', ''),
(9, 'is performing adequately, but needs to ask the teacher more questions.', ''),
(10, 'rarely attends classes and rarely completes the required lessons.', ''),
(11, 'never attends classes and never completes any of the required tasks.', ''),
(12, 'joined online classes late but has made a lot of progress.', ''),
(13, 'has made a lot of progress.', ''),
(14, 'has made little progress.', ''),
(15, 'has struggled to complete the required amount of work.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
