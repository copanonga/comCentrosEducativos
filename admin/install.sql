SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `#__CentrosEducativos`;
CREATE TABLE IF NOT EXISTS `#__CentrosEducativos` (
  `id` int(2) NOT NULL,
  `Saludo` varchar(25) NOT NULL,
  `predeterminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `#__CentrosEducativos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `#__CentrosEducativos`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;