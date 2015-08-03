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


<?= helper('bootstrap.load', array('javascript' => true)); ?>
<?= helper('behavior.koowa'); ?>


<?php // START @TODO: These files / markup should be loaded at root component level so we don't have to add them on each view ?>
<ktml:style src="assets://css/admin-joomla.css" />
<ktml:script src="assets://js/modernizr.js" /> <?php // @TODO: create modernizr file that only holds test we actually use ?>
<ktml:script src="assets://js/scripts.js" />
<script data-inline type="text/javascript">var el = document.body; var cl = 'k-js-enabled'; if (el.classList) { el.classList.add(cl); }else{ el.className += ' ' + cl;}</script>
<?php // END ?>


<?php // For testing purposes only ?>
<?php // JFactory::getApplication()->enqueueMessage('Message'); ?>
<?php // End test ?>


<!-- Overview -->
<div class="k-overview">

    <!-- Form -->
    <form id="k-offcanvas-container" action="" method="get" class="k-content-wrapper -koowa-grid">

        <!-- Sidebar -->
        <div id="k-sidebar" class="k-sidebar">

            <!-- Navigation -->
            <div class="k-sidebar__navigation">
                <ktml:toolbar type="menubar">
            </div>

            <!-- Filters -->
            <div class="k-sidebar__item">
                <div class="k-sidebar__content">
                    <ul class="k-list">
                        <li class="<?= is_null(parameters()->user) ? 'active' : ''; ?>">
                            <a href="<?= route('user=') ?>">
                                <span class="k-icon-user"></span>
                                All activities
                            </a>
                        </li>
                        <li class="<?= parameters()->user ? 'active' : ''; ?>">
                            <a href="<?= route('user='.object('user')->getId()) ?>">
                                <span class="k-icon-user"></span>
                                My activities
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .k-sidebar -->

        <!-- Content -->
        <div class="k-content">

            <!-- Toolbar -->
            <div class="k-toolbar">
                <div class="koowa-toolbar">
                    <!-- Sidebar toggle button -->
                    <button id="k-toggle-button" class="off-canvas-menu-toggle" type="button">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </button>
                    <!-- Buttons -->
                    <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TASKS" icon="task icon-stack">
                </div>
            </div><!-- .k-toolbar -->

            <!-- Component -->
            <div class="k-component">

                <!-- Scopebar -->
                <div class="k-scopebar">

                    <!-- Filters -->
                    <div class="k-scopebar__item k-scopebar__item--fluid">

                        <!-- Filter -->
                        <div class="select2-wrapper select2--link-style select2--filter">
                            <select name="action" id="select2-filter" data-placeholder="Action" onchange="this.form.submit()">
                                <option></option>
                                <option value="add"<?= parameters()->action == 'add' ? ' selected' : ''; ?>>Created</option>
                                <option value="edit"<?= parameters()->action == 'edit' ? ' selected' : ''; ?>>Edited</option>
                                <option value="delete"<?= parameters()->action == 'delete' ? ' selected' : ''; ?>>Deleted</option>
                            </select>
                        </div>

                        <!-- Search toggle button -->
                        <button type="button" class="toggle-search">Search</button>

                    </div>

                    <!-- Search -->
                    <div class="k-scopebar__item k-scopebar__search">
                        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
                    </div>

                </div><!-- .k-scopebar -->

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

            </div><!-- .k-component -->

        </div><!-- k-content -->

    </form><!-- .k-content-wrapper -->

</div><!-- .k-overview -->