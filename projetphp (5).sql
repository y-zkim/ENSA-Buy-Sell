-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 12:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(3, 'yzkim@gmail.com', '$2y$10$vY.YfH2xx23iPg9L7GGgaOciqm.eN2TnCe3UY/oBeEUhbzMz0ps0W');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prix` bigint(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `prix`, `type`, `user_article`) VALUES
(2, 'Mezzo Bottines Chukka Mezzo en cuir véritable ', 300, 'vetement', 15),
(3, 'Fashion Fashion men\'s casual sneakers-black', 200, 'vetement', 17),
(4, 'Soirée Pyjama Pyjama coton vert/marron ', 180, 'vetement', 17),
(6, 'Fashion Fashion men\'s Grenn', 220, 'vetement', 20),
(7, 'Defacto T-SHIRT À MANCHES COURTES ', 96, 'vetement', 19),
(8, 'Defacto CHEMISE À MANCHES COURTES ', 129, 'vetement', 14),
(9, 'Koton PANTALON - BLEU INDIGO', 179, 'vetement', 20),
(10, 'Koton JUPE - BLANC', 200, 'vetement', 19),
(11, 'Koton ROBE - ROUGE', 299, 'vetement', 20),
(13, 'Defacto PULLOVER - BEIGE ROSE', 80, 'vetement', 14),
(14, 'Koton ROBE - RAYURES NOIRES', 200, 'vetement', 19),
(15, 'Pack 2 Sac à dos - NOIR et BLANC', 200, 'sport', 13),
(16, 'Optimum Nutrition Serious Mass ', 399, 'sport', 15),
(17, 'Hitchonson Vélos type VTT', 1099, 'sport', 20),
(18, 'Débardeur original sweat shaper ', 139, 'sport', 15),
(19, 'TWS i99 Wireless Bluetooth ', 299, 'electronique', 14),
(20, 'Samsung Note 10 Lite 6.7', 4000, 'electronique', 13),
(21, 'Hisense TV 32\" 32N50HTS LED HD ', 1249, 'electronique', 20),
(22, 'T-shirt Not Today Covid-19 pour Hommes', 79, 'vetement', 14),
(23, 'Koton T-SHIRT - BEIGE', 99, 'vetement', 14),
(24, 'G-Shock Montre Pour Homme-2019', 300, 'vetement', 17),
(90, 'Koton PANTALON - BLEU INDIGO', 179, 'vetement', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirmation` varchar(60) DEFAULT NULL,
  `date_confirmation` datetime DEFAULT NULL,
  `reset_token` varchar(60) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `password`, `email`, `confirmation`, `date_confirmation`, `reset_token`, `reset_at`) VALUES
(13, 'ahmed', 'hamid', '$2y$10$dyF9Vc5B8wzUf067ep8zkuI4YVgTRRwNhXmWddwMM/nBZRmPSkik2', 'ahmed@gmail.com', 'd89eZ1gCcLsBNKsnofGY7pfn7iVPq1gGxIakb8xNZTBhCGxJHquNKHnyHer6', NULL, NULL, NULL),
(14, 'nom', 'prenom', '$2y$10$Gbbp4qFJ8APh0CUe/NvIgOCLWD7FApIHai.Z8L3oJsRAdHF4Op/J2', 'email@gmail.com', 'RqJI8SjyBHRzCtYhVKyVHvQkByIuZaXC5qgzzI5Ld4veQmJwwfMgRKnYXP9v', NULL, NULL, NULL),
(15, 'zkim', 'youssef', '$2y$10$i7ufo1GfMNJ6/XX0aVmHU.VoCyam6Qnn8xMfhGNKPFVv2rDjfhE..', 'zkim@gmail.com', '2qPtNUJ5dI1LSymls4n5YZ769LUdRm3vET5m2gubk8FEu0gwH63A78hZmQvy', NULL, NULL, NULL),
(17, 'hemadi', 'hamaada', '$2y$10$Vl1ChnuYHGW3TTSdOivKO.MvAV4mPhDlQW4DH7GF4kOMDKR6sE/rK', 'zkim1337@gmail.com', 'XeRIb2kdvk4qHPxtJCng40W7RWY20ICZ1xUN0MsECCbOBTnFUhySGhxd6rM2', NULL, NULL, NULL),
(19, 'ali', 'gym', '$2y$10$o1GFzF1RtA.kx96t9V/AOOgMxf5wmHcj6ouEaaDBDY09iaG/zDJhm', 'aligymy1@gmail.com', 'wXH5wGxSft0tzX4YxXUez5cHOAgz3Q3rMc1DkHgoOuXrCHQFWxjyJxbyfJR1', NULL, NULL, NULL),
(20, 'zkim', 'zkim', '$2y$10$uC6eru2dyHEkoRxiJrQTb.PwDK5jTw8q8b4t3rs7ZOZt1IqnOlQDy', 'youssef.zkim98@gmail.com', 'q7c12Cufu6Yt2xvIAcnraicEzDhJsJwPiDG6xvBM10TGaUHVcaoR3FNJCkGN', NULL, NULL, NULL),
(21, 'Allal', 'Mohamed', '$2y$10$gVNrjL2v3rfcLBQatQpaqek2ev1bv5UtEskXN5twOndgG5BSjYeZu', 'zkim.ysf@gmail.com', NULL, '2021-04-03 12:17:54', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
