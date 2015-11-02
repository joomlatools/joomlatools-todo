<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

 return array(
     'identifiers' => array(
         'com://site/todo.controller.task' => array(
           'behaviors' => array(
               'com:activities.controller.behavior.loggable',
               'com://site/todo.controller.behavior.taggable'
            )
         )
     ),
     'aliases' => array(
         'com://site/todo.controller.behavior.taggable' => 'com://admin/todo.controller.behavior.taggable',
         'com://site/todo.model.behavior.taggable' => 'com://admin/todo.model.behavior.taggable',
         'com://site/todo.database.behavior.taggable' => 'com://admin/todo.database.behavior.taggable',
         'com://site/todo.database.table.tags' => 'com://admin/todo.database.table.tags'
      )
 );
