<?php
declare(strict_types=1);

namespace CakeLte\View;

use Cake\View\View;
use CakeLte\CakeLtePlugin;

class CakeLteView extends View
{
    use CakeLteTrait;

    public string $layout = CakeLtePlugin::LAYOUT_DEFAULT;

    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->initializeCakeLte();
    }
}
