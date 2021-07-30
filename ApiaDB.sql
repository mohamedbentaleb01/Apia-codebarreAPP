-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table apia. catégories
CREATE TABLE IF NOT EXISTS `catégories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table apia.catégories : ~0 rows (environ)
/*!40000 ALTER TABLE `catégories` DISABLE KEYS */;
/*!40000 ALTER TABLE `catégories` ENABLE KEYS */;

-- Listage de la structure de la table apia. gestionnaire
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table apia.gestionnaire : ~0 rows (environ)
/*!40000 ALTER TABLE `gestionnaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `gestionnaire` ENABLE KEYS */;

-- Listage de la structure de la table apia. images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `produit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_images_produit` (`produit_id`),
  CONSTRAINT `FK_images_produit` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`produit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table apia.images : ~0 rows (environ)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Listage de la structure de la table apia. magasinier
CREATE TABLE IF NOT EXISTS `magasinier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `civilite` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateembauche` datetime DEFAULT NULL,
  `age` int(11) NOT NULL,
  `magasin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_on` datetime DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table apia.magasinier : ~1 rows (environ)
/*!40000 ALTER TABLE `magasinier` DISABLE KEYS */;
INSERT INTO `magasinier` (`id`, `username`, `email`, `password`, `fonction`, `civilite`, `dateembauche`, `age`, `magasin`, `file_name`, `uploaded_on`, `status`) VALUES
	(1, 'apia2021', 'APIA@APIA.com', 'Apia01', 'magasinier', 'marocain', '2018-07-28 01:03:34', 29, 'APIA-RABAT', '1626862745-9o.png', '2021-07-30 21:21:22', '1');
/*!40000 ALTER TABLE `magasinier` ENABLE KEYS */;

-- Listage de la structure de la table apia. pack
CREATE TABLE IF NOT EXISTS `pack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nompack` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `qte_prod` int(11) DEFAULT NULL,
  `datesortie` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table apia.pack : ~0 rows (environ)
/*!40000 ALTER TABLE `pack` DISABLE KEYS */;
/*!40000 ALTER TABLE `pack` ENABLE KEYS */;

-- Listage de la structure de la table apia. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `produit_id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateentree` datetime DEFAULT NULL,
  `datesortie` datetime DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`produit_id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table apia.produit : ~23 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`produit_id`, `categorie`, `nom`, `qte`, `code`, `description`, `dateentree`, `datesortie`, `file_name`, `uploaded_on`, `status`, `deleted_at`) VALUES
	(57, 'Huiles cosmÃ©tiques', 'Argan Oil', 210, 572420, 'Huile de pÃ©pins de figue de barbarie du Maroc : pure, rare et prÃ©cieuse. Câ€™est une panacÃ©e pour lutter contre le vieillissea', '2021-07-18 10:24:20', NULL, 'Huile_d_Argan_spray_APIA.jpg', '2021-07-29 14:08:37', '1', NULL),
	(70, 'Huiles cosmÃ©tiques', 'Huile Dâ€™Olive Extra-vierge Ã  l Ail', 200, 704138, 'Huile dâ€™olive extra vierge aromatisÃ©e allie les qualitÃ©s nutritives et curatives des deux produits. Lâ€™huile dâ€™olive est diÃ©tÃ©tique, lÃ©gÃ¨re, riche en gras mono-insaturÃ©s antioxydants.', '2021-07-25 01:41:38', NULL, 'Huile_Olive_Extra_vierge_a_l_Ail_APIA.jpg', '2021-07-25 23:14:17', '1', NULL),
	(72, 'Soins capilaire', 'Ampoules Capillaires Anti-Chute', 150, 723432, 'Traitement de Apia Derm, spÃ©cialement conÃ§u pour rÃ©pondre aux problÃ¨mes de chutes de cheveux fÃ©minins. Formule concentrÃ©e relance rapidement la croissance des cheveux et ralentit leur chute.', '2021-07-25 22:34:32', NULL, 'Ampoules-Capillaires-Anti-Chute.jpg', '2021-07-26 17:13:39', '1', NULL),
	(73, 'Soins capilaire', 'CrÃ¨me Solaire SPF 50+ Flacon', 110, 731307, 'CrÃ¨me de protection solaire total SPF 50+ apporte une parfaite protection contre les rayons du soleil grÃ¢ce aux filtres UVB et UVA quâ€™elle contient, qui permettent de protÃ©ger la peau et dâ€™Ã©viter les rougeurs et les sensations dâ€™inconfort dues au soleil.', '2021-07-25 23:13:07', NULL, 'Creme_Solaire_SPF_50_APIA.jpg', '2021-07-27 15:36:51', '1', NULL),
	(75, 'Huiles cosmÃ©tiques', 'Eau de Rose', 90, 750717, 'Lâ€™eau de rose sert Ã  la beautÃ© des femmes depuis lâ€™AntiquitÃ©. Ce nâ€™est pas un hasard. Les pÃ©tales que lâ€™on distille pour produire lâ€™eau de rose sont riches en vitamines A et C, ainsi quâ€™en acides gras essentiels.', '2021-07-26 22:07:17', NULL, 'Eau_de_Rose_APIA.jpg', '2021-07-26 22:07:17', '1', NULL),
	(76, 'Alimentaire', 'Abricots sÃ©chÃ©s', 90, 763309, 'Les abricots secs sont un vÃ©ritable festival de couleur et dâ€™Ã©nergie. SÃ©lectionnÃ©s parmi les meilleurs terroirs du Maroc, les abricots sont sÃ©chÃ©s naturellement Ã  lâ€™air. Ainsi conservÃ©s, ils se consomment toute lâ€™annÃ©e.', '2021-07-26 22:33:09', NULL, 'Abricots_seches_APIA-1.jpg', '2021-07-26 22:42:37', '1', NULL),
	(77, 'Rituels hammam', 'HennÃ©', 190, 770126, 'Le hennÃ© enrichi aux plantes Apia Derm prend soin de votre peau et de vos cheveux. Le hennÃ© est connu pour ses vertus revitalisantes et apaisantes pour la peau. Câ€™est un excellent exfoliant.', '2021-07-26 23:01:26', NULL, 'Henne_aux_Plantes_APIA.jpg', '2021-07-26 23:01:26', '1', NULL),
	(79, 'Gels Hydroalcooliques', 'Gel Hydroalcoolique 5L', 40, 792502, 'Gel hydroalcoolique pour dÃ©sinfection des mains, autorisÃ© par le ministÃ¨re de la santÃ© sous le numÃ©ro DMP :  08UPCHC/DMP00\r\n\r\nefficace Ã  100% contre les germes.', '2021-07-26 23:25:02', NULL, 'Gel_Hydroalcoolique_5L_APIA.jpg', '2021-07-26 23:26:46', '1', NULL),
	(85, 'Alimentaire', 'Huile dâ€™Argan Ambre', 200, 850339, 'Lâ€™huile dâ€™argan parfumÃ©e Ã  lâ€™ambre  Apia est 100 % naturelle, elle lui apporte une note orientale, avec son riche parfum musquÃ©, ses notes lourdes et puissantes suivies dâ€™un jaillissement de notes florales.', '2021-07-27 10:03:39', NULL, 'Huile_d_Argan_Ambre_APIA.jpg', '2021-07-28 11:55:30', '1', NULL),
	(87, 'Huiles cosmÃ©tiques', 'Piment Vert Confit', 80, 873141, 'Le piment vert confit Ã  lâ€™huile dâ€™olive extra-vierge dâ€™Apia est constituÃ© de vÃ©ritables morceaux de piments frais pelÃ©s, cuits, puis confits dans de lâ€™huile. Ils sont parfaits pour relever vos plats, ou pour Ãªtre consommÃ©s en salades.', '2021-07-27 11:31:41', NULL, 'Piment_Vert_Confit_APIA.jpg', '2021-07-27 20:18:22', '1', NULL),
	(90, 'Alimentaire', 'Modi quibusdam quam ', 34, 901749, 'Similique aut nisi d', '2021-07-27 12:17:49', NULL, 'Zinc.jpg', '2021-07-30 14:24:28', '1', NULL),
	(97, 'Alimentaire', 'GelÃ©e Royale', 90, 971118, 'La GelÃ©e Royale ou lait dâ€™abeille est une substance blanchatre sÃ©crÃ©tÃ©e par les jeunes abeilles. TrÃ¨s riche en vitamines et substances nutritives, câ€™est un produit noble.', '2021-07-27 16:11:18', NULL, 'Gelee_Royale_APIA.jpg', '2021-07-27 17:22:16', '1', NULL),
	(98, 'Alimentaire', 'Tisane Minceur', 50, 985350, 'Tisane Ã  base de menthe pouliot, romarin, verveine et Ã©corce de bourdaine', '2021-07-27 20:53:50', NULL, 'Tisane_Minceur_APIA.jpg', '2021-07-29 09:57:55', '1', NULL),
	(103, 'Soins capilaire', 'Odit animi eum adip', 40, 1032237, 'Aut aut sed recusand', '2021-07-27 23:22:36', NULL, 'Beurre_d_Argan_Sublime_Oud_APIA.jpg', '2021-07-28 00:55:45', '1', NULL),
	(104, 'Alimentaire', 'Omnis labore ad saep', 34, 1045743, 'Possimus magnam qui', '2021-07-28 00:57:43', NULL, 'Melange_d_epices_Couscous_APIA.jpg', '2021-07-28 21:47:55', '1', NULL),
	(105, 'Huiles cosmÃ©tiques', 'Parfum maison Douceur Orientale', 39, 1051722, 'Parfum dâ€™ambiance apaisant et naturel', '2021-07-28 23:17:22', NULL, 'Parfum_maison_Douceur_Orientale_APIA.jpg', '2021-07-28 23:17:22', '1', NULL),
	(106, 'Rituels hammam', 'Shampoing Doux', 30, 1062356, 'Le Shampoing Men APIA Derm permet un nettoyage en profondeur des cheveux et du cuir chevelu. Riche aux protÃ©ines de blÃ© et de soda.', '2021-07-28 23:23:56', NULL, '1.jpg', '2021-07-28 23:23:56', '1', NULL),
	(107, 'Soins capilaire', 'CrÃ¨me Corps Hydratante Miel', 50, 1075626, 'La crÃ¨me hydratante au miel Apia 100 % naturelle au miel prend soin de toute votre peau et vous permet de retrouver une peau jeune, nette et assainie.', '2021-07-28 23:56:26', NULL, 'Creme_Corps_Hydratante_Miel_APIA.jpg', '2021-07-28 23:56:26', '1', NULL),
	(108, 'Soins visage', 'CrÃ¨me Contour des Yeux Figue de Barbarie', 40, 1080803, 'CrÃ¨me contour des yeux Ã  lâ€™huile de figue de barbarie hydrate, redonne fermetÃ© et Ã©lasticitÃ©', '2021-07-29 00:08:03', NULL, 'Creme_Contour_des_Yeux_Figue_de_Barbarie_APIA-416x416.jpg', '2021-07-29 00:08:03', '1', NULL),
	(109, 'Soins capilaire', 'Fuga Laboris eiusmo', 87, 1091000, 'Suscipit ut suscipit', '2021-07-29 12:10:00', NULL, 'VitamineC.jpg', '2021-07-29 12:10:00', '1', NULL),
	(110, 'Alimentaire', 'Tarkiba 5', 70, 1104321, 'La Tarkiba 5 est une prÃ©paration Ã  base de produits de la ruche tel que le miel de Daghmouss, la gelÃ©e royale, le pollen et le propolis avec du safran.', '2021-07-29 12:43:21', NULL, 'Gelee.jpg', '2021-07-29 12:52:41', '1', NULL),
	(112, 'Soins visage', 'DÃ©maquillant BiphasÃ© Eau de Fleur dâ€™Oranger', 40, 1120913, 'Le dÃ©maquillant biphasÃ©  Ã  la fleur dâ€™oranger Apia Derm vous dÃ©maquille tout en douceur, sans avoir Ã  le frotter, grÃ¢ce Ã  ses deux phases aqueuse et huileuse. Lâ€™huile dissout le maquillage et lâ€™eau Ã©vite la sensation grasse sur les paupiÃ¨res.', '2021-07-29 13:09:13', NULL, 'Demaquillant_Biphase_Eau_de_Fleur_d_Oranger_APIA.jpg', '2021-07-29 13:09:13', '1', NULL),
	(113, 'Soins visage', 'CrÃ¨me Sublime Oud', 60, 1130034, 'La crÃ¨me de soin Apia Sublime Oud protÃ¨ge la peau de votre visage et de votre corps contre le vieillissement et les agressions extÃ©rieures. Elle associe les effets bÃ©nÃ©fiques de lâ€™huile dâ€™Argan aux senteurs envoutantes du Oud.', '2021-07-30 00:00:34', NULL, 'Creme_Sublime_Oud_APIA.jpg', '2021-07-30 00:00:34', '1', NULL);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
