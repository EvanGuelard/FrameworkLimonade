-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 09:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rentree`
--

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ddn_fils` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel_mobile` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `courriel` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`id`, `identifiant`, `nom_fils`, `prenom_fils`, `ddn_fils`, `tel_mobile`, `courriel`, `date`, `ip`) VALUES
(2, 'QI187', 'Cooper', 'Sheldon', '1 janvier 1981', '0616507880', 'bigbang@theory.com', '2015-09-28 17:03:27', '::1'),
(3, '007', 'Bond', 'James', '1 janvier 1953', '1245789863', 'bond@mi6.com', '2015-09-28 17:05:56', '::1'),
(4, 'harryp', 'Potter', 'Harry', '27 juin 1997', '0258963147', 'harry@potter.com', '2015-09-29 16:40:57', '::1'),
(5, 'Batman', 'Wayne', 'Bruce', '1 mai 1939', '0123456789', 'batman@gotham.com', '2015-10-06 14:17:44', '::1'),
(6, 'Jon', 'Snow', 'Jon', '1 janvier 283', '1548795263', 'jon.snow@nightwatch.com', '2015-10-06 15:04:48', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL,
  `promo` varchar(256) COLLATE utf8_bin NOT NULL,
  `libelle` varchar(256) COLLATE utf8_bin NOT NULL,
  `fichier` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=79 ;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id`, `rang`, `promo`, `libelle`, `fichier`) VALUES
