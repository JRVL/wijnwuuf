<?php 
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>

<div class="blog-main">

	<article>
        
       <?php
  // set up or arguments for our custom query
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'paged' => $paged
  );
  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
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

<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
  <nav class="prev-next-posts">
    <div class="prev-posts-link">
      <?php echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link ?>
    </div>
    <div class="next-posts-link">
      <?php echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link ?>
    </div>
  </nav>
<?php } ?>

<?php else: ?>
  <article>
    <h1>Sorry...</h1>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      
     
  </article>
        
<?php endif; ?>
        
        <script>
  AOS.init();
</script>
           
        
</article>

</div>

<?php get_footer(); ?>