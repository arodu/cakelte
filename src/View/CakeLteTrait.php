<?php

declare(strict_types=1);

namespace CakeLte\View;

use BootstrapUI\View\UIViewTrait;

trait CakeLteTrait {

  use UIViewTrait;

  protected $settings = [
    // configure layout options
    'appName' => 'Cake<b>LTE</b>', // [string] default='Cake<b>LTE</b>'
    'appLogo' => 'CakeLte.cake.icon.png', // [string] default='CakeLte.cake.icon.png'
  ];

  public function initializeCakeLte(array $options = []): void {
    $this->settings = array_merge($this->settings, $options);
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
