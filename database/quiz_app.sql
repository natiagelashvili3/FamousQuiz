-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 08:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'manager', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `correct` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `title`, `correct`) VALUES
(1, 1, '2005', 0),
(2, 1, '2008', 1),
(3, 1, '2011', 0),
(4, 1, '2003', 0),
(5, 2, 'Hulk', 1),
(6, 2, 'Hawkeye', 0),
(7, 2, 'Iron man', 0),
(8, 2, 'Black Panther', 0),
(9, 3, 'Wakanda', 1),
(10, 3, 'Latveria', 0),
(11, 3, 'Genosha', 0),
(12, 4, 'Avengers Assemble', 0),
(13, 4, 'The Incredible Hulk', 0),
(14, 4, 'Iron Man 2', 1),
(15, 4, 'Guardians of the galaxy', 0),
(16, 5, 'Sam Wilson', 1),
(17, 5, 'Elijah Bradley', 0),
(18, 5, 'Alexander Pierce', 0),
(19, 6, 'South America', 0),
(20, 6, 'Africa', 1),
(21, 6, 'Asia', 0),
(22, 6, 'Australia', 0),
(23, 7, 'Scott Lang', 1),
(24, 7, 'Howard Stark', 0),
(25, 7, 'Peter Quill', 0),
(26, 8, 'Maria Hill', 0),
(27, 8, 'Nick Fury', 0),
(28, 8, 'Agent Coulson', 1),
(29, 8, 'Black Panther', 0),
(30, 9, 'The Incredible Hulk', 0),
(31, 9, 'The Thor', 0),
(32, 9, 'Iron Man', 1),
(33, 9, 'Guardians of the Galaxy', 0),
(34, 10, 'Kryptonite', 0),
(35, 10, 'Omnium steel', 0),
(36, 10, 'Vibranium', 1),
(37, 10, 'Adamantium', 0),
(38, 11, 'Mjolnir', 1),
(39, 11, 'Norn', 0),
(40, 11, 'Agamotto', 0),
(41, 11, 'Balder', 0),
(42, 12, NULL, 1),
(43, 13, NULL, 1),
(44, 14, NULL, 1),
(45, 15, NULL, 0),
(46, 16, NULL, 0),
(47, 17, NULL, 1),
(48, 18, NULL, 0),
(49, 19, NULL, 1),
(50, 20, NULL, 1),
(51, 21, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1-binary, 2-multiple',
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type`, `title`) VALUES
(1, 2, 'What year was the first Iron Man movie released, kicking off the Marvel Cinematic Universe?'),
(2, 2, 'Which Avenger does Thor team up with in Thor: Ragnarok?'),
(3, 2, 'In which fictional country is Black Panther set?'),
(4, 2, 'In which film did Black Widow first appear?'),
(5, 2, 'What is the Falcon’s real name?'),
(6, 2, 'Where is Wakanda Located?'),
(7, 2, 'What is Ant Man’s real name?'),
(8, 2, 'Who is killed by Loki in Avengers Assemble?'),
(9, 2, 'Which is the first movie released in the Marvel Cinematic Universe?'),
(10, 2, 'What is Captain America\'s shield made of?'),
(11, 2, 'What is the name of Thor\'s hammer?'),
(12, 1, 'Dick Van Dyke played in \"Mary Poppins\"?'),
(13, 1, 'Is there a pencil type named Ticonderoga No. 2 pencil?'),
(14, 1, 'Albert Einstein failed every subject in school that wasn\'t math or physics.'),
(15, 1, 'NASCAR engines burn 115-octane leaded gasoline.'),
(16, 1, 'Sucralose is natural.'),
(17, 1, 'Olive Garden is an iconic French restaurant.'),
(18, 1, 'Franklin Roosevelt is on Mount Rushmore.'),
(19, 1, 'Alcoholic beverages are divided into three classes.'),
(20, 1, 'Bill Gates is the founder of Microsoft.'),
(21, 1, 'Tea has more caffeine than soda and coffee.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
