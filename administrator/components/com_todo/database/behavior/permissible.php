<?php
/**
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTodoDatabaseBehaviorPermissible extends KDatabaseBehaviorAbstract
{
    public static $task_map = array(
        'delete'   => 'core.delete',
        'add'      => 'core.create',
        'edit'     => 'core.edit',
    );

    public function canPerform($action)
    {
        $user      = $this->getObject('user');
        $component = 'com_' . $this->getTable()->getIdentifier()->package;

        if (!$user->isAuthentic()) {
            return false;
        }

        return (bool)$user->authorise('core.'.$action, $component);
    }
}