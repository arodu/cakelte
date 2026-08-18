<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\TestSuite\TestCase;
use CakeLte\Command\InstallCommand;
use CakeLte\Test\Command\InstallCommandSpy;

require_once dirname(__DIR__, 2) . '/stubs/InstallCommandSpy.php';

/**
 * CakeLte\Command\InstallCommand Test Case
 */
class InstallCommandTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakeLte\Command\InstallCommand
     */
    protected $InstallCommand;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->InstallCommand = new InstallCommand();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InstallCommand);

        parent::tearDown();
    }

    /**
     * Test defaultName method
     *
     * @return void
     * @uses \CakeLte\Command\InstallCommand::defaultName()
     */
    public function testDefaultName(): void
    {
        $this->assertSame('cakelte install', InstallCommand::defaultName());
    }

    /**
     * Test buildOptionParser method
     *
     * @return void
     * @uses \CakeLte\Command\InstallCommand::buildOptionParser()
     */
    public function testBuildOptionParser(): void
    {
        $parser = $this->InstallCommand->getOptionParser();

        $this->assertInstanceOf(ConsoleOptionParser::class, $parser);
        $this->assertArrayHasKey('overwrite', $parser->options());
    }

    /**
     * Test execute method creates the adminlte webroot symlink
     *
     * @return void
     * @uses \CakeLte\Command\InstallCommand::execute()
     */
    public function testExecute(): void
    {
        $command = new InstallCommandSpy();
        $args = new Arguments([], [], []);
        $io = $this->getMockBuilder(ConsoleIo::class)
            ->onlyMethods(['out'])
            ->getMock();

        $io->expects($this->atLeast(2))->method('out');

        $result = $command->execute($args, $io);

        $this->assertSame(Command::CODE_SUCCESS, $result);
        $this->assertCount(1, $command->symlinks);
        $this->assertStringContainsString('almasaeed2010' . DS . 'adminlte', $command->symlinks[0][0]);
        $this->assertStringEndsWith('adminlte', $command->symlinks[0][1]);
    }
}
