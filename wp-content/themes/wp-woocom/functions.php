<?php 



//theme style & js file load
function wpwoocom_theme_scripts_load()
{
    //theme custom css file theme.css
    wp_enqueue_style('theme-css', get_template_directory_uri()."/assets/css/theme.css", array(), '1.0', 'all');

    //theme main file style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0', 'all');

   //custom js file script.js
    wp_enqueue_script('custom.js', get_template_directory_uri()."/assets/js/script.js", array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts','wpwoocom_theme_scripts_load');


//register nav menu

function wpwoocom_theme_menu_register()
{
    register_nav_menus(array(
        'primary_menu' => 'Primary Menu',
        'footer_menu' => 'Footer Menu',
        'left_sidebar_menu' => 'Left Sidebar Menu',
    ));
}
add_action("after_setup_theme", "wpwoocom_theme_menu_register");