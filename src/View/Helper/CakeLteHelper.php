<?php
declare(strict_types=1);

namespace CakeLte\View\Helper;

use BootstrapTools\View\Trait\ThemeSettingsTrait;
use Cake\View\Helper;
use CakeLte\CakeLte;
use CakeLte\Enum\Layout;

/**
 * CakeLte helper
 *
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class CakeLteHelper extends Helper
{
    use ThemeSettingsTrait;

    /**
     * Helpers used by this helper
     *
     * @var array<int|string, string|array<string, mixed>>
     */
    protected array $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [
        'configKey' => CakeLte::NAME,
        'settings' => [
            'appName' => 'CakeLte',
            'appLogo' => 'CakeLte.cake.icon.svg',
        ],
        'autoRenderAssets' => false,
        'meta' => [],
        'css' => [
            'https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css',
            'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css',
            '/adminlte/dist/css/adminlte',
            'CakeLte.style',
        ],
        'scripts' => [
            'https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js',
            'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js',
            '/adminlte/dist/js/adminlte',
        ],
    ];

    /**
     * @inheritDoc
     */
    public function initialize(array $config): void
    {
        $this->themeSettingsInitialize($config);
    }

    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        $logo = $this->get('appLogo');

        if (empty($logo)) {
            return null;
        }

        return $this->Html->image($logo, ['alt' => $this->get('appName'), 'class' => 'brand-image']);
    }

    /**
     * @return string|null
     */
    public function rtl(): ?string
    {
        if ($this->get('rtl') ?? false) {
            return 'dir="rtl"';
        }

        return null;
    }

    /**
     * @return string
     */
    public function getBodyClass(): string
    {
        $layout = match (true) {
            $this->get('layout') instanceof Layout => $this->get('layout')->getCssClass(),
            is_string($this->get('layout')) => $this->get('layout'),
            default => null,
        };

        $output = array_filter([
            $layout,
        ]);

        return implode(' ', $output);
    }
}
