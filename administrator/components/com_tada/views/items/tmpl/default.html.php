<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<?= helper('bootstrap.load', array('javascript' => true)); ?>
<?= helper('behavior.koowa'); ?>

<ktml:style src="media://koowa/com_koowa/css/koowa.css" />
<ktml:style src="media://com_tada/css/admin.css" />

<ktml:module position="toolbar">
    <ktml:toolbar type="actionbar" title="COM_TADA_SUBMENU_ITEMS" icon="item icon-stack">
</ktml:module>

<div class="tada-container">
    <div class="tada_admin_list_grid">
        <form action="" method="get" class="-koowa-grid">
            <div class="scopebar">
                <div class="scopebar-group hidden-tablet hidden-phone">
                    <a class="<?= is_null(parameters()->enabled) ? 'active' : ''; ?>"
                       href="<?= route('enabled=&search=' ) ?>">
                        <?= translate('All') ?>
                    </a>
                </div>
                <div class="scopebar-group last hidden-tablet hidden-phone">
                    <a class="<?= parameters()->enabled === 0 ? 'active' : ''; ?>"
                       href="<?= route('enabled='.(parameters()->enabled === 0 ? '' : '0')) ?>">
                        <?= translate('Unpublished') ?>
                    </a>
                    <a class="<?= parameters()->enabled === 1 ? 'active' : ''; ?>"
                       href="<?= route('enabled='.(parameters()->enabled === 1 ? '' : '1')) ?>">
                        <?= translate('Published') ?>
                    </a>
                </div>
                <div class="scopebar-search">
                    <?= helper('grid.search', array('submit_on_clear' => true)) ?>
                </div>
            </div>
            <div class="tada_table_container">
                <table class="table table-striped footable">
                <thead>
                    <tr>
                        <th style="text-align: center;" width="1">
                            <?= helper('grid.checkall')?>
                        </th>
                        <th class="tada_table__title_field">
                            <?= helper('grid.sort', array('column' => 'title', 'title' => 'Title')); ?>
                        </th>
                        <th width="5%" data-hide="phone,phablet">
                            <?= helper('grid.sort', array('column' => 'enabled', 'title' => 'Status')); ?>
                        </th>
                        <th width="5%" data-hide="phone,phablet,tablet">
                            <?= helper('grid.sort', array('column' => 'created_by', 'title' => 'Owner')); ?>
                        </th>
                        <th width="5%" data-hide="phone,phablet">
                            <?= helper('grid.sort', array('column' => 'created_on', 'title' => 'Date')); ?>
                        </th>
                    </tr>
                </thead>
                <? if (count($items)): ?>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <?= helper('paginator.pagination') ?>
                        </td>
                    </tr>
                </tfoot>
                <? endif; ?>
                <tbody>
                    <? foreach ($items as $item):
                        $item->isPermissible();
                        $location = false;
                    ?>
                    <tr>
                        <td style="text-align: center;">
                            <?= helper('grid.checkbox', array('entity' => $item)) ?>
                        </td>
                        <td class="tada_table__title_field">
                            <a href="<?= route('view=item&id='.$item->id); ?>">
                                <?= escape($item->title); ?></a>
                        </td>
                        <td style="text-align: center">
                            <?= helper('grid.publish', array('entity' => $item, 'clickable' => true)) ?>
                        </td>
                        <td>
                            <?= escape($item->getAuthor()->getName()); ?>
                        </td>
                        <td>
                            <?= helper('date.format', array('date' => $item->created_on)); ?>
                        </td>
                    </tr>
                    <? endforeach; ?>

                    <? if (!count($items)) : ?>
                    <tr>
                        <td colspan="9" align="center" style="text-align: center;">
                            <?= translate('No items found.') ?>
                        </td>
                    </tr>
                    <? endif; ?>
                </tbody>
            </table>
            </div>
        </form>
    </div>
</div>
