<?php
declare(strict_types=1);

namespace App\Enum;

enum Color: string
{
    case DEFAULT = 'default';

    case PRIMARY = 'primary';
    case SECONDARY = 'secondary';
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';
    case DANGER = 'danger';

    case BLACK = 'black';
    case GRAY_DARK = 'gray-dark';
    case GRAY = 'gray';
    case LIGHT = 'light';
    case DARK = 'dark';

    case INDIGO = 'indigo';
    case LIGHTBLUE = 'lightblue';
    case NAVY = 'navy';
    case PURPLE = 'purple';
    case FUCHSIA = 'fuchsia';
    case PINK = 'pink';
    case MAROON = 'maroon';
    case ORANGE = 'orange';
    case LIME = 'lime';
    case TEAL = 'teal';
    case OLIVE = 'olive';

    /**
     * @param string $prefix
     * @param bool $prefixClassAlone
     * @return string
     */
    public function cssClass(string $prefix = 'card', bool $prefixClassAlone = true): string
    {
        return trim(implode(' ', [
            $prefixClassAlone ? $prefix : null,
            $prefix . '-' . $this->value,
        ]));
    }
}
