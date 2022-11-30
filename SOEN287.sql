-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2022 at 04:08 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `user_id` int(8) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `is_faculty` tinyint(1) NOT NULL,
  `is_student` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `password`, `is_faculty`, `is_student`) VALUES
(1, 28712345, 'Ra\'s Al Ghul', 'alghul@gmail.com', 'lazarus pit', 1, 0),
(2, 28712346, 'Joe West', 'joewest@centralcitypd.com', 'ccpd detective', 1, 0),
(3, 28712347, 'John Jones', 'johnjones@mars.com', 'martian manhunter', 1, 0),
(4, 12340001, 'Barry Allen', 'barryallen@starlabs.com', 'i am the flash', 0, 1),
(5, 12340002, 'Oliver Queen', 'oliverqueen@gradesite.com', 'i am the green arrow', 0, 1),
(6, 12340003, 'Kara Danvers', 'karazor-el@catco.com', 'i am supergirl', 0, 1),
(7, 12340004, 'Jefferson Pierce', 'blacklightning@gradesite.com', 'the future is here', 0, 1),
(8, 12340005, 'Bruce Wayne', 'bwayne@wayneenterprises.com', 'i am batman', 0, 1),
(9, 12340006, 'Lena Luther', 'lenaluther@lcorp.com', 'i am a luther', 0, 1),
(10, 12340007, 'Felicity Smoak', 'fsmoak@smaokindustries.com', 'i am overwatch', 0, 1),
(11, 12340008, 'John Diggle', 'johndiggle@gradesite.com', 'i am spartan', 0, 1),
(12, 12340009, 'Caitlin Snow', 'caitlinsnow@starlabs.com', 'i am killer frost', 0, 1),
(13, 12340010, 'Cisco Ramon', 'ciscoramon@starlabs.com', 'i am mecavibe', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade_records`
--
ALTER TABLE `grade_records`
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
-- AUTO_INCREMENT for table `grade_records`
--
ALTER TABLE `grade_records`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;