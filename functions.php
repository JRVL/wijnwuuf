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
       $items .= '<li class="search"><a class="search_icon"><i class="fas fa-search searchbar"></i></span></a><div style="display:none;" class="spicewpsearchform">'. get_search_form(false) .'</div></li>';
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

/* ADD CUSTOM RESPONSIVE IMAGE SIZES
================================================== */

 
	/**
	 * Configure the "sizes" attribute of images.
	 */
	function wijnwuuf_content_image_sizes_attr($sizes, $size) {
	    $width = $size[0];
	    if ($width > 640) {
	        return '(min-width: 840px) 640px, (min-width: 720px) calc(100vw - 200px), 100vw';
	    } else {
	    	return $sizes;
	    }
	}
	add_filter('wp_calculate_image_sizes', 'wijnwuuf_content_image_sizes_attr', 10 , 2);


function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


add_theme_support( 'post-thumbnails' );

the_post_thumbnail(); // Without parameter ->; Thumbnail
the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
the_post_thumbnail( 'large' ); // Large resolution (default 1024px x 1024px max)
the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
the_post_thumbnail( array( 100, 100 ) ); // Other resolutions (height, width)


?>

