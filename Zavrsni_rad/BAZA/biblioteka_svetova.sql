-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 06:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka_svetova`
--

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id` int(11) NOT NULL,
  `pisac_id` int(11) NOT NULL,
  `knjiga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `slika` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id`, `pisac_id`, `knjiga`, `cena`, `slika`, `opis`) VALUES
(1, 1, 'Igra prestola', 650, 'igra_prestola.jpg', 'Zima dolazi. To su reči kuće Stark iz najsevernije zemlje kojom gospodari kralj Robert Barateon iz svoje daleke Kraljevske Luke. Severom u Robertovo ime vlada Edard Stark, gospodar Zimovrela. On živi u miru i udobnosti sa svojom ponosnom suprugom Kejtlin, sinovima Robom, Brenom i Rikonom, kćerima Sansom i Arjom, i kopiletom Džonom Snežnim. Još dalje na severu, iza velikog Zida, prostire se divljina i u njoj strašna, neprirodna bića, zaboravljena tokom dugog leta, prognana u mit. Ali sada zima dolazi i divlja zemlja se budi.'),
(2, 1, 'Sudar kraljeva', 690, 'sudar_kraljeva.jpg', 'Kometa boje krvi i plamena plovi preko neba. A od drevnog zamka na Zmajkamenu do ledenih pustoši Zimovrela, kraljevstvo vri. Šest pretendenata želi vlast nad podeljenom zemljom i gvozdeni presto Sedam kraljevstava, ne prežući ni od čega – od bitaka do bratoubistva, od intriga do izdaja. Ovo je priča u kojoj brat kuje zavere protiv brata, a mrtvi se dižu i hodaju po noći. Princeza je prerušena u dečaka beskućnika; vitez uma sprema se da otruje strašnu čarobnicu; a divlji ljudi spuštaju se sa Mesečevih planina i pale sve pred sobom.');

-- --------------------------------------------------------

--
-- Table structure for table `pisci`
--

CREATE TABLE `pisci` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pisci`
--

INSERT INTO `pisci` (`id`, `ime`, `prezime`) VALUES
(1, 'Džordž', 'R. R. Martin'),
(2, 'Džo', 'Aberkrombi'),
(3, 'Andžej', 'Sapkovski'),
(4, 'Piter', 'Bret'),
(5, 'Uroš', 'Petrović'),
(6, 'Nenad', 'Gajić');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pisac_id` (`pisac_id`);

--
-- Indexes for table `pisci`
--
ALTER TABLE `pisci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pisci`
--
ALTER TABLE `pisci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjige`
--
ALTER TABLE `knjige`
  ADD CONSTRAINT `knjige_ibfk_1` FOREIGN KEY (`pisac_id`) REFERENCES `pisci` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
