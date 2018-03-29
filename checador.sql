/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.19-MariaDB : Database - checador
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`checador` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `checador`;

/*Table structure for table `registro` */

DROP TABLE IF EXISTS `registro`;

CREATE TABLE `registro` (
  `idtablau` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidop` varchar(30) DEFAULT NULL,
  `apellidom` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `RFCempleado` varchar(20) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `nombreu` varchar(30) DEFAULT NULL,
  `contrasena` varchar(20) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idtablau`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `registro` */

insert  into `registro`(`idtablau`,`nombre`,`apellidop`,`apellidom`,`direccion`,`telefono`,`RFCempleado`,`cargo`,`nombreu`,`contrasena`,`correo`) values (1,'a','ss','b','s','s','s','s','s','s','s'),(2,'a','ss','b',NULL,NULL,'s',NULL,'s',NULL,NULL),(3,'a','ss','b',NULL,NULL,'s',NULL,'s',NULL,NULL),(4,'a','ss','b',NULL,NULL,'s',NULL,'s',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
