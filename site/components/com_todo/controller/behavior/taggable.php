<?php
/**
 * Nooku Platform - http://www.nooku.org/platform
 *
 * @copyright	Copyright (C) 2011 - 2014 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/nooku/nooku-platform for the canonical source repository
 */

/**
 * Taggable Controller Behavior
 *
 * @author  Johan Janssens <http://github.com/johanjanssens>
 * @package Nooku\Component\Tags
 */
class ComTodoControllerBehaviorTaggable extends KControllerBehaviorAbstract
{
    public function __construct(KObjectConfig $config)
    {
        parent::__construct($config);

        $this->_container = $config->container;

        $this->addCommandCallback('after.add'   , '_saveTags');
        $this->addCommandCallback('after.edit'  , '_saveTags');
        $this->addCommandCallback('after.delete', '_deleteTags');
    }

    protected function _saveTags(KControllerContextInterface $context)
    {
		    if (!$context->response->isError())
        {
            $entity = $context->result;
            $table  = $entity->getTable()->getBase();

            // Remove all existing relations
            if($entity->id && $entity->getTable()->getBase())
            {
                $relations = $this->getObject('com:todo.model.tags_relations')
                    ->row($entity->id)
                    ->table($table)
                    ->fetch();

                $relations->delete();
            }

            if($entity->tags)
            {
                // Save tags as relations
                foreach ($entity->tags as $tag)
                {
                    $properties = array(
                        'tags_tag_id' => $tag,
                        'row'         => $entity->id,
                        'table'       => $table
                    );

                    $relation = $this->getObject('com:todo.model.tags_relations')
                        ->setState($properties)
                        ->fetch();

                    if($relation->isNew())
                    {
                        $relation = $this->getObject('com:todo.model.tags_relations')->create();

                        $relation->setProperties($properties);
                        $relation->save();
                    }
                }
            }

            return true;
		}
	}

	protected function _deleteTags(KControllerContextInterface $context)
  {
      $entity = $context->result;
      $status = $entity->getStatus();

      if($status == $entity::STATUS_DELETED || $status == 'trashed')
      {

          $id    = $entity->{$entity->getIdentityKey()};
          $table = $entity->getTable()->getBase();

          if(!empty($id) && $id != 0)
          {
              $rows = $this->getObject('com:todo.model.tags_relations')
                  ->row($id)
                  ->table($table)
                  ->fetch();

              $rows->delete();
          }
      }
	}
}
