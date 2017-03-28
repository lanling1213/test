-- ----------------------------
-- Table structure for wy_ask_position
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_position`;
CREATE TABLE `wy_ask_position` (
  `posid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增posid',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '对应于wy_ask_type的typeid',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '推荐为名称',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `thumb` varchar(150) NOT NULL DEFAULT '' COMMENT '推荐位缩略图',
  PRIMARY KEY (`posid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;