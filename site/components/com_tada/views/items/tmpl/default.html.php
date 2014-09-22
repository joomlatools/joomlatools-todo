<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<? foreach ($items as $item): ?>
    <? //Import child template from document view ?>
    <?= import('com://site/tada.item.default.html', array(
        'item' => $item,
    )) ?>
<? endforeach ?>