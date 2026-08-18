<?php
declare(strict_types=1);

namespace CakeLte\Test\Command;

use CakeLte\Command\InstallCommand;

/**
 * InstallCommand test subclass that spies on the symlink creation.
 */
class InstallCommandSpy extends InstallCommand
{
    /**
     * Calls recorded by _createSymlink.
     *
     * @var array<int, array{0: string, 1: string}>
     */
    public array $symlinks = [];

    /**
     * @inheritDoc
     */
    protected function _createSymlink(string $target, string $link, bool $relative = false): bool
    {
        $this->symlinks[] = [$target, $link];

        return true;
    }
}