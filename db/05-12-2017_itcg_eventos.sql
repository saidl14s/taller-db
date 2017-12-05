-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: itcg_eventos
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) NOT NULL,
  PRIMARY KEY (`idCarrera`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,'Ing. Sistemas Computacionales');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codigos`
--

DROP TABLE IF EXISTS `codigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codigos` (
  `idCodigo` int(11) NOT NULL AUTO_INCREMENT,
  `clave` char(11) NOT NULL,
  `nota` varchar(800) NOT NULL,
  `valido` char(2) NOT NULL,
  PRIMARY KEY (`idCodigo`),
  UNIQUE KEY `clave` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codigos`
--

LOCK TABLES `codigos` WRITE;
/*!40000 ALTER TABLE `codigos` DISABLE KEYS */;
INSERT INTO `codigos` VALUES (1,'7IC-2FE-C53','','SI'),(2,'51Z-4LI-LD5','','SI'),(3,'FDH-27J-QGV','','SI'),(4,'WC1-4Z7-PCQ','','SI'),(5,'CEE-6EP-IFF','','SI'),(6,'FWE-4VB-KFA','','SI'),(7,'CAE-2AM-ZA7','','SI'),(8,'WVC-6QH-Q5C','','SI'),(9,'LSC-67M-JGL','','SI'),(10,'MCJ-41L-G97','','SI'),(11,'MPQ-29P-BBF','','SI'),(12,'QWF-4V9-AA7','','SI'),(13,'KPJ-23K-IZL','','SI'),(14,'3FJ-6CE-SBM','','SI'),(15,'9CD-41S-135','','SI'),(16,'3HH-6FC-9M3','','SI'),(17,'K5G-2FV-3VE','','SI'),(18,'Q5W-4BW-QES','','SI'),(19,'DSZ-2LH-I31','','SI'),(20,'AGK-4IB-9KB','','SI'),(21,'SKM-6WL-CLW','','SI'),(22,'V5V-2JK-WLL','','SI'),(23,'FKW-4GE-EM7','','SI'),(24,'E7F-2MJ-CML','','SI'),(25,'Z9B-6BM-CDA','','SI'),(26,'W1W-49L-19M','','SI'),(27,'HPZ-4FD-B9H','','SI'),(28,'7BC-41G-ZPV','','SI'),(29,'EWP-4ES-L5Q','','SI'),(30,'AQZ-6CH-1IH','','SI'),(31,'MDP-2BF-59V','','SI'),(32,'FPI-6LP-MP5','','SI'),(33,'9MZ-2QI-D7G','','SI'),(34,'ZZS-6Q9-KBK','','SI'),(35,'L3I-653-VHJ','','SI'),(36,'JMM-6Q7-3ES','','SI'),(37,'Z1W-6AP-Z33','','SI'),(38,'5SE-6PB-ABB','','SI'),(39,'SWJ-2SS-G7D','','SI'),(40,'JJ1-4HC-557','','SI'),(41,'JCD-6IW-SK7','','SI'),(42,'WPH-29G-EQV','','SI'),(43,'IMJ-4ZF-3BM','','SI'),(44,'ZWB-2KM-LA9','','SI'),(45,'IPF-61S-MSJ','','SI'),(46,'QM3-6DF-JF1','','SI'),(47,'FDF-6F3-E1Q','','SI'),(48,'WMB-2GZ-SKH','','SI'),(49,'MF9-2J9-KZC','','SI'),(50,'5L5-4F5-D3A','','SI'),(51,'PF7-2IV-FVS','','SI'),(52,'VHS-21V-GGP','','SI'),(53,'GVV-2JV-QH7','','SI'),(54,'Q99-69Z-CJS','','SI'),(55,'LJH-4H9-71W','','SI'),(56,'BLJ-4GP-PSF','','SI'),(57,'GMA-2HA-5BI','','SI'),(58,'WEK-6HP-QS9','','SI'),(59,'5FZ-65I-JQZ','','SI'),(60,'F9Q-6AD-JPH','','SI'),(61,'GJM-4C3-DCH','','SI'),(62,'MAV-4Z3-PZH','','SI'),(63,'3GF-67I-5HP','','SI'),(64,'QE9-6SW-CM9','','SI'),(65,'5IF-2LK-GH7','','SI'),(66,'WMW-2ZV-BWD','','SI'),(67,'L7M-2D3-GB1','','SI'),(68,'M51-4HA-15I','','SI'),(69,'LIZ-6LB-ALI','','SI'),(70,'APP-639-AHZ','','SI'),(71,'5BQ-6QP-ALW','','SI'),(72,'7CV-4DK-IG7','','SI'),(73,'3WQ-4L5-HBL','','SI'),(74,'Q7A-4LB-EJJ','','SI'),(75,'9W5-43G-G7D','','SI'),(76,'DAL-4BC-5C5','','SI'),(77,'VF9-4IV-7HM','','SI'),(78,'ZEE-65B-FM9','','SI'),(79,'ZIG-4C3-PZ5','','SI'),(81,'DF5-2KL-DZS','','SI'),(82,'11H-2FF-EJB','','SI'),(83,'JDH-2KC-LLG','','SI'),(84,'JWA-2QA-L7W','','SI'),(85,'KIS-4HP-7P3','','SI'),(86,'QE7-4Q5-CHE','','SI'),(87,'ZSL-6GL-QLB','','SI'),(88,'AJG-4QP-51P','','SI'),(89,'CGL-25I-W5F','','SI'),(90,'LAM-45M-5H1','','SI'),(91,'KVB-4DF-QQA','','SI'),(92,'W59-63S-9LI','','SI'),(93,'G3I-2II-KQC','','SI'),(94,'MA9-2EF-FZJ','','SI'),(95,'S9A-63W-IHS','','SI'),(96,'D7I-4C1-FJH','','SI'),(97,'AIG-23B-BHC','','SI'),(98,'BIV-2P9-7VZ','','SI'),(99,'M91-699-53D','','SI'),(100,'VHL-6JM-D7V','','SI'),(101,'C5K-473-GPH','','SI'),(102,'5QS-4AB-F3S','','SI'),(103,'5PS-2KZ-W97','','SI'),(104,'7IQ-2WS-IFP','','SI'),(105,'VL9-2PQ-VJV','','SI'),(106,'SSC-4AA-HIZ','','SI'),(107,'GES-4KD-1HM','','SI'),(108,'CFF-6IC-WPD','','SI'),(109,'5DV-41G-GQ1','','SI'),(111,'GQK-63K-FBH','','SI'),(112,'H9P-2AM-M19','','SI'),(113,'S79-6GG-Q9C','','SI'),(114,'EZA-2ES-FE9','','SI'),(115,'JA5-435-9FZ','','SI'),(116,'SWQ-49H-9II','','SI'),(117,'ACP-6QD-JBC','','SI'),(118,'H7G-2VJ-SIK','','SI'),(119,'ZQB-4GQ-EJ7','','SI'),(120,'D9K-21D-QV3','','SI'),(121,'3MQ-4Z9-51F','','SI'),(122,'G1H-29E-BCJ','','SI'),(123,'5EE-2QE-3VM','','SI'),(124,'KJS-2BM-AK3','','SI'),(125,'LWV-4QZ-C7I','','SI'),(126,'MVD-4ZV-DGV','','SI'),(127,'KDA-43W-QAB','','SI'),(128,'5DH-6IG-HWF','','SI'),(129,'M7L-2L7-L5L','','SI'),(130,'BJI-4W3-ZQC','','SI'),(131,'IZA-2KQ-PZC','','SI'),(132,'DGD-6AW-AZQ','','SI'),(133,'VFF-45V-15E','','SI'),(134,'3QC-4FV-SB3','','SI'),(135,'SKA-2IJ-BCE','','SI'),(136,'FME-21H-SLQ','','SI'),(137,'11S-6AE-HM1','','SI'),(138,'QKW-6L9-H1V','','SI'),(139,'KWP-67Q-37K','','SI');
/*!40000 ALTER TABLE `codigos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_log`
--

DROP TABLE IF EXISTS `history_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history_log` (
  `idHistory` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(30) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`idHistory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_log`
--

LOCK TABLES `history_log` WRITE;
/*!40000 ALTER TABLE `history_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participan`
--

DROP TABLE IF EXISTS `participan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participan` (
  `idParticipan` int(11) NOT NULL AUTO_INCREMENT,
  `idParticipante` int(11) NOT NULL,
  `idTaller` int(11) NOT NULL,
  `idCodigo` int(11) NOT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `asistencia` char(2) DEFAULT NULL,
  PRIMARY KEY (`idParticipan`),
  KEY `idParticipante` (`idParticipante`),
  KEY `idTaller` (`idTaller`),
  KEY `idCodigo` (`idCodigo`),
  CONSTRAINT `participan_ibfk_1` FOREIGN KEY (`idParticipante`) REFERENCES `participantes` (`idParticipante`),
  CONSTRAINT `participan_ibfk_2` FOREIGN KEY (`idTaller`) REFERENCES `talleres` (`idTaller`),
  CONSTRAINT `participan_ibfk_3` FOREIGN KEY (`idCodigo`) REFERENCES `codigos` (`idCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participan`
--

LOCK TABLES `participan` WRITE;
/*!40000 ALTER TABLE `participan` DISABLE KEYS */;
INSERT INTO `participan` VALUES (1,4,2,7,'2017-12-04',''),(2,5,2,3,'2017-12-04','');
/*!40000 ALTER TABLE `participan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participantes`
--

DROP TABLE IF EXISTS `participantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participantes` (
  `idParticipante` int(11) NOT NULL AUTO_INCREMENT,
  `numCtrol` char(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `credito` char(2) NOT NULL,
  PRIMARY KEY (`idParticipante`),
  UNIQUE KEY `numCtrol` (`numCtrol`),
  KEY `idCarrera` (`idCarrera`),
  CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantes`
--

LOCK TABLES `participantes` WRITE;
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
INSERT INTO `participantes` VALUES (1,'15290902','JESUS SAID LLAMAS MANRIQUEZ',1,1,''),(2,'15290930','JOSE VALDOVINOS VEGA',1,5,'on'),(3,'15290900','MDSAMDI IJSIDJFIJ IJDSIFJIJ',1,1,''),(4,'15290931','JESUS TOMAS TORRES VALDOVINOS',1,1,''),(5,'15290934','SUPER SUPER SDASD',1,1,''),(6,'15290932','JOEL RAMIREZ MONTERO',1,1,'');
/*!40000 ALTER TABLE `participantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talleres`
--

DROP TABLE IF EXISTS `talleres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talleres` (
  `idTaller` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(180) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `espacios` int(11) DEFAULT '20',
  `image` varchar(40) DEFAULT NULL,
  `blog` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTaller`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talleres`
--

LOCK TABLES `talleres` WRITE;
/*!40000 ALTER TABLE `talleres` DISABLE KEYS */;
INSERT INTO `talleres` VALUES (1,'Analisis de algoritmos','analisis-de-algoritmos-WP','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod',20,'',''),(2,'Fundamentos de bases de datos','fundamentos-de-bases-de-datos-PU','SQL Sever y MySQL',18,'','');
/*!40000 ALTER TABLE `talleres` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-04 21:17:42
