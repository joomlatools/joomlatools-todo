<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/joomlatools/joomlatools-todo for the canonical source repository
 */

class ComTodoModelTasks extends KModelDatabase
{
    public function __construct(KObjectConfig $config)
    {
        parent::__construct($config);

        $this->getState()
            ->insert('enabled', 'int')
            ->insert('created_by', 'int');
    }

    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
                'searchable' => array('columns' => array('title', 'description'))
            )
        ));

        parent::_initialize($config);
    }

    protected function _buildQueryColumns(KDatabaseQueryInterface $query)
    {
        parent::_buildQueryColumns($query);

        $query->columns(array(
            'last_modified_on' => 'IF(tbl.modified_on, tbl.modified_on, tbl.created_on)'
        ));
    }

    protected function _buildQueryWhere(KDatabaseQueryInterface $query)
    {
        parent::_buildQueryWhere($query);

        $state = $this->getState();

        if (!is_null($state->enabled))
        {
            $query->where('(tbl.enabled IN :enabled)')->bind(array('enabled' => (array) $state->enabled));
        }

        if (is_numeric($state->created_by))
        {
            $query->where('(tbl.created_by IN :created_by)')->bind(array('created_by' => (array) $state->created_by));
        }
    }
}