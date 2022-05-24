-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 31 mars 2022 à 15:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

DROP TABLE IF EXISTS `rendezvous`;
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horaire` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `typeCons` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `horaire`, `date`, `typeCons`, `reference`) VALUES
(1, '08:00-09-00', '2022-03-31', 'maladie', 'test02027749020'),
(13, '10:00-11-00', '2022-03-31', 'sqgqdgsg', 'roussafi11766645462'),
(7, '10:00-11-00', '2022-04-01', 'jdsgbgsfhsfh', 'test02027749020'),
(4, '14:00-15-00', '2022-03-31', 'aaa', 'test02027749020'),
(5, '17:00-18-00', '2022-03-31', 'kk', 'test02027749020'),
(6, '15:00-16-00', '2022-03-31', 'aaa', 'test02027749020'),
(9, '09:00-10-00', '2022-03-31', 'jjnj', 'test02027749020'),
(10, '16:00-17-00', '2022-03-31', 'jbsfqbsfkq', 'test02027749020'),
(11, '11:00-12-00', '2022-03-31', 'jbxkvbqsf', 'test02027749020'),
(12, '13:00-14-00', '2022-03-31', 'aaa', 'test02027749020');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `reference` varchar(55) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`reference`, `firstname`, `lastname`, `age`) VALUES
('roussafi11766645462', 'fahd', 'roussafi', 12),
('test02027749020', 'mehdi', 'test', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
