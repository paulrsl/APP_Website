-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 avr. 2020 à 13:21
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personId` int(255) DEFAULT NULL,
  `acceptationId` int(255) DEFAULT NULL,
  `validated` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `personId`, `acceptationId`, `validated`) VALUES
(1, 3, 3, 1),
(2, 1, NULL, 0),
(3, 7, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` int(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `adminId`, `question`, `answer`, `language`) VALUES
(21, 3, 'Question ?', 'Answer !', 'EN');

-- --------------------------------------------------------

--
-- Structure de la table `gtu`
--

DROP TABLE IF EXISTS `gtu`;
CREATE TABLE IF NOT EXISTS `gtu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  `lastChangeDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gtu`
--

INSERT INTO `gtu` (`id`, `text`, `lastChangeDate`, `language`) VALUES
(1, 'GTU v1 ', '2020-04-14 10:30:03', 'EN'),
(2, 'CGU v1', '2020-04-14 10:30:19', 'FR');

-- --------------------------------------------------------

--
-- Structure de la table `infoshandicap`
--

DROP TABLE IF EXISTS `infoshandicap`;
CREATE TABLE IF NOT EXISTS `infoshandicap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handicapEN` varchar(255) DEFAULT NULL,
  `handicapFR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infoshandicap`
--

INSERT INTO `infoshandicap` (`id`, `handicapEN`, `handicapFR`) VALUES
(1, 'Blinded', 'Aveugle'),
(2, 'Alzheimer', 'Alzheimer'),
(3, 'Deaf', 'Sourd');

-- --------------------------------------------------------

--
-- Structure de la table `infosjob`
--

DROP TABLE IF EXISTS `infosjob`;
CREATE TABLE IF NOT EXISTS `infosjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobEN` varchar(255) DEFAULT NULL,
  `jobFR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infosjob`
--

INSERT INTO `infosjob` (`id`, `jobEN`, `jobFR`) VALUES
(1, 'Engineer', 'Ingénieur'),
(2, 'Firefighter', 'Pompier'),
(3, 'Soldier', 'Soldat');

-- --------------------------------------------------------

--
-- Structure de la table `infossport`
--

DROP TABLE IF EXISTS `infossport`;
CREATE TABLE IF NOT EXISTS `infossport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sportEN` varchar(255) DEFAULT NULL,
  `sportFR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `infossport`
--

INSERT INTO `infossport` (`id`, `sportEN`, `sportFR`) VALUES
(1, 'Football', 'Football'),
(2, 'Handball', 'Handball'),
(3, 'Basketball', 'Basketball');

-- --------------------------------------------------------

--
-- Structure de la table `linkhandicap`
--

DROP TABLE IF EXISTS `linkhandicap`;
CREATE TABLE IF NOT EXISTS `linkhandicap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(255) DEFAULT NULL,
  `handicapId` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `linkjob`
--

DROP TABLE IF EXISTS `linkjob`;
CREATE TABLE IF NOT EXISTS `linkjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(255) DEFAULT NULL,
  `jobId` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `linkjob`
--

