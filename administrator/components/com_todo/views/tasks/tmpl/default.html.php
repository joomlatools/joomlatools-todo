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
                        <li class="k-tree">
                            <a href="#">
                                <span class="k-clicker"></span>
                                <span class="k-icon-folder"></span>
                                <span class="k-title">All categories</span>
                            </a>
                            <ul class="k-tree__items">
                                <li class="k-list__item--active"><a href="#">Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <span class="k-icon-user"></span>
                                <span class="k-title">My documents</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <span class="k-icon-clock"></span>
                                <span class="k-title">Recently edited</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="k-icon-star"></span>
                                <span class="k-title">Most popular</span>
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

                <!-- Sidebar toggle button -->
                <button id="k-toggle-button" class="off-canvas-menu-toggle" type="button">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </button>

                <div class="k-toolbar__buttons">
                    <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TASKS" icon="task icon-stack">
                </div>
            </div>

            <!-- Component -->
            <div class="k-component">

                <!-- Breadcrumbs -->
                <div class="k-breadcrumb">
                    <ul>
                        <li class="home">
                            <a class="k-breadcrumb__item k-icon-home" href="#">
                                <span class="visually-hidden-icon-label">Home</span>
                            </a>
                        </li>
                        <li>
                            <a class="k-breadcrumb__item" href="#">
                                Category 1
                            </a>
                        </li>
                        <li>
                            <a class="k-breadcrumb__item" href="#">
                                Sub Category 2
                            </a>
                        </li>
                        <li>
                            <a class="k-breadcrumb__item" href="#">
                                Sub Category 3
                            </a>
                        </li>
                        <li>
                            <a class="k-breadcrumb__item" href="#">
                                A probably German ridiculous long category name
                            </a>
                        </li>
                        <li>
                            <a class="k-breadcrumb__item" href="#">
                                Category 5
                            </a>
                        </li>
                        <li class="active">
                            <span class="k-breadcrumb__item">
                                Category 6
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="k-scopebar">
                    <!-- Filter items by -->
                    <div class="k-scopebar__item k-scopebar__item--fluid">
                        <div class="dropdown-holder">
                            <button class="k-scopebar__button k-scopebar__button--filter dropdown-toggle" id="scopebar-filter--published" data-toggle="dropdown" aria-expanded="true">
                                Published
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="scopebar-filter--published">
                                <li role="presentation" class="<?= is_null(parameters()->enabled) ? 'active' : ''; ?>">
                                    <a role="menuitem" href="<?= route('enabled=&search=' ) ?>">
                                        <?= translate('All') ?>
                                    </a>
                                </li>
                                <li role="presentation" class="<?= parameters()->enabled === 0 ? 'active' : ''; ?>">
                                    <a role="menuitem" href="<?= route('enabled='.(parameters()->enabled === 0 ? '' : '0')) ?>">
                                        <?= translate('Unpublished') ?>
                                    </a>
                                </li>
                                <li role="presentation" class="<?= parameters()->enabled === 1 ? 'active' : ''; ?>">
                                    <a role="menuitem" href="<?= route('enabled='.(parameters()->enabled === 1 ? '' : '1')) ?>">
                                        <?= translate('Published') ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="select2-wrapper select2--no-gfx">
                            <select>
                                <option value="Option1">All</option>
                                <option value="Option2">Published</option>
                                <option value="Option3">Unpublished</option>
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
                                    <th width="1">
                                        <?= helper('grid.checkall')?>
                                    </th>
                                    <th class="todo_table__title_field">
                                        <?= helper('grid.sort', array('column' => 'title', 'title' => 'Title')); ?>
                                    </th>
                                    <th width="5%">
                                        <?= helper('grid.sort', array('column' => 'enabled', 'title' => 'Status')); ?>
                                    </th>
                                    <th width="5%">
                                        <?= helper('grid.sort', array('column' => 'created_by', 'title' => 'Owner')); ?>
                                    </th>
                                    <th width="5%">
                                        <?= helper('grid.sort', array('column' => 'created_on', 'title' => 'Date')); ?>
                                    </th>
                                </tr>
                            </thead>
                            <? if (count($tasks)): ?>
                            <tfoot>
                                <tr>
                                    <td colspan="9">
                                        <div class="select2--no-gfx">
                                            <?= helper('paginator.pagination') ?>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            <? endif; ?>
                            <tbody>
                            <? foreach ($tasks as $task): ?>
                                <tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $task)) ?>
                                    </td>
                                    <td class="todo_table__title_field">
                                        <a href="<?= route('view=task&id='.$task->id); ?>">
                                            <?= escape($task->title); ?></a>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('grid.publish', array('entity' => $task, 'clickable' => true)) ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= escape($task->getAuthor()->getName()); ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('date.format', array('date' => $task->created_on)); ?>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $task)) ?>
                                    </td>
                                    <td class="todo_table__title_field">
                                        <a href="<?= route('view=task&id='.$task->id); ?>">
                                            <?= escape($task->title); ?></a>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('grid.publish', array('entity' => $task, 'clickable' => true)) ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= escape($task->getAuthor()->getName()); ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('date.format', array('date' => $task->created_on)); ?>
                                    </td>
                                </tr><tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $task)) ?>
                                    </td>
                                    <td class="todo_table__title_field">
                                        <a href="<?= route('view=task&id='.$task->id); ?>">
                                            <?= escape($task->title); ?></a>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('grid.publish', array('entity' => $task, 'clickable' => true)) ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= escape($task->getAuthor()->getName()); ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('date.format', array('date' => $task->created_on)); ?>
                                    </td>
                                </tr><tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $task)) ?>
                                    </td>
                                    <td class="todo_table__title_field">
                                        <a href="<?= route('view=task&id='.$task->id); ?>">
                                            <?= escape($task->title); ?></a>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('grid.publish', array('entity' => $task, 'clickable' => true)) ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= escape($task->getAuthor()->getName()); ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('date.format', array('date' => $task->created_on)); ?>
                                    </td>
                                </tr><tr>
                                    <td>
                                        <?= helper('grid.checkbox', array('entity' => $task)) ?>
                                    </td>
                                    <td class="todo_table__title_field">
                                        <a href="<?= route('view=task&id='.$task->id); ?>">
                                            <?= escape($task->title); ?></a>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('grid.publish', array('entity' => $task, 'clickable' => true)) ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= escape($task->getAuthor()->getName()); ?>
                                    </td>
                                    <td class="k-nowrap">
                                        <?= helper('date.format', array('date' => $task->created_on)); ?>
                                    </td>
                                </tr>
                            <? endforeach; ?>

                                <? if (!count($tasks)) : ?>
                                <tr>
                                    <td colspan="9" align="center" style="text-align: center;">
                                        <?= translate('No tasks found.') ?>
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