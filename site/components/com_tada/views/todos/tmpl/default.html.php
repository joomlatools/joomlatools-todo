<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<? foreach ($todos as $todo): ?>
    <? Import child template from document view ?>
    <?= @import('com://site/tada.todo.default.html', array(
        'todo' => $todo,
    )) ?>
<? endforeach ?>