-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 18. dub 2016, 06:50
-- Verze serveru: 5.5.47-0ubuntu0.14.04.1
-- Verze PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `ks`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `be_users`
--

CREATE TABLE IF NOT EXISTS `be_users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pravomoc-newUser` tinyint(1) NOT NULL DEFAULT '0',
  `pravomoc-uprPravomoc` tinyint(1) NOT NULL DEFAULT '0',
  `pravomoc-seeOtherUsers` tinyint(1) NOT NULL DEFAULT '0',
  `pravomoc-addKazani` tinyint(1) NOT NULL DEFAULT '0',
  `pravomoc-recyklace` tinyint(1) NOT NULL DEFAULT '0',
  `pravomoc-addToKalendar` tinyint(1) NOT NULL DEFAULT '0',
  `addByUser` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=8 ;

--
-- Vypisuji data pro tabulku `be_users`
--

INSERT INTO `be_users` (`id`, `login`, `password`, `firstname`, `lastname`, `mail`, `pravomoc-newUser`, `pravomoc-uprPravomoc`, `pravomoc-seeOtherUsers`, `pravomoc-addKazani`, `pravomoc-recyklace`, `pravomoc-addToKalendar`, `addByUser`) VALUES
(1, 'ununik', '9be3108f131dce41657f95859e974510', 'Martin', 'PÅ™ibyl', 'ununik@gmail.com', 1, 1, 1, 1, 1, 1, 0),
(2, 'jsdjldas', 'bc432b52684523295f743db9b4087f06', 'Test', '123456', '', 1, 1, 1, 0, 0, 0, 1),
(3, 'jsdjldas', '2a906d9dbbef011ed8a1585a5f5c11a5', 'Test', '123456', '', 1, 1, 1, 0, 0, 0, 1),
(4, 'fsd', 'f20c7f5ea0beb37b6a74746f57036466', 'fsdafasd', 'fsafasf', '', 1, 1, 0, 0, 0, 0, 1),
(5, 'ununikdsa', '9be3108f131dce41657f95859e974510', '123', '132', '', 0, 0, 0, 0, 0, 0, 1),
(6, 'ununikdasasddsa', '94eb2530cf64936e536cd4697b10b130', '123', '123', '', 1, 1, 1, 0, 0, 0, 1),
(7, '123456', '634b3f85741dd08cb98357aedc3ee733', 'Test', '123456', '', 1, 1, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `kazani`
--

CREATE TABLE IF NOT EXISTS `kazani` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `date` int(20) NOT NULL,
  `nazev` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `autor` int(15) NOT NULL,
  `odkaz` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `createdBy` int(15) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=8 ;

--
-- Vypisuji data pro tabulku `kazani`
--

INSERT INTO `kazani` (`id`, `date`, `nazev`, `autor`, `odkaz`, `popis`, `createdBy`, `timestamp`, `active`) VALUES
(2, 1460757600, 'dahoidsa', 3, 'http://htkk', 'iosdjfiosjdiojfdsasio jfosidfoisd', 1, 1460729228, 0),
(3, 1460584800, 'added new', 5, 'http://kpoddksapofkops', 'opdskfpoapsdfpos', 1, 1460729870, 0),
(5, 1460671200, 'sfdasd', 4, 'http://fsadfas', 'fsafasd', 1, 1460730464, 1),
(6, 1460757600, 'Test', 7, 'http://fdsdfs', 'fsfsdfds', 1, 1460781076, 1),
(7, 1460844000, 'dsfdsfdsaf', 4, 'http://fdssad', 'fsdafdsa', 1, 1460905766, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `kazani_autor`
--

CREATE TABLE IF NOT EXISTS `kazani_autor` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `jmeno` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=8 ;

--
-- Vypisuji data pro tabulku `kazani_autor`
--

INSERT INTO `kazani_autor` (`id`, `jmeno`) VALUES
(1, 'M P'),
(2, 'Martin PÅ™ibyl'),
(3, 'Karel Karel'),
(4, 'Jan Cvejn'),
(5, 'opdkfopasodp'),
(6, 'Jan Cvejn'),
(7, 'fddsf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
