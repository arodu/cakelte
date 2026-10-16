<?php
declare(strict_types=1);

namespace CakeLte\Style;

/**
 * Styles interface
 */
interface StyleInterface
{
    /**
     * Constructor
     *
     * @param mixed $helper The CakeLte helper instance.
     */
    public function __construct($helper);

    /**
     * Add a custom style.
     *
     * @param string $key Style key.
     * @param string $style CSS classes.
     * @param bool $autoload Whether to autoload the style.
     * @return void
     */
    public function addStyle(string $key, string $style, bool $autoload = true): void;

    /**
     * Get a style by key.
     *
     * @param string|null $key Style key.
     * @return string|null
     */
    public function getStyle(?string $key = null): ?string;

    /**
     * Get all styles.
     *
     * @return array
     */
    public function getStyles(): array;
}
