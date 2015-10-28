<div id="k-sidebar" class="k-sidebar">
    <!-- Navigation -->
    <div class="k-sidebar__navigation">
        <ktml:toolbar type="menubar">
    </div>

    <!-- Filters -->
    <div class="k-sidebar__item">
        <div class="k-sidebar__header">
            <?= translate('Quick filters:'); ?>
        </div>
        <ul class="k-list">
            <li class="<?= is_null(parameters()->created_by) && parameters()->sort != 'sort' && parameters()->direction != 'desc' ? 'active' : ''; ?>">
                <a href="<?= route('created_by=&sort=&direction=') ?>">
                    <span class="k-icon-list"></span>
                    <?= translate('All tasks'); ?>
                </a>
            </li>
            <li class="<?= parameters()->created_by ? 'active' : ''; ?>">
                <a href="<?= route('created_by='.object('user')->getId().'&sort=&direction=') ?>">
                    <span class="k-icon-person"></span>
                    <?= translate('My tasks'); ?>
                </a>
            </li>
            <li class="<?= parameters()->sort == 'last_modified_on' && parameters()->direction == 'desc' ? 'active' : ''; ?>">
                <a href="<?= route('sort=last_modified_on&direction=desc&created_by=') ?>">
                    <span class="k-icon-clock"></span>
                    <?= translate('Recently edited'); ?>
                </a>
            </li>
        </ul>
    </div>
</div><!-- .k-sidebar -->