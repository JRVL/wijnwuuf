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
    
}
add_action( 'widgets_init', 'wijnwuuf_widget_init');

/* --- Thumbnail sizes --- */

   
add_theme_support('post-thumbnails');
add_image_size('thumbnail-front', 700, 9999, true);
add_image_size('thumbnail-frontlow', 450, 9999, true);
    
add_theme_support('post-formats', array(
    'single','vast',
) );  
     


add_action('init','register_wijnwuuf_menus');

