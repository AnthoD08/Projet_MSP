-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 déc. 2024 à 09:15
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

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

DROP TABLE IF EXISTS `adherents`;
CREATE TABLE IF NOT EXISTS `adherents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adherent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_adherent` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherents`
--

INSERT INTO `adherents` (`id`, `adherent`, `id_adherent`) VALUES
(1, 'Prenom Nom', 5849987252852);

-- --------------------------------------------------------

--
-- Structure de la table `batiments`
--

DROP TABLE IF EXISTS `batiments`;
CREATE TABLE IF NOT EXISTS `batiments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `batiment` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `batiments`
--

INSERT INTO `batiments` (`id`, `batiment`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`) VALUES
(1, 'Reliure endommagée, livre fragile.');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

DROP TABLE IF EXISTS `emprunts`;
CREATE TABLE IF NOT EXISTS `emprunts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ISBN` int DEFAULT NULL,
  `id_commentaire` int DEFAULT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `id_adherent` int DEFAULT NULL,
  `receveur` int DEFAULT NULL,
  `semaine` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_commentaire` (`id_commentaire`),
  KEY `fk_adherent` (`id_adherent`),
  KEY `fk_isbn` (`ISBN`),
  KEY `fk_receveur` (`receveur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunts`
--

INSERT INTO `emprunts` (`id`, `ISBN`, `id_commentaire`, `date_emprunt`, `date_retour`, `id_adherent`, `receveur`, `semaine`) VALUES
(1, 2, 1, '2024-11-08', '2024-11-29', 1, 1, 0),
(2, 1, 1, '2024-11-08', '2024-12-17', 1, 1, 4);

-- --------------------------------------------------------

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

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Science');

-- --------------------------------------------------------

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

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

DROP TABLE IF EXISTS `langues`;
CREATE TABLE IF NOT EXISTS `langues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `langue` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `langues`
--

INSERT INTO `langues` (`id`, `langue`) VALUES
(1, 'Français'),
(2, 'Anglais'),
(3, 'Espagnol');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ISBN` bigint NOT NULL,
  `auteurs` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `editeur` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `publication` int NOT NULL,
  `resume` text COLLATE utf8mb4_general_ci,
  `id_langue` int DEFAULT NULL,
  `id_genre` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_langue` (`id_langue`),
  KEY `fk_genre_livre` (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `ISBN`, `auteurs`, `editeur`, `publication`, `resume`, `id_langue`, `id_genre`) VALUES
(1, 'Les Mystères de l\'Univers', 9780857211118, 'Jean Dupont', ' Éditions Cosmos', 2013, 'Une exploration fascinante des mystères de l\'univers', 3, 1),
(2, 'Les Grandes Théories de la Physique', 9788007346857, 'Albert Einstein', 'Éditions Scientifiques', 2001, ' Une présentation des théories qui ont révolutionné notre compréhension de la physique moderne.', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'bibliothécaire'),
(2, 'responsable'),
(3, 'directeur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int DEFAULT NULL,
  `id_batiment` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_role` (`id_role`),
  KEY `fk_batiment_utilisateur` (`id_batiment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `identifiant`, `mot_de_passe`, `id_role`, `id_batiment`) VALUES
(1, 'Paul Yssier', '123', 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `fk_adherent` FOREIGN KEY (`id_adherent`) REFERENCES `adherents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_commentaire` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaires` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_isbn` FOREIGN KEY (`ISBN`) REFERENCES `livres` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receveur` FOREIGN KEY (`receveur`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
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

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `fk_genre_livre` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_langue` FOREIGN KEY (`id_langue`) REFERENCES `langues` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_batiment_utilisateur` FOREIGN KEY (`id_batiment`) REFERENCES `batiments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
