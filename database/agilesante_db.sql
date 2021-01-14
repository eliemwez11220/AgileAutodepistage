-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 03 juil. 2020 à 17:38
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agilesante_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_aides`
--

CREATE TABLE `tb_doc_aides` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` text,
  `issue` text,
  `date_logged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note_status` enum('active','archive') NOT NULL DEFAULT 'active',
  `asset_role` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_aides`
--

INSERT INTO `tb_doc_aides` (`id`, `name`, `email`, `subject`, `issue`, `date_logged`, `note_status`, `asset_role`) VALUES
(1, 'elie mwez rubuz', 'info@congoagile.net', 'personne dont la temperature est elevee', 'nous portons connaissances a un cas suspect d\'une personne dont la temperature est elevee par rapport a la normale', '2020-05-15 11:58:24', 'active', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_articles`
--

CREATE TABLE `tb_doc_articles` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(75) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(75) DEFAULT NULL,
  `post_file` varchar(75) DEFAULT NULL,
  `post_video` varchar(75) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `post_source` varchar(75) DEFAULT NULL,
  `post_slug` varchar(90) DEFAULT NULL,
  `post_statut` varchar(25) DEFAULT 'brouillon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_articles`
--

INSERT INTO `tb_doc_articles` (`post_id`, `post_title`, `post_content`, `post_image`, `post_file`, `post_video`, `date_created`, `category_id`, `post_source`, `post_slug`, `post_statut`) VALUES
(4, 'COVID-19 RDC', '<p>\n	COVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19 RDCCOVID-19</p>\n<p>\n	&nbsp;</p>\n', '68dbd-praticien_001.png', '22781-school-management-application.pdf', NULL, '2020-03-29 07:19:23', 1, 'Elie Mwez', 'covid-19-drc', 'brouillon'),
(5, 'Deuxieme article publish', '<p>\r\n	Le contenu du deuxieme article de la pandemie COVID-19</p>\r\n', 'ab288-flutter_portfolio-elie-mwez.png', NULL, NULL, '0000-00-00 00:00:00', 1, 'Ministere de la sante', 'deuxieme-article', 'online');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_assets`
--

CREATE TABLE `tb_doc_assets` (
  `id_asset` int(11) NOT NULL,
  `asset_name` varchar(40) NOT NULL,
  `asset_username` varchar(50) DEFAULT NULL,
  `asset_password` varchar(60) DEFAULT NULL,
  `asset_email` varchar(255) DEFAULT NULL,
  `asset_type` varchar(20) DEFAULT 'utilisateur',
  `asset_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `asset_connected` timestamp NULL DEFAULT NULL,
  `asset_status` varchar(11) DEFAULT 'online',
  `asset_role` varchar(50) NOT NULL DEFAULT 'agent',
  `asset_active` enum('oui','non') NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_assets`
--

INSERT INTO `tb_doc_assets` (`id_asset`, `asset_name`, `asset_username`, `asset_password`, `asset_email`, `asset_type`, `asset_created`, `asset_connected`, `asset_status`, `asset_role`, `asset_active`) VALUES
(1, 'sarah kapinga', 'kapinga', '$2y$12$CN4QJVaDVV9bB3SNmeIOI.lV5O/8TlwBY0jzB00tQojCjlI70KFta', 'kapinga@congoagile.net', 'utilisateur', '2020-05-20 08:41:29', '2020-05-20 08:29:41', 'online', 'Personnel Soignant', 'non'),
(2, 'elie mwez rubuz', 'eliemwez', '$2y$12$97qRcd3L7/du0TkDiZ8xguLN1BQscLmRpb3vPTWHDMqVaW1l3pbFC', 'mwez.rubuz@congoagile.net', 'administrateur', '2020-06-26 13:11:28', '2020-06-26 13:28:11', 'online', 'administrateur', 'oui'),
(3, 'mohamed emar', 'mohamed', '$2y$12$7ZGWmuSiC8LCbk2tpsCucunsBOQ0D/bnTCIph5wk3ribmyZ9NXWJS', 'mwez.rubuz@yahoo.com', 'utilisateur', '2020-06-04 10:56:37', '2020-06-04 10:37:56', 'online', 'Agent Ministere Sante', 'non'),
(4, 'betty mwila', 'betty.mwila', '$2y$12$s.p338pwCyF7jKL1h/nz8uw6aU5fZHmEXbU/b1orjA21FH8sE6nvu', 'betty.mwila@gmail.com', 'utilisateur', '2020-06-07 21:24:33', NULL, 'online', 'Manager', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_cabinets`
--

