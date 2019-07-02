-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 juil. 2019 à 00:59
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `finalproject`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `published_at` date NOT NULL,
  `summary` text NOT NULL,
  `content` longtext NOT NULL,
  `is_published` tinyint(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `published_at`, `summary`, `content`, `is_published`, `image`, `video`) VALUES
(1, 'Hellfest 2018, l\'affiche quasi-complète', '2017-01-06', 'Résumé de l\'article Hellfest', 'Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi.\r\n', 1, '0384757688.jpg', ''),
(2, 'Critique « Star Wars 8 – Les derniers Jedi » de Rian Johnson : le renouveau de la saga ?', '2017-01-07', 'Résumé de l\'article Star Wars 8', 'Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue.', 1, '2114918.jpg', ''),
(3, 'Revue - The Ramones', '2017-01-01', 'Résumé de l\'article The Ramones', 'Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh.', 1, '94949200.jpg', ''),
(4, 'De “Skyrim” à “L.A. Noire” ou “Doom” : pourquoi les vieux jeux sont meilleurs sur la Switch', '2017-01-03', 'Résumé de l\'article Switch', 'Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.', 1, '9384577.jpg', ''),
(5, 'Comment “Assassin’s Creed” trouve un nouveau souffle en Egypte', '2017-01-04', 'Résumé de l\'article Assassin’s Creed', 'Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar.\r\n', 1, '0293848.jpg', ''),
(6, 'BO de « Les seigneurs de Dogtown » : l’époque bénie du rock.', '2017-01-05', 'Résumé de l\'article Les seigneurs de Dogtown', 'Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula.', 1, '283743828.jpg', ''),
(9, '« Le Crime de l’Orient Express » : rencontre avec Kenneth Branagh', '2017-01-17', 'Résumé de l\'article Le Crime de l’Orient Express', 'Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat.', 1, '0937757.jpg', ''),
(50, 'Assassin\'s creed meilleur jeu du temps', '2019-04-14', 'c\'est la catastrophe', 'Odidier g hkjdshfdshfd sfhskfhskdfhdk fdff dfdfd df d f fd fdf fdfdfdffdf fdfdf d', 1, '60898.jpg', 'https://www.youtube.com/embed/z9zD8PaEbFs');

-- --------------------------------------------------------

--
-- Structure de la table `category_faq`
--

DROP TABLE IF EXISTS `category_faq`;
CREATE TABLE IF NOT EXISTS `category_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category_faq`
--

INSERT INTO `category_faq` (`id`, `name`) VALUES
(1, 'Gaming'),
(3, 'Cinéma'),
(4, 'Ramassage des poubelles');

-- --------------------------------------------------------

--
-- Structure de la table `city_images`
--

DROP TABLE IF EXISTS `city_images`;
CREATE TABLE IF NOT EXISTS `city_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `longitude` double(10,7) NOT NULL,
  `latitude` double(10,7) NOT NULL,
  `address` varchar(255) NOT NULL,
  `schedules` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `city_images`
--

INSERT INTO `city_images` (`id`, `title`, `images`, `longitude`, `latitude`, `address`, `schedules`) VALUES
(1, 'Mairie de Colmar', '75383858.jpg', 7.3579146, 48.0794001, '1 Place de la Mairie, 68000 Colmar', 'Ouvert du lundi au vendredi de 8h30 - 17H30'),
(2, 'Piscine municipale', '9483782.jpg', 7.3371079, 48.0803523, '2 Rue Robert Schuman, 68000 Colmar', 'Ouvert du lundi au dimanche de 8h30 - 17H30'),
(3, 'Les marchés publics ', '0987274.jpg', 7.3595695, 48.0746043, '13 Rue des Écoles, 68000 Colmar', 'Ouvert du mardi au dimanche de 8h00 - 17H00'),
(4, 'Pôle emploi', '9374645.jpg', 7.3553868, 48.0864202, '45 Rue de la Fecht, 68000 Colmar', 'Ouvert du lundi au dimanche de 8h30 - 12H30'),
(5, 'Ecole primaire', '7578385.jpg', 7.3514755, 48.0842107, '20 Rue Henry Wilhelm, 68000 Colmar', 'Ouvert du lundi au dimanche de 8h30 - 17H30');

-- --------------------------------------------------------

--
-- Structure de la table `city_informations`
--

DROP TABLE IF EXISTS `city_informations`;
CREATE TABLE IF NOT EXISTS `city_informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `informations` text NOT NULL,
  `illustration` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `city_informations`
