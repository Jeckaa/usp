-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2019 at 04:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bolnica`
--

DROP TABLE IF EXISTS `bolnica`;
CREATE TABLE IF NOT EXISTS `bolnica` (
  `IdBolnica` int(11) NOT NULL,
  `Naziv` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Adresa` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`IdBolnica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bolnica`
--

INSERT INTO `bolnica` (`IdBolnica`, `Naziv`, `Adresa`) VALUES
(1, 'Bolnica', 'Adresa bolnice'),
(2, 'Bolnica2', 'Adresa bolnica 2'),
(3, 'Bolnica3', 'Adresa bolnica 3');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `Username` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tip` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`Username`, `Password`, `Tip`) VALUES
('adsa', 'asd', 'P'),
('bxzv', '1', 'P'),
('dasd', '123', 'P'),
('jeckaa', 'jelena', 'P'),
('lekar', '123', 'L'),
('lekar2', '123', 'L'),
('lekar3', '123', 'L'),
('lekar4', '123', 'L'),
('lekar5', '123', 'L'),
('lekar6', '123', 'L'),
('sluzbenik', '123', 'S'),
('stefan', 'stefi', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `lekar`
--

DROP TABLE IF EXISTS `lekar`;
CREATE TABLE IF NOT EXISTS `lekar` (
  `Username` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `Ime` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prezime` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `JMBG` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Adresa` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bolnica` int(11) DEFAULT NULL,
  PRIMARY KEY (`Username`),
  KEY `R_7` (`Bolnica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lekar`
--

INSERT INTO `lekar` (`Username`, `Ime`, `Prezime`, `JMBG`, `Adresa`, `Bolnica`) VALUES
('lekar', 'Imelekar', 'Prezimelekar', '1234567891025', 'Adresa lekara', 1),
('lekar2', 'lekar2', 'lekar2p', '1234567891025', 'adresa lekar 2', 1),
('lekar3', 'lekar3', 'lekar3p', '1234567891025', 'adresa lekar 3', 1),
('lekar4', 'Lekar4', 'Lekar4p', '1234567891025', 'adresa lekar 4', 2),
('lekar5', 'Lekar5', 'Lekar5p', '1234567891025', 'adresa lekar 5', 2),
('lekar6', 'Lekar6', 'Lekar6p', '1234567891025', 'adresa lekar 6', 2);

-- --------------------------------------------------------

--
-- Table structure for table `merenja`
--

DROP TABLE IF EXISTS `merenja`;
CREATE TABLE IF NOT EXISTS `merenja` (
  `Username` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `IdMerenja` int(11) NOT NULL,
  `Tip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Podaci` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Datum` timestamp NOT NULL,
  PRIMARY KEY (`Username`,`IdMerenja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `merenja`
--

INSERT INTO `merenja` (`Username`, `IdMerenja`, `Tip`, `Podaci`, `Datum`) VALUES
('jeckaa', 1, 'puls', 'dfagagsg', '2019-06-10 22:00:00'),
('jeckaa', 2, 'puls', 'dfagagsg', '2019-06-25 01:09:14'),
('jeckaa', 3, 'pritisak', 'dfagagsg', '2019-06-25 02:26:16'),
('jeckaa', 4, 'krvna slika', 'dfagagsg', '2019-06-12 21:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `pacijent`
--

DROP TABLE IF EXISTS `pacijent`;
CREATE TABLE IF NOT EXISTS `pacijent` (
  `Username` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `Lekar` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ime` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prezime` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `JMBG` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Adresa` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bolnica` int(11) DEFAULT NULL,
  PRIMARY KEY (`Username`),
  KEY `R_5` (`Lekar`),
  KEY `R_8` (`Bolnica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacijent`
--

INSERT INTO `pacijent` (`Username`, `Lekar`, `Ime`, `Prezime`, `JMBG`, `Adresa`, `Bolnica`) VALUES
('bxzv', 'lekar5', '112', '321', 'edewas', 'ads', 2),
('jeckaa', 'lekar2', 'Jelena', 'Cvetinovic', '0602998778611', 'Nova adresa', 1),
('stefan', 'lekar2', 'Stefan', 'Petrovic', '1234567890123', 'Stefanova adresa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

DROP TABLE IF EXISTS `poruka`;
CREATE TABLE IF NOT EXISTS `poruka` (
  `IdPoruka` int(11) NOT NULL,
  `Sadrzaj` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PorukaOd` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `PorukaDo` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `Datum` timestamp NOT NULL,
  `Procitana` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdPoruka`),
  KEY `R_17` (`PorukaOd`),
  KEY `R_19` (`PorukaDo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`IdPoruka`, `Sadrzaj`, `PorukaOd`, `PorukaDo`, `Datum`, `Procitana`) VALUES
(1, 'adasfas', 'jeckaa', 'lekar4', '2019-06-25 04:00:00', 0),
(2, 'adasd', 'jeckaa', 'lekar4', '2019-06-25 13:00:00', 0),
(3, 'dafasfas', 'jeckaa', 'lekar4', '2019-06-11 22:00:00', 0),
(4, 'poruka', 'jeckaa', 'lekar4', '2019-06-10 22:00:00', 0),
(5, 'dafasgas', 'lekar4', 'jeckaa', '2019-06-26 04:16:15', 1),
(6, 'dafasgas', 'lekar4', 'jeckaa', '2019-06-26 04:16:15', 1),
(7, 'adasfa', 'lekar2', 'jeckaa', '2019-06-26 04:20:15', 1),
(8, 'adasfa', 'lekar2', 'jeckaa', '2019-06-24 04:20:15', 1),
(9, 'Molimo vas da ponovo izaberete lekara!', 'sluzbenik', 'bxzv', '2019-06-26 13:59:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `terapija`
--

DROP TABLE IF EXISTS `terapija`;
CREATE TABLE IF NOT EXISTS `terapija` (
  `Pacijent` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lekar` varchar(38) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IdTerapija` int(11) NOT NULL,
  `Opis` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Datum` timestamp NOT NULL,
  PRIMARY KEY (`IdTerapija`),
  KEY `R_14` (`Pacijent`),
  KEY `R_15` (`Lekar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `terapija`
--

INSERT INTO `terapija` (`Pacijent`, `Lekar`, `IdTerapija`, `Opis`, `Datum`) VALUES
('jeckaa', 'lekar2', 1, 'afagsa', '2019-06-26 04:16:15'),
('jeckaa', 'lekar2', 2, 'afagsa', '2019-06-26 05:16:15');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lekar`
--
ALTER TABLE `lekar`
  ADD CONSTRAINT `R_2` FOREIGN KEY (`Username`) REFERENCES `korisnik` (`Username`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_7` FOREIGN KEY (`Bolnica`) REFERENCES `bolnica` (`IdBolnica`);

--
-- Constraints for table `merenja`
--
ALTER TABLE `merenja`
  ADD CONSTRAINT `R_9` FOREIGN KEY (`Username`) REFERENCES `pacijent` (`Username`);

--
-- Constraints for table `pacijent`
--
ALTER TABLE `pacijent`
  ADD CONSTRAINT `R_1` FOREIGN KEY (`Username`) REFERENCES `korisnik` (`Username`) ON DELETE CASCADE,
  ADD CONSTRAINT `R_5` FOREIGN KEY (`Lekar`) REFERENCES `lekar` (`Username`) ON UPDATE SET NULL ON DELETE SET NULL ,
  ADD CONSTRAINT `R_8` FOREIGN KEY (`Bolnica`) REFERENCES `bolnica` (`IdBolnica`);

--
-- Constraints for table `poruka`
--
ALTER TABLE `poruka`
  ADD CONSTRAINT `R_17` FOREIGN KEY (`PorukaOd`) REFERENCES `korisnik` (`Username`),
  ADD CONSTRAINT `R_19` FOREIGN KEY (`PorukaDo`) REFERENCES `korisnik` (`Username`);

--
-- Constraints for table `terapija`
--
ALTER TABLE `terapija`
  ADD CONSTRAINT `R_14` FOREIGN KEY (`Pacijent`) REFERENCES `pacijent` (`Username`),
  ADD CONSTRAINT `R_15` FOREIGN KEY (`Lekar`) REFERENCES `lekar` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
