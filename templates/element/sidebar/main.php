<?php
/**
 * @var \App\View\AppView $this
 */
?>

<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <a href="<?= $this->Url->build('/') ?>" class="brand-link">
            <?= $this->Html->image($this->CakeLte->get('appLogo'), [
                'alt' => $this->CakeLte->get('appName'),
                'class' => 'brand-image opacity-75 shadow'
            ]) ?>            
            <span class="brand-text fw-light">
                <?= $this->CakeLte->get('appName') ?>
            </span>
        </a>
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <?= $this->element('CakeLte.sidebar/menu') ?>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->