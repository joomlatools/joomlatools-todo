CREATE TABLE IF NOT EXISTS `#__tada_items` (
  `tada_item_id` SERIAL,
  `uuid` char(36) NOT NULL UNIQUE,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL UNIQUE,
  `description` longtext,
  `enabled` tinyint(1) NOT NULL default 1,
  `locked_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `locked_by` bigint(20) NOT NULL default 0,
  `created_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` bigint(20) NOT NULL default 0,
  `modified_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` bigint(20) NOT NULL default 0,
  `params` text
) DEFAULT CHARSET=utf8;