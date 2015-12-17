<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

class ComTodoControllerTask extends ComKoowaControllerModel
{
		protected $_params;

		protected function _initialize(KObjectConfig $config)
		{
				$config->append(array(
						'formats' => array('json'),
						'behaviors' => array(
								'com:tags.controller.behavior.taggable',
								'com:activities.controller.behavior.loggable'
						)
				));

				$this->_params = JFactory::getApplication()->getMenu()->getActive()->params;

				parent::_initialize($config);
		}

		protected function _beforeRender(KControllerContextInterface $context)
    {
        $controller = $context->getSubject();
        $request = $controller->getRequest();

        $request->query->set('tag', $this->_params->get('tag'));
    }
}
