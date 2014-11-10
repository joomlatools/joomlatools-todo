<?php
/**
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTodoActivityLogger extends ComActivitiesActivityLogger
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array('controller' => 'com://admin/todo.controller.activity'));
        parent::_initialize($config);
    }
}