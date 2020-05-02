<?php
declare(strict_types=1);

namespace CakeLTE\View;

use Cake\View\View;

class CakeLTEView extends View{
  use CakeLTETrait;

  public function initialize(): void{
      parent::initialize();
      $this->initializeUI();
  }

}
