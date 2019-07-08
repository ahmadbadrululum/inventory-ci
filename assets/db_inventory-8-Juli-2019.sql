-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: ffgsystem
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category_comunity`
--

DROP TABLE IF EXISTS `category_comunity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_comunity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_comunity`
--

LOCK TABLES `category_comunity` WRITE;
/*!40000 ALTER TABLE `category_comunity` DISABLE KEYS */;
INSERT INTO `category_comunity` VALUES (1,'overview','overview','2019-02-19 10:02:50',NULL),(2,'history','history','2019-02-19 10:07:13',NULL),(3,'hall of fame','hall-of-fame','2019-02-19 10:08:07',NULL);
/*!40000 ALTER TABLE `category_comunity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_event`
--

DROP TABLE IF EXISTS `category_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_event`
--

LOCK TABLES `category_event` WRITE;
/*!40000 ALTER TABLE `category_event` DISABLE KEYS */;
INSERT INTO `category_event` VALUES (1,'D&A Nite','D&A-Nite','2019-02-26 18:02:24',NULL),(2,'FFG Orientation','ffg-orientation','2019-02-27 03:35:48',NULL),(3,'Welty Cell','welty-cell','2019-02-27 03:36:11',NULL),(4,'Welty show','welty-show','2019-02-27 03:36:22',NULL);
/*!40000 ALTER TABLE `category_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_product`
--

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
INSERT INTO `category_product` VALUES (2,'Book','book','2019-03-11 08:47:22',NULL),(3,'CD&DVD','cd-dvd','2019-03-19 16:16:36',NULL),(4,'Magazine','magazine','2019-03-11 08:48:07',NULL),(5,'Package','package','2019-03-11 08:48:23',NULL),(6,'T-shirt','t-shirt','2019-03-11 08:48:34',NULL),(7,'Other','other','2019-03-11 08:48:39',NULL);
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_training`
--

DROP TABLE IF EXISTS `category_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_training`
--

