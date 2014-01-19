CREATE TABLE IF NOT EXISTS `#__helloworlds_helloworld` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `description` TEXT NOT NULL DEFAULT '',
  `published` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;