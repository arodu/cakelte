<?php

declare(strict_types=1);

namespace CakeLte\View;

use BootstrapUI\View\UIViewTrait;
use Cake\View\View;

class CakeLteView extends View {
  use CakeLteTrait;
  use UIViewTrait;

  public $layout = 'CakeLte.starter';

  public function initialize(): void {
    parent::initialize();
    $this->initializeUI();
    $this->initializeCakeLte();
  }
}
