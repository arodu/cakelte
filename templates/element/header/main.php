<!--begin::Header-->
<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <?php echo $this->element('CakeLte.header/menu') ?>

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <?php echo $this->element('CakeLte.header/search') ?>
            <?php echo $this->element('CakeLte.header/messages') ?>
            <?php echo $this->element('CakeLte.header/notifications') ?>
            <?php echo $this->element('CakeLte.header/fullscreen') ?>
            <?php echo $this->element('CakeLte.header/user') ?>
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->