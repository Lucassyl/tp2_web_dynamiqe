-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 18 mai 2024 à 14:34
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp2_cedric_lucas`
--

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sujet_id` int DEFAULT NULL,
  `nom_menu` varchar(30) NOT NULL,
  `position` int NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `sujet_id`, `nom_menu`, `position`, `visible`, `contenu`) VALUES
(1, 1, 'Historique', 1, 1, 'Ceci est l\'historique de la <b>compagnie</b> ...\r\n\r\nEt voilà!\r\n\r\nEncore une ligne.'),
(2, 1, 'Notre Mission', 2, 1, 'Notre mission corporative est ...'),
(3, 2, 'Produit vedette', 1, 1, 'Notre produit vedette est vraiment extraordinaire.\r\nC\'est tout!');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

DROP TABLE IF EXISTS `sujets`;
CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `position` int NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sujets`
--

INSERT INTO `sujets` (`id`, `nom`, `position`, `visible`) VALUES
(1, 'À notre propos', 1, 1),
(2, 'Produits', 2, 1),
(3, 'Services', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

DROP TABLE IF EXISTS `usagers`;
CREATE TABLE IF NOT EXISTS `usagers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `enc_password` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `usagers`
--

INSERT INTO `usagers` (`id`, `login`, `enc_password`) VALUES
(1, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$V1BKajR4MXQyZ1prL0FjTA$sYbVC1GqMn/yk3mXbV7nbdH2YNUxCNnIS8eHMEHCNlg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
