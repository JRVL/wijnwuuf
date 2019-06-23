<?php
/* Template Name: Fixed page */

get_header();
?>


<div class="about-main">
            <div class="about-title">
                    <h1><?php echo get_the_title(); ?></h1></div>
                    
                <div class="about-content">
                    <?php
                        //start the loop
                      if (have_posts()) :
                            while (have_posts()):
                                    the_post();
                                        the_content();
                            endwhile;
                        endif;
                    
                    ?>
                    
                    
                    
                </div>
    </div>
    
    
</div>

<?php get_footer(); ?>