<?php
/* Template Name: Full-Width Template*/

get_header();
?>

<div class="main-content-width-wrapper">
            <div class="full-width-entry">
                    <h1><?php echo get_the_title(); ?></h1>
                    
                <main class="main-content">
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

</div>

<?php get_footer(); ?>
