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

<div class="k-table-container">
    <div class="k-table">

        <table class="k-js-fixed-table-header k-js-responsive-table">
            <thead>
            <tr>
                <th width="1%" class="k-table-data--form">
                    <?= helper('grid.checkall')?>
                </th>
                <th width="1%" class="k-table-data--toggle" data-toggle="true"></th>
                <th>
                    <?= translate('Message'); ?>
                </th>
                <th width="1%" class="k-table-data--nowrap" data-hide="phone,phablet">
                    <?= helper('grid.sort', array('column' => 'created_on', 'title' => 'Time')); ?>
                </th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($activities as $activity): ?>
                <tr>
                    <td class="k-table-data--form">
                        <?= helper('grid.checkbox', array('entity' => $activity)) ?>
                    </td>
                    <td class="k-table-data--toggle"></td>
                    <td class="k-table-data--ellipsis">
                        <div class="k-ellipsis-item">
                            <?= helper('com:activities.activity.activity', array('entity' => $activity)) ?>
                        </div>
                    </td>
                    <td class="k-table-data--nowrap">
                        <?= helper('date.humanize', array('date' => $activity->created_on)); ?>
                    </td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>

    </div><!-- .k-table -->

    <? if (count($tasks)): ?>
        <div class="k-table-pagination">
            <?= helper('paginator.pagination') ?>
        </div><!-- .k-table-pagination -->
    <? endif; ?>

</div><!-- .k-table-container -->
