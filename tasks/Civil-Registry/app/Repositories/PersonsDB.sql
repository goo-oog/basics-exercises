-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: registry
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persons`
(
    `code`    varchar(11) NOT NULL,
    `name`    varchar(63) NOT NULL,
    `surname` varchar(63) NOT NULL,
    `gender`  varchar(1)  NOT NULL,
    `year`    varchar(4)    DEFAULT '',
    `address` varchar(63)   DEFAULT '',
    `note`    varchar(4095) DEFAULT '',
    PRIMARY KEY (`code`),
    UNIQUE KEY `register_code_uindex` (`code`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons`
    DISABLE KEYS */;
INSERT INTO `persons`
VALUES ('01123713987', 'Vaira', 'Vīķe-Freiberga', 'F', '1937', 'Rīga, Brīvības iela', 'bijusī Latvijas prezidente'),
       ('06060611666', 'Abdurahman', 'Ibn Hotab', 'M', '1906', 'Mecca', 'džins'),
       ('08078512745', 'Inese', 'Lībiņa-Egnere', 'F', '1985', 'Ādaži', 'Saeimas deputāte'),
       ('09090921999', 'Andrejs', 'Bērziņš', 'M', '2009', 'Talsi', 'pensionārs'),
       ('11119911000', 'Jānis', 'Bērziņš', 'M', '1999', 'Ērgļi', 'vidējais latvietis'),
       ('14044811709', 'Ojārs Ēriks', 'Kalniņš', 'M', '1948', 'Baltezers', 'Saeimas deputāts'),
       ('17025412789', 'Eva', 'Mārtuža', 'F', '1954', 'Saulkrasti', 'Saeimas deputāte'),
       ('18066912849', 'Dace', 'Rukšāne-Ščipčinska', 'F', '1969', 'Ogre', 'Saeimas deputāte'),
       ('18105110838', 'Janīna', 'Kursīte-Pakule', 'F', '1951', 'Salaspils', 'Saeimas deputāte'),
       ('19115511030', 'Boriss', 'Cilēvičs', 'M', '1955', 'Rīga', 'Saeimas deputāts'),
       ('22022211234', 'Vizma', 'Puķīte', 'F', '1922', 'Jūrmala', 'mirusi'),
       ('22105512976', 'Dagmāra', 'Beitnere-Le Galla', 'F', '1955', 'Rīga', 'Saeimas deputāte'),
       ('28048311758', 'Andrejs', 'Klementjevs', 'M', '1983', 'Jūrmala', 'Saeimas deputāts'),
       ('30018011290', 'Raivis', 'Dzintars', 'M', '1980', 'Rīga', 'Saeimas deputāts');
/*!40000 ALTER TABLE `persons`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2021-04-01 19:41:10
