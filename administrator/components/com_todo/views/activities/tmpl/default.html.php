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

<?= helper('behavior.ui'); ?>


<!-- Overview layout -->
<div class="k-content-wrapper">

    <!-- Sidebar -->
    <div id="k-sidebar" class="k-sidebar">

        <!-- Navigation -->
        <div class="k-sidebar__navigation">
            <ktml:toolbar type="menubar">
        </div>

        <!-- Filters -->
        <div class="k-sidebar__item">

            <div class="k-sidebar__header">
                <?= translate('Quick filters:'); ?>
            </div>

            <ul class="k-list">
                <li class="<?= is_null(parameters()->user) ? 'active' : ''; ?>">
                    <a href="<?= route('user=') ?>">
                        <span class="k-icon-list"></span>
                        <?= translate('All activities'); ?>
                    </a>
                </li>
                <li class="<?= parameters()->user ? 'active' : ''; ?>">
                    <a href="<?= route('user='.object('user')->getId()) ?>">
                        <span class="k-icon-person"></span>
                        <?= translate('My activities'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- .k-sidebar -->

    <!-- Content -->
    <div class="k-content">

        <!-- Toolbar -->
        <div class="k-toolbar">
            <div class="koowa-toolbar">
                <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TASKS" icon="task icon-stack">
            </div>
        </div><!-- .k-toolbar -->

        <!-- Component -->
        <div class="k-component">

            <!-- Form -->
            <form class="k-list-layout -koowa-grid" id="k-offcanvas-container" action="" method="get">

                <!-- Scopebar -->
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
                <div class="k-filter-container" id="logman-filters">
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

                <!-- Table -->
                <div class="k-table-container">
                    <div class="k-table">
                        <table class="table--fixed">
                            <thead>
                            <tr>
                                <th width="1">
                                    <?= helper('grid.checkall')?>
                                </th>
                                <th>
                                    <?= translate('Message'); ?>
                                </th>
                                <th width="30%">
                                    <?= helper('grid.sort', array('column' => 'created_on', 'title' => 'Time')); ?>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($activities as $activity): ?>
                                <tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $activity)) ?>
                                    </td>
                                    <td>
                                        <?= helper('com:activities.activity.activity', array('entity' => $activity)) ?>
                                    </td>
                                    <td>
                                        <?= helper('date.humanize', array('date' => $activity->created_on)); ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>

                            <? if (!count($activities)) : ?>
                                <tr>
                                    <td colspan="9">
                                        <?= translate('No activities found.') ?>
                                    </td>
                                </tr>
                            <? endif; ?>
                            </tbody>
                        </table>

                    </div><!-- .k-table -->

                    <? if (count($tasks)): ?>
                    <div class="k-table-pagination">
                        <?= helper('paginator.pagination') ?>
                    </div><!-- .k-table-pagination -->
                    <? endif; ?>

                </div><!-- .k-table-container -->

            </div><!-- .k-list-layout -->

        </div><!-- .k-component -->

    </div><!-- k-content -->

</div><!-- .k-content-wrapper -->
