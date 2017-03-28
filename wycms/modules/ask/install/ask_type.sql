-- ----------------------------
-- Table structure for wy_ask_type
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_type`;
CREATE TABLE `wy_ask_type` (
  `typeid` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增typeid',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `arrparentid` varchar(255) NOT NULL COMMENT '所有父级id',
  `child` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '判断是否有子级，0代表没有，1代表有',
  `arrchildid` mediumtext NOT NULL COMMENT '所有子级id',
  `typename` varchar(30) NOT NULL COMMENT '分类名称',
  `items` mediumint(8) NOT NULL DEFAULT '0' COMMENT '问题数量',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `setting` mediumtext NOT NULL COMMENT '当前分类设置',
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;