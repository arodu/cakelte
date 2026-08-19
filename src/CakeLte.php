<?php
declare(strict_types=1);

namespace CakeLte;

abstract class CakeLte
{
    public const LAYOUT_DEFAULT = 'CakeLte.default';
    public const LAYOUT_LOGIN = 'CakeLte.login';
    public const LAYOUT_TOP_NAV = 'CakeLte.top-nav';

    public const NAME = 'CakeLte';
    public const MENU = 'CakeLteMenu';
    public const MENU_CONFIG = [
        'configFile' => 'CakeLte.menu',
        'configKey' => 'Menu',

        'maxLevel' => 3,
        'activeClass' => 'active',
        'dropdownOpenClass' => 'menu-open',
        'defaultIcon' => [
            0 => 'bi bi-circle-fill',
            1 => 'bi bi-circle',
            2 => 'bi bi-record-circle-fill',
            'default' => 'bi bi-circle',
        ],
        'templates' => [
            /**
             * Default templates for menu items.
             */
            'menuContainer' => '<ul id="navigation" class="nav sidebar-menu flex-column" data-lte-toggle="treeview"
                role="menu" data-accordion="false">{{items}}</ul>',
            'menuItem' => '<li class="nav-item{{class}}{{dropdownClass}}"{{attrs}}>{{text}}{{children}}</li>',
            'menuItemLink' => '<a href="{{url}}" class="nav-link{{class}}{{activeClass}}"{{attrs}}>{{icon}}
                <p>{{text}}{{append}}</p></a>',
            'menuItemDisabled' => '<li class="nav-item"><a class="nav-link disabled" aria-disabled="true"{{attrs}}>
                {{icon}}<p>{{text}}</p></a></li>',
            'menuItemLinkDropdown' => '<a href="{{url}}" class="nav-link{{class}}{{activeClass}}"{{attrs}}>{{icon}}
                <p>{{text}}{{append}}<i class="nav-arrow bi bi-chevron-right"></i></p></a>',
            'menuItemDivider' => '<li><hr class="dropdown-divider"></li>',
            'menuItemTitle' => '<li class="nav-header">{{text}}</li>',
            'dropdownIcon' => '', // '<i class="bi bi-chevron-right"></i>',


            /**
             * Default templates for dropdown items.
             */
            'dropdownContainer' => '<ul class="nav nav-treeview">{{items}}</ul>',
            'dropdownItem' => '<li class="nav-item"{{attrs}}>{{text}}{{children}}</li>',
            'dropdownItemLink' => '<a href="{{url}}" class="nav-link{{activeClass}}"{{attrs}}>{{icon}}
                <p>{{text}}{{append}}</p></a>',
            'dropdownItemDisabled' => '<li class="nav-item"{{attrs}}><a class="dropdown-item disabled">
                {{icon}}{{text}}</a></li>',
            'dropdownItemLinkDropdown' => '<a href="{{url}}" class="nav-link{{activeClass}}"{{attrs}}>{{icon}}
                <p>{{text}}{{append}}<i class="nav-arrow bi bi-chevron-right"></i></p></a>',
            'dropdownItemDivider' => '<li><hr class="dropdown-divider"></li>',
            'dropdownItemTitle' => '<li class="dropdown-header">{{text}}</li>',

            /**
             * Default templates for other items.
             */
            'icon' => '<i class="nav-icon {{icon}}"></i>',
        ],
    ];
}
