<?php
declare(strict_types=1);

<<<<<<< HEAD
namespace CakeLte;
=======
namespace CakeLTE;
>>>>>>> 9b5798c8e39feac04f1c1ea5c7c5c4bb4330ee15

use Cake\Core\BasePlugin;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\RouteBuilder;

/**
<<<<<<< HEAD
 * Plugin for CakeLte
=======
 * Plugin for CakeLTE
>>>>>>> 9b5798c8e39feac04f1c1ea5c7c5c4bb4330ee15
 */
class Plugin extends BasePlugin
{
    /**
     * Load all the plugin configuration and bootstrap logic.
     *
     * The host application is provided as an argument. This allows you to load
     * additional plugin dependencies, or attach events.
     *
     * @param \Cake\Core\PluginApplicationInterface $app The host application
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
    }

    /**
     * Add routes for the plugin.
     *
     * If your plugin has many routes and you would like to isolate them into a separate file,
     * you can create `$plugin/config/routes.php` and delete this method.
     *
     * @param \Cake\Routing\RouteBuilder $routes The route builder to update.
     * @return void
     */
    public function routes(RouteBuilder $routes): void
    {
        $routes->plugin(
<<<<<<< HEAD
            'CakeLte',
            ['path' => '/cake-lte'],
            function (RouteBuilder $builder) {
                // Add custom routes here
                $builder->connect('/debug', ['controller' => 'Pages', 'action' => 'debug']);

=======
            'CakeLTE',
            ['path' => '/cake-lte'],
            function (RouteBuilder $builder) {
                $builder->connect('/debug', ['controller' => 'Pages', 'action' => 'debug']);
>>>>>>> 9b5798c8e39feac04f1c1ea5c7c5c4bb4330ee15
                $builder->fallbacks();
            }
        );
        parent::routes($routes);
    }

    /**
     * Add middleware for the plugin.
     *
     * @param \Cake\Http\MiddlewareQueue $middleware The middleware queue to update.
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        // Add your middlewares here

        return $middlewareQueue;
    }
}
