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

<ktml:style src="assets://css/admin-joomla.css" />
<ktml:script src="assets://js/modernizr.js" />
<ktml:script src="assets://js/scripts.js" />

<?php // JFactory::getApplication()->enqueueMessage('Message'); ?>

<script data-inline type="text/javascript">var el = document.body; var cl = 'k-js-enabled'; if (el.classList) { el.classList.add(cl); }else{ el.className += ' ' + cl;}</script>

<!-- Begin List layout -->
<div class="k-overview">

    <!-- The content -->
    <form id="k-offcanvas-container" action="" method="get" class="k-content-wrapper -koowa-grid">

        <!-- Sidebar -->
        <div id="k-sidebar" class="k-sidebar">

            <!-- Main component navigation -->
            <div class="k-sidebar__navigation">
                <ktml:toolbar type="menubar">
            </div>

            <!-- Categories -->
            <div class="k-sidebar__item">
                <div class="k-sidebar__content">

                    <ul class="k-list">
                        <li class="<?= is_null(parameters()->user) ? 'active' : ''; ?>">
                            <a href="<?= route('user=') ?>">
                                <span class="k-icon-user"></span>
                                <span class="k-title">All activities</span>
                            </a>
                        </li>
                        <li class="<?= parameters()->user ? 'active' : ''; ?>">
                            <a href="<?= route('user='.object('user')->getId()) ?>">
                                <span class="k-icon-user"></span>
                                <span class="k-title">My activities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- .k-sidebar -->

        <!-- The content -->
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
                    <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TASKS" icon="task icon-stack">
                </div>
            </div>

            <!-- Component -->
            <div class="k-component">
                <div class="k-scopebar">
                    <!-- Filter items by -->
                    <div class="k-scopebar__item k-scopebar__item--fluid">
                        <div class="select2-wrapper select2--link-style select2--filter">
                            <select name="action" id="select2-filter" data-placeholder="Action" onchange="this.form.submit()">
                                <option></option>
                                <option value="add"<?= parameters()->action == 'add' ? ' selected' : ''; ?>>Created</option>
                                <option value="edit"<?= parameters()->action == 'edit' ? ' selected' : ''; ?>>Edited</option>
                                <option value="delete"<?= parameters()->action == 'delete' ? ' selected' : ''; ?>>Deleted</option>
                            </select>
                        </div>
                    </div>

                    <!-- Search filtered items -->
                    <div class="k-scopebar__item k-scopebar__search">
                        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
                    </div>
                </div>

                <div class="k-table-container">
                    <div class="k-table">
                        <table class="table--fixed">
                            <thead>
                            <tr>
                                <th style="text-align: center;" width="1">
                                    <?= helper('grid.checkall')?>
                                </th>
                                <th class="todo_table__message_field">
                                    <?= translate('Message'); ?>
                                </th>
                                <th width="30%" data-hide="phone,phablet">
                                    <?= helper('grid.sort', array('column' => 'created_on', 'title' => 'Time')); ?>
                                </th>
                            </tr>
                            </thead>
                            <? if (count($activities)): ?>
                                <tfoot>
                                <tr>
                                    <td colspan="9">
                                        <?= helper('paginator.pagination') ?>
                                    </td>
                                </tr>
                                </tfoot>
                            <? endif; ?>
                            <tbody>
                            <? foreach ($activities as $activity): ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?= helper('grid.checkbox', array('entity' => $activity)) ?>
                                    </td>
                                    <td class="todo_table__message_field">
                                        <?= helper('com:activities.activity.activity', array('entity' => $activity)) ?>
                                    </td>
                                    <td>
                                        <?= helper('date.humanize', array('date' => $activity->created_on)); ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>

                            <? if (!count($activities)) : ?>
                                <tr>
                                    <td colspan="9" align="center" style="text-align: center;">
                                        <?= translate('No activities found.') ?>
                                    </td>
                                </tr>
                            <? endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- .k-component -->
        </div><!-- k-content -->

    </form><!-- .k-content-wrapper -->

</div><!-- .k-overview -->