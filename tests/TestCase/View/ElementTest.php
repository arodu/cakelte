<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\View;

use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakeLte\CakeLtePlugin;

/**
 * CakeLte header elements Test Case
 */
class ElementTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Cake\View\View
     */
    protected $View;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (!Plugin::isLoaded('CakeLte')) {
            Plugin::getCollection()->add(new CakeLtePlugin());
        }

        $this->View = new View();
        $this->View->loadHelper('Html');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->View);

        parent::tearDown();
    }

    /**
     * Test the color-mode header element renders the light/dark/auto dropdown
     *
     * @return void
     */
    public function testColorModeElementMarkup(): void
    {
        $output = $this->View->element('CakeLte.header/color-mode');

        $this->assertStringContainsString('id="bd-theme"', $output);
        $this->assertStringContainsString('data-bs-toggle="dropdown"', $output);
        $this->assertStringContainsString('data-lte-theme-icon="light"', $output);
        $this->assertStringContainsString('data-lte-theme-icon="dark"', $output);
        $this->assertStringContainsString('data-lte-theme-icon="auto"', $output);
        $this->assertStringContainsString('data-bs-theme-value="light"', $output);
        $this->assertStringContainsString('data-bs-theme-value="dark"', $output);
        $this->assertStringContainsString('data-bs-theme-value="auto"', $output);
    }

    /**
     * Test the search header element renders the AdminLTE 4 navbar search form
     *
     * @return void
     */
    public function testSearchElementMarkup(): void
    {
        $output = $this->View->element(
            'CakeLte.header/search',
            ['searchAction' => '/search'],
        );

        $this->assertStringContainsString('class="navbar-search', $output);
        $this->assertStringContainsString('role="search"', $output);
        $this->assertStringContainsString('name="q"', $output);
        $this->assertStringContainsString('navbar-search-submit', $output);
        $this->assertStringContainsString('action="/search"', $output);
        $this->assertStringNotContainsString('data-widget="navbar-search"', $output);
    }

    /**
     * Test the default header places the search form before the ms-auto list
     * and keeps the mobile fallback icon inside the list
     *
     * @return void
     */
    public function testDefaultLayoutIncludesSearch(): void
    {
        $headerSource = (string)file_get_contents(Plugin::path('CakeLte') . 'templates' . DS . 'element' . DS . 'header' . DS . 'main.php');

        $this->assertStringContainsString(
            "element('CakeLte.header/search')",
            $headerSource,
        );
        $this->assertLessThan(
            strpos($headerSource, 'class="navbar-nav ms-auto"'),
            strpos($headerSource, "element('CakeLte.header/search')"),
        );
        $this->assertStringContainsString('d-md-none', $headerSource);
    }

    /**
     * Test the default layout includes the color-mode element and theme init script
     *
     * @return void
     */
    public function testDefaultLayoutIncludesColorModeAndThemeInit(): void
    {
        Configure::write('App.paths.templates', [Plugin::path('CakeLte') . 'templates' . DS]);

        $layoutFile = Plugin::path('CakeLte') . 'templates' . DS . 'layout' . DS . 'default.php';
        $layoutSource = (string)file_get_contents($layoutFile);

        $headerSource = (string)file_get_contents(Plugin::path('CakeLte') . 'templates' . DS . 'element' . DS . 'header' . DS . 'main.php');
        $colorModeSource = (string)file_get_contents(Plugin::path('CakeLte') . 'templates' . DS . 'element' . DS . 'header' . DS . 'color-mode.php');

        $this->assertStringContainsString('header/color-mode', $headerSource);
        $this->assertStringContainsString("STORAGE_KEY = 'lte-theme'", $layoutSource);
        $this->assertStringContainsString('data-bs-theme-value="auto"', $colorModeSource);

        Configure::delete('App.paths.templates');
    }
}
