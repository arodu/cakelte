<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;
use Cake\Routing\RouteBuilder;

Router::plugin(
    'CakeLTE',
    ['path' => '/cake-lte'],
    function ($routes) {
      $routes->connect('/debug', ['controller' => 'Pages', 'action' => 'debug']);
    }
);
