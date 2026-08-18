<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Http\ServerRequest;
use Cake\TestSuite\TestCase;
use CakeLte\Controller\Component\MenuLteComponent;

/**
 * CakeLte\Controller\Component\MenuLteComponent Test Case
 */
class MenuLteComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakeLte\Controller\Component\MenuLteComponent
     */
    protected $MenuLteComponent;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $controller = new Controller(new ServerRequest());
        $registry = new ComponentRegistry($controller);
        $this->MenuLteComponent = new MenuLteComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MenuLteComponent);

        parent::tearDown();
    }

    /**
     * Test activeItem method
     *
     * @return void
     * @uses \CakeLte\Controller\Component\MenuLteComponent::activeItem()
     */
    public function testActiveItem(): void
    {
        $this->MenuLteComponent->activeItem('dashboard');

        $this->assertSame('dashboard', $this->MenuLteComponent->getController()->viewBuilder()->getVar('_menuActiveItem'));
    }
}
