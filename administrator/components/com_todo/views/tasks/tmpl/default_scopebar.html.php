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
                <li><button type="button" data-filter-toggle="status"
                            class="<?= is_numeric(parameters()->enabled) ? 'has-active-filter' : '' ?>"
                        ><?= translate('Status'); ?></button></li>
            </ul>
        </div>

        <!-- Search toggle button -->
        <button type="button" class="toggle-search"><span class="k-icon-magnifying-glass"></span><span class="visually-hidden"><?= translate('Search'); ?></span></button>

    </div>

    <!-- Search -->
    <div class="k-scopebar__item k-scopebar__search">
        <?= helper('grid.search', array('submit_on_clear' => true)) ?>
    </div>

</div><!-- .k-scopebar -->

<!-- filter container -->
<div class="k-filter-container">
    <div class="k-filter-container__item" data-filter="status">
        <div class="select2-wrapper select2--filter">
            <select name="enabled" id="select2-filter" data-placeholder="Status" onchange="this.form.submit()">
                <option selected><?= translate('Status'); ?></option>
                <option value="1"<?= parameters()->enabled === 1 ? ' selected' : ''; ?>><?= translate('Published'); ?></option>
                <option value="0"<?= parameters()->enabled === 0 ? ' selected' : ''; ?>><?= translate('Unpublished'); ?></option>
            </select>
        </div>
    </div>
</div><!-- .k-filter-container -->