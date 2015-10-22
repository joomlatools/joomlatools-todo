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

<!-- Scopebar -->
<div class="k-scopebar">

    <!-- Filters -->
    <div class="k-scopebar__item k-scopebar__item--fluid">

        <!-- Filter title -->
        <div class="k-scopebar__item--title"><?= translate('Filter:'); ?></div>

        <!-- Filters -->
        <div class="k-scopebar__item--filters">
            <ul>
                <li><button type="button" data-filter-toggle="status" class="k-filter-button<?= is_numeric(parameters()->enabled) ? 'has-active-filter' : '' ?>">
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
    <div class="k-filter-container__item" data-filter="status">
        <?= helper('listbox.published', array(
            'select2' => true,
            'attribs' => array('onchange' => 'this.form.submit();')
        )); ?>
    </div>
</div><!-- .k-filter-container -->