--

INSERT INTO `city_informations` (`id`, `informations`, `illustration`) VALUES
(1, 'Colmar est une ville de la région Grand Est, au nord-est de la France, à proximité de la frontière avec l\'Allemagne. Sa vieille ville est dotée de ruelles pavées, bordées d\'édifices médiévaux à colombages ou du début de l\'époque Renaissance. \r\n\r\nL\'église gothique Saint-Martin, datant du XIIIe siècle, se trouve sur la place de la Cathédrale, en plein centre. La ville est située sur la route des vins d\'Alsace, et les vignobles locaux sont spécialisés dans la production de vins de Riesling et de Gewürztraminer.', '98487998.jpg'),
(2, 'Colmar (/kɔlmaʁ/, en alsacien : Kulmer /kuːlmər/ Écouter) est une commune française du département du Haut-Rhin. Préfecture du département, elle fait partie, depuis le 1er janvier 2016, de la région Grand Est.\r\n\r\nColmar se trouve dans la région historique et culturelle d\'Alsace.\r\n\r\nElle comptait près de 70 000 habitants au dernier recensement en 2016, ce qui en fait la deuxième commune haut-rhinoise et la troisième commune alsacienne en nombre d\'habitants après Strasbourg et Mulhouse. \r\n\r\nColmar a choisi de se lier à ces dernières au sein du pôle métropolitain d\'Alsace qui fédère les grandes agglomérations alsaciennes dans le but de peser au sein de la nouvelle région Grand Est. Ses habitants sont appelés les Colmariens.', '98984844.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `coordonnees`
--

DROP TABLE IF EXISTS `coordonnees`;
CREATE TABLE IF NOT EXISTS `coordonnees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `schedules` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coordonnees`
--

INSERT INTO `coordonnees` (`id`, `tel`, `fax`, `image`, `schedules`, `title`) VALUES
(1, '03 89 20 68 68', '03 89 23 97 19', '09484758.jpg', 'Les services (hors démarches administratives) de la Mairie vous accueillent :\r\n        Du lundi au vendredi de 08h30 à 12h00 et de 14h00 à 17h30\r\n\r\nLes services \"état civil\" et \"élections / fichier domiciliaire\" vous accueillent :\r\n        Du lundi au jeudi de 8h30 à 12h et de 14h à 17h30\r\n        Le vendredi de 8h30 à 12h et de 14h à 19h\r\n\r\nLe service des cartes nationales d\'identité (CNI) / passeports vous accueille :\r\n        Pour le retrait des dossiers, des CNI et des passeports :\r\n                Du lundi au jeudi de 8h30 à 12h et de 14h à 17h30\r\n                Le vendredi de 8h30 à 12h et de 14h à 19h\r\n\r\nPour le dépôt des dossiers :\r\n        Du lundi au jeudi de 8h30 à 11h30 et de 14h à 17h\r\n        Le vendredi de 8h30 à 11h30 et de 14h à 18h30\r\n\r\nLe service des archives vous accueille :\r\n        Les lundi, mercredi et jeudi de 13h30 à 17h\r\n        Les mardi et vendredi de 8h30 à 12h', 'Horaires & Coordonnées');

-- --------------------------------------------------------

--
-- Structure de la table `details`
--

DROP TABLE IF EXISTS `details`;
CREATE TABLE IF NOT EXISTS `details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `motif_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `details`
--

INSERT INTO `details` (`id`, `subject`, `motif_id`) VALUES
(1, 'Mobiliers', 1),
(2, 'Revêtements', 1),
(3, 'signalisations au sol', 1),
(4, 'Parcs', 2),
(5, 'Squares', 2),
(6, 'Aires de jeu', 2),
(7, 'Espaces ornementaux', 2),
(8, 'Feux tricolores', 3),
(9, 'Panneaux directionnels', 3),
(10, 'Panneaux sectorisations', 3),
(11, 'Poubelles', 4),
(12, 'Ramassages', 4),
(13, 'Dégradations', 4),
(14, 'propreté de la voirie', 4);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `factures`
--

INSERT INTO `factures` (`id`, `name`, `date`, `user_id`) VALUES
(10, '705754963.pdf', '2019-07-03', 2);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` varchar(255) NOT NULL,
  `responses` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `questions`, `responses`, `categorie_id`) VALUES
(1, 'Qui est le fabricant de ASUS ?', 'La marque ASUS est une société taïwanaise d\'informatique spécialisée dans la fabrication d\'ordinateurs portables, hybrides 2 en 1, de bureau, tablettes et smartphones. C\'est le cinquième constructeur mondial d\'informatique derrière Lenovo, HP, et DELL, et ACER. La marque fait partie des meilleures marques d\'ordinateur.', 1),
(6, 'Déchets : horaires et jours de passage ?', '<p>vers 7H du matin du lundi au vendredi&nbsp;</p>', 4);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `name`, `article_id`) VALUES
(33, '1824802580.jpg', 9);

-- --------------------------------------------------------

--
-- Structure de la table `mentions_legales`
--

DROP TABLE IF EXISTS `mentions_legales`;
CREATE TABLE IF NOT EXISTS `mentions_legales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mentions_legales`
--

INSERT INTO `mentions_legales` (`id`, `text`) VALUES
(1, 'CRÉDITS PHOTOGRAPHIQUES\r\nToutes les photographies présentées sur ce site sont protégées par le Code de la Propriété Intellectuelle et Artistique.\r\n \r\nCertaines peuvent être reproduites à condition d’avoir obtenu l’autorisation écrite de la Ville de Colmar et \r\nd’en indiquer l’auteur et la source.\r\n\r\nCes demandes doivent être adressées à :\r\nHôtel de Ville\r\nDirection de la communication\r\n1, place de la Mairie – BP 50528\r\n68021 COLMAR Cedex\r\n\r\nLes photographies sont pour la majorité, la propriété exclusive de la société Pictural, Colmar. \r\nL\'ensemble des sociétés ayant contribué à la création et à la mise en place de ce site ne peuvent être tenues pour responsable\r\nd\'éventuels dommages, directs ou indirects, pouvant découler de votre accès ou de l’utilisation de ce site.\r\n\r\nDe plus, la Ville ne saurait être tenue responsable d\'un dommage ou virus qui pourrait infecter votre ordinateur ou\r\ntout matériel informatique , suite à un simple accès au site ou à un téléchargement provenant de ce site.');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motif` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `explications` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `motif`, `detail`, `email`, `explications`) VALUES
(45, '5', 'je gagnes ', 'edarouj@hotmail.com', 'echec et mat'),
(35, '5', 'comprend rien ', 'lol@hotmail.com', 'je suis foutu'),
(34, '5', 'pietons', 'elie@hotmail.com', 'pietons traverse dangereusement'),
(51, '1', '1', 'lolo@hotmail.com', 'plus de courant'),
(49, '3', '8', 'zizou@hotmail.fr', 'panne'),
(50, '1', '1', 'lola@hotmail.com', 'maison endommagé'),
(52, '1', '1', 'lolo@hotmail.com', 'plus de courant');

-- --------------------------------------------------------

--
-- Structure de la table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motif` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `report`
--

INSERT INTO `report` (`id`, `motif`) VALUES
(1, 'Voirie '),
(2, 'Espaces verts'),
(3, 'Signalisations'),
(4, 'Propreté '),
(5, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `adress` varchar(255) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `phone_number` varchar(255) DEFAULT NULL,
  `dateOfBorn` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `password`, `is_admin`, `adress`, `is_confirmed`, `phone_number`, `dateOfBorn`) VALUES
(1, 'DAHROUJ', 'Elie', 'edarouj@hotmail.com', '9cdfb439c7876e703e307864c9167a15', 1, '11 rue thionville\r\n75013 Paris', 1, '', '1970-01-01'),
(2, 'Edward', 'Marco', 'marco@hotmail.com', 'f9824ba4a0c1053d3c448d752236fe4f', 0, '60 quai de jemmapes', 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
