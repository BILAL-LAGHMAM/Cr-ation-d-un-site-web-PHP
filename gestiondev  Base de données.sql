-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 10 avr. 2021 à 19:33
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondev`
--

-- --------------------------------------------------------

--
-- Structure de la table `developpeurs`
--

DROP TABLE IF EXISTS `developpeurs`;
CREATE TABLE IF NOT EXISTS `developpeurs` (
  `id_developpeurs` int(11) NOT NULL AUTO_INCREMENT,
  `nom_developpeurs` varchar(20) DEFAULT NULL,
  `prenom_developpeurs` varchar(20) DEFAULT NULL,
  `email_developpeurs` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_developpeurs`),
  KEY `id_developpeurs` (`id_developpeurs`),
  KEY `id_developpeurs_2` (`id_developpeurs`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `developpeurs`
--

INSERT INTO `developpeurs` (`id_developpeurs`, `nom_developpeurs`, `prenom_developpeurs`, `email_developpeurs`) VALUES
(19, 'immado', 'mohammed', 'laghmami@gmail.com'),
(30, 'bader', 'jaouad', 'bader@gmail.com'),
(31, 'bla', 'blal', 'bla@gmaiml.com'),
(32, 'bilal', 'dsqd', 'bla@gmaiml.com'),
(34, 'bilal', 'bilal', 'laghmam@gmail.com'),
(37, 'lllll', 'gfhjkl', 'labilal49@gmail.com'),
(38, 'alal', 'alilo', 'alilo@gmail.com'),
(39, 'test', 'testeur', 'test@gmail.com'),
(40, 'TEST', 'TESTO', 'TESTO@gmail.com'),
(41, 'bilals', 'laghmams', 'laghmams@gmail.com'),
(42, 'youssefs', 'dsqds', 'blasq@gmaiml.com'),
(43, 'bilal', 'laghmam', 'blba@gmaiml.com'),
(44, 'lalal', 'lalal', 'lalal@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `technos_developpeurs`
--

DROP TABLE IF EXISTS `technos_developpeurs`;
CREATE TABLE IF NOT EXISTS `technos_developpeurs` (
  `id_technos` int(11) NOT NULL AUTO_INCREMENT,
  `html` int(11) DEFAULT NULL,
  `cgi` int(11) DEFAULT NULL,
  `js` int(11) DEFAULT NULL,
  `ajax` int(11) DEFAULT NULL,
  `php` int(11) DEFAULT NULL,
  `id_developpeurs` int(11) NOT NULL,
  PRIMARY KEY (`id_technos`),
  KEY `id_technos` (`id_technos`),
  KEY `id_developpeurs` (`id_developpeurs`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technos_developpeurs`
--

INSERT INTO `technos_developpeurs` (`id_technos`, `html`, `cgi`, `js`, `ajax`, `php`, `id_developpeurs`) VALUES
(28, 0, 0, 0, 0, 5, 19),
(29, 0, -1, -1, 0, 1, 30),
(30, 5, 5, 5, 5, 5, 31);

-- --------------------------------------------------------

--
-- Structure de la table `user_gestion`
--

DROP TABLE IF EXISTS `user_gestion`;
CREATE TABLE IF NOT EXISTS `user_gestion` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(25) DEFAULT NULL,
  `prenom_user` varchar(25) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_gestion`
--

INSERT INTO `user_gestion` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `password_user`) VALUES
(21, 'laghmam', 'bilal', 'laghmam@gmail.com', '$2y$10$IMfqr9Ti1ULpeVhmoY1Iru35togY6GeabhZdd9yLg.EzLGc5C8nU2'),
(22, 'benssness', 'been', 'benssness@gmail.com', '$2y$10$1F.G/pEuBciWe2yLdPOFAOkKbTiEVMS2me4CxgB5SkzV50Hrtebuq');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `technos_developpeurs`
--
ALTER TABLE `technos_developpeurs`
  ADD CONSTRAINT `technos_developpeurs_ibfk_1` FOREIGN KEY (`id_developpeurs`) REFERENCES `developpeurs` (`id_developpeurs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
