<!--begin::User Menu Dropdown-->
<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        <?= $this->Html->image('/adminlte/dist/assets/img/user2-160x160.jpg', ['alt' => 'User Image', 'class' => 'user-image rounded-circle shadow']) ?>
        <span class="d-none d-md-inline">Alexander Pierce</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
        <!--begin::User Image-->
        <li class="user-header text-bg-primary">
            <?= $this->Html->image('/adminlte/dist/assets/img/user2-160x160.jpg', ['alt' => 'User Image', 'class' => 'rounded-circle shadow']) ?>
            <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2023</small>
            </p>
        </li>
        <!--end::User Image-->
        <!--begin::Menu Body-->
        <li class="user-body">
            <!--begin::Row-->
            <div class="row">
                <div class="col-4 text-center"><a href="#">Followers</a></div>
                <div class="col-4 text-center"><a href="#">Sales</a></div>
                <div class="col-4 text-center"><a href="#">Friends</a></div>
            </div>
            <!--end::Row-->
        </li>
        <!--end::Menu Body-->
        <!--begin::Menu Footer-->
        <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
        </li>
        <!--end::Menu Footer-->
    </ul>
</li>
<!--end::User Menu Dropdown-->