<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<?php
$dark_mode = get_theme_mod('enable_dark_mode', false);
$disable_preloader = get_theme_mod('disable_preloader', true);
?>

<body <?php body_class('custom-cursor w-auto p-0 '); ?>>
    <?php wp_body_open(); ?>

    <?php if ($disable_preloader == false) : ?>
        <!-- PRELOADER SPINNER -->
        <!-- <div id="preloader">

        </div> -->
    <?php endif; ?>

    <div class="custom-cursor-one"></div>
    <div class="custom-cursor-two"></div>

    <?php if (get_header_image()) : ?>
        <div id="site-header">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="<?php echo absint(get_custom_header()->width); ?>" height="<?php echo absint(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </a>
        </div>
    <?php else : ?>
        <div class="page">
        <?php get_template_part('template-parts/header/header', nextpro_get_post_meta('header_style', 'style-1'));
    endif; ?>

        <!-- PAGE CONTENT  -->