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

ALTER TABLE `#__centroseducativos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `#__centroseducativos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


/*

CREATE TABLE `dsufhnyg_joomsanfer`.`pruebacentroseducativos` ( 
`id` INT NOT NULL , 
`nombre` VARCHAR(50) NOT NULL , 
`direccion` VARCHAR(100) NOT NULL , 
`municipio` VARCHAR(50) NOT NULL , 
`provincia` VARCHAR(50) NOT NULL , 
`pais` VARCHAR(50) NOT NULL , 
`cp` VARCHAR(5) NOT NULL , 
`telefono01` VARCHAR(15) NOT NULL , 
`telefono02` VARCHAR(15) NOT NULL , 
`email` VARCHAR(50) NOT NULL , 
`observaciones` VARCHAR(200) NOT NULL , 
`fechaalta` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
`fechabaja` TIMESTAMP NOT NULL , 
`predeterminado` INT NOT NULL DEFAULT '0' , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;
*/