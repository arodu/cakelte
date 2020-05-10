<?php
declare(strict_types=1);

namespace CakeLte\View;

use Cake\View\View;

class CakeLteView extends View{
  use CakeLteTrait;

  public $layout = 'CakeLte.starter';

  public function initialize(): void{
      parent::initialize();
      $this->initializeCakeLte();
  }

}
