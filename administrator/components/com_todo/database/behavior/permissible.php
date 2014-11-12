<?php
/**
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTodoDatabaseBehaviorPermissible extends KDatabaseBehaviorAbstract
{
    public function canPerform($action)
    {
        $user      = $this->getObject('user');
        $component = 'com_' . $this->getTable()->getIdentifier()->package;

        return $user->isAuthentic() && (bool)$user->authorise('core.'.$action, $component);
    }
}