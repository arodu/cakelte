<?php
declare(strict_types=1);

namespace CakeLte\View\Helper;

use Cake\View\Helper;
use CakeLte\View\Styles\Header;
use CakeLte\View\Styles\Sidebar;

//use CakeLte\View\Styles\Navbar;

/**
 * CakeLte helper
 */
class CakeLteHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'app-name' => 'Cake<b>LTE</b>',          // [string] default='Cake<b>LTE</b>'
        'app-logo' => 'CakeLte.cake.icon.svg',   // [string] default='CakeLte.cake.icon.png'

        'small-text' => false,          //  options: true|false
        'dark-mode' => false,           //  options: true|false
        'layout-boxed' => false,

        'header' => [
            'fixed' => false,           //  options: true|false
            'border' => true,           //  options: true|false
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

        'brand' => [
            'style' => '',
            'text-style' => '',
        ],

    ];

    public $Header;
    public $Sidebar;

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->Header = new Header($this);
        $this->Sidebar = new Sidebar($this);
    }

    /**
     * @return string
     */
    public function getBodyClass(): string
    {
        $output = array_filter([
            $this->getConfig('small-text') ? 'text-sm' : null,
            $this->getConfig('dark-mode') ? 'dark-mode' : null,
            $this->getConfig('layout-boxed') ? 'layout-boxed' : null,
            $this->getConfig('header.fixed') ? 'layout-navbar-fixed' : null,
            $this->getConfig('sidebar.fixed') ? 'layout-fixed' : null,
            $this->getConfig('sidebar.mini') ? 'sidebar-mini' : null,
            $this->getConfig('sidebar.mini-md') ? 'sidebar-mini-md' : null,
            $this->getConfig('sidebar.mini-xs') ? 'sidebar-mini-xs' : null,

            $this->getConfig('sidebar.collapsed') ? 'sidebar-collapse' : null,
            $this->getConfig('footer.fixed') ? 'layout-footer-fixed' : null,
        ]);

        return implode(' ', $output);
    }


    public function getHeaderClass(): string
    {
        $output = array_filter([
            $this->Header->getStyle() ?? null,
            $this->getConfig('header.border') ? null : 'border-bottom-0',
            $this->getConfig('header.dropdown-legacy') ? 'dropdown-legacy' : null,
        ]);

        return implode(' ', $output);
    }

    public function getSidebarClass(): string
    {
        $output = array_filter([
            $this->Sidebar->getStyle() ?? null,
            'elevation-4',
            $this->getConfig('sidebar.fixed') ? 'layout-fixed' : null,
            $this->getConfig('sidebar.disabled-auto-expand') ? 'sidebar-no-expand' : null,
        ]);

        return implode(' ', $output);
    }

    public function getMenuClass(): string
    {
        $output = array_filter([
            $this->getConfig('sidebar.flat-style') ? 'nav-flat' : null,
            $this->getConfig('sidebar.legacy-style') ? 'nav-legacy' : null,
            $this->getConfig('sidebar.compact') ? 'nav-compact' : null,
            $this->getConfig('sidebar.child-indent') ? 'nav-child-indent' : null,
            $this->getConfig('sidebar.child-hide-collapse') ? 'nav-collapse-hide-child' : null,
        ]);

        return implode(' ', $output);
    }


}
