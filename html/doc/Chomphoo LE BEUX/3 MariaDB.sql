-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 06 nov. 2019 à 10:49
-- Version du serveur :  10.3.9-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zle_beuch`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `ACT_NUMERO` int(11) NOT NULL,
  `CMPT_PSEUDO` varchar(60) NOT NULL,
  `ACT_TITRE` varchar(30) DEFAULT NULL,
  `ACT_TEXTE` varchar(200) DEFAULT NULL,
  `ACT_DATE_DE_PUBLICATION` date DEFAULT NULL,
  `ACT_ETAT` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`ACT_NUMERO`, `CMPT_PSEUDO`, `ACT_TITRE`, `ACT_TEXTE`, `ACT_DATE_DE_PUBLICATION`, `ACT_ETAT`) VALUES
(1, 'alain.terrieur', 'Maintenance', 'Demain à midi l\'application ne seras plus accessible pendant 2H', '2019-10-23', 'L'),
(2, 'redacteur1', 'Actualisation de données', 'Changement du format de mot de passe', '2019-10-22', 'L'),
(3, 'terry.golo', 'Problème de connection', 'Pour les problèmes de connection contacter notre service', '2019-10-25', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CAT_NUMERO` int(11) NOT NULL,
  `CAT_INTITULE` varchar(100) DEFAULT NULL,
  `CAT_STATUT_AUTORISE` char(1) DEFAULT NULL,
  `CAT_DATE_AJOUT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CAT_NUMERO`, `CAT_INTITULE`, `CAT_STATUT_AUTORISE`, `CAT_DATE_AJOUT`) VALUES
(5, 'Objet trouvé', 'R', '2019-10-18'),
(6, 'Programmes des artistes', 'G', '2019-10-18'),
(7, 'Météo', 'G', '2019-10-18');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `CMPT_PSEUDO` varchar(60) NOT NULL,
  `CMPT_MOT_DE_PASSE` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`CMPT_PSEUDO`, `CMPT_MOT_DE_PASSE`) VALUES
('agnes.teziste', '777ffbd93b8a0a57f81b24d1c2a4a64b'),
('alain.parfait', '777ffbd93b8a0a57f81b24d1c2a4a64b'),
('alain.terrieur', '777ffbd93b8a0a57f81b24d1c2a4a64b'),
('anna.conda', '84c39225f6b025a921933ba2c7f965b6'),
('aude.javel', '84c39225f6b025a921933ba2c7f965b6'),
('cathy.mini', '84c39225f6b025a921933ba2c7f965b6'),
('gestionnaire1', '777ffbd93b8a0a57f81b24d1c2a4a64b'),
('jean.tendrien', '777ffbd93b8a0a57f81b24d1c2a4a64b'),
('le_beuch', '21232f297a57a5a743894a0e4a801fc3'),
('redacteur1', '84c39225f6b025a921933ba2c7f965b6'),
('terry.golo', '84c39225f6b025a921933ba2c7f965b6');

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `INFO_NUMERO` int(11) NOT NULL,
  `CMPT_PSEUDO` varchar(60) NOT NULL,
  `CAT_NUMERO` int(11) NOT NULL,
  `INFO_TEXTE` varchar(150) DEFAULT NULL,
  `INFO_DATE_AJOUT` date DEFAULT NULL,
  `INFO_ETAT` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`INFO_NUMERO`, `CMPT_PSEUDO`, `CAT_NUMERO`, `INFO_TEXTE`, `INFO_DATE_AJOUT`, `INFO_ETAT`) VALUES
