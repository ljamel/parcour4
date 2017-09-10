-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Sam 09 Septembre 2017 à 19:20
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `news`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` mediumint(9) NOT NULL,
  `news` smallint(6) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `etat` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `news`, `auteur`, `contenu`, `date`, `etat`) VALUES
(9, 24, 'ok', '<p>essai ok</p>', '2017-09-06 19:29:51', 2),
(10, 24, 'lamri', '<p>ok sa va</p>', '2017-09-06 19:31:08', 0),
(11, 24, 'essaiii', '<p><span class="class_html_balise">&lt;script</span> <span class="class_html_params">type=</span><span class="class_html_values">"text/javascript"</span><span class="class_html_balise">&gt;</span></p>\r\n<pre class="eval line-numbers  language-html"><code class=" language-html">window.alert("Bonjour !");</code></pre>\r\n<p><br /> <span class="class_html_balise">&lt;/script&gt;</span></p>', '2017-09-06 19:52:21', 4),
(12, 22, 'lamridjamal', 'mon commentaire qui sert Ã  rien', '2017-09-08 10:39:45', 3),
(13, 22, 'essai', 'ok 2', '2017-09-08 14:36:49', 0),
(14, 22, 'essai', 'bonjour', '2017-09-08 14:44:19', 0),
(17, 24, 'poo', '&lt;script type=&quot;text/javascript&quot;&gt;\r\n\r\nwindow.alert(&quot;Bonjour !&quot;);\r\n\r\n\r\n&lt;/script&gt;', '2017-09-08 18:10:14', 0),
(18, 24, 'pp', 'ok\r\npm\r\nff', '2017-09-08 18:10:47', 0),
(19, 26, 'mpoo secu', '&lt;script type=&quot;text/javascript&quot;&gt;<br />\r\n<br />\r\nwindow.alert(&quot;Bonjour !&quot;);<br />\r\n<br />\r\n<br />\r\n&lt;/script&gt;', '2017-09-08 18:16:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` smallint(5) unsigned NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` longtext NOT NULL,
  `image` mediumtext NOT NULL,
  `dateAjout` datetime NOT NULL,
  `dateModif` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `auteur`, `titre`, `contenu`, `image`, `dateAjout`, `dateModif`) VALUES
(1, 'mowwa', 'loup', 'mon contenues modifier', 'nnnnnnnn', '2017-08-15 00:00:00', '2017-08-23 15:03:02'),
(22, 'lamri', 'essai tinyMCE', '<h1><span style="color: #ff6600;">Bonjour&nbsp; <strong>coucou</strong></span></h1>\r\n<p>&nbsp;</p>\r\n<p><span style="color: #008000;"><strong>ca fonctionne</strong></span></p>', '', '2017-08-31 17:59:10', '2017-08-31 17:59:10'),
(24, 'lamri', 'essai image', '<p><img src="data:image/jpeg;base64,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" alt="" width="677" height="85" /></p>', '', '2017-09-01 14:05:16', '2017-09-01 14:05:16'),
(25, 'lamri', 'teste', '<p><span style="color: #ff0000;">bonjour <span style="background-color: #00ffff;">jhuuipghphup </span></span></p>', '', '2017-09-07 10:35:55', '2017-09-07 10:35:55'),
(26, 'essai', 'essai securiter', '<pre style="margin: 0;"><span style="color: #0000ff;">&lt;script</span><span style="color: #0080ff;"> language=</span><span style="color: #ff0000;">"javascript"</span><span style="color: black;">&gt;</span>\r\n<span style="color: #0080ff;">alert</span><span style="color: black;">(</span><span style="color: #ff0000;">"bonjour"</span><span style="color: black;">)</span><span style="color: black;">;</span>\r\n<span style="color: #0000ff;">&lt;/script&gt;</span></pre>', '', '2017-09-08 18:00:43', '2017-09-08 18:00:43');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
