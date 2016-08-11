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

<? // Loading necessary Markup, CSS and JS ?>
<?= helper('ui.load') ?>
<?= helper('behavior.modal') ?>
<?= helper('behavior.tooltip') ?>


<!-- Wrapper -->
<div class="k-wrapper k-js-wrapper">

    <!-- Overview -->
    <div class="k-content-wrapper">

        <!-- Sidebar -->
        <?= import('default_sidebar.html'); ?>

        <!-- Content -->
        <div class="k-content k-js-content">

            <!-- Title when sidebar is invisible -->
            <ktml:toolbar type="titlebar" mobile>

            <!-- Toolbar -->
            <ktml:toolbar type="actionbar">

            <!-- Component -->
            <div class="k-component">

                <!-- Form -->
                <form class="k-flex-wrapper k-js-grid-controller " action="" method="get">

                    <!-- Scopebar -->
                    <?= import('default_scopebar.html'); ?>

                    <?if (!count($tasks)) : ?>

                        <!-- No documents -->
                        <?= import('no_tasks.html'); ?>

                    <? else : ?>

                        <!-- Table -->
                        <?= import('default_table.html'); ?>

                    <? endif; ?>

                </form><!-- .k-flex-wrapper -->

            </div><!-- .k-component -->

        </div><!-- k-content -->

    </div><!-- .k-content-wrapper -->

</div><!-- .k-wrapper -->
