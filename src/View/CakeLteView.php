<?php
declare(strict_types=1);

namespace CakeLte\View;

use Cake\View\View;

class CakeLteView extends View{
  use CakeLteTrait;

  public function initialize(): void{
      parent::initialize();
      $this->initializeCakeLte();
  }

}
