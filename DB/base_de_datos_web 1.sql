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

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `BOLETA` varchar(10) NOT NULL COMMENT 'CHECK IF IT IS JUST NUMBER IN ANY CASE',
  `CONTRASENA` varchar(20) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO_PA` varchar(30) NOT NULL,
  `APELLIDO_MA` varchar(30) DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(50) NOT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  PRIMARY KEY (`BOLETA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `alumno` */

insert  into `alumno`(`BOLETA`,`CONTRASENA`,`NOMBRE`,`APELLIDO_PA`,`APELLIDO_MA`,`CORREO_ELECTRONICO`,`TELEFONO`) values 
('2020630533','QWERTY','ETHAN','VAQUERA','AGUILERA','JIMIMORISON03@GMAIL.COM','5546423296');

/*Table structure for table `directores` */

DROP TABLE IF EXISTS `directores`;

CREATE TABLE `directores` (
  `ID_DIRECTOR` int(10) unsigned NOT NULL,
  `CORREO_ELECTRONICO` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_DIRECTOR`),
  KEY `CORREO_ELECTRONICO_DIRECTOR` (`CORREO_ELECTRONICO`),
  CONSTRAINT `CORREO_ELECTRONICO_DIRECTOR` FOREIGN KEY (`CORREO_ELECTRONICO`) REFERENCES `profesor` (`CORREO_ELECTRONICO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `directores` */

/*Table structure for table `equipo_alumnos` */

DROP TABLE IF EXISTS `equipo_alumnos`;

CREATE TABLE `equipo_alumnos` (
  `ID_EQUIPO` int(10) NOT NULL,
  `LIDER_BOLETA` varchar(10) NOT NULL,
  `INTEGRANTE1` varchar(10) NOT NULL,
  `INTEGRANTE2` varchar(10) DEFAULT NULL,
  `INTEGRANTE3` varchar(10) DEFAULT NULL,
  `INTEGRANTE4` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_EQUIPO`),
  KEY `LIDER_BOLETA` (`LIDER_BOLETA`),
  CONSTRAINT `LIDER_BOLETA` FOREIGN KEY (`LIDER_BOLETA`) REFERENCES `alumno` (`BOLETA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `equipo_alumnos` */

/*Table structure for table `equipo_directores` */

DROP TABLE IF EXISTS `equipo_directores`;

CREATE TABLE `equipo_directores` (
  `ID_EQUIPO_DIRECTORES` int(10) unsigned NOT NULL,
  `ID_DIRECTOR1` int(10) unsigned NOT NULL,
  `ID_DIRECTOR2` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_EQUIPO_DIRECTORES`),
  KEY `ID_DIRECTOR1` (`ID_DIRECTOR1`),
  KEY `ID_DIRECTOR2` (`ID_DIRECTOR2`),
  CONSTRAINT `ID_DIRECTOR1` FOREIGN KEY (`ID_DIRECTOR1`) REFERENCES `directores` (`ID_DIRECTOR`),
  CONSTRAINT `ID_DIRECTOR2` FOREIGN KEY (`ID_DIRECTOR2`) REFERENCES `directores` (`ID_DIRECTOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `equipo_directores` */

/*Table structure for table `equipo_sinodales` */

DROP TABLE IF EXISTS `equipo_sinodales`;

CREATE TABLE `equipo_sinodales` (
  `ID_EQUIPO_SINODALES` int(10) unsigned NOT NULL,
  `ID_SINODAL1` int(10) unsigned NOT NULL,
  `ID_SINODAL2` int(10) unsigned NOT NULL,
  `ID_SINODAL3` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_EQUIPO_SINODALES`),
  KEY `ID_SINODAL1` (`ID_SINODAL1`),
  KEY `ID_SINODAL2` (`ID_SINODAL2`),
  KEY `ID_SINODAL3` (`ID_SINODAL3`),
  CONSTRAINT `ID_SINODAL1` FOREIGN KEY (`ID_SINODAL1`) REFERENCES `sinodal` (`ID_SINODAL`),
  CONSTRAINT `ID_SINODAL2` FOREIGN KEY (`ID_SINODAL2`) REFERENCES `sinodal` (`ID_SINODAL`),
  CONSTRAINT `ID_SINODAL3` FOREIGN KEY (`ID_SINODAL3`) REFERENCES `sinodal` (`ID_SINODAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `equipo_sinodales` */

/*Table structure for table `profesor` */

DROP TABLE IF EXISTS `profesor`;

CREATE TABLE `profesor` (
  `CORREO_ELECTRONICO` varchar(60) NOT NULL,
  `CONTRASENA` varchar(15) NOT NULL,
  `NOMBRE` varchar(60) NOT NULL,
  `APELLIDO_PA` varchar(50) NOT NULL,
  `APELLIDO_MA` varchar(50) DEFAULT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  PRIMARY KEY (`CORREO_ELECTRONICO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `profesor` */

/*Table structure for table `sinodal` */

DROP TABLE IF EXISTS `sinodal`;

CREATE TABLE `sinodal` (
  `ID_SINODAL` int(10) unsigned NOT NULL,
  `CORREO_ELECTRONICO` varchar(60) NOT NULL,
  PRIMARY KEY (`ID_SINODAL`),
  KEY `CORREO_ELECTRONICO_SINODAL` (`CORREO_ELECTRONICO`),
  CONSTRAINT `CORREO_ELECTRONICO_SINODAL` FOREIGN KEY (`CORREO_ELECTRONICO`) REFERENCES `profesor` (`CORREO_ELECTRONICO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sinodal` */

/*Table structure for table `trabajo_terminal` */

DROP TABLE IF EXISTS `trabajo_terminal`;

CREATE TABLE `trabajo_terminal` (
  `ID_TT` int(10) unsigned NOT NULL,
  `TITULO_TT` varchar(100) NOT NULL,
  `DESCRIPCION_TT` varchar(300) NOT NULL,
  `ID_EQUIPO_ALUMNOS` int(10) unsigned NOT NULL,
  `ID_EQUIPO_SINODALES` int(10) unsigned NOT NULL,
  `ID_EQUIPO_DIRECTORES` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID_TT`),
  KEY `ID_EQUIPO_SINODALES` (`ID_EQUIPO_SINODALES`),
  KEY `ID_EQUIPO_DIRECTORES` (`ID_EQUIPO_DIRECTORES`),
  CONSTRAINT `ID_EQUIPO_DIRECTORES` FOREIGN KEY (`ID_EQUIPO_DIRECTORES`) REFERENCES `equipo_directores` (`ID_EQUIPO_DIRECTORES`),
  CONSTRAINT `ID_EQUIPO_SINODALES` FOREIGN KEY (`ID_EQUIPO_SINODALES`) REFERENCES `equipo_sinodales` (`ID_EQUIPO_SINODALES`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `trabajo_terminal` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;