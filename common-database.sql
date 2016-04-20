-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2016 at 12:47 PM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `common-database`
--
CREATE DATABASE IF NOT EXISTS `common-database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `common-database`;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `id_user` int(11) NOT NULL COMMENT 'ID de l''utilisateur',
  `id_follower` int(11) NOT NULL COMMENT 'ID de follower',
  `date_follow` datetime NOT NULL COMMENT 'Date et heure du follow'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id_user`, `id_follower`, `date_follow`) VALUES
(1, 2, '2016-02-11 16:31:06'),
(1, 3, '2016-02-11 15:47:18'),
(2, 1, '2016-02-11 16:33:24'),
(2, 3, '2016-02-11 15:47:19'),
(2, 15, '0000-00-00 00:00:00'),
(3, 1, '2016-02-11 15:54:42'),
(7, 1, '2016-02-11 16:02:07'),
(7, 3, '2016-02-11 15:47:29'),
(15, 1, '2016-02-09 12:21:19'),
(15, 2, '2016-02-12 05:02:10'),
(15, 3, '0000-00-00 00:00:00'),
(15, 4, '2016-02-03 21:30:18'),
(15, 5, '2016-02-03 14:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `id_tweet` int(11) NOT NULL COMMENT 'Id du tweeter',
  `id_tag` int(11) NOT NULL COMMENT 'tag'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id_tweet`, `id_tag`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id_user` int(11) NOT NULL COMMENT 'Id de l''utilisateur qui like',
  `id_tweet` int(11) NOT NULL COMMENT 'id du tweet qui like'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_mess` int(11) NOT NULL COMMENT 'Id du message',
  `id_sender` int(11) NOT NULL COMMENT 'Id de l''émetteur',
  `id_receiver` int(11) NOT NULL COMMENT 'id du destinataire',
  `content` text NOT NULL COMMENT 'contenue',
  `date` datetime NOT NULL COMMENT 'date',
  `sender_deleted` tinyint(1) NOT NULL COMMENT 'Si le sender delete le msg',
  `receiver_deleted` tinyint(1) NOT NULL COMMENT 'si le destinataire delete le message',
  `read` tinyint(1) NOT NULL COMMENT 'Si le message est lu par le destinataire',
  `media` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id_mess`, `id_sender`, `id_receiver`, `content`, `date`, `sender_deleted`, `receiver_deleted`, `read`, `media`) VALUES
(1, 2, 1, 'Miaou ?', '2016-02-12 15:29:07', 0, 0, 0, ''),
(2, 15, 2, 'Lysa est une menteuse nya', '2016-02-12 15:37:27', 0, 0, 0, ''),
(3, 1, 2, 'MIAOUUUUUUU', '2016-02-12 15:38:15', 0, 0, 0, ''),
(4, 1, 2, 'Nya', '2016-02-12 17:21:58', 0, 0, 0, ''),
(5, 1, 2, 'Nya', '2016-02-12 17:37:47', 0, 0, 0, ''),
(6, 1, 2, 'Nya', '2016-02-12 17:38:44', 0, 0, 0, ''),
(7, 1, 2, 'WHATTTTTTTTTTTTTTTTTTTTTTTTTT?', '2016-02-12 17:44:24', 0, 0, 0, ''),
(8, 1, 2, 'HAHAHAAH j''ai réussi ?', '2016-02-12 18:28:16', 0, 0, 0, ''),
(9, 2, 15, 'Salut', '2016-02-12 19:13:45', 0, 0, 0, ''),
(10, 2, 15, 'Salut', '2016-02-12 19:14:32', 0, 0, 0, ''),
(11, 2, 15, 'Salut', '2016-02-12 19:14:38', 0, 0, 0, ''),
(12, 2, 15, 'Yo', '2016-02-12 19:32:07', 0, 0, 0, ''),
(13, 15, 2, 'fdp', '2016-02-12 19:32:42', 0, 0, 0, ''),
(14, 2, 15, 'FDP', '2016-02-12 19:42:10', 0, 0, 0, ''),
(15, 2, 3, 'yo', '2016-02-12 19:46:23', 0, 0, 0, ''),
(16, 2, 3, 'yo', '2016-02-12 19:46:59', 0, 0, 0, ''),
(17, 3, 2, 'Yop', '2016-02-12 19:50:28', 0, 0, 0, ''),
(18, 2, 9, 'Coucou tu veux voir ma bible ?', '2016-02-12 19:53:05', 0, 0, 0, ''),
(19, 15, 1, 'Coucou Strumpfi &lt;3', '2016-02-14 10:24:56', 0, 0, 0, ''),
(20, 15, 2, 'T''as oublié de pointer à l''acceuil', '2016-02-14 10:41:42', 0, 0, 0, ''),
(21, 15, 2, 'FDP MAN', '2016-02-14 10:41:48', 0, 0, 0, ''),
(22, 15, 9, 'Coucou Avelaine', '2016-02-14 10:42:10', 0, 0, 0, ''),
(23, 9, 2, 'Omg..', '2016-02-14 11:58:23', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL COMMENT 'ID utilisateur',
  `type` int(11) NOT NULL COMMENT 'type de la notif',
  `id_notif` int(11) NOT NULL COMMENT 'id du tweet retweet ou like en fonction du type de la notif',
  `status` tinyint(1) NOT NULL COMMENT 'si vue ou non',
  `date_notif` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `id_user`, `type`, `id_notif`, `status`, `date_notif`) VALUES
