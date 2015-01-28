-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Loomise aeg: Jaan 28, 2015 kell 12:44 PM
-- Serveri versioon: 5.5.27-1~dotdeb.0
-- PHP versioon: 5.3.16-1~dotdeb.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Andmebaas: `martinpoll_lennud`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `broneering`
--

CREATE TABLE IF NOT EXISTS `broneering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aeg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `koht_nr` int(11) NOT NULL,
  `lend_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lend_id` (`lend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Andmete tõmmistamine tabelile `broneering`
--

INSERT INTO `broneering` (`id`, `aeg`, `koht_nr`, `lend_id`) VALUES
(1, '2015-01-28 10:36:09', 65, 1);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `lend`
--

CREATE TABLE IF NOT EXISTS `lend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lennuk_id` int(11) NOT NULL,
  `kuup2ev` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lennuk_id` (`lennuk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Andmete tõmmistamine tabelile `lend`
--

INSERT INTO `lend` (`id`, `lennuk_id`, `kuup2ev`) VALUES
(1, 1, '2015-01-29 00:00:00');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `lennuk`
--

CREATE TABLE IF NOT EXISTS `lennuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kohtade_arv` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Andmete tõmmistamine tabelile `lennuk`
--

INSERT INTO `lennuk` (`id`, `kohtade_arv`) VALUES
(1, 70);

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `broneering`
--
ALTER TABLE `broneering`
  ADD CONSTRAINT `broneering_ibfk_1` FOREIGN KEY (`lend_id`) REFERENCES `lend` (`id`);

--
-- Piirangud tabelile `lend`
--
ALTER TABLE `lend`
  ADD CONSTRAINT `lend_ibfk_1` FOREIGN KEY (`lennuk_id`) REFERENCES `lennuk` (`id`);
SET FOREIGN_KEY_CHECKS=1;