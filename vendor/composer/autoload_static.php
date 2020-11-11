<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac9e3888d6824c5d9a43e7e5910133c2
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Money\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Money\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac9e3888d6824c5d9a43e7e5910133c2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac9e3888d6824c5d9a43e7e5910133c2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}