(1, 1, 1, 3, 0, '2016-02-11 15:47:18'),
(2, 2, 1, 3, 0, '2016-02-11 15:47:19'),
(3, 7, 1, 3, 0, '2016-02-11 15:47:29'),
(4, 3, 1, 1, 0, '2016-02-11 15:54:42'),
(5, 7, 1, 1, 0, '2016-02-11 16:02:07'),
(6, 1, 1, 2, 0, '2016-02-11 16:31:06'),
(7, 2, 1, 1, 0, '2016-02-11 16:33:24'),
(8, 2, 1, 15, 0, '2016-02-12 13:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `short_links`
--

CREATE TABLE IF NOT EXISTS `short_links` (
  `token` varchar(255) NOT NULL COMMENT 'Lien raccourcis',
  `path` text NOT NULL COMMENT 'Chemin du fichier'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id_tag` int(11) NOT NULL COMMENT 'Id du tag',
  `tag` text NOT NULL COMMENT 'nom du hastag'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id_tag`, `tag`) VALUES
(5, '#nya'),
(6, '#miaou'),
(7, '#MortalKombat'),
(8, '#smoke'),
(9, '#ShaoKahn');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id_user` int(11) NOT NULL COMMENT 'ID de l''utilisateur',
  `bg_img` text NOT NULL COMMENT 'Image de background',
  `bg_color` varchar(255) NOT NULL COMMENT 'couleur de background',
  `theme_color` varchar(255) NOT NULL COMMENT 'Couleur du theme',
  `postion` varchar(255) NOT NULL COMMENT 'Position du background'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id_tweet` int(11) NOT NULL COMMENT 'id du tweet',
  `id_user` int(11) NOT NULL COMMENT 'id de l''utilisateur',
  `content` text NOT NULL COMMENT 'contenue',
  `creation_date` datetime NOT NULL COMMENT 'Date de création',
  `media` text NOT NULL COMMENT 'Media',
  `deleted` tinyint(1) NOT NULL COMMENT 'Statut de la suppression',
  `is_origin` int(11) NOT NULL COMMENT 'Parent(Si définis retweet)',
  `is_reply` tinyint(1) NOT NULL COMMENT 'Si definis alors c''est un réponse',
  `location` text NOT NULL COMMENT 'Localisation'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id_tweet`, `id_user`, `content`, `creation_date`, `media`, `deleted`, `is_origin`, `is_reply`, `location`) VALUES
(5, 1, 'Salut #nya', '2016-02-11 16:30:39', '', 0, 0, 0, ''),
(6, 2, '@Strumpfi lovekeur bébé #miaou', '2016-02-11 16:31:32', '', 0, 0, 0, ''),
(7, 15, 'I''m smoke, ill kill everyone..#MortalKombat', '2016-02-12 10:53:53', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL COMMENT 'ID utilisateur',
  `username` varchar(255) NOT NULL COMMENT 'nom de l''utilsateur',
  `nickname` varchar(255) NOT NULL COMMENT 'Pseudo de la personne(Nom complet sur tweeter)',
  `password` text NOT NULL COMMENT 'Mot de passe',
  `avatar` text NOT NULL COMMENT 'avatar',
  `email` text NOT NULL COMMENT 'email',
  `cover` text NOT NULL COMMENT 'image de banniere',
  `phone` text NOT NULL COMMENT 'numéro de téléphone',
  `website` text NOT NULL COMMENT 'url du site web lié au compte',
  `registration_token` text NOT NULL COMMENT 'token pour l''activation par mail',
  `birthdate` date NOT NULL COMMENT 'date de naissance',
  `private` tinyint(1) NOT NULL COMMENT 'status du compte si privée ou non',
  `token_cookie` text NOT NULL COMMENT 'token pour la fonction : se souvenir de moi (afin d''éviter la reconnexion)',
  `location` text NOT NULL COMMENT 'Lieu',
  `activated` tinyint(1) NOT NULL COMMENT 'statut de l''activation',
  `biography` text NOT NULL COMMENT 'Biographie',
  `creation_date` date NOT NULL COMMENT 'Date et heure de la création du compte'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nickname`, `password`, `avatar`, `email`, `cover`, `phone`, `website`, `registration_token`, `birthdate`, `private`, `token_cookie`, `location`, `activated`, `biography`, `creation_date`) VALUES
