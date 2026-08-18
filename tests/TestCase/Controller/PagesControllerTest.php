<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Controller;

use Cake\Core\Configure;
use Cake\Event\EventManager;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\ServerRequest;
use Cake\Routing\Router;
use Cake\TestSuite\TestCase;
use CakeLte\Controller\PagesController;

require_once dirname(__DIR__, 2) . '/stubs/AppController.php';

/**
 * CakeLte\Controller\PagesController Test Case
 */
class PagesControllerTest extends TestCase
{
    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Router::reload();
    }

    /**
     * @param bool $debug
     * @return \CakeLte\Controller\PagesController
     */
    protected function buildController(bool $debug): PagesController
    {
        Configure::write('debug', $debug);

        return new PagesController(new ServerRequest());
    }

    /**
     * Test debug action when debug mode is off
     *
     * @return void
     * @uses \CakeLte\Controller\PagesController::debug()
     */
    public function testDebugThrowsWhenDebugDisabled(): void
    {
        $controller = $this->buildController(false);

        $this->expectException(NotFoundException::class);
        $controller->debug();
    }

    /**
     * Test sample action when debug mode is off
     *
     * @return void
     * @uses \CakeLte\Controller\PagesController::sample()
     */
    public function testSampleThrowsWhenDebugDisabled(): void
    {
        $controller = $this->buildController(false);

        $this->expectException(NotFoundException::class);
        $controller->sample();
    }

    /**
     * Test debug action renders a flash warning in debug mode
     *
     * @return void
     * @uses \CakeLte\Controller\PagesController::debug()
     */
    public function testDebugRunsInDebugMode(): void
    {
        $controller = $this->buildController(true);
        $controller->loadComponent('Flash');

        $controller->debug();

        $messages = $controller->getRequest()->getSession()->read('Flash.flash');
        $this->assertNotEmpty($messages);
        $this->assertSame('warning', $messages[0]['element']);
    }

    /**
     * Test sample action renders a flash warning in debug mode
     *
     * @return void
     * @uses \CakeLte\Controller\PagesController::sample()
     */
    public function testSampleRunsInDebugMode(): void
    {
        $controller = $this->buildController(true);
        $controller->loadComponent('Flash');

        $controller->sample();

        $messages = $controller->getRequest()->getSession()->read('Flash.flash');
        $this->assertNotEmpty($messages);
        $this->assertSame('warning', $messages[0]['element']);
    }
}