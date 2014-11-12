<?php
/**
 * @package    Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTodoDispatcherHttp extends ComKoowaDispatcherHttp
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'controller' => 'item',
        ));

        parent::_initialize($config);
    }

    public function getRequest()
    {
        $request = parent::getRequest();

        $query = $request->query;

        // Can't use executable behavior here as it calls getController which in turn calls this method
        if ($this->getObject('user')->authorise('core.manage', 'com_todo') !== true)
        {
            $query->enabled = 1;
        }
        else
        {
            $query->enabled = 0;
        }

        return $request;

    }
}
