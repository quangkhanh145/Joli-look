SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";

DROP DATABASE IF EXISTS jolilook;
CREATE DATABASE IF NOT EXISTS jolilook;
USE jolilook;

/*===================bảng Users===========================*/
CREATE TABLE `users`
(
	`Id` VARCHAR(5) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`password` VARCHAR(100) NOT NULL,
	PRIMARY KEY(`Id`),
	UNIQUE(`email`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*===================bảng product===========================*/
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `image_link` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;
