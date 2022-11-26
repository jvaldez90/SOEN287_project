-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2022 at 01:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SOEN287`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade_records`
--

CREATE TABLE `grade_records` (
  `id` int(2) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Assignment 1` float DEFAULT NULL,
  `Assignment 2` float DEFAULT NULL,
  `Assignment 3` float DEFAULT NULL,
  `Midterm` float DEFAULT NULL,
  `Final Exam` float DEFAULT NULL,
  `Final Grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_records`
--

INSERT INTO `grade_records` (`id`, `Name`, `Assignment 1`, `Assignment 2`, `Assignment 3`, `Midterm`, `Final Exam`, `Final Grade`) VALUES
(1, 'Barry Allen', 75, 80, 63, 67, 73, NULL),
(2, 'Oliver Queen', 65, 74, 82, 63, 87, NULL),
(3, 'Kara Danvers', 62, 73, 88, 92, 78, NULL),
(4, 'Jerfferson Pierce', 65, 88, 95, 73, 61, NULL),
(5, 'Bruce Wayne', 77, 80, 96, 95, 66, NULL),
(6, 'Lena Luther', 78, 82, 72, 64, 75, NULL),
(7, 'Felicity Smoak', 98, 88, 78, 72, 95, NULL),
(8, 'John Diggle', 67, 73, 65, 59, 60, NULL),
(9, 'Caitlin Snow', 67, 76, 88, 55, 87, NULL),
(10, 'Cisco Ramon', 77, 72, 75, 79, 71, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade_records`
--
ALTER TABLE `grade_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade_records`
--
ALTER TABLE `grade_records`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
