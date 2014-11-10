<?
/**
 * @package    Todo
 * @copyright   Copyright (C) 2011 - 2014 Timble CVBA (http://www.timble.net)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.joomlatools.com
 */
defined('KOOWA') or die;

$show_delete   = $item->canPerform('delete');
$show_edit     = $item->canPerform('edit');
$button_size   = 'btn-small';
?>

<? // Edit and delete buttons ?>
<? if (!($item->isLockable() && $item->isLocked()) && ($show_edit || $show_delete)): ?>
<div class="btn-toolbar koowa_toolbar">
        <div class="btn-group">

        <? // Edit ?>
        <? if ($show_edit): ?>
            <a class="btn <?= $button_size ?>"
               href="<?= route('view=item&id='.$item->id.'&layout=form&tmpl=koowa');?>"
            ><?= translate('Edit'); ?></a>
        <? endif ?>

        <? // Delete ?>
        <? if ($show_delete):
            $data = array(
                'method' => 'post',
                'url'    => (string)route('view=item&id='.$item->id),
                'params' => array(
                    'csrf_token' => object('user')->getSession()->getToken(),
                    '_action'    => 'delete',
                    '_referrer'  => base64_encode((string) object('request')->getUrl())
                )
            );

            if (parameters()->view == 'item')
            {
                if ((string)object('request')->getReferrer()) {
                    $data['params']['_referrer'] = base64_encode((string) object('request')->getReferrer());
                } else {
                    $data['params']['_referrer'] = base64_encode(JURI::base());
                }

            }
        ?>
            <?= helper('behavior.deletable'); ?>
            <a class="btn <?= $button_size ?> btn-danger todo-deletable" href="#" rel="<?= escape(json_encode($data)) ?>">
                <?= translate('Delete') ?>
            </a>
        <? endif ?>
    </div>
</div>
<? endif ?>
