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

<div id="k-sidebar" class="k-sidebar">
    <!-- Navigation -->
    <div class="k-sidebar__navigation">
        <ktml:toolbar type="menubar">
    </div>

    <!-- Filters -->
    <div class="k-sidebar__item k-quick-filters">
        <div class="k-sidebar__header">
            <?= translate('Quick filters:'); ?>
            <div class="k-sidebar__toggle"><span class="visually-hidden">Toggle</span></div>
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

<script type="text/javascript">
    kQuery(function ($) {
        $('.k-sidebar__toggle').on('click', function() {
            $(this).toggleClass('is-active').parent().next().slideToggle(180);
        });
    });
</script>