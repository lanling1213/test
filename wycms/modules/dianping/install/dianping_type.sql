DROP TABLE IF EXISTS `wycms_dianping_type`;
CREATE TABLE `wycms_dianping_type` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `data` char(100) NOT NULL,
  `setting` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;