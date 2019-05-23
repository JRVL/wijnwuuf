<?php
/* Template Name: Single page */

get_header();
?>


<div class="single-main">
    <div class="single-container">
    
            <div class="single-title">
                <h1><?php echo get_the_title(); ?></h1></div>
                <div class="single-date"><h5>Geschreven op: <?php echo get_the_date(); ?></h5></div>
                
                    
                <main class="single-content">
                     
                <div class="single-thumb">    <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
	   $image_large_src = wp_get_attachment_image_src( $attachment_id, 'small' );
                ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 840px) 450px, (min-width: 720px) calc(50vw),  (min-width: 320px) calc(90vw - 10vw)"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                    </div>
                    <div class="single-content"><?php
                        //start the loop
                      if (have_posts()) :
                            while (have_posts()):
                                    the_post();
                                        the_content();
                    
                            endwhile;
                        endif;
                    
                    ?></div>
                    
                    
                    
                </main>
    </div></div>
    <?php get_sidebar('main-sidebar'); ?>
    
    
</div>

<?php get_footer(); ?>
