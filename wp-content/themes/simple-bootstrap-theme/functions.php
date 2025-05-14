<?php 



//theme style & js file load
function simplebtheme_scripts_load()
{
    //theme custom css file theme.css
    wp_enqueue_style('bootstrap', get_template_directory_uri()."/assets/css/styles.css", array(), '1.0', 'all');

    //theme main file style.css
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), '1.0', 'all');


    // Bootstrap 5 JS (needs Popper for dropdowns)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', [], null, true);

   //custom js file script.js
    wp_enqueue_script('custom.js', get_template_directory_uri()."/assets/js/script.js", array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts','simplebtheme_scripts_load');


//register nav menu
function simplebtheme_menu_register()
{
    register_nav_menus(array(
        'primary_menu' => 'Primary Menu',
        'secondary_menu' => 'Secondary Menu',
        'footer_menu' => 'Footer Menu',
        'left_sidebar_menu' => 'Left Sidebar Menu',
        'right_sidebar_menu' => 'Right Sidebar Menu',
    ));


    //theme support


    // Enable featured images (post thumbnails)
    add_theme_support('post-thumbnails');

    // Enable support for custom logo
    add_theme_support('custom-logo');

    // Enable HTML5 markup for forms, comments, galleries, etc.
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    // Enable support for custom background
    add_theme_support('custom-background');

    // Enable support for custom header
    add_theme_support('custom-header');

     add_theme_support("custom-logo", [
        "height" => 90,
        "width" => 90,
        "flex_height" => true,
        "flex_width" => true,
    ]);


}
add_action("after_setup_theme", "simplebtheme_menu_register");

//woocommerce

// Only run WooCommerce-specific code if WooCommerce is active
if ( class_exists('WooCommerce') ) {

    // Add WooCommerce support to the theme
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,
        'product_grid'          => array(
            'default_rows'    => 4,
            'min_rows'        => 1,
            'max_rows'        => 6,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 6,
        ),
    ));


    add_filter( 'woocommerce_get_image_size_single', 'custom_woocommerce_single_image_size' );
    function custom_woocommerce_single_image_size( $size ) {
        return array(
            'width'  => 300,
            'height' => 300,
            'crop'   => 1,
        );
    }

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Remove WooCommerce sidebar from product details page
    add_action("template_redirect", "details_page_remove_sidebar");
    function details_page_remove_sidebar(){
        if ( ! is_shop() ) {
            remove_action('woocommerce_sidebar','woocommerce_get_sidebar');
        }
    }

    // Optionally hide the default shop page title
    add_filter('woocommerce_show_page_title', 'toggle_page_title');
    function toggle_page_title($val){
        return false;
    }

    // Remove breadcrumbs from archive-product.php
    remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20);

    // Optional: Remove other elements if needed
    // remove_action("woocommerce_before_shop_loop", "woocommerce_result_count", 20);
    // remove_action("woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30);


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'simple_bootstrap_theme_woocommerce_header_add_to_cart_fragment');

function simple_bootstrap_theme_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

    ?>
    <span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<?php
$fragments['span.items-count'] = ob_get_clean();
    return $fragments;
}


}






