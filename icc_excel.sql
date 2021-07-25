/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - icc_excel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`icc_excel` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `icc_excel`;

/*Table structure for table `excel` */

DROP TABLE IF EXISTS `excel`;

CREATE TABLE `excel` (
  `No` int(255) NOT NULL AUTO_INCREMENT,
  `Estacion` varchar(20) DEFAULT NULL,
  `Fecha` varchar(20) DEFAULT NULL,
  `temperatura` double DEFAULT NULL,
  `temperatura_minima` double DEFAULT NULL,
  `temperatura_maxima` double DEFAULT NULL,
  `radiacion` double DEFAULT NULL,
  `radiacion_promedio` double DEFAULT NULL,
  `humedad_relativa` double DEFAULT NULL,
  `humedad_relativa_minima` double DEFAULT NULL,
  `humedad_relativa_maxima` double DEFAULT NULL,
  `precipitacion` double DEFAULT NULL,
  `velocidad_viento` double DEFAULT NULL,
  `velocidad_viento_minima` double DEFAULT NULL,
  `velocidad_viento_maxima` double DEFAULT NULL,
  `mojadura` double DEFAULT NULL,
  `presion_atmosferica` double DEFAULT NULL,
  `presion_atmosferica_minima` double DEFAULT NULL,
  `presion_atmosferica_maxima` double DEFAULT NULL,
  `direccion_viento` double DEFAULT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MyISAM AUTO_INCREMENT=7105 DEFAULT CHARSET=utf8;

/*Data for the table `excel` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
