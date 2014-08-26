<?
/**
 * @package     Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<? // No todos message ?>
<? if ($total == 0): ?>
    <p class="alert alert-info">
        <?= @translate('You do not have any todos yet.'); ?>
    </p>
<? else: ?>

<div class="koowa mod_tada mod_tada--todos">
    <ul>
    <? foreach ($todos as $todo): ?>
        <li class="module_todo">

            <p class="koowa_header">
                <? // Header title ?>
                <span class="koowa_header__item">
                    <a href="<?= $todo->title_link; ?>"
                       class="koowa_header__title_link"
                       data-title="<?= @escape($todo->title); ?>"
                       data-id="<?= $todo->id; ?>">
                        <?= @escape($todo->title);?></a>

                </span>
            </p>


            <p class="module_todo__info">

                <? // Created ?>
                <? if ($module->params->show_created): ?>
                <span class="module_todo__date">
                    <?= @date(array('date' => $todo->created_on)); ?>
                </span>
                <? endif; ?>
            </p>
        </li>
    <? endforeach; ?>
    </ul>
</div>

<? endif; ?>