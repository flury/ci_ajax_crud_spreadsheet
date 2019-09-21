SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for persons
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES ('1', 'Airi', 'Satou', 'female', 'Tokyo', '1964-03-04');
INSERT INTO `persons` VALUES ('2', 'Garrett', 'Winters', 'male', 'Tokyo', '1988-09-02');
INSERT INTO `persons` VALUES ('3', 'John', 'Doe', 'male', 'Kansas', '1972-11-02');
INSERT INTO `persons` VALUES ('4', 'Tatyana', 'Fitzpatrick', 'male', 'London', '1989-01-01');
INSERT INTO `persons` VALUES ('5', 'Quinn', 'Flynn', 'male', 'Edinburgh', '1977-03-24');
