<?php

/**
 * @var \App\View\AppView $this
 */


 $this->MenuLte->activeItem('sample');
$this->Menu->activeItem('0.1');

$navbar = [
    'firstItem' => [
        'label' => __('Active'),
        'url' => '#',
    ],
    [
        'label' => __('Dropdown'),
        'url' => '#',
        'children' => [
            [
                'label' => __('Action'),
                'url' => '#',
            ],
            [
                'label' => __('Another action'),
                'url' => '#',
            ],
            [
                'label' => __('Something else here'),
                'url' => '#',
            ],
            [
                'type' => $this->Menu::ITEM_TYPE_DIVIDER,
            ],
            [
                'label' => __('Separated link'),
                'url' => '#',
            ],
        ],
    ],
    [
        'label' => __('Link'),
        'url' => '#',
    ],
    [
        'label' => __('Disabled'),
        'url' => '#',
        'disabled' => true,
    ],
];

?>

<div class="card mb-4">
    <div class="card-body">
        <?= $this->Menu->render($navbar, ['menuClass' => 'nav']) ?>
    </div>
    <div class="card-body">
        <?= $this->Menu->render($navbar, ['menuClass' => 'nav nav-pills']) ?>
    </div>
    <div class="card-body">
        <?= $this->Menu->render($navbar, ['menuClass' => 'nav nav-tabs']) ?>
    </div>
    <div class="card-body">
        <?= $this->Menu->render($navbar, ['menuClass' => 'nav nav-underline']) ?>
    </div>
    <div class="card-body">
        <?= $this->Menu->render($navbar, ['menuClass' => 'nav nav-pills nav-fill']) ?>
    </div>
    <div class="card-body">
        <?= $this->Menu->render($navbar, ['menuClass' => 'nav flex-column nav-pills']) ?>
    </div>
</div>

<div class="card card-danger card-outline mb-4">
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">MenuHelper</div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?= $this->Menu->render($navbar, ['menuClass' => 'navbar-nav me-auto mb-2 mb-lg-0']) ?>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" data-sharkid="__6">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!--end::Body-->
</div>
