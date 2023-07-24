-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2023 at 02:23 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mariokart`
--

-- --------------------------------------------------------

--
-- Table structure for table `character-stats`
--

DROP TABLE IF EXISTS `character-stats`;
CREATE TABLE IF NOT EXISTS `character-stats` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `WeightClassId` int NOT NULL,
  `characterImg` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `character_stats-WeightClassId_weightclass-Id` (`WeightClassId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `character-stats`
--

INSERT INTO `character-stats` (`Id`, `Name`, `WeightClassId`, `characterImg`) VALUES
(1, 'Baby Peach', 1, 1),
(2, 'Baby Daisy', 1, 2),
(3, 'Baby Rosalina', 2, 3),
(4, 'Lemmy Koopa', 2, 4),
(5, 'Baby Mario', 3, 5),
(6, 'Baby Luigi', 3, 6),
(7, 'Dry Bones', 3, 7),
(8, 'Koopa Troopa', 4, 8),
(9, 'Lakitu', 4, 9),
(10, 'Bowser Jr', 4, 10),
(11, 'Toadette', 5, 11),
(12, 'Wendy', 5, 12),
(13, 'Isabelle', 5, 13),
(14, 'Toad', 6, 14),
(15, 'ShyGuy', 6, 15),
(16, 'Larry', 6, 16),
(17, 'Cat Peach', 7, 17),
(18, 'Inkling Girl', 7, 18),
(19, 'Villager Girl', 7, 19),
(20, 'Peach', 8, 20),
(21, 'Daisy', 8, 21),
(22, 'Yoshi', 8, 22),
(23, 'Birdo', 8, 23),
(24, 'Tanooki Mario', 9, 24),
(25, 'Inkling Boy', 9, 25),
(26, 'Villager Boy', 9, 26),
(27, 'Luigi', 10, 27),
(28, 'Iggy', 10, 28),
(29, 'Kamek', 10, 29),
(30, 'Mario', 11, 30),
(31, 'Ludwig', 11, 31),
(32, 'Link', 12, 32),
(33, 'King Boo', 12, 33),
(34, 'Rosalina', 12, 34),
(35, 'Metal/Gold Mario', 13, 35),
(36, 'Pink Gold Peach', 13, 36),
(37, 'Petey Piranha', 13, 37),
(38, 'Donkey Kong', 14, 38),
(39, 'Roy', 14, 39),
(40, 'Waluigi', 14, 40),
(41, 'Wiggler', 14, 41),
(42, 'Wario', 15, 42),
(43, 'Dry Bowser', 15, 43),
(44, 'Bowser', 16, 44),
(45, 'Morton', 16, 45);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Vehicle` varchar(50) NOT NULL,
  `Speed` float NOT NULL,
  `Acceleration` float NOT NULL,
  `Weight` float NOT NULL,
  `Handling` float NOT NULL,
  `Traction/Grip` float NOT NULL,
  `Mini-Turbo` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Id`, `Vehicle`, `Speed`, `Acceleration`, `Weight`, `Handling`, `Traction/Grip`, `Mini-Turbo`) VALUES
(1, 'Standard Kart', 0, 0, 0, 0, 0, 0),
(2, 'Pipe Frame', -0.5, 0.5, -0.25, 0.5, 0.25, 0.5),
(3, 'Mach 8', 0, -0.25, 0.25, -0.25, 0.25, 0),
(4, 'Cat Cruiser', -0.25, 0.25, 0, 0.25, 0, 0.25),
(5, 'Steel Driver', 0.25, -0.75, 0.5, -0.5, 0, -0.5),
(6, 'Circuit Special', 0.5, -0.75, 0.25, -0.5, -0.5, -0.75),
(7, 'Tri-Speeder', 0.25, -0.75, 0.5, -0.5, 0, -0.5),
(8, 'Badwagon', 0.5, -1, 0.5, -0.75, 0.5, -1),
(9, 'Prancer', 0.25, -0.5, -0.25, 0, -0.25, -0.25),
(10, 'Biddybuggy', -0.75, 0.75, -0.5, 0.5, 0.5, 0.25),
(11, 'Landship', -0.5, 0.5, -0.5, -0.5, 0.75, 0.5),
(12, 'Sneeker', 0.25, -0.5, 0, 0, -0.75, -0.25),
(13, 'Sports Coupe', 0, -0.25, 0.25, -0.25, 0.25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weightclass`
--

DROP TABLE IF EXISTS `weightclass`;
CREATE TABLE IF NOT EXISTS `weightclass` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Speed` float NOT NULL,
  `Acceleration` float NOT NULL,
  `Weight` float NOT NULL,
  `Handling` float NOT NULL,
  `Traction/Grip` float NOT NULL,
  `Mini-Turbo` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `weightclass`
--

INSERT INTO `weightclass` (`Id`, `Speed`, `Acceleration`, `Weight`, `Handling`, `Traction/Grip`, `Mini-Turbo`) VALUES
(1, 2.5, 4, 2, 5, 4.25, 4),
(2, 2.5, 4.25, 2, 4.75, 3.75, 4),
(3, 2.75, 4.25, 2.25, 4.5, 4, 4),
(4, 3, 4, 2.5, 4.5, 4.25, 3.75),
(5, 3, 4.25, 2.5, 4.25, 3.5, 3.75),
(6, 3.25, 4, 2.75, 4.25, 4, 3.75),
(7, 3.5, 4, 2.75, 4, 3.75, 3.75),
(8, 3.75, 3.75, 3, 3.75, 3.75, 3.75),
(9, 3.75, 3.75, 3.25, 3.75, 3.25, 3.75),
(10, 4, 3.5, 3.5, 3.75, 3.25, 3.5),
(11, 4, 3.5, 3.5, 3.5, 3.5, 3.25),
(12, 4.25, 3.25, 3.75, 3.25, 3.75, 3.25),
(13, 4.25, 3.25, 4.5, 3.25, 3.25, 3),
(14, 4.5, 3.25, 4, 3, 3, 3),
(15, 4.75, 3, 4.25, 2.75, 3.25, 2.75),
(16, 4.75, 3, 4.5, 2.5, 3, 2.75);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `character-stats`
--
ALTER TABLE `character-stats`
  ADD CONSTRAINT `character_stats-WeightClassId_weightclass-Id` FOREIGN KEY (`WeightClassId`) REFERENCES `weightclass` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
