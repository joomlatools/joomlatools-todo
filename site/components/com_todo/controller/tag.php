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
 * Tag Controller
 *
 * @author Tom Janssens <http://github.com/tomjanssens>
 * @author Rastin Mehr <http://github.com/rmdstudio>
 * @package Component\Tags
 */
class ComTagsControllerTag extends TagsControllerTag
{
    public function getRequest()
    {
        $request = parent::getRequest();

        $request->query->access    = $this->getUser()->isAuthentic();
        $request->query->published = 1;

        return $request;
    }
}
