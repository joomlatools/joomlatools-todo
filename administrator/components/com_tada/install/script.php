<?php
/**
 * @package     Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class com_filemanInstallerScript
{
	/**
	 * Name of the component
	 */
	public $component;

	public function __construct($installer)
	{
		preg_match('#^com_([a-z0-9_]+)#', get_class($this), $matches);
		$this->component = $matches[1];
	}

	public function preflight($type, $installer)
	{
	    $return = true;
        $errors = array();
	    
		if (!class_exists('Koowa') || !class_exists('ComExtmanControllerExtension'))
		{
			if (file_exists(JPATH_ADMINISTRATOR.'/components/com_extman/extman.php') && !JPluginHelper::isEnabled('system', 'koowa')) {
                $errors[] = sprintf(JText::_('This component requires System - Joomlatools Framework plugin to be installed and enabled. Please go to <a href=%s>Plugin Manager</a>, enable <strong>System - Joomlatools Framework</strong> and try again'), JRoute::_('index.php?option=com_plugins&view=plugins&filter_folder=system'));
			}
			else $errors[] = JText::_('This component requires EXTman to be installed on your site. Please download this component from <a href=http://joomlatools.com target=_blank>joomlatools.com</a> and install it');
			
			$return = false;
		}

        // Check EXTman version.
        if ($return === true)
        {
            if (version_compare($this->getExtmanVersion(), '2.0.0', '<') || !class_exists('ComExtmanModelEntityExtension'))
            {
                $errors[] = JText::_('This component requires a newer EXTman version. Please download EXTman from <a href=http://joomlatools.com target=_blank>joomlatools.com</a> and upgrade it first.');
                $return   = false;
            }
        }

        if ($return == false && $errors) {
            $error = implode('<br />', $errors);
            $installer->getParent()->abort($error);
        }
		
		return $return;
	}

	public function postflight($type, $installer)
	{
		$extension_id = ComExtmanModelEntityExtension::getExtensionId(array(
			'type'    => 'component',
			'element' => 'com_'.$this->component
		));

        $controller = KObjectManager::getInstance()->getObject('com://admin/extman.controller.extension')
            ->view('extension')
            ->layout('success')
            ->event($type === 'update' ? 'update' : 'install');

        $controller->add(array(
            'source'              => $installer->getParent()->getPath('source'),
            'manifest'            => simplexml_load_file($installer->getParent()->getPath('manifest')),
            'joomla_extension_id' => $extension_id,
            'install_method'        => $type,
            'event'               => $type === 'update' ? 'update' : 'install'
        ));

        echo $controller->render();
    }

    /**
     * Returns the current installed version (if any) of EXTman.
     *
     * @return null|string The EXTman version if present, null otherwise.
     */
    public function getExtmanVersion()
    {
        return $this->_getExtensionVersion('com_extman');
    }

    /**
     * Extension version getter.
     *
     * @param string $element The element name, e.g. com_extman, com_logman, etc.
     *
     * @return mixed|null|string The extension version, null if couldn't be determined.
     */
    protected function _getExtensionVersion($element)
    {
        $version = null;

        $query    = "SELECT manifest_cache FROM #__extensions WHERE element = '{$element}'";
        if ($result = JFactory::getDBO()->setQuery($query)->loadResult()) {
            $manifest = new JRegistry($result);
            $version  = $manifest->get('version', null);
        }

        return $version;
    }
}