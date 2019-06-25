-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2019 at 11:57 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `merenja`
--

DROP TABLE IF EXISTS `merenja`;
CREATE TABLE IF NOT EXISTS `merenja` (
  `Username` varchar(38) COLLATE utf8_unicode_ci NOT NULL,
  `IdMerenja` int(11) NOT NULL,
  `Tip` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Podaci` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Username`,`IdMerenja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  PRIMARY KEY (`IdPoruka`),
  KEY `R_17` (`PorukaOd`),
  KEY `R_19` (`PorukaDo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  PRIMARY KEY (`IdTerapija`),
  KEY `R_14` (`Pacijent`),
  KEY `R_15` (`Lekar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD CONSTRAINT `R_5` FOREIGN KEY (`Lekar`) REFERENCES `lekar` (`Username`),
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
