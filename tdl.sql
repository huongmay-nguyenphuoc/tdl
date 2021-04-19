-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 19 avr. 2021 à 15:47
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
-- Base de données : `tdl`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('todo','done','archive') NOT NULL DEFAULT 'todo',
  `start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end` date DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `contrainte_id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `id_user`, `title`, `status`, `start`, `end`, `description`) VALUES
(1, 9, 'Projet pro', 'todo', '2021-04-19 15:25:18', NULL, '- Ajout de polices\n- responsive\n- planifier réunion'),
(2, 9, 'JS/Jquery', 'todo', '2021-04-19 15:34:40', NULL, '- regarder tuto'),
(3, 9, 'Faire un gateau', 'archive', '2021-04-19 15:35:16', '2021-04-19', ''),
(4, 9, 'Faire des courses', 'done', '2021-04-19 15:39:34', '2021-04-19', ''),
(5, 9, 'Boire un litre d\'eau', 'done', '2021-04-19 15:45:06', '2021-04-19', 'Ou même deux\n');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(8, 'test@test.fr', '$2y$10$8EnYE.uOkayou/0kk3pxO.OEswSD.YFHHQZPRL8HqyMmXEK4DIA76'),
(9, 'may@may.fr', '$2y$10$a26DGAVVQtoJOuFHSeJur.OTX1Za9lpmj/7NSgoMjHdrJa08MWRGm');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `contrainte_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
