-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 juin 2022 à 13:04
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `les_petits_clous`
--

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `idComptence` int(11) NOT NULL AUTO_INCREMENT,
  `nomCompetence` varchar(20) NOT NULL,
  PRIMARY KEY (`idComptence`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`idComptence`, `nomCompetence`) VALUES
(1, 'Concevoir'),
(2, 'Decouper'),
(3, 'Percer'),
(4, 'Assembler'),
(5, 'Mesurer'),
(6, 'Tracer'),
(7, 'Dessiner'),
(8, 'Scier'),
(9, 'Couper'),
(10, 'Coller'),
(11, 'Decoller'),
(12, 'Nouer'),
(13, 'Scotcher'),
(14, 'Emboiter'),
(15, 'Embrocher'),
(16, 'Poncer');

-- --------------------------------------------------------

--
-- Structure de la table `listcompetence`
--

DROP TABLE IF EXISTS `listcompetence`;
CREATE TABLE IF NOT EXISTS `listcompetence` (
  `idListCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `idCompetence1` int(11) NOT NULL,
  `idCompetence2` int(11) NOT NULL,
  `idCompetence3` int(11) NOT NULL,
  `idCompetence4` int(11) NOT NULL,
  PRIMARY KEY (`idListCompetence`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listcompetence`
--

INSERT INTO `listcompetence` (`idListCompetence`, `idCompetence1`, `idCompetence2`, `idCompetence3`, `idCompetence4`) VALUES
(1, 1, 2, 3, 4),
(2, 1, 5, 6, 8),
(3, 1, 6, 9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `listmateriaux`
--

DROP TABLE IF EXISTS `listmateriaux`;
CREATE TABLE IF NOT EXISTS `listmateriaux` (
  `idListMateriaux` int(11) NOT NULL AUTO_INCREMENT,
  `idMateriaux1` int(11) NOT NULL,
  `idMateriaux2` int(11) NOT NULL,
  `idMateriaux3` int(11) NOT NULL,
  PRIMARY KEY (`idListMateriaux`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listmateriaux`
--

INSERT INTO `listmateriaux` (`idListMateriaux`, `idMateriaux1`, `idMateriaux2`, `idMateriaux3`) VALUES
(1, 11, 22, 23),
(2, 15, 11, 24),
(3, 14, 11, 15);

-- --------------------------------------------------------

--
-- Structure de la table `listoutil`
--

DROP TABLE IF EXISTS `listoutil`;
CREATE TABLE IF NOT EXISTS `listoutil` (
  `idListOutil` int(11) NOT NULL AUTO_INCREMENT,
  `idOutil1` int(11) NOT NULL,
  `idOutil2` int(11) NOT NULL,
  `idOutil3` int(11) NOT NULL,
  PRIMARY KEY (`idListOutil`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `listoutil`
--

INSERT INTO `listoutil` (`idListOutil`, `idOutil1`, `idOutil2`, `idOutil3`) VALUES
(1, 8, 21, 22),
(2, 8, 22, 23);

-- --------------------------------------------------------

--
-- Structure de la table `materiaux`
--

DROP TABLE IF EXISTS `materiaux`;
CREATE TABLE IF NOT EXISTS `materiaux` (
  `idMateriaux` int(11) NOT NULL AUTO_INCREMENT,
  `nomMateriaux` varchar(20) NOT NULL,
  PRIMARY KEY (`idMateriaux`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiaux`
--

INSERT INTO `materiaux` (`idMateriaux`, `nomMateriaux`) VALUES
(1, 'Bois'),
(2, 'Metal'),
(3, 'Aluminium'),
(4, 'Moteur'),
(5, 'Clou'),
(6, 'Vis'),
(7, 'Plastique'),
(8, 'Bouchon de bouteille'),
(9, 'Bouteille'),
(10, 'Boite en carton'),
(11, 'Carton'),
(12, 'Pot de yahourt'),
(13, 'Chambre à air'),
(14, 'Scotch'),
(15, 'Ficelle'),
(16, 'Ecrou'),
(17, 'Boulon'),
(18, 'Batterie'),
(19, 'Cable'),
(20, 'Ampoule'),
(21, 'LED'),
(22, 'Pic en bois'),
(23, 'Batonnet de colle'),
(24, 'Canette');

-- --------------------------------------------------------

--
-- Structure de la table `outillage`
--

DROP TABLE IF EXISTS `outillage`;
CREATE TABLE IF NOT EXISTS `outillage` (
  `idOutil` int(11) NOT NULL AUTO_INCREMENT,
  `nomOutil` varchar(20) NOT NULL,
  PRIMARY KEY (`idOutil`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `outillage`
--

INSERT INTO `outillage` (`idOutil`, `nomOutil`) VALUES
(1, 'Marteau'),
(2, 'Tournevis'),
(3, 'Pince'),
(4, 'Clef 10'),
(5, 'Clef 11'),
(6, 'Clef 12'),
(7, 'Clef 13'),
(8, 'Ciseaux '),
(9, 'Scie'),
(10, 'Perceuse'),
(11, 'Tournevis plat'),
(12, 'Riveteuse'),
(13, 'Papier abrasif 80'),
(14, 'Papier abrasif 120'),
(15, 'Papier abrasif 400'),
(16, 'Papier abrasif 600'),
(17, 'Papier abrasif 1000'),
(18, 'Papier abrasif 2000'),
(19, 'Papier abrasif 3000'),
(20, 'Papier abrasif 5000'),
(21, 'Pistolet a colle'),
(22, 'Cutter'),
(23, 'Vrille a bois'),
(24, 'Couteau');

-- --------------------------------------------------------

--
-- Structure de la table `tuto`
--

DROP TABLE IF EXISTS `tuto`;
CREATE TABLE IF NOT EXISTS `tuto` (
  `idTuto` int(11) NOT NULL AUTO_INCREMENT,
  `nomTuto` varchar(20) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `temps` int(11) NOT NULL,
  `docPatron` varchar(200) NOT NULL,
  `lienRessource` varchar(500) NOT NULL,
  `idListOutil` int(11) NOT NULL,
  `idListMateriaux` int(11) NOT NULL,
  `idListCompetence` int(11) NOT NULL,
  PRIMARY KEY (`idTuto`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tuto`
--

INSERT INTO `tuto` (`idTuto`, `nomTuto`, `niveau`, `temps`, `docPatron`, `lienRessource`, `idListOutil`, `idListMateriaux`, `idListCompetence`) VALUES
(1, 'Babyfoot', 'Facile', 2, '', 'https://dl.airtable.com/.attachments/52914e40319bb10bab566a35d512957f/c3514a4c/baby-foot-tutoriel.jpg', 1, 1, 1),
(2, 'Jeu de billes', 'Difficile', 2, '', 'https://s1.qwant.com/thumbr/0x380/8/d/fbf5c4936e745f75e243dd965a92be1696d18565d366a4042ea6b0e0e3b332/acd4fab69bcebe217b87edb3f3a3b02e.jpg?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fac%2Fd4%2Ffa%2Facd4fab69bcebe217b87edb3f3a3b02e.jpg&q=0&b=1&p=0&a=0', 1, 1, 2),
(3, 'Trousse', 'Facile', 1, '', 'https://www.jeuxetcompagnie.fr/wp-content/uploads/2014/05/boite-crayon-fanta-6.jpg', 1, 2, 3),
(4, 'Vase', 'Normal', 2, '', 'https://mom.maison-objet.com/fr/produit/2513/cache-cache-vase', 2, 3, 3),
(5, 'Herisson', 'Difficile', 2, '', 'https://i.pinimg.com/564x/a2/c8/79/a2c8793690ce7f2c98b92af77b4f9aae.jpg', 2, 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
