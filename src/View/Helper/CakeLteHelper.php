<?php
declare(strict_types=1);

namespace CakeLte\View\Helper;

use Cake\View\Helper;
use CakeLte\View\Styles\Header;
use CakeLte\View\Styles\Sidebar;

/**
 * CakeLte helper
 */
class CakeLteHelper extends Helper
{
    /**
     * Default configuration.
     *  'app-name' => 'Cake<b>LTE</b>',
     *  'app-logo' => 'CakeLte.cake.icon.svg',
     *  'small-text' => false,
     *  'dark-mode' => false,
     *  'layout-boxed' => false,
     *  'header.fixed' => false,
     *  'header.border' => true,
     *  'header.style' => Header::STYLE_WHITE,
     *  'header.dropdown-legacy' => false,
     *  'sidebar.fixed' => true,
     *  'sidebar.collapsed' => false,
     *  'sidebar.mini' => true,
     *  'sidebar.mini-md' => false,
     *  'sidebar.mini-xs' => false,
     *  'sidebar.style' => Sidebar::STYLE_DARK_PRIMARY,
     *  'sidebar.flat-style' => false,
     *  'sidebar.legacy-style' => false,
     *  'sidebar.compact' => false,
     *  'sidebar.child-indent' => false,
     *  'sidebar.child-hide-collapse' => false,
     *  'sidebar.disabled-auto-expand' => false,
     *  'footer.fixed' => false,
     *
     * @var array
     */
    protected $_defaultConfig = [
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
    ];

    public $Header;
    public $Sidebar;

    /**
     * @inheritDoc
     */
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

    /**
     * @return string
     */
    public function getHeaderClass(): string
    {
        $output = array_filter([
            $this->Header->getStyle() ?? null,
            $this->getConfig('header.border') ? null : 'border-bottom-0',
            $this->getConfig('header.dropdown-legacy') ? 'dropdown-legacy' : null,
        ]);

        return implode(' ', $output);
    }

    /**
     * @return string
     */
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

    /**
     * @return string
     */
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
