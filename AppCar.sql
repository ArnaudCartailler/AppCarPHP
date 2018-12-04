-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 04 Décembre 2018 à 10:28
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `AppCar`
--

-- --------------------------------------------------------

--
-- Structure de la table `Vehicles`
--

CREATE TABLE `Vehicles` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `type` enum('cars','trucks','motors') NOT NULL,
  `color` varchar(30) NOT NULL,
  `spec` varchar(300) NOT NULL,
  `doors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Vehicles`
--

INSERT INTO `Vehicles` (`id`, `brand`, `type`, `color`, `spec`, `doors`) VALUES
(24, 'sqdfghj', 'cars', 'erty', 'sqdfghjkl', 45),
(26, 'zertyuhj', 'trucks', 'azertyu', 'zesrdtfyuhj', 456);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Vehicles`
--
ALTER TABLE `Vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Vehicles`
--
ALTER TABLE `Vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
