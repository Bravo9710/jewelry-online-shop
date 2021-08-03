-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 юли 2021 в 18:39
-- Версия на сървъра: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_jewellery_store`
--

-- --------------------------------------------------------

--
-- Структура на таблица `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `category`
--

INSERT INTO `category` (`id`, `Name`) VALUES
(3, 'Bracelets'),
(4, 'Earings'),
(1, 'Necklaces'),
(2, 'Rings');

-- --------------------------------------------------------

--
-- Структура на таблица `colors`
--

CREATE TABLE `colors` (
  `id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `colors`
--

INSERT INTO `colors` (`id`, `Name`) VALUES
(1, 'Gold'),
(2, 'Silver');

-- --------------------------------------------------------

--
-- Структура на таблица `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `purchase_item_id` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `products`
--

CREATE TABLE `products` (
  `id` int(13) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Category_id` int(5) NOT NULL,
  `Price` int(5) NOT NULL,
  `Color_id` int(5) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `products`
--

INSERT INTO `products` (`id`, `Name`, `Category_id`, `Price`, `Color_id`, `Image`, `Description`) VALUES
(1, 'Alta Textured Chain Necklace', 1, 38, 2, 'assets/images/necklace 1-gold.jpg', 'An everyday chain textured to catch the light. Wear alone or stack up with your favourites. 49 solid links, adjustable up to 45cm'),
(2, 'Nura Pearl Triple Beaded Necklace', 1, 48, 1, 'assets/images/necklace 2-gold.jpg', 'A Triple Beaded Necklace, where you can change the pearl everyday. Adjustable to 40cm');

-- --------------------------------------------------------

--
-- Структура на таблица `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(13) NOT NULL,
  `firstname` varchar(32) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `address`) VALUES
(1, 'Венцислав Венков', 'asd', 'wenci_97_08@abv.bg', '$2y$10$WWWZTSoyg10RR7HEKyb9LeY', 'В. Левски 11'),
(2, 'Yordan', 'Enchev', 'danchopatkana@sss.com', '$2y$10$LdBnUD32mb22bpOHmRHkA.9', 'ul. \"V. Levski\" 11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `purchase_item_id` (`purchase_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Category_id` (`Category_id`),
  ADD KEY `Color_id` (`Color_id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`Color_id`);

--
-- Ограничения за таблица `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
