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
     * Test cssClass with the default prefix.
     *
     * @return void
     */
    public function testCssClass(): void
    {
        $this->assertSame('card card-primary', Color::PRIMARY->cssClass());
        $this->assertSame('card card-secondary', Color::SECONDARY->cssClass());
        $this->assertSame('card card-success', Color::SUCCESS->cssClass());
    }

    /**
     * Test cssClass with a custom prefix.
     *
     * @return void
     */
    public function testCssClassCustomPrefix(): void
    {
        $this->assertSame('alert alert-danger', Color::DANGER->cssClass('alert'));
        $this->assertSame('btn btn-info', Color::INFO->cssClass('btn'));
    }

    /**
     * Test cssClass with prefixClassAlone disabled.
     *
     * @return void
     */
    public function testCssClassPrefixAloneDisabled(): void
    {
        $this->assertSame('card-primary', Color::PRIMARY->cssClass('card', false));
        $this->assertSame('alert-dark', Color::DARK->cssClass('alert', false));
    }

    /**
     * Test cssClass covers every case.
     *
     * @return void
     */
    public function testCssClassAllCases(): void
    {
        foreach (Color::cases() as $color) {
            $this->assertSame('card card-' . $color->value, $color->cssClass());
        }
    }
}
