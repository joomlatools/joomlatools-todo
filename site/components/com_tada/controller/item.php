<?php
class ComTadaControllerItem extends ComKoowaControllerModel
{
	protected function _initialize(KObjectConfig $config)
	{
		$config->append(array(
			'formats'   => array('json')
		));

		parent::_initialize($config);
	}
}