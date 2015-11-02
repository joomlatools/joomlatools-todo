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
        'com://admin/todo.controller.task' => array(
          'behaviors' => array(
              'com:activities.controller.behavior.loggable',
              'com:todo.controller.behavior.taggable'
           )
        )
    ),
    'aliases' => array(
        'com:todo.controller.behavior.taggable' => 'com:tags.controller.behavior.taggable',
        'com:todo.model.behavior.taggable' => 'com:tags.model.behavior.taggable',
        'com:todo.database.behavior.taggable' => 'com:tags.database.behavior.taggable',
        'com:todo.database.table.tags' => 'com:tags.database.table.tags'
     )
);
