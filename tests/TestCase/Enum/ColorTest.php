<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Enum;

use Cake\TestSuite\TestCase;
use CakeLte\Enum\Color;

/**
 * CakeLte\Enum\Color Test Case
 */
class ColorTest extends TestCase
{
    /**
     * Test cssClass method with the default prefix and prefix class
     *
     * @return void
     * @uses \CakeLte\Enum\Color::cssClass()
     */
    public function testCssClass(): void
    {
        $this->assertSame('card card-primary', Color::Primary->cssClass());
        $this->assertSame('card card-secondary', Color::Secondary->cssClass());
        $this->assertSame('card card-success', Color::Success->cssClass());
    }

    /**
     * Test cssClass method with a custom prefix
     *
     * @return void
     * @uses \CakeLte\Enum\Color::cssClass()
     */
    public function testCssClassCustomPrefix(): void
    {
        $this->assertSame('alert alert-danger', Color::Danger->cssClass('alert'));
        $this->assertSame('btn btn-info', Color::Info->cssClass('btn'));
        $this->assertSame('text-bg text-bg-warning', Color::Warning->cssClass('text-bg'));
    }

    /**
     * Test cssClass method with prefixClassAlone disabled
     *
     * @return void
     * @uses \CakeLte\Enum\Color::cssClass()
     */
    public function testCssClassPrefixAloneDisabled(): void
    {
        $this->assertSame('card-primary', Color::Primary->cssClass('card', false));
        $this->assertSame('alert-dark', Color::Dark->cssClass('alert', false));
    }

    /**
     * Test cssClass covers every case of each color group
     *
     * @return void
     * @uses \CakeLte\Enum\Color::cssClass()
     */
    public function testCssClassAllCases(): void
    {
        foreach (Color::cases() as $color) {
            $expected = 'card card-' . $color->value;
            $this->assertSame($expected, $color->cssClass());
        }
    }
}
