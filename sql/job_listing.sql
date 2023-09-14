-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2023 at 02:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_listing`
--

CREATE TABLE `job_listing` (
  `id` int(10) NOT NULL,
  `company` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `position` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `postedAt` date NOT NULL DEFAULT current_timestamp(),
  `contract` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `languages` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tools` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_listing`
--

INSERT INTO `job_listing` (`id`, `company`, `logo`, `featured`, `position`, `role`, `level`, `postedAt`, `contract`, `location`, `languages`, `tools`) VALUES
(16, 'Photosnap', 'images/photosnap.svg', 1, 'Senior Frontend Developer', 'Frontend', 'Senior', '2023-07-09', 'Full Time', 'USA Only', 'HTML CSS JavaScript', ''),
(17, 'Manage', 'images/manage.svg', 1, 'Fullstack Developer', 'Fullstack', 'Midweight', '2023-06-28', 'Part Time', 'Remote', 'Python', 'React'),
(18, 'Account', 'images/account.svg', 0, 'Junior Frontend Developer', 'Frontend', 'Junior', '2023-06-27', 'Part Time', 'USA Only', 'JavaScript', 'React Sass'),
(19, 'MyHome', 'images/myhome.svg', 0, 'Junior Frontend Developer', 'Frontend', 'Junior', '2023-06-24', 'Contract', 'USA Only', 'CSS JavaScript', ''),
(20, 'Loop Studios', 'images/loop-studios.svg', 0, 'Software Engineer', 'Fullstack', 'Midweight', '2023-06-21', 'Full Time', 'Worldwide', 'JavaScript', 'Ruby Sass'),
(21, 'FaceIt', 'images/faceit.svg', 0, 'Junior Backend Developer', 'Backend', 'Junior', '2023-05-26', 'Full Time', 'UK Only', 'Ruby', 'RoR'),
(22, 'Shortly', 'images/shortly.svg', 0, 'Junior Developer', 'Frontend', 'Junior', '2023-05-26', 'Full Time', 'Worldwide', 'HTML JavaScript', 'Sass'),
(23, 'Insure', 'images/insure.svg', 0, 'Junior Frontend Developer', 'Frontend', 'Junior', '2023-05-26', 'Full Time', 'USA Only', 'JavaScript', 'Vue Sass'),
(24, 'Eyecam Co.', 'images/eyecam-co.svg', 0, 'Full Stack Engineer', 'Fullstack', 'Midweight', '2023-05-19', 'Full Time', 'Worldwide', 'JavaScript Python', 'Django'),
(25, 'The Air Filter Company', 'images/the-air-filter-company.svg', 0, 'Front-end Dev', 'Frontend', 'Junior', '2023-05-09', 'Part Time', 'Worldwide', 'JavaScript', 'React Sass'),
(31, 'Creditsmart', 'images/industry-all-02.png', 1, 'Senior Backend Developer', 'Backend', 'Senior', '2023-07-12', 'Full Time', 'Greece', 'Python', 'Django');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_listing`
--
ALTER TABLE `job_listing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_listing`
--
ALTER TABLE `job_listing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
