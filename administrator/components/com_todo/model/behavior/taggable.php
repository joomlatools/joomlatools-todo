<?php
/**
 * Nooku Platform - http://www.nooku.org/platform
 *
 * @copyright      Copyright (C) 2011 - 2014 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link           https://github.com/nooku/nooku-platform for the canonical source repository
 */

/**
 * Taggable Controller Behavior
 *
 * @author  Johan Janssens <http://github.com/johanjanssens>
 * @package Nooku\Component\Tags
 */
class ComTodoModelBehaviorTaggable extends KModelBehaviorAbstract
{
    public function onMixin(KObjectMixable $mixer)
    {
        parent::onMixin($mixer);

        $mixer->getState()->insert('tag', 'string');
    }

    protected function _beforeFetch(KModelContextInterface $context)
    {
        $model = $context->getSubject();

        if ($model instanceof KModelDatabase && $this->getTable()->isTaggable()) {
            $state = $context->state;

            if ($state->tag) {
                $context->query->bind(array('tag' => $state->tag));
            }
        }
    }
}
