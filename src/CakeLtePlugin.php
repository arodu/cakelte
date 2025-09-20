<?php
declare(strict_types=1);

namespace CakeLte;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\MiddlewareQueue;
use Cake\Routing\RouteBuilder;

/**
 * Plugin for CakeLte
 */
class CakeLtePlugin extends BasePlugin
{
    public const DEFAULT_PLUGIN_CONFIG_FILE = 'CakeLte.cakelte';

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
        $app->addPlugin('BootstrapUI');
        $app->addPlugin('BootstrapTools');

        Configure::load(static::DEFAULT_PLUGIN_CONFIG_FILE);
        if (file_exists(CONFIG . 'cakelte.php')) {
            Configure::load('cakelte');
        }
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
            'CakeLte',
            ['path' => '/cakelte'],
            function (RouteBuilder $builder): void {
                $builder->connect('/debug', ['controller' => 'Pages', 'action' => 'debug']);
                $builder->connect('/sample', ['controller' => 'Pages', 'action' => 'sample']);
            },
        );
        parent::routes($routes);
    }

    /**
     * Add middleware for the plugin.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to update.
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        // Add your middlewares here

        return $middlewareQueue;
    }
}
