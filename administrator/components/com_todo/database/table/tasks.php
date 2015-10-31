<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

class ComTodoDatabaseTableTasks extends KDatabaseTableAbstract
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'permissible',
                'lockable',
                'creatable',
                'modifiable',
                'sluggable',
                'identifiable',
                'parameterizable',
                'com:todo.database.behavior.taggable',
            ),
            'filters' => array(
                'title' => array('trim'),
                'slug' => array('trim'),
                'description' => array('trim', 'html')
            )
        ));

        parent::_initialize($config);
    }
}
