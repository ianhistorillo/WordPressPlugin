<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit82a15eca4a893721cf237e100bc27798
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit82a15eca4a893721cf237e100bc27798::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit82a15eca4a893721cf237e100bc27798::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit82a15eca4a893721cf237e100bc27798::$classMap;

        }, null, ClassLoader::class);
    }
}
