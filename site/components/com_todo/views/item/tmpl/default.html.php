<?
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

defined('KOOWA') or die; ?>

<div class="todo_item">
    <h4 class="koowa_header">
        <? // Header title ?>
        <span class="koowa_header__item">
            <a class="koowa_header__title_link" href="<?= route('view=item&id='.$item->id); ?>">
                <?= escape($item->title); ?>
            </a>
         </span>

        <? // Label locked ?>
        <? if ($item->isPermissible() && $item->canPerform('edit') && $item->isLockable() && $item->isLocked()): ?>
            <span class="label label-warning"><?= helper('grid.lock_message', array('entity' => $item)); ?></span>
        <? endif; ?>

        <? // Label status ?>
        <? if (!$item->isPublished() || !$item->enabled): ?>
            <? $status = $item->enabled ? translate($item->status) : translate('Draft'); ?>
            <span class="label label-<?= $item->enabled ? $item->status : 'draft' ?>"><?= ucfirst($status); ?></span>
        <? endif; ?>
    </h4>
    <div class="item_description">
        <?= JHtml::_('content.prepare', $item->description); ?>
    </div>

    <? // Edit area | Import partial template from item view ?>
    <?= import('com://site/todo.item.manage.html', array('item' => $item)) ?>

</div>