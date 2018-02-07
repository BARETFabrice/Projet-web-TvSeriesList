-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2018 at 09:14 AM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexsiro_tvserieslist`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `idAdministrateur` int(11) NOT NULL,
  `pseudonyme` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE `Article` (
  `idArticle` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Critique`
--

CREATE TABLE `Critique` (
  `idCritique` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `idSaison` int(11) NOT NULL,
  `idEpisode` int(11) NOT NULL,
  `note` tinyint(4) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Episode`
--

CREATE TABLE `Episode` (
  `idEpisode` int(11) NOT NULL,
  `idSaison` int(11) NOT NULL,
  `numero` smallint(5) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text,
  `datePremiere` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Liste`
--

CREATE TABLE `Liste` (
  `idListe` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `visibilite` enum('public','friends','private') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Log`
--

CREATE TABLE `Log` (
  `idLog` int(11) NOT NULL,
  `idObjet` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Membre`
--

CREATE TABLE `Membre` (
  `idMembre` int(11) NOT NULL,
  `pseudonyme` varchar(64) NOT NULL,
  `motDePasse` varchar(64) NOT NULL,
  `courriel` varchar(128) NOT NULL,
  `notification` tinyint(1) NOT NULL,
  `auteur` tinyint(1) NOT NULL,
  `moderateur` tinyint(1) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Saison`
--

CREATE TABLE `Saison` (
  `idSaison` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `numero` tinyint(3) UNSIGNED NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `image` blob NOT NULL,
  `fini` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Serie`
--

CREATE TABLE `Serie` (
  `idSerie` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `image` blob NOT NULL,
  `fini` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Serie-Liste`
--

CREATE TABLE `Serie-Liste` (
  `idSerieListe` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idListe` int(11) NOT NULL,
  `idProchainEpisode` int(11) DEFAULT NULL,
  `etat` enum('Watching','Completed','On-Hold','Dropped','Plan to Watch') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tag`
--

CREATE TABLE `Tag` (
  `idTag` int(11) NOT NULL,
  `idSerie` int(11) DEFAULT NULL,
  `idTagType` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tag-Article`
--

CREATE TABLE `Tag-Article` (
  `idTagArticle` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tag-Serie`
--

CREATE TABLE `Tag-Serie` (
  `idTagSerie` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TagType`
--

CREATE TABLE `TagType` (
  `idTagType` int(11) NOT NULL,
  `type` enum('serie','acteur','genre','chaine','autre') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`idAdministrateur`);

--
-- Indexes for table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Indexes for table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`idCommentaire`);

--
-- Indexes for table `Critique`
--
ALTER TABLE `Critique`
  ADD PRIMARY KEY (`idCritique`);

--
-- Indexes for table `Episode`
--
ALTER TABLE `Episode`
  ADD PRIMARY KEY (`idEpisode`);

--
-- Indexes for table `Liste`
--
ALTER TABLE `Liste`
  ADD PRIMARY KEY (`idListe`);

--
-- Indexes for table `Log`
--
ALTER TABLE `Log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `Membre`
--
ALTER TABLE `Membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Indexes for table `Saison`
--
ALTER TABLE `Saison`
  ADD PRIMARY KEY (`idSaison`);

--
-- Indexes for table `Serie`
--
ALTER TABLE `Serie`
  ADD PRIMARY KEY (`idSerie`);

--
-- Indexes for table `Serie-Liste`
--
ALTER TABLE `Serie-Liste`
  ADD PRIMARY KEY (`idSerieListe`);

--
-- Indexes for table `Tag`
--
ALTER TABLE `Tag`
  ADD PRIMARY KEY (`idTag`);

--
-- Indexes for table `Tag-Article`
--
ALTER TABLE `Tag-Article`
  ADD PRIMARY KEY (`idTagArticle`);

--
-- Indexes for table `Tag-Serie`
--
ALTER TABLE `Tag-Serie`
  ADD PRIMARY KEY (`idTagSerie`);

--
-- Indexes for table `TagType`
--
ALTER TABLE `TagType`
  ADD PRIMARY KEY (`idTagType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `idAdministrateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Article`
--
ALTER TABLE `Article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Critique`
--
ALTER TABLE `Critique`
  MODIFY `idCritique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Episode`
--
ALTER TABLE `Episode`
  MODIFY `idEpisode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Liste`
--
ALTER TABLE `Liste`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Log`
--
ALTER TABLE `Log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Membre`
--
ALTER TABLE `Membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Saison`
--
ALTER TABLE `Saison`
  MODIFY `idSaison` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Serie`
--
ALTER TABLE `Serie`
  MODIFY `idSerie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Serie-Liste`
--
ALTER TABLE `Serie-Liste`
  MODIFY `idSerieListe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Tag`
--
ALTER TABLE `Tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Tag-Article`
--
ALTER TABLE `Tag-Article`
  MODIFY `idTagArticle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Tag-Serie`
--
ALTER TABLE `Tag-Serie`
  MODIFY `idTagSerie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TagType`
--
ALTER TABLE `TagType`
  MODIFY `idTagType` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
