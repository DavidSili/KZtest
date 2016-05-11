-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 06:41 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kz`
--

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

DROP TABLE IF EXISTS `flags`;
CREATE TABLE IF NOT EXISTS `flags` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `adr` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `IP` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `flag` int(1) NOT NULL,
  `info` varchar(5000) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `stps` int(1) NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `adr` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `greska` int(1) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

DROP TABLE IF EXISTS `pitanja`;
CREATE TABLE IF NOT EXISTS `pitanja` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pitanje` text COLLATE utf8_slovenian_ci NOT NULL,
  `odgovor` text COLLATE utf8_slovenian_ci NOT NULL,
  `odgovora` int(2) NOT NULL,
  `tacnih` int(2) NOT NULL,
  `resenje` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testlog`
--

DROP TABLE IF EXISTS `testlog`;
CREATE TABLE IF NOT EXISTS `testlog` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `arayb` varchar(5000) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `adr` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `greska` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
