-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 06 Novembre 2019 à 12:21
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(45) DEFAULT NULL,
  `prenom_admin` varchar(45) DEFAULT NULL,
  `numero_admin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom_admin`, `prenom_admin`, `numero_admin`) VALUES
(1, 'Seck', 'Abdoulaye', '783252779');

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

CREATE TABLE `consultation` (
  `patient_id_patient` int(11) NOT NULL,
  `medecin_id_med` int(11) NOT NULL,
  `date_consulta` datetime(6) DEFAULT NULL,
  `objet_consulta` varchar(405) DEFAULT NULL,
  `prescription` varchar(405) DEFAULT NULL,
  `valider` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `datetravail`
--

CREATE TABLE `datetravail` (
  `id_dateTravail` int(11) NOT NULL,
  `jours` date DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `dossierpatient`
--

CREATE TABLE `dossierpatient` (
  `iddossierpatient` int(11) NOT NULL,
  `groupe_sg` varchar(4) DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `tension` varchar(45) DEFAULT NULL,
  `objet_consultation` text,
  `medecin_rattache` varchar(45) NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_RV` date DEFAULT NULL,
  `heure_RV` time NOT NULL,
  `statut` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `dossierpatient`
--

INSERT INTO `dossierpatient` (`iddossierpatient`, `groupe_sg`, `poids`, `taille`, `tension`, `objet_consultation`, `medecin_rattache`, `date_ajout`, `date_RV`, `heure_RV`, `statut`) VALUES
(1, 'o+', 75, 180, NULL, 'consultation d\'un generaliste', 'generaliste', '2019-10-15 00:00:00', NULL, '00:00:00', NULL),
(2, 'A+', 78, 190, NULL, 'Consultation du coeur', 'cardiologue', '2019-10-16 00:00:00', NULL, '00:00:00', NULL),
(3, 'O-', 67, 160, NULL, NULL, '', '0000-00-00 00:00:00', NULL, '00:00:00', NULL),
(4, 'A', 90, 187, NULL, NULL, '', '0000-00-00 00:00:00', NULL, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_med` int(11) NOT NULL,
  `prenom_med` varchar(45) DEFAULT NULL,
  `nom_med` varchar(45) DEFAULT NULL,
  `numero_med` varchar(45) DEFAULT NULL,
  `mail_med` varchar(45) DEFAULT NULL,
  `statut_med` varchar(45) DEFAULT NULL,
  `dateTravail_id_dateTravail` int(11) NOT NULL,
  `specialite_id_specialite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT NULL COMMENT 'date d''enregistrement du patient',
  `dateRv` date DEFAULT NULL,
  `heurRv` time DEFAULT NULL,
  `poids` varchar(10) DEFAULT NULL,
  `taille` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patient`
--

INSERT INTO `patient` (`id_patient`, `prenom`, `nom`, `age`, `numero`, `adresse`, `date_creation`, `dateRv`, `heurRv`, `poids`, `taille`) VALUES
(1, 'Seynabou', 'Sarr', 26, 772223344, 'Dakar, parcelles assainies unite 25', NULL, '2019-11-06', NULL, NULL, NULL),
(2, 'Youssouf', 'Ndiaye', 27, 766454321, 'Ouakam, cite batrin', NULL, '2019-11-06', NULL, NULL, NULL),
(3, 'Moussa', 'Pouye', 34, 706454321, 'Thies', NULL, NULL, NULL, NULL, NULL),
(4, 'Fatou', 'Diop', 23, 775433223, 'Dakar', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `type_profil` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `type_profil`) VALUES
(1, 'admin'),
(2, 'medecin'),
(3, 'secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nom_service` varchar(45) DEFAULT NULL,
  `numero_service` varchar(45) DEFAULT NULL,
  `mail_service` varchar(45) DEFAULT NULL,
  `administrateur_id_admin` int(11) NOT NULL,
  `medecin_id_med` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `id_specialite` int(11) NOT NULL,
  `nom_specialite` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`id_specialite`, `nom_specialite`) VALUES
(1, 'generaliste'),
(2, 'dermatologue');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom_utilisateur` varchar(45) NOT NULL,
  `nom_utilisateur` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `motpasse` varchar(45) NOT NULL,
  `code` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `prenom_utilisateur`, `nom_utilisateur`, `login`, `motpasse`, `code`) VALUES
(1, 'Abdoulaye', 'seck', 'laye', 'laye@', 1),
(2, 'khady', 'sarr', 'kha', 'khady@', 2),
(3, 'mohamed', 'Diaw', 'moha', 'moha@', 3),
(4, 'Dr ousmane', 'Faye', 'ous', 'ous@', 2),
(5, 'Dr fatou', 'diop', 'fa', 'fa@', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`patient_id_patient`,`medecin_id_med`),
  ADD KEY `fk_patient_has_medecin_medecin1_idx` (`medecin_id_med`),
  ADD KEY `fk_patient_has_medecin_patient1_idx` (`patient_id_patient`);

--
-- Index pour la table `datetravail`
--
ALTER TABLE `datetravail`
  ADD PRIMARY KEY (`id_dateTravail`);

--
-- Index pour la table `dossierpatient`
--
ALTER TABLE `dossierpatient`
  ADD PRIMARY KEY (`iddossierpatient`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_med`),
  ADD KEY `fk_medecin_dateTravail1_idx` (`dateTravail_id_dateTravail`),
  ADD KEY `fk_medecin_specialite1_idx` (`specialite_id_specialite`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `fk_service_administrateur_idx` (`administrateur_id_admin`),
  ADD KEY `fk_service_medecin1_idx` (`medecin_id_med`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id_specialite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `fk_id_utilisateur` (`code`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `datetravail`
--
ALTER TABLE `datetravail`
  MODIFY `id_dateTravail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `dossierpatient`
--
ALTER TABLE `dossierpatient`
  MODIFY `iddossierpatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_med` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id_specialite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `fk_patient_has_medecin_medecin1` FOREIGN KEY (`medecin_id_med`) REFERENCES `medecin` (`id_med`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_has_medecin_patient1` FOREIGN KEY (`patient_id_patient`) REFERENCES `patient` (`id_patient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `fk_medecin_dateTravail1` FOREIGN KEY (`dateTravail_id_dateTravail`) REFERENCES `datetravail` (`id_dateTravail`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medecin_specialite1` FOREIGN KEY (`specialite_id_specialite`) REFERENCES `specialite` (`id_specialite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk_service_administrateur` FOREIGN KEY (`administrateur_id_admin`) REFERENCES `administrateur` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_service_medecin1` FOREIGN KEY (`medecin_id_med`) REFERENCES `medecin` (`id_med`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`code`) REFERENCES `profil` (`id_profil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
