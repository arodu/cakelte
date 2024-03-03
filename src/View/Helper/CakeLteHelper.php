<?php
declare(strict_types=1);

namespace CakeLte\View\Helper;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\View\Helper;
use CakeLte\Style\Header;
use CakeLte\Style\Sidebar;
use Composer\Json\JsonFile;
use Exception;

/**
 * CakeLte helper
 */
class CakeLteHelper extends Helper
{
    protected array $_defaultConfig = [
        'configFile' => null,
    ];

    public const DEFAULT_APP_CONFIG_FILE = 'cakelte';
    public const DEFAULT_PLUGIN_CONFIG_FILE = 'CakeLte.cakelte';

    public Header $Header;
    public Sidebar $Sidebar;

    /**
     * @inheritDoc
     */
    public function initialize(array $config): void
    {
        try {
            Configure::load(static::DEFAULT_PLUGIN_CONFIG_FILE);
            Configure::load($this->getConfig('configFile') ?? static::DEFAULT_APP_CONFIG_FILE);
        } catch (Exception $e) {
            Log::alert('App config file doesn`t exist');
        }
        $this->setConfig(Configure::read('CakeLte'));
        $this->setConfig($config);
        $this->Header = new Header($this);
        $this->Sidebar = new Sidebar($this);
        parent::initialize($config);
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

    /**
     * @return string
     */
    public function version(): string
    {
        return Cache::remember('cakelte_version', function () {
            $lockFile = new JsonFile(ROOT . DIRECTORY_SEPARATOR . 'composer.lock');
            if ($lockFile->exists()) {
                $lockContent = $lockFile->read();
                foreach ($lockContent['packages'] as $package) {
                    if ($package['name'] === 'arodu/cakelte') {
                        return $package['version'];
                    }
                }
            }

            return 'unknow version';
        });
    }
}
