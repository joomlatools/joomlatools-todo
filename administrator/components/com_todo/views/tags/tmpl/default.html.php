<?
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-tag for the canonical source repository
 */

 defined('KOOWA') or die; ?>

 <?= helper('bootstrap.load', array('javascript' => true)); ?>
 <?= helper('behavior.koowa'); ?>

 <ktml:style src="media://koowa/com_koowa/css/admin.css" />

 <ktml:module position="submenu">
     <ktml:toolbar type="menubar">
 </ktml:module>

 <ktml:module position="toolbar">
     <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TAGS" icon="tag icon-tag">
 </ktml:module>

 <div class="tag-container">
     <div class="tag_admin_list_grid">
         <form action="" method="get" class="-koowa-grid">
             <div class="scopebar">
                 <div class="scopebar-group hidden-tablet hidden-phone">
                     <a class="<?= is_null(parameters()->enabled) ? 'active' : ''; ?>"
                        href="<?= route('enabled=&search=' ) ?>">
                         <?= translate('All') ?>
                     </a>
                 </div>
                 <div class="scopebar-search">
                     <?= helper('grid.search', array('submit_on_clear' => true)) ?>
                 </div>
             </div>
             <div class="tag_table_container">
                 <table class="table table-striped footable">
                 <thead>
                     <tr>
                         <th style="text-align: center;" width="1">
                             <?= helper('grid.checkall')?>
                         </th>
                         <th class="tag_table__title_field">
                             <?= helper('grid.sort', array('column' => 'title', 'title' => 'Title')); ?>
                         </th>
                         <th width="5%" data-hide="phone,phablet,tablet">
                             <?= helper('grid.sort', array('column' => 'created_by', 'title' => 'Owner')); ?>
                         </th>
                         <th width="5%" data-hide="phone,phablet">
                             <?= helper('grid.sort', array('column' => 'created_on', 'title' => 'Date')); ?>
                         </th>
                     </tr>
                 </thead>
                 <? if (count($tags)): ?>
                 <tfoot>
                     <tr>
                         <td colspan="4">
                             <?= helper('paginator.pagination') ?>
                         </td>
                     </tr>
                 </tfoot>
                 <? endif; ?>
                 <tbody>
                     <? foreach ($tags as $tag): ?>
                     <tr>
                         <td style="text-align: center;">
                             <?= helper('grid.checkbox', array('entity' => $tag)) ?>
                         </td>
                         <td class="tag_table__title_field">
                             <a href="<?= route('view=tag&id='.$tag->id); ?>">
                                 <?= escape($tag->title); ?></a>
                         </td>
                         <td>
                             <?= escape($tag->getAuthor()->getName()); ?>
                         </td>
                         <td>
                             <?= helper('date.format', array('date' => $tag->created_on)); ?>
                         </td>
                     </tr>
                     <? endforeach; ?>

                     <? if (!count($tags)) : ?>
                     <tr>
                         <td colspan="9" align="center" style="text-align: center;">
                             <?= translate('No tags found.') ?>
                         </td>
                     </tr>
                     <? endif; ?>
                 </tbody>
             </table>
             </div>
         </form>
     </div>
 </div>
