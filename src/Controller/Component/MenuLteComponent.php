<?php
declare(strict_types=1);

namespace CakeLte\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * MenuLte component
 */
class MenuLteComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    public function activeItem(string $itemTag): void
    {
        $this->getController()->set('_menuActiveItem', $itemTag);
    }
}
