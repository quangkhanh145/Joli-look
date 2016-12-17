SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";

DROP DATABASE IF EXISTS jolilook;
CREATE DATABASE IF NOT EXISTS jolilook;
USE jolilook;

/*===================bảng Users===========================*/
CREATE TABLE `user_seq`
(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `user`
(
	`id` VARCHAR(5) NOT NULL DEFAULT '0',
	`email` VARCHAR(100) NOT NULL,
	`password` VARCHAR(100) NOT NULL,
	`name` VARCHAR(100),
	PRIMARY KEY(`id`),
	UNIQUE(`email`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*==============================================================================*/

/*===================Trigger tự động tăng id cho user===========================*/
DELIMITER $$
CREATE TRIGGER `user_insert`
BEFORE INSERT ON `user`
FOR EACH ROW
BEGIN
  INSERT INTO `users_seq` VALUES (NULL);
  SET NEW.id = CONCAT('TK', LPAD(LAST_INSERT_ID(), 3, '0'));
END$$
DELIMITER ;