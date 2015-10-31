<?php
/**
 * Nooku Platform - http://www.nooku.org/platform
 *
 * @copyright	Copyright (C) 2011 - 2014 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/nooku/nooku-platform for the canonical source repository
 */

/**
 * Listbox Template Helper
 *
 * @author  Tom Janssens <http://github.com/tomjanssens>
 * @package Component\Tags
 */
class ComTodoTemplateHelperListbox extends KTemplateHelperListbox
{
    public function tags($config = array())
    {
        $config = new KObjectConfig($config);

        $config->append(array(
            'model' => 'tags',
            'value'	 => 'id',
            'label'	 => 'title',
            'prompt' => false,
            'select2' => true,
            'identifier' => 'com:todo.model.tags'
        ));

        $config->label = 'title';
        $config->sort  = 'title';

        return parent::_render($config);
    }
}
