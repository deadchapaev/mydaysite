/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : mmd

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-01-25 09:30:01
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
  CONSTRAINT `eventgroup_id_fk` FOREIGN KEY (`groupid`) REFERENCES `eventgroup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of event
-- ----------------------------
INSERT INTO `event` VALUES ('10', '0', 'Выпить водки', 'Сегодня я собираюсь выпить водки', '2014-01-23 22:02:03', '2013-11-17 22:14:55');
INSERT INTO `event` VALUES ('11', '0', 'Абырвалх', 'Ололоевич?', '2014-01-23 22:02:04', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('12', '0', 'Лытдыбр', 'Сделать записи в дневник', '2014-01-23 22:02:05', '2013-11-17 00:00:00');
INSERT INTO `event` VALUES ('13', '0', 'Превед Креведко!', 'Йа медвед', '2014-01-23 22:02:08', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('14', '0', 'Привет событие!', '', '2014-01-24 08:24:16', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('15', '0', 'Привет, Йа пятачёг', '', '2014-01-24 08:24:17', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('16', '3', 'Привет, Йа пятачёг', 'Это моё первое событиё', '2014-01-24 08:24:17', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('17', '3', 'Привет, Йа пятачёг', 'Это моё первое событиё', '2014-01-24 08:24:18', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('18', '3', 'Я Чапай', 'Текст получай!', '2014-01-24 08:24:18', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('19', '3', 'Привет событие!', 'фывафывфыв', '2014-01-24 08:24:19', '2013-11-17 23:00:36');
INSERT INTO `event` VALUES ('43', '3', 'Привет! Я правильное событие без кукисов!', 'А вот мой первый текст!', '2014-01-24 08:24:20', '2013-11-17 23:00:36');

-- ----------------------------
-- Table structure for `eventgroup`
-- ----------------------------
DROP TABLE IF EXISTS `eventgroup`;
CREATE TABLE `eventgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `groupname` varchar(64) DEFAULT NULL,
  `detail` varchar(2048) DEFAULT NULL COMMENT 'подробное описание события',
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`userid`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventgroup
-- ----------------------------
INSERT INTO `eventgroup` VALUES ('0', '0', 'По работе', null);
INSERT INTO `eventgroup` VALUES ('3', '0', 'Чайные встречи', null);
INSERT INTO `eventgroup` VALUES ('5', '0', '123', '123');
INSERT INTO `eventgroup` VALUES ('6', '0', '123', '123');
INSERT INTO `eventgroup` VALUES ('7', '0', '123', '123');
INSERT INTO `eventgroup` VALUES ('8', '0', '123', '123');
INSERT INTO `eventgroup` VALUES ('9', '0', '123', '123');
INSERT INTO `eventgroup` VALUES ('10', '66', 'Привет группо!', 'Я от чапаев32!');
INSERT INTO `eventgroup` VALUES ('11', '66', 'Привет группо!', 'Я от чапаев32!');
INSERT INTO `eventgroup` VALUES ('12', '66', 'Привет группо!', 'Я от чапаев32!');

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
  `session` varchar(64) DEFAULT NULL COMMENT 'Сессия пользователя',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login_ux` (`login`),
  UNIQUE KEY `user_email_ux` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('0', '1234', '1234', null, null, null, '2014-01-25 09:07:13', null, '124', '1gnigci48i54bh2rkt2891tcn4');
INSERT INTO `user` VALUES ('66', 'chapa', '123', null, null, null, '2014-01-24 16:38:21', null, 'hello@pido.ru', 'd2rpa284ulisilhmi2s3sbi5o4');
INSERT INTO `user` VALUES ('67', 'chapaev32', '123', null, null, null, '2014-01-24 15:44:15', null, '123', '');
INSERT INTO `user` VALUES ('68', 'chapaev321', '123123123', null, null, null, '2014-01-24 15:47:50', null, 'chapaevcs1@mail.ru', null);
INSERT INTO `user` VALUES ('69', 'chapaev323', '123123123', null, null, null, '2014-01-21 21:44:03', null, 'chapaevcs3@mail.ru', null);
INSERT INTO `user` VALUES ('89', '123', '123', null, null, null, '2014-01-22 23:31:56', null, '213', null);
INSERT INTO `user` VALUES ('90', '12345', '12345', null, null, null, '2014-01-22 23:46:24', null, '12345', null);
INSERT INTO `user` VALUES ('91', 'chapa1', '123', null, null, null, '2014-01-23 22:03:48', null, 'hello1@pido.ru', null);
