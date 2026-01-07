-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 17 août 2025 à 15:35
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scierie`
--

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

CREATE TABLE `home` (
  `id` int(1) NOT NULL,
  `titre` text NOT NULL,
  `descr` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `home`
--

INSERT INTO `home` (`id`, `titre`, `descr`, `img`) VALUES
(2, 'Vous recherchez la meilleure essence de bois pour vos parquets ou lambris ?', 'La SCIERIE DU FARGAL vous donne toutes les solutions et vous fournit votre matériel. C\'est une entreprise familiale comptant plus de 40 ans d\'expérience dans la fourniture, la transformation et la livraison de bois pour les professionnels comme les particuliers. L\'EURL GINESTE Laurent de MONTBAZENS (12) met tout son savoir-faire et son expertise à votre disposition. Profitez-en !', 'img2.jpg'),
(3, 'Votre expert en bois dans l\'Aveyron', 'Nous avons le sens du service et nous sommes à votre écoute en vous indiquant le meilleur choix suivant votre utilisation pour concrétiser vos projets. Quelle que soit votre demande ou vos besoins, les Ets GINESTE Laurent, vous assurent un accueil chaleureux et très professionnel pour répondre à toutes vos sollicitations et attentes.', 'img4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(1) NOT NULL,
  `titre` text NOT NULL,
  `descr` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `titre`, `descr`, `img`) VALUES
(1, 'Le séchoir à bois', 'Le séchage naturel du bois est  nécessaire pour une bonne utilisation du bois, qu\'il soit destiné au chauffage, à la charpente, à la menuiserie ou à l\'ébénisterie. C\'est un avantage majeur pour la commercialisation des produits.', 'sechoir.jpeg'),
(2, 'Les poutres', 'Grosse pièce de bois servant de support pour la charpente', 'poutre.jpg'),
(3, 'Les lambourdes', 'Poutrelle indispensable au support du parquet', 'lambourde.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE `support` (
  `suId` int(11) NOT NULL,
  `suNom` varchar(255) NOT NULL,
  `suEmail` varchar(255) NOT NULL,
  `suSub` text NOT NULL,
  `suMsg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `support`
--

INSERT INTO `support` (`suId`, `suNom`, `suEmail`, `suSub`, `suMsg`) VALUES
(1, 'Hugo', 'hugo-vican@hotmail.fr', 'Test', 'Ceci est un message de test'),
(2, 'Hugo', 'hugo-vican@hotmail.fr', 'Avis', 'Super le nouveau site!');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userId` varchar(255) NOT NULL,
  `userPwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userId`, `userPwd`) VALUES
('Admin', 'f6a2ba9e9f2eacfd71ebac8ec00804db'),
('Paul', '202cb962ac59075b964b07152d234b70'),
('User', '25b4378b833e32ba992154c705f4b848'),
('Xav', '202cb962ac59075b964b07152d234b70');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`suId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `support`
--
ALTER TABLE `support`
  MODIFY `suId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
