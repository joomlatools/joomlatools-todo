<?
/**
 * @package    Tada
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>

<?= @helper('behavior.validator'); ?>

<ktml:style src="media://koowa/com_koowa/css/koowa.css" />

<ktml:module position="toolbar">
    <ktml:toolbar type="actionbar" icon="todo-add icon-pencil-2">
</ktml:module>

<div class="tada_form_layout">
    <form action="" method="post" class="-koowa-form">
        <div class="tada_container">
            <div class="tada_grid">
                <div class="tada_grid__item two-thirds">
                    <fieldset>

                        <legend><?= @translate('Details') ?></legend>

                        <div class="tada_grid">
                            <div class="control-group tada_grid__item two-thirds">
                                <label class="control-label" for="tada_form_title"><?= @translate('Title') ?></label>
                                <div class="controls">
                                    <div class="input-group">
                                        <input required class="input-group-form-control" id="tada_form_title" type="text" name="title" maxlength="255"
                                               value="<?= @escape($todo->title); ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group tada_grid__item one-third">
                                <label class="control-label" for="tada_form_alias"><?= @translate('Alias') ?></label>
                                <div class="controls">
                                    <input id="tada_form_alias" type="text" class="input-block-level" name="slug" maxlength="255"
                                           value="<?= @escape($todo->slug) ?>" />
                                </div>
                            </div>
                        </div>

                        <legend><?= @translate('Description') ?></legend>

                        <div class="tada_grid description_container">
                            <div class="control-group tada_grid__item one-whole">
                                <div class="controls">
                                    <?= @editor(array(
                                        'name' => 'description',
                                        'id'   => 'description',
                                        'width' => '100%',
                                        'height' => '341',
                                        'cols' => '100',
                                        'rows' => '20',
                                        'buttons' => array('pagebreak')
                                    )); ?>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="tada_grid__item one-third">
                    <fieldset>

                        <legend><?= @translate('Publishing') ?></legend>

                        <div class="tada_grid">
                            <div class="control-group tada_grid__item one-whole">
                                <label class="control-label"><?= @translate('Status'); ?></label>
                                <div class="controls radio btn-group">
                                    <?= @helper('select.booleanlist', array(
                                        'name' => 'enabled',
                                        'selected' => $todo->enabled,
                                        'true' => @translate('Published'),
                                        'false' => @translate('Unpublished')
                                    )); ?>
                                </div>
                            </div>
                        </div>

                        <input name="created_by" id="created_by" value="<?= $todo->created_by ? $todo->created_by : @object('user')->getId(); ?>" type="hidden" disabled="disabled">
                    </fieldset>
                </div>
            </div>
        </div>

    </form>
</div>