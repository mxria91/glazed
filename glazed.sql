-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Mai 2023 um 01:38
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `glazed`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `user_id` int(255) UNSIGNED NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `user_last_login` datetime DEFAULT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`user_id`, `user_pw`, `user_last_login`, `user_name`) VALUES
(1, '$2y$10$SWDEPcSeCZp.vJBoi6bpseiE8sX/VIhrCJS6V3WQMgArcUYKUjr7m', '2023-05-27 01:31:06', 'mary'),
(2, 'frank123', NULL, 'frank'),
(3, 'michi123', NULL, 'michi');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  `date` varchar(2225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `name`, `img`, `date`, `status`) VALUES
(19, 'Cronuts', 'category-727156162.png', '05-22-2023', '1'),
(20, 'Gefüllt', 'category-1048411907.png', '05-22-2023', '1'),
(21, 'Ungefüllt', 'category-2129292627.png', '05-22-2023', '1'),
(22, 'Specials', 'category-1016036384.png', '05-22-2023', '1');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `quantity`, `unit`, `image`, `description`, `date`, `status`) VALUES
(13, '21', 'Classic Cinnamon', 1.9, 1, 'Stück', 'product-1824052090.png', 'mit Zimtzucker', '2023-05-23', '1'),
(14, '21', 'Classic Sugar', 1.9, 1, 'Stück', 'product-1057942870.png', 'mit Zuckerglasur', '2023-05-23', '1'),
(15, '21', 'Black & White', 1.9, 1, 'Stück', 'product-800721000.png', 'mit Zuckerglasur und Schokolade', '2023-05-23', '1'),
(16, '22', 'Brownie Coffee', 2.4, 1, 'Stück', 'product-296752852.png', 'mit Brownies und Kaffeeglasur', '2023-05-23', '1'),
(17, '22', 'Cookie Dough', 2.4, 1, 'Stück', 'product-1637524223.png', 'mit Caramelstückchen, Popcorn und Schokolade', '2023-05-23', '1'),
(18, '22', 'Raspberry Vanilla', 2.4, 1, 'Stück', 'product-1693917134.png', 'mit Himbeere und Vanillecreme', '2023-05-23', '1'),
(19, '19', 'Blueberry Chocolate ', 2.2, 1, 'Stück', 'product-791213267.png', 'mit Heidelbeeren und Schokolade', '2023-05-25', '1');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
