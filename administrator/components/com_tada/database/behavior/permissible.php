<?php
/**
 * @package     Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTadaDatabaseBehaviorPermissible extends KDatabaseBehaviorAbstract
{
    public static $task_map = array(
        'delete'   => 'core.delete',
        'add'      => 'core.create',
        'edit'     => 'core.edit',
    );

    public function canPerform($action)
    {
        return false;
    }
}