<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Webroot;

use Cake\TestSuite\TestCase;

/**
 * CakeLte webroot CSS Test Case
 */
class StyleCssTest extends TestCase
{
    /**
     * The pagination sort arrows must use the Bootstrap Icons font bundled with
     * the plugin instead of the removed Font Awesome dependency.
     *
     * @return void
     */
    public function testSortArrowsUseBootstrapIcons(): void
    {
        $styleFile = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'webroot' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'style.css';
        $css = (string)file_get_contents($styleFile);

        $this->assertStringContainsString('font-family: "bootstrap-icons";', $css);
        $this->assertStringNotContainsString('Font Awesome', $css);
        $this->assertStringContainsString('content: "\f127";', $css);
        $this->assertStringContainsString('content: "\f128";', $css);
        $this->assertStringContainsString('content: "\f148";', $css);
        $this->assertStringNotContainsString('\f0dc', $css);
        $this->assertStringNotContainsString('\f0dd', $css);
        $this->assertStringNotContainsString('\f0de', $css);
    }
}