(1, 2, '', 'Dates des rentrées à l''ISEN-Brest/Rennes', 'datesRentreesISENBrestRennes1213.pdf'),
(2, 2, '', 'Sécurité Sociale étudiante mode d''emploi', 'secuModeEmploi1213.pdf'),
(3, 3, '', 'LMDE', 'LMDErentree2012.pdf'),
(4, 4, '', 'SMEBA', 'SMEBArentree2012.pdf'),
(5, 8, '', 'Isenien : mode d’emploi !', 'livretAccueilBDE.pdf'),
(6, 5, '', 'Offre banque BNP', 'BNPOffreRentree2012.pdf'),
(7, 6, '', 'Offre banque CMB', 'CMBOffreRentree2012.pdf'),
(8, 7, '', 'Offre banque Société Générale', 'SocieteGeneraleOffreRentree2012.pdf'),
(9, 1, 'BTSPREPA_A1', 'Informations pratiques', 'A12/infosPratiquesCSI1-CSI2.pdf'),
(10, 1, 'CSI_A2', 'Informations pratiques', 'A12/infosPratiquesCSI1-CSI2.pdf'),
(11, 3, 'CSI_A1', 'Calendrier Classes Préparatoires', 'A12/calendrier1213CSI1-CSI2.pdf'),
(12, 2, 'CSI_A2', 'Calendrier Classes Préparatoires', 'A12/calendrier1213CSI1-CSI2.pdf'),
(13, 3, 'CIR_BREST_A1', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Brest.pdf'),
(14, 3, 'CIR_RENNES_A1', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Rennes.pdf'),
(15, 2, 'CIR_BREST_A2', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Brest.pdf'),
(16, 2, 'CIR_RENNES_A2', 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Rennes.pdf'),
(18, 1, 'CIR_A3_ALT', 'Informations pratiques', 'A345/infosPratiquesCIR3.pdf'),
(19, 1, 'CIR_A3_NONALT', 'Informations pratiques', 'A345/infosPratiquesCIR3.pdf'),
(20, 2, 'CSI_A3', 'Calendrier CSI3', 'A345/calendrier1213CSI3.pdf'),
(21, 2, 'CIR_A3_ALT', 'Calendrier CIR3 alternant', 'A345/calendrier1213CIR3alternant.pdf'),
(22, 2, 'CIR_A3_NONALT', 'Calendrier CIR3 non alternant', 'A345/calendrier1213CIR3nonAlternant.pdf'),
(23, 2, 'CIPA_A3', 'Calendrier ITII3', 'A345/calendrier1213ITII3.pdf'),
(24, 7, 'CIPA_A3', 'Intégration rentrée', 'A345/integrationRentree2012ITII3-ITII4.pdf'),
(25, 2, 'CIPA_A4', 'Intégration rentrée', 'A345/integrationRentree2012ITII3-ITII4.pdf'),
(26, 1, 'CIPA_A4', 'Calendrier ITII4', 'A345/calendrier1213ITII4.pdf'),
(27, 1, 'CIPA_A5', 'Calendrier ITII5', 'A345/calendrier1213ITII5.pdf'),
(28, 2, 'M_A4', 'Calendrier M1', 'A345/calendrier1213M1.pdf'),
(29, 1, 'CSI_A3', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(30, 1, 'M_A4', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(31, 1, 'M_A5_ALT', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(32, 1, 'M_A5_NONALT', 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(33, 2, 'M_A5_ALT', 'Calendrier M2 alternant', 'A345/calendrier1213M2alternant.pdf'),
(34, 2, 'M_A5_NONALT', 'Calendrier M2 non alternant', 'A345/calendrier1213M2nonAlternant.pdf'),
(35, 4, 'CIR_BREST_A1', 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable2012CIR1.pdf'),
(36, 4, 'CIR_RENNES_A1', 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable2012CIR1.pdf'),
(37, 5, 'CIR_BREST_A1', 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDispositionPortable2012CIR1.pdf'),
(38, 5, 'CIR_RENNES_A1', 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDispositionPortable2012CIR1.pdf'),
(39, 6, 'CIR_BREST_A1', 'Note d''information assurance ordinateur portable', 'A12/noteInformationAssurancePortable2012CIR1.pdf'),
(40, 6, 'CIR_RENNES_A1', 'Note d''information assurance ordinateur portable', 'A12/noteInformationAssurancePortable2012CIR1.pdf'),
(41, 1, 'CIR_BREST_A1', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(42, 1, 'CIR_RENNES_A1', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(43, 1, 'CIR_BREST_A2', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(44, 1, 'CIR_RENNES_A2', 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(45, 2, 'CSI_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(46, 2, 'CIR_BREST_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(47, 2, 'CIR_RENNES_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(48, 1, 'BTSPREPA_A1', 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(49, 4, 'CSI_A1', 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(50, 2, 'BTSPREPA_A1', 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(51, 7, 'CIR_BREST_A1', 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(52, 3, 'CSI_A3', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable2012CSI3-ITII3.pdf'),
(53, 2, 'CIPA_A3', 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable2012CSI3-ITII3.pdf'),
(54, 4, 'CSI_A3', 'Dossier ordinateur portable', 'A345/dossierOrdinateurPortable2012CSI3-ITII3.pdf'),
(55, 3, 'CIPA_A3', 'Dossier ordinateur portable', 'A345/dossierOrdinateurPortable2012CSI3-ITII3.pdf'),
(56, 5, 'CSI_A3', 'Bon de commande ordinateur portable', 'A345/bonDeCommandePortable2012CSI3-ITII3.pdf'),
(57, 4, 'CIPA_A3', 'Bon de commande ordinateur portable', 'A345/bonDeCommandePortable2012CSI3-ITII3.pdf'),
(58, 6, 'CSI_A3', 'Note d''information assurance ordinateur portable', 'A345/noteInformationAssurancePortable2012CSI3-ITII3.pdf'),
(59, 5, 'CIPA_A3', 'Note d''information assurance ordinateur portable', 'A345/noteInformationAssurancePortable2012CSI3-ITII3.pdf'),
(60, 7, 'CSI_A3', 'Fiche d''adhésion assurance ordinateur portable', 'A345/ficheAdhesionAssurancePortable2012CSI3-ITII3.pdf'),
(61, 6, 'CIPA_A3', 'Fiche d''adhésion assurance ordinateur portable', 'A345/ficheAdhesionAssurancePortable2012CSI3-ITII3.pdf'),
(62, 9, '', 'Le mot du bureau des sports', 'BDS.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE IF NOT EXISTS `promo` (
  `id_promo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nom_promo` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `promo`
--

INSERT INTO `promo` (`id_promo`, `nom_promo`) VALUES
('BTSPREPA_A1', '1&#x02B3;&#x1D49; année, BTS Prépa'),
('BTSPREPA_A2', '2&#x1D49; année, BTS Prépa'),
('CIPA_A3', '3&#x1D49; année, Cycle Ingénieur Par l''Apprentissage'),
('CIPA_A4', '4&#x1D49; année, Cycle Ingénieur Par l''Apprentissage'),
('CIPA_A5', '5&#x1D49; année, Cycle Ingénieur Par l''Apprentissage'),
('CIR_A3_ALT', '3&#x1D49; année, Cycle Informatique et Réseaux (alternant)'),
('CIR_A3_NONALT', '3&#x1D49; année, Cycle Informatique et Réseaux (non alternant)'),
('CIR_BREST_A1', '1&#x02B3;&#x1D49; année, Cycle Informatique et Réseaux (Brest)'),
('CIR_BREST_A2', '2&#x1D49; année, Cycle Informatique et Réseaux (Brest)'),
('CIR_RENNES_A1', '1&#x02B3;&#x1D49; année, Cycle Informatique et Réseaux (Rennes)'),
('CIR_RENNES_A2', '2&#x1D49; année, Cycle Informatique et Réseaux (Rennes)'),
('CSI_A1', '1&#x02B3;&#x1D49; année, Cycle Sciences de l''Ingénieur'),
('CSI_A2', '2&#x1D49; année, Cycle Sciences de l''Ingénieur'),
('CSI_A3', '3&#x1D49; année, Cycle Sciences de l''Ingénieur'),
('M_A4', '4&#x1D49; année, Majeure - M1'),
('M_A5_ALT', '5&#x1D49; année, Majeure - M2 (alternant)'),
('M_A5_NONALT', '5&#x1D49; année, Majeure - M2 (non alternant)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
