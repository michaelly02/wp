-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2024 at 09:33 AM
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
  `hikeid` bigint(20) UNSIGNED NOT NULL,
  `hikename` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `distance` double DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hikes`
--

INSERT INTO `hikes` (`hikeid`, `hikename`, `description`, `caption`, `distance`, `level`, `location`, `image`) VALUES
(1, 'Werribee Gorge Circuit Walk', 'Werribee Gorge State Park has a selection of shorter and long loop walks to choose from. All walks are Grade 3, meaning a moderate level of fitness is required, walking on uneven ground with many steps, some rock hopping and steep hill sections involved.', 'Werribee Gorge Circuit Walk', 10, 'Moderate', 'Meikles Point Picnic Area', './images/falls.jpg'),
(2, 'Cliff, Woodland and Quarry Tracks', 'A hiking trail that offers a diverse terrain experience, encompassing rugged cliffs, serene woodland paths, and remnants of old quarries. ', 'Cliff, Woodland and Quarry Tracks', 8.9, 'Moderate', 'Cape Woolamai', './images/capewoolamai.jpg'),
(3, 'Lyrebird Track', 'A tranquil hiking trail renowned for its serene ambiance and natural beauty. Named after the elusive lyrebird, this track meanders through lush forests and verdant valleys.', 'Lyrebird Track', 4.8, 'Easy', 'Upper Ferntree Gully', './images/lyrebird.jpg'),
(4, 'Keppel Lookout Trail', 'Invigorating hiking route renowned for its breathtaking panoramic views and moderate difficulty level. Located in Marysville, this trail winds its way through scenic landscapes, leading hikers to the captivating Keppel Lookout.', 'Keppel Lookout Trail', 11, 'Moderate', 'Marysville', './images/keppellookout.jpg'),
(5, 'The Pinnacle Walk & Lookout', 'A renowned hiking trail nestled in the heart of the Grampians National Park, Australia.', 'The Pinnacle Walk & Lookout', 2.1, 'Easy', 'Grampians', './images/grampians.jpg'),
(6, 'Millers Landing Nature Walk', 'This leisurely hike takes visitors on a tranquil journey through diverse ecosystems, including coastal woodlands, sandy beaches, and wetlands. As hikers meander along the trail, they have the opportunity to observe an array of native wildlife.', 'Millers Landing Nature Walk', 4.3, 'Easy', 'Wilsons Promontory', './images/prom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hikes`
--
ALTER TABLE `hikes`
  MODIFY `hikeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
