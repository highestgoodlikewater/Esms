/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : managementsystem

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2015-06-26 09:54:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `department`
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `manager` varchar(100) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', '研发部', '张三', '技术部门。', '激活');
INSERT INTO `department` VALUES ('2', '人事部', '李四', '管理你的部门。', '激活');
INSERT INTO `department` VALUES ('3', '财务部', '王五', '这个好，有钱花。', '激活');
INSERT INTO `department` VALUES ('4', '质量部', '赵六', '管他干什么呢。', '激活');
INSERT INTO `department` VALUES ('5', '市场部', '陈七', '做什么的呢？', '激活');
INSERT INTO `department` VALUES ('6', '企划部', '刘八', '企业规划。', '激活');
INSERT INTO `department` VALUES ('7', '无线事业部', '王不二', '这么高端的部门，没听过！', '激活');

-- ----------------------------
-- Table structure for `resource`
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `info` varchar(200) DEFAULT NULL,
  `createtime` varchar(50) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resource
-- ----------------------------
INSERT INTO `resource` VALUES ('4', '资源1', '资源000', '15-06-25 15:29:41', '正常');
INSERT INTO `resource` VALUES ('5', '资源2', '资源2', '15-06-25 15:29:51', '冻结');

-- ----------------------------
-- Table structure for `stock`
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `star` varchar(100) DEFAULT NULL,
  `col` varchar(50) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES ('1', '小米 note', '手机', '小米', '货架1', '100');
INSERT INTO `stock` VALUES ('2', '红米 note', '手机', '小米', '货架2', '500');
INSERT INTO `stock` VALUES ('3', 'Mac book', '电脑', 'Apple', '货架3', '50');

-- ----------------------------
-- Table structure for `storage`
-- ----------------------------
DROP TABLE IF EXISTS `storage`;
CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `col_1` varchar(200) DEFAULT NULL,
  `col_2` varchar(200) DEFAULT NULL,
  `col_3` varchar(200) DEFAULT NULL,
  `col_4` varchar(200) DEFAULT NULL,
  `col_5` varchar(200) DEFAULT NULL,
  `col_6` varchar(200) DEFAULT NULL,
  `remark` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of storage
-- ----------------------------
INSERT INTO `storage` VALUES ('1001', '15-06-01 10:25:03', '张三', '机械工业出版社', '货架1', 'Python学习手册', '20', '1');
INSERT INTO `storage` VALUES ('1002', '15-06-03 08:36:15', '李四', '小米科技', '货架5', '小米 note', '100', '1');
INSERT INTO `storage` VALUES ('1003', '15-06-14 09:52:24', '王五', '陈舒', '货架1', 'Python学习手册', '5', '2');
INSERT INTO `storage` VALUES ('1004', '15-06-14 11:46:25', '王五', '陈舒', '货架3', '红米 note', '3', '2');
INSERT INTO `storage` VALUES ('1005', '15-06-12 12:34:56', '李四', '陕西西安', '1003', '陈舒', '5', '3');
INSERT INTO `storage` VALUES ('1006', '15-06-13 12:30:22', '李四', '陕西西安', '1004', '陈舒', '5', '3');
INSERT INTO `storage` VALUES ('1007', '15-06-25 19:22:31', '张三', '货架2', '水杯', '10', '10', '4');
INSERT INTO `storage` VALUES ('1008', '15-06-25 19:24:10', '张三', '货架1', 'Python学习手册', '5', '5', '4');
INSERT INTO `storage` VALUES ('1009', '15-06-01 10:25:03', '李四', '小米科技', '货架3', '红米 note', '20', '1');
INSERT INTO `storage` VALUES ('1010', '15-06-12 12:34:56', '张三', '刘磊', '货架1', 'Python学习手册', '20', '2');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(100) DEFAULT NULL,
  `password` char(100) DEFAULT NULL,
  `usertype` char(100) DEFAULT NULL,
  `d_id` int(10) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `createtime` char(100) DEFAULT NULL,
  `lasttime` char(100) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  KEY `d_id` (`d_id`),
  CONSTRAINT `d_id` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'xinliuruoxi', 'ztf123245', '超级管理员', '1', 'i@ztf.me', '15-06-22 22:15:06', '15-06-26 09:54:13');
INSERT INTO `user` VALUES ('4', 'ztf', 'ztf123245', '管理员', '2', 'i@ztf.me', '15-06-22 22:15:06', '15-06-22 22:15:06');
INSERT INTO `user` VALUES ('5', 'zzg', 'zzg', '管理员', '1', 'zzg@qq.com', '15-06-24 14:29:00', '15-06-24 14:29:00');
INSERT INTO `user` VALUES ('6', 'jpb', 'jpb', '管理员', '1', 'jpb@163.com', '15-06-25 13:48:01', '15-06-25 13:48:01');
