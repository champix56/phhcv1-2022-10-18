-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 18 oct. 2022 à 13:15
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `phh-22-10-18`
--
CREATE DATABASE IF NOT EXISTS `phh-22-10-18` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `phh-22-10-18`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) COLLATE latin1_general_ci NOT NULL DEFAULT 'NULL',
  `tva` decimal(10,2) NOT NULL DEFAULT 5.50,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `tva`) VALUES
(1, 'Alimentaire', '20.60'),
(2, 'Sport', '21.00'),
(3, 'Meubles', '12.00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_categories` int(11) NOT NULL,
  `nom` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `EAN` char(16) COLLATE latin1_general_ci DEFAULT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00,
  `description` varchar(512) COLLATE latin1_general_ci DEFAULT NULL,
  `image` varchar(256) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categories` (`id_categories`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `id_categories`, `nom`, `EAN`, `prix`, `description`, `image`) VALUES
(1, 1, 'kouign aman', NULL, '8.00', 'Gâteau breton a base de beurre et de sucre ', 'https://www.ideemiam.com/upload/images/article/768x400/img_2262.jpg'),
(2, 1, 'Far breton', NULL, '6.00', 'Gâteau breton au pruneaux', 'https://c1dd285b9e085ddb1966-b5ece2cd3a8c2c0d8bc51df36519794c.ssl.cf1.rackcdn.com/boire_vignettes/far-breton-drapeau-gateau.jpg'),
(5, 2, 'Velo route adulte 26\"', NULL, '2000.00', 'Vélo ultra léger en carbone. la Rolls des vélos de route', 'https://www.huezbikehire.com/wp-content/uploads/2020/11/PINARELLO-F12-NOIR-BLANC-1.jpg'),
(6, 2, 'Roller adulte Quad', NULL, '70.00', 'Les mêmes que dans votre jeunesse mais nouvelle génération avec des roulements et des roues de qualité sup.', 'https://contents.mediadecathlon.com/p2075969/k$def53920a7e5f3ba43154d1e8ec96ed6/sq/8542831.jpg?format=auto&f=800x0'),
(7, 3, 'Meuble tv type1', NULL, '149.99', 'Meuble tv de designer pour embellir votre salon. designer par un designer très à la mode en ce moment', 'https://media.but.fr/images_produits/produit-zoom/8600608215022_F.jpg');
COMMIT;
