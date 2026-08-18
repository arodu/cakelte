<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakeLte\Enum\Layout;
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
        $this->assertSame('', $this->CakeLteHelper->getBodyClass());

        $this->CakeLteHelper->set('layout', Layout::FIXED_MINI);
        $this->assertSame('layout-fixed sidebar-mini', $this->CakeLteHelper->getBodyClass());

        $this->CakeLteHelper->set('layout', Layout::FIXED_MINI_COLLAPSED);
        $this->assertSame('layout-fixed sidebar-mini sidebar-collapse', $this->CakeLteHelper->getBodyClass());

        $this->CakeLteHelper->set('layout', 'layout-fixed');
        $this->assertSame('layout-fixed', $this->CakeLteHelper->getBodyClass());
    }

    /**
     * Test rtl method
     *
     * @return void
     * @uses \CakeLte\View\Helper\CakeLteHelper::rtl()
     */
    public function testRtl(): void
    {
        $this->assertNull($this->CakeLteHelper->rtl());

        $this->CakeLteHelper->set('rtl', true);
        $this->assertSame('dir="rtl"', $this->CakeLteHelper->rtl());

        $this->CakeLteHelper->set('rtl', false);
        $this->assertNull($this->CakeLteHelper->rtl());
    }

    /**
     * Test getLogo method
     *
     * @return void
     * @uses \CakeLte\View\Helper\CakeLteHelper::getLogo()
     */
    public function testGetLogo(): void
    {
        $result = $this->CakeLteHelper->getLogo();
        $this->assertStringContainsString('<img', $result);
        $this->assertStringContainsString('brand-image', $result);

        $this->CakeLteHelper->setConfig('settings.appLogo', '');
        $this->assertNull($this->CakeLteHelper->getLogo());
    }
}
