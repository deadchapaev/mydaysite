/*
Navicat MySQL Data Transfer

Source Server         : mmd
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : mmd

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-01-22 22:54:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `event`
-- ----------------------------
DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL COMMENT 'ссылка на гурппу событий',
  `event` varchar(64) DEFAULT NULL COMMENT 'событие',
  `detail` varchar(2048) DEFAULT NULL COMMENT 'подробное описание события',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'дата создания',
  `eventdate` timestamp NULL DEFAULT NULL COMMENT 'на когда запланировано?',
  PRIMARY KEY (`id`),
  KEY `eventgroup_id_fk` (`groupid`),
  CONSTRAINT `eventgroup_id_fk` FOREIGN KEY (`groupid`) REFERENCES `eventgroup` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of event
-- ----------------------------
INSERT INTO `event` VALUES ('10', '0', 'Выпить водки', 'Сегодня я собираюсь выпить водки', '2014-01-22 22:49:31', '2013-11-17 22:14:55');
INSERT INTO `event` VALUES ('11', '0', 'Абырвалх', 'Ололоевич?', '2014-01-22 22:49:33', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('12', '0', 'Лытдыбр', 'Сделать записи в дневник', '2014-01-22 22:49:34', '2013-11-17 00:00:00');
INSERT INTO `event` VALUES ('13', '0', 'Превед Креведко!', 'Йа медвед', '2014-01-22 22:49:37', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('14', '0', 'Привет событие!', '', '0000-00-00 00:00:00', null);
INSERT INTO `event` VALUES ('15', '0', 'Привет, Йа пятачёг', '', '2014-01-22 22:52:43', null);
INSERT INTO `event` VALUES ('16', '0', 'Привет, Йа пятачёг', 'Это моё первое событиё', '2014-01-22 22:53:29', null);

-- ----------------------------
-- Table structure for `eventgroup`
-- ----------------------------
DROP TABLE IF EXISTS `eventgroup`;
CREATE TABLE `eventgroup` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `groupname` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`userid`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`userid`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventgroup
-- ----------------------------
INSERT INTO `eventgroup` VALUES ('0', '16', 'Чайные встречи');
INSERT INTO `eventgroup` VALUES ('1', '16', 'По работе');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `avatar` mediumblob,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bdate` date DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login_ux` (`login`),
  UNIQUE KEY `user_email_ux` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('16', 'chapa1', '123', null, null, null, '2014-01-21 21:23:54', null, 'hello1@pido.ru');
INSERT INTO `user` VALUES ('66', 'chapa', '123', null, null, null, '2014-01-21 21:23:56', null, 'hello@pido.ru');
INSERT INTO `user` VALUES ('67', 'chapaev32', '123', null, null, null, '2014-01-21 21:24:00', null, '123');
INSERT INTO `user` VALUES ('68', 'chapaev321', '123123123', null, null, null, '2014-01-21 21:43:07', null, 'chapaevcs1@mail.ru');
INSERT INTO `user` VALUES ('69', 'chapaev323', '123123123', null, null, null, '2014-01-21 21:44:03', null, 'chapaevcs3@mail.ru');
