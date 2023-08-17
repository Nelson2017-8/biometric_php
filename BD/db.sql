-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para app_biometrico
DROP DATABASE IF EXISTS `app_biometrico`;
CREATE DATABASE IF NOT EXISTS `app_biometrico` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `app_biometrico`;

-- Volcando estructura para tabla app_biometrico.huellas
DROP TABLE IF EXISTS `huellas`;
CREATE TABLE IF NOT EXISTS `huellas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) NOT NULL,
  `nombre_dedo` varchar(20) DEFAULT NULL,
  `huella` longblob DEFAULT NULL,
  `imgHuella` longblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla app_biometrico.huellas_temp
DROP TABLE IF EXISTS `huellas_temp`;
CREATE TABLE IF NOT EXISTS `huellas_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pc_serial` varchar(100) NOT NULL,
  `imgHuella` longblob DEFAULT NULL,
  `huella` longblob DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `texto` varchar(100) DEFAULT NULL,
  `statusPlantilla` varchar(100) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `dedo` varchar(20) DEFAULT NULL,
  `opc` varchar(20) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `estado_lector` varchar(20) NOT NULL DEFAULT 'inactivo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla app_biometrico.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `nombre_completo` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_crecion` timestamp NULL DEFAULT NULL,
  `pc_serial` varchar(100) DEFAULT NULL,
  `foto` longblob DEFAULT NULL,
  `ext` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
