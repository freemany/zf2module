<?php
/**
 * @link http://github.com/dkcwd/dkcwd-zf2-munee for the canonical source repository
 * @author Dave Clark dave@dkcwd.com.au
 * @copyright (c) Dave Clark 2012 (https://www.dkcwd.com.au)
 * @license http://opensource.org/licenses/mit-license.php
 */

namespace FyZf2ModuleTest;

use RuntimeException;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

class Bootstrap
{

    public static function init()
    {
        static::initAutoloader();
    }

    protected static function initAutoloader()
    {

        $vendorPath = static::findParentPath('vendor');

        if (is_readable($vendorPath . '/autoload.php')) {
            $loader = include $vendorPath . '/autoload.php';
        } else {
            $zf2Path = getenv('ZF2_PATH') ?: (defined('ZF2_PATH') ? ZF2_PATH : (is_dir($vendorPath . '/ZF2/library') ? $vendorPath . '/ZF2/library' : false));

            if (!$zf2Path) {
                throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
            }

            include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';

        }

    }

    protected static function findParentPath($path)
    {
        $dir         = __DIR__;
        $previousDir = '.';
        while (!is_dir($dir . '/' . $path)) {
            $dir = dirname($dir);

            if ($previousDir === $dir) {
                return false;
            }

            $previousDir = $dir;
        }

        return $dir . '/' . $path;
    }
}

Bootstrap::init();