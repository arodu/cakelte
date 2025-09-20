<?php
declare(strict_types=1);

namespace CakeLte\Enum;

enum Size: string
{
    case NONE = 'none';     // <576px
    case SM = 'sm';         // ≥576px
    case MD = 'md';         // ≥768px
    case LG = 'lg';         // ≥992px
    case XL = 'xl';         // ≥1200px
    case XXL = 'xxl';       // ≥1400px

    /**
     * @return string|null
     */
    public function get(): ?string
    {
        if ($this->value === self::NONE) {
            return null;
        }

        return $this->value;
    }
}
