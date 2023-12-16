-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 jan. 2022 à 16:34
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `username`, `password`) VALUES
(1, 'reda', 'reda123', '147258');

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

CREATE TABLE `approvisionnement` (
  `produitID` int(4) NOT NULL,
  `fournisseurID` int(4) DEFAULT NULL,
  `quantite` int(10) DEFAULT NULL,
  `date` date NOT NULL,
  `idApp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `approvisionnement`
--

INSERT INTO `approvisionnement` (`produitID`, `fournisseurID`, `quantite`, `date`, `idApp`) VALUES
(15, 7, 4, '2022-01-05', 25),
(16, 8, 7, '2021-12-28', 26),
(14, 6, 2, '2021-12-30', 27);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(2) NOT NULL,
  `intitule` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `intitule`) VALUES
(9, 'Chaussure'),
(10, 'Jeans'),
(11, 'Capuche');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` varchar(12) NOT NULL DEFAULT '0',
  `nom` varchar(40) NOT NULL,
  `tele` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `tele`, `email`, `adresse`) VALUES
('HH00000', 'Hamid', '02262656262', 'hamidox@gmail.com', 'RUE 88 Qu lafarawila Knitra'),
('HH11111', 'Samira', '0766655215', 'SamiraUWU@gmail.com', 'RUE 7 jnan 3illan SAFI');

-- --------------------------------------------------------

--
-- Structure de la table `commende`
--

CREATE TABLE `commende` (
  `CIN` varchar(12) NOT NULL,
  `refP` int(4) NOT NULL,
  `datec` date NOT NULL,
  `quantite` int(30) NOT NULL,
  `idCommende` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commende`
--

INSERT INTO `commende` (`CIN`, `refP`, `datec`, `quantite`, `idCommende`) VALUES
('HH00000', 14, '2022-01-05', 5, 10);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(4) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `tel`, `email`, `adresse`) VALUES
(6, 'Simo', '0607070707', 'Rue 11 ville nouvelle Safi', 'simo@gmail.com'),
(7, 'Reda', '0607070708', 'Rue 7 ville nouvelle Safi', 'redox@gmail.com'),
(8, 'Nour', '0650002001', 'Rue 9 ville nouvelle Safi', 'nour@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ref` int(4) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `prix_uni` double(6,2) NOT NULL,
  `stock` int(4) NOT NULL,
  `prix_vente` double(254,0) NOT NULL,
  `pic` blob DEFAULT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ref`, `libelle`, `prix_uni`, `stock`, `prix_vente`, `pic`, `id_cat`) VALUES
(14, 'Nike CR7', 300.00, 7, 400, NULL, 9),
(15, 'Capuche Zara', 100.00, 4, 200, NULL, 11),
(16, 'Jeans Celio', 200.00, 7, 400, NULL, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD PRIMARY KEY (`idApp`),
  ADD KEY `approvisionnement_ibfk_1` (`produitID`),
  ADD KEY `fournisseurID` (`fournisseurID`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commende`
--
ALTER TABLE `commende`
  ADD PRIMARY KEY (`idCommende`),
  ADD KEY `refP` (`refP`),
  ADD KEY `CIN` (`CIN`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  MODIFY `idApp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `commende`
--
ALTER TABLE `commende`
  MODIFY `idCommende` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ref` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD CONSTRAINT `approvisionnement_ibfk_1` FOREIGN KEY (`produitID`) REFERENCES `produit` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `approvisionnement_ibfk_2` FOREIGN KEY (`fournisseurID`) REFERENCES `fournisseur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commende`
--
ALTER TABLE `commende`
  ADD CONSTRAINT `commende_ibfk_1` FOREIGN KEY (`refP`) REFERENCES `produit` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commende_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
