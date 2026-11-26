<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\View;

use BootstrapTools\View\Helper\MenuHelper;
use Cake\TestSuite\TestCase;
use CakeLte\Test\View\CakeLteTestView;
use CakeLte\View\Helper\CakeLteHelper;

require_once dirname(__DIR__, 2) . '/stubs/CakeLteTestView.php';

/**
 * CakeLte\View\CakeLteTrait Test Case
 */
class CakeLteTraitTest extends TestCase
{
    /**
     * Test initializeCakeLte method
     *
     * @return void
     * @uses \CakeLte\View\CakeLteTrait::initializeCakeLte()
     */
    public function testInitializeCakeLte(): void
    {
        $view = new CakeLteTestView();
        $view->initializeCakeLte();
        $view->loadHelpers();

        $helpers = $view->helpers();

        $this->assertTrue($helpers->has('CakeLte'));
        $this->assertInstanceOf(CakeLteHelper::class, $helpers->get('CakeLte'));
        $this->assertTrue($helpers->has('Menu'));
        $this->assertInstanceOf(MenuHelper::class, $helpers->get('Menu'));
        $this->assertTrue($helpers->has('MenuLte'));
        $this->assertInstanceOf(MenuHelper::class, $helpers->get('MenuLte'));
    }

    /**
     * Test an active child marks its parent with the AdminLTE menu-open class.
     *
     * @return void
     */
    public function testActiveChildMenuGetsMenuOpenClass(): void
    {
        $view = new CakeLteTestView();
        $view->initializeCakeLte();
        $view->loadHelpers();

        $menu = [
            [
                'label' => 'Parent',
                'children' => [
                    ['label' => 'Child', 'url' => '/child'],
                ],
            ],
        ];

        $html = $view->MenuLte->render($menu, ['activeItem' => '0.0']);

        $this->assertStringContainsString('menu-open', $html);
    }
}
