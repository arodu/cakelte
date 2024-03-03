<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakeLte\View\Helper\CakeLteHelper;

/**
 * CakeLte\View\Helper\CakeLteHelper Test Case
 */
class CakeLteHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakeLte\View\Helper\CakeLteHelper
     */
    protected $CakeLteHelper;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->CakeLteHelper = new CakeLteHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CakeLteHelper);

        parent::tearDown();
    }

    /**
     * Test getBodyClass method
     *
     * @return void
     * @uses \CakeLte\View\Helper\CakeLteHelper::getBodyClass()
     */
    public function testGetBodyClass(): void
    {
        $result = $this->CakeLteHelper->getBodyClass();
        $this->assertTextContains('layout-fixed sidebar-mini', $result);

        $this->CakeLteHelper->setConfig([
            'sidebar.fixed' => true,
            'sidebar.collapsed' => true,
            'dark-mode' => true,
            'footer.fixed' => true,
        ]);
        $result = $this->CakeLteHelper->getBodyClass();
        $this->assertTextContains('dark-mode layout-fixed sidebar-mini sidebar-collapse layout-footer-fixed', $result);
    }

    /**
     * Test getHeaderClass method
     *
     * @return void
     * @uses \CakeLte\View\Helper\CakeLteHelper::getHeaderClass()
     */
    public function testGetHeaderClass(): void
    {
        $result = $this->CakeLteHelper->getHeaderClass();
        $this->assertTextContains('navbar-white navbar-light', $result);

        $this->CakeLteHelper->setConfig([
            'header.border' => false,
            'header.dropdown-legacy' => true,
        ]);
        $result = $this->CakeLteHelper->getHeaderClass();
        $this->assertTextContains('navbar-white navbar-light border-bottom-0 dropdown-legacy', $result);
    }

    /**
     * Test getSidebarClass method
     *
     * @return void
     * @uses \CakeLte\View\Helper\CakeLteHelper::getSidebarClass()
     */
    public function testGetSidebarClass(): void
    {
        $result = $this->CakeLteHelper->getSidebarClass();
        $this->assertTextContains('sidebar-dark-primary elevation-4 layout-fixed', $result);

        $this->CakeLteHelper->setConfig([
            'sidebar.fixed' => false,
            'sidebar.disabled-auto-expand' => true,
        ]);
        $result = $this->CakeLteHelper->getSidebarClass();
        $this->assertTextContains('sidebar-dark-primary elevation-4 sidebar-no-expand', $result);
    }

    /**
     * Test getMenuClass method
     *
     * @return void
     * @uses \CakeLte\View\Helper\CakeLteHelper::getMenuClass()
     */
    public function testGetMenuClass(): void
    {
        $result = $this->CakeLteHelper->getMenuClass();
        $this->assertTextEquals('', $result);

        $this->CakeLteHelper->setConfig([
            'sidebar.flat-style' => true,
            'sidebar.legacy-style' => true,
            'sidebar.compact' => true,
            'sidebar.child-indent' => true,
            'sidebar.child-hide-collapse' => true,
        ]);
        $result = $this->CakeLteHelper->getMenuClass();
        $this->assertTextContains('nav-flat nav-legacy nav-compact nav-child-indent nav-collapse-hide-child', $result);
    }
}
