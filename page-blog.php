<?php 
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>


<div class="blog-main">
    
   <?php
// Protect against arbitrary paged values
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
 
$args = array(
    'post_type' => 'post',
    'post_status'=>'publish',
    'posts_per_page' => 4,
    'paged' => $paged,
);
 
$the_query = new WP_Query($args);
?>

<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
  <article>
     
        <div class="boxes">
                            
                            <div class="box boxtext">
                        
                            <h1 class="posttitle2" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                        <div class="categorie2" ><?php the_category(', '); ?></div>
                            
                            <h4 class="content2" ><?php the_content(''); ?></h4>
                            
                            <a id="readmorebutton1" class="readmore1" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                            
                            <div class="box boximage">
                             <div data-aos="fade-left" data-aos-duration="1200">
                               <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
	   $image_large_src = wp_get_attachment_image_src( $attachment_id, 'small' );
                ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 840px) 450px, (min-width: 720px) calc(50vw),  (min-width: 320px) calc(90vw - 10vw)"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                            
                            
                            </div>
                       
            </div></div>
    </article>
        

<?php endwhile; ?>
        
<div class="pagecenter">  
<div class="pagination">
        <?php
        echo paginate_links( array(
            'format'  => 'page/%#%',
            'current' => $paged,
            'total'   => $the_query->max_num_pages,
            'mid_size'        => 2,
            'prev_text'       => __('<'),
            'next_text'       => __('>')
        ) );
        ?>
    
    
    </div></div> </div>

<?php endif; ?>
        

        
        
<script>
  AOS.init({
    once: true,
});
</script>
           
        


<?php get_footer(); ?>