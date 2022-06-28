<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8bfc845f171df801eb9dc15ee002b24f
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WpFluentAdmin\\' => 14,
            'Wenprise\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WpFluentAdmin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Wenprise\\' => 
        array (
            0 => __DIR__ . '/..' . '/wenprise/wordpress-settings-api/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Wenprise\\SettingsApi' => __DIR__ . '/..' . '/wenprise/wordpress-settings-api/src/SettingsApi.php',
        'WpFluentAdmin\\Actions\\ActivationAction' => __DIR__ . '/../..' . '/src/Actions/ActivationAction.php',
        'WpFluentAdmin\\Actions\\DeactivationAction' => __DIR__ . '/../..' . '/src/Actions/DeactivationAction.php',
        'WpFluentAdmin\\Actions\\UninstallationAction' => __DIR__ . '/../..' . '/src/Actions/UninstallationAction.php',
        'WpFluentAdmin\\Frontend' => __DIR__ . '/../..' . '/src/Frontend.php',
        'WpFluentAdmin\\Helpers' => __DIR__ . '/../..' . '/src/Helpers.php',
        'WpFluentAdmin\\Init' => __DIR__ . '/../..' . '/src/Init.php',
        'WpFluentAdmin\\Options' => __DIR__ . '/../..' . '/src/Options.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8bfc845f171df801eb9dc15ee002b24f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8bfc845f171df801eb9dc15ee002b24f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8bfc845f171df801eb9dc15ee002b24f::$classMap;

        }, null, ClassLoader::class);
    }
}
