<?php
declare(strict_types=1);

namespace CakeLte\Style;

use Cake\View\Helper;

/**
 * Styles interface
 */
interface StyleInterface
{
    /**
     * @param \Cake\View\Helper $helper
     */
    public function __construct(Helper $helper);

    /**
     * @param string $key
     * @param string $style
     * @param bool $autoload
     * @return void
     */
    public function addStyle(string $key, string $style, bool $autoload = true): void;

    /**
     * @param string|null $key
     * @return string|null
     */
    public function getStyle(?string $key = null): ?string;

    /**
     * @return array
     */
    public function getStyles(): array;
}
