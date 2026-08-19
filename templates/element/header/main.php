<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <?php echo $this->element('CakeLte.header/menu') ?>

        <?php echo $this->element('CakeLte.header/search') ?>

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Search (small screens: the field above is hidden, so link to the search page)-->
            <li class="nav-item d-md-none">
                <a class="nav-link" href="<?= $searchAction ?? '#' ?>" aria-label="Search">
                    <i class="bi bi-search" aria-hidden="true"></i>
                </a>
            </li>
            <!--end::Search-->
            <?php echo $this->element('CakeLte.header/messages') ?>
            <?php echo $this->element('CakeLte.header/notifications') ?>
            <?php echo $this->element('CakeLte.header/language') ?>
            <?php echo $this->element('CakeLte.header/fullscreen') ?>
            <?php echo $this->element('CakeLte.header/color-mode') ?>
            <?php echo $this->element('CakeLte.header/user') ?>
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->