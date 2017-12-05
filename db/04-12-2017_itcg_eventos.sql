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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codigos`
--

LOCK TABLES `codigos` WRITE;
/*!40000 ALTER TABLE `codigos` DISABLE KEYS */;
/*!40000 ALTER TABLE `codigos` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participan`
--

LOCK TABLES `participan` WRITE;
/*!40000 ALTER TABLE `participan` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participantes`
--

LOCK TABLES `participantes` WRITE;
/*!40000 ALTER TABLE `participantes` DISABLE KEYS */;
INSERT INTO `participantes` VALUES (1,'15290902','JESUS SAID LLAMAS MANRIQUEZ',1,1,''),(2,'15290930','JOSE VALDOVINOS VEGA',1,5,'on'),(3,'15290900','MDSAMDI IJSIDJFIJ IJDSIFJIJ',1,1,''),(4,'15290931','JESUS TOMAS TORRES VALDOVINOS',1,1,'');
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
INSERT INTO `talleres` VALUES (1,'Analisis de algoritmos','analisis-de-algoritmos-WP','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod',20,'',''),(2,'Fundamentos de bases de datos','fundamentos-de-bases-de-datos-PU','SQL Sever y MySQL',20,'','');
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

-- Dump completed on 2017-12-04 15:07:13
