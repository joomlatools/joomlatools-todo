<?php
/**
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTodoDatabaseTableItems extends KDatabaseTableAbstract
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
            ),

        ));

        parent::_initialize($config);
    }
}
