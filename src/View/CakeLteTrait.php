<?php
declare(strict_types=1);

namespace CakeLte\View;

use Cake\Core\Configure;
use Cake\Core\Exception\Exception;

trait CakeLteTrait{

  /**
   * $options = [
   *   'layout'=> [true | string]  // default='CakeLte.starter'
   * ]
   */
  public function initializeCakeLte(array $options = []): void{
    try{
      Configure::load('settings', 'default');

    } catch (Exception $e){
      Configure::load('CakeLte.settings', 'default');

    }
    $this->settings = Configure::read('AppTheme');

    if (
        (!isset($options['layout']) || $options['layout'] === true) &&
        $this->layout === 'default'
    ) {
        $this->layout = 'CakeLte.starter';
    } elseif (isset($options['layout']) && is_string($options['layout'])) {
        $this->layout = $options['layout'];
    }

    $this->loadHelper('Form', [
      'templates' => 'CakeLte.app_form',
    ]);

    $this->loadHelper('Paginator', [
      'templates' => 'CakeLte.app_paginator',
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
