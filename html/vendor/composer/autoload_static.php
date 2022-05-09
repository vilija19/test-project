<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbfe4cc75ebc43643e3cad29b7ac9bdc
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vilija\\hw_9\\' => 12,
            'Vilija19\\passgen\\' => 17,
            'Vilija19\\hw_10\\' => 15,
            'Vilija19\\Router\\' => 16,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'A' => 
        array (
            'Aigletter\\Contracts\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vilija\\hw_9\\' => 
        array (
            0 => __DIR__ . '/../..' . '/hw_9',
        ),
        'Vilija19\\passgen\\' => 
        array (
            0 => __DIR__ . '/..' . '/vilija19/pass_gen/src',
        ),
        'Vilija19\\hw_10\\' => 
        array (
            0 => __DIR__ . '/../..' . '/hw_10',
        ),
        'Vilija19\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/vilija19/router/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Aigletter\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/aigletter/contracts/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbfe4cc75ebc43643e3cad29b7ac9bdc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbfe4cc75ebc43643e3cad29b7ac9bdc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbbfe4cc75ebc43643e3cad29b7ac9bdc::$classMap;

        }, null, ClassLoader::class);
    }
}
