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
   'aliases' => array(
       'com://site/todo.model.behavior.taggable' => 'com:tags.model.behavior.taggable',
       'com://site/todo.database.behavior.taggable' => 'com:tags.database.behavior.taggable',
       'com://site/todo.database.table.tags' => 'com:tags.database.table.tags'
    ),

    'identifiers' => array(
        'com://site/todo.database.table.tasks' => array(
            'behaviors' => array(
                'com://site/tags.database.behavior.taggable'
            )
        )
    )
);
