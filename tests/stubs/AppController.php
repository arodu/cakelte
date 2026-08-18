<?php
declare(strict_types=1);

/**
 * Stand-in for the host application's AppController.
 *
 * The plugin's CakeLte\Controller\AppController extends App\Controller\AppController,
 * which does not exist in a standalone checkout of the plugin. Loading this class
 * during static analysis lets PHPStan resolve the inheritance chain up to
 * Cake\Controller\Controller (and its magic properties such as Flash).
 */

namespace App\Controller;

class AppController extends \Cake\Controller\Controller
{
}
