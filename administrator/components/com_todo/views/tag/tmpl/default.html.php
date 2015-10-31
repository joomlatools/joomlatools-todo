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

<?= helper('behavior.validator'); ?>

<ktml:style src="media://koowa/com_koowa/css/admin.css" />

<ktml:module position="toolbar">
    <ktml:toolbar type="actionbar" icon="tag-add icon-pencil-2">
</ktml:module>

<div class="tag_form_layout">
    <form action="" method="post" class="-koowa-form">
        <div class="tag_container">
            <div class="tag_grid">
                <fieldset>
                <legend><?= translate('Details') ?></legend>
                    <div class="tag_grid">
                        <div class="control-group">
                            <label class="control-label" for="tag_form_title"><?= translate('Title') ?></label>
                            <div class="controls">
                                <div class="input-group">
                                    <input required class="input-block-level" id="tag_form_title" type="text" name="title" maxlength="255" value="<?= escape($tag->title); ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="tag_form_alias"><?= translate('Alias') ?></label>
                            <div class="controls">
                                <input id="tag_form_alias" type="text" class="input-block-level" name="slug" maxlength="255" value="<?= escape($tag->slug) ?>" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </form>
</div>
