<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit566d85a148bad0b59dbc4916389eed4f
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LLMS\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LLMS\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit566d85a148bad0b59dbc4916389eed4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit566d85a148bad0b59dbc4916389eed4f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}