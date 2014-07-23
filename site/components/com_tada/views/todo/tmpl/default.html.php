<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<div class="tada_todo">
    <h4 class="koowa_header">
        <? // Header title ?>
        <span class="koowa_header__item">
            <a class="koowa_header__title_link" href="<?= @route('view=todo&id='.$todo->id); ?>">
                <?= @escape($todo->title); ?>
            </a>
         </span>
    </h4>
    <div class="todo_description">
        <?= JHtml::_('content.prepare', $todo->description); ?>
    </div>
</div>