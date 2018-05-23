SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `#__centroseducativos`;
CREATE TABLE IF NOT EXISTS `#__centroseducativos` (
    `id` int(6) NOT NULL,
    `nombre` varchar(50) NOT NULL , 
    `direccion` varchar(100),
    `municipio` varchar(50),
    `provincia` varchar(50),
    `pais` varchar(50),
    `cp` varchar(5),
    `telefono01` varchar(15),
    `telefono02` varchar(15),
    `email` varchar(50),
    `observaciones` varchar(200),
    `fechaalta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `fechabaja` TIMESTAMP,
    `predeterminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO `#__centroseducativos` (`id`, `nombre`, `direccion`, `municipio`, `provincia`, `pais`, `cp`, `telefono01`, `telefono02`, `email`, `observaciones`, `fechaalta`, `fechabaja`, `predeterminado`) VALUES (1, 'Centro 001', 'Avda. s/n', 'Avilés', 'Principado de Asturias', 'España', '33403', '+34123456789', '+34987654321', 'hola@centro.es', 'Lorem ipsum...', CURRENT_TIMESTAMP, NULL, '0');

ALTER TABLE `#__centroseducativos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `#__centroseducativos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
