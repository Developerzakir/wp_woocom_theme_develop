<?php 



//theme style & js file load
function simplebtheme_scripts_load()
{
    //theme custom css file theme.css
    wp_enqueue_style('bootstrap', get_template_directory_uri()."/assets/css/styles.css", array(), '1.0', 'all');

    //theme main file style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0', 'all');

   //custom js file script.js
    wp_enqueue_script('custom.js', get_template_directory_uri()."/assets/js/script.js", array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts','simplebtheme_scripts_load');


