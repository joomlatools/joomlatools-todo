<?
/**
 * @package    Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<ktml:style src="media://koowa/com_koowa/css/koowa.css" />
<ktml:style src="media://com_todo/css/site.css" />

<?= helper('bootstrap.load'); ?>
<?= helper('behavior.koowa'); ?>
<?= helper('behavior.keepalive'); ?>
<?= helper('behavior.validator'); ?>

<? // Toolbar ?>
<div class="koowa_toolbar">
    <ktml:toolbar type="actionbar">
</div>

<? // Form ?>
<div class="koowa_form">

    <div class="todo_form_layout">
        <form action="<?= route('id='. $item->id) ?>" method="post" class="-koowa-form">

            <div class="todo_container">
                <div class="todo_grid">
                    <div class="todo_grid__item two-thirds">

                        <? // Details fieldset ?>
                        <fieldset>
                            <legend><?= translate('Details') ?></legend>

                            <?= import('com://site/todo.item.form_details.html') ?>

                        </fieldset>

                        <? // Description fieldset ?>
                        <fieldset>
                            <legend><?= translate('Description') ?></legend>

                            <?= import('com://site/todo.item.form_description.html') ?>

                        </fieldset>
                    </div>

                    <div class="todo_grid__item one-third">
                        <? // Publishing fieldset ?>
                        <fieldset>
                            <legend><?= translate('Publishing') ?></legend>

                            <?= import('com://site/todo.item.form_publishing.html') ?>

                        </fieldset>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>