INSERT INTO `linkjob` (`id`, `userId`, `jobId`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `linksport`
--

DROP TABLE IF EXISTS `linksport`;
CREATE TABLE IF NOT EXISTS `linksport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(255) DEFAULT NULL,
  `sportId` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `linksport`
--

INSERT INTO `linksport` (`id`, `userId`, `sportId`) VALUES
(1, 1, 2),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `organism`
--

DROP TABLE IF EXISTS `organism`;
CREATE TABLE IF NOT EXISTS `organism` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personId` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contactMail` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postalCode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `organismType` varchar(255) DEFAULT NULL,
  `validated` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `organism`
--

INSERT INTO `organism` (`id`, `personId`, `name`, `contactMail`, `address`, `country`, `city`, `postalCode`, `phone`, `organismType`, `validated`) VALUES
(1, 2, 'Tototécole', 'tototecole@gmail.com', 'Ici mais pas là bas', 'Sur Terre', 'Perdue', '00000', '0666666666', 'auto-école', 1),
(2, 6, 'Name', 'Mail@mail', 'address', 'country', 'city', 'postal code', 'phone number', 'Name', 0);

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

DROP TABLE IF EXISTS `person`;
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `typeAccess` varchar(255) NOT NULL,
  `language` varchar(255) DEFAULT 'EN',
  `picture` varchar(255) DEFAULT 'defaultPicture.jpg',
  `registrationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `person`
--

INSERT INTO `person` (`id`, `mail`, `password`, `firstName`, `lastName`, `typeAccess`, `language`, `picture`, `registrationDate`) VALUES
(1, 'user@user', 'passe', 'Gillian', 'GUEGUEN', 'user', 'EN', 'defaultPicture.jpg', '2020-04-18 09:02:19'),
(2, 'organism@organism', 'passe', 'Gillian', 'GUEGUEN', 'organism', 'EN', 'defaultPicture.jpg', '2020-04-18 09:02:19'),
(3, 'admin@admin', 'passe', 'Gillian', 'GUEGUEN', 'admin', 'EN', 'defaultPicture.jpg', '2020-04-18 09:02:19'),
(4, 'admin2@admin2', 'passe', 'Gillian', 'GUEGUEN', 'admin', 'EN', 'defaultPicture.jpg', '2020-04-18 14:24:30'),
(5, 'organism2@organism2', 'passe', 'Gillian', 'GUEGUEN', 'organism', 'EN', 'defaultPicture.jpg', '2020-04-18 14:39:05'),
(6, 'organism2@organism2', 'passe', 'Gillian', 'GUEGUEN', 'organism', 'EN', 'defaultPicture.jpg', '2020-04-18 14:40:29'),
(7, 'mail@mail', 'passe', 'Gillian', 'GUEGEUN', 'admin', 'EN', 'defaultPicture.jpg', '2020-04-18 16:05:50');

-- --------------------------------------------------------

--
-- Structure de la table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(255) DEFAULT NULL,
  `testDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `idTone` int(255) DEFAULT NULL,
  `idVisualStimulus` int(255) DEFAULT NULL,
  `idSoundStimulus` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `testschedule`
--

DROP TABLE IF EXISTS `testschedule`;
CREATE TABLE IF NOT EXISTS `testschedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visualStimulus` tinyint(1) DEFAULT NULL,
  `soundStimulus` tinyint(1) DEFAULT NULL,
  `tone` tinyint(1) DEFAULT NULL,
  `testPassed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `testsoundstimulus`
--

DROP TABLE IF EXISTS `testsoundstimulus`;
CREATE TABLE IF NOT EXISTS `testsoundstimulus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTest` int(255) DEFAULT NULL,
  `value` int(255) DEFAULT NULL,
  `heartBeat` int(255) DEFAULT NULL,
  `temperature` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `testtone`
--

DROP TABLE IF EXISTS `testtone`;
CREATE TABLE IF NOT EXISTS `testtone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTest` int(255) DEFAULT NULL,
  `value` int(255) DEFAULT NULL,
  `heartBeat` int(255) DEFAULT NULL,
  `temperature` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `testvisualstimulus`
--

DROP TABLE IF EXISTS `testvisualstimulus`;
CREATE TABLE IF NOT EXISTS `testvisualstimulus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTest` int(255) DEFAULT NULL,
  `value` int(255) DEFAULT NULL,
  `heartBeat` int(255) DEFAULT NULL,
  `temperature` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(255) DEFAULT NULL,
  `adminId` int(255) DEFAULT NULL,
  `questionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `answerDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `personId` int(255) DEFAULT NULL,
  `organismId` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `personId`, `organismId`, `birthdate`, `sex`, `comment`) VALUES
(1, 1, '1', '1999-12-23', 'man', 'Ceci est mon commentaire pour donner plus d\'explications sur moi                        ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
