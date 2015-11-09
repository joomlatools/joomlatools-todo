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

        <div class="k-scopebar__item--filter">
            <button type="button" class="k-scopebar__filter-button">
                <span class="add-filter"><?= translate('Add filter'); ?></span>
                <span class="clear-filter" style="display: none;"><?= translate('Clear filter'); ?></span>
            </button>
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
<div class="k-filter-container" data-filter="all">

    <!-- First group -->
    <div class="k-filter-group">
        <div class="k-filter">
            <?= helper('listbox.published', array(
                'select2' => true,
                'attribs' => array(
                    'onchange' => 'this.form.submit();',
                    'class' => 'select2-filter--no-search'
                )
            )); ?>
        </div>
    </div>
    <!-- End first group -->

</div><!-- .k-filter-container -->