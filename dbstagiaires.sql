-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 fév. 2019 à 19:17
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbstagiaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `encadreurs`
--

DROP TABLE IF EXISTS `encadreurs`;
CREATE TABLE IF NOT EXISTS `encadreurs` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `codeFonction` int(11) NOT NULL,
  `nomenc` varchar(15) COLLATE utf8_bin NOT NULL,
  `prenomenc` varchar(15) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(1) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(15) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `codeFonction` (`codeFonction`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `encadreurs`
--

INSERT INTO `encadreurs` (`matricule`, `codeFonction`, `nomenc`, `prenomenc`, `sexe`, `telephone`) VALUES
(1, 1, 'BA', 'Abdoulaye', 'm', '2215422506'),
(2, 2, 'FALL', 'Oumar', 'm', '221775422506');

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
CREATE TABLE IF NOT EXISTS `fonctions` (
  `codeFonction` int(11) NOT NULL AUTO_INCREMENT,
  `libelleFonction` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codeFonction`),
  KEY `codeFonction` (`codeFonction`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`codeFonction`, `libelleFonction`) VALUES
(1, 'directeur RH'),
(2, 'informaticien'),
(3, 'comptable'),
(4, 'marketer');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `codeserv` int(11) NOT NULL AUTO_INCREMENT,
  `libelleserv` varchar(20) COLLATE utf8_bin NOT NULL,
  `chefserv` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codeserv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`codeserv`, `libelleserv`, `chefserv`) VALUES
(1, 'ressources humaines', 'Abdoulaye'),
(2, 'informatique', 'Oumar');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaires`
--

DROP TABLE IF EXISTS `stagiaires`;
CREATE TABLE IF NOT EXISTS `stagiaires` (
  `numstagiaire` varchar(5) COLLATE utf8_bin NOT NULL,
  `matricule` int(11) NOT NULL,
  `codeserv` int(11) NOT NULL,
  `nom` varchar(15) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(15) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(1) COLLATE utf8_bin NOT NULL,
  `datenais` date NOT NULL,
  `debutstage` date NOT NULL,
  `finstage` date NOT NULL,
  `photo` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'defaultpict.jpg',
  PRIMARY KEY (`numstagiaire`),
  KEY `matricule` (`matricule`,`codeserv`),
  KEY `codeserv` (`codeserv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `stagiaires`
--

INSERT INTO `stagiaires` (`numstagiaire`, `matricule`, `codeserv`, `nom`, `prenom`, `sexe`, `datenais`, `debutstage`, `finstage`, `photo`) VALUES
('E0001', 1, 2, 'NIANG', 'Mohamed', 'm', '1995-09-24', '2019-03-01', '2019-06-06', 'Mohamed NIANG.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nomuser` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(15) COLLATE utf8_bin NOT NULL,
  `login` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`iduser`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `nomuser`, `prenom`, `login`, `password`) VALUES
(1, 'FALL', 'Oumar', 'Oumar', 'abcde'),
(2, 'BA', 'Abdoulaye', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

DROP TABLE IF EXISTS `visites`;
CREATE TABLE IF NOT EXISTS `visites` (
  `matricule` int(11) NOT NULL,
  `codeserv` int(11) NOT NULL,
  `datevisite` date NOT NULL,
  KEY `matricule` (`matricule`,`codeserv`),
  KEY `codeserv` (`codeserv`),
  KEY `codeserv_2` (`codeserv`),
  KEY `codeserv_3` (`codeserv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `encadreurs`
--
ALTER TABLE `encadreurs`
  ADD CONSTRAINT `encadreurs_ibfk_1` FOREIGN KEY (`codeFonction`) REFERENCES `fonctions` (`codeFonction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD CONSTRAINT `stagiaires_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `encadreurs` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stagiaires_ibfk_2` FOREIGN KEY (`codeserv`) REFERENCES `services` (`codeserv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `visites`
--
ALTER TABLE `visites`
  ADD CONSTRAINT `visites_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `encadreurs` (`matricule`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visites_ibfk_2` FOREIGN KEY (`codeserv`) REFERENCES `services` (`codeserv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
