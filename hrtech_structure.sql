/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : hrtech

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-12-10 13:00:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agenda_event
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event`;
CREATE TABLE `agenda_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_connection
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_connection`;
CREATE TABLE `agenda_event_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_event_id` int(11) NOT NULL,
  `agenda_event_data_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_data
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_data`;
CREATE TABLE `agenda_event_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_start` text NOT NULL,
  `time_end` text NOT NULL,
  `day` smallint(6) NOT NULL,
  `abstract` text NOT NULL,
  `location_id` text NOT NULL,
  `highlighted` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_icons
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_icons`;
CREATE TABLE `agenda_event_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon_type` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_icon_connection
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_icon_connection`;
CREATE TABLE `agenda_event_icon_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_event_id` int(11) DEFAULT NULL,
  `agenda_event_icon_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_location
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_location`;
CREATE TABLE `agenda_event_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_speakers_connection
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_speakers_connection`;
CREATE TABLE `agenda_event_speakers_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_event_id` int(11) NOT NULL,
  `speakers_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for agenda_event_title
-- ----------------------------
DROP TABLE IF EXISTS `agenda_event_title`;
CREATE TABLE `agenda_event_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_name` text,
  `agenda_event_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers
-- ----------------------------
DROP TABLE IF EXISTS `speakers`;
CREATE TABLE `speakers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_company
-- ----------------------------
DROP TABLE IF EXISTS `speakers_company`;
CREATE TABLE `speakers_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` text NOT NULL,
  `company_url` text NOT NULL,
  `company_bio` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_company_connection
-- ----------------------------
DROP TABLE IF EXISTS `speakers_company_connection`;
CREATE TABLE `speakers_company_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) NOT NULL,
  `speakers_company_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_image
-- ----------------------------
DROP TABLE IF EXISTS `speakers_image`;
CREATE TABLE `speakers_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) NOT NULL,
  `image_name` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_links
-- ----------------------------
DROP TABLE IF EXISTS `speakers_links`;
CREATE TABLE `speakers_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) NOT NULL,
  `speakers_link_types_id` int(11) NOT NULL,
  `link_url` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_link_types
-- ----------------------------
DROP TABLE IF EXISTS `speakers_link_types`;
CREATE TABLE `speakers_link_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_name
-- ----------------------------
DROP TABLE IF EXISTS `speakers_name`;
CREATE TABLE `speakers_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `speakers_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_order
-- ----------------------------
DROP TABLE IF EXISTS `speakers_order`;
CREATE TABLE `speakers_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_personal
-- ----------------------------
DROP TABLE IF EXISTS `speakers_personal`;
CREATE TABLE `speakers_personal` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `bio_important` text NOT NULL,
  `bio` text NOT NULL,
  `tag` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_personal_connection
-- ----------------------------
DROP TABLE IF EXISTS `speakers_personal_connection`;
CREATE TABLE `speakers_personal_connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) NOT NULL,
  `speakers_data_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `speakers_id` (`speakers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for speakers_status
-- ----------------------------
DROP TABLE IF EXISTS `speakers_status`;
CREATE TABLE `speakers_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `speakers_id` int(11) DEFAULT NULL,
  `speakers_status_id` tinyint(4) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
