/*
 Navicat MySQL Data Transfer

 Source Server         : sentezyum
 Source Server Type    : MySQL
 Source Server Version : 50158
 Source Host           : noktatercih.com
 Source Database       : dhi2013

 Target Server Type    : MySQL
 Target Server Version : 50158
 File Encoding         : utf-8

 Date: 12/08/2013 16:38:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

USE gocmen_dhi2013;

-- ----------------------------
--  Table structure for `ad_areas`
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
--  Table structure for `ads`
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
--  Table structure for `article_settings`
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
--  Records of `article_settings`
-- ----------------------------
BEGIN;
INSERT INTO `article_settings` VALUES ('1', null, null, null, null, null, null, '1', null, '0', '0', '0', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `articles`
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
--  Table structure for `comment_settings`
-- ----------------------------
DROP TABLE IF EXISTS `comment_settings`;
CREATE TABLE `comment_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_char` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `comment_settings`
-- ----------------------------
BEGIN;
INSERT INTO `comment_settings` VALUES ('1', null);
COMMIT;

-- ----------------------------
--  Table structure for `comments`
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
--  Table structure for `contactgroups`
-- ----------------------------
DROP TABLE IF EXISTS `contactgroups`;
CREATE TABLE `contactgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
--  Records of `contactgroups`
-- ----------------------------
BEGIN;
INSERT INTO `contactgroups` VALUES ('1', 'Merkez');
COMMIT;

-- ----------------------------
--  Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `contactgroup_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `contacts`
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES ('5', '(111) 222-33-33', 'Telefon', '1', '2'), ('4', '(222) 222-55-44', 'Fax', '1', '1'), ('6', 'info@dhi.com.tr', 'E-Mail', '1', '3');
COMMIT;

-- ----------------------------
--  Table structure for `events`
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
--  Records of `events`
-- ----------------------------
BEGIN;
INSERT INTO `events` VALUES ('2', 'Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.', '29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni', '10:00 - Davetlilerin Kayıtları<br>10:30 - Projenin Resmi Açılış Töreni<br>11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>15:30 - Kahve Molası<br>16:00 - Türk - Bulgar dans ve folklor gösterileri<br>17:00 - Basın Toplantısı', '156', null, null, '2011-07-28 19:50:54', null, null, '1', null, '1', null, null, null, '0', '', 'Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.', 'Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.', '29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni', '29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni', '10:00 - Davetlilerin Kayıtları<br>\r\n10:30 - Projenin Resmi Açılış Töreni<br>\r\n11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>\r\n14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>\r\n15:30 - Kahve Molası<br>\r\n16:00 - Türk - Bulgar dans ve folklor gösterileri<br>\r\n17:00 - Basın Toplantısı', '10:00 - Davetlilerin Kayıtları<br>\r\n10:30 - Projenin Resmi Açılış Töreni<br>\r\n11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>\r\n14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>\r\n15:30 - Kahve Molası<br>\r\n16:00 - Türk - Bulgar dans ve folklor gösterileri<br>\r\n17:00 - Basın Toplantısı', '2011-07-29');
COMMIT;

-- ----------------------------
--  Table structure for `image_files`
-- ----------------------------
DROP TABLE IF EXISTS `image_files`;
CREATE TABLE `image_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_size_id` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `image_files`
-- ----------------------------
BEGIN;
INSERT INTO `image_files` VALUES ('19', '4', 'productgroup_normal_6.png', '6'), ('21', '4', 'productgroup_normal_5.jpg', '5'), ('23', '4', 'staticpage_normal_7.jpg', '7'), ('25', '5', 'product_small_8.jpg', '8'), ('26', '6', 'product_normal_8.jpg', '8'), ('27', '7', 'product_orig_8.jpg', '8'), ('29', '5', 'product_small_9.png', '9'), ('30', '6', 'product_normal_9.png', '9'), ('31', '7', 'product_orig_9.png', '9'), ('33', '5', 'product_small_10.png', '10'), ('34', '6', 'product_normal_10.png', '10'), ('35', '7', 'product_orig_10.png', '10'), ('37', '5', 'product_small_11.jpg', '11'), ('38', '6', 'product_normal_11.jpg', '11'), ('39', '7', 'product_orig_11.jpg', '11'), ('41', '4', 'productgroup_normal_12.png', '12');
COMMIT;

-- ----------------------------
--  Table structure for `image_galleries`
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
--  Table structure for `image_sizes`
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `image_sizes`
-- ----------------------------
BEGIN;
INSERT INTO `image_sizes` VALUES ('1', '1', '100', '100', '100', 'small'), ('2', '1', '150', '150', '100', 'middle'), ('3', '1', null, null, '100', 'orig'), ('4', '2', '700', '255', '100', 'normal'), ('5', '3', '70', '70', '100', 'small'), ('6', '3', '700', '255', '100', 'normal'), ('7', '3', null, null, '100', 'orig');
COMMIT;

-- ----------------------------
--  Table structure for `image_types`
-- ----------------------------
DROP TABLE IF EXISTS `image_types`;
CREATE TABLE `image_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `image_types`
-- ----------------------------
BEGIN;
INSERT INTO `image_types` VALUES ('1', 'Haber'), ('2', 'Urun_grubu'), ('3', 'Urun');
COMMIT;

-- ----------------------------
--  Table structure for `imagegallery_settings`
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
--  Records of `imagegallery_settings`
-- ----------------------------
BEGIN;
INSERT INTO `imagegallery_settings` VALUES ('1', '3', null, null, null, '1', 'ufak', '0', '0', '0', '');
COMMIT;

-- ----------------------------
--  Table structure for `images`
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
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `images`
-- ----------------------------
BEGIN;
INSERT INTO `images` VALUES ('5', 'normal', 'resimler/', null, null, null, null, null, null, '1', 'jpg', null, null, null, '4', null, null, '2013-12-06 04:46:05'), ('6', 'normal', 'resimler/', null, null, null, null, null, null, '1', 'png', null, null, null, '3', null, null, null), ('7', 'normal', 'resimler/', null, null, null, null, null, null, '1', 'jpg', null, null, '1', null, null, null, '2013-12-06 06:09:40'), ('8', 'small', 'resimler/', null, null, null, null, null, '2', '0', 'jpg', null, null, null, null, null, null, '2013-12-06 07:57:39'), ('9', 'small', 'resimler/', null, null, null, null, null, '2', '0', 'png', null, null, null, null, null, null, '2013-12-06 07:57:45'), ('10', 'small', 'resimler/', null, null, null, null, null, '2', '1', 'png', null, null, null, null, null, null, '2013-12-06 07:58:17'), ('11', 'small', 'resimler/', null, null, null, null, null, '2', '0', 'jpg', null, null, null, null, null, null, '2013-12-06 07:58:12'), ('12', 'normal', 'resimler/', null, null, null, null, null, null, '1', 'png', null, null, null, '10', null, null, '2013-12-06 08:31:24');
COMMIT;

-- ----------------------------
--  Table structure for `imprintgroups`
-- ----------------------------
DROP TABLE IF EXISTS `imprintgroups`;
CREATE TABLE `imprintgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- ----------------------------
--  Table structure for `imprints`
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
--  Table structure for `menuareas`
-- ----------------------------
DROP TABLE IF EXISTS `menuareas`;
CREATE TABLE `menuareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `notification_settings`
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
--  Records of `notification_settings`
-- ----------------------------
BEGIN;
INSERT INTO `notification_settings` VALUES ('1', null, null, null, null, null, null, '1', null, '0', '0', '0', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `notifications`
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
--  Table structure for `page_links`
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
--  Records of `page_links`
-- ----------------------------
BEGIN;
INSERT INTO `page_links` VALUES ('4', '5', 'Yeni Haber Ekle', '1', '/posts/add'), ('5', '5', 'Haberler', '2', '/posts/index'), ('19', '10', 'Ürünler', '3', '/products/index'), ('18', '10', 'Yeni Ürün Ekle', '4', '/products/add'), ('17', '10', 'Yeni Ürün Grubu', '2', '/productgroups/add'), ('16', '10', 'Ürün Grupları', '1', '/productgroups/index'), ('14', '9', 'Yeni Sayfa Ekle', '1', '/staticpages/add'), ('15', '9', 'Sayfalar', '2', '/staticpages/index'), ('20', '11', 'Yeni Resim Galerisi', '1', '/imagegalleries/add'), ('21', '11', 'Resim Galerileri', '2', '/imagegalleries/index'), ('23', '12', 'Yeni İletişim Bilgisi', '1', '/contacts/add'), ('24', '12', 'İletişim Bilgileri', '2', '/contacts/index'), ('29', '14', 'Kullanıcılar', '1', '/users/index'), ('30', '15', 'Yeni Referans Ekle', '1', '/references/add'), ('31', '15', 'Referanslar', '2', '/references/index');
COMMIT;

-- ----------------------------
--  Table structure for `pages`
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
--  Records of `pages`
-- ----------------------------
BEGIN;
INSERT INTO `pages` VALUES ('5', 'Haberler', 'posts', '1'), ('11', 'Resim Galerileri', 'imagegalleries', '6'), ('10', 'Ürünler', 'products', '3'), ('9', 'Sayfalar', 'staticpages', '5'), ('12', 'İletişim', 'contacts', '4'), ('14', 'Kullanıcılar', 'users', '7'), ('15', 'Referanslar', 'references', '8');
COMMIT;

-- ----------------------------
--  Table structure for `post_settings`
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
--  Records of `post_settings`
-- ----------------------------
BEGIN;
INSERT INTO `post_settings` VALUES ('1', '1', null, null, null, null, null, '1', 'small', '0', '0', '1', 'small', '');
COMMIT;

-- ----------------------------
--  Table structure for `posts`
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
--  Records of `posts`
-- ----------------------------
BEGIN;
INSERT INTO `posts` VALUES ('18', 'Engelsiz havaalanı sayısı 23′e yükseldi', 'Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,', '<h3>Engelsiz havaalanı sayısı 23′e yükseldi</h3><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>', null, null, null, '2013-12-01 22:41:46', null, null, '1', null, '1', null, '0', null, null, 'Engelsiz havaalanı sayısı 23′e yükseldi', 'Engelsiz havaalanı sayısı 23′e yükseldi', 'Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,', 'Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,', '<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>', '<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>'), ('19', 'Engelsiz havaalanı sayısı 23′e yükseldi', 'Engelsiz havaalanı sayısı 23′e yükseldi\r\nTekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacı', '<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>', null, null, null, '2013-12-04 19:29:15', null, null, '1', null, '1', null, '0', null, 'CIMG0054.JPG', 'Engelsiz havaalanı sayısı 23′e yükseldi', 'Engelsiz havaalanı sayısı 23′e yükseldi', 'Engelsiz havaalanı sayısı 23′e yükseldi\r\nTekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacı', 'Engelsiz havaalanı sayısı 23′e yükseldi\r\nTekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacı', '<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>', '<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>');
COMMIT;

-- ----------------------------
--  Table structure for `product_settings`
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
--  Records of `product_settings`
-- ----------------------------
BEGIN;
INSERT INTO `product_settings` VALUES ('1', '3', null, null, null, null, null, '1', 'normal', '0', '0', '1', 'small', '');
COMMIT;

-- ----------------------------
--  Table structure for `productgroup_settings`
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
--  Records of `productgroup_settings`
-- ----------------------------
BEGIN;
INSERT INTO `productgroup_settings` VALUES ('1', '2', null, null, null, null, null, '0', 'normal', '0', '0', '1', 'normal', '');
COMMIT;

-- ----------------------------
--  Table structure for `productgroups`
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `productgroups`
-- ----------------------------
BEGIN;
INSERT INTO `productgroups` VALUES ('4', 'Endüstriyel Led Aydınlatma', '<h3>Led teknoloji</h3><div>Led kelimesi Light Emitting Diode\'unkısatması olarak kullanılmaktadır. Dilimize Işık YayanDiotolarak çevrilebilir. Yapay işık kaynaklarından en sonbulunanıdır. Ampul veya fluoresanların yaydığı ışıktanbambaşka bir yöntemle ışık oluşturması ve bazı avantajlıyanları ledleri bilimin popüler konularından biriyapmıştır. P ve N tipi yarı iletken katmanlar(Led çipi),yansıtıcı yüzey ve iletken alanlar bir ledin yapısınıoluşturur. Diğer yapay ışık kaynaklarında olduğu gibiledlerde de ışık, elektrik enerjisi kullanılarakoluşturulur. Diyotun içerisindeki elektron ve elektronyitirip \" +\" yük kazanan bölge(deşik) birleşerek bir ışımameydana gelmektedir. Bu ışımanın enerjisi deşik veelektronlar arasındaki enerji farkı kadardır. Led çipitürü değiştikçe aradaki enerji farkı da değişmekte, buışığın dalga boyunun dolayısıyla renginin farklı olmasınısağlamaktadır. Bu şekilde birçok renk elde etmekmümkündür. LEDin hangi renkte ışık yayması isteniyorsagalyum, arsenit, alüminyum, fosfat, indiyum, nitrit gibikimyasallardan belirli ölçülerde yarı iletken malzemeyeilave edilir. (GaAIAs, GaAs, GaAsP, GaP, InGaAIP, SiC,GaN). Böylece LED çipinin istenen dalga boyunda ışımayapması sağlanır. Örneğin kırmızı renk (660nm) içinGaAlAs, sarı renk (595nm) için InGaAIP, yeşil renk (565nm)için GaP, mavi renk (430nm) için GaN kullanılır. LED\'lerdiğer ışık kaynaklarından farklı olarak sadece bir renküretmektedirler. Bilindiği gibi gün ışığı tüm renklerinkarışımıdır. Bu karışım ise beyaz ışığı oluşturmaktadır.Diğer ışık kaynaklarında örneğin kırmızı ışık elde edilmekisteniyorsa, beyaz ışığın önüne yerleştirilen kırmızı birkatman dışarıya sadece kırmızı ışığın geçmesini sağlıyor,diğer ışınlar içerde kalıyordu. İşte diyotlarınaydınlatmada en önemli katkısı sadece bir renk üretmesi,fazladan renkler ortaya çıkarmamasıdır. Bir LED kırmızıyeşil mavi gibi tek renk ışık yaymaktadır. Bu avantaj,konu beyaz ışık olduğunda dezavantaja dönüşmekte. LedLambaTüm ışık türleri beyaz ışığı oluşturduğu için tekdalga boyundan beyaz ışık üretmek mümkün değildir. Busorunu çözmek için iki yöntem uygulanmaktadır. - Kırmızı,mavi ve yeşil renkli üç led çipini aynı kılıf içindeçalıştırarak renklerin birleşiminden beyaz ışık üretmek. -Mavi led yongasından(çipinden) çıkan ışığın bir fosfortabakasını uyararak beyaz ışık yayılması.<br></div>', '1', null, null, null, '10000', null, null, '5', '16', null, '<h3>Led teknoloji Eng</h3><div>Led kelimesi Light Emitting Diode\'unkısatması olarak kullanılmaktadır. Dilimize Işık YayanDiotolarak çevrilebilir. Yapay işık kaynaklarından en sonbulunanıdır. Ampul veya fluoresanların yaydığı ışıktanbambaşka bir yöntemle ışık oluşturması ve bazı avantajlıyanları ledleri bilimin popüler konularından biriyapmıştır. P ve N tipi yarı iletken katmanlar(Led çipi),yansıtıcı yüzey ve iletken alanlar bir ledin yapısınıoluşturur. Diğer yapay ışık kaynaklarında olduğu gibiledlerde de ışık, elektrik enerjisi kullanılarakoluşturulur. Diyotun içerisindeki elektron ve elektronyitirip \" +\" yük kazanan bölge(deşik) birleşerek bir ışımameydana gelmektedir. Bu ışımanın enerjisi deşik veelektronlar arasındaki enerji farkı kadardır. Led çipitürü değiştikçe aradaki enerji farkı da değişmekte, buışığın dalga boyunun dolayısıyla renginin farklı olmasınısağlamaktadır. Bu şekilde birçok renk elde etmekmümkündür. LEDin hangi renkte ışık yayması isteniyorsagalyum, arsenit, alüminyum, fosfat, indiyum, nitrit gibikimyasallardan belirli ölçülerde yarı iletken malzemeyeilave edilir. (GaAIAs, GaAs, GaAsP, GaP, InGaAIP, SiC,GaN). Böylece LED çipinin istenen dalga boyunda ışımayapması sağlanır. Örneğin kırmızı renk (660nm) içinGaAlAs, sarı renk (595nm) için InGaAIP, yeşil renk (565nm)için GaP, mavi renk (430nm) için GaN kullanılır. LED\'lerdiğer ışık kaynaklarından farklı olarak sadece bir renküretmektedirler. Bilindiği gibi gün ışığı tüm renklerinkarışımıdır. Bu karışım ise beyaz ışığı oluşturmaktadır.Diğer ışık kaynaklarında örneğin kırmızı ışık elde edilmekisteniyorsa, beyaz ışığın önüne yerleştirilen kırmızı birkatman dışarıya sadece kırmızı ışığın geçmesini sağlıyor,diğer ışınlar içerde kalıyordu. İşte diyotlarınaydınlatmada en önemli katkısı sadece bir renk üretmesi,fazladan renkler ortaya çıkarmamasıdır. Bir LED kırmızıyeşil mavi gibi tek renk ışık yaymaktadır. Bu avantaj,konu beyaz ışık olduğunda dezavantaja dönüşmekte. LedLambaTüm ışık türleri beyaz ışığı oluşturduğu için tekdalga boyundan beyaz ışık üretmek mümkün değildir. Busorunu çözmek için iki yöntem uygulanmaktadır. - Kırmızı,mavi ve yeşil renkli üç led çipini aynı kılıf içindeçalıştırarak renklerin birleşiminden beyaz ışık üretmek. -Mavi led yongasından(çipinden) çıkan ışığın bir fosfortabakasını uyararak beyaz ışık yayılması.</div>', '<h3>Led teknoloji Rusça</h3><div>Led kelimesi Light Emitting Diode\'unkısatması olarak kullanılmaktadır. Dilimize Işık YayanDiotolarak çevrilebilir. Yapay işık kaynaklarından en sonbulunanıdır. Ampul veya fluoresanların yaydığı ışıktanbambaşka bir yöntemle ışık oluşturması ve bazı avantajlıyanları ledleri bilimin popüler konularından biriyapmıştır. P ve N tipi yarı iletken katmanlar(Led çipi),yansıtıcı yüzey ve iletken alanlar bir ledin yapısınıoluşturur. Diğer yapay ışık kaynaklarında olduğu gibiledlerde de ışık, elektrik enerjisi kullanılarakoluşturulur. Diyotun içerisindeki elektron ve elektronyitirip \" +\" yük kazanan bölge(deşik) birleşerek bir ışımameydana gelmektedir. Bu ışımanın enerjisi deşik veelektronlar arasındaki enerji farkı kadardır. Led çipitürü değiştikçe aradaki enerji farkı da değişmekte, buışığın dalga boyunun dolayısıyla renginin farklı olmasınısağlamaktadır. Bu şekilde birçok renk elde etmekmümkündür. LEDin hangi renkte ışık yayması isteniyorsagalyum, arsenit, alüminyum, fosfat, indiyum, nitrit gibikimyasallardan belirli ölçülerde yarı iletken malzemeyeilave edilir. (GaAIAs, GaAs, GaAsP, GaP, InGaAIP, SiC,GaN). Böylece LED çipinin istenen dalga boyunda ışımayapması sağlanır. Örneğin kırmızı renk (660nm) içinGaAlAs, sarı renk (595nm) için InGaAIP, yeşil renk (565nm)için GaP, mavi renk (430nm) için GaN kullanılır. LED\'lerdiğer ışık kaynaklarından farklı olarak sadece bir renküretmektedirler. Bilindiği gibi gün ışığı tüm renklerinkarışımıdır. Bu karışım ise beyaz ışığı oluşturmaktadır.Diğer ışık kaynaklarında örneğin kırmızı ışık elde edilmekisteniyorsa, beyaz ışığın önüne yerleştirilen kırmızı birkatman dışarıya sadece kırmızı ışığın geçmesini sağlıyor,diğer ışınlar içerde kalıyordu. İşte diyotlarınaydınlatmada en önemli katkısı sadece bir renk üretmesi,fazladan renkler ortaya çıkarmamasıdır. Bir LED kırmızıyeşil mavi gibi tek renk ışık yaymaktadır. Bu avantaj,konu beyaz ışık olduğunda dezavantaja dönüşmekte. LedLambaTüm ışık türleri beyaz ışığı oluşturduğu için tekdalga boyundan beyaz ışık üretmek mümkün değildir. Busorunu çözmek için iki yöntem uygulanmaktadır. - Kırmızı,mavi ve yeşil renkli üç led çipini aynı kılıf içindeçalıştırarak renklerin birleşiminden beyaz ışık üretmek. -Mavi led yongasından(çipinden) çıkan ışığın bir fosfortabakasını uyararak beyaz ışık yayılması.</div>', 'Endüstriyel Led Aydınlatma eng', 'Endüstriyel Led Aydınlatma rus'), ('3', 'Yer Hizmetleri Ekipmanları', '', '1', null, null, null, '10000', null, null, '1', '4', null, null, null, null, null), ('5', 'Sokak Aydınlatmaları', 'Sokak Aydınlatmaları', '1', null, null, null, '10000', null, '4', '6', '11', null, 'Sokak Aydınlatmaları', 'Sokak Aydınlatmaları', 'Sokak Aydınlatmaları', 'Sokak Aydınlatmaları'), ('6', 'Standart LED Aydınlatmaları', 'Standart LED Aydınlatmaları', '1', null, null, null, '10000', null, '5', '7', '8', null, 'Standart LED Aydınlatmaları', 'Standart LED Aydınlatmaları', 'Standart LED Aydınlatmaları', 'Standart LED Aydınlatmaları'), ('7', 'Özel İklim LED Aydınlatmaları', 'Özel İklim LED Aydınlatmaları', '1', null, null, null, '10000', null, '5', '9', '10', null, 'Özel İklim LED Aydınlatmaları', 'Özel İklim LED Aydınlatmaları', 'Özel İklim LED Aydınlatmaları', 'Özel İklim LED Aydınlatmaları'), ('8', 'Dış Mekan LED Aydınlatmaları', 'Dış Mekan LED Aydınlatmaları', '1', null, null, null, '10000', null, '4', '12', '13', null, 'Dış Mekan LED Aydınlatmaları', 'Dış Mekan LED Aydınlatmaları', 'Dış Mekan LED Aydınlatmaları', 'Dış Mekan LED Aydınlatmaları'), ('9', 'İç Mekan LED Aydınlatmaları', 'İç Mekan LED Aydınlatmaları', '1', null, null, null, '10000', null, '4', '14', '15', null, 'İç Mekan LED Aydınlatmaları', 'İç Mekan LED Aydınlatmaları', 'İç Mekan LED Aydınlatmaları', 'İç Mekan LED Aydınlatmaları'), ('10', 'Bagaj Arabaları', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt viverra felis, ut pharetra odio fringilla non. Sed ultricies ultricies ligula, eu porta sapien feugiat eget. Donec sit amet nibh vel ante varius condimentum. Sed purus nisl, vestibulum quis libero vehicula, mattis egestas lectus. Etiam mollis, urna at mattis placerat, purus odio commodo enim, tristique congue justo est vitae dui. Mauris adipiscing mauris arcu, id sollicitudin est mollis dignissim. Proin arcu dui, suscipit a mollis eget, dapibus sit amet nunc. Nam non augue vitae justo mollis volutpat. Phasellus at lectus ut libero congue porta nec ut orci.', '1', null, null, null, '10000', null, '3', '2', '3', null, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt viverra felis, ut pharetra odio fringilla non. Sed ultricies ultricies ligula, eu porta sapien feugiat eget. Donec sit amet nibh vel ante varius condimentum. Sed purus nisl, vestibulum quis libero vehicula, mattis egestas lectus. Etiam mollis, urna at mattis placerat, purus odio commodo enim, tristique congue justo est vitae dui. Mauris adipiscing mauris arcu, id sollicitudin est mollis dignissim. Proin arcu dui, suscipit a mollis eget, dapibus sit amet nunc. Nam non augue vitae justo mollis volutpat. Phasellus at lectus ut libero congue porta nec ut orci.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tincidunt viverra felis, ut pharetra odio fringilla non. Sed ultricies ultricies ligula, eu porta sapien feugiat eget. Donec sit amet nibh vel ante varius condimentum. Sed purus nisl, vestibulum quis libero vehicula, mattis egestas lectus. Etiam mollis, urna at mattis placerat, purus odio commodo enim, tristique congue justo est vitae dui. Mauris adipiscing mauris arcu, id sollicitudin est mollis dignissim. Proin arcu dui, suscipit a mollis eget, dapibus sit amet nunc. Nam non augue vitae justo mollis volutpat. Phasellus at lectus ut libero congue porta nec ut orci.', 'Bagaj Arabaları', 'Bagaj Arabaları');
COMMIT;

-- ----------------------------
--  Table structure for `products`
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
  `label_eng` varchar(200) DEFAULT NULL,
  `label_rus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `products`
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES ('1', 'Süspansiyonlu Bagaj Arabası', '<span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">Sed tempus bibendum tortor, et faucibus arcu dictum non. Mauris vitae velit urna. Phasellus et enim aliquam, bibendum ligula eu, tempus justo. Praesent at metus lacinia, fringilla sem et, condimentum magna. Vestibulum porttitor et dolor et iaculis. Quisque sed eros nec felis fringilla congue sed nec diam. Phasellus eleifend convallis lacus, nec suscipit tellus ultricies nec. Phasellus semper et ligula vel elementum. Nunc convallis tortor vel ligula tempor fermentum. Donec in elit volutpat felis gravida volutpat. Nulla ultricies volutpat condimentum. Donec id dolor pharetra, congue massa sed, egestas sapien. Phasellus sed mi venenatis, porta felis sed, blandit purus. Curabitur dui nisi, lobortis nec erat nec, blandit fringilla lorem</span>', 'Sed tempus bibendum tortor, et faucibus arcu dictum non. Mauris vitae velit urna. Phasellus et enim aliquam, bibendum ligula eu, tempus justo. Praesent at metus lacinia, fringilla sem et, condimentum ', '1', null, null, null, null, null, null, null, null, '10', '101', '<span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">Sed tempus bibendum tortor, et faucibus arcu dictum non. Mauris vitae velit urna. Phasellus et enim aliquam, bibendum ligula eu, tempus justo. Praesent at metus lacinia, fringilla sem et, condimentum magna. Vestibulum porttitor et dolor et iaculis. Quisque sed eros nec felis fringilla congue sed nec diam. Phasellus eleifend convallis lacus, nec suscipit tellus ultricies nec. Phasellus semper et ligula vel elementum. Nunc convallis tortor vel ligula tempor fermentum. Donec in elit volutpat felis gravida volutpat. Nulla ultricies volutpat condimentum. Donec id dolor pharetra, congue massa sed, egestas sapien. Phasellus sed mi venenatis, porta felis sed, blandit purus. Curabitur dui nisi, lobortis nec erat nec, blandit fringilla lorem</span>', '<span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">Sed tempus bibendum tortor, et faucibus arcu dictum non. Mauris vitae velit urna. Phasellus et enim aliquam, bibendum ligula eu, tempus justo. Praesent at metus lacinia, fringilla sem et, condimentum magna. Vestibulum porttitor et dolor et iaculis. Quisque sed eros nec felis fringilla congue sed nec diam. Phasellus eleifend convallis lacus, nec suscipit tellus ultricies nec. Phasellus semper et ligula vel elementum. Nunc convallis tortor vel ligula tempor fermentum. Donec in elit volutpat felis gravida volutpat. Nulla ultricies volutpat condimentum. Donec id dolor pharetra, congue massa sed, egestas sapien. Phasellus sed mi venenatis, porta felis sed, blandit purus. Curabitur dui nisi, lobortis nec erat nec, blandit fringilla lorem</span><div><span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\"><br></span></div><div><ul><li><span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">Phasellus&nbsp;</span><br></li><li><span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">fringilla&nbsp;<br></span></li><li><span style=\"font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">bibendum&nbsp;<br></span></li></ul></div>', 'Süspansiyonlu Bagaj Arabası', 'Süspansiyonlu Bagaj Arabası', 'Sed tempus bibendum tortor, et faucibus arcu dictum non. Mauris vitae velit urna. Phasellus et enim aliquam, bibendum ligula eu, tempus justo. Praesent at metus lacinia, fringilla sem et, condimentum ', 'Sed tempus bibendum tortor, et faucibus arcu dictum non. Mauris vitae velit urna. Phasellus et enim aliquam, bibendum ligula eu, tempus justo. Praesent at metus lacinia, fringilla sem et, condimentum '), ('2', 'Katı Süspansiyonlu Bagaj Arabası', '<h3>genel özellikler</h3><div><br></div><div>The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts.</div><div><br></div><div>Chassis<span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: Hot dip galvanised &nbsp;</div><div>Paltform<span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>:18 mm v shaped Plywood</div><div>Panels<span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>:14 mm Plywood or 2 mm steel sheet</div><div>Drawbar <span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: Spring type shock absorber system incorpotared</div><div>Wheels <span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: Pneumatic or solid upon request</div><div>Suspension<span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: a) torsion system ; &nbsp;Type LCT&nbsp;</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) caoutchouc rubber system ; Type &nbsp;LCR</div><div><span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span> &nbsp;c ) solid axe system ; Type LCS &nbsp;are upon request</div><div>Dimensions <span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: L : 2400mm ; W : &nbsp;1400mm &nbsp;</div><div>Height of the&nbsp;</div><div>Panel <span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: 520mm</div><div>Capacity <span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: 1500 kg</div><div>Cover <span class=\"Apple-tab-span\" style=\"white-space:pre\">		</span>: Offered optionally</div><div><br></div>', 'The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts. The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts.', '1', null, null, null, null, null, null, null, null, '10', '114422', '<div><h3>genel özellikler</h3><div><br></div><div>The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts.</div><div><br></div><div>Chassis<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Hot dip galvanised &nbsp;</div><div>Paltform<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>:18 mm v shaped Plywood</div><div>Panels<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>:14 mm Plywood or 2 mm steel sheet</div><div>Drawbar&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Spring type shock absorber system incorpotared</div><div>Wheels&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Pneumatic or solid upon request</div><div>Suspension<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: a) torsion system ; &nbsp;Type LCT&nbsp;</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) caoutchouc rubber system ; Type &nbsp;LCR</div><div><span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>&nbsp;&nbsp;c ) solid axe system ; Type LCS &nbsp;are upon request</div><div>Dimensions&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: L : 2400mm ; W : &nbsp;1400mm &nbsp;</div><div>Height of the&nbsp;</div><div>Panel&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: 520mm</div><div>Capacity&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: 1500 kg</div><div>Cover&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Offered optionally</div></div><div><br></div>', '<div><h3>genel özellikler</h3><div><br></div><div>The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts.</div><div><br></div><div>Chassis<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Hot dip galvanised &nbsp;</div><div>Paltform<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>:18 mm v shaped Plywood</div><div>Panels<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>:14 mm Plywood or 2 mm steel sheet</div><div>Drawbar&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Spring type shock absorber system incorpotared</div><div>Wheels&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Pneumatic or solid upon request</div><div>Suspension<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: a) torsion system ; &nbsp;Type LCT&nbsp;</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) caoutchouc rubber system ; Type &nbsp;LCR</div><div><span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>&nbsp;&nbsp;c ) solid axe system ; Type LCS &nbsp;are upon request</div><div>Dimensions&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: L : 2400mm ; W : &nbsp;1400mm &nbsp;</div><div>Height of the&nbsp;</div><div>Panel&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: 520mm</div><div>Capacity&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: 1500 kg</div><div>Cover&nbsp;<span class=\"Apple-tab-span\" style=\"white-space: pre;\">		</span>: Offered optionally</div></div><div><br></div>', 'Katı Süspansiyonlu Bagaj Arabası', 'Katı Süspansiyonlu Bagaj Arabası', 'The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts. The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts.', 'The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts. The Luggage Carrier is constructed in conformity with AHM, VDE and IATA standarts.');
COMMIT;

-- ----------------------------
--  Table structure for `reference_settings`
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
--  Records of `reference_settings`
-- ----------------------------
BEGIN;
INSERT INTO `reference_settings` VALUES ('1', '7', null, null, null, null, null, '0', 'buyuk', '0', '0', '1', '', '');
COMMIT;

-- ----------------------------
--  Table structure for `references`
-- ----------------------------
DROP TABLE IF EXISTS `references`;
CREATE TABLE `references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `references`
-- ----------------------------
BEGIN;
INSERT INTO `references` VALUES ('10', 'kaptan demir çelik -  tekirdağ çorlu ');
COMMIT;

-- ----------------------------
--  Table structure for `service_settings`
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
--  Records of `service_settings`
-- ----------------------------
BEGIN;
INSERT INTO `service_settings` VALUES ('1', '4', null, null, null, null, null, '0', '', '0', '0', '0', 'hizmet', '');
COMMIT;

-- ----------------------------
--  Table structure for `services`
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
--  Table structure for `settings`
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
--  Records of `settings`
-- ----------------------------
BEGIN;
INSERT INTO `settings` VALUES ('1', '', '', '');
COMMIT;

-- ----------------------------
--  Table structure for `staticpage_settings`
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
--  Records of `staticpage_settings`
-- ----------------------------
BEGIN;
INSERT INTO `staticpage_settings` VALUES ('1', '2', null, null, null, null, null, '0', 'normal', '0', '0', '1', 'normal', '');
COMMIT;

-- ----------------------------
--  Table structure for `staticpages`
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `staticpages`
-- ----------------------------
BEGIN;
INSERT INTO `staticpages` VALUES ('1', 'Hakkımızda', null, '<h3><span style=\"font-size: 13px;\">DHİ, uluslar arası ticarette yeni keşifler!</span><br></h3><div><div><br></div><div>Amacımız sunduğumuz ürünlerde satışta ve satış sonrasında tam müşteri memnuniyetini yakalamak.</div><div><br></div><div>The closed production area is 17500 m2 in 30000 m2 area allows DHI to built up versatile production lines to realise its production with a wide range of mashine park including 4 Diamension CNC, automated and manual bending mashines, welding site, powder painting shop suitable for Aluminium and steel parts af any kind.</div><div><br></div><div>Specialised in bending, &nbsp;welding, forming Göçmenler has great know-how and experience in working various &nbsp;ferreous and no-ferreous metals including stainless steel.</div></div>', '', 'About Us', 'About Us', '<h3><span style=\"font-size: 13px;\">DHİ, uluslar arası ticarette yeni keşifler!</span><br></h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>Amacımız sunduğumuz ürünlerde satışta ve satış sonrasında tam müşteri memnuniyetini yakalamak.</div><div><br></div><div>The closed production area is 17500 m2 in 30000 m2 area allows DHI to built up versatile production lines to realise its production with a wide range of mashine park including 4 Diamension CNC, automated and manual bending mashines, welding site, powder painting shop suitable for Aluminium and steel parts af any kind.</div><div><br></div><div>Specialised in bending, &nbsp;welding, forming Göçmenler has great know-how and experience in working various &nbsp;ferreous and no-ferreous metals including stainless steel.</div></div></h3>', '<h3><span style=\"font-size: 13px;\">DHİ, uluslar arası ticarette yeni keşifler!</span><br></h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>Amacımız sunduğumuz ürünlerde satışta ve satış sonrasında tam müşteri memnuniyetini yakalamak.</div><div><br></div><div>The closed production area is 17500 m2 in 30000 m2 area allows DHI to built up versatile production lines to realise its production with a wide range of mashine park including 4 Diamension CNC, automated and manual bending mashines, welding site, powder painting shop suitable for Aluminium and steel parts af any kind.</div><div><br></div><div>Specialised in bending, &nbsp;welding, forming Göçmenler has great know-how and experience in working various &nbsp;ferreous and no-ferreous metals including stainless steel.</div></div></h3>', null, '1', '2', null);
COMMIT;

-- ----------------------------
--  Table structure for `survey_values`
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
--  Records of `survey_values`
-- ----------------------------
BEGIN;
INSERT INTO `survey_values` VALUES ('1', 'sdf', '0', '0', '1'), ('2', 'sdf', '0', '0', '1'), ('3', 'sdf', '0', '0', '1'), ('4', 'sdf', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `survey_voters`
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
--  Table structure for `surveys`
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
--  Records of `surveys`
-- ----------------------------
BEGIN;
INSERT INTO `surveys` VALUES ('1', 'şube', '0', null, '2011-08-13 17:37:53');
COMMIT;

-- ----------------------------
--  Table structure for `user_permits`
-- ----------------------------
DROP TABLE IF EXISTS `user_permits`;
CREATE TABLE `user_permits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_permits`
-- ----------------------------
BEGIN;
INSERT INTO `user_permits` VALUES ('9', '3', '9'), ('8', '3', '5'), ('5', '3', '10'), ('6', '3', '12');
COMMIT;

-- ----------------------------
--  Table structure for `user_profiles`
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
--  Table structure for `user_settings`
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
--  Records of `user_settings`
-- ----------------------------
BEGIN;
INSERT INTO `user_settings` VALUES ('1', null, '1', null, '0', '0', '0', null);
COMMIT;

-- ----------------------------
--  Table structure for `user_types`
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
--  Records of `user_types`
-- ----------------------------
BEGIN;
INSERT INTO `user_types` VALUES ('1', 'Site Y', '1', '1'), ('3', 'Kullanıcı', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `users`
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
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'Burak', 'Doğan', 'admin@admin.net', null, '1', '1', '3a9e8a740b5d5c0d19625bff90a9f92e', '1', null, '2011-07-26 16:37:24', null, '0', 'bdogan', null), ('4', 'Site', 'Yöneticisi', 'info@dhi.com.tr', null, '3', '0', '5c22590152f4f53f3c05cf7cc6aa0b6b', '1', null, '2011-12-03 15:01:03', null, '0', 'admin', null);
COMMIT;

-- ----------------------------
--  Table structure for `videos`
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

SET FOREIGN_KEY_CHECKS = 1;
