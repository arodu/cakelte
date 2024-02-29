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
     * Test subject
     *
     * @var \CakeLte\View\Helper\MenuLteHelper
     */
    protected $MenuLteHelper;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->MenuLteHelper = new MenuLteHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->MenuLteHelper);

        parent::tearDown();
    }

    /**
     * Test render method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::render()
     */
    public function testRender(): void
    {
        $this->MenuLteHelper->activeItem('startPages.activePage');

        $menu = [
            'startPages' => [
                'label' => 'Start Pages',
                'icon' => 'fas fa-tachometer-alt',
                'dropdown' => [
                    'activePage' => [
                        'label' => 'Active Page',
                        'uri' => 'https://github.com/arodu/cakelte',
                    ],
                    'inactivePage' => [
                        'label' => 'Inactive Page',
                        'uri' => 'https://github.com/arodu/cakelte',
                    ],
                ],
            ],
            'simpleLink' => [
                'label' => 'Simple Link',
                'extra' => '<span class="right badge badge-danger">New</span>',
                'uri' => 'https://github.com/arodu/cakelte',
                'show' => function () {
                    return true;
                },
            ],
            'hiddenLink' => [
                'label' => 'Hidden Link',
                'extra' => '<span class="right badge badge-danger">New</span>',
                'uri' => 'https://github.com/arodu/cakelte',
                'show' => function () {
                    return false;
                },
            ],
        ];

        $result = $this->MenuLteHelper->render($menu);

        $this->assertTextContains('Start Pages', $result);
        $this->assertTextContains('Simple Link', $result);
        $this->assertTextContains('<a href="https://github.com/arodu/cakelte" class="nav-link active"><i class="nav-icon far fa-circle"></i><p>Active Page</p></a>', $result);
        $this->assertTextContains('<a href="https://github.com/arodu/cakelte" class="nav-link"><i class="nav-icon far fa-circle"></i><p>Inactive Page</p></a>', $result);
        $this->assertTextNotContains('Hidden Link', $result);
    }

    /**
     * Test renderTopMenu method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::renderTopMenu()
     */
    public function testRenderTopMenu(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test activeItem method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::activeItem()
     */
    public function testActiveItem(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test resetActiveItem method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::resetActiveItem()
     */
    public function testResetActiveItem(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test setTemplates method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::setTemplates()
     */
    public function testSetTemplates(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test getTemplates method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::getTemplates()
     */
    public function testGetTemplates(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test formatTemplate method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::formatTemplate()
     */
    public function testFormatTemplate(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test templater method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::templater()
     */
    public function testTemplater(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
