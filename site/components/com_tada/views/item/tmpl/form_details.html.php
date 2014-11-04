<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<? // Title field ?>
<div class="tada_grid">
    <div class="control-group tada_grid__item two-thirds">
        <label class="control-label" for="tada_form_title"><?= translate('Title') ?></label>
        <div class="controls">
            <div class="input-group">
                <input required class="input-group-form-control" id="tada_form_title" type="text" name="title" maxlength="255"
                       value="<?= escape($item->title); ?>" />
            </div>
        </div>
    </div>
    <div class="control-group tada_grid__item one-third">
        <label class="control-label" for="tada_form_alias"><?= translate('Alias') ?></label>
        <div class="controls">
            <input id="tada_form_alias" type="text" class="input-block-level" name="slug" maxlength="255"
                   value="<?= escape($item->slug) ?>" />
        </div>
    </div>
</div>