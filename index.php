<?php
/* Main template file*/

    get_header();
?>

<? 
query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC'); 
?>

<div class="main-content-width-wrapper">
            <div class="two-column-entry">
                <h1><div class="title-index"><?php echo get_the_title() ?></div></h1>
                <h5>Geschreven op: <?php echo get_the_date(); ?></h5>
                
                    
                <main class="main-content">
                    <a class="single-thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail(); ?>
                    </a>
                    
                    <?php
                        //start the loop
                      if (have_posts()) :
                            while (have_posts()):
                                    the_post();
                    if ( has_post_thumbnail() ) {
	                           the_post_thumbnail('small');
                                } 
                                        the_content();
                            endwhile;
                        endif;
                    
                    ?>
                    
                    <div class="pagination">
        <?php
        echo paginate_links( array(
            'format'  => 'page/%#%',
            'current' => $paged,
            'total'   => $the_query->max_num_pages,
            'mid_size'        => 2,
            'prev_text'       => __('&laquo; Prev Page'),
            'next_text'       => __('Next Page &raquo;')
        ) );
        ?>
    </div>
                    
                    
                </main>
    </div>
    
    

</div>

<?php get_footer(); ?>
