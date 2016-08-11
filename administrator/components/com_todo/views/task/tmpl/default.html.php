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

<?
/**
 * @package     DOCman
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die; ?>


<?= helper('ui.load') ?>


<?= helper('behavior.keepalive'); ?>
<?= helper('behavior.validator'); ?>


<!-- Wrapper -->
<div class="k-wrapper k-js-wrapper">

    <!-- Overview -->
    <div class="k-content-wrapper">

        <!-- The content -->
        <div class="k-content k-js-content">

            <!-- Toolbar -->
            <ktml:toolbar type="actionbar">

                <!-- Component -->
                <div class="k-component">

                    <!-- Form -->
                    <form class="k-flex-wrapper k-js-form-controller" action="" method="post">

                        <!-- Container -->
                        <div class="k-container">

                            <!-- Main information -->
                            <div class="k-container__main">

                                <fieldset>

                                    <div class="k-form-group k-form-group--large">
                                        <input required class="k-form-control"
                                               id="todo_form_title"
                                               type="text"
                                               name="title"
                                               maxlength="255"
                                               placeholder="<?= translate('Title') ?>"
                                               value="<?= escape($task->title); ?>" />
                                    </div>

                                    <div class="k-form-group">
                                        <div class="k-input-group k-input-group--small">
                                            <label for="todo_form_alias" class="k-input-group__addon">
                                                <?= translate('Alias') ?>
                                            </label>
                                            <input id="todo_form_alias" type="text" class="k-form-control" name="slug" maxlength="255"
                                                   value="<?= escape($task->slug) ?>" />
                                        </div>
                                    </div>

                                    <div class="k-form-group">
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

                                </fieldset>

                            </div><!-- .k-container__main -->

                            <!-- Other information -->
                            <div class="k-container__sub">

                                <fieldset class="k-form-block">

                                    <div class="k-form-block__header">
                                        <?= translate('Publishing') ?>
                                    </div>

                                    <div class="k-form-block__content">
                                        <div class="k-form-group">
                                            <label class="control-label"><?= translate('Status'); ?></label>
                                            <?= helper('select.booleanlist', array(
                                                'name' => 'enabled',
                                                'selected' => $task->enabled,
                                                'true' => translate('Published'),
                                                'false' => translate('Unpublished')
                                            )); ?>
                                        </div>
                                    </div>

                                </fieldset>

                            </div><!-- .k-container__sub -->

                        </div><!-- .k-container -->

                    </form><!-- .k-flex-wrapper -->

                </div><!-- .k-component -->

        </div><!-- .k-content -->

    </div><!-- .k-content-wrapper -->

</div><!-- .k-wrapper -->

<div class="todo_form_layout k-dynamic-content-holder">
    <form action="" method="post" class="-koowa-form">
        <div class="todo_container">
            <div class="todo_grid">
                <div class="todo_grid__task two-thirds">
                    <fieldset>

                        <legend><?= translate('Details') ?></legend>

                        <div class="todo_grid">
                            <div class="control-group todo_grid__task two-thirds">
                                <label class="control-label" for="todo_form_title"><?= translate('Title') ?></label>
                                <div class="controls">
                                    <div class="input-group">
                                        <input required class="input-group-form-control" id="todo_form_title" type="text" name="title" maxlength="255"
                                               value="<?= escape($task->title); ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="control-group todo_grid__task one-third">
                                <label class="control-label" for="todo_form_alias"><?= translate('Alias') ?></label>
                                <div class="controls">
                                    <input id="todo_form_alias" type="text" class="input-block-level" name="slug" maxlength="255"
                                           value="<?= escape($task->slug) ?>" />
                                </div>
                            </div>
                        </div>

                        <legend><?= translate('Description') ?></legend>

                        <div class="todo_grid description_container">
                            <div class="control-group todo_grid__task one-whole">
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
                </div>
                <div class="todo_grid__task one-third">
                    <fieldset>

                        <legend><?= translate('Publishing') ?></legend>

                        <div class="todo_grid">
                            <div class="control-group todo_grid__task one-whole">
                                <label class="control-label"><?= translate('Status'); ?></label>
                                <div class="controls radio btn-group">
                                    <?= helper('select.booleanlist', array(
                                        'name' => 'enabled',
                                        'selected' => $task->enabled,
                                        'true' => translate('Published'),
                                        'false' => translate('Unpublished')
                                    )); ?>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

    </form>
</div>