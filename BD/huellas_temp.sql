
CREATE TABLE `huellas_temp` (
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
  `user_id` int(11) DEFAULT NULL,
  `end_fingerprint` tinyint(1) DEFAULT 0,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;