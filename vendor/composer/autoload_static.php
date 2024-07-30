<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8656cf6114e1869b25618d0aedb61065
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8656cf6114e1869b25618d0aedb61065::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8656cf6114e1869b25618d0aedb61065::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8656cf6114e1869b25618d0aedb61065::$classMap;

        }, null, ClassLoader::class);
    }
}
