<!--begin::Notifications Dropdown Menu-->
<li class="nav-item dropdown">
    <a class="nav-link" data-bs-toggle="dropdown" href="#">
        <i class="bi bi-bell-fill"></i>
        <span class="navbar-badge badge text-bg-warning">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
        <span class="dropdown-item dropdown-header"><?= __('{0} Notifications', '15') ?></span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="bi bi-envelope me-2"></i> <?= __('{0} new messages', '4') ?>
            <span class="float-end text-secondary fs-7"><?= __('{0} mins', '3') ?></span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="bi bi-people-fill me-2"></i> <?= __('{0} friend requests', '8') ?>
            <span class="float-end text-secondary fs-7"><?= __('{0} hours', '12') ?></span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="bi bi-file-earmark-fill me-2"></i> <?= __('{0} new reports', '3') ?>
            <span class="float-end text-secondary fs-7"><?= __('{0} days', '2') ?></span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer"> <?= __('See All Notifications') ?> </a>
    </div>
</li>
<!--end::Notifications Dropdown Menu-->