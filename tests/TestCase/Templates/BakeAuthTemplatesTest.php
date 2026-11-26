<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Templates;

use Cake\TestSuite\TestCase;

/**
 * CakeLte authentication bake templates Test Case
 */
class BakeAuthTemplatesTest extends TestCase
{
    /**
     * Authentication templates and the Bootstrap Icons they must use.
     *
     * @var array<string, list<string>>
     */
    protected const TEMPLATES = [
        'login.twig' => ['bi-person', 'bi-lock', 'bi-facebook', 'bi-google'],
        'register.twig' => ['bi-person', 'bi-envelope', 'bi-lock', 'bi-facebook', 'bi-google'],
        'recovery.twig' => ['bi-envelope'],
    ];

    /**
     * The authentication bake templates must not rely on Font Awesome.
     *
     * @return void
     */
    public function testAuthTemplatesUseBootstrapIcons(): void
    {
        $base = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'bake' . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR;

        foreach (static::TEMPLATES as $file => $icons) {
            $content = (string)file_get_contents($base . $file);

            $this->assertDoesNotMatchRegularExpression(
                '/\b(?:fas|far|fab|fal|fad)\b|fa-[a-z0-9-]+/i',
                $content,
                sprintf('Font Awesome classes remain in %s', $file),
            );

            foreach ($icons as $icon) {
                $this->assertStringContainsString(
                    'bi ' . $icon,
                    $content,
                    sprintf('Expected %s in %s', $icon, $file),
                );
            }
        }
    }

    /**
     * The authentication bake templates must use Bootstrap 5 utilities.
     *
     * @return void
     */
    public function testAuthTemplatesUseBootstrap5Utilities(): void
    {
        $base = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'bake' . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR;

        foreach (array_keys(static::TEMPLATES) as $file) {
            $content = (string)file_get_contents($base . $file);

            $this->assertStringNotContainsString('mr-2', $content, sprintf('Bootstrap 4 spacing remains in %s', $file));
            $this->assertStringNotContainsString('btn-block', $content, sprintf('Bootstrap 4 block button remains in %s', $file));
            $this->assertStringContainsString('w-100', $content, sprintf('Expected w-100 in %s', $file));
        }

        foreach (['login.twig', 'register.twig'] as $file) {
            $content = (string)file_get_contents($base . $file);
            $this->assertStringContainsString('me-2', $content, sprintf('Expected me-2 in %s', $file));
        }
    }

    /**
     * The authentication bake templates must not use the removed BootstrapUI 4
     * `custom` checkbox option.
     *
     * @return void
     */
    public function testAuthTemplatesDoNotUseBootstrapUi4CustomOption(): void
    {
        $base = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'bake' . DIRECTORY_SEPARATOR . 'Template' . DIRECTORY_SEPARATOR;

        foreach (array_keys(static::TEMPLATES) as $file) {
            $content = (string)file_get_contents($base . $file);
            $this->assertStringNotContainsString(
                "'custom' =>",
                $content,
                sprintf('BootstrapUI 4 custom option remains in %s', $file),
            );
        }
    }
}
