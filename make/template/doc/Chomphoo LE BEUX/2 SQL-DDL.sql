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


-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `CMPT_PSEUDO` varchar(60) NOT NULL,
  `CMPT_MOT_DE_PASSE` char(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


-- --------------------------------------------------------

--
-- Structure de la table `tj_possede`
--

CREATE TABLE `tj_possede` (
  `CAT_NUMERO` int(11) NOT NULL,
  `URL_NUMERO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `url`
--

CREATE TABLE `url` (
  `URL_NUMERO` int(11) NOT NULL,
  `URL_NOM` varchar(60) DEFAULT NULL,
  `URL_CHAINE` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

ALTER TABLE `compte` CHANGE `CMPT_MOT_DE_PASSE` `CMPT_MOT_DE_PASSE` CHAR(32) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL;