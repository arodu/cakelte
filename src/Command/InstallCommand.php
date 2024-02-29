<?php
declare(strict_types=1);

namespace CakeLte\Command;

use Cake\Command\Command;
use Cake\Command\PluginAssetsTrait;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * Install command.
 */
class InstallCommand extends Command
{
    use PluginAssetsTrait;

    /**
     * @return string
     */
    public static function defaultName(): string
    {
        return 'cakelte install';
    }

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser->setDescription([
            'Copy AdminLte assets to webroot',
        ])->addOption('overwrite', [
            'short' => 'o',
            'help' => 'Overwrite existing symlink / folder / files.',
            'default' => false,
            'boolean' => true,
        ]);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return int|null The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        $this->io = $io;
        $this->args = $args;

        $src = ROOT . DS . 'vendor' . DS . 'almasaeed2010' . DS . 'adminlte' . DS;
        $dest = WWW_ROOT . 'adminlte';

        $this->_createSymlink($src, $dest);

        $this->io->out();
        $this->io->out('Done');

        return static::CODE_SUCCESS;
    }
}
