<?php
declare(strict_types=1);

namespace CakeLte\Style;

use Cake\View\Helper;

/**
 * Styles trait
 */
trait StyleTrait
{
    protected array $custom_css_classes = [];

    protected Helper $helper;

    /**
     * @param \Cake\View\Helper $helper
     */
    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @param string $key
     * @param string $style
     * @param bool $autoload
     * @return void
     */
    public function addStyle(string $key, string $style, bool $autoload = true): void
    {
        $this->custom_css_classes[$key] = $style;

        if ($autoload) {
            $this->helper->setConfig($this->_name . '.style', $key);
        }
    }

    /**
     * @param string|null $key
     * @return string|null
     */
    public function getStyle(?string $key = null): ?string
    {
        if (empty($key)) {
            $key = $this->helper->getConfig($this->_name . '.style');
        }

        return $this->getStyles()[$key] ?? null;
    }

    /**
     * @return array
     */
    public function getStyles(): array
    {
        return array_merge(
            static::CSS_CLASSES,
            $this->custom_css_classes,
        );
    }
}
