<?php
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class ComTadaTemplateHelperGrid extends ComKoowaTemplateHelperGrid
{
    /**
     * Render an state field
     *
     * @param 	array $config An optional array with configuration options
     * @return string Html
     */
    public function state($config = array())
    {
        $config = new KObjectConfigJson($config);
        $config->append(array(
            'entity'  		=> null,
            'field'		=> 'enabled',
            'clickable'  => true
        ))->append(array(
                'data'		=> array($config->field => $config->entity->{$config->field})
            ));

        $entity = $config->entity;

        // Enabled, but pending
        if ($entity->enabled && !$entity->published && !$entity->expired && $entity->publish_on !== null)
        {
            $access = 0;
            $group  = $this->translate('Pending');
            $date   = $this->getTemplate()->renderHelper('date.humanize', array('date' => $entity->publish_on));
            $tip    = $this->translate('Will be published {date}, click to unpublish item', array(
                'date' => $date));
            $color  = '#c09853';
        }
        // Enabled, but expired
        else if ($entity->enabled && !$entity->published && $entity->expired && $entity->unpublish_on !== null)
        {
            $access = 0;
            $group  = $this->translate('Expired');
            $date   = $this->getTemplate()->renderHelper('date.humanize', array('date' => $entity->unpublish_on));
            $tip    = $this->translate('Expired {on}, click to unpublish item', array('on' => $date));
            $color  = '#3a87ad';
        }
        elseif (!$entity->enabled)
        {
            $access = 1;
            $group  = $this->translate('Unpublished');
            $tip    = $this->translate('Publish item');
            $color  = '#b94a48';
        }
        else
        {
            $access = 0;
            $group  = $this->translate('Published');
            $tip    = $this->translate('Unpublish item');
            $color  = '#468847';
        }

        $config->data->{$config->field} = $access;
        $data = str_replace('"', '&quot;', $config->data);

        $html = '<span style="cursor: pointer;color:'.$color.'" data-action="edit" data-data="'.$data.'" title="'.$tip.'">'.$group.'</span>';

        return $html;
    }
}
