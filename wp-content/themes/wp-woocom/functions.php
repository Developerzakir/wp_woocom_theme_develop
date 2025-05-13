<?php 


function wpwoocom_theme_scripts_load()
{
    //theme custom theme.css
    wp_enqueue_style('theme-css', get_template_directory_uri()."/assets/css/theme.css", array(), '1.0', 'all');

    //theme main style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0', 'all');

}
add_action('wp_enqueue_scripts','wpwoocom_theme_scripts_load');