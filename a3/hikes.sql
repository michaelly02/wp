-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2024 at 04:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hikesvictoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `hikes`
--

CREATE TABLE `hikes` (
  `hikeid` int(11) NOT NULL,
  `hikename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `distance` double NOT NULL,
  `location` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hikes`
--

INSERT INTO `hikes` (`hikeid`, `hikename`, `description`, `image`, `caption`, `distance`, `location`, `level`, `username`) VALUES
(1, 'Werribee Gorge Circuit Walk', 'Werribee Gorge State Park has a selection of shorter and long loop walks to choose from. All walks are Grade 3, meaning a moderate level of fitness is required, walking on uneven ground with many steps, some rock hopping and steep hill sections involved.', './images/falls.jpg', 'Werribee Gorge Circuit Walk', 10, 'Meikles Point Picnic Area', 'Moderate', NULL),
(2, 'Cliff, Woodland and Quarry Tracks', 'A hiking trail that offers a diverse terrain experience, encompassing rugged cliffs, serene woodland paths, and remnants of old quarries.', './images/capewoolamai.jpg', 'Cliff, Woodland and Quarry Tracks', 8.9, 'Cape Woolamai', 'Moderate', NULL),
(3, 'Lyrebird Track', 'A tranquil hiking trail renowned for its serene ambiance and natural beauty. Named after the elusive lyrebird, this track meanders through lush forests and verdant valleys.', './images/lyrebird.jpg', 'Lyrebird Track', 4.8, 'Upper Ferntree Gully', 'Easy', NULL),
(4, 'Keppel Lookout Trail', 'Invigorating hiking route renowned for its breathtaking panoramic views and moderate difficulty level. Located in Marysville, this trail winds its way through scenic landscapes, leading hikers to the captivating Keppel Lookout.', './images/keppellookout.jpg', 'Keppel Lookout Trail', 11, 'Marysville', 'Moderate', NULL),
(5, 'The Pinnacle Walk & Lookout', 'A renowned hiking trail nestled in the heart of the Grampians National Park, Australia.', './images/grampians.jpg', 'The Pinnacle Walk & Lookout', 2.1, 'Grampians', 'Easy', NULL),
(6, 'Millers Landing Nature Walk', 'This leisurely hike takes visitors on a tranquil journey through diverse ecosystems, including coastal woodlands, sandy beaches, and wetlands. As hikers meander along the trail, they have the opportunity to observe an array of native wildlife.', './images/prom.jpg', 'Millers Landing Nature Walk', 4.3, 'Wilsons Promontory', 'Easy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hikes`
--
ALTER TABLE `hikes`
  ADD PRIMARY KEY (`hikeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `hikeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
