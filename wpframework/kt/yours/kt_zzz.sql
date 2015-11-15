
CREATE TABLE IF NOT EXISTS `kt_zzz_competitive_advantages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text,
  `code` varchar(30) DEFAULT NULL,
  `menu_order` int(10) NOT NULL DEFAULT '0',
  `visibility` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
