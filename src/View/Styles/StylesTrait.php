<?php
namespace CakeLte\View\Styles;

trait StylesTrait{

    /**
     * @param string $key
     * @param string $style
     * @param boolean $use
     * @return void
     */
    public function addStyle(string $key, string $style, bool $use = true): void
    {
        $this->_styles[$key] = $style;

        if ($use) {
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