<?php
declare(strict_types=1);

namespace CakeLte\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;

/**
 * Cakelte command.
 */
class CopyFilesCommand extends Command
{
    /**
     * @return string
     */
    public static function defaultName(): string
    {
        return 'cakelte copy_files';
    }

    protected array $files = [
        'layout' => [
            'layout/default.php',
            'layout/login.php',
            'layout/top-nav.php',
        ],
        'content' => [
            'element/content/header.php',
        ],
        'header' => [
            'element/header/main.php',
            'element/header/menu.php',
            'element/header/messages.php',
            'element/header/notifications.php',
            'element/header/search-default.php',
            'element/header/search-block.php',
        ],
        'footer' => [
            'element/footer/main.php',
        ],
        'sidebar' => [
            'element/sidebar/main.php',
            'element/sidebar/menu.php',
            'element/sidebar/search.php',
            'element/sidebar/user.php',
        ],
        'aside' => [
            'element/aside/main.php',
        ],
        'extra' => [
            'element/extra/css.php',
            'element/extra/script.php',
        ],
    ];

    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        $parser->addArgument('type', [
            'required' => false,
            'choices' => array_keys($this->files),
            'help' => 'Type of files to copy',
        ]);

        $parser->addOption('all', [
            'short' => 'a',
            'help' => 'Copy all files',
            'boolean' => true,
        ]);
        $parser->addOption('force', [
            'short' => 'f',
            'help' => 'Force overwrite',
            'boolean' => true,
        ]);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     * termail

     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return int|null The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io): ?int
    {
        // @todo if all files
        $all = $args->getOption('all');
        $forceOverwrite = (bool)$args->getOption('force');
        $type = $args->getArgument('type');

        if (!$all && empty($type)) {
            $io->err('Error: Need to add a type argument or --all option, excecute `cakelte copy_files -h` for help.');

            return self::CODE_ERROR;
        }

        if ($all) {
            $files = $this->getAllFiles();
        } else {
            $files = $this->files[$type];
        }

        $src = Configure::read('CakeLte.plugin-path') . 'templates/';
        $dest = Configure::read('App.paths.templates.0') . 'plugin/CakeLte/';

        foreach ($files as $file) {
            $content = (string)file_get_contents($src . $file);
            $io->createFile($dest . $file, $content, $forceOverwrite);
        }

        return self::CODE_SUCCESS;
    }

    /**
     * @return array
     */
    protected function getAllFiles(): array
    {
        $output = [];
        foreach ($this->files as $categories) {
            foreach ($categories as $file) {
                $output[] = $file;
            }
        }

        return $output;
    }
}
