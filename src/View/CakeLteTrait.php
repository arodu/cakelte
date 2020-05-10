<?php
declare(strict_types=1);

namespace CakeLte\View;

use Cake\Core\Configure;
use Cake\Core\Exception\Exception;

trait CakeLteTrait{

  protected $settings = [
      'layout' => 'CakeLte.starter',

    // configure layout options
      'appName' => 'Cake<b>LTE</b>', // [string] default='Cake<b>LTE</b>'
      'appLogo' => 'CakeLte.cake.icon.png', // [string] default='CakeLte.cake.icon.png'

    // helpers templates
      'form-templates' => 'CakeLte.app_form',
      'paginator-templates' => 'CakeLte.app_paginator',
  ];

  public function initializeCakeLte(array $options = []): void {
    $this->settings = array_merge($this->settings, $options);

    $this->layout = $this->settings['layout'];

    $this->loadHelper('Form', [
      'templates' => $this->settings['form-templates'],
    ]);

    $this->loadHelper('Paginator', [
      'templates' => $this->settings['paginator-templates'],
    ]);
  }

  public function element(string $name, array $data = [], array $options = []): string {
    if( $this->_getElementFileName($name, false) ){
      $options = array_merge($options, ['plugin'=>false]);
    }else{
      $name = 'CakeLte.'.$name;
    }
    return parent::element($name, $data, $options);
  }

}
