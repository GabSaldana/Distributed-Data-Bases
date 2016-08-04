-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: farmapro_db
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `administration`
--

DROP TABLE IF EXISTS `administration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration` (
  `idAdministration` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `shape` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAdministration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration`
--

LOCK TABLES `administration` WRITE;
/*!40000 ALTER TABLE `administration` DISABLE KEYS */;
INSERT INTO `administration` VALUES (1,'Oral','Encapsulado');
INSERT INTO `administration` VALUES (2,'Oral','Pastilla');
INSERT INTO `administration` VALUES (3,'Oral','Emulsion');
INSERT INTO `administration` VALUES (4,'Intramuscular','liquida');
INSERT INTO `administration` VALUES (5,'Rectal','Encapsulado');
INSERT INTO `administration` VALUES (6,'Topica','Crema');
/*!40000 ALTER TABLE `administration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratory`
--

DROP TABLE IF EXISTS `laboratory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratory` (
  `idLaboratory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `timeStart` time DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  `User_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idLaboratory`,`User_idUser`),
  KEY `fk_Laboratory_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_Laboratory_User1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratory`
--

LOCK TABLES `laboratory` WRITE;
/*!40000 ALTER TABLE `laboratory` DISABLE KEYS */;
INSERT INTO `laboratory` VALUES (1,'Pfizer, S.a. de C.v.','oiferoif','pijfperij','01 55 5081 8500','09:30:00','21:00:00','L,M,R,J,V,S',2);
INSERT INTO `laboratory` VALUES (2,'Bayer De México','jpewwp','pwefjpe','01 55 5736 1206','09:30:00','20:00:00','L,M,R,J,V,S',4);
INSERT INTO `laboratory` VALUES (3,'Chopo','Mexico, D.F.','Blvd. Miguel de Cervantes Saavedra 259','01 55 5081 8500','07:00:00','15:30:00','L,M,R,J,V',6);
INSERT INTO `laboratory` VALUES (6,'ESCOM','Aguascalientes','Av de los maestros','5976234671','07:00:00','17:00:00','LMRJV',8);
/*!40000 ALTER TABLE `laboratory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicine` (
  `idMedicine` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `Laboratory_idLaboratory` int(11) NOT NULL,
  PRIMARY KEY (`idMedicine`,`Laboratory_idLaboratory`),
  KEY `fk_Medicine_Laboratory1_idx` (`Laboratory_idLaboratory`),
  CONSTRAINT `fk_Medicine_Laboratory1` FOREIGN KEY (`Laboratory_idLaboratory`) REFERENCES `laboratory` (`idLaboratory`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicine`
--

LOCK TABLES `medicine` WRITE;
/*!40000 ALTER TABLE `medicine` DISABLE KEYS */;
INSERT INTO `medicine` VALUES (1,'Paracetamol',100,1);
INSERT INTO `medicine` VALUES (2,'Nimesulida',300,2);
INSERT INTO `medicine` VALUES (3,'Kaomycin',180,3);
INSERT INTO `medicine` VALUES (4,'amikacina',58,1);
INSERT INTO `medicine` VALUES (5,'senosian',80,2);
INSERT INTO `medicine` VALUES (6,'Ipratropium',100,3);
/*!40000 ALTER TABLE `medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacy`
--

DROP TABLE IF EXISTS `pharmacy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacy` (
  `idPharmacy` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `timeStart` time DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  `User_idUser` int(11) NOT NULL,
  PRIMARY KEY (`idPharmacy`,`User_idUser`),
  KEY `fk_Pharmacy_User1_idx` (`User_idUser`),
  CONSTRAINT `fk_Pharmacy_User1` FOREIGN KEY (`User_idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy`
--

LOCK TABLES `pharmacy` WRITE;
/*!40000 ALTER TABLE `pharmacy` DISABLE KEYS */;
INSERT INTO `pharmacy` VALUES (1,'San Pablo','Mexico, D.F.','pfrep','01 55 5736 1206','08:00:00','16:30:00','L,M,R,J,V,S,D',1);
INSERT INTO `pharmacy` VALUES (2,'Similar','oshodsi','dpijw ','dijeprf ','07:00:00','19:49:00','L,M,R,J,V,S,D',3);
INSERT INTO `pharmacy` VALUES (3,'Benavides','Mexico, D.F.','Av. Aquiles Serdán 358, Las Trancas, Tierra N','01 55 5736 1206','07:00:00','16:30:00','L,M,R,J,V,S',5);
INSERT INTO `pharmacy` VALUES (4,'ESCOM','Estado de MÃ©xico','Prado Vallejo','50167452','03:39:00','15:00:00','LMRJVS',7);
/*!40000 ALTER TABLE `pharmacy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pharmacy_has_medicine`
--

DROP TABLE IF EXISTS `pharmacy_has_medicine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pharmacy_has_medicine` (
  `idPharmacy` int(11) NOT NULL,
  `idMedicine` int(11) NOT NULL,
  PRIMARY KEY (`idPharmacy`,`idMedicine`),
  KEY `fk_Pharmacy_has_Medicine_Medicine1_idx` (`idMedicine`),
  KEY `fk_Pharmacy_has_Medicine_Pharmacy1_idx` (`idPharmacy`),
  CONSTRAINT `fk_Pharmacy_has_Medicine_Medicine1` FOREIGN KEY (`idMedicine`) REFERENCES `medicine` (`idMedicine`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pharmacy_has_Medicine_Pharmacy1` FOREIGN KEY (`idPharmacy`) REFERENCES `pharmacy` (`idPharmacy`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pharmacy_has_medicine`
--

LOCK TABLES `pharmacy_has_medicine` WRITE;
/*!40000 ALTER TABLE `pharmacy_has_medicine` DISABLE KEYS */;
INSERT INTO `pharmacy_has_medicine` VALUES (3,1);
INSERT INTO `pharmacy_has_medicine` VALUES (2,2);
INSERT INTO `pharmacy_has_medicine` VALUES (1,3);
INSERT INTO `pharmacy_has_medicine` VALUES (2,4);
INSERT INTO `pharmacy_has_medicine` VALUES (3,5);
INSERT INTO `pharmacy_has_medicine` VALUES (1,6);
/*!40000 ALTER TABLE `pharmacy_has_medicine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentation` (
  `idPresentation` int(11) NOT NULL,
  `unitPresentation` varchar(45) DEFAULT NULL,
  `quantityPresentation` varchar(45) DEFAULT NULL,
  `idAdministration` int(11) NOT NULL,
  `Medicine_idMedicine` int(11) NOT NULL,
  `Medicine_Laboratory_idLaboratory` int(11) NOT NULL,
  PRIMARY KEY (`idPresentation`,`idAdministration`,`Medicine_idMedicine`,`Medicine_Laboratory_idLaboratory`),
  KEY `fk_Presentation_Administration_idx` (`idAdministration`),
  KEY `fk_Presentation_Medicine1_idx` (`Medicine_idMedicine`,`Medicine_Laboratory_idLaboratory`),
  CONSTRAINT `fk_Presentation_Administration` FOREIGN KEY (`idAdministration`) REFERENCES `administration` (`idAdministration`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Presentation_Medicine1` FOREIGN KEY (`Medicine_idMedicine`, `Medicine_Laboratory_idLaboratory`) REFERENCES `medicine` (`idMedicine`, `Laboratory_idLaboratory`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentation`
--

LOCK TABLES `presentation` WRITE;
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` VALUES (1,'ml','300',3,3,3);
INSERT INTO `presentation` VALUES (2,'gr','100',2,1,1);
INSERT INTO `presentation` VALUES (3,'gr','50',6,2,2);
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Gabs','Gabs','ela.ri.bag@gmail.com',1);
INSERT INTO `user` VALUES (2,'Richi','Richi','digital.oxsgmail.com',2);
INSERT INTO `user` VALUES (3,'Saul','Saul','asodihs',1);
INSERT INTO `user` VALUES (4,'jair','jair','pipewosnc',2);
INSERT INTO `user` VALUES (5,'Ivo','Ivo','ivo@hotmail.com',1);
INSERT INTO `user` VALUES (6,'Gomy','Gomy','Gommy@outlook.com',2);
INSERT INTO `user` VALUES (7,'Gabriela','Gabs','ela.ri.bag@gmail.com',1);
INSERT INTO `user` VALUES (8,'Lab','lab','lab@gmail.com',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-03 20:21:59
