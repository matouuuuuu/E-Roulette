-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : Dim 23 mai 2021 à 15:32
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `roulette`
--

-- --------------------------------------------------------

--
-- Structure de la table `Game`
--

CREATE TABLE `Game` (
  `player` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bet` int(255) NOT NULL,
  `profit` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Game`
--

INSERT INTO `Game` (`player`, `date`, `bet`, `profit`) VALUES
(1, '2021-05-23 00:01:25', 15, 0),
(1, '2021-05-23 00:01:33', 12, 0),
(1, '2021-05-23 00:01:39', 35, 0),
(1, '2021-05-23 00:01:45', 23, 46),
(1, '2021-05-23 00:10:03', 1, 2),
(1, '2021-05-23 00:10:21', 3, 0),
(1, '2021-05-23 00:10:25', 3, 6),
(1, '2021-05-23 12:36:24', 6, 12),
(1, '2021-05-23 12:40:09', 6, 12),
(1, '2021-05-23 13:23:56', 12, 24),
(1, '2021-05-23 13:24:18', 15, 0),
(1, '2021-05-23 13:24:27', 12, 0),
(1, '2021-05-23 13:24:39', 5, 0),
(5, '2021-05-23 13:32:52', 30, 0),
(1, '2021-05-23 17:31:23', 5, 10);
