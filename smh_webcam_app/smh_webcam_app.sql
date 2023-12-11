CREATE DATABASE  IF NOT EXISTS `smh_webcam_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `smh_webcam_app`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: smh_webcam_app
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `createtime` datetime NOT NULL,
  `modifytime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'https://qr.ioi.tw/zh/','2023-12-04 00:00:00','2023-12-07 10:18:42');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url_log`
--

DROP TABLE IF EXISTS `url_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `url_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log` varchar(200) NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url_log`
--

LOCK TABLES `url_log` WRITE;
/*!40000 ALTER TABLE `url_log` DISABLE KEYS */;
INSERT INTO `url_log` VALUES (1,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(2,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(3,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(4,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(5,'123456test','0000-00-00 00:00:00'),(6,'https://qr.ioi.tw/zh/123','2023-12-04 00:00:00'),(7,'https://qr.ioi.tw/zh/123','2023-12-04 00:00:00'),(8,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(9,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(10,'123456','0000-00-00 00:00:00'),(11,'123456','0000-00-00 00:00:00'),(12,'123456','0000-00-00 00:00:00'),(13,'123456','2023-12-07 11:01:50'),(14,'123456','2023-12-07 11:02:16'),(15,'https://qr.ioi.tw/zh/123456','2023-12-07 11:09:05'),(16,'Array123456','2023-12-07 11:14:29'),(17,'123456','2023-12-07 11:16:07'),(18,'https://qr.ioi.tw/zh/123456','2023-12-07 11:21:19'),(19,'https://qr.ioi.tw/zh/123456','2023-12-07 11:24:24'),(20,'https://qr.ioi.tw/zh/999','2023-12-07 11:25:19'),(21,'https://qr.ioi.tw/zh/123456','2023-12-07 11:25:41'),(22,'https://qr.ioi.tw/zh/123456','2023-12-07 11:25:41'),(23,'https://qr.ioi.tw/zh/999','2023-12-07 11:28:00'),(24,'https://qr.ioi.tw/zh/123456','2023-12-07 11:28:33'),(25,'https://qr.ioi.tw/zh/123456','2023-12-07 11:37:17'),(26,'https://qr.ioi.tw/zh/123456','2023-12-07 11:38:03'),(27,'https://qr.ioi.tw/zh/999','2023-12-07 11:39:16'),(28,'https://qr.ioi.tw/zh/https://qr.ioi.tw/zh/11111','2023-12-11 10:39:06'),(29,'https://qr.ioi.tw/zh/11111','2023-12-11 10:40:26'),(30,'https://qr.ioi.tw/zh/11111','2023-12-11 10:40:42');
/*!40000 ALTER TABLE `url_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-11 10:47:35
