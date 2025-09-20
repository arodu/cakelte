<?php
declare(strict_types=1);

namespace CakeLte\Enum;

enum Layout: string
{
    case FIXED_SIDEBAR = 'fixed-sidebar';
    case FIXED_COMPLETE = 'fixed-complete';
    case FIXED_MINI = 'fixed-mini';
    case FIXED_MINI_COLLAPSED = 'fixed-mini-collapsed';

    /**
     * @return string
     */
    public function getCssClass(): string
    {
        return match ($this->value) {
            self::FIXED_SIDEBAR => 'layout-fixed',
            self::FIXED_COMPLETE => 'layout-fixed-complete',
            self::FIXED_MINI => 'layout-fixed sidebar-mini',
            self::FIXED_MINI_COLLAPSED => 'layout-fixed sidebar-mini sidebar-collapse',
            default => '',
        };
    }
}
