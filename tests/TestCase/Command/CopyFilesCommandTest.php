<?php
declare(strict_types=1);

namespace CakeLte\Test\TestCase\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\TestSuite\TestCase;
use CakeLte\CakeLtePlugin;
use CakeLte\Command\CopyFilesCommand;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionMethod;

/**
 * CakeLte\Command\CopyFilesCommand Test Case
 */
class CopyFilesCommandTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakeLte\Command\CopyFilesCommand
     */
    protected $CopyFilesCommand;

    /**
     * Temporary destination paths templates.
     *
     * @var string
     */
    protected string $destTemplates;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->CopyFilesCommand = new CopyFilesCommand();

        if (!Plugin::isLoaded('CakeLte')) {
            Plugin::getCollection()->add(new CakeLtePlugin());
        }

        $this->destTemplates = sys_get_temp_dir() . DS . 'cakelte-copy-' . getmypid() . '-' . uniqid();
        Configure::write('App.paths.templates.0', $this->destTemplates);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        if (is_dir($this->destTemplates)) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($this->destTemplates, FilesystemIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST,
            );
            foreach ($files as $file) {
                $file->isDir() ? rmdir($file->getPathname()) : unlink($file->getPathname());
            }
            rmdir($this->destTemplates);
        }

        Configure::delete('App.paths.templates.0');
        unset($this->CopyFilesCommand);

        parent::tearDown();
    }

    /**
     * Test defaultName method
     *
     * @return void
     * @uses \CakeLte\Command\CopyFilesCommand::defaultName()
     */
    public function testDefaultName(): void
    {
        $this->assertSame('cakelte copy_files', CopyFilesCommand::defaultName());
    }

    /**
     * Test buildOptionParser method
     *
     * @return void
     * @uses \CakeLte\Command\CopyFilesCommand::buildOptionParser()
     */
    public function testBuildOptionParser(): void
    {
        $parser = $this->CopyFilesCommand->getOptionParser();

        $this->assertInstanceOf(ConsoleOptionParser::class, $parser);
        $this->assertArrayHasKey('all', $parser->options());
        $this->assertArrayHasKey('force', $parser->options());
        $this->assertContains('type', $parser->argumentNames());
    }

    /**
     * Test execute with neither type nor --all returns CODE_ERROR
     *
     * @return void
     * @uses \CakeLte\Command\CopyFilesCommand::execute()
     */
    public function testExecuteWithoutTypeOrAllReturnsError(): void
    {
        $args = new Arguments([], [], ['type']);
        $io = $this->getMockBuilder(ConsoleIo::class)
            ->onlyMethods(['err'])
            ->getMock();

        $io->expects($this->once())
            ->method('err')
            ->with(
                $this->stringContains('Need to add a type argument or --all'),
            );

        $result = $this->CopyFilesCommand->execute($args, $io);

        $this->assertSame(Command::CODE_ERROR, $result);
    }

    /**
     * Test execute with --all copies every existing file to the app templates path
     *
     * @return void
     * @uses \CakeLte\Command\CopyFilesCommand::execute()
     */
    public function testExecuteAllCopiesFiles(): void
    {
        $args = new Arguments([], ['all' => true], ['type']);
        $io = $this->getMockBuilder(ConsoleIo::class)
            ->onlyMethods(['createFile'])
            ->getMock();

        $io->expects($this->atLeast(8))
            ->method('createFile')
            ->willReturnCallback(function (string $path, string $contents): bool {
                $sourceRoot = Plugin::path('CakeLte') . 'templates/';
                $sourceFiles = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($sourceRoot, FilesystemIterator::SKIP_DOTS),
                );
                $found = false;
                foreach ($sourceFiles as $file) {
                    if ($file->isFile() && file_get_contents($file->getPathname()) === $contents) {
                        $found = true;

                        break;
                    }
                }
                $this->assertTrue($found, sprintf('No source template matches copied file %s', $path));

                return true;
            });

        $result = $this->CopyFilesCommand->execute($args, $io);

        $this->assertSame(Command::CODE_SUCCESS, $result);
    }

    /**
     * Test execute with a type argument copies that category
     *
     * @return void
     * @uses \CakeLte\Command\CopyFilesCommand::execute()
     */
    public function testExecuteWithTypeCopiesCategory(): void
    {
        $args = new Arguments(['sidebar'], [], ['type']);
        $io = $this->getMockBuilder(ConsoleIo::class)
            ->onlyMethods(['createFile'])
            ->getMock();

        $io->expects($this->exactly(2))
            ->method('createFile')
            ->willReturn(true);

        $result = $this->CopyFilesCommand->execute($args, $io);

        $this->assertSame(Command::CODE_SUCCESS, $result);
    }

    /**
     * Test getAllFiles method returns all file paths
     *
     * @return void
     * @uses \CakeLte\Command\CopyFilesCommand::getAllFiles()
     */
    public function testGetAllFiles(): void
    {
        $reflection = new ReflectionMethod($this->CopyFilesCommand, 'getAllFiles');
        $reflection->setAccessible(true);

        $files = $reflection->invoke($this->CopyFilesCommand);

        $this->assertNotEmpty($files);
        $this->assertContains('layout/default.php', $files);
        $this->assertContains('element/sidebar/menu.php', $files);
    }
}
