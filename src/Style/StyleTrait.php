<?php

declare(strict_types=1);

namespace CakeLte\Style;

/**
 * Styles trait
 */
trait StyleTrait
{
    protected $custom_css_classes = [];

    public function __construct($helper)
    {
        $this->_helper = $helper;
    }

    /**
     * @param string $key
     * @param string $style
     * @param boolean $autoload
     * @return void
     */
    public function addStyle(string $key, string $style, bool $autoload = true): void
    {
        $this->custom_css_classes[$key] = $style;

        if ($autoload) {
            $this->_helper->setConfig($this->_name . '.style', $key);
        }
    }

    /**
     * @param string|null $key
     * @return string|null
     */
    public function getStyle(?string $key = null): ?string
    {
        if (empty($key)) {
            $key = $this->_helper->getConfig($this->_name . '.style');
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
