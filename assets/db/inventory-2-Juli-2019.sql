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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (12,'001','Kopi',17),(13,'002','Teh',16),(14,'003','Gula',15);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (36,'BM001','2019-06-04',1,1),(37,'BM002','2019-06-05',5,10),(38,'BK001','2019-06-06',1,12),(39,'BK002','2019-06-10',1,10),(40,'BK003','2019-06-20',1,10),(41,'BM003','2019-06-12',1,21),(42,'BM004','2019-06-04',5,22),(43,'BM005','2019-06-07',1,10),(44,'BM006','2019-05-29',7,10),(45,'BM007','2019-06-06',6,29),(46,'BM008','2019-05-29',6,8),(47,'BM009','2019-06-04',5,9),(49,'BK004','2019-06-11',1,121),(50,'BK004','2019-06-11',5,121),(51,'BK006','2019-06-04',1,12),(55,'BM010','2019-06-18',1,10),(56,'BM011','2019-12-06',5,12),(57,'BM012','2019-06-17',5,10),(58,'BM013','2019-06-11',1,10),(59,'BM014','2019-06-14',5,20),(65,'BM007','2019-06-06',5,10),(66,'BM016','2019-06-11',9,10),(67,'BM007','2019-07-03',9,8),(68,'BM007','2019-06-20',9,2),(69,'BM007','2019-06-15',5,12),(70,'BM007','2019-04-06',9,12),(71,'BM021','2019-06-11',9,12),(72,'BK007','2019-06-06',5,10),(73,'BK008','2019-06-26',9,10),(74,'BK009','2019-05-29',9,6),(75,'BK010','2019-05-31',9,9),(76,'BM022','2019-06-03',10,20),(77,'BK011','2019-06-18',10,5),(78,'BM023','2019-06-03',5,56),(79,'BM024','2019-07-09',12,10),(80,'BM025','2019-05-26',12,12),(81,'BM026','2019-06-11',13,12),(82,'BM027','2019-06-18',12,100);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (15,'pcs'),(16,'dus'),(17,'pack');
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
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'bad','202cb962ac59075b964b07152d234b70',1),(2,'adminseo','f5bb0c8de146c67b44babbf4e6584cc0',1),(3,'bad','202cb962ac59075b964b07152d234b70',1);
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

-- Dump completed on 2019-07-02 22:10:39
