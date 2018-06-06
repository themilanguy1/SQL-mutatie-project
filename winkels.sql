-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 04 jun 2018 om 11:52
-- Serverversie: 10.1.29-MariaDB
-- PHP-versie: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winkels`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stad`
--

CREATE TABLE `stad` (
  `stad_id` int(11) NOT NULL,
  `stad_naam` varchar(20) NOT NULL,
  `populatie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `stad`
--

INSERT INTO `stad` (`stad_id`, `stad_naam`, `populatie`) VALUES
(48, 'Rotterdam', 25000005),
(49, 'Amsterdam', 2351229),
(50, 'Milaan', 2500000),
(51, 'Apeldoorn', 55500);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stad_winkel`
--

CREATE TABLE `stad_winkel` (
  `aantal_id` int(255) NOT NULL,
  `stad_id` int(255) NOT NULL,
  `winkel_afkorting` varchar(255) NOT NULL,
  `aantal_filialen` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `stad_winkel`
--

INSERT INTO `stad_winkel` (`aantal_id`, `stad_id`, `winkel_afkorting`, `aantal_filialen`) VALUES
(13, 48, 'bh', 3),
(16, 48, 'ah', 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkel`
--

CREATE TABLE `winkel` (
  `winkel_id` int(255) NOT NULL,
  `winkel_afkorting` varchar(2) NOT NULL,
  `winkel_naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `winkel`
--

INSERT INTO `winkel` (`winkel_id`, `winkel_afkorting`, `winkel_naam`) VALUES
(1, 'ah', 'Albert Heijn'),
(2, 'bh', 'Bas van der Heijden'),
(3, 'co', 'Coop'),
(4, 'ht', 'Hans Textiel'),
(10, 'ju', 'Jumbo');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `stad`
--
ALTER TABLE `stad`
  ADD PRIMARY KEY (`stad_id`),
  ADD UNIQUE KEY `stad_id` (`stad_id`);

--
-- Indexen voor tabel `stad_winkel`
--
ALTER TABLE `stad_winkel`
  ADD PRIMARY KEY (`aantal_id`);

--
-- Indexen voor tabel `winkel`
--
ALTER TABLE `winkel`
  ADD PRIMARY KEY (`winkel_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `stad`
--
ALTER TABLE `stad`
  MODIFY `stad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT voor een tabel `stad_winkel`
--
ALTER TABLE `stad_winkel`
  MODIFY `aantal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `winkel`
--
ALTER TABLE `winkel`
  MODIFY `winkel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
