<?php
/**
 * @package     Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

defined('_JEXEC') or die;

JLoader::register('PlgKoowaFinder', JPATH_ROOT.'/libraries/koowa/plugins/koowa/finder.php');

/**
 * Joomla smart search plugin for Tada
 */
class plgFinderTada extends PlgKoowaFinder
{
    /**
     * Initializes the default configuration for the object
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param   KObjectConfig $config Configuration options
     * @return  void
     */
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'context'  => 'Tada',
            'entity'   => 'item',
        ));

        parent::_initialize($config);
    }
}
