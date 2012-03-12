-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 12 Mar 2012, 11:16
-- Wersja serwera: 5.1.58
-- Wersja PHP: 5.3.10-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `pg`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `id_t` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  KEY `id_t` (`id_t`),
  KEY `id_u` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `status` enum('przyjeto','oczekujacy','wtrakcie','serwis','zakonczony','anulowany') COLLATE utf8_polish_ci DEFAULT NULL,
  `kategoria` enum('kompsala','kompprac','inne','awsiec') COLLATE utf8_polish_ci NOT NULL,
  `pokoj` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data_przy` timestamp NULL DEFAULT NULL,
  `data_real` timestamp NULL DEFAULT NULL,
  `id_zloz` int(11) DEFAULT NULL,
  `info` text COLLATE utf8_polish_ci,
  PRIMARY KEY (`id_t`),
  KEY `id_zloz` (`id_zloz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `klasa` enum('admin','user') COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_polish_ci DEFAULT NULL,
  `pokoj` varchar(10) COLLATE utf8_polish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `klasa`, `imie`, `nazwisko`, `email`, `pokoj`) VALUES
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `login`, `pass`, `klasa`, `imie`, `nazwisko`, `email`, `pokoj`) VALUES
(1, 'anon', 'anon', 'user', NULL, NULL, NULL, NULL);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `ticket` (`id_t`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_zloz`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
