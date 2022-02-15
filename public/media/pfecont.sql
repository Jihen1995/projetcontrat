-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 avr. 2021 à 11:11
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfecont`
--

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rappel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delai_reponse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id`, `user_id`, `path`, `created_at`, `status`, `rappel`, `delai_reponse`, `date_fin`, `date_debut`) VALUES
(11, 4, 'css.txt', '2021-04-06 00:08:51', 'submited', 'manuel', '3 jours', '6/4/2021', '9/4/2021'),
(12, 5, 'create-dialog.txt', '2021-04-06 00:26:06', 'refused', 'automatique', '04/092021', '09/4/2021', '12/4/2021'),
(13, 6, 'rapport3.docx', '2021-04-06 00:29:57', 'submited', 'automatique', '04/092021', '09/4/2021', '12/5/2021'),
(14, 3, 'typescript.txt', '2021-04-06 00:31:15', 'validated', 'automatique', '04/092021', '09/4/2021', '12/5/2021'),
(15, 5, 'typescript.txt', '2021-04-06 15:56:44', 'submited', 'manuel', '2/1/2021 14:30', '3/4/2021', '7/3/2021');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210401103201', '2021-04-01 10:32:39', 175),
('DoctrineMigrations\\Version20210401103932', '2021-04-01 10:39:39', 1406),
('DoctrineMigrations\\Version20210401133841', '2021-04-01 13:38:48', 446),
('DoctrineMigrations\\Version20210401153047', '2021-04-01 15:31:35', 941),
('DoctrineMigrations\\Version20210405213450', '2021-04-05 21:35:18', 323);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`) VALUES
(1, 'admin@gmail.com', 'adminadmin', 'ROLE_ADMIN', ''),
(2, 'f1@gmail.com', 'fournisseur1', 'ROLE_FOURNISSEUR', 'asma abid'),
(3, 'ahmedmanaa@gmail.com', 'ahmed123', 'ROLE_FOURNISSEUR', 'ahmed manaa'),
(4, 'karimfarjallah@gmail.com', 'karimsousse', 'ROLE_FOURNISSEUR', 'karim farjallah'),
(5, 'takwaabid@gmail.com', 'takwamahdia', 'ROLE_FOURNISSEUR', 'takwa abid'),
(6, 'amourabid@gmail.com', 'ro7jiji', 'ROLE_FOURNISSEUR', 'amour abid');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_60349993A76ED395` (`user_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `FK_60349993A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
