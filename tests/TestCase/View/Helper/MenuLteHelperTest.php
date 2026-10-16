<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakeLte\View\Helper\MenuLteHelper;

/**
 * CakeLte\View\Helper\MenuLteHelper Test Case
 */
class MenuLteHelperTest extends TestCase
{
    /**
     * Test render outputs a nav item for a simple menu.
     *
     * @return void
     */
    public function testRenderSimpleMenu(): void
    {
        $helper = new MenuLteHelper(new View());

        $html = $helper->render([
            'home' => [
                'label' => 'Home',
                'uri' => '/',
            ],
        ]);

        $this->assertStringContainsString('nav-item', $html);
        $this->assertStringContainsString('Home', $html);
    }

    /**
     * Test render marks the active item.
     *
     * @return void
     */
    public function testRenderActiveItem(): void
    {
        $helper = new MenuLteHelper(new View());
        $helper->activeItem('home');

        $html = $helper->render([
            'home' => [
                'label' => 'Home',
                'uri' => '/',
            ],
        ]);

        $this->assertStringContainsString('active', $html);
    }

    /**
     * Test render hides items whose show condition is false.
     *
     * @return void
     */
    public function testRenderHiddenItem(): void
    {
        $helper = new MenuLteHelper(new View());

        $html = $helper->render([
            'home' => [
                'label' => 'Home',
                'uri' => '/',
                'show' => false,
            ],
        ]);

        $this->assertSame('', $html);
    }
}
