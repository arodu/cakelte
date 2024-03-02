<?php
declare(strict_types=1);

namespace CakeLte\Style;

class Header implements StyleInterface
{
    use StyleTrait;

    private string $_name = 'header';

    public const STYLE_PRIMARY = 'primary';
    public const STYLE_SECONDARY = 'secondary';
    public const STYLE_INFO = 'info';
    public const STYLE_SUCCESS = 'success';
    public const STYLE_DANGER = 'danger';
    public const STYLE_WARNING = 'warning';
    public const STYLE_WHITE = 'white';
    public const STYLE_DARK = 'dark';
    /** @deprecated STYLE_BLACK is deprecated, use STYLE_DARK insted*/
    public const STYLE_BLACK = self::STYLE_DARK;

    protected const CSS_CLASSES = [
        self::STYLE_PRIMARY => 'navbar-primary navbar-light',
        self::STYLE_SECONDARY => 'navbar-secondary navbar-light',
        self::STYLE_INFO => 'navbar-info navbar-light',
        self::STYLE_SUCCESS => 'navbar-success navbar-light',
        self::STYLE_DANGER => 'navbar-danger navbar-light',
        self::STYLE_WARNING => 'navbar-warning navbar-light',
        self::STYLE_WHITE => 'navbar-white navbar-light',
        self::STYLE_DARK => 'navbar-dark navbar-light',
    ];
}
