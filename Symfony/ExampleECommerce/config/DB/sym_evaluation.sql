-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 août 2021 à 14:51
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sym_evaluation`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codepostal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `user_id`, `name`, `firstname`, `lastname`, `company`, `address`, `codepostal`, `city`, `pays`, `phone`) VALUES
(1, 1, 'Mon domicile', 'Ayoub', 'EL orfi', 'apside', 'hay hassny', '20235', 'casablanca', 'MA', '0689785241'),
(3, 1, 'Mon travail', 'Ayoub', 'El Orfi', NULL, 'elbaraka casablanca maroc', '48165', 'casablanca', 'AW', '0647949149'),
(4, 1, 'Maison 2', 'Ayoub', 'El Orfi', NULL, 'hay hassny elbaraka', '20559', 'casablanca', 'MA', '0647949149');

-- --------------------------------------------------------

--
-- Structure de la table `carrier`
--

CREATE TABLE `carrier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `carrier`
--

INSERT INTO `carrier` (`id`, `name`, `description`, `prix`) VALUES
(1, 'colissimo', 'Profitez d\'une livraison gratuite avec un colis chez vous dans les 72 prochaines heures', 990),
(2, 'Chronopost', 'Profitez de la livraison express pour être livré le lendemain de votre commande.', 1490);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'manteaux'),
(2, 'Bonnets'),
(3, 'T-shirts'),
(4, 'Écharpes');

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
('DoctrineMigrations\\Version20210624123508', '2021-06-24 14:36:42', 151),
('DoctrineMigrations\\Version20210624130336', '2021-06-24 15:04:14', 68),
('DoctrineMigrations\\Version20210625110433', '2021-06-25 13:05:15', 72),
('DoctrineMigrations\\Version20210625135718', '2021-06-25 15:57:40', 132),
('DoctrineMigrations\\Version20210628121015', '2021-06-28 14:10:57', 125),
('DoctrineMigrations\\Version20210628211955', '2021-06-28 23:20:06', 83),
('DoctrineMigrations\\Version20210628214704', '2021-06-28 23:47:27', 115),
('DoctrineMigrations\\Version20210628220617', '2021-06-29 00:06:31', 196),
('DoctrineMigrations\\Version20210629125907', '2021-06-29 14:59:15', 178),
('DoctrineMigrations\\Version20210629204242', '2021-06-29 22:42:47', 68),
('DoctrineMigrations\\Version20210629213109', '2021-06-29 23:32:32', 74);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `carrier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrier_price` double NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srtripe_session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `user_id`, `created_at`, `carrier_name`, `carrier_price`, `address`, `is_paid`, `reference`, `srtripe_session_id`) VALUES
(1, 1, '2021-06-29 18:35:57', 'colissimo', 9.1, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '', NULL),
(2, 1, '2021-06-29 23:07:47', 'colissimo', 9.1, 'Ayoub El Orfi<br>0647949149<br>elbaraka casablanca maroc<br>48165<br>casablanca<br>AW', 0, '29062021-60db8ba3bfe55', 'cs_test_b1B8bRB5KFGtcjZNomCGQsd4SPRZQcvj7JVDbdcHOKu5A6J0NtR3fqMaB2'),
(3, 1, '2021-06-30 09:11:47', 'colissimo', 9.1, 'Ayoub El Orfi<br>0647949149<br>elbaraka casablanca maroc<br>48165<br>casablanca<br>AW', 1, '30062021-60dc193301f48', 'cs_test_b1yc8f5CnEOUrAT6p7a5kDhzmjkq7ggYR0225256r8nEuv4ltRyuTfznkG'),
(4, 1, '2021-06-30 09:56:23', 'colissimo', 990, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc23a70d438', NULL),
(5, 1, '2021-06-30 12:34:12', 'Chronopost', 1490, 'Ayoub El Orfi<br>0647949149<br>elbaraka casablanca maroc<br>48165<br>casablanca<br>AW', 0, '30062021-60dc48a4e723f', NULL),
(6, 1, '2021-06-30 12:35:42', 'Chronopost', 1490, 'Ayoub El Orfi<br>0647949149<br>elbaraka casablanca maroc<br>48165<br>casablanca<br>AW', 0, '30062021-60dc48fe5ab26', NULL),
(7, 1, '2021-06-30 12:37:04', 'Chronopost', 1490, 'Ayoub El Orfi<br>0647949149<br>hay hassny elbaraka<br>20559<br>casablanca<br>MA', 1, '30062021-60dc4950a2325', 'cs_test_b10NsUBlDn4ilALdB0LaEznx7N2oiidmA5kEMOjRYKEIF8NRVPVTpANVWA'),
(8, 1, '2021-06-30 13:27:05', 'Chronopost', 1490, 'Ayoub El Orfi<br>0647949149<br>elbaraka casablanca maroc<br>48165<br>casablanca<br>AW', 1, '30062021-60dc55094195c', 'cs_test_b1Uvk521yFbEevDaj9QAVbZw1mRcmTv3zRHF1b0N4x7jYtDWSsy7Lhznc4'),
(9, 1, '2021-06-30 13:48:44', 'colissimo', 990, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc5a1ce494d', NULL),
(10, 1, '2021-06-30 13:48:52', 'Chronopost', 1490, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc5a24e894b', NULL),
(11, 1, '2021-06-30 13:49:26', 'Chronopost', 1490, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc5a46b7798', NULL),
(12, 1, '2021-06-30 13:49:49', 'Chronopost', 1490, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc5a5ddcf1f', NULL),
(13, 1, '2021-06-30 13:50:03', 'Chronopost', 1490, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc5a6b442a9', NULL),
(14, 1, '2021-06-30 13:50:12', 'Chronopost', 1490, 'Ayoub EL orfi<br>0689785241<br>apside<br>hay hassny<br>20235<br>casablanca<br>MA', 0, '30062021-60dc5a7473bd2', NULL),
(15, 1, '2021-06-30 13:51:07', 'Chronopost', 1490, 'Ayoub El Orfi<br>0647949149<br>hay hassny elbaraka<br>20559<br>casablanca<br>MA', 0, '30062021-60dc5aab4eba6', NULL),
(16, 1, '2021-06-30 13:51:34', 'Chronopost', 1490, 'Ayoub El Orfi<br>0647949149<br>hay hassny elbaraka<br>20559<br>casablanca<br>MA', 0, '30062021-60dc5ac6cb3de', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `my_order_id` int(11) NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`id`, `my_order_id`, `product`, `quantity`, `price`, `total`) VALUES
(1, 1, 'hiver bonnet rouge', 1, 2300, 2300),
(2, 1, 'hiver bonnet stylé', 1, 2800, 2800),
(3, 2, 'hiver bonnet rouge', 1, 2300, 2300),
(4, 2, 'hiver bonnet stylé', 1, 2800, 2800),
(5, 3, 'hiver bonnet stylé', 2, 2800, 5600),
(6, 3, 'l\'écharpe parfait', 1, 4900, 4900),
(7, 4, 'hiver bonnet rouge', 1, 2300, 2300),
(8, 5, 'hiver bonnet rouge', 1, 2300, 2300),
(9, 5, 'hiver bonnet stylé', 1, 2800, 2800),
(10, 6, 'hiver bonnet rouge', 2, 2300, 4600),
(11, 6, 'hiver bonnet stylé', 1, 2800, 2800),
(12, 6, 'manteau femme', 1, 15000, 15000),
(13, 7, 'hiver bonnet rouge', 2, 2300, 4600),
(14, 7, 'hiver bonnet stylé', 1, 2800, 2800),
(15, 7, 'manteau femme', 1, 15000, 15000),
(16, 8, 'hiver t-shirt noir', 1, 8000, 8000),
(17, 9, 'hiver bonnet rouge', 1, 2300, 2300),
(18, 10, 'hiver bonnet rouge', 1, 2300, 2300),
(19, 11, 'hiver bonnet rouge', 1, 2300, 2300),
(20, 12, 'hiver bonnet rouge', 1, 2300, 2300),
(21, 13, 'hiver bonnet rouge', 1, 2300, 2300),
(22, 14, 'hiver bonnet rouge', 1, 2300, 2300),
(23, 15, 'hiver bonnet rouge', 1, 2300, 2300),
(24, 16, 'hiver bonnet rouge', 1, 2300, 2300);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `illustration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `slug`, `illustration`, `subtitle`, `description`, `price`) VALUES
(13, 2, 'hiver bonnet rouge', 'hiver-bonnet-rouge', '60d67c3dc6185.jpg', 'hiver bonnet rouge', 'hiver bonnet rouge', 2300),
(14, 2, 'hiver bonnet stylé', 'hiver-bonnet-style', '9355f25ed518d37eb13af594c698cfca551e5c38.jpg', 'hiver bonnet stylé', 'hiver bonnet stylé', 2800),
(15, 4, 'l\'écharpe du love', 'lecharpe-du-love', '99e5d2ea2820265ad40e194c8010f920e58e6a35.jpg', 'l\'écharpe du love', 'l\'écharpe du love l\'écharpe du love l\'écharpe du love l\'écharpe du love', 4500),
(16, 4, 'l\'écharpe parfait', 'lecharpe-parfait', 'c6451a64312c8e2e3ae56af68c0d7354dcc3c8a0.jpg', 'l\'écharpe parfait', 'l\'écharpe parfait l\'écharpe parfait l\'écharpe parfait l\'écharpe parfait', 4900),
(17, 1, 'manteau femme', 'manteau-femme', '4285209f5f32942372597418652401cace9456cc.jpg', 'manteau femme', 'manteau femme  manteau femme  manteau femme  manteau femme  manteau femme', 15000),
(18, 1, 'manteau stylé homme', 'manteau-style-homme', '929cc7c90264d6f657067df77bec6741d19dd39c.jpg', 'manteau stylé homme', 'manteau stylé homme manteau stylé homme manteau stylé homme manteau stylé homme', 12900),
(19, 3, 't-shirt blanc', 't-shirt-blanc', '5493caed05b4b981284621b1b599991d8e9f0499.jpg', 't-shirt blanc', 't-shirt blanc t-shirt blanc t-shirt blanc t-shirt blanc t-shirt blanc', 6000),
(20, 3, 'hiver t-shirt noir', 'hiver-t-shirt-noir', '5912231560cef57cae28a16d658c567c38c58898.jpg', 'hiver t-shirt noir', 'hiver t-shirt noir hiver t-shirt noir hiver t-shirt noir', 8000);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`) VALUES
(1, 'ayouborfi@gmail.com', '[]', '$2y$13$mGT3volReZDlDzi7trdNkeFOYMXZE6Z2GrYEDsoyLLmO.MCYzldZq', 'Ayoub', 'El orfi'),
(2, 'salim_rok@gmail.com', '[]', '123456', 'salim', 'rokay'),
(3, 'ayouborfi2@gmail.com', '[]', '$2y$13$5zHubZWKWSY9Okq8lKe5A.ENv7cztn5u5CvwBgvSPti6icV3Zqm4a', 'Ayoub', 'El orfi'),
(4, 'aysssouborfi@gmail.com', '[]', '$2y$13$WIoCYY7YWjb955TrL7UXNuztd4iiQpgNMreabH1W3sLtretM19F.a', 'qsdqsd', 'El dqsdqs');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D4E6F81A76ED395` (`user_id`);

--
-- Index pour la table `carrier`
--
ALTER TABLE `carrier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F5299398A76ED395` (`user_id`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_845CA2C1BFCDF877` (`my_order_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `carrier`
--
ALTER TABLE `carrier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `FK_D4E6F81A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_845CA2C1BFCDF877` FOREIGN KEY (`my_order_id`) REFERENCES `order` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
