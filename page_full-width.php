<?php
/* Template Name: Overzicht Template*/

get_header();
?>

<div class="main-content-width-wrapper">
            <div class="full-width-entry">
                
            <div class="full-width-title">
                    <h1><?php echo get_the_title(); ?></h1></div>
                    
                <div class="full-width-content">
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
