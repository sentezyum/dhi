-- sqldump-php SQL Dump
-- https://github.com/clouddueling/mysqldump-php
--
-- Host: localhost
-- Generation Time: Thu, 19 Dec 2013 18:21:39 +0000

--
-- Database: `gocmen_dhi2013`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_areas`
--

CREATE TABLE `ad_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `areaid` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_areas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

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

--
-- Dumping data for table `ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_settings`
--

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

--
-- Dumping data for table `article_settings`
--

INSERT INTO `article_settings` VALUES ('1',NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','0',NULL,NULL);
-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

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

--
-- Dumping data for table `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_settings`
--

CREATE TABLE `comment_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_char` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_settings`
--

INSERT INTO `comment_settings` VALUES ('1',NULL);
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

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

--
-- Dumping data for table `comments`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactgroups`
--

CREATE TABLE `contactgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `contactgroups`
--

INSERT INTO `contactgroups` VALUES ('1','Merkez');
-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `contactgroup_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` VALUES ('9','(111) 222-33-33','Telefon','1','3');
INSERT INTO `contacts` VALUES ('8','(222) 222-55-44','Fax','1','2');
INSERT INTO `contacts` VALUES ('7','sss','Adres','1','1');
INSERT INTO `contacts` VALUES ('10','info@dhi.com.tr','E-Mail','1','4');
-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `name_eng` varchar(250) DEFAULT NULL,
  `name_rus` varchar(250) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `imagegallery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` text,
  `notification_id` int(11) unsigned DEFAULT NULL,
  `staticpage_id` int(11) unsigned DEFAULT NULL,
  `productgroup_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `reference_id` varchar(11) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` VALUES ('8','Teknik Ölçüler','Technical Dimensions','Технические Размеры','/files/documents/product_document_KONTEYNER DOLLY.pdf',NULL,NULL,NULL,NULL,NULL,'7',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:30:24');
INSERT INTO `documents` VALUES ('6','Teknik Ölçüler','Technical Dimentions','Технические Габариты','/files/documents/product_document_PALET DOLLY PART.pdf',NULL,NULL,NULL,NULL,NULL,'10',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:15:09');
INSERT INTO `documents` VALUES ('7','Üst Şase','Upper Chassis','Верхнего Шасси','/files/documents/product_document_UST SASE.pdf',NULL,NULL,NULL,NULL,NULL,'10',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:17:11');
INSERT INTO `documents` VALUES ('9','Teknik Ölçüler','Technical Dimensions','Технические Размеры','/files/documents/product_document_süspansiyonsuz.pdf',NULL,NULL,NULL,NULL,NULL,'5',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:50:58');
INSERT INTO `documents` VALUES ('10','Teknik Ölçüler','Technical Dimensions','Технические Размеры','/files/documents/product_document_süspansiyonsuz.pdf',NULL,NULL,NULL,NULL,NULL,'11',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:10:57');
-- --------------------------------------------------------

--
-- Table structure for table `events`
--

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` VALUES ('2','Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.','29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni','10:00 - Davetlilerin Kayıtları<br>10:30 - Projenin Resmi Açılış Töreni<br>11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>15:30 - Kahve Molası<br>16:00 - Türk - Bulgar dans ve folklor gösterileri<br>17:00 - Basın Toplantısı','156',NULL,NULL,'2011-07-28 19:50:54',NULL,NULL,'1',NULL,'1',NULL,NULL,NULL,'0','','Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.','Memduh şevket Esendal Sahnesi’nde Projemizin Açılış Töreni.','29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni','29 Temmuz 2011 Cuma Günü Memduh şevket Esendal Sahnesi’nde “avrupa Kültür Koridoru çorlu –sakar” Projemizin Açılış Töreni','10:00 - Davetlilerin Kayıtları<br>\r\n10:30 - Projenin Resmi Açılış Töreni<br>\r\n11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>\r\n14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>\r\n15:30 - Kahve Molası<br>\r\n16:00 - Türk - Bulgar dans ve folklor gösterileri<br>\r\n17:00 - Basın Toplantısı','10:00 - Davetlilerin Kayıtları<br>\r\n10:30 - Projenin Resmi Açılış Töreni<br>\r\n11:00 - \"Türkiye Cumhuriyeti\'nin, Avrupa Birliğine katılım öncesi görüşlerinin\" açıklanması<br>\r\n14:30 - \"Avrupa\'da Kültür Sınırlarının Kaldırılması\" Konulu Panel<br>\r\n15:30 - Kahve Molası<br>\r\n16:00 - Türk - Bulgar dans ve folklor gösterileri<br>\r\n17:00 - Basın Toplantısı','2011-07-29');
-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `value` text,
  `modified` datetime DEFAULT NULL,
  `tag` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` VALUES ('1','FaceBook Linki','http://www.dhi.com.tr','2013-12-09 05:19:59','facebook_link');
INSERT INTO `general_settings` VALUES ('2','YouTube Linki','http://www.dhi.com.tr','2013-12-09 05:19:59','youtube_link');
INSERT INTO `general_settings` VALUES ('3','Twitter Linki','http://www.dhi.com.tr','2013-12-09 05:19:59','twitter_link');
INSERT INTO `general_settings` VALUES ('9','İletişim İstekleri İçin Hedef Posta Adresi','buraya siteden gelen maillerin gelmesini istediğiniz mail adresini yazınız','2013-12-09 05:19:59','contact_to_mail');
INSERT INTO `general_settings` VALUES ('10','Email Genel TLS','0','2013-12-09 05:19:59','mail_tls');
INSERT INTO `general_settings` VALUES ('11','Mail Genel HOST','localhost','2013-12-09 05:19:59','mail_host');
INSERT INTO `general_settings` VALUES ('12','Genel Mail PORT','26','2013-12-09 05:19:59','mail_port');
INSERT INTO `general_settings` VALUES ('13','Genel Mail KULLANICI ADI','sentezyum@dhi.com.tr','2013-12-09 05:19:59','mail_username');
INSERT INTO `general_settings` VALUES ('14','Genel Mail ŞİFRE','g37Xx_4l','2013-12-09 05:19:59','mail_password');
-- --------------------------------------------------------

--
-- Table structure for table `image_files`
--

CREATE TABLE `image_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_size_id` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=351 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_files`
--

INSERT INTO `image_files` VALUES ('19','4','productgroup_normal_6.png','6');
INSERT INTO `image_files` VALUES ('130','4','productgroup_normal_5.jpg','5');
INSERT INTO `image_files` VALUES ('23','4','staticpage_normal_7.jpg','7');
INSERT INTO `image_files` VALUES ('25','5','product_small_8.jpg','8');
INSERT INTO `image_files` VALUES ('26','6','product_normal_8.jpg','8');
INSERT INTO `image_files` VALUES ('27','7','product_orig_8.jpg','8');
INSERT INTO `image_files` VALUES ('29','5','product_small_9.png','9');
INSERT INTO `image_files` VALUES ('30','6','product_normal_9.png','9');
INSERT INTO `image_files` VALUES ('31','7','product_orig_9.png','9');
INSERT INTO `image_files` VALUES ('33','5','product_small_10.png','10');
INSERT INTO `image_files` VALUES ('34','6','product_normal_10.png','10');
INSERT INTO `image_files` VALUES ('35','7','product_orig_10.png','10');
INSERT INTO `image_files` VALUES ('37','5','product_small_11.jpg','11');
INSERT INTO `image_files` VALUES ('38','6','product_normal_11.jpg','11');
INSERT INTO `image_files` VALUES ('39','7','product_orig_11.jpg','11');
INSERT INTO `image_files` VALUES ('41','4','productgroup_normal_12.png','12');
INSERT INTO `image_files` VALUES ('108','5','product_small_17.jpg','17');
INSERT INTO `image_files` VALUES ('109','6','product_normal_17.jpg','17');
INSERT INTO `image_files` VALUES ('110','7','product_orig_17.jpg','17');
INSERT INTO `image_files` VALUES ('105','7','product_orig_18.jpg','18');
INSERT INTO `image_files` VALUES ('104','6','product_normal_18.jpg','18');
INSERT INTO `image_files` VALUES ('103','5','product_small_18.jpg','18');
INSERT INTO `image_files` VALUES ('120','7','product_orig_19.jpg','19');
INSERT INTO `image_files` VALUES ('121','10','product_medium_19.jpg','19');
INSERT INTO `image_files` VALUES ('140','4','productgroup_normal_38.jpg','38');
INSERT INTO `image_files` VALUES ('72','8','reference_small_26.jpg','26');
INSERT INTO `image_files` VALUES ('73','9','reference_orig_26.jpg','26');
INSERT INTO `image_files` VALUES ('69','8','reference_small_25.jpg','25');
INSERT INTO `image_files` VALUES ('70','9','reference_orig_25.jpg','25');
INSERT INTO `image_files` VALUES ('75','8','reference_small_27.jpg','27');
INSERT INTO `image_files` VALUES ('76','9','reference_orig_27.jpg','27');
INSERT INTO `image_files` VALUES ('78','8','reference_small_28.jpg','28');
INSERT INTO `image_files` VALUES ('79','9','reference_orig_28.jpg','28');
INSERT INTO `image_files` VALUES ('81','1','post_small_29.jpg','29');
INSERT INTO `image_files` VALUES ('82','2','post_middle_29.jpg','29');
INSERT INTO `image_files` VALUES ('83','3','post_orig_29.jpg','29');
INSERT INTO `image_files` VALUES ('85','1','post_small_30.jpg','30');
INSERT INTO `image_files` VALUES ('86','2','post_middle_30.jpg','30');
INSERT INTO `image_files` VALUES ('87','3','post_orig_30.jpg','30');
INSERT INTO `image_files` VALUES ('89','1','post_small_31.jpg','31');
INSERT INTO `image_files` VALUES ('90','2','post_middle_31.jpg','31');
INSERT INTO `image_files` VALUES ('91','3','post_orig_31.jpg','31');
INSERT INTO `image_files` VALUES ('93','1','post_small_32.jpg','32');
INSERT INTO `image_files` VALUES ('94','2','post_middle_32.jpg','32');
INSERT INTO `image_files` VALUES ('95','3','post_orig_32.jpg','32');
INSERT INTO `image_files` VALUES ('177','6','product_normal_47.jpg','47');
INSERT INTO `image_files` VALUES ('178','7','product_orig_47.jpg','47');
INSERT INTO `image_files` VALUES ('106','10','product_medium_18.jpg','18');
INSERT INTO `image_files` VALUES ('111','10','product_medium_17.jpg','17');
INSERT INTO `image_files` VALUES ('119','6','product_normal_19.jpg','19');
INSERT INTO `image_files` VALUES ('118','5','product_small_19.jpg','19');
INSERT INTO `image_files` VALUES ('176','5','product_small_47.jpg','47');
INSERT INTO `image_files` VALUES ('133','9','reference_orig_35.jpg','35');
INSERT INTO `image_files` VALUES ('132','8','reference_small_35.jpg','35');
INSERT INTO `image_files` VALUES ('135','8','reference_small_36.jpg','36');
INSERT INTO `image_files` VALUES ('136','9','reference_orig_36.jpg','36');
INSERT INTO `image_files` VALUES ('138','4','productgroup_normal_37.jpg','37');
INSERT INTO `image_files` VALUES ('142','4','productgroup_normal_39.jpg','39');
INSERT INTO `image_files` VALUES ('144','4','productgroup_normal_40.jpg','40');
INSERT INTO `image_files` VALUES ('146','5','product_small_41.jpg','41');
INSERT INTO `image_files` VALUES ('147','6','product_normal_41.jpg','41');
INSERT INTO `image_files` VALUES ('148','7','product_orig_41.jpg','41');
INSERT INTO `image_files` VALUES ('149','10','product_medium_41.jpg','41');
INSERT INTO `image_files` VALUES ('151','5','product_small_42.jpg','42');
INSERT INTO `image_files` VALUES ('152','6','product_normal_42.jpg','42');
INSERT INTO `image_files` VALUES ('153','7','product_orig_42.jpg','42');
INSERT INTO `image_files` VALUES ('154','10','product_medium_42.jpg','42');
INSERT INTO `image_files` VALUES ('156','5','product_small_43.jpg','43');
INSERT INTO `image_files` VALUES ('157','6','product_normal_43.jpg','43');
INSERT INTO `image_files` VALUES ('158','7','product_orig_43.jpg','43');
INSERT INTO `image_files` VALUES ('159','10','product_medium_43.jpg','43');
INSERT INTO `image_files` VALUES ('161','5','product_small_44.jpg','44');
INSERT INTO `image_files` VALUES ('162','6','product_normal_44.jpg','44');
INSERT INTO `image_files` VALUES ('163','7','product_orig_44.jpg','44');
INSERT INTO `image_files` VALUES ('164','10','product_medium_44.jpg','44');
INSERT INTO `image_files` VALUES ('166','5','product_small_45.jpg','45');
INSERT INTO `image_files` VALUES ('167','6','product_normal_45.jpg','45');
INSERT INTO `image_files` VALUES ('168','7','product_orig_45.jpg','45');
INSERT INTO `image_files` VALUES ('169','10','product_medium_45.jpg','45');
INSERT INTO `image_files` VALUES ('171','5','product_small_46.jpg','46');
INSERT INTO `image_files` VALUES ('172','6','product_normal_46.jpg','46');
INSERT INTO `image_files` VALUES ('173','7','product_orig_46.jpg','46');
INSERT INTO `image_files` VALUES ('174','10','product_medium_46.jpg','46');
INSERT INTO `image_files` VALUES ('179','10','product_medium_47.jpg','47');
INSERT INTO `image_files` VALUES ('181','5','product_small_48.jpg','48');
INSERT INTO `image_files` VALUES ('182','6','product_normal_48.jpg','48');
INSERT INTO `image_files` VALUES ('183','7','product_orig_48.jpg','48');
INSERT INTO `image_files` VALUES ('184','10','product_medium_48.jpg','48');
INSERT INTO `image_files` VALUES ('186','5','product_small_49.jpg','49');
INSERT INTO `image_files` VALUES ('187','6','product_normal_49.jpg','49');
INSERT INTO `image_files` VALUES ('188','7','product_orig_49.jpg','49');
INSERT INTO `image_files` VALUES ('189','10','product_medium_49.jpg','49');
INSERT INTO `image_files` VALUES ('191','5','product_small_50.jpg','50');
INSERT INTO `image_files` VALUES ('192','6','product_normal_50.jpg','50');
INSERT INTO `image_files` VALUES ('193','7','product_orig_50.jpg','50');
INSERT INTO `image_files` VALUES ('194','10','product_medium_50.jpg','50');
INSERT INTO `image_files` VALUES ('196','5','product_small_51.jpg','51');
INSERT INTO `image_files` VALUES ('197','6','product_normal_51.jpg','51');
INSERT INTO `image_files` VALUES ('198','7','product_orig_51.jpg','51');
INSERT INTO `image_files` VALUES ('199','10','product_medium_51.jpg','51');
INSERT INTO `image_files` VALUES ('201','5','product_small_52.jpg','52');
INSERT INTO `image_files` VALUES ('202','6','product_normal_52.jpg','52');
INSERT INTO `image_files` VALUES ('203','7','product_orig_52.jpg','52');
INSERT INTO `image_files` VALUES ('204','10','product_medium_52.jpg','52');
INSERT INTO `image_files` VALUES ('206','5','product_small_53.jpg','53');
INSERT INTO `image_files` VALUES ('207','6','product_normal_53.jpg','53');
INSERT INTO `image_files` VALUES ('208','7','product_orig_53.jpg','53');
INSERT INTO `image_files` VALUES ('209','10','product_medium_53.jpg','53');
INSERT INTO `image_files` VALUES ('211','5','product_small_54.jpg','54');
INSERT INTO `image_files` VALUES ('212','6','product_normal_54.jpg','54');
INSERT INTO `image_files` VALUES ('213','7','product_orig_54.jpg','54');
INSERT INTO `image_files` VALUES ('214','10','product_medium_54.jpg','54');
INSERT INTO `image_files` VALUES ('216','5','product_small_55.jpg','55');
INSERT INTO `image_files` VALUES ('217','6','product_normal_55.jpg','55');
INSERT INTO `image_files` VALUES ('218','7','product_orig_55.jpg','55');
INSERT INTO `image_files` VALUES ('219','10','product_medium_55.jpg','55');
INSERT INTO `image_files` VALUES ('221','5','product_small_56.jpg','56');
INSERT INTO `image_files` VALUES ('222','6','product_normal_56.jpg','56');
INSERT INTO `image_files` VALUES ('223','7','product_orig_56.jpg','56');
INSERT INTO `image_files` VALUES ('224','10','product_medium_56.jpg','56');
INSERT INTO `image_files` VALUES ('226','5','product_small_57.jpg','57');
INSERT INTO `image_files` VALUES ('227','6','product_normal_57.jpg','57');
INSERT INTO `image_files` VALUES ('228','7','product_orig_57.jpg','57');
INSERT INTO `image_files` VALUES ('229','10','product_medium_57.jpg','57');
INSERT INTO `image_files` VALUES ('231','5','product_small_58.jpg','58');
INSERT INTO `image_files` VALUES ('232','6','product_normal_58.jpg','58');
INSERT INTO `image_files` VALUES ('233','7','product_orig_58.jpg','58');
INSERT INTO `image_files` VALUES ('234','10','product_medium_58.jpg','58');
INSERT INTO `image_files` VALUES ('236','5','product_small_59.jpg','59');
INSERT INTO `image_files` VALUES ('237','6','product_normal_59.jpg','59');
INSERT INTO `image_files` VALUES ('238','7','product_orig_59.jpg','59');
INSERT INTO `image_files` VALUES ('239','10','product_medium_59.jpg','59');
INSERT INTO `image_files` VALUES ('241','5','product_small_60.jpg','60');
INSERT INTO `image_files` VALUES ('242','6','product_normal_60.jpg','60');
INSERT INTO `image_files` VALUES ('243','7','product_orig_60.jpg','60');
INSERT INTO `image_files` VALUES ('244','10','product_medium_60.jpg','60');
INSERT INTO `image_files` VALUES ('246','5','product_small_61.jpg','61');
INSERT INTO `image_files` VALUES ('247','6','product_normal_61.jpg','61');
INSERT INTO `image_files` VALUES ('248','7','product_orig_61.jpg','61');
INSERT INTO `image_files` VALUES ('249','10','product_medium_61.jpg','61');
INSERT INTO `image_files` VALUES ('251','5','product_small_62.jpg','62');
INSERT INTO `image_files` VALUES ('252','6','product_normal_62.jpg','62');
INSERT INTO `image_files` VALUES ('253','7','product_orig_62.jpg','62');
INSERT INTO `image_files` VALUES ('254','10','product_medium_62.jpg','62');
INSERT INTO `image_files` VALUES ('256','5','product_small_63.jpg','63');
INSERT INTO `image_files` VALUES ('257','6','product_normal_63.jpg','63');
INSERT INTO `image_files` VALUES ('258','7','product_orig_63.jpg','63');
INSERT INTO `image_files` VALUES ('259','10','product_medium_63.jpg','63');
INSERT INTO `image_files` VALUES ('261','5','product_small_64.jpg','64');
INSERT INTO `image_files` VALUES ('262','6','product_normal_64.jpg','64');
INSERT INTO `image_files` VALUES ('263','7','product_orig_64.jpg','64');
INSERT INTO `image_files` VALUES ('264','10','product_medium_64.jpg','64');
INSERT INTO `image_files` VALUES ('266','5','product_small_65.jpg','65');
INSERT INTO `image_files` VALUES ('267','6','product_normal_65.jpg','65');
INSERT INTO `image_files` VALUES ('268','7','product_orig_65.jpg','65');
INSERT INTO `image_files` VALUES ('269','10','product_medium_65.jpg','65');
INSERT INTO `image_files` VALUES ('271','5','product_small_66.jpg','66');
INSERT INTO `image_files` VALUES ('272','6','product_normal_66.jpg','66');
INSERT INTO `image_files` VALUES ('273','7','product_orig_66.jpg','66');
INSERT INTO `image_files` VALUES ('274','10','product_medium_66.jpg','66');
INSERT INTO `image_files` VALUES ('276','5','product_small_67.jpg','67');
INSERT INTO `image_files` VALUES ('277','6','product_normal_67.jpg','67');
INSERT INTO `image_files` VALUES ('278','7','product_orig_67.jpg','67');
INSERT INTO `image_files` VALUES ('279','10','product_medium_67.jpg','67');
INSERT INTO `image_files` VALUES ('281','5','product_small_68.jpg','68');
INSERT INTO `image_files` VALUES ('282','6','product_normal_68.jpg','68');
INSERT INTO `image_files` VALUES ('283','7','product_orig_68.jpg','68');
INSERT INTO `image_files` VALUES ('284','10','product_medium_68.jpg','68');
INSERT INTO `image_files` VALUES ('286','5','product_small_69.jpg','69');
INSERT INTO `image_files` VALUES ('287','6','product_normal_69.jpg','69');
INSERT INTO `image_files` VALUES ('288','7','product_orig_69.jpg','69');
INSERT INTO `image_files` VALUES ('289','10','product_medium_69.jpg','69');
INSERT INTO `image_files` VALUES ('291','5','product_small_70.jpg','70');
INSERT INTO `image_files` VALUES ('292','6','product_normal_70.jpg','70');
INSERT INTO `image_files` VALUES ('293','7','product_orig_70.jpg','70');
INSERT INTO `image_files` VALUES ('294','10','product_medium_70.jpg','70');
INSERT INTO `image_files` VALUES ('296','5','product_small_71.jpg','71');
INSERT INTO `image_files` VALUES ('297','6','product_normal_71.jpg','71');
INSERT INTO `image_files` VALUES ('298','7','product_orig_71.jpg','71');
INSERT INTO `image_files` VALUES ('299','10','product_medium_71.jpg','71');
INSERT INTO `image_files` VALUES ('301','5','product_small_72.jpg','72');
INSERT INTO `image_files` VALUES ('302','6','product_normal_72.jpg','72');
INSERT INTO `image_files` VALUES ('303','7','product_orig_72.jpg','72');
INSERT INTO `image_files` VALUES ('304','10','product_medium_72.jpg','72');
INSERT INTO `image_files` VALUES ('306','5','product_small_73.jpg','73');
INSERT INTO `image_files` VALUES ('307','6','product_normal_73.jpg','73');
INSERT INTO `image_files` VALUES ('308','7','product_orig_73.jpg','73');
INSERT INTO `image_files` VALUES ('309','10','product_medium_73.jpg','73');
INSERT INTO `image_files` VALUES ('311','5','product_small_74.jpg','74');
INSERT INTO `image_files` VALUES ('312','6','product_normal_74.jpg','74');
INSERT INTO `image_files` VALUES ('313','7','product_orig_74.jpg','74');
INSERT INTO `image_files` VALUES ('314','10','product_medium_74.jpg','74');
INSERT INTO `image_files` VALUES ('316','5','product_small_75.jpg','75');
INSERT INTO `image_files` VALUES ('317','6','product_normal_75.jpg','75');
INSERT INTO `image_files` VALUES ('318','7','product_orig_75.jpg','75');
INSERT INTO `image_files` VALUES ('319','10','product_medium_75.jpg','75');
INSERT INTO `image_files` VALUES ('321','5','product_small_76.jpg','76');
INSERT INTO `image_files` VALUES ('322','6','product_normal_76.jpg','76');
INSERT INTO `image_files` VALUES ('323','7','product_orig_76.jpg','76');
INSERT INTO `image_files` VALUES ('324','10','product_medium_76.jpg','76');
INSERT INTO `image_files` VALUES ('326','5','product_small_77.jpg','77');
INSERT INTO `image_files` VALUES ('327','6','product_normal_77.jpg','77');
INSERT INTO `image_files` VALUES ('328','7','product_orig_77.jpg','77');
INSERT INTO `image_files` VALUES ('329','10','product_medium_77.jpg','77');
INSERT INTO `image_files` VALUES ('331','5','product_small_78.jpg','78');
INSERT INTO `image_files` VALUES ('332','6','product_normal_78.jpg','78');
INSERT INTO `image_files` VALUES ('333','7','product_orig_78.jpg','78');
INSERT INTO `image_files` VALUES ('334','10','product_medium_78.jpg','78');
INSERT INTO `image_files` VALUES ('336','5','product_small_79.jpg','79');
INSERT INTO `image_files` VALUES ('337','6','product_normal_79.jpg','79');
INSERT INTO `image_files` VALUES ('338','7','product_orig_79.jpg','79');
INSERT INTO `image_files` VALUES ('339','10','product_medium_79.jpg','79');
INSERT INTO `image_files` VALUES ('341','5','product_small_80.jpg','80');
INSERT INTO `image_files` VALUES ('342','6','product_normal_80.jpg','80');
INSERT INTO `image_files` VALUES ('343','7','product_orig_80.jpg','80');
INSERT INTO `image_files` VALUES ('344','10','product_medium_80.jpg','80');
INSERT INTO `image_files` VALUES ('346','5','product_small_81.jpg','81');
INSERT INTO `image_files` VALUES ('347','6','product_normal_81.jpg','81');
INSERT INTO `image_files` VALUES ('348','7','product_orig_81.jpg','81');
INSERT INTO `image_files` VALUES ('349','10','product_medium_81.jpg','81');
-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

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

--
-- Dumping data for table `image_galleries`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_sizes`
--

CREATE TABLE `image_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_type_id` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_sizes`
--

INSERT INTO `image_sizes` VALUES ('1','1','100','100','100','small');
INSERT INTO `image_sizes` VALUES ('2','1','150','150','100','middle');
INSERT INTO `image_sizes` VALUES ('3','1',NULL,NULL,'100','orig');
INSERT INTO `image_sizes` VALUES ('4','2','700','255','100','normal');
INSERT INTO `image_sizes` VALUES ('5','3','70','70','100','small');
INSERT INTO `image_sizes` VALUES ('6','3','700','255','100','normal');
INSERT INTO `image_sizes` VALUES ('7','3',NULL,NULL,'100','orig');
INSERT INTO `image_sizes` VALUES ('8','4','70','70','100','small');
INSERT INTO `image_sizes` VALUES ('9','4',NULL,NULL,'100','orig');
INSERT INTO `image_sizes` VALUES ('10','3','140','105','100','medium');
-- --------------------------------------------------------

--
-- Table structure for table `image_types`
--

CREATE TABLE `image_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_types`
--

INSERT INTO `image_types` VALUES ('1','Haber');
INSERT INTO `image_types` VALUES ('2','Urun_grubu');
INSERT INTO `image_types` VALUES ('3','Urun');
INSERT INTO `image_types` VALUES ('4','Referans');
-- --------------------------------------------------------

--
-- Table structure for table `imagegallery_settings`
--

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

--
-- Dumping data for table `imagegallery_settings`
--

INSERT INTO `imagegallery_settings` VALUES ('1','3',NULL,NULL,NULL,'1','ufak','0','0','0','');
-- --------------------------------------------------------

--
-- Table structure for table `images`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` VALUES ('5','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,NULL,'4',NULL,NULL,'2013-12-11 15:17:37');
INSERT INTO `images` VALUES ('6','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','png',NULL,NULL,NULL,'3',NULL,NULL,NULL);
INSERT INTO `images` VALUES ('7','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,'1',NULL,NULL,NULL,'2013-12-06 06:09:40');
INSERT INTO `images` VALUES ('8','small','resimler/',NULL,NULL,NULL,NULL,NULL,'2','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-06 07:57:39');
INSERT INTO `images` VALUES ('9','small','resimler/',NULL,NULL,NULL,NULL,NULL,'2','0','png',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-06 07:57:45');
INSERT INTO `images` VALUES ('10','small','resimler/',NULL,NULL,NULL,NULL,NULL,'2','1','png',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-06 07:58:17');
INSERT INTO `images` VALUES ('11','small','resimler/',NULL,NULL,NULL,NULL,NULL,'2','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-06 07:58:12');
INSERT INTO `images` VALUES ('12','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','png',NULL,NULL,NULL,'10',NULL,NULL,'2013-12-06 08:31:24');
INSERT INTO `images` VALUES ('18','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 02:54:09');
INSERT INTO `images` VALUES ('27','orig','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,'1','2013-12-09 01:44:46');
INSERT INTO `images` VALUES ('17','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 14:10:33');
INSERT INTO `images` VALUES ('19','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 02:56:17');
INSERT INTO `images` VALUES ('38','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,NULL,'14',NULL,NULL,'2013-12-16 03:45:22');
INSERT INTO `images` VALUES ('25','orig','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,'1','2013-12-09 01:42:12');
INSERT INTO `images` VALUES ('26','orig','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,'1','2013-12-09 01:44:36');
INSERT INTO `images` VALUES ('28','orig','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,'1','2013-12-09 01:44:56');
INSERT INTO `images` VALUES ('29','small','resimler/','19',NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 01:47:06');
INSERT INTO `images` VALUES ('30','small','resimler/','19',NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 01:47:15');
INSERT INTO `images` VALUES ('31','small','resimler/','19',NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 01:47:24');
INSERT INTO `images` VALUES ('32','small','resimler/','19',NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-09 01:47:34');
INSERT INTO `images` VALUES ('47','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:24:10');
INSERT INTO `images` VALUES ('35','orig','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,'2','2013-12-11 15:41:13');
INSERT INTO `images` VALUES ('36','orig','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'0','jpg',NULL,NULL,NULL,NULL,NULL,'2','2013-12-11 15:42:27');
INSERT INTO `images` VALUES ('37','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,NULL,'12',NULL,NULL,'2013-12-16 03:31:13');
INSERT INTO `images` VALUES ('39','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,NULL,'26',NULL,NULL,'2013-12-16 03:49:08');
INSERT INTO `images` VALUES ('40','normal','resimler/',NULL,NULL,NULL,NULL,NULL,NULL,'1','jpg',NULL,NULL,NULL,'28',NULL,NULL,'2013-12-16 04:03:04');
INSERT INTO `images` VALUES ('41','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'10','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:11:32');
INSERT INTO `images` VALUES ('42','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'10','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:11:50');
INSERT INTO `images` VALUES ('43','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'10','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:12:09');
INSERT INTO `images` VALUES ('44','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'10','1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:13:09');
INSERT INTO `images` VALUES ('45','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'10','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:12:30');
INSERT INTO `images` VALUES ('46','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'10','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:12:50');
INSERT INTO `images` VALUES ('48','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:24:33');
INSERT INTO `images` VALUES ('49','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:24:59');
INSERT INTO `images` VALUES ('50','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:25:18');
INSERT INTO `images` VALUES ('51','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:25:33');
INSERT INTO `images` VALUES ('52','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'7','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:26:07');
INSERT INTO `images` VALUES ('53','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:37:01');
INSERT INTO `images` VALUES ('54','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:37:14');
INSERT INTO `images` VALUES ('55','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:37:27');
INSERT INTO `images` VALUES ('56','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:37:41');
INSERT INTO `images` VALUES ('57','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:39:25');
INSERT INTO `images` VALUES ('58','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:38:12');
INSERT INTO `images` VALUES ('59','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:38:32');
INSERT INTO `images` VALUES ('60','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'3','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:38:50');
INSERT INTO `images` VALUES ('61','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:48:07');
INSERT INTO `images` VALUES ('62','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:48:23');
INSERT INTO `images` VALUES ('63','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:48:37');
INSERT INTO `images` VALUES ('64','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:48:52');
INSERT INTO `images` VALUES ('65','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:49:06');
INSERT INTO `images` VALUES ('66','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:49:24');
INSERT INTO `images` VALUES ('67','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:49:40');
INSERT INTO `images` VALUES ('68','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:49:50');
INSERT INTO `images` VALUES ('69','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'5','1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 04:51:31');
INSERT INTO `images` VALUES ('70','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:07:58');
INSERT INTO `images` VALUES ('71','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:08:18');
INSERT INTO `images` VALUES ('72','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:08:33');
INSERT INTO `images` VALUES ('73','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:08:54');
INSERT INTO `images` VALUES ('74','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:09:09');
INSERT INTO `images` VALUES ('75','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:09:21');
INSERT INTO `images` VALUES ('76','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:09:36');
INSERT INTO `images` VALUES ('77','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:09:48');
INSERT INTO `images` VALUES ('78','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'11','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:09:59');
INSERT INTO `images` VALUES ('79','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'12','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:16:20');
INSERT INTO `images` VALUES ('80','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'12','0','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:16:36');
INSERT INTO `images` VALUES ('81','medium','resimler/',NULL,NULL,NULL,NULL,NULL,'12','1','jpg',NULL,NULL,NULL,NULL,NULL,NULL,'2013-12-16 05:17:06');
-- --------------------------------------------------------

--
-- Table structure for table `imprintgroups`
--

CREATE TABLE `imprintgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `imprintgroups`
--

-- --------------------------------------------------------

--
-- Table structure for table `imprints`
--

CREATE TABLE `imprints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` text,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `imprintgroup_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT '9999',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imprints`
--

-- --------------------------------------------------------

--
-- Table structure for table `menuareas`
--

CREATE TABLE `menuareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuareas`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

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

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` VALUES ('1',NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'0','0','0',NULL,NULL);
-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `page_links`
--

CREATE TABLE `page_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order` int(11) DEFAULT '1000',
  `link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_links`
--

INSERT INTO `page_links` VALUES ('4','5','Yeni Haber Ekle','1','/posts/add');
INSERT INTO `page_links` VALUES ('5','5','Haberler','2','/posts/index');
INSERT INTO `page_links` VALUES ('19','10','Ürünler','3','/products/index');
INSERT INTO `page_links` VALUES ('18','10','Yeni Ürün Ekle','4','/products/add');
INSERT INTO `page_links` VALUES ('17','10','Yeni Ürün Grubu','2','/productgroups/add');
INSERT INTO `page_links` VALUES ('16','10','Ürün Grupları','1','/productgroups/index');
INSERT INTO `page_links` VALUES ('14','9','Yeni Sayfa Ekle','1','/staticpages/add');
INSERT INTO `page_links` VALUES ('15','9','Sayfalar','2','/staticpages/index');
INSERT INTO `page_links` VALUES ('33','18','Genel Ayarlar','1000','/general_settings/index');
INSERT INTO `page_links` VALUES ('23','12','Yeni İletişim Bilgisi','1','/contacts/add');
INSERT INTO `page_links` VALUES ('24','12','İletişim Bilgileri','2','/contacts/index');
INSERT INTO `page_links` VALUES ('29','14','Kullanıcılar','1','/users/index');
INSERT INTO `page_links` VALUES ('30','15','Yeni Referans Ekle','1','/references/add');
INSERT INTO `page_links` VALUES ('31','15','Referanslar','2','/references/index');
-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `controller` varchar(45) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` VALUES ('5','Haberler','posts','1');
INSERT INTO `pages` VALUES ('18','Tanımlamalar','general_settings','1000');
INSERT INTO `pages` VALUES ('10','Ürünler','products','3');
INSERT INTO `pages` VALUES ('9','Sayfalar','staticpages','5');
INSERT INTO `pages` VALUES ('12','İletişim','contacts','4');
INSERT INTO `pages` VALUES ('14','Kullanıcılar','users','7');
INSERT INTO `pages` VALUES ('15','Referanslar','references','8');
-- --------------------------------------------------------

--
-- Table structure for table `post_settings`
--

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

--
-- Dumping data for table `post_settings`
--

INSERT INTO `post_settings` VALUES ('1','1',NULL,NULL,NULL,NULL,NULL,'1','small','0','0','1','small','');
-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

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

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES ('18','Engelsiz havaalanı sayısı 23′e yükseldi','Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,','<h3>Engelsiz havaalanı sayısı 23′e yükseldi</h3><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>',NULL,NULL,NULL,'2013-12-01 22:41:46',NULL,NULL,'1',NULL,'1',NULL,'0',NULL,NULL,'Engelsiz havaalanı sayısı 23′e yükseldi','Engelsiz havaalanı sayısı 23′e yükseldi','Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,','Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,','<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>','<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>');
INSERT INTO `posts` VALUES ('19','Engelsiz havaalanı sayısı 23′e yükseldi','Engelsiz havaalanı sayısı 23′e yükseldi\r\nTekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacı','<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>',NULL,NULL,NULL,'2013-12-04 19:29:15',NULL,NULL,'1',NULL,'1',NULL,'0',NULL,'CIMG0054.JPG','Engelsiz havaalanı sayısı 23′e yükseldi','Engelsiz havaalanı sayısı 23′e yükseldi','Engelsiz havaalanı sayısı 23′e yükseldi\r\nTekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacı','Engelsiz havaalanı sayısı 23′e yükseldi\r\nTekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacı','<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>','<div>Engelsiz havaalanı sayısı 23′e yükseldi</div><div>Tekirdağ Çorlu, Isparta Süleyman Demirel, Esenboğa ve Adnan Menderes havalimanlarında da engeller kalktı Engelli veya hareket kabiliyeti kısıtlı yolculara havaalanlarında gerekli kolaylıkların sağlanması amacıyla Ulaştırma,</div>');
-- --------------------------------------------------------

--
-- Table structure for table `product_settings`
--

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

--
-- Dumping data for table `product_settings`
--

INSERT INTO `product_settings` VALUES ('1','3',NULL,NULL,NULL,NULL,NULL,'1','medium','0','0','1','medium','');
-- --------------------------------------------------------

--
-- Table structure for table `productgroup_settings`
--

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

--
-- Dumping data for table `productgroup_settings`
--

INSERT INTO `productgroup_settings` VALUES ('1','2',NULL,NULL,NULL,NULL,NULL,'0','normal','0','0','1','normal','');
-- --------------------------------------------------------

--
-- Table structure for table `productgroups`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productgroups`
--

INSERT INTO `productgroups` VALUES ('4','Endüstriyel Led Aydınlatma','<h3><font size=\"2\">LED TEKNOLOJİ</font></h3><div><div><br></div><div>&nbsp;Led kelimesi Light Emitting Diode\'un kısatması olarak kullanılmaktadır. Dilimize Işık YayanDiot olarak çevrilebilir. Yapay işık kaynaklarından en son bulunanıdır. Ampul veya fluoresanların yaydığı ışıktan bambaşka bir yöntemle ışık oluşturması ve bazı avantajlı yanları ledleri bilimin popüler konularından biri yapmıştır.&nbsp;</div><div>P ve N tipi yarı iletken katmanlar(Led çipi), yansıtıcı yüzey ve iletken alanlar bir ledin yapısını oluşturur.&nbsp;</div><div>Diğer yapay ışık kaynaklarında olduğu gibi ledlerde de ışık, elektrik enerjisi kullanılarak oluşturulur. Diyotun içerisindeki elektron ve elektron yitirip \" +\" yük kazanan bölge(deşik) birleşerek bir ışıma meydana gelmektedir. Bu ışımanın enerjisi deşik ve elektronlar arasındaki enerji farkı kadardır. Led çipi türü değiştikçe aradaki enerji farkı da değişmekte, bu ışığın dalga boyunun dolayısıyla renginin farklı olmasını sağlamaktadır. Bu şekilde birçok renk elde etmek mümkündür.</div><div><br></div><div>LEDin hangi renkte ışık yayması isteniyorsa galyum, arsenit, alüminyum, fosfat, indiyum, nitrit gibi kimyasallardan belirli ölçülerde yarı iletken malzemeye ilave edilir. (GaAIAs, GaAs, GaAsP, GaP, InGaAIP, SiC, GaN). Böylece LED çipinin istenen dalga boyunda ışıma yapması sağlanır. Örneğin kırmızı renk (660nm) için GaAlAs, sarı renk (595nm) için InGaAIP, yeşil renk (565nm) için GaP, mavi renk (430nm) için GaN kullanılır. &nbsp;&nbsp;</div><div>LED\'ler diğer ışık kaynaklarından farklı olarak sadece bir renk üretmektedirler. Bilindiği gibi gün ışığı tüm renklerin karışımıdır. Bu karışım ise beyaz ışığı oluşturmaktadır.&nbsp;</div><div><br></div><div>Diğer ışık kaynaklarında örneğin kırmızı ışık elde edilmek isteniyorsa, beyaz ışığın önüne yerleştirilen kırmızı bir katman dışarıya sadece kırmızı ışığın geçmesini sağlıyor, diğer ışınlar içerde kalıyordu. İşte diyotların aydınlatmada en önemli katkısı sadece bir renk üretmesi, fazladan renkler ortaya çıkarmamasıdır. Bir LED kırmızı yeşil mavi gibi tek renk ışık yaymaktadır.</div><div><br></div><div>Bu avantaj, konu beyaz ışık olduğunda dezavantaja dönüşmekte. Led LambaTüm ışık türleri beyaz ışığı oluşturduğu için tek dalga boyundan beyaz ışık üretmek mümkün değildir. Bu sorunu çözmek için iki yöntem uygulanmaktadır.&nbsp;</div><div>- Kırmızı, mavi ve yeşil renkli üç led çipini aynı kılıf içinde çalıştırarak &nbsp; renklerin birleşiminden beyaz ışık üretmek.&nbsp;</div><div>- Mavi led yongasından(çipinden) çıkan ışığın bir fosfor tabakasını uyararak &nbsp; beyaz ışık yayılması.</div></div><div><br></div><div><br></div><div><h3>LED\' LERİN ÖZELLİKLERİ &amp; FAYDALARI</h3><div><br></div><div>- Işık istenilen dalgaboyunda olduğu için renkleri ayrıştırmak içi filtre veya prizma gerektirmezler.</div><div>- Işığın tamamı kullanılır. Diğer lambalarda bazı renkler filtrelenmektedir.</div><div>- Enerji tasarrufu sağlar. 75 Watt lamba yerine 10W Led yeterlidir.</div><div>- Çok hızlı tepki verirler(200ms)</div><div>- Uzum ömürlüdür. Yaklaşık 100.000 saat çalışabilirler.</div><div>- Küçük oldukları için tasarımsal özellikleri çoktur.</div><div>- Düşük ısı üreterek enerjinin ısı olarak kaybını önler. (110°C) Bu değer akkor flamanlı &nbsp; ampullerde 2700 °C\'ye kadar çıkmaktadır.&nbsp;</div><div>- Işık şiddeti kolayca ayarlanabilir.</div><div>- Plastik kılıf sayesinde darbelere karşı dayanıklıdır.</div><div>- Yapısında diğer lambalarda bulunan cıva gibi çevreye zararlı ağır metaller bulunmaz.</div></div>','0',NULL,NULL,NULL,'10000',NULL,NULL,'11','32',NULL,'<h3><font size=\"2\">LED TEKNOLOJİ</font></h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>&nbsp;Led kelimesi Light Emitting Diode\'un kısatması olarak kullanılmaktadır. Dilimize Işık YayanDiot olarak çevrilebilir. Yapay işık kaynaklarından en son bulunanıdır. Ampul veya fluoresanların yaydığı ışıktan bambaşka bir yöntemle ışık oluşturması ve bazı avantajlı yanları ledleri bilimin popüler konularından biri yapmıştır.&nbsp;</div><div>P ve N tipi yarı iletken katmanlar(Led çipi), yansıtıcı yüzey ve iletken alanlar bir ledin yapısını oluşturur.&nbsp;</div><div>Diğer yapay ışık kaynaklarında olduğu gibi ledlerde de ışık, elektrik enerjisi kullanılarak oluşturulur. Diyotun içerisindeki elektron ve elektron yitirip \" +\" yük kazanan bölge(deşik) birleşerek bir ışıma meydana gelmektedir. Bu ışımanın enerjisi deşik ve elektronlar arasındaki enerji farkı kadardır. Led çipi türü değiştikçe aradaki enerji farkı da değişmekte, bu ışığın dalga boyunun dolayısıyla renginin farklı olmasını sağlamaktadır. Bu şekilde birçok renk elde etmek mümkündür.</div><div><br></div><div>LEDin hangi renkte ışık yayması isteniyorsa galyum, arsenit, alüminyum, fosfat, indiyum, nitrit gibi kimyasallardan belirli ölçülerde yarı iletken malzemeye ilave edilir. (GaAIAs, GaAs, GaAsP, GaP, InGaAIP, SiC, GaN). Böylece LED çipinin istenen dalga boyunda ışıma yapması sağlanır. Örneğin kırmızı renk (660nm) için GaAlAs, sarı renk (595nm) için InGaAIP, yeşil renk (565nm) için GaP, mavi renk (430nm) için GaN kullanılır. &nbsp;&nbsp;</div><div>LED\'ler diğer ışık kaynaklarından farklı olarak sadece bir renk üretmektedirler. Bilindiği gibi gün ışığı tüm renklerin karışımıdır. Bu karışım ise beyaz ışığı oluşturmaktadır.&nbsp;</div><div><br></div><div>Diğer ışık kaynaklarında örneğin kırmızı ışık elde edilmek isteniyorsa, beyaz ışığın önüne yerleştirilen kırmızı bir katman dışarıya sadece kırmızı ışığın geçmesini sağlıyor, diğer ışınlar içerde kalıyordu. İşte diyotların aydınlatmada en önemli katkısı sadece bir renk üretmesi, fazladan renkler ortaya çıkarmamasıdır. Bir LED kırmızı yeşil mavi gibi tek renk ışık yaymaktadır.</div><div><br></div><div>Bu avantaj, konu beyaz ışık olduğunda dezavantaja dönüşmekte. Led LambaTüm ışık türleri beyaz ışığı oluşturduğu için tek dalga boyundan beyaz ışık üretmek mümkün değildir. Bu sorunu çözmek için iki yöntem uygulanmaktadır.&nbsp;</div><div>- Kırmızı, mavi ve yeşil renkli üç led çipini aynı kılıf içinde çalıştırarak &nbsp; renklerin birleşiminden beyaz ışık üretmek.&nbsp;</div><div>- Mavi led yongasından(çipinden) çıkan ışığın bir fosfor tabakasını uyararak &nbsp; beyaz ışık yayılması.</div></div><div style=\"font-size: 13px; font-weight: normal;\"><br></div><div style=\"font-size: 13px; font-weight: normal;\"><br></div></h3><h3>LED\' LERİN ÖZELLİKLERİ &amp; FAYDALARI</h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>- Işık istenilen dalgaboyunda olduğu için renkleri ayrıştırmak içi filtre veya prizma gerektirmezler.</div><div>- Işığın tamamı kullanılır. Diğer lambalarda bazı renkler filtrelenmektedir.</div><div>- Enerji tasarrufu sağlar. 75 Watt lamba yerine 10W Led yeterlidir.</div><div>- Çok hızlı tepki verirler(200ms)</div><div>- Uzum ömürlüdür. Yaklaşık 100.000 saat çalışabilirler.</div><div>- Küçük oldukları için tasarımsal özellikleri çoktur.</div><div>- Düşük ısı üreterek enerjinin ısı olarak kaybını önler. (110°C) Bu değer akkor flamanlı &nbsp; ampullerde 2700 °C\'ye kadar çıkmaktadır.&nbsp;</div><div>- Işık şiddeti kolayca ayarlanabilir.</div><div>- Plastik kılıf sayesinde darbelere karşı dayanıklıdır.</div><div>- Yapısında diğer lambalarda bulunan cıva gibi çevreye zararlı ağır metaller bulunmaz.</div></div></h3>','<h3><font size=\"2\">LED TEKNOLOJİ</font></h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>&nbsp;Led kelimesi Light Emitting Diode\'un kısatması olarak kullanılmaktadır. Dilimize Işık YayanDiot olarak çevrilebilir. Yapay işık kaynaklarından en son bulunanıdır. Ampul veya fluoresanların yaydığı ışıktan bambaşka bir yöntemle ışık oluşturması ve bazı avantajlı yanları ledleri bilimin popüler konularından biri yapmıştır.&nbsp;</div><div>P ve N tipi yarı iletken katmanlar(Led çipi), yansıtıcı yüzey ve iletken alanlar bir ledin yapısını oluşturur.&nbsp;</div><div>Diğer yapay ışık kaynaklarında olduğu gibi ledlerde de ışık, elektrik enerjisi kullanılarak oluşturulur. Diyotun içerisindeki elektron ve elektron yitirip \" +\" yük kazanan bölge(deşik) birleşerek bir ışıma meydana gelmektedir. Bu ışımanın enerjisi deşik ve elektronlar arasındaki enerji farkı kadardır. Led çipi türü değiştikçe aradaki enerji farkı da değişmekte, bu ışığın dalga boyunun dolayısıyla renginin farklı olmasını sağlamaktadır. Bu şekilde birçok renk elde etmek mümkündür.</div><div><br></div><div>LEDin hangi renkte ışık yayması isteniyorsa galyum, arsenit, alüminyum, fosfat, indiyum, nitrit gibi kimyasallardan belirli ölçülerde yarı iletken malzemeye ilave edilir. (GaAIAs, GaAs, GaAsP, GaP, InGaAIP, SiC, GaN). Böylece LED çipinin istenen dalga boyunda ışıma yapması sağlanır. Örneğin kırmızı renk (660nm) için GaAlAs, sarı renk (595nm) için InGaAIP, yeşil renk (565nm) için GaP, mavi renk (430nm) için GaN kullanılır. &nbsp;&nbsp;</div><div>LED\'ler diğer ışık kaynaklarından farklı olarak sadece bir renk üretmektedirler. Bilindiği gibi gün ışığı tüm renklerin karışımıdır. Bu karışım ise beyaz ışığı oluşturmaktadır.&nbsp;</div><div><br></div><div>Diğer ışık kaynaklarında örneğin kırmızı ışık elde edilmek isteniyorsa, beyaz ışığın önüne yerleştirilen kırmızı bir katman dışarıya sadece kırmızı ışığın geçmesini sağlıyor, diğer ışınlar içerde kalıyordu. İşte diyotların aydınlatmada en önemli katkısı sadece bir renk üretmesi, fazladan renkler ortaya çıkarmamasıdır. Bir LED kırmızı yeşil mavi gibi tek renk ışık yaymaktadır.</div><div><br></div><div>Bu avantaj, konu beyaz ışık olduğunda dezavantaja dönüşmekte. Led LambaTüm ışık türleri beyaz ışığı oluşturduğu için tek dalga boyundan beyaz ışık üretmek mümkün değildir. Bu sorunu çözmek için iki yöntem uygulanmaktadır.&nbsp;</div><div>- Kırmızı, mavi ve yeşil renkli üç led çipini aynı kılıf içinde çalıştırarak &nbsp; renklerin birleşiminden beyaz ışık üretmek.&nbsp;</div><div>- Mavi led yongasından(çipinden) çıkan ışığın bir fosfor tabakasını uyararak &nbsp; beyaz ışık yayılması.</div></div><div style=\"font-size: 13px; font-weight: normal;\"><br></div><div style=\"font-size: 13px; font-weight: normal;\"><br></div></h3><h3>LED\' LERİN ÖZELLİKLERİ &amp; FAYDALARI</h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>- Işık istenilen dalgaboyunda olduğu için renkleri ayrıştırmak içi filtre veya prizma gerektirmezler.</div><div>- Işığın tamamı kullanılır. Diğer lambalarda bazı renkler filtrelenmektedir.</div><div>- Enerji tasarrufu sağlar. 75 Watt lamba yerine 10W Led yeterlidir.</div><div>- Çok hızlı tepki verirler(200ms)</div><div>- Uzum ömürlüdür. Yaklaşık 100.000 saat çalışabilirler.</div><div>- Küçük oldukları için tasarımsal özellikleri çoktur.</div><div>- Düşük ısı üreterek enerjinin ısı olarak kaybını önler. (110°C) Bu değer akkor flamanlı &nbsp; ampullerde 2700 °C\'ye kadar çıkmaktadır.&nbsp;</div><div>- Işık şiddeti kolayca ayarlanabilir.</div><div>- Plastik kılıf sayesinde darbelere karşı dayanıklıdır.</div><div>- Yapısında diğer lambalarda bulunan cıva gibi çevreye zararlı ağır metaller bulunmaz.</div></div></h3>','Endüstriyel Led Aydınlatma eng','Endüstriyel Led Aydınlatma rus');
INSERT INTO `productgroups` VALUES ('3','Yer Hizmetleri Ekipmanları','<h3><o:p>HAVA LİMANI YER HİZMETLERİ İÇİN DAYANIKLI VE PRATİK EKİPMANLAR!</o:p></h3><div>Yurt içi ve yurt dışına sağladığımız hava limanı yer hizmetleri ekipmanlarımız ile daha yüksek verim ve daha düşük işletme maliyetleri sunmaktayız. Satış sonrası destek ve hızlı servis hizmetlerimizin ekipmanlarınızın her zaman çalışır durumda olmasını sağlamaktadır.</div>','1',NULL,NULL,NULL,'10000',NULL,NULL,'1','10',NULL,'<h3><o:p><b>DURABLE AND PRACTICAL SOLUTIONS FOR AIRPORT GROUND SERVICES!<br><br></b></o:p></h3><p class=\"MsoNormal\"><br></p>','<h3>НАДЕЖНЫЙ И ПРАКТИЧНЫЙ РЕШЕНИЯ ДЛЯ АЭРОПОРТА НАЗЕМНЫЕ СЛУЖБЫ</h3><p class=\"MsoNormal\"><o:p></o:p></p>','Aviation Ground Support Equipment','Наземные Службы Oборудование');
INSERT INTO `productgroups` VALUES ('14','Dolly','','1',NULL,NULL,NULL,'10000',NULL,'3','4','5',NULL,'','','Dolly','Dolly');
INSERT INTO `productgroups` VALUES ('12','Bagaj Arabaları','','1',NULL,NULL,NULL,'10000',NULL,'3','2','3',NULL,'','','Luggage Carrier ','Багажные Перевозчиков');
INSERT INTO `productgroups` VALUES ('28','Yedek Parça','','1',NULL,NULL,NULL,'10000',NULL,'3','8','9',NULL,'','','Spare Parts','Запчасти');
INSERT INTO `productgroups` VALUES ('26','Çöp Arabası','','1',NULL,NULL,NULL,'10000',NULL,'3','6','7',NULL,'','','Waste Container','Отходы Контейнер');
INSERT INTO `productgroups` VALUES ('18','Sensörlü Sokak Aydınlatmaları','','1',NULL,NULL,NULL,'10000',NULL,'16','15','16',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('19','Dış Mekan Aydınlatmalar','Dış mekan LED aydınlatmalarla ilgili açıklama ve fotoğraf alanı;','1',NULL,NULL,NULL,'10000',NULL,'4','18','23',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('16','Sokak Aydınlatmları','Sokak Aydınlatması ile ilgili kısa açıklama ve başlık fotoğrafı. tr','1',NULL,NULL,NULL,'10000',NULL,'4','12','17',NULL,'Sokak Aydınlatması ile ilgili kısa açıklama ve başlık fotoğrafı. en','Sokak Aydınlatması ile ilgili kısa açıklama ve başlık fotoğrafı. ru','','');
INSERT INTO `productgroups` VALUES ('17','Solar Sokak Aydınlatmaları','Solar Sokak Aydınlatmaları kategorisi&nbsp;tr','1',NULL,NULL,NULL,'10000',NULL,'16','13','14',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('20','Projektörler','projektörelr...','1',NULL,NULL,NULL,'10000',NULL,'19','19','20',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('21','Kanopi Altı Ürünler','kanopi','1',NULL,NULL,NULL,'10000',NULL,'19','21','22',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('22','İç Mekan Aydınlatmalar','iç mekan aydınlatmalar kısa açıklama ve fotoğraf bölümü...','1',NULL,NULL,NULL,'10000',NULL,'4','24','31',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('23','Spotlar','Spotlar','1',NULL,NULL,NULL,'10000',NULL,'22','25','26',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('24','Lineer Aydınlatmalar','','1',NULL,NULL,NULL,'10000',NULL,'22','27','28',NULL,'','','','');
INSERT INTO `productgroups` VALUES ('25','Downlight Ürünler','Downlight Ürünler','1',NULL,NULL,NULL,'10000',NULL,'22','29','30',NULL,'','','','');
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` VALUES ('3','Salon Tipi Bagaj Arabası','<div>* Stainless steel luggage carrier for in door use</div><div>* Easy maneuvre, light handling ability</div><div>* Safety break systems</div><div>* Aesthetic Design</div><div><div>* L1 = 1570 ;</div><div>*L2 = 1500</div><div>*W = 900 ;</div><div>* Axe L = 1090</div><div>* Axe Lo = 640</div><div>* Loading Capacity = 500 kg</div></div><div><div>* Robust construction</div><div>* Reinforced Corners</div></div>','Havaalanı terminallerinde yolcuların 500kg kadar bagaj taşımalarını sağlayan arabalar...','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'12','LCAL500','<div>* Stainless steel luggage carrier for in door use</div><div>* Easy maneuvre, light handling ability</div><div>* Safety break systems</div><div>* Aesthetic Design</div><div><div>* L1 = 1570 ;</div><div>*L2 = 1500</div><div>*W = 900 ;</div><div>* Axe L = 1090</div><div>* Axe Lo = 640</div><div>* Loading Capacity = 500 kg</div></div><div><div>* Robust construction</div><div>* Reinforced Corners</div></div>','<div>* Stainless steel luggage carrier for in door use</div><div>* Easy maneuvre, light handling ability</div><div>* Safety break systems</div><div>* Aesthetic Design</div><div><div>* L1 = 1570 ;</div><div>*L2 = 1500</div><div>*W = 900 ;</div><div>* Axe L = 1090</div><div>* Axe Lo = 640</div><div>* Loading Capacity = 500 kg</div></div><div><div>* Robust construction</div><div>* Reinforced Corners</div></div>','Luggage Carier in Airport Lounge','Багажные Носители Более Размер','Luggage carrier  for in door use...','Багажные Носители Более Размер для В-дверные Использованию...');
INSERT INTO `products` VALUES ('5','Apron Tipi Torsiyon Süspansiyonlu Bagaj Taşıma Arabası','<h3><span style=\"font-size: 14pt; line-height: 115%;\">Luggage\r\nCarriers with Torsion Suspension Systems</span></h3>\r\n\r\n<p class=\"MsoNormal\"><em><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin;color:#374F5C\">Conforms with AHM, VDE\r\nand IATA standarts.</span></em><strong><span style=\"font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;\r\nmso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:\r\nCalibri;mso-bidi-theme-font:minor-latin;color:#374F5C\"><o:p></o:p></span></strong></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Chassis and other metals parts :</b> Hot dip galvanised<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Paltform :</b> 18 mm Plywood placed to form V style\r\nfloor<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Panels :</b>\r\n14 mm Plywood or 2 mm steel sheet upon requests<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Towbar :</b> Spring type shock absorber &nbsp;system ( Optional ) incorpotared<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\">Brake System is actuated either by Towbar or by\r\ntorsion itself <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Wheels :</b> Pneumatic or solid upon request <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Tires :</b> Solid , 400 x 100 x 8&nbsp;</span></p><p class=\"MsoNormal\"><span style=\"color: rgb(55, 79, 92);\">Two sides\r\nopen secured by steel railers</span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Reflectors :</b> Red on rear ,<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\">Suspension sytem based on 4 wheel independent <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\">rubber torsion axle individually replaceable. It\r\nallows <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\">the carrier&nbsp;\r\nto move smoothly on the way&nbsp; and\r\nreducing noise effect.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\">Speed 25-35 km per hour. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Dimensions:</b> L : 2400mm ; W :&nbsp; 1400mm&nbsp;\r\n<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Height of the Panel :</b> 520mm<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Capacity:</b>2000 kg<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:Calibri;mso-bidi-theme-font:\r\nminor-latin;color:#374F5C\"><b>Cover:&nbsp;</b>Offered optionally<o:p></o:p></span></p>','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'12','','<h3><span style=\"font-size: 14pt; line-height: 21px;\">Luggage Carriers with Torsion Suspension Systems</span></h3><h3><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><em><span style=\"font-family: Calibri, sans-serif; color: rgb(55, 79, 92);\">Conforms with AHM, VDE and IATA standarts.</span></em><strong><span style=\"font-family: Calibri, sans-serif; color: rgb(55, 79, 92);\"><o:p></o:p></span></strong></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Chassis and other metals parts :</b>&nbsp;Hot dip galvanised<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Paltform :</b>&nbsp;18 mm Plywood placed to form V style floor<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Panels :</b>&nbsp;14 mm Plywood or 2 mm steel sheet upon requests<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Towbar :</b>&nbsp;Spring type shock absorber &nbsp;system ( Optional ) incorpotared<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Brake System is actuated either by Towbar or by torsion itself<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Wheels :</b>&nbsp;Pneumatic or solid upon request<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Tires :</b>&nbsp;Solid , 400 x 100 x 8&nbsp;</span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Two sides open secured by steel railers</span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Reflectors :</b>&nbsp;Red on rear ,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Suspension sytem based on 4 wheel independent<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">rubber torsion axle individually replaceable. It allows<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">the carrier&nbsp; to move smoothly on the way&nbsp; and reducing noise effect.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Speed 25-35 km per hour.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Dimensions:</b>&nbsp;L : 2400mm ; W :&nbsp; 1400mm&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Height of the Panel :</b>&nbsp;520mm<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Capacity:</b>2000 kg<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Cover:&nbsp;</b>Offered optionally</span></p></h3>','<h3><span style=\"font-size: 14pt; line-height: 21px;\">Luggage Carriers with Torsion Suspension Systems</span></h3><h3><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><em><span style=\"font-family: Calibri, sans-serif; color: rgb(55, 79, 92);\">Conforms with AHM, VDE and IATA standarts.</span></em><strong><span style=\"font-family: Calibri, sans-serif; color: rgb(55, 79, 92);\"><o:p></o:p></span></strong></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Chassis and other metals parts :</b>&nbsp;Hot dip galvanised<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Paltform :</b>&nbsp;18 mm Plywood placed to form V style floor<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Panels :</b>&nbsp;14 mm Plywood or 2 mm steel sheet upon requests<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Towbar :</b>&nbsp;Spring type shock absorber &nbsp;system ( Optional ) incorpotared<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Brake System is actuated either by Towbar or by torsion itself<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Wheels :</b>&nbsp;Pneumatic or solid upon request<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Tires :</b>&nbsp;Solid , 400 x 100 x 8&nbsp;</span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Two sides open secured by steel railers</span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Reflectors :</b>&nbsp;Red on rear ,<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Suspension sytem based on 4 wheel independent<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">rubber torsion axle individually replaceable. It allows<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">the carrier&nbsp; to move smoothly on the way&nbsp; and reducing noise effect.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\">Speed 25-35 km per hour.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Dimensions:</b>&nbsp;L : 2400mm ; W :&nbsp; 1400mm&nbsp;<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Height of the Panel :</b>&nbsp;520mm<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Capacity:</b>2000 kg<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"font-size: 13px; font-weight: normal;\"><span style=\"color: rgb(55, 79, 92);\"><b>Cover:&nbsp;</b>Offered optionally</span></p></h3>','Luggage Carriers with Torsion Suspension Systems','Багажные Перевозчиков c Системами Подвески c Торсионной','','');
INSERT INTO `products` VALUES ('10','Palet Dolly','<table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" align=\"left\" style=\"mso-cellspacing:\r\n 1.5pt;background:white;mso-table-overlap:never;mso-yfti-tbllook:1184;\r\n mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;margin-right:\r\n 4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;\r\n mso-table-left:left;mso-table-top:.05pt\">\r\n <tbody><tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Load Capacity<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 8.000 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum width<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">2575 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum length<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">3350 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Weight<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">ca 1160 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Roller wheels<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td colspan=\"2\" valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">90 MM Dia. Rollers with sealed ball bearings<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum towing speed<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 25 KM/H<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Material<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Hot Dip Galvanised Steel<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>','Palet Dolly - Pratik ve hızlı...','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'14','PDT- 3R/ 36ST','<table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" align=\"left\" style=\"mso-cellspacing:\r\n 1.5pt;background:white;mso-table-overlap:never;mso-yfti-tbllook:1184;\r\n mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;margin-right:\r\n 4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;\r\n mso-table-left:left;mso-table-top:.05pt\">\r\n <tbody><tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Load Capacity<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 8.000 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum width<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">2575 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum length<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">3350 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Weight<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">ca 1160 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Roller wheels<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td colspan=\"2\" valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">90 MM Dia. Rollers with sealed ball bearings<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum towing speed<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 25 KM/H<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Material<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Hot Dip Galvanised Steel<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>','<table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" align=\"left\" style=\"mso-cellspacing:\r\n 1.5pt;background:white;mso-table-overlap:never;mso-yfti-tbllook:1184;\r\n mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;margin-right:\r\n 4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;\r\n mso-table-left:left;mso-table-top:.05pt\">\r\n <tbody><tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Load Capacity<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 8.000 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum width<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">2575 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum length<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">3350 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Weight<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">ca 1160 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Roller wheels<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td colspan=\"2\" valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">90 MM Dia. Rollers with sealed ball bearings<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum towing speed<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 25 KM/H<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Material<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Hot Dip Galvanised Steel<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>','Palete Dolly','Palete Dolly','Palet Dolly - Practical and fast...','Palet Dolly - Практичный и быстрый...');
INSERT INTO `products` VALUES ('7','Konteyner Dolly','<p class=\"MsoNormal\" style=\"margin-bottom: 0pt;\"><font face=\"Arial, sans-serif\"><span style=\"line-height: 19.265625px;\">Konteyner Dolly havaalanı yer hizmetleri için tasarlanmış ve üretilmiştir. Hızlı ve güvenli bir şekilde kargo ve bagaj taşıma işlemlerinde kullanılmaktadır.</span></font></p><p class=\"MsoNormal\" style=\"margin-bottom: 0pt;\"><font face=\"Arial, sans-serif\"><span style=\"line-height: 19.265625px;\"><br></span></font></p><table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" align=\"left\" style=\"mso-cellspacing:\r\n 1.5pt;background:white;mso-table-overlap:never;mso-yfti-tbllook:1184;\r\n mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;margin-right:\r\n 4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;\r\n mso-table-left:left;mso-table-top:.05pt\">\r\n <tbody><tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Load Capacity<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">4000 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum width<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">1765 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum length<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">3140 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Weight<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">945 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Roller wheels<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">60 MM Dia. Rollers with sealed ball bearings<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum towing speed<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 25 KM/H<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Functionality<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Rotary Roller Deck<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Material<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Hot Dip Galvanised Steel<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Options<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Double steering (front &amp; rear)<o:p></o:p></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">&nbsp;</span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>','Konteyner Dolly - Havaalanı yer hizmetleri için tasarlanmış ve üretilmiştir...','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'14','CDT-  2R / 5 GT Double steering','<p class=\"MsoNormal\" style=\"line-height: 14.45pt; margin-bottom: 0pt;\"><span style=\"font-family: Arial, sans-serif;\">The container dolly is designed and manufactured for airport ground services, transporting cargo and luggage at the airport.</span><b><span style=\"font-family: Arial, sans-serif; font-size: 9.5pt;\"><br></span></b></p><table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" align=\"left\" style=\"mso-cellspacing:\r\n 1.5pt;background:white;mso-table-overlap:never;mso-yfti-tbllook:1184;\r\n mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;margin-right:\r\n 4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;\r\n mso-table-left:left;mso-table-top:.05pt\">\r\n <tbody><tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Load Capacity<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">4000 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum width<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">1765 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum length<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">3140 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Weight<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">945 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Roller wheels<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">60 MM Dia. Rollers with sealed ball bearings<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum towing speed<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 25 KM/H<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Functionality<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Rotary Roller Deck<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Material<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Hot Dip Galvanised Steel<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Options<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Double steering (front &amp; rear)<o:p></o:p></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">&nbsp;</span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table>','<font face=\"Arial, sans-serif\"><span style=\"line-height: 19.265625px;\">Контейнер тележка разработаны и изготовлены для наземных служб аэропорта, транспортировки грузов и багажа в аэропорту.</span></font><br><div><font face=\"Arial, sans-serif\"><span style=\"line-height: 19.265625px;\"><br></span></font></div><div><table class=\"MsoNormalTable\" border=\"0\" cellpadding=\"0\" align=\"left\" style=\"mso-cellspacing:\r\n 1.5pt;background:white;mso-table-overlap:never;mso-yfti-tbllook:1184;\r\n mso-table-lspace:7.05pt;margin-left:4.8pt;mso-table-rspace:7.05pt;margin-right:\r\n 4.8pt;mso-table-anchor-vertical:paragraph;mso-table-anchor-horizontal:column;\r\n mso-table-left:left;mso-table-top:.05pt\">\r\n <tbody><tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Load Capacity<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">4000 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum width<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">1765 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum length<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">3140 MM<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Weight<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">945 KG<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Roller wheels<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">60 MM Dia. Rollers with sealed ball bearings<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Maximum towing speed<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Max 25 KM/H<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Functionality<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Rotary Roller Deck<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Material<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Hot Dip Galvanised Steel<o:p></o:p></span></p>\r\n  </td>\r\n </tr>\r\n <tr>\r\n  <td valign=\"top\" style=\"padding:1.6pt 11.85pt 1.6pt 0cm\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><b><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Options<o:p></o:p></span></b></p>\r\n  </td>\r\n  <td valign=\"top\" style=\"padding:1.6pt 1.6pt 1.6pt 1.6pt\">\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">Double steering (front &amp; rear)<o:p></o:p></span></p>\r\n  <p class=\"MsoNormal\" style=\"margin-bottom:0cm;margin-bottom:.0001pt;line-height:\r\n  14.45pt;mso-element:frame;mso-element-frame-hspace:7.05pt;mso-element-wrap:\r\n  around;mso-element-anchor-vertical:paragraph;mso-element-anchor-horizontal:\r\n  column;mso-element-top:.05pt;mso-height-rule:exactly\"><span style=\"font-size: 9.5pt; font-family: Arial, sans-serif;\">&nbsp;</span></p>\r\n  </td>\r\n </tr>\r\n</tbody></table></div>','Container Dolly','Container Dolly','Container Dolly - Designed and manufactured for airport ground services...','Container Dolly - Разработаны и изготовлены для наземных служб аэропорта ...');
INSERT INTO `products` VALUES ('8','N1000 Solar ','','','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'17','N1000 Solar','','','','','','');
INSERT INTO `products` VALUES ('9','N1100 Solar','','','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'17','N1100','','','','','','');
INSERT INTO `products` VALUES ('11','Katı Süspansyonlu Bagaj Taşıma Arabası                                                                                                         ','','','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'12','LCS1500','','','Luggage Carriers with Solid Suspension Systems','Багажные Перевозчиков с Системами Solid Подвески','','');
INSERT INTO `products` VALUES ('12','Çop Arabası','','','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'26','CA1500','','','','','','');
-- --------------------------------------------------------

--
-- Table structure for table `reference_settings`
--

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

--
-- Dumping data for table `reference_settings`
--

INSERT INTO `reference_settings` VALUES ('1','4',NULL,NULL,NULL,NULL,NULL,'1','orig','0','0','0','orig','');
-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `label` varchar(250) DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modify` datetime DEFAULT NULL,
  `name_eng` varchar(250) DEFAULT NULL,
  `name_rus` varchar(250) DEFAULT NULL,
  `label_eng` varchar(250) DEFAULT NULL,
  `label_rus` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `references`
--

INSERT INTO `references` VALUES ('1','Referans1','Referans ile ilgili kısa metin alanı, istenildiği kadar uzun tutulabilir.','1','2013-12-08 23:41:24',NULL,'asdf','dfdf','sdf','sdfsdf');
INSERT INTO `references` VALUES ('2','Referans2','Kısa metin alanı','1','2013-12-11 15:40:52',NULL,'','','','');
-- --------------------------------------------------------

--
-- Table structure for table `service_settings`
--

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

--
-- Dumping data for table `service_settings`
--

INSERT INTO `service_settings` VALUES ('1','4',NULL,NULL,NULL,NULL,NULL,'0','','0','0','0','hizmet','');
-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `value` text,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_mail` varchar(100) DEFAULT NULL,
  `sender_smtp` varchar(100) DEFAULT NULL,
  `sender_smtp_port` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` VALUES ('1','','','');
-- --------------------------------------------------------

--
-- Table structure for table `staticpage_settings`
--

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

--
-- Dumping data for table `staticpage_settings`
--

INSERT INTO `staticpage_settings` VALUES ('1','2',NULL,NULL,NULL,NULL,NULL,'0','normal','0','0','1','normal','');
-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` VALUES ('1','Hakkımızda',NULL,'<h3><span style=\"font-size: 13px;\">DHİ, uluslar arası ticarette yeni keşifler!</span><br></h3><div><div><br></div><div>Amacımız sunduğumuz ürünlerde satışta ve satış sonrasında tam müşteri memnuniyetini yakalamak.</div><div><br></div><div>The closed production area is 17500 m2 in 30000 m2 area allows DHI to built up versatile production lines to realise its production with a wide range of mashine park including 4 Diamension CNC, automated and manual bending mashines, welding site, powder painting shop suitable for Aluminium and steel parts af any kind.</div><div><br></div><div>Specialised in bending, &nbsp;welding, forming Göçmenler has great know-how and experience in working various &nbsp;ferreous and no-ferreous metals including stainless steel.</div></div>','','About Us','About Us','<h3><span style=\"font-size: 13px;\">DHİ, uluslar arası ticarette yeni keşifler!</span><br></h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>Amacımız sunduğumuz ürünlerde satışta ve satış sonrasında tam müşteri memnuniyetini yakalamak.</div><div><br></div><div>The closed production area is 17500 m2 in 30000 m2 area allows DHI to built up versatile production lines to realise its production with a wide range of mashine park including 4 Diamension CNC, automated and manual bending mashines, welding site, powder painting shop suitable for Aluminium and steel parts af any kind.</div><div><br></div><div>Specialised in bending, &nbsp;welding, forming Göçmenler has great know-how and experience in working various &nbsp;ferreous and no-ferreous metals including stainless steel.</div></div></h3>','<h3><span style=\"font-size: 13px;\">DHİ, uluslar arası ticarette yeni keşifler!</span><br></h3><h3><div style=\"font-size: 13px; font-weight: normal;\"><div><br></div><div>Amacımız sunduğumuz ürünlerde satışta ve satış sonrasında tam müşteri memnuniyetini yakalamak.</div><div><br></div><div>The closed production area is 17500 m2 in 30000 m2 area allows DHI to built up versatile production lines to realise its production with a wide range of mashine park including 4 Diamension CNC, automated and manual bending mashines, welding site, powder painting shop suitable for Aluminium and steel parts af any kind.</div><div><br></div><div>Specialised in bending, &nbsp;welding, forming Göçmenler has great know-how and experience in working various &nbsp;ferreous and no-ferreous metals including stainless steel.</div></div></h3>',NULL,'1','2',NULL);
-- --------------------------------------------------------

--
-- Table structure for table `survey_values`
--

CREATE TABLE `survey_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `voters_count` int(11) DEFAULT NULL,
  `yuzde` float DEFAULT NULL,
  `survey_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_values`
--

INSERT INTO `survey_values` VALUES ('1','sdf','0','0','1');
INSERT INTO `survey_values` VALUES ('2','sdf','0','0','1');
INSERT INTO `survey_values` VALUES ('3','sdf','0','0','1');
INSERT INTO `survey_values` VALUES ('4','sdf','0','0','1');
-- --------------------------------------------------------

--
-- Table structure for table `survey_voters`
--

CREATE TABLE `survey_voters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `survey_value_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey_voters`
--

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `has_confirm` tinyint(1) DEFAULT NULL,
  `voters_count` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` VALUES ('1','şube','0',NULL,'2011-08-13 17:37:53');
-- --------------------------------------------------------

--
-- Table structure for table `user_permits`
--

CREATE TABLE `user_permits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_permits`
--

INSERT INTO `user_permits` VALUES ('9','3','9');
INSERT INTO `user_permits` VALUES ('8','3','5');
INSERT INTO `user_permits` VALUES ('5','3','10');
INSERT INTO `user_permits` VALUES ('6','3','12');
INSERT INTO `user_permits` VALUES ('10','3','14');
INSERT INTO `user_permits` VALUES ('11','3','15');
INSERT INTO `user_permits` VALUES ('12','3','18');
-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `value` text,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

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

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` VALUES ('1',NULL,'1',NULL,'0','0','0',NULL);
-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `panel_giris` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` VALUES ('1','Site Y','1','1');
INSERT INTO `user_types` VALUES ('3','Kullanıcı','0','1');
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES ('1','Burak','Doğan','admin@admin.net',NULL,'1','1','3a9e8a740b5d5c0d19625bff90a9f92e','1',NULL,'2011-07-26 16:37:24',NULL,'0','bdogan',NULL);
INSERT INTO `users` VALUES ('4','Site','Yöneticisi','info@dhi.com.tr',NULL,'3','0','5c22590152f4f53f3c05cf7cc6aa0b6b','1',NULL,'2011-12-03 15:01:03',NULL,'0','admin',NULL);
-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) DEFAULT NULL,
  `youtubevideoid` varchar(100) DEFAULT NULL,
  `code` text,
  `article_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

