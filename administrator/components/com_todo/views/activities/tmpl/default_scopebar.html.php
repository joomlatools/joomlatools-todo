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

<div class="k-js-filters k-dynamic-content-holder">

    <? // @TODO: enable and fix filters; ?>

<!--    <div data-filter data-title="--><?//= translate('Status'); ?><!--"-->
<!--         data-count="--><?//= (!empty(parameters()->status) || parameters()->enabled === 0) ? 1 : 0 ?><!--">-->
<!--        --><?//= helper('listbox.status'); ?>
<!--    </div>-->
<!---->
<!--    <div class="scopebar-group hidden-tablet hidden-phone">-->
<!--        <a class="--><?//= is_null(parameters()->enabled) ? 'active' : ''; ?><!--"-->
<!--           href="--><?//= route('enabled=&search=' ) ?><!--">-->
<!--            --><?//= translate('All') ?>
<!--        </a>-->
<!--    </div>-->
<!--    <div class="scopebar-group last hidden-tablet hidden-phone">-->
<!--        <a class="--><?//= parameters()->enabled === 0 ? 'active' : ''; ?><!--"-->
<!--           href="--><?//= route('enabled='.(parameters()->enabled === 0 ? '' : '0')) ?><!--">-->
<!--            --><?//= translate('Unpublished') ?>
<!--        </a>-->
<!--        <a class="--><?//= parameters()->enabled === 1 ? 'active' : ''; ?><!--"-->
<!--           href="--><?//= route('enabled='.(parameters()->enabled === 1 ? '' : '1')) ?><!--">-->
<!--            --><?//= translate('Published') ?>
<!--        </a>-->
<!--    </div>-->

</div>


<!-- Scopebar -->
<div class="k-scopebar k-js-scopebar">

    <!-- Scopebar filters -->
    <div class="k-scopebar__item k-scopebar__item--filters">

        <!-- Filters wrapper -->
        <div class="k-scopebar__filters-content">

            <!-- Filters -->
            <div class="k-scopebar__filters k-js-filter-container">

                <!-- Filter -->
                <div style="display: none;" class="k-scopebar__item--filter k-scopebar-dropdown k-js-filter-prototype k-js-dropdown">
                    <button type="button" class="k-scopebar-dropdown__button k-js-dropdown-button">
                        <span class="k-scopebar__item--filter__title k-js-dropdown-title"></span>
                        <span class="k-scopebar__item--filter__icon k-icon-chevron-bottom" aria-hidden="true"></span>
                        <div class="k-scopebar__item__label k-js-dropdown-label"></div>
                    </button>
                    <div class="k-scopebar-dropdown__body k-js-dropdown-body">
                        <div class="k-scopebar-dropdown__body__buttons">
                            <button type="button" class="k-button k-button--default k-js-clear-filter"><?= translate('Clear') ?></button>
                            <button type="button" class="k-button k-button--primary k-js-apply-filter"><?= translate('Apply filter') ?></button>
                        </div>
                    </div>
                </div>

            </div><!-- .k-scopebar__filters -->

        </div><!-- .k-scopebar__filters-content -->

    </div><!-- .k-scopebar__item--filters -->

    <!-- Search -->
    <div class="k-scopebar__item k-scopebar__item--search">
        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
    </div><!-- .k-scopebar__item--search -->

</div><!-- .k-scopebar -->
