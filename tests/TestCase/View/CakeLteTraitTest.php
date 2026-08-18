<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\View;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakeLte\View\CakeLteTrait;

/**
 * Test view class that uses the CakeLteTrait
 */
class CakeLteTestView extends View
{
    use CakeLteTrait;
}

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
        $this->assertInstanceOf(\CakeLte\View\Helper\CakeLteHelper::class, $helpers->get('CakeLte'));
        $this->assertTrue($helpers->has('Menu'));
        $this->assertInstanceOf(\BootstrapTools\View\Helper\MenuHelper::class, $helpers->get('Menu'));
        $this->assertTrue($helpers->has('MenuLte'));
        $this->assertInstanceOf(\BootstrapTools\View\Helper\MenuHelper::class, $helpers->get('MenuLte'));
    }
}
