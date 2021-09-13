-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 04:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_02`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `customer_phone` varchar(44) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_username` varchar(55) NOT NULL,
  `customer_password` varchar(55) NOT NULL,
  `customer_age` int(55) NOT NULL,
  `customer_gender` enum('male','female') NOT NULL,
  `customer_created_at` datetime NOT NULL,
  `customer_update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_username`, `customer_password`, `customer_age`, `customer_gender`, `customer_created_at`, `customer_update_at`) VALUES
(2, 'sajib', '01745705857', 'sajibsaha320@gmail.com', 'sahasajib', '$2y$10$f1WYBZMIkIUVqvoL6Ul5ou8GaHdi66NpoqBFKIM5EY9aalq9', 23, 'male', '2021-05-31 08:30:49', '2021-06-10 14:05:46'),
(6, 'sajib', '01745705857', 'sajibsaha320@gmail.com', 'sahasajib', '$2y$10$idIulgXYTo5FdOCVYMpsTehNW.P3ugHTszdmreQfKURr5JgW', 23, 'male', '2021-05-31 09:38:34', '2021-05-31 07:38:34'),
(7, 'sajib', '01745705857', 'sajibsaha320@gmail.com', 'sahasajib', '$2y$10$5npJDHH8ohXCHgyGpBBlT.dEKTRwJNnvEU/UM/WBn0eOZ37k', 23, 'male', '2021-05-31 09:39:26', '2021-05-31 07:39:26'),
(17, 'sajib', '01745705857', 'sajibsaha320@gmail.com', 'sahasajib', '$2y$10$18RK74D0nyh6CLPcEXH3eeZAyaQjLAqebG5kL.5znAjRToAF', 23, 'male', '2021-06-10 06:48:28', '2021-06-10 04:48:28'),
(20, 'ayan', '017123456', 'ayan@gmail.com', 'ayan', '$2y$10$afREe7gb4GUB/uEJbPIOiOlVmHJcPW3MCTzTLjQQ3Jv8hJKI', 22, 'male', '2021-06-10 16:15:51', '2021-06-10 14:15:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
