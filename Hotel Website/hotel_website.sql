-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `user_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `arrival` date NOT NULL,
  `leaving` date NOT NULL,
  `guest_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`user_id`, `hotel_id`, `arrival`, `leaving`, `guest_number`) VALUES
(2, 1, '2023-12-09', '2023-12-23', 0),
(2, 1, '2023-12-29', '2023-12-30', 0),
(2, 1, '2023-12-21', '2023-12-29', 0),
(2, 1, '2023-12-23', '2023-12-29', 1),
(2, 1, '2023-12-22', '2023-12-29', 1),
(2, 1, '2023-12-22', '2023-12-30', 1),
(2, 1, '2023-12-15', '2023-12-28', 1),
(2, 1, '2023-12-15', '2023-12-24', 1),
(2, 5, '2023-12-21', '2023-12-29', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `destination_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `available_space` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `destination_name`, `description`, `price`, `available_space`, `image_path`) VALUES
(1, 'Budapest', 'Welcome to Budapest: The Majesty of the Danube and Cultural Richness.', 94, 24, 'p-1.jpg'),
(2, 'Italy', 'Italy is a beautiful country in Southern Europe, known for its rich history, culture and excellent gastronomy.', 100, 13, 'p-2.jpg'),
(3, 'London', 'It is a city that combines rich history, modernity and cultural diversity.', 179, 2, 'p-3.jpg'),
(4, 'turkey', 'Turkey is a unique country that combines a rich history,and offers visitors incredible opportunities for travel and discovery.', 68, 0, 'p-4.jpeg'),
(5, 'morocco', 'Morocco is a place where historical and cultural influences mix, including Arab, Berber and European influences.', 77, 41, 'p-5.jpg'),
(6, 'laos', 'Laos is a place where influences from different cultures meet, including Hinduism, Buddhism and French colonial heritage.', 85, 5, 'p-6.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `email`, `password`, `first_name`, `last_name`) VALUES
(2, 's@gmail.com', '7c6a180b36896a0a8c02787eeafb0e4c', 'bla', 'bla'),
(7, 'a@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 'a', 'a'),
(8, 'm@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 'Mark', 'Marl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD KEY `user_connection` (`user_id`),
  ADD KEY `hotel_connection` (`hotel_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `hotel_connection` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_connection` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
