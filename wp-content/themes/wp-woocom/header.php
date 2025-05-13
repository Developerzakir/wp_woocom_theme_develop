<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title'); ?></title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <section class="site-logo">Logo</section>
        <section class="site-menus">

        <?php

        wp_nav_menu(array(
            'theme_location' =>'primary_menu'
        ));
        
        ?>
                <!-- <nav>
                    <a href="">Home</a>
                    <a href="">About</a>
                    <a href="">Products</a>
                    <a href="">Contact</a>
                </nav> -->
        </section>
    </header>