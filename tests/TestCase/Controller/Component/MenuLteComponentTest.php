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
     * Test activeItem sets the _menuActiveItem view variable.
     *
     * @return void
     */
    public function testActiveItemSetsViewVar(): void
    {
        $controller = new Controller(new ServerRequest());
        $component = new MenuLteComponent(new ComponentRegistry($controller));

        $component->activeItem('students');

        $this->assertSame('students', $controller->viewBuilder()->getVar('_menuActiveItem'));
    }
}
