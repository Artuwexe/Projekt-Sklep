-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Mar 2022, 11:59
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `suplement`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `opis` varchar(1000) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `TypProduktu` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `procent_marzy` int(11) DEFAULT NULL,
  `ilosc` int(11) DEFAULT NULL,
  `waznosc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`id`, `nazwa`, `opis`, `cena`, `TypProduktu`, `procent_marzy`, `ilosc`, `waznosc`) VALUES
(9, 'Monohydrat', 'Wzmacnia ciało', 35, 'suplementy', 10, 15, '2022-04-02'),
(12, 'Jabłczan Kreatyny', '    Źródło 6 zróżnicowanych form kreatyny     Bezproblemowa rozpuszczalność i wchłanianie     Pozbawiony dodatku węglowodanów, nie zawiera cukrów     Poprawa zdolności wysiłkowych, dzięki zwiększeniu wydolności fizycznej w trakcie intensywnych ćwiczeń (kreatyna)', 378, 'suplementy', 5, 20, '2022-04-10'),
(13, 'XPLODE', 'dobre pomaranczowe', 82, 'suplementy', 5, 10, '2022-04-30'),
(14, 'Baton Gladiator', 'Baton energetyczny', 8, 'baton', 20, 50, '2022-04-10');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
