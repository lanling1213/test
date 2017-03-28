-- ----------------------------
-- Table structure for wy_ask_reply
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_reply`;
CREATE TABLE `wy_ask_reply` (
  `replyid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增replyid',
  `questionid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '对应于wy_ask_question的questionid',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '提问标题',
  `content` mediumtext NOT NULL COMMENT '提问内容',
  `memberid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '会员id 默认为0游客',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '称呼',
  `userid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '管理员id 默认为0游客',
  `inputtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '各种状态:0待审核 1已审核 99已解决',
  `comment` mediumtext NOT NULL COMMENT '备注一些信息（联系方式等等）',
  PRIMARY KEY (`replyid`),
  KEY `questionid` (`questionid`,`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;