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

<div class="k-empty-state">
    <? if(!$tasks_count) : ?>
        <p>
            <?= translate('It seems like you don\'t have any tasks yet.'); ?>
        </p>
        <p>
            <a class="k-button k-button--success k-button--large" href="<?= route('option=com_todo&view=task') ?>">
                <?= translate('Add your first task')?>
            </a>
        </p>
    <? elseif(!count($tasks)) : ?>
        <p>
            <?= translate('No tasks found.'); ?><br>
            <small><?= translate('Maybe select different filters?'); ?></small>
        </p>
    <? endif; ?>
</div>