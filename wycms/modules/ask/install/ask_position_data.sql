-- ----------------------------
-- Table structure for wy_ask_position_data
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_position_data`;
CREATE TABLE `wy_ask_position_data` (
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '索引id',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '对应于wy_ask_type的typeid',
  `posid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '对应于wy_ask_position的posid',
  `data` mediumtext COMMENT '推荐内容',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `postime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐时间',
  `listorder` mediumint(8) DEFAULT '0',
  KEY `posid` (`id`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
