-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: tavaratra
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absences`
--

DROP TABLE IF EXISTS `absences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absences` (
  `id_ab` int(11) NOT NULL AUTO_INCREMENT,
  `date_ab` varchar(50) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `anomalie` varchar(50) NOT NULL,
  `ab_desc` text NOT NULL,
  PRIMARY KEY (`id_ab`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absences`
--

LOCK TABLES `absences` WRITE;
/*!40000 ALTER TABLE `absences` DISABLE KEYS */;
INSERT INTO `absences` VALUES (1,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(2,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(3,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(4,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(5,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(6,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(7,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(8,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(9,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(10,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(11,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(12,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(13,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(14,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(15,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(16,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(17,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(18,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(19,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(20,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(21,'2023-12-15',49,'non justifié','autre','TARA NIDITRA NIASA'),(22,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(23,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(24,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(25,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(26,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(27,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(28,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(29,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(30,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(31,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(32,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(33,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(34,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(35,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(36,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(37,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(38,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(39,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(40,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(41,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(42,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(43,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(44,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(45,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA'),(46,'2023-12-15',76,'non justifié','autre','TSY DEBUT DU MOIS NIDITRA');
/*!40000 ALTER TABLE `absences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avances`
--

DROP TABLE IF EXISTS `avances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avances` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_date` varchar(50) NOT NULL,
  `a_nature` int(255) NOT NULL,
  `a_espece` int(255) NOT NULL,
  `id_worker` int(11) NOT NULL,
  `a_desc` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avances`
--

LOCK TABLES `avances` WRITE;
/*!40000 ALTER TABLE `avances` DISABLE KEYS */;
INSERT INTO `avances` VALUES (1,'2023-12-15',0,200000,3,'fety'),(2,'2023-12-15',0,100000,25,'fety'),(3,'2023-12-15',0,150000,19,'fety'),(4,'2023-12-15',0,100000,10,'fety'),(5,'2023-12-15',0,100000,14,'fety'),(6,'2023-12-15',0,100000,6,'fety'),(7,'2023-12-15',0,150000,5,'fety'),(8,'2023-12-15',0,100000,30,'fety'),(9,'2023-12-15',0,30000,20,'fety'),(10,'2023-12-15',0,15000,2,'fety'),(11,'2023-12-15',0,90000,64,'fety'),(12,'2023-12-15',0,50000,7,'fety'),(13,'2023-12-15',0,50000,45,'fety'),(14,'2023-12-15',0,100000,56,'FETY'),(15,'2023-12-15',0,100000,37,'FETY'),(16,'2023-12-15',0,50000,15,'FETY'),(17,'2023-12-15',0,50000,22,'FETY'),(18,'2023-12-15',0,100000,33,'FETY'),(19,'2023-12-15',0,225000,13,'FETY'),(20,'2023-12-15',0,100000,48,'FETY'),(21,'2023-12-15',0,70000,68,'FETY'),(22,'2023-12-15',0,80000,66,'FETY'),(23,'2023-12-15',0,50000,69,'FETY'),(24,'2023-12-15',0,25000,42,'FETY'),(25,'2023-12-15',0,95000,11,'FETY'),(26,'2023-12-15',0,100000,46,'FETY'),(27,'2023-12-15',0,50000,72,'FETY'),(28,'2023-12-15',0,60000,27,'FETY'),(29,'2023-12-15',0,150000,38,'FETY'),(30,'2023-12-15',0,60000,74,'FETY'),(31,'2023-12-15',0,144000,12,'FETY');
/*!40000 ALTER TABLE `avances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_depart` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (1,'ste tavaratra'),(2,'annex shop'),(3,'mahambolo');
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonctions`
--

DROP TABLE IF EXISTS `fonctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_fonction` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonctions`
--

LOCK TABLES `fonctions` WRITE;
/*!40000 ALTER TABLE `fonctions` DISABLE KEYS */;
INSERT INTO `fonctions` VALUES (1,'facturier'),(2,'magasinier'),(3,'superviseur'),(4,'controleur'),(5,'caissier(e)'),(6,'aide magasinier'),(7,'docker'),(8,'chauffeur'),(9,'cuisinière'),(10,'gardien'),(24,'stagiaire');
/*!40000 ALTER TABLE `fonctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lastsalary`
--

DROP TABLE IF EXISTS `lastsalary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lastsalary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lastsalary`
--

LOCK TABLES `lastsalary` WRITE;
/*!40000 ALTER TABLE `lastsalary` DISABLE KEYS */;
INSERT INTO `lastsalary` VALUES (1,'2023-12');
/*!40000 ALTER TABLE `lastsalary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (18,'Vixfgit@gmail.com','Brangitfox','$2y$10$qpwB0XU.VtfC9M3cF4Mnh.efPn5B.Jxkq3Y7DgmYddpp6E3vgCr1G','Admin','Activé','2023-12-25 14:55:07');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaires`
--

DROP TABLE IF EXISTS `salaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salaires` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_worker` int(11) NOT NULL,
  `salaire_reel` int(11) NOT NULL,
  `date_s` varchar(50) NOT NULL,
  `nbr_absence` int(11) NOT NULL,
  `avances` int(11) NOT NULL,
  `salaire_base` int(11) NOT NULL,
  PRIMARY KEY (`sa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaires`
--

LOCK TABLES `salaires` WRITE;
/*!40000 ALTER TABLE `salaires` DISABLE KEYS */;
INSERT INTO `salaires` VALUES (76,1,350000,'2023-12',0,0,350000),(77,2,235000,'2023-12',0,15000,250000),(78,3,350000,'2023-12',0,200000,550000),(79,4,350000,'2023-12',0,0,350000),(80,5,300000,'2023-12',0,150000,450000),(81,6,250000,'2023-12',0,100000,350000),(82,7,250000,'2023-12',0,50000,300000),(83,8,350000,'2023-12',0,0,350000),(84,9,550000,'2023-12',0,0,550000),(85,10,250000,'2023-12',0,100000,350000),(86,11,105000,'2023-12',0,95000,200000),(87,12,256000,'2023-12',0,144000,400000),(88,13,125000,'2023-12',0,225000,350000),(89,14,250000,'2023-12',0,100000,350000),(90,15,150000,'2023-12',0,50000,200000),(91,16,200000,'2023-12',0,0,200000),(92,17,200000,'2023-12',0,0,200000),(93,18,350000,'2023-12',0,0,350000),(94,19,400000,'2023-12',0,150000,550000),(95,20,220000,'2023-12',0,30000,250000),(96,21,200000,'2023-12',0,0,200000),(97,22,150000,'2023-12',0,50000,200000),(98,23,200000,'2023-12',0,0,200000),(99,24,200000,'2023-12',0,0,200000),(100,25,250000,'2023-12',0,100000,350000),(101,26,500000,'2023-12',0,0,500000),(102,27,140000,'2023-12',0,60000,200000),(103,28,1100000,'2023-12',0,0,1100000),(104,29,200000,'2023-12',0,0,200000),(105,30,350000,'2023-12',0,100000,450000),(106,31,300000,'2023-12',0,0,300000),(107,32,700000,'2023-12',0,0,700000),(108,33,500000,'2023-12',0,100000,600000),(109,34,350000,'2023-12',0,0,350000),(110,35,200000,'2023-12',0,0,200000),(111,36,200000,'2023-12',0,0,200000),(112,37,150000,'2023-12',0,100000,250000),(113,38,150000,'2023-12',0,150000,300000),(114,39,200000,'2023-12',0,0,200000),(115,40,200000,'2023-12',0,0,200000),(116,41,250000,'2023-12',0,0,250000),(117,42,325000,'2023-12',0,25000,350000),(118,43,200000,'2023-12',0,0,200000),(119,44,200000,'2023-12',0,0,200000),(120,45,150000,'2023-12',0,50000,200000),(121,46,100000,'2023-12',0,100000,200000),(122,48,200000,'2023-12',0,100000,300000),(123,49,60000,'2023-12',21,0,200000),(124,50,500000,'2023-12',0,0,500000),(125,52,300000,'2023-12',0,0,300000),(126,53,200000,'2023-12',0,0,200000),(127,54,500000,'2023-12',0,0,500000),(128,55,500000,'2023-12',0,0,500000),(129,56,150000,'2023-12',0,100000,250000),(130,57,200000,'2023-12',0,0,200000),(131,58,200000,'2023-12',0,0,200000),(132,59,250000,'2023-12',0,0,250000),(133,60,200000,'2023-12',0,0,200000),(134,61,350000,'2023-12',0,0,350000),(135,62,350000,'2023-12',0,0,350000),(136,63,300000,'2023-12',0,0,300000),(137,64,110000,'2023-12',0,90000,200000),(138,65,200000,'2023-12',0,0,200000),(139,66,120000,'2023-12',0,80000,200000),(140,67,400000,'2023-12',0,0,400000),(141,68,180000,'2023-12',0,70000,250000),(142,69,250000,'2023-12',0,50000,300000),(143,70,200000,'2023-12',0,0,200000),(144,71,50000,'2023-12',0,0,50000),(145,72,150000,'2023-12',0,50000,200000),(146,73,200000,'2023-12',0,0,200000),(147,74,200000,'2023-12',0,60000,260000),(148,75,300000,'2023-12',0,0,300000),(149,76,33333,'2023-12',25,0,200000);
/*!40000 ALTER TABLE `salaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workers` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `id_fonction` varchar(100) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `origine` varchar(100) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_depart` int(255) NOT NULL,
  `date_entree` varchar(100) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `date_ajout` varchar(50) NOT NULL,
  `salaire_base` int(11) NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-30 20:37:41
