<?
/**
 * @package     DOCman
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<!-- Scopebar -->
<div class="k-scopebar">

    <!-- Filters -->
    <div class="k-scopebar__item k-scopebar__item--fluid">

        <!-- Filter title -->
        <div class="k-scopebar__filters">

            <div class="k-scopebar__item--filter k-dropdown js-dropdown">
                <button type="button" class="k-dropdown__button js-dropdown-button">
                    <span class="k-scopebar__item--filter__title"><?= translate('Status'); ?></span>
                    <span class="k-scopebar__item--filter__icon k-icon-chevron-bottom"></span>
                </button>
                <div class="k-dropdown__body js-dropdown-body">
                    <div class="k-dropdown__body__content">
                        <ul>
                            <li>Unpublished</li>
                            <li>Published</li>
                        </ul>
                    </div>
                    <div class="k-dropdown__body__buttons">
                        <button type="button" class="btn btn-sm">Remove filter</button>
                        <button type="button" class="btn btn-primary btn-sm">Apply</button>
                    </div>
                </div>
            </div>

        </div><!-- .k-scopebar__filters -->

        <!-- Right floating group -->
        <div class="k-scopebar__group--right">

            <!-- Search toggle button -->
            <div class="k-scopebar__group--right__item">
                <button type="button" class="k-scopebar-icon-button k-toggle-search"><span class="k-icon-magnifying-glass"></span><span class="visually-hidden"><?= translate('Search'); ?></span></button>
            </div>

        </div><!-- .k-scopebar__group--right -->

    </div><!-- .k-scopebar__item -->

    <!-- Search -->
    <div class="k-scopebar__item k-scopebar__item--search">
        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
    </div>

</div><!-- .k-scopebar -->


<script type="text/javascript">
    kQuery(function ($) {
        // Dropdown menu
        var dropdownButton = $('.js-dropdown-button'),
            dropdown = $('.js-dropdown'),
            dropdownBody = $('.js-dropdown-body');

        function openDropdown(elem) {
            dropdown.removeClass('is-active');
            elem.parent().addClass('is-active');

            var select = elem.parent().find('select');
            if (select.data('select2')) {
                select.select2('open');
            }
        }

        function closeDropdown() {
            dropdown.removeClass('is-active');

            var select = dropdown.find('select');
            if (select.data('select2')) {
                select.select2('close');
            }
        }

        if (dropdownButton.length && dropdown.length) {

            dropdownBody.on('click', function(e) {
                e.stopPropagation();
            });

            // Clicking on the button
            dropdownButton.on('click', function (e) {
                // Cancel the html click
                e.stopPropagation();

                // Remove classes from other dropdowns
                if ($(this).parent().hasClass('is-active')) {
                    closeDropdown();
                } else {
                    openDropdown($(this));
                }
            });

            // Close dropdown on esc key
            $(document).keyup(function (e) {
                if (e.keyCode == 27 && dropdown.hasClass('is-active')) {
                    closeDropdown();
                }
            });

            // Close dropdown on clicking outside
            $('html').click(function () {
                closeDropdown();
            });
        }
    });
</script>