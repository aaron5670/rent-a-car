-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 26 jan 2018 om 15:55
-- Serverversie: 5.5.57-0ubuntu0.14.04.1
-- PHP-versie: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `rentacar`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `licence_plate` varchar(10) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `model` varchar(55) NOT NULL,
  `car_type` varchar(35) NOT NULL,
  `day_price` int(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `acceleration` varchar(25) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Gegevens worden uitgevoerd voor tabel `cars`
--

INSERT INTO `cars` (`car_id`, `licence_plate`, `brand`, `model`, `car_type`, `day_price`, `description`, `acceleration`, `image_name`) VALUES
(14, '23-67-RW', 'BMW', '525 (turbodiesel)', 'Stationwagon', 100, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 4 personen in en er zit een GPS in de auto.', 'Automaat', 'bmw-1er-5d-weiss-2017.png'),
(15, '32-56-IR', 'Mercedes', 'CLK (benzine)', 'Cabriolet', 120, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 2 personen in en er zit een GPS in de auto.', 'Automaat', 'mb-e-klasse-4d-schwarz-2013.png'),
(16, '45-RR-76', 'Rolls-Royce', 'Silver Shadow', 'Standaard', 185, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 5 personen in en er zit een GPS in de auto.', 'Handmatig', 'jaguar-xf-4d-weiss-2015.png'),
(17, '89-PE-TT', 'Porsche', '911s', 'Cabriolet', 130, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 2 personen in en er zit geen GPS in de auto.', 'Handmatig', 'jaguar-xf-4d-weiss-2015.png'),
(18, '05-HJ-UF', 'BMW', '323 (bezine)', 'Sportwagen', 85, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 2 personen in en er zit geen GPS in de auto.', 'Handmatig', 'bmw-1er-5d-weiss-2017.png'),
(19, 'TD-67-HB', 'BMW', '525 (turbodiesel)', 'Stationwagon', 100, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 4 personen in en er zit een GPS in de auto.', 'Automaat', 'bmw-1er-5d-weiss-2017.png'),
(21, '98-67-HI', 'BMW', '525 (turbodiesel)', 'Stationwagon', 95, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 4 personen in en er zit geen GPS in de auto.', 'Handmatig', 'bmw-1er-5d-weiss-2017.png'),
(22, '32-56-IR', 'Mercedes', 'Pullman', 'Standaard', 140, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 8 personen in en er zit een GPS in de auto.', 'Automaat', 'mb-e-klasse-4d-schwarz-2013.png'),
(23, '42-RT-76', 'Rolls-Royce', 'Silver Shadow', 'Standaard', 185, 'Een mooie auto die ook nog eens perfect rijdt! Hier passen 5 personen in en er zit een GPS in de auto.', 'Handmatig', 'jaguar-xf-4d-weiss-2015.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_number` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_number`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Gegevens worden uitgevoerd voor tabel `invoice`
--

INSERT INTO `invoice` (`invoice_number`, `invoice_date`, `user_id`) VALUES
(66, '2018-01-26 11:09:40', 16),
(67, '2018-01-26 11:10:46', 16),
(68, '2018-01-26 11:11:06', 16),
(69, '2018-01-26 11:17:55', 9),
(70, '2018-01-26 11:48:04', 9),
(73, '2018-01-26 14:07:09', 7);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `invoice_number` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `begin_date` varchar(30) NOT NULL,
  `end_date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  PRIMARY KEY (`invoice_number`),
  KEY `car_id` (`car_id`),
  KEY `car_id_2` (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Gegevens worden uitgevoerd voor tabel `reservations`
--

INSERT INTO `reservations` (`invoice_number`, `car_id`, `begin_date`, `end_date`, `time`) VALUES
(66, 14, '2018-01-26', '2018-02-05', '11:30'),
(67, 15, '2018-01-28', '2018-01-29', '14:00'),
(68, 16, '2018-01-27', '2018-01-29', '16:30'),
(69, 14, '2018-01-26', '2018-01-29', '12:30'),
(70, 14, '2018-01-26', '2018-01-29', '09:30'),
(73, 15, '2018-01-26', '2018-01-29', '12:30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `place` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `staff` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `street`, `place`, `zipcode`, `province`, `country`, `password`, `phone`, `created`, `modified`, `status`, `staff`) VALUES
(7, 'Webshop', 'Eigenaar', 'admin@webshop.nl', 'Straatnaam 2', 'Apeldoorn', '7323 AA', 'Gelderland', 'Nederland', '1a1dc91c907325c69271ddf0c944bc72', '0655443322', '2017-10-27 13:25:17', '2017-10-27 13:25:17', '1', 1),
(9, '123', '123', '123@gmail.com', '123', '123', '123', '123', '123', '202cb962ac59075b964b07152d234b70', '123', '2018-01-25 09:11:18', '2018-01-25 09:11:18', '1', 0),
(13, 'Stijn', 'Dijkstra', 'sbdstijn@gmail.com', 'Omloop, 16', 'Twello', '7391 PM', 'Gelderland', 'Nederland', '81dc9bdb52d04dc20036dbd8313ed055', '0612345678', '2018-01-25 19:30:26', '2018-01-25 19:30:26', '1', 0),
(15, 'Test', 'Test', 'Test@gmail.com', 'Test 123', 'Test', '1234', 'Testing', 'the Testerlands', '0cbc6611f5540bd0809a388dc95a615b', '06 123 45 67', '2018-01-26 10:35:28', '2018-01-26 10:35:28', '1', 0),
(16, 'Aaron', 'van den Berg', 'a.vdberg98@gmail.com', 'Molenweg 2', 'Geesteren', '7274 AA', 'Gelderland', 'Nederland', 'e10adc3949ba59abbe56e057f20f883e', '06 55 43 23 95', '2018-01-26 10:49:05', '2018-01-26 10:49:05', '1', 0);

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`invoice_number`) REFERENCES `reservations` (`invoice_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
