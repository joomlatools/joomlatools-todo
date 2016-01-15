CREATE TABLE IF NOT EXISTS `#__todo_tasks` (
  `todo_task_id` SERIAL,
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

--
-- Dumping data for table `#__todo_tasks`
--

INSERT INTO `#__todo_tasks` VALUES
  (1,'6da0ac15-5a4e-4a34-9e81-8da190d56b84','Lorem ipsum dolor sit amet','lorem-ipsum-dolor-sit-amet','<p><span style=\"color: #000000; font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet faucibus justo. Vivamus et faucibus lectus. Etiam a sapien et neque sodales iaculis. Sed suscipit aliquet lorem, at rutrum nibh aliquam sit amet. Vivamus sapien eros, porta sed arcu in, scelerisque egestas lorem. Suspendisse potenti. Fusce tempus elementum vehicula. In hac habitasse platea dictumst. Curabitur enim dui, porta nec eleifend at, sagittis non mi. Vivamus semper nisi quis lectus congue, sit amet laoreet erat mattis. Nullam at nibh vel lorem ornare pharetra id in turpis.</span></p>',1,'0000-00-00 00:00:00',0,'2014-11-17 13:02:20',951,'0000-00-00 00:00:00',0,NULL),
  (2,'1e6bade0-a5c1-4896-8623-02f43a026f5f','Utinam lobortis qualisque vis ex','utinam-lobortis-qualisque-vis-ex','<p>Utinam lobortis qualisque vis ex, ei nec doming euismod. Pro id erant scaevola moderatius, ex quo fugit molestiae. Id usu saepe instructior, ei eos mundi erroribus assueverit. Sumo veri per ne, ad quodsi omnesque has, nec te euismod voluptaria dissentiet. No alii numquam mea, audiam splendide vim at. No has quod error quidam.</p>',1,'0000-00-00 00:00:00',0,'2014-11-17 13:07:58',951,'0000-00-00 00:00:00',0,NULL),
  (3,'d923e4a3-4d51-4698-a3b6-6d1c3d3aa3da','Vis natum eleifend eu','vis-natum-eleifend-eu','<p>Vis natum eleifend eu. Vix ad meis debet feugiat, latine constituam at duo. Dico cibo cum et, ea omnesque phaedrum qui. Te vidisse delenit vim.</p>',1,'0000-00-00 00:00:00',0,'2014-11-17 13:08:19',951,'2015-11-01 01:59:16',951,NULL),
  (4,'0ef502e9-f364-40e2-8639-a4af355f19fd','Mea probo labitur in','mea-probo-labitur-in','<p>Mea probo labitur in, illum splendide reprimique eu sit. Aliquip nominavi philosophia ius te, id ius dolorum quaerendum, amet illud et vel. At quo deleniti repudiandae intellegebat, aperiri omnesque ne nam. Per consulatu prodesset at. Tacimates delicata ei has.</p>',1,'0000-00-00 00:00:00',0,'2014-11-17 13:08:47',951,'0000-00-00 00:00:00',0,NULL),
  (5,'ca7b0608-8e5f-40e0-9369-291f212cb9a5','Pro eu bonorum adversarium','pro-eu-bonorum-adversarium','<p>Pro eu bonorum adversarium, an pri duis diceret deserunt. Labores scribentur disputationi ius in. Ut qui quod mazim, ea solum democritum per. Zril aeterno appellantur vim cu, enim persecuti percipitur cu vim. Utinam soleat mentitum quo an, dico purto scripserit ne vis. Vel ei unum cetero labores, invenire salutandi principes ne sed. Ei persius indoctum sit, nonumes singulis cu sea, ut sea quaeque commune.</p>',1,'0000-00-00 00:00:00',0,'2014-11-17 13:09:03',951,'0000-00-00 00:00:00',0,NULL),
  (6,'96f4b3e1-d0a7-441c-a2d0-ea3b55250535','Hi there, here is my todo','hi-there,-here-is-my-todo','<p>Let\'s do the thing</p>',1,'0000-00-00 00:00:00',0,'2015-10-30 02:14:37',951,'0000-00-00 00:00:00',0,NULL);


CREATE TABLE IF NOT EXISTS `#__activities` (
	`activities_activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
	PRIMARY KEY(`activities_activity_id`),
	KEY `package` (`package`),
    KEY `name` (`name`),
    KEY `row` (`row`),
    KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `#__activities`
--

INSERT INTO `#__activities` VALUES
  (1,'ce3c628018f3426b8de4109b32861db3','admin','com','todo','item','add','1','Lorem ipsum dolor sit amet','created','2014-11-17 13:02:21',951,'33.33.33.1','[]'),
  (2,'0ab95c3f30ca4590a085c7843f47123b','admin','com','todo','item','add','2','Utinam lobortis qualisque vis ex','created','2014-11-17 13:07:58',951,'33.33.33.1','[]'),
  (3,'b0baa5d8f5ff4efeb063ba76717104a6','admin','com','todo','item','add','3','Vis natum eleifend eu','created','2014-11-17 13:08:19',951,'33.33.33.1','[]'),
  (4,'7334ae6d4eaa4517a0cb60fb3ee904a9','admin','com','todo','item','add','4','Mea probo labitur in','created','2014-11-17 13:08:47',951,'33.33.33.1','[]'),
  (5,'d938dd4b63454783a5d8bd14fa45e127','admin','com','todo','item','add','5','Pro eu bonorum adversarium','created','2014-11-17 13:09:03',951,'33.33.33.1','[]'),
  (6,'acbbb40d0fb2444794220260009faf5f','site','com','todo','task','add','6','Hi there, here is my todo','created','2015-10-30 02:14:38',951,'33.33.33.1','[]'),
  (7,'50de9be072ac42299777b97117ba7f47','admin','com','todo','tag','delete','1','Monkeys','deleted','2015-10-31 01:00:01',951,'33.33.33.1','[]'),
  (8,'eb82b2c61f644201a50f44a9caedbe62','admin','com','todo','tag','delete','2','Apes','deleted','2015-10-31 01:00:01',951,'33.33.33.1','[]'),
  (9,'53bd83b1e2d94e0b8f9f498418ea8925','admin','com','todo','tag','delete','3','Gorillas','deleted','2015-10-31 01:00:01',951,'33.33.33.1','[]'),
  (10,'3640fb6dbab9452c8ab90ba5c3a8f468','admin','com','todo','tag','delete','4','Orangutans','deleted','2015-10-31 01:00:01',951,'33.33.33.1','[]'),
  (11,'8a3b8efec5d04f3cbf6a3df38335e1c2','admin','com','todo','tag','add','5','Monkeys','created','2015-10-31 01:00:08',951,'33.33.33.1','[]'),
  (12,'2e4bf018e2564d29bcdea2e5ffb1b344','admin','com','todo','tag','add','6','Apes','created','2015-10-31 01:00:24',951,'33.33.33.1','[]'),
  (13,'bca1ade0111a41f58996c8613cdb0315','admin','com','todo','tag','add','7','Gorillas','created','2015-10-31 01:00:36',951,'33.33.33.1','[]'),
  (14,'0def9d135f284c4baf50b51b4e8340d0','admin','com','todo','tag','add','8','Orangutans','created','2015-10-31 01:00:44',951,'33.33.33.1','[]'),
  (15,'51460d83db0d41c182cfdf6ca53d3837','admin','com','todo','tag','add','9','Chimpanzees','created','2015-10-31 01:01:10',951,'33.33.33.1','[]'),
  (16,'605bd018d6d04227b545c09d14bcf25a','admin','com','todo','tag','add','10','Humans','created','2015-11-01 01:28:33',951,'33.33.33.1','[]'),
  (17,'4c8ca24f21ac4a5db99bf3082d551e07','admin','com','todo','task','edit','3','Vis natum eleifend eu','updated','2015-11-01 01:59:16',951,'33.33.33.1','[]');

--
-- Creating table `#__tags_tags`
--

CREATE TABLE `#__todo_tags` (
    `tags_tag_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `slug` varchar(255) NOT NULL,
    `created_by` int(10) unsigned DEFAULT NULL,
    `created_on` datetime DEFAULT NULL,
    `modified_by` int(10) unsigned DEFAULT NULL,
    `modified_on` datetime DEFAULT NULL,
    `locked_by` int(10) unsigned DEFAULT NULL,
    `locked_on` datetime DEFAULT NULL,
    `params` text NOT NULL,
    `uuid` char(36) NOT NULL,
    PRIMARY KEY (`tags_tag_id`),
    UNIQUE KEY `slug` (`slug`),
    UNIQUE KEY `title` (`title`),
    UNIQUE KEY `uuid` (`uuid`)
  ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

  --
  -- Dumping data for table `#__todo_tags`
  --

INSERT INTO `#__todo_tags` VALUES
  (5,'Monkeys','monkeys',951,'2015-10-31 01:00:08',NULL,NULL,NULL,NULL,'','f5d2aaa9-472a-47d1-adb4-81796cbf4d90'),
  (6,'Apes','apes',951,'2015-10-31 01:00:24',NULL,NULL,NULL,NULL,'','aa34f65e-e091-4d9b-a963-14d4595cf164'),
  (7,'Gorillas','gorillas',951,'2015-10-31 01:00:36',NULL,NULL,NULL,NULL,'','6025817a-3e5d-452a-ab9c-28c00d5981b5'),
  (8,'Orangutans','orangutans',951,'2015-10-31 01:00:44',NULL,NULL,NULL,NULL,'','1181d691-5f02-4f54-a430-3564e2d03aea'),
  (9,'Chimpanzees','chimpanzees',951,'2015-10-31 01:01:10',NULL,NULL,NULL,NULL,'','ba51741b-6f98-4e15-ba7c-061b63f672ff'),
  (10,'Humans','humans',951,'2015-11-01 01:28:33',NULL,NULL,NULL,NULL,'','87443e26-75d1-41a3-bfb8-5a3521c1182f'),
  (11,'Chicken','chicken',951,'2015-11-02 02:24:28',NULL,NULL,NULL,NULL,'','c34ddedb-5506-42bc-8c46-9e55aa7023d7'),
  (12,'Mice','mice',951,'2015-11-02 02:25:06',NULL,NULL,NULL,NULL,'','289065a5-58ff-43c1-b8c2-4b533564c648'),
  (13,'Ducks','ducks',951,'2015-11-02 02:27:40',NULL,NULL,NULL,NULL,'','04e0a572-3db7-452e-ba5f-de1fb72377d4'),
  (14,'Pigs','pigs',951,'2015-11-02 02:37:30',NULL,NULL,NULL,NULL,'','e8ead618-c3a8-4f45-b7bf-673f99644473');

--
-- Creating table `#__todo_tags_relations`
--

CREATE TABLE `#__todo_tags_relations` (
    `tags_tag_id` bigint(20) unsigned NOT NULL,
    `row` char(36) NOT NULL,
    PRIMARY KEY (`tags_tag_id`,`row`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `#__tags_relations` VALUES
(5,'6da0ac15-5a4e-4a34-9e81-8da190d56b84'),
(5,'ca7b0608-8e5f-40e0-9369-291f212cb9a5'),
(6,'6da0ac15-5a4e-4a34-9e81-8da190d56b84'),
(7,'6da0ac15-5a4e-4a34-9e81-8da190d56b84'),
(7,'1e6bade0-a5c1-4896-8623-02f43a026f5f'),
(7,'d923e4a3-4d51-4698-a3b6-6d1c3d3aa3da'),
(7,'ca7b0608-8e5f-40e0-9369-291f212cb9a5'),
(9,'6da0ac15-5a4e-4a34-9e81-8da190d56b84'),
(9,'1e6bade0-a5c1-4896-8623-02f43a026f5f'),
(9,'d923e4a3-4d51-4698-a3b6-6d1c3d3aa3da'),
(9,'0ef502e9-f364-40e2-8639-a4af355f19fd'),
(9,'ca7b0608-8e5f-40e0-9369-291f212cb9a5'),
(10,'6da0ac15-5a4e-4a34-9e81-8da190d56b84'),
(10,'1e6bade0-a5c1-4896-8623-02f43a026f5f'),
(10,'ca7b0608-8e5f-40e0-9369-291f212cb9a5'),
(11,'d923e4a3-4d51-4698-a3b6-6d1c3d3aa3da'),
(12,'6da0ac15-5a4e-4a34-9e81-8da190d56b84'),
(12,'ca7b0608-8e5f-40e0-9369-291f212cb9a5'),
(13,'d923e4a3-4d51-4698-a3b6-6d1c3d3aa3da'),
(13,'ca7b0608-8e5f-40e0-9369-291f212cb9a5'),