LOCK TABLES `category_training` WRITE;
/*!40000 ALTER TABLE `category_training` DISABLE KEYS */;
INSERT INTO `category_training` VALUES (6,'Net camp','net-camp','2019-03-29 07:00:16',NULL),(11,'IM2','im2','2019-04-01 02:47:43',NULL),(16,'Mentor camp','mentor-camp','2019-05-22 03:21:02',NULL);
/*!40000 ALTER TABLE `category_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunity`
--

DROP TABLE IF EXISTS `comunity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comunity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description_seo` varchar(140) NOT NULL,
  `description` text NOT NULL,
  `foto` varchar(150) NOT NULL,
  `video` varchar(128) NOT NULL,
  `category_comunity_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunity`
--

LOCK TABLES `comunity` WRITE;
/*!40000 ALTER TABLE `comunity` DISABLE KEYS */;
INSERT INTO `comunity` VALUES (18,'title awal','title-awal','','<p>ffgsystem.</p>\r\n','title_awal.jpg','','0','2019-02-23 04:21:58',NULL),(25,'FFG Peduli Banjir Jakarta 2013','ffg-peduli-banjir-jakarta-2013','FFG Peduli Banjir Jakarta 2013','<p>Di awal bulan januari 2013 jakarta mengalami banjir besar yang membuat lumpuh kondisi ibu kota beberapa hari, FFG bersama-sama turun ke daerah banjir di pluit jakarta barat dengan di bantu oleh angkatan darat untuk membagi bagikan logistik kepada korban banjir yang tidak terjangkau oleh bantuan pada saat itu. F2OY !!!</p>\r\n','FFG_Peduli_Banjir_Jakarta_2013.jpeg','','1','2019-04-11 04:03:30',NULL),(26,'FFG Peduli Merapi 2010','ffg-peduli-merapi-2010','FFG Peduli Merapi 2010\r\n','<p>Pada november 2010 FFG terbang ke yogyakarta untuk berbagi dengan penduduk sekitar merapi akibat letusan dari gunung merapi yang terjadi&nbsp; 26 oktober 2010, hal ini ada bencana nasional yang dialami oleh indonesia saat itu, kami FFG bersama-sama bahu membahu turun kelapangan melihat kondisi serta turut menghibur para korban letusan merapi. F2OY !!!</p>\r\n','FFG_Peduli_Merapi_2010.jpeg','','2','2019-06-20 07:42:52',NULL),(27,'Walter White','walter-white','Walter White','<p>asd sakdjkjsad kjasdkjksadj&nbsp; jdsakjdksaj askdjlksadj kjd lksajdlksa j aksdjkasjd ,jd aksjdkajdslk jaskdjlkasjd jdksajldsaj jaskdjlasd</p>\r\n','Walter_White.jpg','','3','2019-06-20 08:18:20',NULL);
/*!40000 ALTER TABLE `comunity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_event`
--

DROP TABLE IF EXISTS `detail_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usermember_detail_id` int(11) DEFAULT NULL,
  `event_detail_id` int(11) NOT NULL,
  `type_user` enum('member','umum') DEFAULT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(128) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `telephone` varchar(128) NOT NULL,
  `address` text,
  `jm_id` varchar(128) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` enum('single','married') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `birthday_spouse` date DEFAULT NULL,
  `grant_mentor_star_1` varchar(100) DEFAULT NULL,
  `grant_mentor` varchar(100) DEFAULT NULL,
  `senior_mentor` varchar(100) DEFAULT NULL,
  `executive_mentor` varchar(100) DEFAULT NULL,
  `vegan` enum('yes','no') DEFAULT NULL,
  `pregnant` enum('yes','no') DEFAULT NULL,
  `heart_disaese` varchar(100) DEFAULT NULL,
  `hipertension` varchar(100) DEFAULT NULL,
  `diabetes` varchar(100) DEFAULT NULL,
  `asthma` varchar(100) DEFAULT NULL,
  `physical_disablity` varchar(100) DEFAULT NULL,
  `epilepsy` varchar(100) DEFAULT NULL,
  `hepatitis` varchar(100) DEFAULT NULL,
  `arthristic` varchar(100) DEFAULT NULL,
  `osteoporosis` varchar(100) DEFAULT NULL,
  `typhoid` varchar(100) DEFAULT NULL,
  `childbirth` enum('cesarian','normal') DEFAULT NULL,
  `childbirth_year` varchar(5) DEFAULT NULL,
  `other_surgery` varchar(100) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `status_user` tinyint(4) NOT NULL DEFAULT '0',
  `status_bayar` tinyint(4) NOT NULL DEFAULT '0',
  `foto_transfer` varchar(128) DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usermember_detail_id` (`usermember_detail_id`),
  KEY `event_detail_id` (`event_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_event`
--

LOCK TABLES `detail_event` WRITE;
/*!40000 ALTER TABLE `detail_event` DISABLE KEYS */;
INSERT INTO `detail_event` VALUES (4,NULL,16,'umum','badruk','dksakh','2020-01-31','badrul@h-seo123.com',NULL,NULL,'78772817398',NULL,'','male','single','2019-06-27 03:01:19','2019-06-27 03:01:19','','0000-00-00','','','','','yes','','','','','','','','','','','','','','','','',10,200,0,0,'',NULL),(9,19,16,'member','Ahmad ','badrul','2019-06-19','badrul@h-seo.com',NULL,NULL,'123123',NULL,'','male','single','2019-06-27 16:34:43','2019-06-27 16:34:43',NULL,NULL,'tytyty','ghgh','hjhj','jkkj','yes','','','','','','','','','','','','','','','','france,mandarin',120,13,0,0,'',100000),(10,NULL,15,'umum','Dimas','teriyaki','2019-01-31','nama@mail.com',NULL,NULL,'45454',NULL,'','male','single','2019-07-01 12:57:32','2019-07-01 12:57:32','nana','2019-01-01','','','','','yes','','','','','','','','','','','','','','','','',178,40,0,0,'',250000),(11,NULL,15,'umum','Eby','Habib','2019-01-31','badrul123@h-seo.com',NULL,NULL,'5656565',NULL,'','male','single','2019-07-01 14:03:15','2019-07-01 14:03:15','','0000-00-00','','','','','yes','','','','','','','','','','','','','','','','',69,169,0,0,'',150000),(12,NULL,15,'umum','ahmad','badrul','2019-07-14','ahmadbadrul635@gmail.com',NULL,NULL,'989898',NULL,'','female','single','2019-07-02 11:44:39','2019-07-02 11:44:39','','0000-00-00','','','','','yes','','','','','','','','','','','','','','','','',10,123,0,0,'',100000);
/*!40000 ALTER TABLE `detail_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_size`
--

DROP TABLE IF EXISTS `detail_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variant_id` int(11) NOT NULL,
  `size_variant_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `variant_id` (`variant_id`),
  KEY `size_variant_id` (`size_variant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_size`
--

LOCK TABLES `detail_size` WRITE;
/*!40000 ALTER TABLE `detail_size` DISABLE KEYS */;
INSERT INTO `detail_size` VALUES (160,237,5,1200,30),(161,237,6,300000,123),(162,237,9,123111,123),(163,238,4,1234434,124),(164,238,6,214455,45),(165,238,7,123465,49),(166,239,4,244555,43),(167,239,7,434324,21),(168,239,8,12344,23),(169,240,3,10000,12),(170,240,8,23000,213),(171,241,7,124000,44),(172,241,9,12432,21),(173,242,4,10000,20),(174,242,5,120000,12),(175,242,9,212000,1230),(176,243,7,12300,12300),(177,243,9,3213,1230),(178,244,4,123,123123),(179,244,6,12312,123),(180,248,5,200000,10),(181,248,6,20000,23),(182,248,7,30000,32),(183,249,4,10000,23),(184,249,6,23333,34),(185,249,9,444444,23),(186,250,5,1233433,123),(187,250,6,12222,12),(188,250,8,23333,40);
/*!40000 ALTER TABLE `detail_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_training`
--

DROP TABLE IF EXISTS `detail_training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bc_certificate_no` varchar(30) DEFAULT NULL,
  `usermember_detail_id` int(11) NOT NULL,
  `training_detail_id` int(11) NOT NULL,
  `status_user` tinyint(3) NOT NULL DEFAULT '0',
  `status_bayar` tinyint(11) DEFAULT '0',
  `total_pembayaran` double NOT NULL,
  `created_ad` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userbuyer_training_id` (`usermember_detail_id`),
  KEY `product_training_id` (`training_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_training`
--

LOCK TABLES `detail_training` WRITE;
/*!40000 ALTER TABLE `detail_training` DISABLE KEYS */;
INSERT INTO `detail_training` VALUES (27,'abc123',19,9,1,1,100000,'2019-06-28 04:40:34','2019-07-02 09:24:55');
/*!40000 ALTER TABLE `detail_training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_variant`
--

DROP TABLE IF EXISTS `detail_variant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_variant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `variant_product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `size` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `variant_product_id` (`variant_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_variant`
--

LOCK TABLES `detail_variant` WRITE;
/*!40000 ALTER TABLE `detail_variant` DISABLE KEYS */;
INSERT INTO `detail_variant` VALUES (240,135,3,'LOVE-TRANSPARANT-YELLOW-FRONT.jpg,LOVE-TRANSPARANT-YELLOW-DIAMETRIC.jpg','3,8'),(241,135,5,'LOVE-TRANSPARANT-GREEN-FRONT.jpg,LOVE-TRANSPARANT-GREEN-DIAMETRIC.jpg','7,9'),(248,142,1,'KAOS_LM_MERAH_-2.jpg,KAOS_LM_MERAH_-1.jpg','5,6,7'),(249,142,3,'KAOS_LM_KUNING_-_2.jpg,KAOS_LM_KUNING_-_1.jpg','4,6,9'),(250,142,5,'KAOS_LM_HIJAU_-_2.jpg,KAOS_LM_HIJAU_-_1.jpg','5,6,8');
/*!40000 ALTER TABLE `detail_variant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `description_seo` varchar(144) NOT NULL,
  `host` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_translator` double NOT NULL,
  `event_types` text NOT NULL,
  `category_event_id` int(11) NOT NULL,
  `category_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `close_register` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_event_id` (`category_event_id`),
  KEY `category_type_id` (`category_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (15,'Event free ffg Welty plan','event-free-ffg-welty-plan','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>','Event free ffg','dimas','2019-07-01','2019-07-07','indonesia','jakarta','test.jpg',100000,50000,'',2,5,'2019-06-21 09:21:24',NULL,'2019-07-04'),(16,'Event example','event-example','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>','Event example','Adan','2019-07-01','2019-07-06','indonesia','Jl. Veteran No.45, Panaragan, Bogor Tengah, Kota Bogor, Jawa Barat 16125','Event_example.jpg',100000,50000,'',1,5,'2019-06-24 06:51:52',NULL,'2019-06-30');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_product`
--

DROP TABLE IF EXISTS `foto_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image1` varchar(255) DEFAULT NULL,
  `name_video` varchar(255) DEFAULT NULL,
  `product_foto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_foto_id` (`product_foto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_product`
--

LOCK TABLES `foto_product` WRITE;
/*!40000 ALTER TABLE `foto_product` DISABLE KEYS */;
INSERT INTO `foto_product` VALUES (111,'DVD_WELTY_KAMEN_-_2.jpg',NULL,94),(112,'BOOK_ENZYME_-_2.jpg,BOOK_ENZYME_-_1.jpg',NULL,95),(114,'BOOK_MENTORING_PROGRAM_-_2.jpg,tekno02.jpeg',NULL,98),(119,'Screenshot_from_2019-05-03_13-48-02.png',NULL,110),(120,'BOOK_NETWORKING_TIMES_-_2.jpg,BOOK_NETWORKING_TIMES_-_1.jpg',NULL,129),(121,'BOOK_ENZYME_-_2.jpg,BOOK_ENZYME_-_1.jpg',NULL,130),(122,'DVD_NM_PART_3_-_3.jpg,DVD_NM_PART_3.jpg',NULL,131),(123,'DVD_NM_PART_7.jpg',NULL,132),(124,'BOOK_MENTORING_PROGRAM_-_2.jpg,BOOK_MENTORING_PROGRAM_-_1.jpg',NULL,134),(125,'BOOK_MENTORING_PROGRAM_-_21.jpg,BOOK_MENTORING_PROGRAM_-_12.jpg',NULL,143);
/*!40000 ALTER TABLE `foto_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_event`
--

DROP TABLE IF EXISTS `jenis_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_event`
--

LOCK TABLES `jenis_event` WRITE;
/*!40000 ALTER TABLE `jenis_event` DISABLE KEYS */;
INSERT INTO `jenis_event` VALUES (2,'berjenjang','berjenjang','2019-03-18 16:13:34',NULL),(5,'single','single','2019-04-01 02:41:25',NULL),(11,'multiple','multiple','2019-05-22 03:20:35',NULL);
/*!40000 ALTER TABLE `jenis_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `description_seo` varchar(140) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `video` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (9,'Sambutan Duta Besar Indonesia di Senegal','sambutan-duta-besar-indonesia-di-senegal','<p>Duta Besar indonesia untuk Senegal Bapak dan ibu andradjati menerima kedatangan team FFG di kantor beliau dengan sangat terbuka, beliau melihat perubahan-perubahan yang FFG lakukan terhadap senegal secara mental positif terhadap member FFG disenegal . Hal ini telah mengharumkan nama indonesia khususnya di mata internasional F2OY !!!</p>\r\n','Sambutan Duta Besar Indonesia di Senegal','Sambutan_Duta_Besar_Indonesia_di_Senegal.jpg','','2019-06-20 07:10:05',NULL),(11,'FFG memecah 2 rekor dunia sekaligus','ffg-memecah-2-rekor-dunia-sekaligus','<p>Di acara akbar Annual Freedom Celebration yang diadakan di Istora senayan tgl 10-11 Desember 2011, FFG berhasil memecah 2 rekor dunia sekaligus, yaitu Parade obor terbanyak serta formasi obor orang terbanyak, Rekor yang sebelumnya dipegang oleh denmark dan usa akhirnya FFG telah pecahkan bersama-sama dengan member FFG .</p>\r\n','FFG memecah 2 rekor dunia sekaligus','FFG_memecah_2_rekor_dunia_sekaligus.png','','2019-06-20 07:36:40',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `weight` float NOT NULL,
  `code_product` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_product_id` int(11) NOT NULL,
  `category_training_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` text NOT NULL,
  `ebook` varchar(150) NOT NULL,
  `video` varchar(150) NOT NULL,
  `cddvd` varchar(128) DEFAULT NULL,
  `stock` double NOT NULL,
  `variant_product_id` varchar(150) NOT NULL,
  `product_all_id` varchar(255) DEFAULT NULL,
  `discount` float NOT NULL,
  `price_discount` float NOT NULL,
  `price_download` double DEFAULT NULL,
  `description_seo` varchar(140) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_product_id` (`category_product_id`),
  KEY `category_training_id` (`category_training_id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (129,'Buku FFG','buku-ffg','','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>',2000,'buku123',100000,NULL,'2019-05-28 23:29:13',NULL,2,0,NULL,NULL,'','ebook ffg','',NULL,10,'',NULL,0,0,10000,'buku ffgsystem'),(130,'CD ffgsystem','cd-ffgsystem','','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>',1000,'cd123',100000,NULL,'2019-05-28 23:30:43',NULL,3,0,NULL,NULL,'','','','cd ffgsystem',10,'',NULL,0,0,10000,'cd ffgsystem'),(131,'magazine  news','magazine-news','','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>',1000,'magazine123',100000,NULL,'2019-05-28 23:34:07',NULL,4,0,NULL,NULL,'','magazine ebook','',NULL,100,'',NULL,0,0,10000,'magazine news'),(132,'Package ffg','package-ffg','','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>',2030,'packagecode',100000,NULL,'2019-05-28 23:37:32',NULL,5,0,NULL,NULL,'','','',NULL,203,'','129,130',0,0,NULL,'package'),(134,'buku ffg2','buku-ffg2','','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>',2000,'ffg2',10000,NULL,'2019-05-28 23:52:45',NULL,2,0,NULL,NULL,'','ebook ffg2','',NULL,123,'',NULL,0,0,2000,'buku ffg'),(135,'gelang','gelang','','<p>Fitur Produk</p>\r\n\r\n<ul>\r\n	<li>Sneakers shoes</li>\r\n	<li>Didesain trendy</li>\r\n	<li>Detail neat stitching dan eyelets</li>\r\n	<li>Outsole yang nyaman digunakan sehari-hari</li>\r\n	<li>Material : Berkualitas</li>\r\n</ul>\r\n\r\n<p>Pelayanan Produk</p>\r\n\r\n<ul>\r\n	<li>15 hari Pengembalian Produk&nbsp;<a href=\"https://www.blibli.com/faq/topic/pengembalian-produk/\">Info</a></li>\r\n	<li>Tersedia Cash On Delivery&nbsp;<a href=\"https://www.blibli.com/faq/topic/pembayaran/cod-bayar-di-tempat/\">Info</a></li>\r\n</ul>',10000,'gelang132',0,NULL,'2019-05-29 00:04:31',NULL,7,0,NULL,NULL,'','','',NULL,0,'3,5',NULL,0,0,NULL,'test'),(142,'Baju ffg','baju-ffg','','<p>Fitur Produk</p>\r\n\r\n<ul>\r\n	<li>Sneakers shoes</li>\r\n	<li>Didesain trendy</li>\r\n	<li>Detail neat stitching dan eyelets</li>\r\n	<li>Outsole yang nyaman digunakan sehari-hari</li>\r\n	<li>Material : Berkualitas</li>\r\n</ul>\r\n\r\n<p>Pelayanan Produk</p>\r\n\r\n<ul>\r\n	<li>15 hari Pengembalian Produk&nbsp;<a href=\"https://www.blibli.com/faq/topic/pengembalian-produk/\">Info</a></li>\r\n	<li>Tersedia Cash On Delivery&nbsp;<a href=\"https://www.blibli.com/faq/topic/pembayaran/cod-bayar-di-tempat/\">Info</a></li>\r\n</ul>',1000,'bajuffg',0,NULL,'2019-06-17 06:38:36',NULL,6,0,NULL,NULL,'','','',NULL,0,'1,3,5',NULL,0,0,NULL,'bajuffg'),(143,'buku bagus','buku-bagus','','<p>Similarly, the description text is generally used to describe something.&nbsp;The description text makes the reader seem to enter the atmosphere told in the text.</p>\r\n\r\n<p>Description text is generally used in novels or short stories so that the reader seems to be carried away with the atmosphere described.&nbsp;Further information about the definition along with the sample text description will be described below</p>',1000,'buku124',10000,NULL,'2019-06-25 03:50:11',NULL,2,0,NULL,NULL,'','buku123','',NULL,10,'',NULL,0,0,1000,'bukuku');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sct_all`
--

DROP TABLE IF EXISTS `sct_all`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sct_all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_sct_id` int(11) NOT NULL,
  `active` tinyint(2) DEFAULT '0',
  `title` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `link` varchar(128) NOT NULL DEFAULT '#',
  `title_link` varchar(128) DEFAULT NULL,
  `parent_description` text,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_sct_all_1_idx` (`category_sct_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sct_all`
--

LOCK TABLES `sct_all` WRITE;
/*!40000 ALTER TABLE `sct_all` DISABLE KEYS */;
INSERT INTO `sct_all` VALUES (1,1,1,'We are FFGSYSTEM',NULL,'1.jpg','ffgsystem.com','get started',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),(2,1,1,'We are Event Advanced',NULL,'2.jpg','link 2','get started',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),(3,1,NULL,'Our Community for Charity',NULL,'3.jpg','link 3','get started',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),(4,1,1,'We are professional',NULL,'4.jpg','link 4','get started',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),(5,1,NULL,'Our Activity\'s',NULL,'5.jpg','link 5','get started',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),(6,2,0,'Our Product','far fa-chart-bar',NULL,'#',NULL,NULL,'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident'),(7,2,0,'Our Activity','far fa-clock','sample-profile.jpg','#',NULL,NULL,'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident'),(8,2,0,'Charity Activity','far fa-heart',NULL,'#',NULL,NULL,'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident'),(9,3,NULL,'Walter White',NULL,'team-1.jpg','#',NULL,NULL,NULL),(10,3,NULL,'Walter White',NULL,'','#',NULL,NULL,NULL),(11,3,NULL,'Walter White',NULL,'','#',NULL,NULL,NULL),(12,3,NULL,'Amanda Jepson',NULL,'team-4.jpg','#',NULL,NULL,NULL),(13,4,1,'stinder',NULL,'client-1.png','#',NULL,NULL,NULL),(14,4,1,'runtastic',NULL,'client-2.png','',NULL,NULL,NULL),(15,4,1,'editshare',NULL,'client-3.png','#',NULL,NULL,NULL),(16,4,1,'infocus',NULL,'client-4.png','#',NULL,NULL,NULL),(17,4,1,'gategroup',NULL,'client-5.png','#',NULL,NULL,NULL),(18,4,NULL,'cadent',NULL,'client-6.png','#',NULL,NULL,NULL),(19,4,NULL,'ceph',NULL,'client-7.png','#',NULL,NULL,NULL),(20,4,NULL,'alitalia',NULL,'client-8.png','#',NULL,NULL,NULL),(21,5,0,NULL,NULL,NULL,'#',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',NULL),(22,5,0,'FFGsystem Mission','fas fa-tachometer-alt','about-mission.jpg','#',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. update','Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),(23,5,0,'FFGsystem Plan','far fa-list-alt','about-plan.jpg','#',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. update','Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.'),(24,5,0,'FFGsystem Vision','fas fa-eye','about-vision.jpg','#',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. update','Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.'),(25,6,1,'sosmed1','fab fa-facebook-f',NULL,'example.com',NULL,NULL,NULL),(26,6,1,'sosmed2','fab fa-twitter',NULL,'example.com',NULL,NULL,NULL),(27,6,1,'sosmed3','fab fa-linkedin-in',NULL,'example.com',NULL,NULL,NULL),(28,6,NULL,'sosmed4','fab fa-youtube',NULL,'example.com',NULL,NULL,NULL),(29,6,1,'sosmed5','fab fa-google-plus-g',NULL,'example.com',NULL,NULL,NULL),(30,6,1,'sosmed6','fab fa-instagram',NULL,'example.com',NULL,NULL,NULL),(31,7,0,'comunity',NULL,'news.jpg','#',NULL,NULL,NULL),(32,7,0,'news',NULL,'news1.jpg','#',NULL,NULL,NULL),(33,7,0,'product',NULL,'news2.jpg','#',NULL,NULL,NULL),(34,7,0,'training',NULL,'news3.jpg','#',NULL,NULL,NULL),(35,7,0,'event',NULL,'news4.jpg','#',NULL,NULL,NULL),(36,7,0,'schedulle',NULL,'news5.jpg','#',NULL,NULL,NULL),(37,7,0,'ffgatv',NULL,'news6.jpg','#',NULL,NULL,NULL);
/*!40000 ALTER TABLE `sct_all` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sct_category`
--

DROP TABLE IF EXISTS `sct_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sct_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sct_category`
--

LOCK TABLES `sct_category` WRITE;
/*!40000 ALTER TABLE `sct_category` DISABLE KEYS */;
INSERT INTO `sct_category` VALUES (1,'slider'),(2,'about'),(3,'gallery'),(4,'partner'),(5,'wwa'),(6,'social'),(7,'background');
/*!40000 ALTER TABLE `sct_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_config`
--

DROP TABLE IF EXISTS `site_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_logo` varchar(150) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `site_footer_logo` varchar(150) DEFAULT NULL,
  `site_youtube` text,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_config`
--

LOCK TABLES `site_config` WRITE;
/*!40000 ALTER TABLE `site_config` DISABLE KEYS */;
INSERT INTO `site_config` VALUES (1,'ffg-logo.png','© Copyright FFGsystem. All Rights Reserved','ffg-logo-inverse.png','<iframe src=\"https://www.youtube.com/embed/zpOULjyy-n8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>','A108 Adam Street, NY 535022, USA','0987654321','example@gmail.com');
/*!40000 ALTER TABLE `site_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size_product`
--

DROP TABLE IF EXISTS `size_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `slug` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size_product`
--

LOCK TABLES `size_product` WRITE;
/*!40000 ALTER TABLE `size_product` DISABLE KEYS */;
INSERT INTO `size_product` VALUES (1,'0','0'),(2,'1','1'),(3,'2','0'),(4,'S','0'),(5,'M','m'),(6,'ML','ml'),(7,'L','0'),(8,'XL','0'),(9,'XXL','0'),(12,'Jumbo','jumbo');
/*!40000 ALTER TABLE `size_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `description_seo` text NOT NULL,
  `host` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `close_register` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `price_translator` double NOT NULL,
  `category_training_id` int(11) NOT NULL,
  `category_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_training_id` (`category_training_id`),
  KEY `category_type_id` (`category_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
INSERT INTO `training` VALUES (9,'Communicator','communicator','<p>ffgsystem.com</p>','bootcamp','Habibi','2019-07-10','2019-07-11','2019-07-01','indonesia','Jl. Veteran No.45, Panaragan, Bogor Tengah, Kota Bogor, Jawa Barat 16125','Communicator.jpg',100000,10000,6,5,'2019-04-11 03:49:14',NULL),(12,'Inspire','inspire','<p>This word (Descrition) may be misspelled. Below you can find the suggested words which we believe are the correct spellings for what you were searching for. If you click on the links, you can find more information about these words.</p>','12','Bambang','2019-05-22','2019-05-23','2019-05-31','indonesia','Jl. Veteran No.45, Panaragan, Bogor Tengah, Kota Bogor, Jawa Barat 16125','Inspire.jpg',1000,1000,11,5,'2019-05-22 03:19:25',NULL);
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_buyer`
--

DROP TABLE IF EXISTS `user_buyer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_buyer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `country` varchar(128) NOT NULL,
  `telephone` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `jm_id` varchar(128) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `status` enum('single','married') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_buyer`
--

LOCK TABLES `user_buyer` WRITE;
/*!40000 ALTER TABLE `user_buyer` DISABLE KEYS */;
INSERT INTO `user_buyer` VALUES (1,'badrul','badrul','2019-12-31','dhimas.m.s167@gmail.com',0,'BG2acPOjWb0tJ48h','demak','123','demak','123','male','married','$2y$10$yW02jg0ofri7egnYPGWM0eqEBmK6nMaU7Anfoc2ZpsycVncp5JHTW','2019-03-12 07:10:58',NULL),(4,'badrul','badrul','2019-12-31','badrul@h-seo.com',1,'K8kLePUz5uQ24XN7','indonesia','0987654123','demak','123','male','single','$2y$10$fHGrlo966uu/13KpcFDQceGcraaCMSE32tu9pAcvoeb3m2L1iAbda','2019-03-12 07:26:24',NULL),(5,'test','test','2019-01-31','badrul@mail.com',0,'HveMYK64URVqyQ3L','test','123','test','1234','male','single','$2y$10$uaLXijecL0ZBVYiEJnawLetSFmHT0mV3.qwScXSNyg6Zvhk1B3Zke','2019-03-12 07:42:56',NULL),(6,'test','test','2019-01-31','ahmadbadrul635@gmail.com',1,'TgqX2tRAlnQ7ZyDm','test','1234','test','125','female','single','$2y$10$k3ORKa/aCIpCFt4B0v7HPeCpJ/ZjokyKqhOnGx.Lbk4eDhAjPXl6C','2019-03-12 07:47:56',NULL);
/*!40000 ALTER TABLE `user_buyer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,'super admin','2019-06-21 09:34:27',NULL),(2,'admin','2019-06-21 09:34:27',NULL);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_member`
--

DROP TABLE IF EXISTS `user_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `country` varchar(128) NOT NULL,
  `telephone` varchar(128) NOT NULL,
  `bc_certificate_no` text,
  `city` varchar(128) NOT NULL,
  `jm_id` varchar(128) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` enum('single','married') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_member` enum('basic','premium') DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `birthday_spouse` date DEFAULT NULL,
  `grant_mentor_star_1` varchar(100) DEFAULT NULL,
  `grant_mentor` varchar(100) DEFAULT NULL,
  `senior_mentor` varchar(100) DEFAULT NULL,
  `executive_mentor` varchar(100) DEFAULT NULL,
  `vegan` enum('yes','no') DEFAULT NULL,
  `pregnant` enum('yes','no') DEFAULT NULL,
  `heart_disaese` varchar(100) DEFAULT NULL,
  `hipertension` varchar(100) DEFAULT NULL,
  `diabetes` varchar(100) DEFAULT NULL,
  `asthma` varchar(100) DEFAULT NULL,
  `physical_disablity` varchar(100) DEFAULT NULL,
  `epilepsy` varchar(100) DEFAULT NULL,
  `hepatitis` varchar(100) DEFAULT NULL,
  `arthristic` varchar(100) DEFAULT NULL,
  `osteoporosis` varchar(100) DEFAULT NULL,
  `typhoid` varchar(100) DEFAULT NULL,
  `childbirth` enum('cesarian','normal') DEFAULT NULL,
  `childbirth_year` varchar(5) DEFAULT NULL,
  `other_surgery` varchar(100) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `language` text,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_member`
--

LOCK TABLES `user_member` WRITE;
/*!40000 ALTER TABLE `user_member` DISABLE KEYS */;
INSERT INTO `user_member` VALUES (19,'Ahmad ','badrul','2019-06-19','badrul@h-seo.com',1,'1U57hQcAV8Lzo3El','indonesia','123123','abc123','jakarta','ID12345','male','single','$2y$10$.FGd/7SZCG6.DmFw6AoYyOsR2ByEae1pzoHVS3XCS7g.UVOP6qklu','2019-06-25 07:06:21',NULL,'basic','','0000-00-00','tytyty','ghgh','hjhj','jkkj','yes','no','','','','','','','','','','','','',NULL,'','france,mandarin',120,13);
/*!40000 ALTER TABLE `user_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(123) NOT NULL,
  `email` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_group_id` (`user_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'habibi','habibi@h-seo.com','$2y$10$gJAGHJfNboVZBhvOhSsbNeSgYm58VX877F4qdhWoM3pCTPDgKMQJm',1,1,'ShYmtQTaiD9xWn34','2019-02-16 09:59:10',NULL),(6,'badrul1','badrul@h-seo.com','$2y$10$NgPXHNkwMpwnshK27utSP.52315O.KpT0myZjz/2K0.gsk7cfH7gi',1,1,'f29KvsmeHaOdhqIw','2019-03-19 10:08:22',NULL),(12,'Paulus','paulus@mail.com','$2y$10$F6imj7myCMyYvO01dDrnROAhK8ky/qaSudf/zpL2mkSLiEtQMBjFy',1,1,'sNlaKzu18X9tjHDA','2019-06-24 10:36:25',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `variant_product`
--

DROP TABLE IF EXISTS `variant_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `variant_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_variant` varchar(100) NOT NULL,
  `slug` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `variant_product`
--

LOCK TABLES `variant_product` WRITE;
/*!40000 ALTER TABLE `variant_product` DISABLE KEYS */;
INSERT INTO `variant_product` VALUES (1,'Merah','merah'),(2,'Biru','biru'),(3,'Kuning','kuning'),(4,'Putih','putih'),(5,'Hijau','hijau'),(6,'Orange','orange'),(10,'Ungu','ungu');
/*!40000 ALTER TABLE `variant_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_product`
--

DROP TABLE IF EXISTS `video_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_video` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_video_id` (`product_video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_product`
--

LOCK TABLES `video_product` WRITE;
/*!40000 ALTER TABLE `video_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `video_product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-08 10:41:46
