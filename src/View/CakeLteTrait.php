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
        $this->loadHelper('CakeLte.MenuLte', $options['menu'] ?? []);
    }
}
