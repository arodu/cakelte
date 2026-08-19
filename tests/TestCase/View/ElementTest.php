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
     * Test the header elements wrap visible text in the __() translation function
     *
     * @return void
     */
    public function testHeaderElementsUseTranslation()
    {
        $templatesDir = Plugin::path('CakeLte') . 'templates' . DS . 'element' . DS;
        $elements = ['header/menu', 'header/search', 'header/messages', 'header/notifications', 'header/color-mode', 'header/user', 'footer/main'];

        foreach ($elements as $element) {
            $source = (string)file_get_contents($templatesDir . $element . '.php');
            $this->assertStringContainsString('__', $source, "Expected __() in {$element}");
        }
    }

    /**
     * Test the sidebar element includes the sidebar search filter
     *
     * @return void
     */
    public function testSidebarIncludesSearch(): void
    {
        $sidebarFile = Plugin::path('CakeLte') . 'templates' . DS . 'element' . DS . 'sidebar' . DS . 'main.php';
        $sidebarSource = (string)file_get_contents($sidebarFile);

        $this->assertStringContainsString('data-lte-toggle="sidebar-search"', $sidebarSource);
        $this->assertStringContainsString('data-lte-target="#navigation"', $sidebarSource);
        $this->assertStringContainsString('data-lte-search-empty', $sidebarSource);
    }

    /**
     * Test the menu container template carries the navigation id for the sidebar search
     *
     * @return void
     */
    public function testMenuContainerHasNavigationId(): void
    {
        $cakeLteFile = Plugin::path('CakeLte') . 'src' . DS . 'CakeLte.php';
        $cakeLteSource = (string)file_get_contents($cakeLteFile);

        $this->assertStringContainsString('id="navigation"', $cakeLteSource);
        $this->assertStringContainsString('class="nav sidebar-menu flex-column"', $cakeLteSource);
    }

    /**
     * Test the messages header element uses p.dropdown-item-title like the starter
     *
     * @return void
     */
    public function testMessagesElementMarkup(): void
    {
        $output = $this->View->element('CakeLte.header/messages');

        $this->assertStringContainsString('dropdown-item-title', $output);
        $this->assertStringNotContainsString('<h3 class="dropdown-item-title"', $output);
        $this->assertStringNotContainsString('</h3>', $output);
    }

    /**
     * Test the language header element renders the locale dropdown
     *
     * @return void
     */
    public function testLanguageElementMarkup(): void
    {
        $output = $this->View->element('CakeLte.header/language');

        $this->assertStringContainsString('id="language-menu"', $output);
        $this->assertStringContainsString('data-bs-toggle="dropdown"', $output);
        $this->assertStringContainsString('bi bi-translate', $output);
        $this->assertStringContainsString('hreflang', $output);
        $this->assertStringNotContainsString('aria-current="true"', $output);
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
     * Test the default layout body uses getBodyClass() plus the AdminLTE suffix
     *
     * @return void
     */
    public function testDefaultLayoutBodyUsesGetBodyClass(): void
    {
        $layoutFile = Plugin::path('CakeLte') . 'templates' . DS . 'layout' . DS . 'default.php';
        $layoutSource = (string)file_get_contents($layoutFile);

        $this->assertStringContainsString(
            'class="<?= $this->CakeLte->getBodyClass() ?> sidebar-expand-lg bg-body-tertiary"',
            $layoutSource,
        );
        $this->assertStringContainsString('sidebar-expand-lg bg-body-tertiary', $layoutSource);
    }

    /**
     * Test the default layout head includes accessibility metas and preload
     *
     * @return void
     */
    public function testDefaultLayoutHeadAccessibilityMetas(): void
    {
        $layoutFile = Plugin::path('CakeLte') . 'templates' . DS . 'layout' . DS . 'default.php';
        $layoutSource = (string)file_get_contents($layoutFile);

        $this->assertStringContainsString('name="color-scheme"', $layoutSource);
        $this->assertStringContainsString('name="theme-color"', $layoutSource);
        $this->assertStringContainsString('name="supported-color-schemes"', $layoutSource);
        $this->assertStringContainsString('rel="preload"', $layoutSource);
        $this->assertStringContainsString('media="print"', $layoutSource);
    }

    /**
     * Test the login layout head includes accessibility metas and preload
     *
     * @return void
     */
    public function testLoginLayoutHeadAccessibilityMetas(): void
    {
        $layoutFile = Plugin::path('CakeLte') . 'templates' . DS . 'layout' . DS . 'login.php';
        $layoutSource = (string)file_get_contents($layoutFile);

        $this->assertStringContainsString('name="color-scheme"', $layoutSource);
        $this->assertStringContainsString('name="theme-color"', $layoutSource);
        $this->assertStringContainsString('name="supported-color-schemes"', $layoutSource);
        $this->assertStringContainsString('rel="preload"', $layoutSource);
        $this->assertStringContainsString('media="print"', $layoutSource);
        $this->assertStringNotContainsString('overlayscrollbars@2.10.1', $layoutSource);
        $this->assertStringNotContainsString('bootstrap@5.3.3', $layoutSource);
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
