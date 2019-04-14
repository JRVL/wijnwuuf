<?php

if (!function_exists ('wijnwuuf_setup')):

    function wijnwuuf_setup() {
        // let wordpress handle the Titles tags
        add_theme_support('title-tag');
        
        
    }
endif;
add_action('after_setup_theme','wijnwuuf_setup');

/* --- Register menus --- */

function register_wijnwuuf_menus() {
    register_nav_menus(
    array(
        'primary' => __('Primary Menu'),
        'footer' =>__('Footer Menu')
    )
    );
    
}
add_action('init','register_wijnwuuf_menus');

add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

/* -- font awesome -- */
function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}


/* -- search form -- */

add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);

// Display search icon in menus and toggle search form 
function add_search_form($items, $args) {
if( $args->theme_location == 'primary' )
       $items .= '<li class="search"><a class="search_icon"><span class="spicewpsearch_icon"></span></a><div style="display:none;" class="spicewpsearchform">'. get_search_form(false) .'</div></li>';
       return $items;
}

/* --- Add Stylesheets --- */

// Enqueue Main Stylesheet
function wijnwuuf_scripts() {
    wp_enqueue_style('wijnwuuf_styles',get_stylesheet_uri() );
    // Enqueue Google fonts, Raleway
    wp_enqueue_style('wijnwuuf_google_fonts', 'https://fonts.googleapis.com/css?family=Raleway:300,400,400i,700');
    
}
add_action('wijnwuuf_enqueue_scripts','wijnwuuf_scripts');

/* --- Register Widget Areas --- */

function wijnwuuf_widget_init() {
    register_sidebar( array (
    'name' => __('Sidebar','wijnwuuf'),
        'id' => 'Sidebar',
        'description' => __('De widgets die je hier plaatst worden in de sidebar aan de rechterkant geplaatst. In het template van de 2 kolommen', 'wijnwuuf'), 'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>', 
        'before_title' => '<h2 class="widget-title">', 
        'after_title' => '</h2>'
    ));
    
     register_sidebar( array (
    'name' => __('right','wijnwuuf'),
        'id' => 'right',
        'description' => __('De widgets die je hier plaatst worden in de sidebar aan de rechterkant geplaatst. In het template van de 2 kolommen', 'wijnwuuf'), 'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>', 
        'before_title' => '<h2 class="widget-title">', 
        'after_title' => '</h2>'
    ));
    
}
add_action( 'widgets_init', 'wijnwuuf_widget_init');



/* --- Thumbnail sizes --- */

   
add_theme_support('post-thumbnails');
add_image_size('thumbnail-front', 600, 9999, true);
add_image_size('thumbnail-frontlow', 450, 9999, true);

    
add_theme_support('post-formats', array(
    'single','vast',
) );  
     


add_action('init','register_wijnwuuf_menus');

