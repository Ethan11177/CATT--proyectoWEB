/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.24-MariaDB : Database - proyecto_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`proyecto_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `proyecto_web`;

DROP TABLE IF EXISTS `alumno`;
DROP TABLE IF EXISTS `directores_sinodales`;
DROP TABLE IF EXISTS `profesor`;
DROP TABLE IF EXISTS `trabajo_terminal`;

/*Table structure for table `trabajo_terminal` */
CREATE TABLE `trabajo_terminal` (
  `ID_TT` varchar(15) NOT NULL,
  `TITULO_TT` varchar(100) NOT NULL,
  `DESCRIPCION_TT` varchar(300) NOT NULL,
  PRIMARY KEY (`ID_TT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*Data for the table `trabajo_terminal` */

/*Table structure for table `alumno` */
CREATE TABLE `alumno` (
  `BOLETA` varchar(10) NOT NULL,
  `CONTRASENA` varchar(20) DEFAULT NULL,
  `ID_TT` varchar(15) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO_PA` varchar(30) NOT NULL,
  `APELLIDO_MA` varchar(30) NOT NULL,
  `CORREO_ELECTRONICO` varchar(50) NOT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  KEY `ID_TT` (`ID_TT`),
  CONSTRAINT `ID_TT` FOREIGN KEY (`ID_TT`) REFERENCES `trabajo_terminal` (`ID_TT`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  /*Data for the table `alumno` */

/*Table structure for table `profesor` */
CREATE TABLE `profesor` (
  `CORREO_ELECTRONICO` varchar(60) NOT NULL,
  `CONTRASENA` varchar(15) NOT NULL,
  `NOMBRE` varchar(60) NOT NULL,
  `APELLIDO_PA` varchar(50) NOT NULL,
  `APELLIDO_MA` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  PRIMARY KEY (`CORREO_ELECTRONICO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*Data for the table `profesor` */

/*Data for the table `directores_sinodales` */
CREATE TABLE `directores_sinodales`(
  `ID_TT1` varchar(15) NOT NULL,
  `CORREO_ELECTRONICO1` varchar(60) NOT NULL,
  `CARGO` varchar(15) NOT NULL,
  KEY `ID_TT1` (`ID_TT1`),
  KEY `CORREO_ELECTRONICO1` (`CORREO_ELECTRONICO1`),
  CONSTRAINT `ID_TT1` FOREIGN KEY (`ID_TT1`) REFERENCES `trabajo_terminal` (`ID_TT`),
  CONSTRAINT `CORREO_ELECTRONICO1` FOREIGN KEY (`CORREO_ELECTRONICO1`) REFERENCES `profesor` (`CORREO_ELECTRONICO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*Table structure for table `profesor` */