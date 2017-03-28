-- ----------------------------
-- Table structure for wy_ask_setting
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_setting`;
CREATE TABLE `wy_ask_setting` (
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `setting` mediumtext NOT NULL COMMENT '当前站点全局设置'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;