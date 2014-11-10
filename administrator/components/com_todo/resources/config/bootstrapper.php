<?php
/**
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

return array(
    'aliases' => array(
        'com://admin/todo.model.entity.activity'          => 'com:activities.model.entity.activity',
        'com://admin/todo.model.entity.activities'        => 'com:activities.model.entity.activities',
        'com://admin/todo.controller.behavior.purgeable'  => 'com:activities.controller.behavior.purgeable',
        'com://admin/todo.controller.permission.activity' => 'com:activities.controller.permission.activity',
        'com://admin/todo.controller.toolbar.activity'    => 'com:activities.controller.toolbar.activity',
        'com://admin/todo.template.helper.activity'       => 'com:activities.template.helper.activity',
        'com://admin/todo.view.activities.json'           => 'com:activities.view.activities.json',
    ),
    'identifiers' => array(
        'com://admin/todo.controller.item' => array(
            'behaviors' => array('com:activities.controller.behavior.loggable' => array('loggers' => array('com://admin/todo.activity.logger')))
        )
    )
);