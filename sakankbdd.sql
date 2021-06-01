-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 01 juin 2021 à 22:39
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sakankbdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  `nom_image` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_image`, `id_offre`, `nom_image`) VALUES
(38, 55, 'Images/1159.jpg'),
(39, 55, 'Images/2916.jpg'),
(44, 36, 'Images/7065.jpg'),
(45, 56, 'Images/461862.png'),
(59, 64, 'Images/9091824.jpg'),
(60, 64, ' Images/9255694.jpg'),
(61, 58, 'Images/607214.jpg'),
(66, 59, 'Images/3965540.jpg'),
(67, 65, 'Images/1918822.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id_offre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `prix_offre` int(11) NOT NULL,
  `nom_offre` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_ajout_offre` timestamp NOT NULL DEFAULT current_timestamp(),
  `localisation_ville_offre` varchar(255) COLLATE utf8_bin NOT NULL,
  `localisation_quartier_offre` varchar(255) COLLATE utf8_bin NOT NULL,
  `superficie_offre` int(11) NOT NULL,
  `type_offre` varchar(255) COLLATE utf8_bin NOT NULL,
  `categorie_offre` varchar(255) COLLATE utf8_bin NOT NULL,
  `nmbre_pieces_offre` int(11) DEFAULT NULL,
  `nmbre_saledebain` int(11) DEFAULT NULL,
  `description_offre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `installations_offre` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id_offre`, `id_user`, `prix_offre`, `nom_offre`, `date_ajout_offre`, `localisation_ville_offre`, `localisation_quartier_offre`, `superficie_offre`, `type_offre`, `categorie_offre`, `nmbre_pieces_offre`, `nmbre_saledebain`, `description_offre`, `installations_offre`) VALUES
(33, 1, 10000000, 'maison a vende', '2020-08-13 23:23:02', 'AGADIR', 'CARRIERE DAYDAY', 12, 'Vente', 'Appartements', 1, 6, '\0B\0e\0d\0o\0u\0i\0n\0 \0D\0i\0s\0c\0o\0g\0r\0a\0p\0h\0y\0 \0M\0i\0x\0 \0(\0C\0y\0a\0n\0t\0i\0s\0t\0 \0C\0o\0n\0t\0i\0n\0u\0o\0u\0s\0 \0M\0i\0x\0)\0\r\0\n', '0010000000'),
(36, 1, 1250000, 'lebron James', '0000-00-00 00:00:00', 'AGADIR', 'ASSOUSSI', 2222, 'Vente', 'Appartements', 3, 7, '\0h\0t\0t\0p\0:\0/\0/\0l\0o\0c\0a\0l\0h\0o\0s\0t\0/\0A\0n\0n\0o\0n\0c\0e\0/\0d\0i\0s\0p\0o\0s\0e\0r\0_\0a\0n\0n\0o\0n\0c\0e\0.\0p\0h\0p', '0000000000'),
(38, 1, 1250000, 'l', '2020-08-20 12:44:24', 'AGADIR', 'CAMPING INTERNATIONAL', 4444, 'Vente', 'Appartements', 1, 1, '\0h\0t\0t\0p\0:\0/\0/\0l\0o\0c\0a\0l\0h\0o\0s\0t\0/\0A\0n\0n\0o\0n\0c\0e\0/\0d\0i\0s\0p\0o\0s\0e\0r\0_\0a\0n\0n\0o\0n\0c\0e\0.\0p\0h\0p', '1000000001'),
(54, 1, 6666666, 'houssam', '2020-08-20 13:37:08', 'AIT AMIRA', 'DOUAR SOUISSE', 666, 'Location (Par mois)', 'Terrains et Fermes', 5, 5, 'Bad Meets Evil - Fast Lane ft. Eminem, Royce Da l\"chantillion', '1100000001'),
(55, 1, 888, 'massirrr', '2020-08-24 12:23:55', 'AGOURAI', 'HAY ALLAL', 100, 'Vente', 'Appartements', 1, 1, 'Marilyn Manson and Tyler Bates performing Sweet Dreams (Acoustic) live on italian TV show MUSICdddddd', '1000011111'),
(56, 1, 125000, 'houssam', '2021-05-25 20:13:35', 'AGADIR', 'CITE BALNEAIRE', 152, 'Vente', 'Appartements', 1, 1, 'eeeeeeeeeeeeeeeeeeeeeee', '0000000000'),
(58, 1, 150000, 'rzdc', '2021-05-26 12:34:10', 'AGADIR', 'BLOC LOGEMENT SOCIAL EL KHIAM', 70, 'Vente', 'Appartements', 1, 1, '35kllllllllkkkkkkkkkkkkk', '0010000010'),
(59, 1, 2000000, 'test22', '2021-05-26 12:40:58', 'AIN EL ORMA', 'DOUAR OUM SULTAN	50022', 80, 'Vente', 'Appartements', 1, 1, 'uyyyyyyyyyyyyyyyyyyy', '1000000101'),
(64, 1, 200000, 'appart', '2021-06-01 20:47:32', 'CASABLANCA', 'AL MADINA EL JADIDA	', 100, 'Vente', 'Appartements', 5, 2, 'pzzzzzzzzzzzzzzzzfnnnnnnnnnnnnnnnnnnnccccccccccccc', '1010000100'),
(65, 1, 125000, 'apart22', '2021-06-01 21:33:52', 'AIN EL ORMA', 'DOUAR OUM SULTAN	50022', 222, 'Vente', 'Terrains et Fermes', 1, 1, 'aparttttttttttttttttttttttttt', '0100010000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom_complet_user` varchar(255) COLLATE utf8_bin NOT NULL,
  `num_tel_user` varchar(13) COLLATE utf8_bin NOT NULL,
  `email_user` varchar(255) COLLATE utf8_bin NOT NULL,
  `hashwprd` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_complet_user`, `num_tel_user`, `email_user`, `hashwprd`) VALUES
(1, 'EL aich houssam', '038594713', 'yu.linkin@gmail.com', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_offre` (`id_offre`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id_offre`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id_offre`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `offres_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
