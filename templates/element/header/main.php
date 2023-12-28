<!-- Left navbar links -->
<ul class="navbar-nav">
    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
    <?= $this->element('CakeLte.header/menu') ?>
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
    <!-- Navbar Search -->
    <?= $this->element('CakeLte.header/search-block') ?>

    <!-- Messages Dropdown Menu -->
    <?= $this->element('CakeLte.header/messages') ?>

    <!-- Notifications Dropdown Menu -->
    <?= $this->element('CakeLte.header/notifications') ?>


    <!--begin::Fullscreen Toggle-->
    <li class="nav-item">
        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
        </a>
    </li> <!--end::Fullscreen Toggle-->
    <!--begin::User Menu Dropdown-->

    <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="/adminlte/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">Alexander Pierce</span> </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
            <li class="user-header text-bg-primary"> <img src="/adminlte/dist/assets/img/user2-160x160.jpg" class="rounded-circle shadow" alt="User Image">
                <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2023</small>
                </p>
            </li> <!--end::User Image--> <!--begin::Menu Body-->
            <li class="user-body"> <!--begin::Row-->
                <div class="row">
                    <div class="col-4 text-center"> <a href="#">Followers</a> </div>
                    <div class="col-4 text-center"> <a href="#">Sales</a> </div>
                    <div class="col-4 text-center"> <a href="#">Friends</a> </div>
                </div> <!--end::Row-->
            </li> <!--end::Menu Body--> <!--begin::Menu Footer-->
            <li class="user-footer"> <a href="#" class="btn btn-default btn-flat">Profile</a> <a href="#" class="btn btn-default btn-flat float-end">Sign out</a> </li> <!--end::Menu Footer-->
        </ul>
    </li>
    <!--end::User Menu Dropdown-->
</ul>