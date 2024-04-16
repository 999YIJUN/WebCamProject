CREATE DATABASE  IF NOT EXISTS `smh_webcam_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `smh_webcam_app`;
-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'電子紙盤點','https://192.168.200.131'),(3,'其他盤點','https://192.168.200.131/smh_webcam_ap/setting/'),(5,'資產盤點','https://192.168.200.13123/'),(6,'另外盤點','https://192.168.200.131/smh_webcam_app/web/'),(7,'藥品盤點 TEST','https://192.168.200.131/'),(8,'藥品盤點TEST','https://qr.ioi.tw/zh/'),(10,'盤點TEST',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'https://qr.ioi.tw/zh/?','2023-12-04 00:00:00','2024-04-16 13:41:41'),(43,'https://192.168.200.131/smh_webcam_ap/setting/','2024-04-10 14:00:41','2024-04-11 11:10:33'),(44,'https://192.168.200.131/smh_webcam_app/web/','2024-04-10 14:01:08','2024-04-11 11:09:22'),(45,'https://192.168.200.131/','2024-04-11 08:39:37','2024-04-11 11:14:18'),(46,'https://192.168.200.13123/','2024-04-11 08:39:41','2024-04-11 11:11:43'),(54,'https://192.168.200.131','2024-04-12 15:34:53','2024-04-16 10:43:51');
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
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url_log`
--

