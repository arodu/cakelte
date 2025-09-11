<?php

use CakeLte\CakeLte;
use CakeLte\Enum\Layout;
use CakeLte\Style\Header;
use CakeLte\Style\Sidebar;

return [
    CakeLte::NAME => [
        'appName' => 'CakeLTE22',
        'appLogo' => 'CakeLte.cake.icon.svg',

        'layout' => Layout::FIXED_SIDEBAR,
        'rtl' => false,

        //'small-text' => false,
        //'dark-mode' => false,
        //'layout-boxed' => false,
        //
        //'header' => [
        //    'fixed' => false,
        //    'border' => true,
        //    'style' => Header::STYLE_WHITE,
        //    'dropdown-legacy' => false,
        //],
        //
        //'sidebar' => [
        //    'fixed' => true,
        //    'collapsed' => false,
        //    'mini' => true,
        //    'mini-md' => false,
        //    'mini-xs' => false,
        //    'style' => Sidebar::STYLE_DARK_PRIMARY,
        //
        //    'flat-style' => false,
        //    'legacy-style' => false,
        //    'compact' => false,
        //    'child-indent' => false,
        //    'child-hide-collapse' => false,
        //    'disabled-auto-expand' => false,
        //],
        //
        //'footer' => [
        //    'fixed' => false,
        //],
    ],
];