<?php
declare(strict_types=1);

namespace CakeLte\Controller\Component;

use Cake\Controller\Component;

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

    /**
     * Set the active menu item tag.
     *
     * @param string $itemTag The active item tag.
     * @return void
     */
    public function activeItem(string $itemTag): void
    {
        $this->getController()->set('_menuActiveItem', $itemTag);
    }
}
