<?php

declare(strict_types=1);

namespace CakeLte\View\Styles;

/**
 * Styles trait
 */
trait StylesTrait
{

    /**
     * @param string $key
     * @param string $style
     * @param boolean $autoload
     * @return void
     */
    public function addStyle(string $key, string $style, bool $autoload = true): void
    {
        $this->_styles[$key] = $style;

        if ($autoload) {
            $this->_helper->setConfig($this->_name . '.style', $key);
        }
    }

    /**
     * @param string|null $key
     * @return string|null
     */
    public function getStyle(string $key = null): ?string
    {
        if (empty($key)) {
            $key = $this->_helper->getConfig($this->_name . '.style');
        }

        return $this->_styles[$key] ?? null;
    }
}
