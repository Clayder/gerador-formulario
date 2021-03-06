<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8df02e50940dc430beff9c2d1d9f1144
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'a' => 
        array (
            'application\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'application\\' => 
        array (
            0 => __DIR__ . '/../..' . '/application',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8df02e50940dc430beff9c2d1d9f1144::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8df02e50940dc430beff9c2d1d9f1144::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
