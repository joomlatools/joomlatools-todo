CREATE TABLE IF NOT EXISTS `#__todo_items` (
  `todo_item_id` SERIAL,
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

CREATE TABLE IF NOT EXISTS `#__todo_activities` (
	`todo_activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`uuid` VARCHAR(36) NOT NULL DEFAULT '' UNIQUE,
	`application` VARCHAR(10) NOT NULL DEFAULT '',
	`type` VARCHAR(3) NOT NULL DEFAULT '',
	`package` VARCHAR(50) NOT NULL DEFAULT '',
	`name` VARCHAR(50) NOT NULL DEFAULT '',
	`action` VARCHAR(50) NOT NULL DEFAULT '',
	`row` varchar(2048) NOT NULL DEFAULT '',
	`title` VARCHAR(255) NOT NULL DEFAULT '',
	`status` varchar(100) NOT NULL,
	`created_on` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_by` INT(11) NOT NULL DEFAULT '0',
	`ip` varchar(45) NOT NULL DEFAULT '',
	`metadata` text NOT NULL,
	PRIMARY KEY(`todo_activity_id`),
	KEY `package` (`package`),
    KEY `name` (`name`),
    KEY `row` (`row`),
    KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;