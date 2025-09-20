<?php
declare(strict_types=1);

namespace CakeLte\View;

use BootstrapTools\View\Trait\MenuLoaderTrait;
use BootstrapUI\View\UIViewTrait;
use CakeLte\CakeLte;

/**
 * @property \CakeLte\View\Helper\CakeLteHelper $CakeLte
 * @property \BootstrapTools\View\Helper\MenuHelper $MenuLte
 * @property \BootstrapTools\View\Helper\MenuHelper $Menu
 */
trait CakeLteTrait
{
    use UIViewTrait;
    use MenuLoaderTrait;

    /**
     * Initialize CakeLte plugin
     *
     * @param array $options Options
     * @return void
     */
    public function initializeCakeLte(array $options = []): void
    {
        $this->initializeUI();
        $this->addHelper('CakeLte.CakeLte', $options);
        $this->addHelper('BootstrapTools.Menu');
        $this->loadMenuHelper('MenuLte', CakeLte::MENU_CONFIG);
    }
}
