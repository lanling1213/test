DROP TABLE IF EXISTS `phpcms_guestbook`;
CREATE TABLE `phpcms_guestbook` (
  `guestid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `siteid` smallint(5) unsigned DEFAULT '0',
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `title` VARCHAR(80) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL DEFAULT '',
  `introduce` text NOT NULL,
  `reply_content` TEXT NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `elite` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `passed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`guestid`),
  KEY `typeid` (`typeid`,`passed`,`listorder`,`guestid`)
) TYPE=MyISAM;