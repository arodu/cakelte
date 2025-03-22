<?php

/**
 * CakeLte CakePHP Plugin
 * 
 * @copyright 2025 Alberto Rodriguez
 * @author Alberto Rodriguez <arodu.dev@gmail.com>
 * @link https://github.com/arodu
 */

use BootstrapTools\View\Helper\MenuHelper;

return [
    'Menu' => [
        [
            'label' => __('MENU'),
            'type' => MenuHelper::ITEM_TYPE_TITLE
        ],
        [
            'label' => __('Home'),
            'url' => '/',
            'icon' => 'bi bi-grid-fill',
        ],
        'debug' => [
            'label' => __('Debug'),
            'url' => '/cakelte/debug',
            'icon' => 'bi bi-grid-fill',
        ],
        [
            'label' => __('Theme'),
            'url' => '/adminlte',
            'icon' => 'bi bi-grid-fill',
            'target' => '_blank',
        ],
        'sample' => [
            'label' => __('Sample'),
            'url' => '/cakelte/sample',
            'icon' => 'bi bi-grid-fill',
        ],
        [
            'label' => __('Level 1'),
            'children' => [
                [
                    'label' => __('Level 2'),
                    'url' => '#',
                ],
                [
                    'label' => __('Level 2'),
                    'children' => [
                        [
                            'label' => __('Level 3'),
                            'url' => '#',
                        ],
                        [
                            'label' => __('Level 3'),
                            'url' => '#',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
