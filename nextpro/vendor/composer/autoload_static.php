<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2318364161971370c69cfa27fc10663
{
    public static $files = array(
        '0a68643f390103d0f55e58b21a0436a0' => __DIR__ . '/../..' . '/inc/admin-functions.php',
        '83baba981aeb14ee02e93a2818aa775f' => __DIR__ . '/../..' . '/inc/template-functions.php',
    );

    public static $prefixLengthsPsr4 = array(
        'M' =>
        array(
            'Nextpro\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array(
        'Nextpro\\' =>
        array(
            0 => __DIR__ . '/../..' . '/inc/classes',
        ),
    );

    public static $classMap = array(
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Nextpro\\Blocks' => __DIR__ . '/../..' . '/inc/classes/Blocks.php',
        'Nextpro\\Comment_Walker' => __DIR__ . '/../..' . '/inc/classes/Comment_Walker.php',
        'Nextpro\\Custom_Colors' => __DIR__ . '/../..' . '/inc/classes/Custom_Colors.php',
        'Nextpro\\Customize' => __DIR__ . '/../..' . '/inc/classes/Customize.php',
        'Nextpro\\Customize_Color_Control' => __DIR__ . '/../..' . '/inc/classes/Customize_Color_Control.php',
        'Nextpro\\Design_Options' => __DIR__ . '/../..' . '/inc/classes/Design_Options.php',
        'Nextpro\\Footer' => __DIR__ . '/../..' . '/inc/classes/Footer.php',
        'Nextpro\\Google_Fonts' => __DIR__ . '/../..' . '/inc/classes/Google_Fonts.php',
        'Nextpro\\Header' => __DIR__ . '/../..' . '/inc/classes/Header.php',
        'Nextpro\\Helpers' => __DIR__ . '/../..' . '/inc/classes/Helpers.php',
        'Nextpro\\Loader' => __DIR__ . '/../..' . '/inc/classes/Loader.php',
        'Nextpro\\Meta_Boxes' => __DIR__ . '/../..' . '/inc/classes/Meta_Boxes.php',
        'Nextpro\\Nav_Walker' => __DIR__ . '/../..' . '/inc/classes/Nav_Walker.php',
        'Nextpro\\SVG_Icons' => __DIR__ . '/../..' . '/inc/classes/SVG_Icons.php',
        'Nextpro\\Typography' => __DIR__ . '/../..' . '/inc/classes/Typography.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2318364161971370c69cfa27fc10663::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2318364161971370c69cfa27fc10663::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite2318364161971370c69cfa27fc10663::$classMap;
        }, null, ClassLoader::class);
    }
}