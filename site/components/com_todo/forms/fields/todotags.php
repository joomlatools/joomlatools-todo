<?php
/**
 * @package     joomla-todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */

class JFormFieldTodotags extends JFormField
{
    protected $type = 'Todotags';

    protected function getInput()
    {
        if (!class_exists('Koowa')) {
            return '';
        }

        $value = $this->value;
        $el_name = $this->name;

        $key_field = (string) $this->element['key_field'];
        $multiple = (string) $this->element['multiple'] == 'true';
        $deselect = (string) $this->element['deselect'] === 'true';
        $id = isset($this->element['id']) ? (string) $this->element['element_id'] : 'todo_tags_select2';

        KObjectManager::getInstance()->getObject('translator')->load('com://admin/todo');

        $view = KObjectManager::getInstance()->getObject('com://admin/todo.view.default.html');

        $template = $view->getTemplate()->addFilter('style')->addFilter('script');

        $attribs = array();

        if ($multiple)
        {
            $attribs['multiple'] = true;
            $attribs['size'] = $this->element['size'] ? $this->element['size'] : 5;
        }

        $value_field = $key_field ? $key_field : 'slug';

        $string = "
        <?= helper('bootstrap.load'); ?>
        <?= helper('com:tags.listbox.tags', array(
            'name' => \$el_name,
            'value' => \$value_field,
            'deselect' => \$deselect,
            'selected' => \$value,
            'attribs' => array_merge(\$attribs, array(
                'class' => 'select-tags',
                'id' => \$id,
                'multiple' => 'multiple',
                'data-placeholder' => translate('Select Tags')))
                )); ?>";

        return $template->loadString($string, 'php')
            ->render(array(
                'el_name'     => $el_name,
                'value'       => $value,
                'value_field' => $value_field,
                'deselect'    => $deselect,
                'attribs'     => $attribs,
                'id'          => $id
            ));
    }
}
