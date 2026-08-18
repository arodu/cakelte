<?php
declare(strict_types=1);

/**
 * Constants for standalone PHPStan analysis.
 *
 * These constants are normally defined by the host application bootstrap.
 * They are only loaded during static analysis so the plugin can be analysed
 * in a standalone checkout.
 */

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__, 2));
}
if (!defined('CONFIG')) {
    define('CONFIG', ROOT . DS . 'config' . DS);
}
if (!defined('WWW_ROOT')) {
    define('WWW_ROOT', ROOT . DS . 'webroot' . DS);
}
if (!defined('APP')) {
    define('APP', ROOT . DS . 'tests' . DS . 'test_app' . DS);
}
if (!defined('TMP')) {
    define('TMP', sys_get_temp_dir() . DS);
}
