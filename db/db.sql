-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'produits'
-- 
-- ---

DROP TABLE IF EXISTS `produits`;
		
CREATE TABLE `produits` (
  `id` BIGINT NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `id_categories` INTEGER NOT NULL DEFAULT NULL,
  `nom` VARCHAR(64) NOT NULL,
  `EAN` CHAR(16) NULL DEFAULT NULL,
  `prix` DECIMAL NOT NULL DEFAULT 0,
  `description` VARCHAR(512) NULL DEFAULT NULL,
  `image` VARCHAR(256) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'categories'
-- 
-- ---

DROP TABLE IF EXISTS `categories`;
		
CREATE TABLE `categories` (
  `id` INTEGER NOT NULL AUTO_INCREMENT DEFAULT NULL,
  `nom` VARCHAR(64) NOT NULL DEFAULT 'NULL',
  `tva` DECIMAL NOT NULL DEFAULT 5.5,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `produits` ADD FOREIGN KEY (id_categories) REFERENCES `categories` (`id`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `produits` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `categories` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `produits` (`id`,`id_categories`,`nom`,`EAN`,`prix`,`description`,`image`) VALUES
-- ('','','','','','','');
-- INSERT INTO `categories` (`id`,`nom`,`tva`) VALUES
-- ('','','');