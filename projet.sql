-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 juil. 2023 à 20:21
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(255) NOT NULL,
  `date_debut` date NOT NULL,
  `motif` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `Id_utilisateur` int(100) NOT NULL,
  `date_jour` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id`, `date_debut`, `motif`, `document`, `Id_utilisateur`, `date_jour`, `date_fin`) VALUES
(1, '2023-07-07', '                                 maladie\r\n\r\n             \r\n            ', 'images (4).jpg', 2, '2023-07-07', '2023-07-07');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `confirmer_mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profession` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `telephone`, `mot_de_passe`, `confirmer_mot_de_passe`, `email`, `profession`) VALUES
(1, 'nom', 'prnom', '0101010101', 'admin', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `demande_permission`
--

CREATE TABLE `demande_permission` (
  `id` int(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `date_fin` varchar(255) NOT NULL,
  `type_absence` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL,
  `status_demande` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `demande_permission`
--

INSERT INTO `demande_permission` (`id`, `date_debut`, `date_fin`, `type_absence`, `descriptions`, `document`, `Id_utilisateur`, `status_demande`) VALUES
(1, '2023-07-14', '2023-07-07', '                 rutho \r\n            ', '                 rara \r\n            ', 'images (8).jpg', 2, 'accepté');

-- --------------------------------------------------------

--
-- Structure de la table `manager`
--

CREATE TABLE `manager` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `confirmer_mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profession` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `manager`
--

INSERT INTO `manager` (`id`, `nom`, `prenom`, `telephone`, `mot_de_passe`, `confirmer_mot_de_passe`, `email`, `profession`) VALUES
(1, 'ibo', 'aurelle', '010101010', 'demo12345', 'demo12345', 'aurelle@gmail.com', ' fg');

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `id` int(255) NOT NULL,
  `date_jour` date NOT NULL,
  `heure_arrivee` varchar(255) NOT NULL,
  `heure_sortie` varchar(255) DEFAULT NULL,
  `Id_utilisateur` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`id`, `date_jour`, `heure_arrivee`, `heure_sortie`, `Id_utilisateur`) VALUES
(10, '2023-07-07', '15:12:18', '17:12:25', 2);

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE `profession` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`id`, `nom`) VALUES
(1, 'fg'),
(2, 'RH'),
(3, 'developpeur'),
(4, 'administrateur groupr'),
(5, 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `confirmer_mot_de_passe` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `nom`, `prenom`, `telephone`, `mot_de_passe`, `confirmer_mot_de_passe`, `profession`, `email`) VALUES
(3, 'attokpa', 'achou', '010101010', '(((((', '(((((', ' autre', 'attokpaachouester@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_permission`
--
ALTER TABLE `demande_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demande_permission`
--
ALTER TABLE `demande_permission`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `presence`
--
ALTER TABLE `presence`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
