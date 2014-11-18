<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

class com_todoInstallerScript
{
	public function preflight($type, $installer)
	{
	    $return = true;
	    
		if (!class_exists('Koowa'))
		{
            $error = 'This component requires Nooku Framework';
            $installer->getParent()->abort($error);

            $return = false;
        }
		
		return $return;
	}
}