<?php
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTadaModelItems extends KModelDatabase
{
    public function __construct(KObjectConfig $config)
    {
        parent::__construct($config);

        $this->getState()
            ->insert('enabled', 'int');
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

    protected function _buildQueryWhere(KDatabaseQueryInterface $query)
    {
        parent::_buildQueryWhere($query);

        $state = $this->getState();

        if (is_numeric($state->enabled))
        {
            $query->where('(tbl.enabled IN :enabled)')->bind(array('enabled' => (array) $state->enabled));
        }
    }
}