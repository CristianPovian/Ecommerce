-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 04, 2021 la 08:28 AM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `pink friday`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `main_id` int(11) NOT NULL,
  `discount_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `discount`
--

INSERT INTO `discount` (`discount_id`, `main_id`, `discount_percent`) VALUES
(1, 1, 10),
(2, 3, 20),
(3, 4, 14),
(4, 5, 80),
(5, 7, 69);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `units_sold` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `image`, `description`, `units_sold`, `category`) VALUES
(1, 'Bonsai Tree', 450, 'bonsai.jpg', 'A Bonsai tree is a replication of nature, in the form of a miniature tree, without displaying the human intervention too clearly.', 0, 'tree'),
(2, 'Lettuce Seeds', 45, 'lettuce.jpg', 'Lettuce is most often used for salads, although it is also seen in other kinds of food, such as soups, sandwiches and wraps; it can also be grilled.', 2, 'seeds'),
(3, 'Moth Orchids', 100, 'orchidee.jpg', 'Phalaenopsis Blume, commonly known as moth orchids, is a genus of about seventy species of plants in the family Orchidaceae.', 5, 'flower'),
(4, 'Men\'s premium Garden Clogs - Black', 25, 'shoes.jpg', 'Traditional styling and quality construction make this one of best gardening clogs you can buy. Keep a pair ready at the backdoor for all your errands and work.', 20, 'clothing'),
(5, 'Steel rake', 25, 'rake.jpg', 'Used for scarifying lawns and removing unwanted growth. The tines are oil treated to give extra strength.', 1, 'tool'),
(6, 'Gravel', 10, 'gravel.jpg', 'We carry a huge inventory of gravel that lets you finish any project you’re working on, from walkways and woodland patios to driveways and French drains.', NULL, 'tool'),
(7, 'Rose Bouquet Gift', 200, 'rose.jpeg', 'Rose Bouquet gift for loved ones, made with real Swarovski diamonds.', NULL, 'gift'),
(8, 'Christmas tree', 60, 'tree.jpg', 'Christmas tree, an evergreen tree, often a pine or a fir, decorated with lights and ornaments as a part of Christmas festivities.', NULL, 'tree'),
(25, 'Babakaja', 23, 'babakaja.jpg', 'BABAK ESZIK ESZT', 0, 'food');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `exp_month` varchar(255) DEFAULT NULL,
  `exp_year` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `order_cost` double(255,2) DEFAULT NULL,
  `order_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `full_name`, `email`, `phone`, `address`, `country`, `city`, `zip`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`, `order_cost`, `order_info`) VALUES
(1, 2, 'Orosz Kelemen', 'kelemen.orosz99@e-uvt.ro', '0771714920', 'Str. Semenic nr. 6 ap. 10', 'Timis', 'Timisoara', '300038', 'PITYIRI PALKO', '0000 0000 0000 0000', '01', '02', '000', 865.50, '[{\"cart_id\": \"12\", \"item_id\": \"1\", \"user_id\": \"2\", \"quantity\": \"2\"}]'),
(3, 2, 'Orosz Kelemen', 'kelemen.orosz99@e-uvt.ro', '0771714920', 'Str. Semenic nr. 6 ap. 10', '', '', '', '', '', '', '', '', 236.55, '[{\"cart_id\": \"13\", \"item_id\": \"5\", \"user_id\": \"2\", \"quantity\": \"2\"}, {\"cart_id\": \"14\", \"item_id\": \"4\", \"user_id\": \"2\", \"quantity\": \"4\"}, {\"cart_id\": \"21\", \"item_id\": \"25\", \"user_id\": \"2\", \"quantity\": \"5\"}]'),
(4, 2, 'Orosz Kelemen', 'kelemen.orosz99@e-uvt.ro', '0771714920', 'Str. Semenic nr. 6 ap. 10', 'nibbaty', 'nibbatown', '696969', 'daspdoaspda', '56969', '45/65', '1999', '420', 1101.75, '[{\"cart_id\":\"22\",\"user_id\":\"2\",\"item_id\":\"25\",\"quantity\":\"45\"}]');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `phone`, `address`, `pass`, `email`) VALUES
(2, 'kelemen', 'Orosz Kelemen', '0771714920', 'Str. Semenic nr. 6 ap. 10', 'orosz', 'kelemen.orosz99@e-uvt.ro');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexuri pentru tabele `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `main_id` (`main_id`);

--
-- Indexuri pentru tabele `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pentru tabele `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constrângeri pentru tabele `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`main_id`) REFERENCES `item` (`id`);

--
-- Constrângeri pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
