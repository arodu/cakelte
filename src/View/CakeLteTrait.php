<?php

declare(strict_types=1);

namespace CakeLte\View;

use BootstrapUI\View\UIViewTrait;

trait CakeLteTrait {

  use UIViewTrait;

  public function initializeCakeLte(array $options = []): void {
    $this->loadHelper('CakeLte.CakeLte', $options);
    $this->initializeUI();
  }

  public function element(string $name, array $data = [], array $options = []): string {
    if ($this->_getElementFileName($name, false)) {
      $options = array_merge($options, ['plugin' => false]);
    } else {
      $name = 'CakeLte.' . $name;
    }
    return parent::element($name, $data, $options);
  }
}
