<?php

if (!function_exists ('wijnwuuf_setup')):

    function wijnwuuf_setup() {
        // let wordpress handle the Titles tags
        add_theme_support('title-tag');
        
        
    }
endif;
add_action('after_setup_theme','wijnwuuf_setup');

/* --- Register menus --- */
class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}

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
    
     register_sidebar( array (
    'name' => __('instagram','wijnwuuf'),
        'id' => 'instagram',
        'description' => __('instagram', 'wijnwuuf'), 'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>', 
        'before_title' => '<h2 class="widget-title">', 
        'after_title' => '</h2>'
    ));
    
}
add_action( 'widgets_init', 'wijnwuuf_widget_init');



the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( '&laquo; Prev', 'textdomain' ),
    'next_text' => __( 'Next &raquo;', 'textdomain' ),
) );


/* --- Thumbnail sizes --- */
function shapeSpace_popular_posts($post_id) {
	$count_key = 'popular_posts';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
function shapeSpace_track_posts($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');

/* WALKER MENU
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

