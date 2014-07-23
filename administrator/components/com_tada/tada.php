<?php
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

defined('_JEXEC') or die;

if (!class_exists('Koowa'))
{
    if (!file_exists(JPATH_ADMINISTRATOR.'/components/com_extman/extman.php')) {
        $error = JText::_('EXTMAN_ERROR');
    }
    elseif (!JPluginHelper::isEnabled('system', 'koowa')) {
        $error = sprintf(JText::_('EXTMAN_PLUGIN_ERROR'), JRoute::_('index.php?option=com_plugins&view=plugins&filter_folder=system'));
    }

    return JFactory::getApplication()->redirect(JURI::base(), $error, 'error');
}

//Catch exceptions before Joomla does (JApplication::dispatch())
try {
    KObjectManager::getInstance()->getObject('com://admin/tada.dispatcher.http')->dispatch();
} catch(Exception $exception) {
    KObjectManager::getInstance()->getObject('exception.handler')->handleException($exception);
}