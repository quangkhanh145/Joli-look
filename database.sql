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