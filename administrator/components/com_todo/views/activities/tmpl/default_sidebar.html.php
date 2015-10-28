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
            <li class="<?= is_null(parameters()->user) ? 'active' : ''; ?>">
                <a href="<?= route('user=') ?>">
                    <span class="k-icon-list"></span>
                    <?= translate('All activities'); ?>
                </a>
            </li>
            <li class="<?= parameters()->user ? 'active' : ''; ?>">
                <a href="<?= route('user='.object('user')->getId()) ?>">
                    <span class="k-icon-person"></span>
                    <?= translate('My activities'); ?>
                </a>
            </li>
        </ul>
    </div>
</div><!-- .k-sidebar -->
