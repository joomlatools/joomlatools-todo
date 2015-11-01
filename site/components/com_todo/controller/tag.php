<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

/**
 * Tag Controller
 *
 * @author Tom Janssens <http://github.com/tomjanssens>
 * @author Rastin Mehr <http://github.com/rmdstudio>
 * @package Component\Tags
 */
class ComTodoControllerTag extends ComTagsControllerTag
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'model' => 'com:tags.model.tags'
        ));

        //Alias the permission
        $permission = $this->getIdentifier()->toArray();
        $permission['path'] = array('controller', 'permission');

        $this->getObject('manager')->registerAlias('com:tags.controller.permission.tag', $permission);

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
            $alias['package'] = 'tags';

            $this->getObject('manager')->registerAlias($alias, $layout);
        }

        return parent::_actionRender($context);
    }
}
