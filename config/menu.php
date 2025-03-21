<?php
/**
 * BootstrapTools CakePHP Plugin
 * 
 * @copyright 2025 Alberto Rodriguez
 * @author Alberto Rodriguez <arodu.dev@gmail.com>
 * @link https://github.com/arodu
 */

use BootstrapTools\View\Helper\MenuHelper;
use Cake\Http\ServerRequest;

return [
    'Menu' => [
        [
            'label' => __('Menu'),
            'type' => MenuHelper::ITEM_TYPE_TITLE
        ],
        [
            'label' => __('Home'),
            'url' => '/',
            'icon' => 'bi bi-grid-fill',
            'active' => function (ServerRequest $request) {
                return true;
            }
        ],
    ],
];