LOCK TABLES `url_log` WRITE;
/*!40000 ALTER TABLE `url_log` DISABLE KEYS */;
INSERT INTO `url_log` VALUES (1,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(2,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(3,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(4,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(5,'123456test','0000-00-00 00:00:00'),(6,'https://qr.ioi.tw/zh/123','2023-12-04 00:00:00'),(7,'https://qr.ioi.tw/zh/123','2023-12-04 00:00:00'),(8,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(9,'https://qr.ioi.tw/zh/123666','2023-12-04 21:40:04'),(10,'123456','0000-00-00 00:00:00'),(11,'123456','0000-00-00 00:00:00'),(12,'123456','0000-00-00 00:00:00'),(13,'123456','2023-12-07 11:01:50'),(14,'123456','2023-12-07 11:02:16'),(15,'https://qr.ioi.tw/zh/123456','2023-12-07 11:09:05'),(16,'Array123456','2023-12-07 11:14:29'),(17,'123456','2023-12-07 11:16:07'),(18,'https://qr.ioi.tw/zh/123456','2023-12-07 11:21:19'),(19,'https://qr.ioi.tw/zh/123456','2023-12-07 11:24:24'),(20,'https://qr.ioi.tw/zh/999','2023-12-07 11:25:19'),(21,'https://qr.ioi.tw/zh/123456','2023-12-07 11:25:41'),(22,'https://qr.ioi.tw/zh/123456','2023-12-07 11:25:41'),(23,'https://qr.ioi.tw/zh/999','2023-12-07 11:28:00'),(24,'https://qr.ioi.tw/zh/123456','2023-12-07 11:28:33'),(25,'https://qr.ioi.tw/zh/123456','2023-12-07 11:37:17'),(26,'https://qr.ioi.tw/zh/123456','2023-12-07 11:38:03'),(27,'https://qr.ioi.tw/zh/999','2023-12-07 11:39:16'),(28,'https://qr.ioi.tw/zh/https://qr.ioi.tw/zh/11111','2023-12-11 10:39:06'),(29,'https://qr.ioi.tw/zh/11111','2023-12-11 10:40:26'),(30,'https://qr.ioi.tw/zh/11111','2023-12-11 10:40:42'),(31,'https://qr.ioi.tw/zh/123','2024-04-10 10:00:30'),(32,'https://qr.ioi.tw/zh/123','2024-04-10 10:01:21'),(33,'https://qr.ioi.tw/zh/123','2024-04-11 09:30:17'),(34,'https://qr.ioi.tw/zh/123','2024-04-11 09:30:34'),(35,'https://qr.ioi.tw/zh/123','2024-04-11 09:32:58'),(36,'https://qr.ioi.tw/zh/12345','2024-04-11 09:33:03'),(37,'https://qr.ioi.tw/zh/12345','2024-04-11 09:33:04'),(38,'https://qr.ioi.tw/zh/123','2024-04-11 09:33:07'),(39,'https://qr.ioi.tw/zh/123','2024-04-11 09:33:08'),(40,'https://qr.ioi.tw/zh/12345','2024-04-11 09:33:23'),(41,'https://qr.ioi.tw/zh/12345','2024-04-11 09:33:24'),(42,'https://qr.ioi.tw/zh/12345','2024-04-11 09:33:24'),(43,'https://qr.ioi.tw/zh/123','2024-04-11 09:35:32'),(44,'https://qr.ioi.tw/zh/123','2024-04-11 09:36:45'),(45,'https://qr.ioi.tw/zh/123','2024-04-11 09:44:43'),(46,'https://qr.ioi.tw/zh/','2024-04-11 09:45:14'),(47,'https://qr.ioi.tw/zh/123資產盤點','2024-04-11 10:06:58'),(48,'https://qr.ioi.tw/zh/12345資產盤點','2024-04-11 10:14:57'),(49,'https://192.168.200.131/smh_webcam_app/web/12345資產盤點','2024-04-11 10:19:01'),(50,'https://192.168.200.131/12345','2024-04-11 10:19:25'),(51,'https://192.168.200.131/12345','2024-04-11 10:19:26'),(52,'https://192.168.200.131/12345','2024-04-11 10:19:27'),(53,'https://192.168.200.131/smh_webcam_app/web/12345','2024-04-11 10:19:42'),(54,'https://192.168.200.13123/12345','2024-04-11 10:22:39'),(55,'https://qr.ioi.tw/zh/12345','2024-04-11 10:23:05'),(56,'https://192.168.200.131/12345','2024-04-11 10:23:29'),(57,'https://192.168.200.131/12345','2024-04-11 10:23:29'),(58,'https://192.168.200.131/smh_webcam_ap/setting/12345','2024-04-11 10:24:24'),(59,'https://192.168.200.131/12345','2024-04-11 10:24:35'),(60,'https://192.168.200.13123/12345','2024-04-11 10:25:16'),(61,'https://192.168.200.13123/12345','2024-04-11 10:25:22'),(62,'https://192.168.200.13123/12345','2024-04-11 10:25:22'),(63,'https://192.168.200.13123/12345','2024-04-11 10:25:23'),(64,'https://192.168.200.13123/12345','2024-04-11 10:25:23'),(65,'https://192.168.200.13123/12345','2024-04-11 10:25:33'),(66,'https://192.168.200.13123/12345','2024-04-11 10:25:34'),(67,'https://192.168.200.13123/12345','2024-04-11 10:25:34'),(68,'https://192.168.200.13123/12345','2024-04-11 10:25:35'),(69,'https://192.168.200.13123/12345','2024-04-11 10:25:35'),(70,'https://192.168.200.13123/12345','2024-04-11 10:25:36'),(71,'https://192.168.200.13123/12345','2024-04-11 10:25:36'),(72,'https://192.168.200.13123/12345','2024-04-11 10:25:37'),(73,'https://192.168.200.13123/123','2024-04-11 10:25:39'),(74,'https://192.168.200.13123/123','2024-04-11 10:25:39'),(75,'https://192.168.200.13123/123','2024-04-11 10:25:46'),(76,'https://192.168.200.13123/123','2024-04-11 10:37:07'),(77,'https://192.168.200.13123/123','2024-04-11 10:40:24'),(78,'https://192.168.200.13123/123','2024-04-11 10:40:48'),(79,'https://192.168.200.13123/123','2024-04-11 10:44:59'),(80,'https://192.168.200.13123/12345','2024-04-11 10:56:57'),(81,'https://192.168.200.13123/12345','2024-04-11 10:57:10'),(82,'https://qr.ioi.tw/zh/123','2024-04-12 08:34:21'),(83,'https://192.168.200.131/smh_webcam_app/web/123','2024-04-12 08:34:35'),(84,'https://192.168.200.131/123','2024-04-12 08:34:46'),(85,'https://qr.ioi.tw/zh/123','2024-04-12 10:45:16'),(86,'https://192.168.200.131/smh_webcam_ap/setting/123','2024-04-12 10:45:23'),(87,'https://qr.ioi.tw/zh/123','2024-04-12 12:00:12'),(88,'https://192.168.200.131/smh_webcam_ap/setting/123','2024-04-12 12:00:19'),(89,'123','2024-04-12 12:00:30'),(90,'123','2024-04-12 12:01:46'),(91,'https://qr.ioi.tw/zh/123','2024-04-12 12:02:21'),(92,'https://192.168.200.131/smh_webcam_app/web/12345','2024-04-12 15:27:12'),(93,'https://192.168.200.131/12345','2024-04-12 15:27:22'),(94,'123123777@12312345','2024-04-12 15:39:43'),(95,'123123777@12312345','2024-04-15 09:11:50'),(96,'https://192.168.200.131/smh_webcam_ap/setting/123','2024-04-15 16:57:36'),(97,'123123777@123123','2024-04-15 17:04:06'),(98,'https://192.168.200.131/smh_webcam_ap/setting/123','2024-04-15 17:04:17'),(99,'123123777@12312345','2024-04-16 09:28:33'),(100,'123123777@12312345','2024-04-16 09:37:22'),(101,'123123777@12312345','2024-04-16 09:37:22'),(102,'123123777@1232517231671926','2024-04-16 09:37:52'),(103,'123123777@12312345','2024-04-16 09:39:41'),(104,'123123777@12312345','2024-04-16 09:41:39'),(105,'123123777@12312345','2024-04-16 09:41:39'),(106,'123123777@12312345','2024-04-16 09:48:31'),(107,'https://192.168.200.13123/12345','2024-04-16 09:51:55'),(108,'https://192.168.200.131/smh_webcam_ap/setting/12345','2024-04-16 09:55:31'),(109,'123123777@1231234567890ABC','2024-04-16 10:08:05'),(110,'123123777@123ABC-abc-1234','2024-04-16 10:08:12'),(111,'https://192.168.200.131/smh_webcam_ap/setting/ABC-abc-1234','2024-04-16 10:08:18'),(112,'123123777@123ABC-abc-1234','2024-04-16 10:12:05'),(113,'123123777@123ABC-abc-1234','2024-04-16 10:12:28'),(114,'123123777@123ABC-abc-1234','2024-04-16 10:12:28'),(115,'123123777@123ABC-abc-1234','2024-04-16 10:12:29'),(116,'123123777@123ABC-abc-1234','2024-04-16 10:12:29'),(117,'123123777@123ABC-abc-1234','2024-04-16 10:12:30'),(118,'https://192.168.200.131/smh_webcam_ap/setting/ABC-abc-1234','2024-04-16 10:12:34'),(119,'https://192.168.200.131/smh_webcam_ap/setting/ABC-abc-1234','2024-04-16 10:12:34'),(120,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:21'),(121,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:22'),(122,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:22'),(123,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:23'),(124,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:24'),(125,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:24'),(126,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:25'),(127,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:25'),(128,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:45'),(129,'https://192.168.200.131/ABC-abc-1234','2024-04-16 10:13:45'),(130,'https://192.168.200.131/1234567890ABC','2024-04-16 10:13:55'),(131,'https://192.168.200.131/1234567890ABC','2024-04-16 10:13:55'),(132,'https://192.168.200.131/1234567890ABC','2024-04-16 10:13:56'),(133,'https://192.168.200.131/11zon','2024-04-16 10:14:11'),(134,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:14'),(135,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:14'),(136,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:15'),(137,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:16'),(138,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:16'),(139,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:17'),(140,'https://qr.ioi.tw/zh/ABC-abc-1234','2024-04-16 10:49:18'),(141,'https://192.168.200.131123','2024-04-16 11:23:22'),(142,'https://192.168.200.131123','2024-04-16 11:23:23'),(143,'https://192.168.200.131123','2024-04-16 11:23:23'),(144,'https://192.168.200.131123','2024-04-16 11:23:24'),(145,'https://192.168.200.131123','2024-04-16 11:23:24'),(146,'https://192.168.200.131123','2024-04-16 11:23:25'),(147,'https://192.168.200.131123','2024-04-16 11:23:25'),(148,'https://192.168.200.131123','2024-04-16 11:23:34'),(149,'https://192.168.200.131123','2024-04-16 11:23:34'),(150,'https://192.168.200.131123','2024-04-16 11:23:35'),(151,'https://192.168.200.131123','2024-04-16 11:23:36'),(152,'https://192.168.200.131123','2024-04-16 11:23:36'),(153,'https://192.168.200.131123','2024-04-16 11:23:37'),(154,'https://192.168.200.131123','2024-04-16 11:23:37'),(155,'https://192.168.200.131123','2024-04-16 11:23:38'),(156,'https://192.168.200.131/smh_webcam_ap/setting/ABC-1234','2024-04-16 13:37:45'),(157,'https://192.168.200.131/smh_webcam_ap/setting/ABC-1234','2024-04-16 13:37:46'),(158,'https://192.168.200.131/smh_webcam_ap/setting/ABC-1234','2024-04-16 13:37:46'),(159,'https://192.168.200.131/smh_webcam_ap/setting/12345670','2024-04-16 13:38:09'),(160,'https://192.168.200.131/smh_webcam_ap/setting/12345670','2024-04-16 13:38:10'),(161,'https://192.168.200.131/smh_webcam_ap/setting/12345670','2024-04-16 13:38:10'),(162,'https://192.168.200.131ABC-1234','2024-04-16 13:44:40'),(163,'https://192.168.200.131ABC-1234','2024-04-16 13:44:41');
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

-- Dump completed on 2024-04-16 14:18:41