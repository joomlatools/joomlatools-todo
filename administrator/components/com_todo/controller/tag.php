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
  * Task Controller
  *
  * @author  Johan Janssens <http://github.com/johanjanssens>
  * @author  Rastin Mehr <https://github.com/rmdstudio>
  * @package Nooku\Component\Todo
  */
  class ComTodoControllerTag extends ComTagsControllerTag
  {
      protected function _initialize(KObjectConfig $config)
      {
          $config->append(array(
          	'behaviors' => array(
                  'editable', 'persistable',
                  'com:activities.controller.behavior.loggable'
              ),
          ));

          //Force the toolbars
          $config->toolbars = array('menubar', 'com:tags.controller.toolbar.tag');

          parent::_initialize($config);
      }
  }
