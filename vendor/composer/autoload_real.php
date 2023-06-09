<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbb0afa0894f64c8e09b44bb15f5cf2ba
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitbb0afa0894f64c8e09b44bb15f5cf2ba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbb0afa0894f64c8e09b44bb15f5cf2ba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbb0afa0894f64c8e09b44bb15f5cf2ba::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
