<?php
declare(strict_types=1);

namespace CakeLte\View;

use BootstrapUI\View\UIViewTrait;

trait CakeLteTrait
{
    use UIViewTrait;

    /**
     * Initialize CakeLte plugin
     *
     * @param array $options Options
     * @return void
     */
    public function initializeCakeLte(array $options = []): void
    {
        $this->initializeUI();
        $this->loadHelper('CakeLte.CakeLte', $options);
    }

    /**
     * @param string $name Name
     * @param array $data data
     * @param array $options Options
     * @return string
     */
    public function element(string $name, array $data = [], array $options = []): string
    {
        if ($this->_getElementFileName($name, false)) {
            $options = array_merge($options, ['plugin' => false]);
        } else {
            $name = 'CakeLte.' . $name;
        }

        return parent::element($name, $data, $options);
    }
}
