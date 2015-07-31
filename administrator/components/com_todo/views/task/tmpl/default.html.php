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

<?= helper('behavior.validator'); ?>
<?= helper('bootstrap.load', array('javascript' => true)); ?>
<?= helper('behavior.koowa'); ?>

<ktml:module position="toolbar">
    <ktml:toolbar type="actionbar" icon="task-add icon-pencil-2">
</ktml:module>

<ktml:style src="assets://css/admin-joomla.css" />
<ktml:script src="assets://js/modernizr.js" />
<ktml:script src="assets://js/scripts.js" />

<?php // JFactory::getApplication()->enqueueMessage('Message'); ?>

<script data-inline type="text/javascript">var el = document.body; var cl = 'k-js-enabled'; if (el.classList) { el.classList.add(cl); }else{ el.className += ' ' + cl;}</script>

<!-- Begin Form layout -->
<div class="k-form">

    <!-- The form -->
    <form action="" method="post" class="k-content-wrapper -koowa-form">

        <!-- The content -->
        <div class="k-content">

            <!-- Toolbar -->
            <div class="k-toolbar">
                <div class="koowa-toolbar">
                    <ktml:toolbar type="actionbar" title="COM_TODO_SUBMENU_TASKS" icon="task icon-stack">
                </div>
            </div>

            <!-- Component -->
            <div class="k-component">

                <!-- Grid container -->
                <div class="container-fluid">

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Two thirds -->
                        <div class="col-sm-8">

                            <fieldset>

                                <?php // @TODO: make sure we can just delete this <legend> without a new one being created ?>
                                <legend style="height:0;overflow:hidden;padding:0;margin:0;border:none;"><?= translate('') ?></legend>

                                <div class="row">
                                    <div class="control-group col-xs-12">
                                        <div class="controls">

                                            <input
                                                required
                                                class="form-control input-lg"
                                                id="todo_form_title"
                                                type="text"
                                                name="title"
                                                maxlength="255"
                                                value="<?= escape($task->title); ?>"
                                                placeholder="Enter title here"
                                            />

                                        </div>
                                    </div>
                                    <div class="control-group col-xs-12">
                                        <div class="controls">

                                            <div class="input-group input-group-sm">
                                                <label for="todo_form_alias" class="input-group-addon">
                                                    Alias
                                                </label>
                                                <input
                                                    id="todo_form_alias"
                                                    type="text"
                                                    class="form-control"
                                                    name="slug"
                                                    maxlength="255"
                                                    value="<?= escape($task->slug) ?>"
                                                    placeholder="Will be created automatically"
                                                />
                                                <div class="input-group-btn">
                                                    <button class="btn btn-md btn-default mfp-iframe" data-mfp-src="assets://css/new-ui-file-popup-example.html">Modal-file</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="control-group col-xs-12">
                                        <div class="controls">
                                            <?= helper('editor.display', array(
                                                'name' => 'description',
                                                'value' => $task->description,
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
                        </div><!-- Two thirds -->

                        <!-- One third -->
                        <div class="col-sm-4">

                            <fieldset class="k-form-block">

                                <div class="k-form-block__header">
                                    <?= translate('Publishing') ?>
                                </div>

                                <div class="k-form-block__content">
                                    <div class="row">
                                        <div class="control-group col-xs-12">
                                            <div class="control-content">
                                                <label class="control-label">Status</label>
                                                <div class="controls">
                                                    <div class="radio-toggle">
                                                        <div class="radio-toggle-item">
                                                            <input type="radio" name="status" id="status1" value="1" checked="checked">
                                                            <label for="status1">
                                                                <span>
                                                                    Published
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="radio-toggle-item">
                                                            <input type="radio" name="status" id="status0" value="0">
                                                            <label for="status0">
                                                                <span>
                                                                    Unpublished
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php // @TODO: Make sure code below generates code above
                                            if ( 1 == 2 ) :?>
                                                <?= helper('select.booleanlist', array(
                                                    'name' => 'enabled',
                                                    'selected' => $task->enabled,
                                                    'true' => translate('Published'),
                                                    'false' => translate('Unpublished')
                                                )); ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div><!-- One third -->
                    </div><!-- Grid row -->
                </div><!-- .container-fluid -->

            </div><!-- .k-component -->

        </div><!-- .k-content -->

    </form><!-- .k-content-wrapper -->

</div><!-- .k-form -->