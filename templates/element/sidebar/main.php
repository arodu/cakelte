<!-- Sidebar user panel (optional) -->
<?= $this->element('sidebar/user') ?>
<?= $this->element('sidebar/search') ?>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column <?= $this->CakeLte->getMenuClass() ?>" data-widget="treeview" role="menu" data-accordion="false">
        <?php echo $this->element('sidebar/menu') ?>
    </ul>
</nav>
