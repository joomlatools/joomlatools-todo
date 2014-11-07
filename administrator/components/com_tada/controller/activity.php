<?php
/**
 * @package     Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTadaControllerActivity extends ComKoowaControllerModel
{
    /**
     * Constructor.
     *
     * @param KObjectConfig $config Configuration options.
     */
    public function __construct(KObjectConfig $config)
    {
        parent::__construct($config);

        $this->getObject('translator')->load('com:activities');
    }

    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'behaviors' => array('purgeable')
        ));

        parent::_initialize($config);
    }

    /**
     * Set the ip address if we are adding a new activity.
     *
     * @param KControllerContextInterface $context A command context object.
     *
     * @return KModelEntityInterface
     */
    protected function _beforeAdd(KControllerContextInterface $context)
    {
        $context->request->data->ip = $this->getObject('request')->getAddress();
    }
}