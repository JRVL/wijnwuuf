<?php
/* Front page Template */

        get_header();
?>


<body>
    
    <div class="home">
        
       
                    
                    <?php if (have_posts()) : ?>
                    <?php $count = 0; ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php $count++; ?>
                    <?php if ($count == 1) : ?>

                    <div class="item1">
                        <div class="greenbox1"></div>
                        
                        <div class="thumbnailfront1" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail('thumbnail-front');?></div>
                        
                       
                        
                                <h1 class="posttitle1" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                        <a class="categorie1"><?php the_category(', '); ?></a>
                            
                                    <h4 class="content1" ><?php the_content(''); ?></h4>
                            
                            
                                    <a id="readmorebutton" class="readmore" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                        
                       
                
                        
        <div class="widgetfront"><?php dynamic_sidebar('sidebar'); ?></div>
		                  

                        
                    <?php elseif ($count == 2) : ?> 
                    
                    <div class="item2">
                        
                        <div class="thumbnailfront2"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                
                            <h1 class="posttitle2" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                            
                            <h4 class="content2" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore1" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                        </div>
                        
                    
                    
                    <?php elseif ($count == 3) : ?>   
                    
                  <div class="item3">
                        
                        <div class="thumbnailfront3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                
                            <h1 class="posttitle3" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                            
                            <h4 class="content3" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore3" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                   
        
                    
                        <?php elseif ($count == 4) : ?>   
    
                   <div class="item4">
                        
                        <div class="thumbnailfront4"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                            <h1 class="posttitle4" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                            
                            <h4 class="content4" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore4" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                   
               
                            
                    
                    
                    <?php else : ?>

                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    
    
    <div class="trending">
                                <h1 class="moreblogs">Meer blogs lezen?</h1>
                             <a id="readmorebutton1" class="readmore4" href="<?php the_permalink($id); ?>">Lees meer</a>
        
        <div class="trendingpost1"><a href="http://localhost:8080/wordpress/?p=19">
	<div class="img-hover-zoom img-hover-zoom--colorize">
<img src="http://localhost:8080/wordpress/wp-content/uploads/2019/04/38627282_259275958240745_6514459077194547200_n1.jpg"  alt="This zooms-in really well and smooth">
</div>
	<h6 class="widget-title">
		Over mij</h6>
<p class="widget-text">Hi! ik ben Amber, het wijnwuuf. Gek op alles wat met wijn heeft te maken. Meer over mij weten? 
</p></a></div>
        
   <div id="slider-food"> 
<?php 
$carousel_cat = get_theme_mod('carousel_setting','1'); 
$carousel_count = get_theme_mod('count_setting','4'); 
$month = date('m'); 
$year = date('Y'); 
$new_query = new WP_Query( array('posts_per_page' => $carousel_count, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC','monthnum'=>$month,'year'=>$year )); 
?> 
<?php if ( $new_query->have_posts() ) : ?> 
<?php while ( $new_query->have_posts() ) : $new_query->the_post(); ?> 
<div class="item"> 
    <?php the_post_thumbnail('popular-posts'); ?>
    <h2><a class="popular-category" 
        <?php 
        $categories = get_the_category(); 
        $separator = ", ";
        $output = '';

        if ($categories) {
            foreach ($categories as $category) {
                $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
            }
            echo trim($output, $separator);
        }

        ?></a></h2>
 <p>
     <a class="popular-excerpt" href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a>
                </p>
</div> 
<?php endwhile; wp_reset_postdata(); ?> 
<?php else : ?> 
<p><?php _e( 'Sorry, No Popular Posts Found ' ); ?></p> 
<?php endif; ?> 
</div>
        
</div>
    
<?php get_footer(); ?>



