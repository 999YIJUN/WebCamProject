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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'https://qr.ioi.tw/zh/12','2023-12-04 00:00:00','2023-12-06 09:51:20'),(2,'http://123123','2023-12-04 10:24:17','2023-12-04 22:50:41'),(3,'https://qr.ioi.tw/zh/123111','2023-12-04 11:00:02','2023-12-05 14:52:33'),(4,'12345111','2023-12-04 12:22:25','2023-12-04 12:22:53'),(5,'123123666@','2023-12-04 16:28:05',NULL),(6,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04',NULL),(7,'1236661','2023-12-04 22:11:45','2023-12-05 08:59:40'),(8,'test','2023-12-05 09:01:14',NULL),(9,'https://qr.ioi.tw/zh/13','2023-12-05 09:01:21','2023-12-05 14:54:22'),(10,'https://qr.ioi.tw/zh/123123','2023-12-05 09:03:05','2023-12-05 14:53:01'),(11,'webTest','2023-12-05 09:34:09',NULL),(12,'testcam','2023-12-05 09:46:27',NULL),(13,'https://qr.ioi.tw/zh/123012','2023-12-05 10:23:52','2023-12-05 14:55:47'),(14,'1231','2023-12-05 14:05:07',NULL),(15,'12345','2023-12-05 14:11:20',NULL),(16,'HTTP','2023-12-05 14:16:42',NULL),(17,'https://qr.ioi.tw/zh/12301','2023-12-05 14:17:03','2023-12-05 14:53:46'),(18,'123','2023-12-05 14:44:34',NULL),(19,'https://qr.ioi.tw/zh/123456','2023-12-05 14:45:03','2023-12-05 14:53:20');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url_log`
--

LOCK TABLES `url_log` WRITE;
/*!40000 ALTER TABLE `url_log` DISABLE KEYS */;
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

-- Dump completed on 2023-12-06 11:06:39
