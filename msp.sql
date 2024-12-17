-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 déc. 2024 à 07:51
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `msp`
--
-- Structure de la table `etages`
--

DROP TABLE IF EXISTS `etages`;
CREATE TABLE IF NOT EXISTS `etages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `etage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etages_batiments`
--

DROP TABLE IF EXISTS `etages_batiments`;
CREATE TABLE IF NOT EXISTS `etages_batiments` (
  `id_etage` int DEFAULT NULL,
  `id_batiment` int DEFAULT NULL,
  KEY `fk_batiment` (`id_batiment`),
  KEY `fk_etage` (`id_etage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
------------------------------------------------------

--
-- Structure de la table `genres_etages`
--

DROP TABLE IF EXISTS `genres_etages`;
CREATE TABLE IF NOT EXISTS `genres_etages` (
  `id_genre` int DEFAULT NULL,
  `id_etage` int DEFAULT NULL,
  KEY `fk_genre` (`id_genre`),
  KEY `fk_etage_genre` (`id_etage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Contraintes pour la table `etages_batiments`
--
ALTER TABLE `etages_batiments`
  ADD CONSTRAINT `fk_batiment` FOREIGN KEY (`id_batiment`) REFERENCES `batiments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_etage` FOREIGN KEY (`id_etage`) REFERENCES `etages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `genres_etages`
--
ALTER TABLE `genres_etages`
  ADD CONSTRAINT `fk_etage_genre` FOREIGN KEY (`id_etage`) REFERENCES `etages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_genre` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
