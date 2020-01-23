<?php
class Autoloader
{
    public static function register()
    {
    	$directorys = array(
            '/src/',
            '/src/core/',
            '/src/controller/'
        );

        spl_autoload_register(function ($class) use ($directorys) {

            $file = __DIR__.str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            } elseif (file_exists(__DIR__.$directorys[0].$class.'.php')) {
				require __DIR__.$directorys[0].$class.'.php';
                return true;
            } elseif (file_exists(__DIR__.$directorys[1].$class.'.php')) {
				require __DIR__.$directorys[1].$class.'.php';
                return true;
            } elseif (file_exists(__DIR__.$directorys[2].$class.'.php')) {
				require __DIR__.$directorys[2].$class.'.php';
                return true;
            }
            return false;
        });
    }
}