(1, 'Strumpfi', 'Nya', '525ea696cb62e3c1d267f5bd76a1318305a5013b', '../view/img-user/avatar/Quenelle-Man.jpg', 'zqqgvtzx@zetmail.com', '../view/img-user/cover/nya.jpg', '', '', '', '2014-12-01', 0, '', 'CatCity', 1, 'Miaou', '2016-02-11'),
(2, 'allan', 'guichard', '2bd28fa5fdce02e8c5bb65a2d620a48391eb6af3', '../view/img-user/avatar/profil-man-default.png', 'allan@yopmail.com', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 1, 'qerqerqwerqwerqewr', '0000-00-00'),
(3, 'Valentino', 'bouread', 'cf3a95c72cfbf58e157010084d2829ab0153d262', '../view/img-user/avatar/8750874-13831692.jpg', 'valentin.bouread@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(4, 'coursol_log', 'alex', 'd3d5f569b8022688845e985bb911a32344177ad5', '../view/img-user/avatar/profil-man-default.png', 'alexandre.coursol@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(5, 'leo', 'grivel', '945d6691057caf78bbe278ea7c28ca98a2eb2b4a', '../view/img-user/avatar/profil-man-default.png', 'leo.grivel@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(6, 'anthony', 'dasilva', '9ad1562dec5c5ea85b5b2c0ba5c4c8011ac8dc68', '../view/img-user/avatar/profil-man-default.png', 'anthony.dasilva@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(7, 'valentin', 'bensam', '035ba006acc0c6cc33989dc2945445c6fa2969d0', '../view/img-user/avatar/profil-man-default.png', 'valentin.bensam@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(8, 'rodolphe', 'laidet', '121ae9e31911c874d74a92304425e16da34e6a53', '../view/img-user/avatar/profil-man-default.png', 'rodolphe.laidet@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(9, 'avelaine', 'arnout', '33f80a4228823ea5f1a81b29e1cf1ab43ad2fa71', '../view/img-user/avatar/profil-man-default.png', 'avelaine.arnout@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, 'nya', '0000-00-00'),
(10, 'ruben', 'cherbi', '5b8aaded3d04d1935ebaafbfe572215c4e0e75a0', '../view/img-user/avatar/profil-man-default.png', 'ruben.cherbi@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(11, 'ivann', 'machado', 'cd4292564e7c2e68b714bf59302eea862ed3ab52', '../view/img-user/avatar/profil-man-default.png', 'ivann.machado@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(12, 'jimmy', 'anicet', 'bbaeef1debdd7e3534f71d13965bbd250ee160d6', '../view/img-user/avatar/profil-man-default.png', 'jimmy.anicet@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(13, 'thomas', 'borde', '8090d429d43cfba7086d14c396ab274daac3e470', '../view/img-user/avatar/profil-man-default.png', 'thomas.borde@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(14, 'alexandra', 'castilla', 'df04404148d58f992de32764a017e55d75794783', '../view/img-user/avatar/profil-man-default.png', 'alexandre.castilla@epitech.eu', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(15, 'smoke', 'Mouhahaha', 'bb1bc92d929a4c5250daacb60f367b74c158221b', '../view/img-user/avatar/smoke.jpeg', 'smoke@reptile.mk', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', 'Earthrealm', 1, 'Tomas Vrbada, also known as Smoke, is a ninja assassin who was turned from a human into a cyborg in the original timeline of the Mortal Kombat series. He made his debut in Mortal Kombat II as an unplayable secret character in human form, and first became playable in Mortal Kombat 3 in cyborg form. He appears in the franchise''s reboot, now retaining his human form in canon for the first time in almost two decades. ', '0000-00-00'),
(16, 'jesus', '', '56d05e57e228aaa8ab359e7e1a5568bdeff70f19', '../view/img-user/avatar/profil-man-default.png', 'jesus@monfils.god', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00'),
(17, 'Budha', '', 'f397b2dc8469d56c01545747f1cc13e230f8fcf3', '../view/img-user/avatar/profil-man-default.png', 'budha@gautama.kami', '../view/img-user/cover/default-cover.jpg', '', '', '', '0000-00-00', 0, '', '', 1, '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id_user`,`id_follower`);

--
-- Indexes for table `hashtags`
--
ALTER TABLE `hashtags`
  ADD PRIMARY KEY (`id_tweet`,`id_tag`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_user`,`id_tweet`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_mess`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_links`
--
ALTER TABLE `short_links`
  ADD PRIMARY KEY (`token`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id_tweet`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_mess` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id du message',AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id du tag',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id_tweet` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du tweet',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID utilisateur',AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
