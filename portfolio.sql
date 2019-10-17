-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2019 at 09:23 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Camping kits'),
(2, 'Backpacking kits'),
(3, 'Camera kits');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_details` text NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_included` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `item_name`, `item_details`, `item_price`, `item_quantity`, `item_included`) VALUES
(1, 1, 'Camping kits For 1~2 people', 'This complete camping rental kit has everything two people need for an incredible camping trip! Whether it is for a weekend in the Appalachians or a month long grand-tour of the Western National Parks, this kit has more clean, comfortable gear than anywhere else. Only Mountain Side includes this much incredible camping gear in one rental kit. Why a rent a camping kit? The most popular rental at Mountain Side has been the camping kit as it contains everything you need.\r\nFor families, couples or friends that are travelling or own little to no camping gear, our kit rentals are the easiest and fastest way to get outdoors.', 150, 5, '2 Person Mountainsmith Tent with Rain Fly (dimensions: 92″x56″ and 43″ tall in the center) <br>\r\n2 Sleeping Bags of Your Choice for Temperate or Cool nights <br>\r\n2 Big Agnes Air Core or Insulated Air Core Sleeping Pads <br>\r\nTwo-burner camp stove <br>\r\nGSI Bugaboo Base Camp Cooking Gear set<br>\r\n1 Cooking utensil set <br>\r\n1 coffee pot <br>\r\n1 LED camp lantern <br>\r\n1 Tent stake mallet with extra stakes <br>\r\n1 Mountainsmith “The Sixer” Cooler with bottle opener <br>\r\n1 Box waterproof matches <br>\r\n1 50′ Paracord (rope) <br>\r\n1 Military-style can opener <br>\r\n1 Fire-starter stick set <br>\r\n1 Coghlan’s Camping Guide <br>\r\n1 Biodegradable camp soap'),
(2, 1, 'Camping kits For 3~5 people', 'This complete camping rental kit has everything two people need for an incredible camping trip! Whether it is for a weekend in the Appalachians or a month long grand-tour of the Western National Parks, this kit has more clean, comfortable gear than anywhere else. Only Mountain Side includes this much incredible camping gear in one rental kit. Why a rent a camping kit? The most popular rental at Mountain Side has been the camping kit as it contains everything you need.\r\nFor families, couples or friends that are travelling or own little to no camping gear, our kit rentals are the easiest and fastest way to get outdoors.', 200, 5, '2 Person Mountainsmith Tent with Rain Fly (dimensions: 92″x56″ and 43″ tall in the center)\r\n2 Sleeping Bags of Your Choice for Temperate or Cool nights\r\n2 Big Agnes Air Core or Insulated Air Core Sleeping Pads\r\nTwo-burner camp stove\r\nGSI Bugaboo Base Camp Cooking Gear set\r\n1 Cooking utensil set\r\n1 coffee pot\r\n1 LED camp lantern\r\n1 Tent stake mallet with extra stakes\r\n1 Mountainsmith “The Sixer” Cooler with bottle opener\r\n1 Box waterproof matches\r\n1 50′ Paracord (rope)\r\n1 Military-style can opener\r\n1 Fire-starter stick set\r\n1 Coghlan’s Camping Guide\r\n1 Biodegradable camp soap');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `retal_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rental_items`
--

CREATE TABLE `rental_items` (
  `rental_item_id` int(11) NOT NULL,
  `retal_id` int(11) NOT NULL,
  `rental_item_quantity` int(11) NOT NULL,
  `rental_item_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_card_no` int(11) NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_address`, `user_card_no`, `user_role`) VALUES
(1, 'saki', 'isoya', 'nekodarake2503@docomo.ne.jp', '', 'japan', 123456789, 'user'),
(2, 'saki', 'isoya', 'nakodarake2503@gmail.com', '00001', 'japan', 123456789, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`);

--
-- Indexes for table `rental_items`
--
ALTER TABLE `rental_items`
  ADD PRIMARY KEY (`rental_item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rental_items`
--
ALTER TABLE `rental_items`
  MODIFY `rental_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
