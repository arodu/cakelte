<?php

declare(strict_types=1);

namespace CakeLte\Style;

/**
 * Styles interface
 */
interface StyleInterface
{
    public function __construct($helper);
    public function addStyle(string $key, string $style, bool $autoload = true): void;
    public function getStyle(?string $key = null): ?string;
    public function getStyles(): array;
}