(4, 'gestionnaire1', 7, '20:00 Nuageux au alentour de 20 heures', '2019-10-23', 'L'),
(5, 'jean.tendrien', 6, '22:00 Final avec Martin Garrix sur la grande scène', '2019-10-23', 'L'),
(7, 'gestionnaire1', 7, '12:00 Le temps vas ce couvrir', '2019-10-24', 'C'),
(8, 'alain.terrieur', 6, '18:00 Louane scène 2', '2019-10-23', 'L'),
(9, 'aude.javel', 5, 'Récompense trouvé dans la zone de jeux', '2019-10-23', 'L'),
(10, 'terry.golo', 5, 'Iphone X trouvé dans les toilettes', '2019-10-23', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `CMPT_PSEUDO` varchar(60) NOT NULL,
  `PROF_NOM` varchar(60) DEFAULT NULL,
  `PROF_PRENOM` varchar(60) DEFAULT NULL,
  `PROF_MAIL` varchar(60) DEFAULT NULL,
  `PROF_VALIDITE` char(1) DEFAULT NULL,
  `PROF_STATUT` char(1) DEFAULT NULL,
  `PROF_DATE_CREATION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`CMPT_PSEUDO`, `PROF_NOM`, `PROF_PRENOM`, `PROF_MAIL`, `PROF_VALIDITE`, `PROF_STATUT`, `PROF_DATE_CREATION`) VALUES
('agnes.teziste', 'teziste', 'agnes', 'agnes.teziste@gmail.com', 'D', 'G', '2019-10-23'),
('alain.parfait', 'parfait', 'alain', 'alain.parfait@gmail.com', 'D', 'G', '2019-10-23'),
('alain.terrieur', 'terrieur', 'alain', 'alain.terrieur@gmail.com', 'A', 'G', '2019-10-23'),
('anna.conda', 'conda', 'anna', 'anna.conda@gmail.com', 'D', 'R', '2019-10-23'),
('aude.javel', 'javel', 'aude', 'aude.javel@gmail.com', 'A', 'R', '2019-10-23'),
('cathy.mini', 'mini', 'cathy', 'cathy.mini@gmail.com', 'D', 'R', '2019-10-23'),
('gestionnaire1', 'terrieur', 'alex', 'alex.terrieur@gmail.com', 'A', 'G', '2019-10-23'),
('jean.tendrien', 'tendrien', 'jean', 'jean.tendrien@gmail.com', 'A', 'G', '2019-10-23'),
('redacteur1', 'touille', 'sacha', 'sacha.touille@gmail.com', 'A', 'R', '2019-10-23'),
('terry.golo', 'golo', 'terry', 'terry.golo@gmail.com', 'A', 'R', '2019-10-23');

-- --------------------------------------------------------

--
-- Structure de la table `tj_possede`
--

CREATE TABLE `tj_possede` (
  `CAT_NUMERO` int(11) NOT NULL,
  `URL_NUMERO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tj_possede`
--

INSERT INTO `tj_possede` (`CAT_NUMERO`, `URL_NUMERO`) VALUES
(5, 1),
(5, 3),
(6, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

CREATE TABLE `url` (
  `URL_NUMERO` int(11) NOT NULL,
  `URL_NOM` varchar(60) DEFAULT NULL,
  `URL_CHAINE` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `url`
--

INSERT INTO `url` (`URL_NUMERO`, `URL_NOM`, `URL_CHAINE`) VALUES
(1, 'iphone x', 'http://uproxx.com/wp-content/uploads/2018/01/iphone-x-uproxx.jpg'),
(3, 'eau de javel', 'http://www.prc.cnrs.fr/IMG/jpg/Bidon-javel-art.jpg'),
(4, 'Louane', 'http://www.louaneofficiel.com/storage/sites/138/1570/9502/59c8e69c182eb.png'),
(5, 'Martin Garrix', 'https://www.soonnight.com/images/editor/1/fichiers/images/mg%20war%20child_0124015842.png');

-- --------------------------------------------------------

--
-- Structure de la table `visuel`
--

CREATE TABLE `visuel` (
  `VISL_NUMERO` int(11) NOT NULL,
  `CMPT_PSEUDO` varchar(60) NOT NULL,
  `VISL_DESCRIPTIF` varchar(100) DEFAULT NULL,
  `VISL_FICHIER_IMAGE` varchar(20) DEFAULT NULL,
  `VISL_DATE_AJOUT` date DEFAULT NULL,
  `VISL_VISIBILITE` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visuel`
--

INSERT INTO `visuel` (`VISL_NUMERO`, `CMPT_PSEUDO`, `VISL_DESCRIPTIF`, `VISL_FICHIER_IMAGE`, `VISL_DATE_AJOUT`, `VISL_VISIBILITE`) VALUES
(1, 'redacteur1', 'Concert incroyable', 'redacteur1img1.png', '2019-10-18', 'L'),
(3, 'terry.golo', 'Les personnels du stand de jeux sont très sympas', 'terr1.png', '2019-10-23', 'C'),
(4, 'alain.parfait', 'Louane à fait un petit discours', 'gest1img1.png', '2019-10-23', 'L'),
(5, 'gestionnaire1', 'Transport fournis à l\'extérieur', 'alexterrieurimg1.png', '2019-10-23', 'C');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`ACT_NUMERO`),
  ADD KEY `FK_ACTUALITE_COMPTE` (`CMPT_PSEUDO`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CAT_NUMERO`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`CMPT_PSEUDO`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`INFO_NUMERO`),
  ADD KEY `FK_INFORMATION_COMPTE` (`CMPT_PSEUDO`),
  ADD KEY `FK_INFORMATION_CATEGORIE` (`CAT_NUMERO`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`CMPT_PSEUDO`);

--
-- Index pour la table `tj_possede`
--
ALTER TABLE `tj_possede`
  ADD PRIMARY KEY (`CAT_NUMERO`,`URL_NUMERO`),
  ADD KEY `FK_TJ_POSSEDE_URL` (`URL_NUMERO`),
  ADD KEY `CAT_NUMERO` (`CAT_NUMERO`,`URL_NUMERO`);

--
-- Index pour la table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`URL_NUMERO`);

--
-- Index pour la table `visuel`
--
ALTER TABLE `visuel`
  ADD PRIMARY KEY (`VISL_NUMERO`),
  ADD KEY `FK_VISUEL_COMPTE` (`CMPT_PSEUDO`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `ACT_NUMERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CAT_NUMERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `INFO_NUMERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `url`
--
ALTER TABLE `url`
  MODIFY `URL_NUMERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `visuel`
--
ALTER TABLE `visuel`
  MODIFY `VISL_NUMERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `FK_ACTUALITE_COMPTE` FOREIGN KEY (`CMPT_PSEUDO`) REFERENCES `compte` (`CMPT_PSEUDO`);

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `FK_INFORMATION_CATEGORIE` FOREIGN KEY (`CAT_NUMERO`) REFERENCES `categorie` (`CAT_NUMERO`),
  ADD CONSTRAINT `FK_INFORMATION_COMPTE` FOREIGN KEY (`CMPT_PSEUDO`) REFERENCES `compte` (`CMPT_PSEUDO`);

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_PROFIL_COMPTE` FOREIGN KEY (`CMPT_PSEUDO`) REFERENCES `compte` (`CMPT_PSEUDO`);

--
-- Contraintes pour la table `tj_possede`
--
ALTER TABLE `tj_possede`
  ADD CONSTRAINT `FK_TJ_POSSEDE_CATEGORIE` FOREIGN KEY (`CAT_NUMERO`) REFERENCES `categorie` (`CAT_NUMERO`),
  ADD CONSTRAINT `FK_TJ_POSSEDE_URL` FOREIGN KEY (`URL_NUMERO`) REFERENCES `url` (`URL_NUMERO`);

--
-- Contraintes pour la table `visuel`
--
ALTER TABLE `visuel`
  ADD CONSTRAINT `FK_VISUEL_COMPTE` FOREIGN KEY (`CMPT_PSEUDO`) REFERENCES `compte` (`CMPT_PSEUDO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
