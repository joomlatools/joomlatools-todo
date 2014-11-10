<?php
/**
 * @package    Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

defined('_JEXEC') or die;

if (!class_exists('Koowa'))
{
    if (!JPluginHelper::isEnabled('system', 'koowa')) {
        $error = 'This extension requires \'Nooku Framework\' to be installed and enabled';
    }

    return JFactory::getApplication()->redirect(JURI::base(), $error, 'error');
}

//Catch exceptions before Joomla does (JApplication::dispatch())
try {
    KObjectManager::getInstance()->getObject('com://admin/todo.dispatcher.http')->dispatch();
} catch(Exception $exception) {
    KObjectManager::getInstance()->getObject('exception.handler')->handleException($exception);
}