<?php
/**
 * Nooku Platform - http://www.nooku.org/platform
 *
 * @copyright	Copyright (C) 2011 - 2014 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/nooku/nooku-platform
 */

/**
 * Tag Controller
 *
 * @author  Johan Janssens <http://github.com/johanjanssens>
 * @package ComTagsControllerTag
 */
class ComTodoControllerTag extends ComKoowaControllerModel
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'model' => 'com:todo.model.tags'
        ));

        //Alias the permission
        $permission = $this->getIdentifier()->toArray();
        $permission['path'] = array('controller', 'permission');

        $this->getObject('manager')->registerAlias('com:todos.controller.permission.tag', $permission);

        parent::_initialize($config);
    }

    protected function _actionRender(KControllerContextInterface $context)
    {
        $view = $this->getView();

        if($view instanceof KViewTemplate)
        {
            $layout = $view->getIdentifier()->toArray();
            $layout['name'] = $view->getLayout();
            unset($layout['path'][0]);

            $alias = $layout;
            $alias['package'] = 'todo';

            $this->getObject('manager')->registerAlias($alias, $layout);
        }

        return parent::_actionRender($context);
    }

    public function getRequest()
    {
        $request = parent::getRequest();

        //Force set the 'table' in the request
        $request->query->table  = $this->getIdentifier()->package;
        $request->data->table   = $this->getIdentifier()->package;

        return $request;
    }
}
