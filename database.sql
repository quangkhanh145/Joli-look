SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";

DROP DATABASE IF EXISTS jolilook;
CREATE DATABASE IF NOT EXISTS jolilook;
USE jolilook;

/*===============================bảng Users===================================*/
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
  INSERT INTO `user_seq` VALUES (NULL);
  SET NEW.id = CONCAT('TK', LPAD(LAST_INSERT_ID(), 3, '0'));
END$$
DELIMITER ;

/*==============================Bảng danh muc sản phẩm==============================*/
CREATE TABLE `danh_muc`
(
	`id` VARCHAR(5) NOT NULL,
	`tensp` VARCHAR(100),
	`loai` VARCHAR(100),
	`gioi_tinh` VARCHAR(10),
	`gia_don_trong` FLOAT,
	`gia_da_trong` FLOAT,
	`tag` VARCHAR(10),
	PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*==============================================================================*/
INSERT INTO `danh_muc` VALUES
('LO001','amaze','eyeglass','women','299.999','499.999','new'),
('LO002','imagine','eyeglass','women','299.999','499.999','new'),
('LO003','bliss','eyeglass','women','299.999','499.999','new'),
('LO004','windsor','eyeglass','women','299.999','499.999','new'),
('LO005','nadine','eyeglass','women','299.999','499.999','new'),
('LO006','glory','eyeglass','women','299.999','499.999','new'),
('LO007','nany','eyeglass','women','299.999','499.999',NULL),
('LO008','daze','eyeglass','women','299.999','499.999',NULL),
('LO009','lift','eyeglass','women','299.999','499.999',NULL),
('LO010','glow','eyeglass','women','299.999','499.999',NULL);
/*================================Bảng sản phẩm=================================*/
CREATE TABLE `san_pham`
(
	`id` VARCHAR(50) NOT NULL,
	`id_danhmuc` VARCHAR(5),
	`mau_sac` VARCHAR(30),
	`image` VARCHAR(255),
	`so_luong` INT,
	PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*==============================================================================*/
INSERT INTO `san_pham` VALUES
('SP00001','LO001','Champagne','images/eyeglasses/women/amaze/fashion-eyeglasses-women-round-clear-gold-amaze-21007-front.jpg',100),
('SP00002','LO001','Onyx','images/eyeglasses/women/amaze/fashion-eyeglasses-women-round-black-amaze-21008-front.jpg',100),
('SP00003','LO001','Rose','images/eyeglasses/women/amaze/fashion-eyeglasses-women-round-clear-pink-gold-amaze-21009-front.jpg',100),
('SP00004','LO001','Granite','images/eyeglasses/women/amaze/Amaze_Granite_Front.jpg',100),
('SP00005','LO001','Tan','images/eyeglasses/women/amaze/Amaze_Tan_Front.jpg',100),
('SP00006','LO001','Mint','images/eyeglasses/women/amaze/Amaze_Mint_Front3.jpg',100),
('SP00007','LO001','Mocha Tortoise','images/eyeglasses/women/amaze/Amaze_MochaTortoise_Front.jpg',100),

('SP00008','LO002','Rainbow Haze','images/eyeglasses/women/imagine/fashion-eyeglasses-women-cat-eye-round-clear-purple-blue-orange-pink-imagine-15251-front.jpg',100),
('SP00009','LO002','Onyx','images/eyeglasses/women/imagine/fashion-eyeglasses-women-cat-eye-round-black-imagine-15252-front.jpg',100),
('SP00010','LO002','Sepia Kiss','images/eyeglasses/women/imagine/fashion-eyeglasses-women-cat-eye-round-brown-tortoise-imagine-15314-front.jpg',100),
('SP00011','LO002','Granite','images/eyeglasses/women/imagine/Imagine-Granite-FrontN.jpg',100),
('SP00012','LO002','Pink Dust','images/eyeglasses/women/imagine/Imagine-Pink-Dust-FrontN.jpg',100),
('SP00013','LO002','Grey Metal','images/eyeglasses/women/imagine/Imagine_GreyMetal_Front.jpg',100),

('SP00014','LO003','Pink Berry','images/eyeglasses/women/bliss/Bliss_Pink_Berry_Front.jpg',100),
('SP00015','LO003','Rose Tortoise','images/eyeglasses/women/bliss/Bliss_Rose_Tortoise_Front.jpg',100),
('SP00016','LO003','lava','images/eyeglasses/women/bliss/Bliss_Lava_Front.jpg',100),
('SP00017','LO003','Blond Metal','images/eyeglasses/women/bliss/Bliss_BlondMetal_Front.jpg',100),
('SP00018','LO003','Croco','images/eyeglasses/women/bliss/Bliss_Croco_Front.jpg',100),

('SP00019','LO004','Black','images/eyeglasses/women/windsor/fashion-eyeglasses-men-women-square-black-windsor-10075-front.jpg',100),
('SP00020','LO004','Mocha Tortoise','images/eyeglasses/women/windsor/Windsor_MochaTortoise_Front.jpg',100),
('SP00021','LO004','Granite','images/eyeglasses/women/windsor/Windsor_Granite_Front.jpg',100),
('SP00022','LO004','Blond Metal','images/eyeglasses/women/windsor/Windsor_BlondMetal_Front.jpg',100),
('SP00023','LO004','Pink Metal','images/eyeglasses/women/windsor/Windsor_PinkMetal_Front.jpg',100),

('SP00024','LO005','Pitch Black','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-black-nadine-15284-front.jpg',100),
('SP00025','LO005','Pink Tortoise','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-brown-tortoise-beige-pink-nadine-15286-front.jpg',100),
('SP00026','LO005','Bingal','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-black-tortoise-gold-nadine-15287-front.jpg',100),
('SP00027','LO005','Water','images/eyeglasses/women/nadine/Nadine_Water_Front.jpg',100),
('SP00028','LO005','Oyster','images/eyeglasses/women/nadine/Nadine_Oyster_Front.jpg',100),
('SP00029','LO005','Two Tone Black','images/eyeglasses/women/nadine/Nadine_TwoToneBlack_Front.jpg',100),
('SP00030','LO005','Tone Pink','images/eyeglasses/women/nadine/Nadine_TwoTonePink_Front.jpg',100),
('SP00031','LO005','Rose','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-clear-beige-pink-nadine-15285-front.jpg',100),

('SP00032','LO006','Gold Diamond','images/eyeglasses/women/glory/Glory_GoldDiamond_Front.jpg',100),
('SP00033','LO006','Rose','images/eyeglasses/women/glory/Glory_Rose_Front.jpg',100),
('SP00034','LO006','Gold Shadow','images/eyeglasses/women/glory/Glory_GoldShadow_Front.jpg',100),

('SP00035','LO007','Black Desert','images/eyeglasses/women/nany/Nany_White_Desert_Front.jpg',100),
('SP00036','LO007','Volcano','images/eyeglasses/women/nany/Nany_Volcano_Front.jpg',100),

('SP00037','LO008','Gold Diamond','images/eyeglasses/women/daze/fashion-eyeglasses-men-women-rectangle-clear-gold-daze-21025-front.jpg',100),
('SP00038','LO008','Sepia','images/eyeglasses/women/daze/fashion-eyeglasses-men-women-rectangle-brown-tortoise-daze-21027-front.jpg',100),

('SP00039','LO009','Gold Sepia','images/eyeglasses/women/lift/fashion-eyeglasses-men-women-square-brown-tortoise-gold-lift-21023-front.jpg',100),
('SP00040','LO009','Onyx','images/eyeglasses/women/lift/fashion-eyeglasses-men-women-square-black-lift-21024-front.jpg',100),

('SP00041','LO010','Glow Diamond','images/eyeglasses/women/glow/Glow_Diamond_Front.jpg',100),
('SP00042','LO010','Pink Tortoise','images/eyeglasses/women/glow/Glow_Pink_Tortoise_Front.jpg',100);
/*================================Bảng đơn hàng=================================*/
CREATE TABLE `don_hang`
(
	`ma_don_hang` VARCHAR(50) NOT NULL,
	`tenKH` VARCHAR(100),
	`dia_chi` VARCHAR(100),
	`phone` VARCHAR(40),
	`email` VARCHAR(128),
	`tong_tien` FLOAT,
	`status` tinyint DEFAULT 0,
	PRIMARY KEY(ma_don_hang)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*==============================================================================*/

/*================================Bảng chi tiết đơn hàng=================================*/
CREATE TABLE `chi_tiet_don_hang`
(
	`ma_don_hang` VARCHAR(50),
	`id_user` VARCHAR(5),
	`ma_san_pham` VARCHAR(50),
	`loai` VARCHAR(20),
	`so_luong` int
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*==============================================================================*/