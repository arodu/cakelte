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
    <!--begin::Sidebar Search-->
    <div class="sidebar-search" role="search">
        <label for="sidebar-search-input" class="visually-hidden">
            <?= __('Filter menu') ?>
        </label>
        <input
            type="search"
            id="sidebar-search-input"
            class="form-control form-control-sm"
            placeholder="Filter menu…"
            autocomplete="off"
            data-lte-toggle="sidebar-search"
            data-lte-target="#navigation"
        />
        <p class="fs-7 text-secondary mt-2 mb-0" data-lte-search-empty role="status" hidden>
            <?= __('No matching pages.') ?>
        </p>
    </div>
    <!--end::Sidebar Search-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Main navigation">
            <?= $this->element('CakeLte.sidebar/menu') ?>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->