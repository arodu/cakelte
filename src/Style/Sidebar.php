<?php

declare(strict_types=1);

namespace CakeLte\Style;

use CakeLte\Style\StyleTrait;

class Sidebar implements StyleInterface
{
    use StyleTrait;

    private $_name = 'sidebar';

    public const STYLE_DARK_PRIMARY = 'dark-primary';
    public const STYLE_DARK_SECONDARY = 'dark-secondary';
    public const STYLE_DARK_INFO = 'dark-info';
    public const STYLE_DARK_SUCCESS = 'dark-success';
    public const STYLE_DARK_DANGER = 'dark-danger';
    public const STYLE_DARK_WARNING = 'dark-warning';
    public const STYLE_DARK_WHITE = 'dark-white';
    public const STYLE_DARK_BLACK = 'dark-black';

    public const STYLE_LIGHT_PRIMARY = 'light-primary';
    public const STYLE_LIGHT_SECONDARY = 'light-secondary';
    public const STYLE_LIGHT_INFO = 'light-info';
    public const STYLE_LIGHT_SUCCESS = 'light-success';
    public const STYLE_LIGHT_DANGER = 'light-danger';
    public const STYLE_LIGHT_WARNING = 'light-warning';
    public const STYLE_LIGHT_WHITE = 'light-white';
    public const STYLE_LIGHT_BLACK = 'light-black';

    private const CSS_CLASSES = [
        self::STYLE_DARK_PRIMARY => 'sidebar-dark-primary',
        self::STYLE_DARK_SECONDARY => 'sidebar-dark-secondary',
        self::STYLE_DARK_INFO => 'sidebar-dark-info',
        self::STYLE_DARK_SUCCESS => 'sidebar-dark-success',
        self::STYLE_DARK_DANGER => 'sidebar-dark-danger',
        self::STYLE_DARK_WARNING => 'sidebar-dark-warning',
        self::STYLE_DARK_WHITE => 'sidebar-dark-white',
        self::STYLE_DARK_BLACK => 'sidebar-dark-black',

        self::STYLE_LIGHT_PRIMARY => 'sidebar-light-primary',
        self::STYLE_LIGHT_SECONDARY => 'sidebar-light-secondary',
        self::STYLE_LIGHT_INFO => 'sidebar-light-info',
        self::STYLE_LIGHT_SUCCESS => 'sidebar-light-success',
        self::STYLE_LIGHT_DANGER => 'sidebar-light-danger',
        self::STYLE_LIGHT_WARNING => 'sidebar-light-warning',
        self::STYLE_LIGHT_WHITE => 'sidebar-light-white',
        self::STYLE_LIGHT_BLACK => 'sidebar-light-black',
    ];

    public static function getDarkStyles()
    {
        return [
            static::STYLE_DARK_PRIMARY => static::CSS_CLASSES[static::STYLE_DARK_PRIMARY],
            static::STYLE_DARK_SECONDARY => static::CSS_CLASSES[static::STYLE_DARK_SECONDARY],
            static::STYLE_DARK_INFO => static::CSS_CLASSES[static::STYLE_DARK_INFO],
            static::STYLE_DARK_SUCCESS => static::CSS_CLASSES[static::STYLE_DARK_SUCCESS],
            static::STYLE_DARK_DANGER => static::CSS_CLASSES[static::STYLE_DARK_DANGER],
            static::STYLE_DARK_WARNING => static::CSS_CLASSES[static::STYLE_DARK_WARNING],
            static::STYLE_DARK_WHITE => static::CSS_CLASSES[static::STYLE_DARK_WHITE],
            static::STYLE_DARK_BLACK => static::CSS_CLASSES[static::STYLE_DARK_BLACK],
        ];
    }

    public static function getLightStyles()
    {
        return [
            static::STYLE_LIGHT_PRIMARY => static::CSS_CLASSES[static::STYLE_LIGHT_PRIMARY],
            static::STYLE_LIGHT_SECONDARY => static::CSS_CLASSES[static::STYLE_LIGHT_SECONDARY],
            static::STYLE_LIGHT_INFO => static::CSS_CLASSES[static::STYLE_LIGHT_INFO],
            static::STYLE_LIGHT_SUCCESS => static::CSS_CLASSES[static::STYLE_LIGHT_SUCCESS],
            static::STYLE_LIGHT_DANGER => static::CSS_CLASSES[static::STYLE_LIGHT_DANGER],
            static::STYLE_LIGHT_WARNING => static::CSS_CLASSES[static::STYLE_LIGHT_WARNING],
            static::STYLE_LIGHT_WHITE => static::CSS_CLASSES[static::STYLE_LIGHT_WHITE],
            static::STYLE_LIGHT_BLACK => static::CSS_CLASSES[static::STYLE_LIGHT_BLACK],
        ];
    }
}