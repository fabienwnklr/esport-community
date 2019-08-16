-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 30 mai 2019 à 13:20
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `esport-community`
--

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rules` longtext NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_platform` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `name`, `rules`, `link`, `image`, `id_platform`) VALUES
(1, 'Fortnite', '', '', 'http://localhost/php/esport-community/assets/img/fortnite.jpg', 0),
(3, 'Leagues of Legends', '', '', 'http://localhost/php/esport-community/assets/img/lol.jpg', 0),
(4, 'Fifa 19', '', '', 'http://localhost/php/esport-community/assets/img/fifa19.jpg', 0),
(5, 'Apex Legends', '', '', 'http://localhost/php/esport-community/assets/img/apexlegends.jpg', 0),
(6, 'Black Ops 4', '', '', 'http://localhost/php/esport-community/assets/img/bo4.jpg', 0),
(7, 'Raimbow Six Siege', '', '', 'http://localhost/php/esport-community/assets/img/r6siege.jpg', 0),
(8, 'PUBG', '', '', 'http://localhost/php/esport-community/assets/img/pubg.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `platforms`
--

DROP TABLE IF EXISTS `platforms`;
CREATE TABLE IF NOT EXISTS `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'PC'),
(2, 'Xbox One'),
(3, 'Playstation 4'),
(4, 'Switch');

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_platform` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_game` (`id_game`),
  UNIQUE KEY `id_platform` (`id_platform`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `id_team` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_team` (`id_team`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `id_team`) VALUES
(1, 'fabien.winkler@outlook.fr', '$2y$10$cLgyVHJaropA8sE.SPzCkudmU1S2aM49wBeY15RaSSi.LPsjg2Bye', 'Winkler', 'Fabien', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_tournament`
--

DROP TABLE IF EXISTS `user_tournament`;
CREATE TABLE IF NOT EXISTS `user_tournament` (
  `id_user` int(11) NOT NULL,
  `id_tournament` int(11) NOT NULL,
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `id_tournament` (`id_tournament`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `tournaments_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `tournaments_ibfk_2` FOREIGN KEY (`id_platform`) REFERENCES `platforms` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `teams` (`id`);

--
-- Contraintes pour la table `user_tournament`
--
ALTER TABLE `user_tournament`
  ADD CONSTRAINT `user_tournament_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_tournament_ibfk_2` FOREIGN KEY (`id_tournament`) REFERENCES `tournaments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
