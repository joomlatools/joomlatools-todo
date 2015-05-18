<?php
/**
 * Todo - a Joomla example extension built with Nooku Framework.
 *
 * @package     Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA. (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/nooku/joomla-todo for the canonical source repository
 */

/**
 * Download Controller
 *
 * @author  Ercan Ozkaya <https://github.com/ercanozkaya>
 * @package Nooku\Component\Todo
 */
class ComTodoControllerAttachment extends ComTodoControllerTask
{
    /**
     * {@inheritdoc}
     */
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'model' => 'tasks'
        ));

        parent::_initialize($config);
    }

    /**
     * Sends the file to the browser
     *
     * @param KControllerContextInterface $context
     * @return void
     */
    protected function _actionRender(KControllerContextInterface $context)
    {
        //Execute the action
        $task = $this->execute('read', $context);

        if (!$task->isNew())
        {
            if ($task->attachment)
            {
                $file = $this->getObject('com:files.model.files')->setState(array(
                    'container' => 'todo-attachments',
                    'folder'    => dirname($task->attachment) === '.' ? '' : dirname($task->attachment),
                    'name'      => basename($task->attachment)
                ))->fetch();

                if (!$file->isNew())
                {
                    $this->getResponse()
                        ->attachTransport('stream')
                        ->setContent($file->fullpath, $file->mimetype ?: 'application/octet-stream');
                }
                else  throw new KControllerExceptionResourceNotFound('Attachment not found');
            }
            else  throw new KControllerExceptionResourceNotFound('Attachment not found');
        }
        else throw new KControllerExceptionResourceNotFound('Task not found');
    }
}