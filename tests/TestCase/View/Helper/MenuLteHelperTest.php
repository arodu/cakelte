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
        $view->set('_menuActiveItem', 'startPages.activePage');
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
        // test simple link
        $menu = [
            'simpleLink' => [
                'label' => 'Simple Link',
                'extra' => '<span class="right badge badge-danger">New</span>',
                'uri' => 'https://github.com/arodu/cakelte',
            ],
        ];
        $result = $this->MenuLteHelper->render($menu);
        $this->assertTextContains('<li class="nav-item"><a href="https://github.com/arodu/cakelte" class="nav-link"><i class="nav-icon fas fa-circle"></i><p>Simple Link</p></a></li>', $result);

        // test dropdown menu
        $menu = [
            'startPages' => [
                'label' => 'Start Pages',
                'icon' => 'fas fa-tachometer-alt',
                'badge' => 'new',
                'dropdown' => [
                    'title' => [
                        'label' => 'Sample',
                        'type' => $this->MenuLteHelper::ITEM_TYPE_HEADER,
                    ],
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
        ];
        $this->MenuLteHelper->activeItem('startPages.activePage', true);
        $result = $this->MenuLteHelper->render($menu);

        $this->assertTextContains('has-treeview', $result);
        $this->assertTextContains('nav-treeview', $result);
        $this->assertTextContains('nav-link active', $result);
        $this->assertTextContains('Active Page', $result);
        $this->assertTextContains('Inactive Page', $result);
        $this->assertTextContains('<li class="nav-header">Sample</li>', $result);
        $this->assertTextContains('<span class="badge badge-secondary right">new</span>', $result);

        $this->MenuLteHelper->resetActiveItem();
        $menu = [
            'startPages' => [
                'label' => 'Start Pages',
                'icon' => 'fas fa-tachometer-alt',
                'badge' => 'new',
                'dropdown' => [
                    'title' => [
                        'label' => 'Sample',
                        'type' => $this->MenuLteHelper::ITEM_TYPE_HEADER,
                    ],
                    'activePage' => [
                        'label' => 'Active Page',
                        'uri' => 'https://github.com/arodu/cakelte',
                        'badge' => [
                            'text' => null,
                        ],
                        'show' => function () {
                            return true;
                        },
                    ],
                    'inactivePage' => [
                        'label' => 'Inactive Page',
                        'uri' => 'https://github.com/arodu/cakelte',
                        'show' => function () {
                            return false;
                        },
                    ],
                ],
            ],
        ];

        $result = $this->MenuLteHelper->render($menu);

        $this->assertTextContains('Active Page', $result);
        $this->assertTextNotContains('Inactive Page', $result);
        $this->assertTextNotContains('nav-link active', $result);
    }

    /**
     * Test renderTopMenu method
     *
     * @return void
     * @uses \CakeLte\View\Helper\MenuLteHelper::renderTopMenu()
     */
    public function testRenderTopMenu(): void
    {
        $menu = [
            'simpleLink' => [
                'label' => 'Simple Link',
                'extra' => '<span class="right badge badge-danger">New</span>',
                'uri' => 'https://github.com/arodu/cakelte',
            ],
        ];
        $result = $this->MenuLteHelper->renderTopMenu($menu);

        $this->assertTextContains('<li class="nav-item"><a href="https://github.com/arodu/cakelte" class="nav-link"><i class="nav-icon fas fa-circle"></i><p>Simple Link</p></a></li>', $result);
    }
}
