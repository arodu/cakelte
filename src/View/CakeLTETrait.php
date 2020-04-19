<?php
declare(strict_types=1);

namespace CakeLTE\View;

use Cake\Core\Configure;
use Cake\Core\Exception\Exception;

trait CakeLTETrait{

  /**
   * $options = [
   *   'layout'=> [true | string]  // default='CakeLTE.starter'
   * ]
   */
  public function initializeCakeLTE(array $options = []): void{
    try{
      Configure::load('settings', 'default');

    } catch (Exception $e){
      Configure::load('CakeLTE.settings', 'default');

    }
    $this->settings = Configure::read('AppTheme');

    if (
        (!isset($options['layout']) || $options['layout'] === true) &&
        $this->layout === 'default'
    ) {
        $this->layout = 'CakeLTE.starter';
    } elseif (isset($options['layout']) && is_string($options['layout'])) {
        $this->layout = $options['layout'];
    }

    $this->loadHelper('Form', [
      'templates' => 'CakeLTE.app_form',
    ]);

    $this->loadHelper('Paginator', [
      'templates' => 'CakeLTE.app_paginator',
    ]);
  }

  public function element(string $name, array $data = [], array $options = []): string {
    if( !$this->elementExists($name) ){
      $name = 'CakeLTE.'.$name;
    }
    return parent::element($name, $data, $options);
  }
}
