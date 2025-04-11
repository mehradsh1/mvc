<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit460711af0723af984d91caf5c850f36d
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit460711af0723af984d91caf5c850f36d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit460711af0723af984d91caf5c850f36d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit460711af0723af984d91caf5c850f36d::$classMap;

        }, null, ClassLoader::class);
    }
}
