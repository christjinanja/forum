-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 août 2024 à 11:37
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(255) NOT NULL,
  `id_question` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `id_auteur`, `pseudo_auteur`, `id_question`, `contenu`) VALUES
(1, 1, 'aa', 6, 'dddd'),
(2, 1, 'aa', 6, 'aaa'),
(3, 1, 'aa', 8, 'ssss'),
(4, 1, 'aa', 8, 'aaa'),
(5, 1, 'aa', 13, 'salut'),
(6, 1, 'aa', 15, 'parce que c\'est rapide '),
(7, 1, 'aa', 46, 'cc'),
(8, 2, 'admin', 47, 'c\'est bien ');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `pseudo_auteur` varchar(255) NOT NULL,
  `date_publication` text NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `titre`, `description`, `contenu`, `id_auteur`, `pseudo_auteur`, `date_publication`, `image`) VALUES
(8, 'bonjourAA', 'aaa iiaaaaa', 'aaa jj', 2, 'admin', '28/07/2024', ''),
(10, 'Cou', 'nn', 'kkk', 1, 'aa', '30/07/2024', ''),
(14, 'le djai', 'comment avoir le djai', 'euro <br />\r\ndollar<br />\r\nsterling<br />\r\netc', 2, 'admin', '02/08/2024', ''),
(15, 'java', 'pourquoi le java ', 'utiliser partout ', 2, 'admin', '02/08/2024', ''),
(39, 'ssss', 'vvvv', 'nnnn', 1, 'aa', '06/08/2024', ''),
(40, 'heiwa', 'heiwa', 'heiwa', 1, 'aa', '12/08/2024', ''),
(41, '', '', '', 0, '', '', 'hfjckjg'),
(42, 'nnn', 'nnnn', 'nnn', 0, 'nnnn', 'nnnn', 'nnn'),
(43, 'heiwa', 'heiwa', 'heiwa', 1, 'aa', '12/08/2024', ''),
(45, 'heiwa', 'heiwa', 'heiwa', 1, 'aa', '12/08/2024', ''),
(49, 'joli', 'cool', 'pas mal', 1, 'aa', '12/08/2024', 'WIN_20230417_15_10_25_Pro_20240812_172752.jpg'),
(51, 'a', 'a', 'a', 2, 'admin', '13/08/2024', 'R (4)_20240813_124935.jpeg'),
(52, 'Cou', 'nn', 'nn', 3, 'jojo', '13/08/2024', 'i_20240813_125106.jpg'),
(53, 'Cou', 'nn', 'nn', 3, 'jojo', '13/08/2024', 'i_20240813_125354.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `nom`, `prenom`, `mdp`) VALUES
(1, 'aa', 'aa', 'aa', '$2y$10$q1XnbMBnnnQ8E.pbioUuG.6PNfwRXQcjQTQbJLbRaWybd11Q3byRi'),
(2, 'admin', 'admin', 'admin', '$2y$10$rkKA/rIw.jLNAJNaAlTLEu0CA3kQbOoIcXRH6scA7XyrX1zYNs1sa'),
(3, 'jojo', 'jojo', 'jojo', '$2y$10$I1JTtURTSuNEo16EFQ0SHOj8snNsDDo4WqnE8xXVUzZv/AxjjcIqe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