CREATE TABLE `tb_doc_cabinets` (
  `cabinet_id` int(11) NOT NULL,
  `cabinet_fullname` varchar(75) DEFAULT NULL,
  `cabinet_address` text,
  `praticien_id` int(11) DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `cabinet_phone` varchar(25) DEFAULT NULL,
  `cabinet_resume` text,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `cabinet_email` varchar(75) DEFAULT NULL,
  `access_code` varchar(10) DEFAULT NULL,
  `cabinet_file_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_cabinets`
--

INSERT INTO `tb_doc_cabinets` (`cabinet_id`, `cabinet_fullname`, `cabinet_address`, `praticien_id`, `ville_id`, `cabinet_phone`, `cabinet_resume`, `date_created`, `cabinet_email`, `access_code`, `cabinet_file_url`) VALUES
(1, 'polycliniques saint-joseph', '<p>\n	lubumbashi haut-katanga</p>\n', 1, 1, '2525120032', '<p>\n	ipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum loremipsum lorem</p>\n', '2020-03-29 07:19:23', 'psjoseph@gmail.com', 'doc-001', '63027-tokdoc_monganga_analyseproject_-_elie_mwez_rubuz.docx');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_categories`
--

CREATE TABLE `tb_doc_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(75) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_categories`
--

INSERT INTO `tb_doc_categories` (`category_id`, `category_name`, `date_created`) VALUES
(1, 'Sante', '2020-03-29 08:20:21'),
(2, 'Societe', '2020-03-29 07:19:23'),
(3, 'Justice', '2020-06-08 00:44:04');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_communes`
--

CREATE TABLE `tb_doc_communes` (
  `commune_id` int(11) NOT NULL,
  `nom_commune` varchar(75) NOT NULL,
  `commune_description` text,
  `date_created` datetime DEFAULT NULL,
  `ville_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_communes`
--

INSERT INTO `tb_doc_communes` (`commune_id`, `nom_commune`, `commune_description`, `date_created`, `ville_id`) VALUES
(1, 'Lubumbashi', '<p>\r\n	La commune Lubumbashi</p>\r\n', '2020-06-08 06:18:22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_depistages`
--

CREATE TABLE `tb_doc_depistages` (
  `dep_id` int(11) NOT NULL,
  `dep_fullname` varchar(75) NOT NULL,
  `dep_age` varchar(25) NOT NULL,
  `dep_date_day` date NOT NULL,
  `dep_symptomes` text,
  `dep_antecedents` text,
  `dep_voyage` text,
  `dep_international` text,
  `dep_contact` text,
  `dep_date_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dep_statut` enum('lastIn','firstIn') NOT NULL DEFAULT 'firstIn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_depistages`
--

INSERT INTO `tb_doc_depistages` (`dep_id`, `dep_fullname`, `dep_age`, `dep_date_day`, `dep_symptomes`, `dep_antecedents`, `dep_voyage`, `dep_international`, `dep_contact`, `dep_date_update`, `dep_statut`) VALUES
(2, 'francois cheche', 'moins de 18 ans', '2020-06-01', 'douleur a travers le corps', 'maladies ou infections qui rendent plus difficile la toux', 'j\'ai visite une zone ou covid-19 se repand', 'oui, j\'ai voyage a l\'international', 'j\'etais pres de quelqu\'un qui a covid-19 au moins de 2\r\n                                                            metres et je n\'ai pas ete expose une toux ou un eternueement.', '2020-06-01 05:44:08', 'firstIn'),
(3, 'elie mwez', '18-64 ans', '2020-06-01', 'fievre, froid ou transpiration', 'maladies ou infections qui rendent plus difficile la toux', 'j\'ai visite une zone ou covid-19 se repand', 'oui, j\'ai voyage a l\'international', 'j\'etais en contact avec quelqu\'un qui a covid-19 pendant 10\r\n                                                            minutes. j\'etais expose\r\n                                                            dans 2 metres de quelqu\'un qui est malade de la toux ou\r\n                                                            eternueements.', '2020-06-01 06:07:40', 'firstIn'),
(6, 'betty mwila', '18-64 ans', '2020-06-01', 'essouflement', 'insuffisance cardiaque', 'j\'ai visite une zone ou covid-19 se repand', 'oui, j\'ai voyage a l\'international', 'je vis avec quelqu\'un qui a covid-19', '2020-06-01 06:30:16', 'lastIn'),
(7, 'mohamed rubuz', 'moins de 18 ans', '2020-06-01', 'vomissement ou diarrhee', 'systeme immunitaire affaibli', 'je vis la ou covid-19 se repand', 'non, je n\'ai pas voyage a l\'international', 'je vis avec quelqu\'un qui a covid-19', '2020-06-01 06:33:37', 'lastIn');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_logs`
--

CREATE TABLE `tb_doc_logs` (
  `log_id` int(11) NOT NULL,
  `log_username` varchar(75) NOT NULL,
  `log_contenu` text,
  `log_statut` varchar(75) NOT NULL DEFAULT 'online',
  `log_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_passswords`
--

CREATE TABLE `tb_doc_passswords` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_patients`
--

CREATE TABLE `tb_doc_patients` (
  `patient_id` int(11) NOT NULL,
  `patient_fullname` varchar(75) NOT NULL,
  `patient_address` text,
  `patient_phone` varchar(25) DEFAULT NULL,
  `patient_email` varchar(75) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `office_address` text,
  `patient_profession` varchar(75) DEFAULT NULL,
  `office_phone` varchar(75) DEFAULT NULL,
  `personne_contact` int(11) DEFAULT NULL,
  `patient_temperature` varchar(25) DEFAULT NULL,
  `patient_maps` text,
  `patient_symptome` text,
  `patient_taille` varchar(75) DEFAULT NULL,
  `patient_poids` varchar(75) DEFAULT NULL,
  `patient_age` varchar(10) DEFAULT NULL,
  `commune_habitee` varchar(25) DEFAULT NULL,
  `piece_jointe` varchar(75) DEFAULT NULL,
  `patient_resume` text,
  `pays_provenance` varchar(75) DEFAULT NULL,
  `date_heure_entree` datetime DEFAULT NULL,
  `poste_frontalier` varchar(25) DEFAULT NULL,
  `nom_chauffeur` varchar(75) DEFAULT NULL,
  `numero_plaque` varchar(10) DEFAULT NULL,
  `date_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `patient_status` enum('Online','Offline') NOT NULL DEFAULT 'Online',
  `patient_code_access` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_patients`
--

INSERT INTO `tb_doc_patients` (`patient_id`, `patient_fullname`, `patient_address`, `patient_phone`, `patient_email`, `date_created`, `office_address`, `patient_profession`, `office_phone`, `personne_contact`, `patient_temperature`, `patient_maps`, `patient_symptome`, `patient_taille`, `patient_poids`, `patient_age`, `commune_habitee`, `piece_jointe`, `patient_resume`, `pays_provenance`, `date_heure_entree`, `poste_frontalier`, `nom_chauffeur`, `numero_plaque`, `date_update`, `patient_status`, `patient_code_access`) VALUES
(1, 'chirene melanie', '25, des rosiers, bel-air, kampemba, lubumbashi\r\n\r\n', '0821733330', 'chirene@congoagile.net', '2020-03-29 08:23:21', NULL, NULL, NULL, NULL, '35.25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'France', NULL, NULL, NULL, NULL, '2020-05-15 12:53:16', 'Online', NULL),
(2, 'mwila betty', '25 des rosiers, annexe', '858533285', 'mwez.rubuz@yahoo.com', '2020-05-07 11:32:32', 'journaliste@gmail.com', '', '821733330@gmail.com', 2, '36.8', 'kampemba', 'ras', '1.25', '62.5', '25', '', '', '', 'Australie', NULL, NULL, NULL, NULL, '2020-05-13 11:15:33', 'Online', NULL),
(4, 'chirene mewen', '25 des rosiers, annexe', '977090011', 'emar.ruchi1@gmail.com', '2020-05-07 12:14:35', '11220, one way, lushi', '', '821733330', 2, '35.9', 'kampemba', 'ras', '1.50', '62.5', '42', '', '', '', 'Canada', NULL, NULL, NULL, NULL, '2020-05-13 11:15:43', 'Online', NULL),
(5, 'francois cheche', 'lubumbashi, haut-katanga', '0821733330', 'francois@congoagile.net', '2020-05-13 15:52:20', 'commercant', '', '858533555', 5, '37.12', '', 'rien a signaler', '1.20', '55', '22', '', '', '', 'angolan', '2020-05-13 00:00:00', 'angola', 'zangulu', 'cgo11220kl', '2020-05-15 12:57:44', 'Online', NULL),
(6, 'francois maya tim', 'likasi, kaponda', '0821733333', 'tim@gmail.com', '2020-05-13 16:03:39', 'vendeur', '', '', 5, '36.10', '', 'rien a signaler', '1.25', '58', '26', '', '', '', 'angolan', '2020-05-13 00:00:00', 'angola', 'zangulu', 'cgo11220kl', '2020-05-15 17:43:31', 'Online', NULL),
(7, 'yyyy eeee1', 'eeee1', '0200000000000000000000000', 'eliemwez@gmail.com', '2020-05-20 10:16:28', 'wwww', '', '12000000000', 7, '45.23', '', '', '1.25', '75', '25', '', '', '', 'angolan', '2020-05-20 00:00:00', 'kasumbalesa', 'yamba', 'pl001/gf', '2020-05-20 10:19:04', 'Online', NULL),
(8, 'ddddd ddd', '25, rue des rosiers, naviundu, haut-katanga rdc', '0977090011', 'eliemwez1@gmail.com', '2020-06-18 10:56:14', 'ssssss', '', '0977090011', 7, '39.23', 'ssssss', 'sssss', '1.25', '75', '25', '', '', 'ssssss', 'french', '2020-06-18 00:00:00', 'kasumbalesa', 'Élie mwez rubuz', 'pl001/gf', '0000-00-00 00:00:00', 'Online', NULL),
(9, 'yyyyfffff eeee1tttttttttttttt', '25, rue des rosiers, naviundu, haut-katanga rdc', '0977090011', 'eliemwez@gmail.com', '2020-06-18 10:58:50', 'ssssss', '', '0977090011', 7, '35.23', 'ssssss', 'sssss', '1.25', '75', '25', '', '', 'ffffffffffffffffffff', 'french', '2020-06-18 00:00:00', 'kasumbalesa', 'Élie mwez rubuz', 'pl001/gf', '0000-00-00 00:00:00', 'Online', NULL),
(10, 'rrrrrrrrrrrrrrryyyy eliemwez', '25, rue des rosiers, naviundu, haut-katanga rdc', '0977090011', 'eliemwez3@gmail.com', '2020-06-18 11:02:40', 'eliemwez', '', '0977090011', 7, '35.23', 'ssssss', 'eliemwez', '1.25', '75', '25', '', '', 'eliemwezeliemwezeliemwezeliemwez', 'angolan', '2020-06-18 00:00:00', 'angola', 'Élie mwez rubuz', 'pl001/gf', '0000-00-00 00:00:00', 'Online', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_pays`
--

CREATE TABLE `tb_doc_pays` (
  `pays_id` int(11) NOT NULL,
  `libelle` varchar(75) NOT NULL,
  `nombre` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_pays`
--

INSERT INTO `tb_doc_pays` (`pays_id`, `libelle`, `nombre`, `date_created`, `date_update`) VALUES
(1, 'French', 1, '2020-05-13 15:14:46', '2020-05-13 16:31:21'),
(2, 'Australian', 1, '2020-05-13 15:14:46', '2020-05-13 16:32:03'),
(3, 'Canada', 1, '2020-05-13 15:14:46', '2020-05-13 16:31:59'),
(4, 'angolan', 4, '2020-05-13 15:52:20', '2020-06-18 11:02:40'),
(5, 'french', 1, '2020-06-18 10:56:14', '2020-06-18 10:56:14'),
(6, 'french', 1, '2020-06-18 10:58:50', '2020-06-18 10:58:50');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_praticiens`
--

CREATE TABLE `tb_doc_praticiens` (
  `praticien_id` int(11) NOT NULL,
  `praticien_fullname` varchar(75) DEFAULT NULL,
  `praticien_speciality` varchar(75) DEFAULT NULL,
  `praticien_home_address` text,
  `praticien_office_address` text,
  `praticien_email` varchar(75) DEFAULT NULL,
  `praticien_phone` varchar(75) DEFAULT NULL,
  `praticien_matricule` varchar(25) DEFAULT NULL,
  `praticien_resume` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `praticien_file_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_praticiens`
--

INSERT INTO `tb_doc_praticiens` (`praticien_id`, `praticien_fullname`, `praticien_speciality`, `praticien_home_address`, `praticien_office_address`, `praticien_email`, `praticien_phone`, `praticien_matricule`, `praticien_resume`, `date_created`, `praticien_file_url`) VALUES
(1, 'mwewa nsenga', 'chirurgien', '<p>\n	25, des rosiers, bel-air, kampemba, lubumbashi</p>\n', '<p>\n	11220, one way, bel-air, kampemba, lubumbashi</p>\n', 'nsenga@gmail.com', '0251202203', '11220', '<p>\n	lorem iplorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum</p>\n', '2020-03-29 07:20:21', 'f2249-tokdoc_monganga_analyseproject_-_elie_mwez_rubuz.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_provinces`
--

CREATE TABLE `tb_doc_provinces` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_provinces`
--

INSERT INTO `tb_doc_provinces` (`province_id`, `province_name`) VALUES
(1, 'Haut-Katanga'),
(2, 'Kinshasa');

-- --------------------------------------------------------

--
-- Structure de la table `tb_doc_villes`
--

CREATE TABLE `tb_doc_villes` (
  `ville_name` varchar(75) NOT NULL,
  `ville_codepostal` varchar(25) DEFAULT NULL,
  `ville_id` int(11) NOT NULL,
  `province_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_doc_villes`
--

INSERT INTO `tb_doc_villes` (`ville_name`, `ville_codepostal`, `ville_id`, `province_id`) VALUES
('Lubumbashi', '2223', 1, 1),
('Likasi', '2225', 2, 1),
('Kinshasa', '2220', 3, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_doc_aides`
--
ALTER TABLE `tb_doc_aides`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tb_doc_articles`
--
ALTER TABLE `tb_doc_articles`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `tb_doc_assets`
--
ALTER TABLE `tb_doc_assets`
  ADD PRIMARY KEY (`id_asset`),
  ADD UNIQUE KEY `asset_email` (`asset_email`);

--
-- Index pour la table `tb_doc_cabinets`
--
ALTER TABLE `tb_doc_cabinets`
  ADD PRIMARY KEY (`cabinet_id`),
  ADD KEY `praticien_id` (`praticien_id`),
  ADD KEY `ville_id` (`ville_id`);

--
-- Index pour la table `tb_doc_categories`
--
ALTER TABLE `tb_doc_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Index pour la table `tb_doc_communes`
--
ALTER TABLE `tb_doc_communes`
  ADD PRIMARY KEY (`commune_id`);

--
-- Index pour la table `tb_doc_depistages`
--
ALTER TABLE `tb_doc_depistages`
  ADD PRIMARY KEY (`dep_id`);

--
-- Index pour la table `tb_doc_logs`
--
ALTER TABLE `tb_doc_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Index pour la table `tb_doc_passswords`
--
ALTER TABLE `tb_doc_passswords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `tb_doc_patients`
--
ALTER TABLE `tb_doc_patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Index pour la table `tb_doc_pays`
--
ALTER TABLE `tb_doc_pays`
  ADD PRIMARY KEY (`pays_id`);

--
-- Index pour la table `tb_doc_praticiens`
--
ALTER TABLE `tb_doc_praticiens`
  ADD PRIMARY KEY (`praticien_id`);

--
-- Index pour la table `tb_doc_provinces`
--
ALTER TABLE `tb_doc_provinces`
  ADD PRIMARY KEY (`province_id`),
  ADD UNIQUE KEY `province_name` (`province_name`);

--
-- Index pour la table `tb_doc_villes`
--
ALTER TABLE `tb_doc_villes`
  ADD PRIMARY KEY (`ville_id`),
  ADD UNIQUE KEY `ville_name` (`ville_name`),
  ADD KEY `province_id` (`province_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_doc_aides`
--
ALTER TABLE `tb_doc_aides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_doc_articles`
--
ALTER TABLE `tb_doc_articles`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tb_doc_assets`
--
ALTER TABLE `tb_doc_assets`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tb_doc_cabinets`
--
ALTER TABLE `tb_doc_cabinets`
  MODIFY `cabinet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_doc_categories`
--
ALTER TABLE `tb_doc_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tb_doc_communes`
--
ALTER TABLE `tb_doc_communes`
  MODIFY `commune_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_doc_depistages`
--
ALTER TABLE `tb_doc_depistages`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tb_doc_logs`
--
ALTER TABLE `tb_doc_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_doc_passswords`
--
ALTER TABLE `tb_doc_passswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tb_doc_patients`
--
ALTER TABLE `tb_doc_patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tb_doc_pays`
--
ALTER TABLE `tb_doc_pays`
  MODIFY `pays_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tb_doc_praticiens`
--
ALTER TABLE `tb_doc_praticiens`
  MODIFY `praticien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tb_doc_provinces`
--
ALTER TABLE `tb_doc_provinces`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tb_doc_villes`
--
ALTER TABLE `tb_doc_villes`
  MODIFY `ville_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tb_doc_articles`
--
ALTER TABLE `tb_doc_articles`
  ADD CONSTRAINT `tb_doc_articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_doc_categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tb_doc_cabinets`
--
ALTER TABLE `tb_doc_cabinets`
  ADD CONSTRAINT `tb_doc_cabinets_ibfk_1` FOREIGN KEY (`praticien_id`) REFERENCES `tb_doc_praticiens` (`praticien_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_doc_cabinets_ibfk_2` FOREIGN KEY (`ville_id`) REFERENCES `tb_doc_villes` (`ville_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tb_doc_passswords`
--
ALTER TABLE `tb_doc_passswords`
  ADD CONSTRAINT `tb_doc_passswords_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tb_doc_assets` (`asset_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tb_doc_villes`
--
ALTER TABLE `tb_doc_villes`
  ADD CONSTRAINT `tb_doc_villes_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `tb_doc_provinces` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
