<?
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/joomlatools/joomlatools-todo for the canonical source repository
 */

defined('KOOWA') or die; ?>

<div class="k-scopebar">

    <!-- Filters -->
    <div class="k-scopebar__item k-scopebar__item--fluid">

        <!-- Filter title -->
        <div class="k-scopebar__item--title"><?= translate('Filter:'); ?></div>

        <!-- Filters -->
        <div class="k-scopebar__item--filters">
            <ul>
                <li>
                    <button class="k-filter-button" type="button" data-filter-toggle="filter">
                        <?= translate('Status'); ?>
                    </button>
                </li>
            </ul>
        </div>

        <!-- Search toggle button -->
        <button type="button" class="k-toggle-search"><span class="k-icon-magnifying-glass"></span><span class="visually-hidden"><?= translate('Search'); ?></span></button>

    </div>

    <!-- Search -->
    <div class="k-scopebar__item k-scopebar__search">
        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
    </div>

</div><!-- .k-scopebar -->

<!-- filter container -->
<div class="k-filter-container">
    <div class="k-filter-container__item" data-filter="filter">
        <div class="select2-wrapper select2--filter">
            <select name="action" id="select2-filter" data-placeholder="Action" onchange="this.form.submit()">
                <option selected><?= translate('Status'); ?></option>
                <option value="add"<?= parameters()->action == 'add' ? ' selected' : ''; ?>><?= translate('Created'); ?></option>
                <option value="edit"<?= parameters()->action == 'edit' ? ' selected' : ''; ?>><?= translate('Edited'); ?></option>
                <option value="delete"<?= parameters()->action == 'delete' ? ' selected' : ''; ?>><?= translate('Deleted'); ?></option>
            </select>
        </div>
    </div>
</div><!-- .k-filter-container -->