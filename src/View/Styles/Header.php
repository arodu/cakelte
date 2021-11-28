<?php

declare(strict_types=1);

namespace CakeLte\View\Styles;

use Cake\View\Helper;
use CakeLte\View\Styles\StylesTrait;

class Header
{
    use StylesTrait;

    public const STYLE_PRIMARY = 'primary';
    public const STYLE_SECONDARY = 'secondary';
    public const STYLE_INFO = 'info';
    public const STYLE_SUCCESS = 'success';
    public const STYLE_DANGER = 'danger';
    public const STYLE_WARNING = 'warning';
    public const STYLE_WHITE = 'white';
    public const STYLE_BLACK = 'black';

    protected $_styles = [
        self::STYLE_PRIMARY => 'navbar-primary navbar-light',
        self::STYLE_SECONDARY => 'navbar-secondary navbar-light',
        self::STYLE_INFO => 'navbar-info navbar-light',
        self::STYLE_SUCCESS => 'navbar-success navbar-light',
        self::STYLE_DANGER => 'navbar-danger navbar-light',
        self::STYLE_WARNING => 'navbar-warning navbar-light',
        self::STYLE_WHITE => 'navbar-white navbar-light',
        self::STYLE_BLACK => 'navbar-black navbar-light',
    ];

    private $_helper;
    private $_name;

    /**
     * @param Helper $helper
     */
    public function __construct($helper)
    {
        $this->_helper = $helper;
        $this->_name = 'header';
    }
}
