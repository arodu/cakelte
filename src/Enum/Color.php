<?php
declare(strict_types=1);

namespace CakeLte\Enum;

enum Color: string
{
    case Default = 'default';

    case Primary = 'primary';
    case Secondary = 'secondary';
    case Info = 'info';
    case Success = 'success';
    case Warning = 'warning';
    case Danger = 'danger';

    case Black = 'black';
    case GrayDark = 'gray-dark';
    case Gray = 'gray';
    case Light = 'light';
    case Dark = 'dark';

    case Indigo = 'indigo';
    case LightBlue = 'lightblue';
    case Navy = 'navy';
    case Purple = 'purple';
    case Fuchsia = 'fuchsia';
    case Pink = 'pink';
    case Maroon = 'maroon';
    case Orange = 'orange';
    case Lime = 'lime';
    case Teal = 'teal';
    case Olive = 'olive';

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
