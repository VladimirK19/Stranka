-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Sun 02.Jún 2024, 13:49
-- Verzia serveru: 10.4.27-MariaDB
-- Verzia PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `databaza`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`) VALUES
(30, 'a', '0208447362', 'ad@fn.sk', 'adad');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `glasses`
--

CREATE TABLE `glasses` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `glasses`
--

INSERT INTO `glasses` (`id`, `image`, `name`, `price`) VALUES
(1, 'images/glass4.png', 'Obrazok 4', '55'),
(2, 'images/glass1.png', 'obrazok1', '50'),
(3, 'images/glass2.png', 'Obrazok 2', '60'),
(4, 'images/glass3.png', 'Obrazok 3', '20'),
(5, 'images/glass5.png', 'Obrazok5', '37'),
(40, 'images/glass6.png', 'Okuliare 6', '205'),
(43, 'images/glass8.png', 'glasses 10', '49');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `glasses`
--
ALTER TABLE `glasses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pre tabuľku `glasses`
--
ALTER TABLE `glasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
