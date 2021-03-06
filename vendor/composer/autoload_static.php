<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit888a067bbb86e06ae16daee34894a800
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'dynamensoftw\\zkteco_send\\' => 25,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Dotenv\\' => 25,
        ),
        'D' => 
        array (
            'Dnsw\\Helpers\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'dynamensoftw\\zkteco_send\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Symfony\\Component\\Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/dotenv',
        ),
        'Dnsw\\Helpers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/dnsw/helpers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit888a067bbb86e06ae16daee34894a800::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit888a067bbb86e06ae16daee34894a800::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
