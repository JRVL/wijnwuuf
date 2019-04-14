<?php
/* Main template file*/

    get_header();
?>

<div class="main-content-width-wrapper">
            <div class="two-column-entry">
                <h1><div class="title-index"><?php echo get_the_title() ?></div></h1>
                <h5>Geschreven op: <?php echo get_the_date(); ?></h5>
                    
                <main class="main-content">
                    <?php
                        //start the loop
                      if (have_posts()) :
                            while (have_posts()):
                                    the_post();
                    if ( has_post_thumbnail() ) {
	                           the_post_thumbnail('medium_large');
                                } 
                                        the_content();
                            endwhile;
                        endif;
                    
                    ?>
                    
                    
                    
                </main>
    </div>
    
    <div class="widgetfront-right"><?php dynamic_sidebar('right'); ?></div>

</div>

<?php get_footer(); ?>
