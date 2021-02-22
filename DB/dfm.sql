-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  lun. 22 fév. 2021 à 10:18
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `DFM`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE `access` (
                          `pk_acc` int(11) NOT NULL,
                          `fk_adm` int(11) NOT NULL,
                          `superadmin` tinyint(1) NOT NULL DEFAULT '0',
                          `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `access`
--

INSERT INTO `access` (`pk_acc`, `fk_adm`, `superadmin`, `admin`) VALUES
(1, 28, 1, 0),
(2, 29, 1, 0),
(3, 30, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
                         `pk_adm` int(11) NOT NULL,
                         `nom` varchar(30) NOT NULL,
                         `prenom` varchar(30) NOT NULL,
                         `email` varchar(60) NOT NULL,
                         `password` varchar(60) NOT NULL,
                         `trigramme` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`pk_adm`, `nom`, `prenom`, `email`, `password`, `trigramme`) VALUES
(28, 'pipart', 'denis', 'denis.pipart@wavre.be', '$2y$10$u17EwUwYS99Wh7R1lAxhj.vVVuKrUABmzdQQ2bS2S69w22FTf8sve', 'dpt'),
(29, 'pipart', 'denis', 'denis.pipart@wavre.be', '$2y$10$QZrjIkj3/hYwruSLQjbsu.aqeLifv7GI0btOvNZXqJfTSHxyYXOIC', 'dpts'),
(30, 'test', 'test', 'test.test@wavre.be', '$2y$10$cU9O1o85DjeZTi1Ep3sJ8OO3z0QfDg62FKfQpxKrLT5AU9DtwSeQS', 'ttt');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
                            `pk_cat` int(11) NOT NULL,
                            `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`pk_cat`, `nom`) VALUES
(1, 'ordinateur');

-- --------------------------------------------------------

--
-- Structure de la table `soustype`
--

CREATE TABLE `soustype` (
                            `pk_sty` int(11) NOT NULL,
                            `fk_typ` int(11) NOT NULL,
                            `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
                        `pk_typ` int(11) NOT NULL,
                        `fk_cat` int(11) NOT NULL,
                        `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`pk_typ`, `fk_cat`, `nom`) VALUES
(1, 1, 'tour'),
(2, 1, 'portable');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `access`
--
ALTER TABLE `access`
    ADD PRIMARY KEY (`pk_acc`),
  ADD KEY `fk_adm` (`fk_adm`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`pk_adm`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`pk_cat`);

--
-- Index pour la table `soustype`
--
ALTER TABLE `soustype`
    ADD PRIMARY KEY (`pk_sty`),
  ADD KEY `fk_typ` (`fk_typ`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
    ADD PRIMARY KEY (`pk_typ`),
  ADD KEY `fk_cat` (`fk_cat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `access`
--
ALTER TABLE `access`
    MODIFY `pk_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
    MODIFY `pk_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
    MODIFY `pk_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `soustype`
--
ALTER TABLE `soustype`
    MODIFY `pk_sty` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
    MODIFY `pk_typ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `access`
--
ALTER TABLE `access`
    ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`fk_adm`) REFERENCES `admin` (`pk_adm`);

--
-- Contraintes pour la table `soustype`
--
ALTER TABLE `soustype`
    ADD CONSTRAINT `soustype_ibfk_1` FOREIGN KEY (`fk_typ`) REFERENCES `type` (`pk_typ`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
    ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`fk_cat`) REFERENCES `category` (`pk_cat`);
