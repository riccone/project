/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50643
 Source Host           : localhost:3306
 Source Schema         : snt

 Target Server Type    : MySQL
 Target Server Version : 50643
 File Encoding         : 65001

 Date: 30/05/2019 10:02:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1557817990);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1557817995);

-- ----------------------------
-- Table structure for owners
-- ----------------------------
DROP TABLE IF EXISTS `owners`;
CREATE TABLE `owners`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `reestr_id` int(11) NULL DEFAULT NULL COMMENT 'Идентификатор реестра',
  `user_id` int(11) NULL DEFAULT NULL COMMENT 'Идентификатор пользователя',
  `ownership_share` float(20, 0) NULL DEFAULT NULL COMMENT 'Доля собственности',
  `psprt_series` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Серия паспорта',
  `psprt_given_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Кем выдан паспорт',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Номер телефона',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Электронная почта',
  `cadastral_square` float(255, 0) NULL DEFAULT NULL COMMENT 'Кадастровая площадь',
  `cadastral_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Кадастровый номер',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user2`(`user_id`) USING BTREE,
  INDEX `reestr`(`reestr_id`) USING BTREE,
  CONSTRAINT `reestr` FOREIGN KEY (`reestr_id`) REFERENCES `reestr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of owners
-- ----------------------------
INSERT INTO `owners` VALUES (4, 4, 1, 76, 'lïdÙV®d°&R38d7d6904e255622cba63d58548fd679a2a1834caac865151238666b6e4e380c8AmÛayÃVñTëÈ6«½9@7ìÓ^6}Óåù', '½Ené*rjX¶³aecefb5934b07209e540a3af86bc40474e1ceccf4f7e8c2490bf62bd659c2cdeÎÜ&ÍáÂMÄ·¾xìÇÌÒÌ\0WI\ZôÔâ>', '67676', '76767', 67676, '6767');
INSERT INTO `owners` VALUES (5, 5, 1, 8888, 'yÂÊU-Ãi 8×Â*5Çea656b0e5bbe2eb96e3ee11f3b94a88f4406208cdaa505dba002fa7896ed092f4ýÒªKf!EºÙWx¬ÿ¿\0äæ¦ù*HÍ', '0:×]¥¢·º¤²¹ eb43e86ce2da3aa0520691a1713a3a0929b72d3b1b0ddcc5c4ffc7b9e38060a3WïÙ%ØN?¤BF¼Øü§W/SåvX¯zI\'ù', '88888', '8888', 88888, '88888');

-- ----------------------------
-- Table structure for plots
-- ----------------------------
DROP TABLE IF EXISTS `plots`;
CREATE TABLE `plots`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Наименование',
  `region_id` int(11) NULL DEFAULT NULL COMMENT 'Идентификатор региона',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `region`(`name`) USING BTREE,
  INDEX `regions`(`region_id`) USING BTREE,
  CONSTRAINT `regions` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of plots
-- ----------------------------
INSERT INTO `plots` VALUES (1, 'Plot1', 1);
INSERT INTO `plots` VALUES (2, 'Plot2', 2);

-- ----------------------------
-- Table structure for reestr
-- ----------------------------
DROP TABLE IF EXISTS `reestr`;
CREATE TABLE `reestr`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `user_id` int(11) NULL DEFAULT NULL COMMENT 'Идентификатор пользователя',
  `plots_id` int(11) NULL DEFAULT NULL COMMENT 'Идентификатор участка',
  `cadastral_square` float(255, 0) NULL DEFAULT NULL COMMENT 'Кадастровая площадь',
  `cadastral_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Кадастровый номер',
  `psprt_series` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Серия паспорта',
  `psprt_given_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Кем выдан паспорт',
  `ownership_share` float(255, 0) NULL DEFAULT NULL COMMENT 'Доля собственности',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user`(`user_id`) USING BTREE,
  INDEX `plot`(`plots_id`) USING BTREE,
  CONSTRAINT `plot` FOREIGN KEY (`plots_id`) REFERENCES `plots` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reestr
-- ----------------------------
INSERT INTO `reestr` VALUES (4, 1, 2, 31232, 'da432432', 'ªWwÀ	ö2S;7157580968f92ed92275c50a682fd8f47120cc9f997aebd1016c64cc869ef1e8­u¨QËJn=#öL[\'iSÚÚ·»PT8ºsÐ', 'þÜÔÓ$mh]P@ä832da4d0c986885a8e364b43a2421072e94a7dbdc10727bcd1c1f9900a8d632a2Y`O»óþþ)zu²þòþó^qg:@õ§¢ ', 22);
INSERT INTO `reestr` VALUES (5, 1, 1, 322222, '222222', '9»Qà~­Tüæ%0\\0d260779c5bd9fcb1d94634a1c8bd029990e6ffea195a2b1a140e7c45480073fEè¾Y,.e³®¸ÝàÜÔÅÁ×aD', 'Ý ï¹vÛÒ{)¡\r977b291e714a73e598576affa9fa2243570fed9fff4c47511abb6649eb40f255Ò¡T2 Ô8&£l<Ô-4]§d#Ô»$ÿ~Ái', 332);

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES (1, 'Москва');
INSERT INTO `region` VALUES (2, 'Санкт-Петербург');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, 'admin', '-wuktMZgwNXoa36h1Q-uKNYKJXIw6F6q', '$2y$13$fIHtRP7d5IOqm5XAjqR5o.zc4Fis26AsDCQOXCBapShb1miCIzY0a', NULL, 'jahongirsaidiy@gmail.com', 10, 1557818961, 1557818961);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Имя',
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Фамилия',
  `date_of_birth` date NULL DEFAULT NULL COMMENT 'Дата рождения',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Jahongir', 'Saidiy', '0000-00-00');

SET FOREIGN_KEY_CHECKS = 1;
