-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 22 août 2023 à 21:44
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `htauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `roleUser` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `identifiant`, `mdp`, `email`, `roleUser`) VALUES
(5, 'francis', 'francis', 'wybounty@gmail.com', 'User'),
(4, 'test', 'test', 'wybounty@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `modele` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `annee` int NOT NULL,
  `etat` varchar(255) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `modele`, `type`, `annee`, `etat`, `prix`) VALUES
(101, 'mercedes.webp', 'Mercedes', 'Benz', 2018, 'neuf', '32000'),
(102, 'nissan.jpg', 'fezfez', 'fezfez', 43543, 'BFGDBF', '10000');

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `register`
--

INSERT INTO `register` (`nom`, `prenom`, `identifiant`, `mdp`) VALUES
('test', 'test', 'test', 'test'),
('RJRJYRYHT', '', '', ''),
('fezfez', 'ezfez', 'efez', 'fezfez'),
('ezfez', 'fezf', 'fezfe', 'fezfez'),
('fezf', 'ezfe', 'fezfez', 'fezfez');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idres` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `idvoiture` varchar(255) DEFAULT NULL,
  `annee` varchar(255) NOT NULL,
  PRIMARY KEY (`idres`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
