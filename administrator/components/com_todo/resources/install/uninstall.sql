DROP TABLE IF EXISTS `#__todo_tasks`;

DROP TABLE IF EXISTS `#__activities`;

DELETE FROM `#__tags_relations` WHERE `table` = 'todo_tasks';
