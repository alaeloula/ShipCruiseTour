-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 09 jan. 2023 à 09:56
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shipcruisetour`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_ch` int NOT NULL,
  `prix` int NOT NULL,
  `id_t` int DEFAULT NULL,
  `id_navire` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_ch`, `prix`, `id_t`, `id_navire`) VALUES
(1, 12, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `croisiere`
--

CREATE TABLE `croisiere` (
  `id_croisiere` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_navire` int NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `nbr_nuit` int DEFAULT NULL,
  `port_depart` int DEFAULT NULL,
  `date_depart` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `croisiere`
--

INSERT INTO `croisiere` (`id_croisiere`, `title`, `id_navire`, `image`, `nbr_nuit`, `port_depart`, `date_depart`) VALUES
(1, 'alaa', 1, 'mouse4.jpg', 22, 1, '2023-01-05'),
(2, 'alaa', 1, 'mouse4.jpg', 22, 1, '2023-01-05'),
(26, 'amin wld 9ahba', 1, 'computer3.jpg', 22, 1, '2023-01-05'),
(27, 'fff', 1, 'mouse1.jpg', 22, 1, '2023-01-13');

-- --------------------------------------------------------

--
-- Structure de la table `navire`
--

CREATE TABLE `navire` (
  `id_n` int NOT NULL,
  `nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `navire`
--

INSERT INTO `navire` (`id_n`, `nom`) VALUES
(1, 'navire 1'),
(6, 'bmW');

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

CREATE TABLE `port` (
  `id_p` int NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`id_p`, `nom`, `pays`) VALUES
(1, 'Madrid', 'Spain'),
(35, 'tangermed', 'morroco'),
(36, 'mexixo', 'mexico');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reserv` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `id_croisiere` int DEFAULT NULL,
  `date_reserv` date DEFAULT NULL,
  `prix_reserv` double DEFAULT NULL,
  `id_chambre` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_croisiere` int NOT NULL,
  `id_port` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_croisiere`, `id_port`) VALUES
(27, 35),
(27, 36);

-- --------------------------------------------------------

--
-- Structure de la table `type_chambre`
--

CREATE TABLE `type_chambre` (
  `id_t` int NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `price` int NOT NULL,
  `quantite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `type_chambre`
--

INSERT INTO `type_chambre` (`id_t`, `type`, `price`, `quantite`) VALUES
(1, 'solo', 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_u` int NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `name`, `email`, `password`, `role`) VALUES
(14, 'alaa', 'alaa@gmail.com', '$2y$10$Dv3Ltj64aa3DAI1PlR0cxOSMtoSCJqyPN6H6TJXG7QWUjU2Lk39rq', 1),
(15, 'bogmla', 'bogmla@gmail.com', '$2y$10$Dv3Ltj64aa3DAI1PlR0cxOSMtoSCJqyPN6H6TJXG7QWUjU2Lk39rq', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_ch`),
  ADD KEY `chambre_ibfk_1` (`id_t`),
  ADD KEY `fk_navire` (`id_navire`);

--
-- Index pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD PRIMARY KEY (`id_croisiere`),
  ADD KEY `port_depart` (`port_depart`),
  ADD KEY `croisiere_ibfk_2` (`id_navire`);

--
-- Index pour la table `navire`
--
ALTER TABLE `navire`
  ADD PRIMARY KEY (`id_n`);

--
-- Index pour la table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id_p`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reserv`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_croisiere` (`id_croisiere`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_croisiere`,`id_port`),
  ADD KEY `fk_port` (`id_port`);

--
-- Index pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  ADD PRIMARY KEY (`id_t`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_ch` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `croisiere`
--
ALTER TABLE `croisiere`
  MODIFY `id_croisiere` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `navire`
--
ALTER TABLE `navire`
  MODIFY `id_n` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `port`
--
ALTER TABLE `port`
  MODIFY `id_p` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reserv` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  MODIFY `id_t` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `type_chambre` (`id_t`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `croisiere`
--
ALTER TABLE `croisiere`
  ADD CONSTRAINT `croisiere_ibfk_1` FOREIGN KEY (`port_depart`) REFERENCES `port` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `croisiere_ibfk_2` FOREIGN KEY (`id_navire`) REFERENCES `navire` (`id_n`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `user` (`id_u`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_croisiere`) REFERENCES `croisiere` (`id_croisiere`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_ch`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `fk_croisiere` FOREIGN KEY (`id_croisiere`) REFERENCES `croisiere` (`id_croisiere`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_port` FOREIGN KEY (`id_port`) REFERENCES `port` (`id_p`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
