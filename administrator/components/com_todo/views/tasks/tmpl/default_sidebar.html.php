<?
/**
 * @package     com_todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<ktml:script src="media://com_todo/js/admin/tagfilter.js" />

<div id="tasks-sidebar">
  <div class="sidebar-inner">
    <h3><?= translate('Filter'); ?></h3>
    <div id="tag-list">
        <div class="control-group">
          <div class="controls">
            <?= helper('com:tags.listbox.tags', array(
                'name' => 'tag',
                'attribs' => array(
                    'multiple' => 'multiple',
                    'style' => 'width:100%',
                    'form' => 'tasks-form'
                  )
                )
            ); ?>
          </div>
        </div>

        <div class="well well-small">
            <button type="submit" class="btn btn-small" form="tasks-form">
              <?= @translate('Filter') ?>
            </button>
        </div>
    </div>
  </div>
</div>
