<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;

Router::plugin(
    'CakeLTE',
    ['path' => '/cake-lte'],
    function ($routes) {
      $routes->get('/debug', ['controller' => 'Pages', 'action' => 'debug']);
    }
);
