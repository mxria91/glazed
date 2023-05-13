-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Mai 2023 um 13:15
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
(1, '$2y$10$SWDEPcSeCZp.vJBoi6bpseiE8sX/VIhrCJS6V3WQMgArcUYKUjr7m', '2023-05-13 12:59:04', 'mary'),
(2, 'frank123', NULL, 'frank'),
(3, 'michi123', NULL, 'michi');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items_classic`
--

CREATE TABLE `items_classic` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(190) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_date` date DEFAULT NULL COMMENT 'Erfassungsdatum vom Produkt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `items_special`
--

CREATE TABLE `items_special` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(190) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_date` date DEFAULT NULL COMMENT 'Erfassungsdatum vom Produkt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indizes für die Tabelle `items_classic`
--
ALTER TABLE `items_classic`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indizes für die Tabelle `items_special`
--
ALTER TABLE `items_special`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `items_classic`
--
ALTER TABLE `items_classic`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `items_special`
--
ALTER TABLE `items_special`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
