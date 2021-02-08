-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2021 at 01:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `author` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `subject`, `body`, `author`, `modified`) VALUES
(1, 'First test', 'This text is inserted for the first time.', 2, '2021-01-08 11:30:13'),
(2, 'This is the second subject', 'Testing the second body contents for the program', 3, '2021-01-21 13:00:06'),
(3, 'Australia Blog', 'An amazing blog article for the australian campaign was one of my remarkable part of my life. I wonder the people see the articles and really wanted to post the comments for the artile.', 1, '2021-01-29 07:59:33'),
(4, 'Thailand article', 'Supposing I was not back within the week, that time will be more memorable.', 1, '2021-01-29 08:03:29'),
(5, 'Ultimate view:', 'A day out on last Saturday was one of the mesmerizing one.', 7, '2021-01-29 09:36:37'),
(6, 'Syanjya', 'I was with my family for a ride to the Syanjya from Pokhara. It was sunny when we start for a ride but when we are near at Naudanda then it starts to rain.', 7, '2021-01-29 09:05:53'),
(7, 'Japan Vibes', 'I came here in December for Masters in KCGI.', 5, '2021-01-29 10:10:32'),
(8, 'Zebra', 'Zebra, any of three species of strikingly black-and-white striped mammals of the horse family Equidae (genus Equus)', 3, '2021-01-29 10:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userID` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `password`, `name`) VALUES
(1, '201', 'needham', 'peter'),
(2, '202', 'tabuchi', 'tabuchi'),
(3, '203', 'pariyar', 'arjun'),
(4, '204', 'thapa', 'sudham'),
(5, '205', 'sunar', 'prakash'),
(6, '206', 'limbu', 'suman'),
(7, '207', 'sewa', 'alisha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
