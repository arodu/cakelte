<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace CakeLTE\View;

use App\View\AppView;
use Cake\Core\Configure;
use Cake\Core\Exception\Exception;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class CakeLTEView extends AppView{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void{
      try{
        Configure::load('settings', 'default');

      } catch (Exception $e){
        Configure::load('CakeLTE.settings', 'default');

      }
      $this->settings = Configure::read('AppTheme');

      $this->loadHelper('Form', [
        'templates' => 'CakeLTE.app_form',
      ]);

      $this->loadHelper('Paginator', [
        'templates' => 'CakeLTE.app_paginator',
      ]);

      parent::initialize();
    }

    public function element(string $name, array $data = [], array $options = []): string {
      if( !$this->elementExists($name) ){
        $name = 'CakeLTE.'.$name;
      }
      
      //debug($name); exit();

      return parent::element($name, $data, $options);
    }

}
