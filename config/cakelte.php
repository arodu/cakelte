<?php

use CakeLte\Style\Header;
use CakeLte\Style\Sidebar;

return [
    'CakeLte' => [
        'app-name' => 'Cake<b>LTE</b>',
        'app-logo' => 'CakeLte.cake.icon.svg',

        'small-text' => false,
        'dark-mode' => false,
        'layout-boxed' => false,

        'header' => [
            'fixed' => false,
            'border' => true,
            'style' => Header::STYLE_WHITE,
            'dropdown-legacy' => false,
        ],

        'sidebar' => [
            'fixed' => true,
            'collapsed' => false,
            'mini' => true,
            'mini-md' => false,
            'mini-xs' => false,
            'style' => Sidebar::STYLE_DARK_PRIMARY,

            'flat-style' => false,
            'legacy-style' => false,
            'compact' => false,
            'child-indent' => false,
            'child-hide-collapse' => false,
            'disabled-auto-expand' => false,
        ],

        'footer' => [
            'fixed' => false,
        ],
    ],
];