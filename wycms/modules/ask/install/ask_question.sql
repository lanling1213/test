-- ----------------------------
-- Table structure for wy_ask_question
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_question`;
CREATE TABLE `wy_ask_question` (
  `questionid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增questionid',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '对应于wy_ask_type的typeid',
  `siteid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '站点id',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '提问标题',
  `content` mediumtext NOT NULL COMMENT '提问内容',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '各种状态:0待审核 1已审核 99已解决',
  `posids` varchar(20) NOT NULL DEFAULT '' COMMENT '推荐位',
  `memberid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '会员id 默认为0游客',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '称呼',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提问时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `replytime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最新回复时间',
  `comment` mediumtext NOT NULL COMMENT '备注一些信息（联系方式等等）',
  PRIMARY KEY (`questionid`),
  KEY `status` (`status`,`listorder`,`questionid`),
  KEY `listorder` (`typeid`,`status`,`listorder`,`questionid`),
  KEY `typeid` (`typeid`,`status`,`questionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;