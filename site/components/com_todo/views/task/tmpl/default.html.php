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

<ktml:style src="media://css/site.css" />

<div class="todo_task">
    <h4 class="koowa_header">
        <? // Header title ?>
        <span class="koowa_header__task">
            <a class="koowa_header__title_link" href="<?= route('view=task&id='.$task->id); ?>">
                <?= escape($task->title); ?>
            </a>
         </span>

        <? // Label locked ?>
        <? if ($task->isPermissible() && $task->canPerform('edit') && $task->isLockable() && $task->isLocked()): ?>
            <span class="label label-warning"><?= helper('grid.lock_message', array('entity' => $task)); ?></span>
        <? endif; ?>

        <? // Label status ?>
        <? if (!$task->isPublished() || !$task->enabled): ?>
            <? $status = $task->enabled ? translate($task->status) : translate('Draft'); ?>
            <span class="label label-<?= $task->enabled ? $task->status : 'draft' ?>"><?= ucfirst($status); ?></span>
        <? endif; ?>
    </h4>


    <? // Download button for attachment ?>
    <? if ($task->attachment): ?>
        <a class="btn btn-mini" href="<?= @route('view=attachment&id='.$task->id) ?>">
            <i class="icon-download"></i><?= translate('Download attachment') ?></a>
    <? endif ?>


    <? // Description area ?>
    <div class="task_description">
        <?= JHtml::_('content.prepare', $task->description); ?>
    </div>

    <? // Edit area | Import partial template from task view ?>
    <?= import('com://site/todo.task.manage.html', array('task' => $task)) ?>

</div>