-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: db_inventory
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
-- Table structure for table `detail_invoice`
--

DROP TABLE IF EXISTS `detail_invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_detail_id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_detail_id` (`invoice_detail_id`),
  CONSTRAINT `id_invoice` FOREIGN KEY (`invoice_detail_id`) REFERENCES `invoice` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_invoice`
--

LOCK TABLES `detail_invoice` WRITE;
/*!40000 ALTER TABLE `detail_invoice` DISABLE KEYS */;
INSERT INTO `detail_invoice` VALUES (28,18,'sapu',1000,10,'biji',10000),(29,18,'telor',2000,2,'kg',4000),(30,18,'kopi',2000,2,'pcs',4000),(34,18,'gula',5000,3,'kg',15000),(37,18,'susu',200,2,'pcs',400),(41,20,'celengan',1000,2,'kg',2000),(42,20,'kabel',2000,10,'pcs',20000),(43,20,'tes',1000,1,'kg',1000);
/*!40000 ALTER TABLE `detail_invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status_1` tinyint(5) NOT NULL,
  `status_2` int(4) NOT NULL,
  `catatan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (18,'INV-08/07/2019-001','22 juli - 22 agustus',0,1,'catatan 1\ncatatan 2'),(20,'INV-08/07/2019-003','22 Juni - 22 Juli 2019',1,1,'1. catatan 1 teh dikurangin');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_product` varchar(10) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `unit_product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unit_prouduct_id` (`unit_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (23,'A002','Kopiiii',23),(24,'A003','Gula',22),(25,'A006','Pembersih lantai',24),(26,'A004','pembersih kaca',27);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sample_data`
--

DROP TABLE IF EXISTS `sample_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sample_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sample_data`
--

LOCK TABLES `sample_data` WRITE;
/*!40000 ALTER TABLE `sample_data` DISABLE KEYS */;
INSERT INTO `sample_data` VALUES (9,'nana','nads',NULL,10),(10,'nana','nana',NULL,90),(12,'nananamanaka','nana',NULL,0);
/*!40000 ALTER TABLE `sample_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_invoice` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (120,'BM001','2019-07-02',23,5),(121,'BM002','2019-07-02',23,5),(122,'BK001','2019-07-03',23,2),(123,'BM003','2019-07-02',24,2),(132,'BK002','2019-07-03',24,2),(133,'BK003','2019-07-10',23,4),(134,'BM004','2019-07-02',25,3),(135,'BK004','2019-07-02',25,3),(136,'BM005','2019-07-03',24,10),(137,'BM006','2019-07-23',24,10),(138,'BK005','2019-07-15',24,10),(139,'BK006','2019-07-16',24,10),(140,'BM007','2019-07-10',23,10),(141,'BM008','2019-07-22',25,1),(142,'BK007','2019-07-23',25,1),(143,'BM009','2019-07-22',26,3),(144,'BM010','2019-07-22',26,2),(145,'BK008','2019-07-23',26,3);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (22,'kg'),(23,'pcs ( 380 gr )'),(24,'jrigen'),(25,'tes'),(26,'tes'),(27,'pcs');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('super_admin','admin','ceo','cfo') NOT NULL,
  `status` enum('aktif','tidak_aktif') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bad','202cb962ac59075b964b07152d234b70','super_admin','aktif'),(2,'adminseo','0e86ad6012caefcbbb768c4fc2070019','admin','aktif'),(7,'paknur','f5bb0c8de146c67b44babbf4e6584cc0','cfo','aktif'),(8,'bangaphay','f5bb0c8de146c67b44babbf4e6584cc0','ceo','aktif'),(9,'bangcatur','202cb962ac59075b964b07152d234b70','cfo','aktif'),(10,'ozi','202cb962ac59075b964b07152d234b70','admin','aktif');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-10 12:03:20
