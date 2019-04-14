<?php
/* Template Name: Single page */

get_header();
?>

<? php wpb_set_post_views(get_the_ID()); ?>

<div class="single-main">
            <div class="single-title">
                    <h1><?php echo get_the_title(); ?></h1>
                    
                <main class="single-content">
                    <?php
                        //start the loop
                      if (have_post()) :
                            while (have_posts()):
                                    the_post();
                                        the_content();
                            endwhile;
                        endif;
                    
                    ?>
                    
                    
                    
                </main>
    </div>
    <?php get_sidebar('main-sidebar'); ?>
    
    
</div>

<?php get_footer(); ?>
