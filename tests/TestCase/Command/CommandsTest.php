<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Command;

use Cake\TestSuite\TestCase;
use CakeLte\Command\CopyFilesCommand;
use CakeLte\Command\InstallCommand;

/**
 * CakeLte command name Test Case
 */
class CommandsTest extends TestCase
{
    /**
     * Test InstallCommand::defaultName().
     *
     * @return void
     */
    public function testInstallCommandName(): void
    {
        $this->assertSame('cakelte install', InstallCommand::defaultName());
    }

    /**
     * Test CopyFilesCommand::defaultName().
     *
     * @return void
     */
    public function testCopyFilesCommandName(): void
    {
        $this->assertSame('cakelte copy_files', CopyFilesCommand::defaultName());
    }
}
