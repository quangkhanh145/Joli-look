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
	`gia_thamkhao` float,
	PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*==============================================================================*/
INSERT INTO `danh_muc` VALUES
('LO001','amaze','eyeglass','women','499.999'),
('LO002','imagine','eyeglass','women','499.999'),
('LO003','bliss','eyeglass','women','499.999'),
('LO004','windsor','eyeglass','women','499.999'),
('LO005','nadine','eyeglass','women','499.999'),
('LO006','glory','eyeglass','women','499.999'),
('LO007','nany','eyeglass','women','499.999'),
('LO008','daze','eyeglass','women','499.999'),
('LO009','lift','eyeglass','women','499.999'),
('LO010','glow','eyeglass','women','499.999');
/*================================Bảng sản phẩm=================================*/
CREATE TABLE `san_pham`
(
	`id` VARCHAR(50) NOT NULL,
	`id_loai` VARCHAR(5),
	`ten` VARCHAR(100),
	`style` VARCHAR(30),
	`image` VARCHAR(255),
	`gia` DOUBLE,
	PRIMARY KEY(`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*==============================================================================*/
INSERT INTO `san_pham` VALUES
('SP00001','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Champagne', 'Champagne','images/eyeglasses/women/amaze/fashion-eyeglasses-women-round-clear-gold-amaze-21007-front.jpg',NULL),
('SP00002','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Onyx', 'Onyx','images/eyeglasses/women/amaze/fashion-eyeglasses-women-round-black-amaze-21008-front.jpg',NULL),
('SP00003','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Rose', 'Rose','images/eyeglasses/women/amaze/fashion-eyeglasses-women-round-clear-pink-gold-amaze-21009-front.jpg',NULL),
('SP00004','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Granite', 'Granite','images/eyeglasses/women/amaze/Amaze_Granite_Front.jpg',NULL),
('SP00005','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Tan', 'Tan','images/eyeglasses/women/amaze/Amaze_Tan_Front.jpg',NULL),
('SP00006','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Mint', 'Mint','images/eyeglasses/women/amaze/Amaze_Mint_Front3.jpg',NULL),
('SP00007','LO001','Affordable Fashion Glasses Round Eyeglasses Women Amaze Mocha Tortoise', 'Tortoise','images/eyeglasses/women/amaze/Amaze_MochaTortoise_Front.jpg',NULL),

('SP00008','LO002','Affordable Fashion Glasses Cat Eye Round Eyeglasses Women Imagine Rainbow Haze', 'Rainbow Haze','images/eyeglasses/women/imagine/fashion-eyeglasses-women-cat-eye-round-clear-purple-blue-orange-pink-imagine-15251-front.jpg',NULL),
('SP00009','LO002','Affordable Fashion Glasses Cat Eye Round Eyeglasses Women Imagine Onyx', 'Onyx','images/eyeglasses/women/imagine/fashion-eyeglasses-women-cat-eye-round-black-imagine-15252-front.jpg',NULL),
('SP00010','LO002','Affordable Fashion Glasses Cat Eye Round Eyeglasses Women Imagine Sepia Kiss', 'Sepia Kiss','images/eyeglasses/women/imagine/fashion-eyeglasses-women-cat-eye-round-brown-tortoise-imagine-15314-front.jpg',NULL),
('SP00011','LO002','Affordable Fashion Glasses Cat Eye Round Eyeglasses Women Imagine Granite', 'Granite','images/eyeglasses/women/imagine/Imagine-Granite-FrontN.jpg',NULL),
('SP00012','LO002','Affordable Fashion Glasses Cat Eye Round Eyeglasses Women Imagine Pink Dust', 'Pink Dust','images/eyeglasses/women/imagine/Imagine-Pink-Dust-FrontN.jpg',NULL),
('SP00013','LO002','Affordable Fashion Glasses Cat Eye Round Eyeglasses Women Imagine Grey Metal', 'Grey Metal','images/eyeglasses/women/imagine/Imagine_GreyMetal_Front.jpg',NULL),

('SP00014','LO003','Affordable Fashion Glasses Cat Eye Eyeglasses Women Bliss Pink Berry', 'Pink Berry','images/eyeglasses/women/bliss/Bliss_Pink_Berry_Front.jpg',NULL),
('SP00015','LO003','Affordable Fashion Glasses Cat Eye Eyeglasses Women Bliss Rose Tortoise', 'Rose Tortoise','images/eyeglasses/women/bliss/Bliss_Rose_Tortoise_Front.jpg',NULL),
('SP00016','LO003','Affordable Fashion Glasses Cat Eye Eyeglasses Women Bliss lava', 'lava','images/eyeglasses/women/bliss/Bliss_Lava_Front.jpg',NULL),
('SP00017','LO003','Affordable Fashion Glasses Cat Eye Eyeglasses Women Bliss Blond Metal', 'Blond Metal','images/eyeglasses/women/bliss/Bliss_BlondMetal_Front.jpg',NULL),
('SP00018','LO003','Affordable Fashion Glasses Cat Eye Eyeglasses Women Bliss Croco', 'Croco','images/eyeglasses/women/bliss/Bliss_Croco_Front.jpg',NULL),

('SP00019','LO004','Affordable Fashion Glasses Square Eyeglasses Men Women Windsor Black', 'Black','images/eyeglasses/women/windsor/fashion-eyeglasses-men-women-square-black-windsor-10075-front.jpg',NULL),
('SP00020','LO004','Affordable Fashion Glasses Square Eyeglasses Men Women Windsor Mocha Tortoise', 'Mocha Tortoise','images/eyeglasses/women/windsor/Windsor_MochaTortoise_Front.jpg',NULL),
('SP00021','LO004','Affordable Fashion Glasses Square Eyeglasses Men Women Windsor Granite', 'Granite','images/eyeglasses/women/windsor/Windsor_Granite_Front.jpg',NULL),
('SP00022','LO004','Affordable Fashion Glasses Square Eyeglasses Men Women Windsor Blond Metal', 'Blond Metal','images/eyeglasses/women/windsor/Windsor_BlondMetal_Front.jpg',NULL),
('SP00023','LO004','Affordable Fashion Glasses Square Eyeglasses Men Women Windsor Pink Metal', 'Pink Metal','images/eyeglasses/women/windsor/Windsor_PinkMetal_Front.jpg',NULL),

('SP00024','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Pitch Black', 'Pitch Black','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-black-nadine-15284-front.jpg',NULL),
('SP00025','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Pink Tortoise', 'Pink Tortoise','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-brown-tortoise-beige-pink-nadine-15286-front.jpg',NULL),
('SP00026','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Bingal', 'Bingal','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-black-tortoise-gold-nadine-15287-front.jpg',NULL),
('SP00027','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Water', 'Water','images/eyeglasses/women/nadine/Nadine_Water_Front.jpg',NULL),
('SP00028','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Oyster', 'Oyster','images/eyeglasses/women/nadine/Nadine_Oyster_Front.jpg',NULL),
('SP00029','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Two Tone Black', 'Two Tone Black','images/eyeglasses/women/nadine/Nadine_TwoToneBlack_Front.jpg',NULL),
('SP00030','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Two Tone Pink', 'Tone Pink','images/eyeglasses/women/nadine/Nadine_TwoTonePink_Front.jpg',NULL),
('SP00031','LO005','Affordable Fashion Glasses Rectangle Round Eyeglasses Women Nadine Rose', 'Rose','images/eyeglasses/women/nadine/fashion-eyeglasses-women-rectangle-clear-beige-pink-nadine-15285-front.jpg',NULL),

('SP00032','LO006','Affordable Fashion Glasses Cat Eye Eyeglasses Women Glory Gold Diamond', 'Gold Diamond','images/eyeglasses/women/glory/Glory_GoldDiamond_Front.jpg',NULL),
('SP00033','LO006','Affordable Fashion Glasses Cat Eye Eyeglasses Women Glory Rose', 'Rose','images/eyeglasses/women/glory/Glory_Rose_Front.jpg',NULL),
('SP00034','LO006','Affordable Fashion Glasses Cat Eye Eyeglasses Women Glory Gold Shadow', 'Gold Shadow','images/eyeglasses/women/glory/Glory_GoldShadow_Front.jpg',NULL),

('SP00035','LO007','Affordable Fashion Glasses Rectangle Eyeglasses Women Nany Black Desert', 'Black Desert','images/eyeglasses/women/nany/Nany_White_Desert_Front.jpg',NULL),
('SP00036','LO007','Affordable Fashion Glasses Rectangle Eyeglasses Women Nany Volcano', 'Volcano','images/eyeglasses/women/nany/Nany_Volcano_Front.jpg',NULL),

('SP00037','LO008','Affordable Fashion Glasses Rectangle Eyeglasses Men Women Daze Gold Diamond', 'Gold Diamond','images/eyeglasses/women/daze/fashion-eyeglasses-men-women-rectangle-clear-gold-daze-21025-front.jpg',NULL),
('SP00038','LO008','Affordable Fashion Glasses Rectangle Eyeglasses Men Women Daze Sepia', 'Sepia','images/eyeglasses/women/daze/fashion-eyeglasses-men-women-rectangle-brown-tortoise-daze-21027-front.jpg',NULL),

('SP00039','LO009','Affordable Fashion Glasses Square Eyeglasses Men Women Lift Gold Sepia', 'Gold Sepia','images/eyeglasses/women/lift/fashion-eyeglasses-men-women-square-brown-tortoise-gold-lift-21023-front.jpg',NULL),
('SP00040','LO009','Affordable Fashion Glasses Square Eyeglasses Men Women Lift Onyx', 'Onyx','images/eyeglasses/women/lift/fashion-eyeglasses-men-women-square-black-lift-21024-front.jpg',NULL),

('SP00041','LO010','Affordable Fashion Glasses Round Eyeglasses Women Glow Diamond', 'Glow Diamond','images/eyeglasses/women/glow/Glow_Diamond_Front.jpg',NULL),
('SP00042','LO010','Affordable Fashion Glasses Round Eyeglasses Women Glow Pink Tortoise', 'Pink Tortoise','images/eyeglasses/women/glow/Glow_Pink_Tortoise_Front.jpg',NULL);