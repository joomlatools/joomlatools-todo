<?php
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('_JEXEC') or die;

/**
 * Builds a URL from a query object
 *
 * @param array $query query object
 *
 * @return array
 */
function TadaBuildRoute(&$query)
{
    $segments = array();
    if(isset($query['view']))
    {
        $segments[] = $query['view'];
        unset( $query['view'] );
    }
    if(isset($query['id']))
    {
        $segments[] = $query['id'];
        unset( $query['id'] );
    };
    return $segments;
}

/**
 * Parse the segments into query string
 *
 * @param array $segments
 *
 * @return array
 */
function TadaParseRoute($segments)
{
    $vars = array(
        'view'  =>  $segments[0],
        'id'    =>  $segments[1]
    );

    return $vars;
}
