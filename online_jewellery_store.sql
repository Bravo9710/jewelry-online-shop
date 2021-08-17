-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 авг 2021 в 20:36
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
-- Структура на таблица `admin`
--

CREATE TABLE `admin` (
  `admin` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `admin`
--

INSERT INTO `admin` (`admin`, `admin_password`) VALUES
('admin', '$2y$10$1xV8PqHRJRS1BTrYZCrbXOcYAnTyfwO1SRSlD1mceYv4V0iM6cJGe');

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
  `Colors` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `products`
--

INSERT INTO `products` (`id`, `Name`, `Category_id`, `Price`, `Colors`, `Image`, `Description`) VALUES
(1, 'Alta Textured Chain Necklace', 1, 38, 'Gold, Silver', 'necklace 1-gold.jpg, necklace 1-silver', 'An everyday chain textured to catch the light. Wear alone or stack up with your favourites. 49 solid links, adjustable up to 45cm'),
(2, 'Nura Pearl Triple Beaded Necklace', 1, 48, '1', 'necklace 2-gold.jpg', 'A Triple Beaded Necklace, where you can change the pearl everyday. Adjustable to 40cm'),
(3, 'Ziggy Mini Petal Necklace', 1, 50, '2', 'necklace 3-silver.jpg', 'An HQ favourite. Plus you can personalise with an engraving.'),
(4, 'Alta Pearl Necklace', 1, 49, '2', 'necklace 4-gold.jpg', 'One of our bestsellers. 18ct gold-plated'),
(5, 'Talisman Pendant Necklace', 1, 39, '2', 'necklace 5-gold.jpg', 'The talismanic heart burst and engravable back keeps love and positivity close to you every day. Paired with our best selling chain.'),
(6, 'Locket and Curb Chain Necklace', 1, 99, '2', 'necklace 6-gold.jpg', 'Inspired by ancient wisdom and treasured talismans. The Deia Locket Pendant looks so great teamed with our Curb Chain Necklace, we made it official.'),
(7, 'Riva Diamond Pendant Charm Necklace', 1, 77, '2', 'necklace 7-silver.jpg', 'An elegant necklace set with diamonds for a touch of everyday sparkle.'),
(8, 'Deia Moonstone Pendant and Groove Curb Chain', 1, 59, '2', 'necklace 8-gold.jpg', 'More than a chunky chain. We designed the clasp on our Curb Chain Necklace so you can add a pendant. '),
(9, 'Alta Textured Chain Bracelet', 3, 49, '2', 'bracelet 1-gold.jpg', 'An everyday chain textured to catch the light. Wear alone or stack up with your favourites.'),
(10, 'Doina Fine Chain Bracelet', 3, 79, '2', 'bracelet 2 -gold.jpg', 'Vintage-inspired, tactile, woven chains with incredible texture. Wear in multiples for an elegant stacked look or add charms to personalise.'),
(11, 'Linear Chain Bracelet', 3, 59, '2', 'bracelet 3-gold.jpg', 'An everyday staple, designed with a slider that glides over the chain to fit you perfectly. Wear alone or stack with your favourite bracelets. Plus, you can personalise with engraving, so makes the perfect gift.'),
(12, 'Doina Wide Chain Bracelet', 3, 39, '2', 'bracelet 4-gold.jpg', 'Vintage-inspired, thick woven Italian chains that drape fluidly over the wrist. Stack with Alta chain for a modern heirloom look or add a pendant to personalise. Or add to the Doina Torq for a stunning statement.'),
(13, 'Nura Cross Over Ring', 2, 79, '2', 'ring 1-gold.jpg', 'A pre-stacked statement ring. This makes everyday bold gold easy to achieve. So easy you\'ll want one for every finger'),
(14, 'Deia Domed Ring', 2, 39, '2', 'ring 2-gold.jpg', 'A sure stacking favourite. Wear alone, or stack up for double the fun. A collection that celebrates independence and individuality. Deia means goddess.'),
(15, 'Siren Stacking Ring', 2, 69, '2', 'ring 3-gold.jpg', 'One of our bestsellers (and it isn\'t hard to see why). Hand cut gemstones mean this ring is slightly different each time, but gorgeous 100 percent of the time. Wear alone or add to your ring stack.'),
(16, 'Riva Mini Kite Stacking Ring', 2, 89, '2', 'ring 4-gold.jpg', 'Precious ring with white diamond, only for connoisseurs.'),
(17, 'Doina Pearl and Huggie Earrings Set', 4, 89, '2', 'earings 1-gold.jpg', 'Our new favourite huggie and our best selling Baroque pearl. Doina collection comes in organic certified cotton pouch to support sustainability via minimal packaging.'),
(18, 'Siren Mini Nugget Hoop Earrings', 4, 99, '2', 'earings 2-gold.jpg', 'One of our best selling gemstones (and it isn\'t hard to see why). Hand cut gemstones mean these huggies are slightly different each time, but gorgeous 100 percent of the time. Wear alone or add to a stack.'),
(19, 'Corda Huggie Earrings', 4, 59, '2', 'earings 3-gold.jpg', 'Inspired by ropes, our textured Corda Huggie Earrings are the perfect way to add a twist to your ear stack.'),
(20, 'Siren Muse Mini Drop Huggie Earrings', 4, 79, '2', 'earings 4-gold.jpg', 'Newness for your ear stack. A delicate drop huggie with subtly hammered surfaces that radiate light. This is Siren Muse.');

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
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `address`) VALUES
(1, 'Венцислав Венков', 'asd', 'wenci_97_08@abv.bg', '$2y$10$WWWZTSoyg10RR7HEKyb9LeY', 'В. Левски 11'),
(9, 'Yordan', 'Enchev', 'dani.1998@abv.bg', '$2y$10$HZX8Jtgn/cuvK/xXHheIFOniz1Tbk2kFqyRsv3vcMIPpdyZ.9pMVu', 'ul. \"Chaika\" 2'),
(10, 'Encho', 'Enchev', 'encho.enchev@abv.bg', '$2y$10$1J4uywtRKwzQ6dv4vWWmMuWJK4s6rh//ljHtNNJ/MBBvDgXzPYFmK', 'ul. \"Chaika\" 2'),
(11, 'asds', 'asds', 'asd@asd', '$2y$10$tjLPvbY08WqeZKXUdHwzJelltxPlJWtL2pp7ixn8yNHi7PSclw4Ea', 'asd'),
(12, '111', '111', '111@asd', '$2y$10$1xV8PqHRJRS1BTrYZCrbXOcYAnTyfwO1SRSlD1mceYv4V0iM6cJGe', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`);

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
  ADD KEY `Category_id` (`Category_id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
