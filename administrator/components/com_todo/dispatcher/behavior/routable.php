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
 * Routes requests that has view=files or routed=1 in the URL through com_files
 *
 */
class ComTodoDispatcherBehaviorRoutable extends KControllerBehaviorAbstract
{
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'container' => 'todo-attachments'
        ));

        parent::_initialize($config);
    }

    protected function _beforeDispatch(KControllerContextInterface $context)
    {
        $query = $context->request->query;

        if ($query->routed || $query->view === 'files')
        {
            $query->container = $this->getConfig()->container;

            $context->param = 'com:files.dispatcher.http';
            $this->getMixer()->execute('forward', $context);

            // Wrap the view for HTML requests for custom additions
            if ($context->getRequest()->getFormat() === 'html')
            {
                $this->getMixer()->setController('com:files.controller.file');

                $query->layout = 'wrapper';

                $this->getMixer()->execute('get', $context);
            }

            $this->send($context);

            return false;
        }
    }
}
