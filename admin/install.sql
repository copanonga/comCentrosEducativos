SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `#__CentrosEducativos`;
CREATE TABLE IF NOT EXISTS `#__CentrosEducativos` (
    `id` int(2) NOT NULL,
    `nombre` varchar(50),
    `direccion` varchar(100),
    `municipio` varchar(50),
    `provincia` varchar(50),
    `pais` varchar(50),
    `cp` varchar(5),
    `telefono01` varchar(15),
    `telefono02` varchar(15),
    `email` varchar(50),
    `observaciones` varchar(200),
    `fechaalta` varchar(50),
    `fechabaja` varchar(50),
    `predeterminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `#__CentrosEducativos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `#__CentrosEducativos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;