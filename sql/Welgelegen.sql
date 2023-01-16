-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 16, 2023 at 04:45 PM
-- Server version: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Welgelegen`
--

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `amount_of_visitors` int(11) NOT NULL,
  `booking_date_begin` date NOT NULL,
  `booking_date_end` date NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`id`, `customer_id`, `room_id`, `amount_of_visitors`, `booking_date_begin`, `booking_date_end`, `price`) VALUES
(89, 48, 1, 4, '2023-01-16', '2023-01-20', 120);

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `postal_code` varchar(6) NOT NULL,
  `streetname` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `postal_code`, `streetname`, `residence`, `house_number`) VALUES
(48, 'Sebastiaan', 'Vliet', 'sebastiaan.van.vliet@hotmail.nl', '0613997325', '1688CD', '', '', '117'),
(49, 'Sebastiaan', 'Vliet', 'ninapruim1@gmail.com', '0613997325', '1688CD', 'dorpsstaat', 'Nibbixwoud', '117'),
(50, 'SW', 'Vliet', 'ditkanaal70j@outlook.com', '0613997325', '1688CD', 'Dorpsstaat', 'Nibbixwoud', '117'),
(51, 'Sebastiaan', 'Vliet', 'test@test.nl', '0613997325', '1688CD', 'dorpsstaat', 'Nibbixwoud', '117'),
(52, 'Sebastiaan', 'Vliet', 'anderemail@gmail.nl', '0613997325', '1688CD', 'dorpsstaat', 'Nibbixwoud', '117'),
(53, 'Lars', 'Hartendorp', 'Larshartendorp@gmail.com', '0613997325', '1688CD', 'dorpsstaat', 'Nibbixwoud', '117');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `capacity` int(5) NOT NULL,
  `description` varchar(8000) NOT NULL,
  `price_per_night` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`id`, `room_name`, `capacity`, `description`, `price_per_night`) VALUES
(1, 'De Logeerkamer', 2, 'Onze standaard kamer met een geweldig uitzicht en de, naar mijn mening, mooiste badkamer', 30),
(2, 'De Kerker', 5, 'De spannendste kamer van heel Noord-Holland...', 75),
(3, 'De Suite', 2, 'Deze kamer maakt jouw verblijf helemaal compleet!', 50);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`username`, `password`) VALUES
('admin', '$2y$10$CDaUuk0bMKWO4ghO4.1lPO/.Hm9Qlzy9U8HdfEeRn8Uk4O.05WK7u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `Room`
--
ALTER TABLE `Room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`id`),
  ADD CONSTRAINT `Booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `Room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
