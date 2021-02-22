-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 22 fév. 2021 à 10:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `DFM`
--

--
-- Déchargement des données de la table `access`
--

INSERT INTO `access` (`pk_acc`, `fk_adm`, `superadmin`, `admin`) VALUES
(1, 28, 1, 0),
(2, 29, 1, 0),
(3, 30, 1, 0);

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`pk_adm`, `nom`, `prenom`, `email`, `password`, `trigramme`) VALUES
(28, 'pipart', 'denis', 'denis.pipart@wavre.be', '$2y$10$u17EwUwYS99Wh7R1lAxhj.vVVuKrUABmzdQQ2bS2S69w22FTf8sve', 'dpt'),
(29, 'pipart', 'denis', 'denis.pipart@wavre.be', '$2y$10$QZrjIkj3/hYwruSLQjbsu.aqeLifv7GI0btOvNZXqJfTSHxyYXOIC', 'dpts'),
(30, 'test', 'test', 'test.test@wavre.be', '$2y$10$cU9O1o85DjeZTi1Ep3sJ8OO3z0QfDg62FKfQpxKrLT5AU9DtwSeQS', 'ttt');

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`pk_cat`, `nom`) VALUES
(1, 'ordinateur');

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`pk_typ`, `fk_cat`, `nom`) VALUES
(1, 1, 'tour'),
(2, 1, 'portable');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
