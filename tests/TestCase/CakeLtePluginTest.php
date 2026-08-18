<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase;

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\ServerRequest;
use Cake\Routing\RouteBuilder;
use Cake\Routing\RouteCollection;
use Cake\TestSuite\TestCase;
use CakeLte\CakeLtePlugin;

/**
 * CakeLte\CakeLtePlugin Test Case
 */
class CakeLtePluginTest extends TestCase
{
    /**
     * Plugin subject
     *
     * @var \CakeLte\CakeLtePlugin
     */
    protected $plugin;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->plugin = new CakeLtePlugin();
        if (!Plugin::isLoaded('CakeLte')) {
            Plugin::getCollection()->add($this->plugin);
        }
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->plugin);

        parent::tearDown();
    }

    /**
     * Test bootstrap method
     *
     * @return void
     * @uses \CakeLte\CakeLtePlugin::bootstrap()
     */
    public function testBootstrapLoadsPluginsAndConfig(): void
    {
        $app = $this->createMock(PluginApplicationInterface::class);

        $added = [];
        $app->expects($this->exactly(2))
            ->method('addPlugin')
            ->willReturnCallback(function ($plugin) use (&$added): void {
                $added[] = is_string($plugin) ? $plugin : $plugin::class;
            });

        $this->plugin->bootstrap($app);

        $this->assertContains('BootstrapUI', $added);
        $this->assertContains('BootstrapTools', $added);
        $this->assertTrue(Configure::check('CakeLte'));
    }

    /**
     * Test routes method
     *
     * @return void
     * @uses \CakeLte\CakeLtePlugin::routes()
     */
    public function testRoutes(): void
    {
        $collection = new RouteCollection();
        $builder = new RouteBuilder($collection, '/');
        $this->plugin->routes($builder);

        $debug = $collection->parseRequest(new ServerRequest(['url' => '/cakelte/debug']));
        $this->assertSame('Pages', $debug['controller']);
        $this->assertSame('debug', $debug['action']);
        $this->assertSame('CakeLte', $debug['plugin']);

        $sample = $collection->parseRequest(new ServerRequest(['url' => '/cakelte/sample']));
        $this->assertSame('Pages', $sample['controller']);
        $this->assertSame('sample', $sample['action']);
        $this->assertSame('CakeLte', $sample['plugin']);
    }
}