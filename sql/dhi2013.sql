/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : dhi2013

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-12-05 20:46:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ads`
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `ad_area_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `link` text CHARACTER SET latin5,
  `clickcount` varchar(45) CHARACTER SET latin5 DEFAULT NULL,
  `seencount` varchar(45) CHARACTER SET latin5 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ads
-- ----------------------------

-- ----------------------------
-- Table structure for `ad_areas`
-- ----------------------------
DROP TABLE IF EXISTS `ad_areas`;
CREATE TABLE `ad_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `areaid` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ad_areas
-- ----------------------------

-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `value` text,
  `user_id` int(11) DEFAULT NULL,
  `seencount` int(11) DEFAULT NULL,
  `clickcount` int(11) DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `has_comment` tinyint(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `youtube_video` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for `article_settings`
-- ----------------------------
DROP TABLE IF EXISTS `article_settings`;
CREATE TABLE `article_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `user_type_id` int(10) DEFAULT NULL,
  `has_many_image` tinyint(1) DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) DEFAULT '0',
  `has_image_description` tinyint(1) DEFAULT '0',
  `has_image_main` tinyint(1) DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_settings
-- ----------------------------
INSERT INTO `article_settings` VALUES ('1', null, null, null, null, null, null, '1', null, '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `article_id` int(10) unsigned DEFAULT NULL,
  `imagegallery_id` int(10) unsigned DEFAULT NULL,
  `post_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for `comment_settings`
-- ----------------------------
DROP TABLE IF EXISTS `comment_settings`;
CREATE TABLE `comment_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_char` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_settings
-- ----------------------------
INSERT INTO `comment_settings` VALUES ('1', null);

-- ----------------------------
-- Table structure for `contactgroups`
-- ----------------------------
DROP TABLE IF EXISTS `contactgroups`;
CREATE TABLE `contactgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of contactgroups
-- ----------------------------

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `contactgroup_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_tr` varchar(250) DEFAULT NULL,
  `label_tr` varchar(250) DEFAULT NULL,
  `value_tr` text,
  `seencount` int(11) DEFAULT NULL,
  `clickcount` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  `has_comment` tinyint(1) DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `has_start_date_confirm` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_resource_id` int(10) unsigned DEFAULT NULL,
  `has_flash` tinyint(1) DEFAULT '0',
  `youtube_video` varchar(250) DEFAULT NULL,
  `name_en` varchar(250) DEFAULT NULL,
  `name_bg` varchar(250) DEFAULT NULL,
  `label_en` varchar(250) DEFAULT NULL,
  `label_bg` varchar(250) DEFAULT NULL,
  `value_en` text,
  `value_bg` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('2', 'Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.', '29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni', '10:00 - Davetlilerin Kayıtları<br>10:30 - Projenin Resmi Açılış Töreni<br>11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>15:30 - Kahve Molası<br>16:00 - Türk - Bulgar dans ve folklor gösterileri<br>17:00 - Basın Toplantısı', '156', null, null, '2011-07-28 19:50:54', null, null, '1', null, '1', null, null, null, '0', '', 'Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.', 'Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.', '29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni', '29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni', '10:00 - Davetlilerin Kayıtları<br>\r\n10:30 - Projenin Resmi Açılış Töreni<br>\r\n11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>\r\n14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>\r\n15:30 - Kahve Molası<br>\r\n16:00 - Türk - Bulgar dans ve folklor gösterileri<br>\r\n17:00 - Basın Toplantısı', '10:00 - Davetlilerin Kayıtları<br>\r\n10:30 - Projenin Resmi Açılış Töreni<br>\r\n11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>\r\n14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>\r\n15:30 - Kahve Molası<br>\r\n16:00 - Türk - Bulgar dans ve folklor gösterileri<br>\r\n17:00 - Basın Toplantısı', '2011-07-29');

-- ----------------------------
-- Table structure for `imagegallery_settings`
-- ----------------------------
DROP TABLE IF EXISTS `imagegallery_settings`;
CREATE TABLE `imagegallery_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imagegallery_settings
-- ----------------------------
INSERT INTO `imagegallery_settings` VALUES ('1', '3', null, null, null, '1', 'ufak', '0', '0', '0', '');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `imagegallery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `main` tinyint(1) DEFAULT '0',
  `ext` varchar(5) DEFAULT NULL,
  `description` text,
  `notification_id` int(11) unsigned DEFAULT NULL,
  `staticpage_id` int(11) unsigned DEFAULT NULL,
  `productgroup_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `reference_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', null, 'resimler/', '19', null, null, null, null, null, '1', 'jpg', null, null, null, null, null, null);
INSERT INTO `images` VALUES ('2', null, 'resimler/', '19', null, null, null, null, null, '0', 'jpg', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `image_files`
-- ----------------------------
DROP TABLE IF EXISTS `image_files`;
CREATE TABLE `image_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_size_id` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image_files
-- ----------------------------
INSERT INTO `image_files` VALUES ('1', '1', 'post_small_1.jpg', '1');
INSERT INTO `image_files` VALUES ('2', '2', 'post_middle_1.jpg', '1');
INSERT INTO `image_files` VALUES ('3', '3', 'post_orig_1.jpg', '1');
INSERT INTO `image_files` VALUES ('5', '1', 'post_small_2.jpg', '2');
INSERT INTO `image_files` VALUES ('6', '2', 'post_middle_2.jpg', '2');
INSERT INTO `image_files` VALUES ('7', '3', 'post_orig_2.jpg', '2');

-- ----------------------------
-- Table structure for `image_galleries`
-- ----------------------------
DROP TABLE IF EXISTS `image_galleries`;
CREATE TABLE `image_galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `has_comment` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image_galleries
-- ----------------------------

-- ----------------------------
-- Table structure for `image_sizes`
-- ----------------------------
DROP TABLE IF EXISTS `image_sizes`;
CREATE TABLE `image_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image_sizes
-- ----------------------------
INSERT INTO `image_sizes` VALUES ('1', '1', '100', '100', '100', 'small');
INSERT INTO `image_sizes` VALUES ('2', '1', '150', '150', '100', 'middle');
INSERT INTO `image_sizes` VALUES ('3', '1', null, null, '100', 'orig');

-- ----------------------------
-- Table structure for `image_types`
-- ----------------------------
DROP TABLE IF EXISTS `image_types`;
CREATE TABLE `image_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image_types
-- ----------------------------
INSERT INTO `image_types` VALUES ('1', 'Haber');

-- ----------------------------
-- Table structure for `imprintgroups`
-- ----------------------------
DROP TABLE IF EXISTS `imprintgroups`;
CREATE TABLE `imprintgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
-- Records of imprintgroups
-- ----------------------------

-- ----------------------------
-- Table structure for `imprints`
-- ----------------------------
DROP TABLE IF EXISTS `imprints`;
CREATE TABLE `imprints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `imprintgroup_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imprints
-- ----------------------------

-- ----------------------------
-- Table structure for `menuareas`
-- ----------------------------
DROP TABLE IF EXISTS `menuareas`;
CREATE TABLE `menuareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menuareas
-- ----------------------------

-- ----------------------------
-- Table structure for `notifications`
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for `notification_settings`
-- ----------------------------
DROP TABLE IF EXISTS `notification_settings`;
CREATE TABLE `notification_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notification_settings
-- ----------------------------
INSERT INTO `notification_settings` VALUES ('1', null, null, null, null, null, null, '1', null, '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `controller` varchar(45) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('5', 'Haberler', 'posts', '1');
INSERT INTO `pages` VALUES ('11', 'Resim Galerileri', 'imagegalleries', '6');
INSERT INTO `pages` VALUES ('10', 'Ürünler', 'products', '3');
INSERT INTO `pages` VALUES ('9', 'Sayfalar', 'staticpages', '5');
INSERT INTO `pages` VALUES ('12', 'İletişim', 'contacts', '4');
INSERT INTO `pages` VALUES ('14', 'Kullanıcılar', 'users', '7');
INSERT INTO `pages` VALUES ('15', 'Referanslar', 'references', '8');

-- ----------------------------
-- Table structure for `page_links`
-- ----------------------------
DROP TABLE IF EXISTS `page_links`;
CREATE TABLE `page_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order` int(11) DEFAULT '1000',
  `link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page_links
-- ----------------------------
INSERT INTO `page_links` VALUES ('4', '5', 'Yeni Haber Ekle', '1', '/posts/add');
INSERT INTO `page_links` VALUES ('5', '5', 'Haberler', '2', '/posts/index');
INSERT INTO `page_links` VALUES ('19', '10', 'Ürünler', '3', '/products/index');
INSERT INTO `page_links` VALUES ('18', '10', 'Yeni Ürün Ekle', '4', '/products/add');
INSERT INTO `page_links` VALUES ('17', '10', 'Yeni Ürün Grubu', '2', '/productgroups/add');
INSERT INTO `page_links` VALUES ('16', '10', 'Ürün Grupları', '1', '/productgroups/index');
INSERT INTO `page_links` VALUES ('14', '9', 'Yeni Sayfa Ekle', '1', '/staticpages/add');
INSERT INTO `page_links` VALUES ('15', '9', 'Sayfalar', '2', '/staticpages/index');
INSERT INTO `page_links` VALUES ('20', '11', 'Yeni Resim Galerisi', '1', '/imagegalleries/add');
INSERT INTO `page_links` VALUES ('21', '11', 'Resim Galerileri', '2', '/imagegalleries/index');
INSERT INTO `page_links` VALUES ('23', '12', 'Yeni İletişim Bilgisi', '1', '/contacts/add');
INSERT INTO `page_links` VALUES ('24', '12', 'İletişim Bilgileri', '2', '/contacts/index');
INSERT INTO `page_links` VALUES ('29', '14', 'Kullanıcılar', '1', '/users/index');
INSERT INTO `page_links` VALUES ('30', '15', 'Yeni Referans Ekle', '1', '/references/add');
INSERT INTO `page_links` VALUES ('31', '15', 'Referanslar', '2', '/references/index');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `label` varchar(250) DEFAULT NULL,
  `value` text,
  `seencount` int(11) DEFAULT NULL,
  `clickcount` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  `has_comment` tinyint(1) DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `has_start_date_confirm` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `has_flash` tinyint(1) DEFAULT '0',
  `youtube_video` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `name_eng` varchar(250) DEFAULT NULL,
  `name_rus` varchar(250) DEFAULT NULL,
  `label_eng` varchar(250) DEFAULT NULL,
  `label_rus` varchar(250) DEFAULT NULL,
  `value_eng` text,
  `value_rus` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('18', 'asd', 'asd', 'asdasd', null, null, null, '2013-12-01 22:41:46', null, null, '1', null, null, null, '0', null, null, 'asd', 'asd', 'asd', 'asd', 'dasdasd', 'asdas');
INSERT INTO `posts` VALUES ('19', '', '', '', null, null, null, '2013-12-04 19:29:15', null, null, '0', null, null, null, '0', null, 'CIMG0054.JPG', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `post_settings`
-- ----------------------------
DROP TABLE IF EXISTS `post_settings`;
CREATE TABLE `post_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_settings
-- ----------------------------
INSERT INTO `post_settings` VALUES ('1', '1', null, null, null, null, null, '1', '', '1', '1', '1', 'small', '');

-- ----------------------------
-- Table structure for `productgroups`
-- ----------------------------
DROP TABLE IF EXISTS `productgroups`;
CREATE TABLE `productgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `clickcount` int(11) DEFAULT NULL,
  `seencount` int(11) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `order` int(11) DEFAULT '10000',
  `productgroup_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `urunaltgrup` int(11) DEFAULT NULL,
  `value_eng` text,
  `value_rus` text,
  `name_eng` varchar(200) DEFAULT NULL,
  `name_rus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of productgroups
-- ----------------------------
INSERT INTO `productgroups` VALUES ('4', 'Endüstriyel Led Aydınlatma', 'Endüstriyel Led Aydınlatma1', '1', null, null, null, '10000', null, null, '3', '4', null, 'Endüstriyel Led Aydınlatma2', 'Endüstriyel Led Aydınlatma3', 'Endüstriyel Led Aydınlatma2', 'Endüstriyel Led Aydınlatma3');
INSERT INTO `productgroups` VALUES ('3', 'Yer Hizmetleri Ekipmanları', '', '1', null, null, null, '10000', null, null, '1', '2', null, null, null, null, null);

-- ----------------------------
-- Table structure for `productgroup_settings`
-- ----------------------------
DROP TABLE IF EXISTS `productgroup_settings`;
CREATE TABLE `productgroup_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of productgroup_settings
-- ----------------------------
INSERT INTO `productgroup_settings` VALUES ('1', '6', null, null, null, null, null, '0', '', '1', '0', '0', 'vitrin', '');

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `value` text,
  `label` varchar(200) DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `clickcount` int(11) DEFAULT NULL,
  `seencount` int(11) DEFAULT NULL,
  `has_comment` tinyint(1) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `productgroup_id` int(11) DEFAULT NULL,
  `productcode` varchar(150) DEFAULT NULL,
  `value_eng` text,
  `value_rus` text,
  `name_eng` varchar(200) DEFAULT NULL,
  `name_rus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '11', '111', null, '1', null, null, null, null, null, null, null, null, '3', '101', '222', '333', '22', '33');

-- ----------------------------
-- Table structure for `product_settings`
-- ----------------------------
DROP TABLE IF EXISTS `product_settings`;
CREATE TABLE `product_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_settings
-- ----------------------------
INSERT INTO `product_settings` VALUES ('1', '5', null, null, null, null, null, '0', '', '0', '0', '1', '', '');

-- ----------------------------
-- Table structure for `references`
-- ----------------------------
DROP TABLE IF EXISTS `references`;
CREATE TABLE `references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of references
-- ----------------------------
INSERT INTO `references` VALUES ('10', 'kaptan demir çelik -  tekirdağ çorlu ');

-- ----------------------------
-- Table structure for `reference_settings`
-- ----------------------------
DROP TABLE IF EXISTS `reference_settings`;
CREATE TABLE `reference_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reference_settings
-- ----------------------------
INSERT INTO `reference_settings` VALUES ('1', '7', null, null, null, null, null, '0', 'buyuk', '0', '0', '1', '', '');

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of services
-- ----------------------------

-- ----------------------------
-- Table structure for `service_settings`
-- ----------------------------
DROP TABLE IF EXISTS `service_settings`;
CREATE TABLE `service_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_settings
-- ----------------------------
INSERT INTO `service_settings` VALUES ('1', '4', null, null, null, null, null, '0', '', '0', '0', '0', 'hizmet', '');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_mail` varchar(100) DEFAULT NULL,
  `sender_smtp` varchar(100) DEFAULT NULL,
  `sender_smtp_port` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', '', '', '');

-- ----------------------------
-- Table structure for `staticpages`
-- ----------------------------
DROP TABLE IF EXISTS `staticpages`;
CREATE TABLE `staticpages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `value` text,
  `youtube_video` varchar(100) DEFAULT NULL,
  `name_eng` varchar(250) DEFAULT NULL,
  `name_rus` varchar(250) DEFAULT NULL,
  `value_eng` text,
  `value_rus` text,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `menuarea_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staticpages
-- ----------------------------

-- ----------------------------
-- Table structure for `staticpage_settings`
-- ----------------------------
DROP TABLE IF EXISTS `staticpage_settings`;
CREATE TABLE `staticpage_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `label_sub_char` int(11) DEFAULT NULL,
  `name_sub_char` int(11) DEFAULT NULL,
  `value_sub_char` int(11) DEFAULT NULL,
  `video_width` int(11) DEFAULT NULL,
  `video_height` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) NOT NULL DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_description` tinyint(1) NOT NULL DEFAULT '0',
  `has_image_main` tinyint(1) NOT NULL DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  `default_video_code` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staticpage_settings
-- ----------------------------
INSERT INTO `staticpage_settings` VALUES ('1', '3', null, null, null, null, null, '1', 'ufak', '0', '0', '0', '', '');

-- ----------------------------
-- Table structure for `surveys`
-- ----------------------------
DROP TABLE IF EXISTS `surveys`;
CREATE TABLE `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `voters_count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of surveys
-- ----------------------------
INSERT INTO `surveys` VALUES ('1', 'şube', '0', null, '2011-08-13 17:37:53');

-- ----------------------------
-- Table structure for `survey_values`
-- ----------------------------
DROP TABLE IF EXISTS `survey_values`;
CREATE TABLE `survey_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `voters_count` int(11) DEFAULT NULL,
  `yuzde` float DEFAULT NULL,
  `survey_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_values
-- ----------------------------
INSERT INTO `survey_values` VALUES ('1', 'sdf', '0', '0', '1');
INSERT INTO `survey_values` VALUES ('2', 'sdf', '0', '0', '1');
INSERT INTO `survey_values` VALUES ('3', 'sdf', '0', '0', '1');
INSERT INTO `survey_values` VALUES ('4', 'sdf', '0', '0', '1');

-- ----------------------------
-- Table structure for `survey_voters`
-- ----------------------------
DROP TABLE IF EXISTS `survey_voters`;
CREATE TABLE `survey_voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `survey_value_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of survey_voters
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `surname` varchar(75) DEFAULT NULL,
  `mail` varchar(75) DEFAULT NULL,
  `value` text,
  `user_type_id` int(11) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `password` varchar(200) DEFAULT NULL,
  `confirm` tinyint(1) unsigned DEFAULT NULL,
  `confirm_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modifly` datetime DEFAULT NULL,
  `ban` tinyint(1) unsigned DEFAULT '0',
  `username` varchar(45) DEFAULT NULL,
  `has_confirm` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Burak', 'Doğan', 'admin@admin.net', null, '1', '1', '3a9e8a740b5d5c0d19625bff90a9f92e', '1', null, '2011-07-26 16:37:24', null, '0', 'bdogan', null);
INSERT INTO `users` VALUES ('4', 'ırmak', 'Dalyan', 'info@app-factory.be', null, '3', '0', '05f6e71c0cbb626bbcae11a906794b2f', '1', null, '2011-12-03 15:01:03', null, '0', 'irmak', null);

-- ----------------------------
-- Table structure for `user_permits`
-- ----------------------------
DROP TABLE IF EXISTS `user_permits`;
CREATE TABLE `user_permits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_permits
-- ----------------------------
INSERT INTO `user_permits` VALUES ('3', '3', '9');
INSERT INTO `user_permits` VALUES ('8', '3', '5');
INSERT INTO `user_permits` VALUES ('5', '3', '10');
INSERT INTO `user_permits` VALUES ('6', '3', '12');

-- ----------------------------
-- Table structure for `user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `value` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_profiles
-- ----------------------------

-- ----------------------------
-- Table structure for `user_settings`
-- ----------------------------
DROP TABLE IF EXISTS `user_settings`;
CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `has_many_image` tinyint(1) DEFAULT '1',
  `default_image_size_name` varchar(20) DEFAULT NULL,
  `has_image_name` tinyint(1) DEFAULT '0',
  `has_image_description` tinyint(1) DEFAULT '0',
  `has_image_main` tinyint(1) DEFAULT '0',
  `default_image_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_settings
-- ----------------------------
INSERT INTO `user_settings` VALUES ('1', null, '1', null, '0', '0', '0', null);

-- ----------------------------
-- Table structure for `user_types`
-- ----------------------------
DROP TABLE IF EXISTS `user_types`;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `panel_giris` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_types
-- ----------------------------
INSERT INTO `user_types` VALUES ('1', 'Site Y', '1', '1');
INSERT INTO `user_types` VALUES ('3', 'Kullanıcı', '0', '1');

-- ----------------------------
-- Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) DEFAULT NULL,
  `youtubevideoid` varchar(100) DEFAULT NULL,
  `code` text,
  `article_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of videos
-- ----------------------------
