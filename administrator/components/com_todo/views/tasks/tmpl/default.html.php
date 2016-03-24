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


<!-- Wrapper -->
<div class="k-wrapper">

    <!-- Overview -->
    <div class="k-content-wrapper">

        <!-- Sidebar -->
        <?= import('default_sidebar.html'); ?>

        <!-- Content -->
        <div class="k-content">

            <!-- Title when sidebar is inivisible -->
            <div class="k-mobile-title">
                <ktml:toolbar type="actionbar" render_buttons="false">
            </div>

            <!-- Toolbar -->
            <div class="k-toolbar">
                <ktml:toolbar type="actionbar" render_title="false"<?= $category_count ? '' : ' render_buttons="false"' ?>>
            </div><!-- .k-toolbar -->

            <!-- Component -->
            <div class="k-component">

                <!-- Form -->
                <form class="k-list-layout -koowa-grid" action="" id="k-offcanvas-container" method="get">

                    <!-- Scopebar -->
                    <?= import('default_scopebar.html'); ?>

                    <!-- Table -->
                    <?= import('default_table.html'); ?>

                </form><!-- .k-list-layout -->

            </div><!-- .k-component -->

        </div><!-- k-content -->

    </div><!-- .k-content-wrapper -->

</div><!-- .k-wrapper -->
