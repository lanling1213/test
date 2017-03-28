-- ----------------------------
-- Table structure for wy_ask_question_hits
-- ----------------------------
DROP TABLE IF EXISTS `wy_ask_question_hits`;
CREATE TABLE `wy_ask_question_hits` (
  `hitsid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增hitsid',
  `questionid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '对应于wy_ask_questionid的questionid',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '问题点击次数',
  `replys` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '问题回复次数',
  PRIMARY KEY (`hitsid`),
  KEY `questionid` (`questionid`,`hits`,`replys`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
