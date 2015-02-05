<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

class ComTodoControllerToolbarTask extends ComKoowaControllerToolbarActionbar
{
    protected function _afterBrowse(KControllerContextInterface $context)
    {
        parent::_afterBrowse($context);

        $controller = $this->getController();

        $this->addSeparator();
        $this->addPublish(array('allowed' => $controller->canEdit()));
        $this->addUnpublish(array('allowed' => $controller->canEdit()));

        $this->addSeparator()->addExport();

        if ($controller->canAdmin()) {
            $this->addSeparator()->addOptions();
        }

    }

    protected function _commandExport(KControllerToolbarCommand $command)
    {
        $url = 'format=csv';

        if (version_compare(JVERSION, '3.0', '>=')) {
            $command->icon = 'icon-download';
        }

        $command->attribs->href = $this->getController()->getView()->getRoute($url, false, false);

        $this->_commandDialog($command);
    }

}
