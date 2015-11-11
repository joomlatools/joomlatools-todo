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
class ComTodoControllerTag extends ComTagsControllerTag
{
    /**
     * Initializes the default configuration for the object
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param   KObjectConfig $config Configuration options
     * @return void
     */
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'toolbars'   => array('menubar', 'tags'),
        ));

        parent::_initialize($config);
    }
}
