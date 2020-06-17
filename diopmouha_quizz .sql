-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-diopmouha.alwaysdata.net
-- Generation Time: Jun 17, 2020 at 02:22 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diopmouha_quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `idqtn` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `nbrePoint` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`idqtn`, `libelle`, `type`, `nbrePoint`, `id`) VALUES
(58, 'Qui es ti ?', 'radio', 5, 1),
(57, 'Qui es tu ?', 'checkbox', 5, 1),
(59, 'Qui ?', 'texte', 7, 1),
(60, 'Comment', 'texte', 2, 1),
(61, 'Pourquoi?', 'texte', 2, 1),
(62, 'Tu devrais ?', 'radio', 2, 1),
(63, 'Oussou ?', 'texte', 4, 1),
(64, 'moul ?', 'radio', 5, 1),
(65, 'proi ?', 'checkbox', 5, 1),
(66, 'qui es ?', 'checkbox', 5, 1),
(67, 'ISM', 'texte', 5, 1),
(68, 'Nouveau', 'texte', 5, 32),
(69, 'MOMO et MAMA ?', 'texte', 12, 1),
(70, 'mamadou ?', 'radio', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `idRep` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `idqtn` int(11) NOT NULL,
  `repVrai` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reponses`
--

INSERT INTO `reponses` (`idRep`, `libelle`, `idqtn`, `repVrai`) VALUES
(64, 'moi', 62, 1),
(63, 'salll', 61, 1),
(62, 'moment', 60, 1),
(61, 'macky', 59, 1),
(60, 'nous', 58, 1),
(59, 'toi', 58, 0),
(58, 'moi', 58, 0),
(57, 'toi', 57, 1),
(56, 'moi', 57, 0),
(65, 'toi', 62, 0),
(66, 'nous', 62, 0),
(67, 'moment', 63, 1),
(68, 'moi', 64, 0),
(69, 'toi', 64, 1),
(70, 'koi', 65, 0),
(71, 'poi', 65, 1),
(72, 'moi', 66, 0),
(73, 'toi', 66, 1),
(74, 'nous', 66, 1),
(75, 'Institut SupÃ©rieur de management', 67, 1),
(76, 'Oui', 68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `profil` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `nbreQuest` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `login`, `pwd`, `profil`, `avatar`, `score`, `nbreQuest`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'Image3.png', 0, 5),
(2, 'joueur', 'joueur', 'joueur', 'joueur', 'joueur.jpeg', 100, 5),
(16, 'Matar ndiaye', 'matar', 'matar', 'joueur', 'matar.jpeg', 10000, 5),
(17, 'Mouhamed DIOP', 'mitha13', 'mitha13', 'joueur', 'Image1.png', 189, 5),
(18, 'Madjiguene Mane', 'madj', 'madj', 'joueur', 'madj.jpeg', 200, 5),
(19, 'Fatou Ndiaye', 'fat', 'fat', 'joueur', 'fat.jpeg', 15000, 5),
(20, 'Ansou Faye', 'ans', 'ans', 'joueur', 'ans.jpeg', 17000, 5),
(21, 'Abdou wane', 'abdou', 'abdou', 'joueur', 'abdou.jpeg', 1600, 5),
(22, 'Nina maya', 'nina', 'nina', 'joueur', 'nina.jpeg', 300, 5),
(23, 'Ousmane cama', 'ouze', 'ouze', 'joueur', 'ouz.jpeg', 5000, 5),
(24, 'Lamine ndiaye', 'lamzo', 'lamzo', 'joueur', 'lamzo.jpeg', 1800, 5),
(25, 'Papa ndour', 'papa', 'papa', 'joueur', 'papa.jpeg', 20000, 5),
(26, 'Matar gaye', 'matar14', 'matar', 'joueur', 'matar.jpeg', 15000, 5),
(27, 'Licka diaw', 'licka', 'licka', 'joueur', 'licka .jpeg', 180000, 5),
(28, 'Maguette Diaw', 'maguette', 'maguette', 'joueur', 'maguette.jpeg', 16000, 5),
(29, 'Kader Fall', 'kader', 'kader', 'joueur', 'kader.jpeg', 2000, 5),
(30, 'salif sane', 'salif', 'salif', 'joueur', 'salif.jpeg', 13000, 5),
(31, 'fadilou cisse', 'fadel', 'fadel', 'joueur', 'fadel.jpeg', 1600, 5),
(32, 'Mouha DIOP', 'mouhamed', 'diop', 'admin', 'IMG-20190605-WA0014.png', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`idqtn`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`idRep`),
  ADD KEY `idqtn` (`idqtn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `idqtn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `idRep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
