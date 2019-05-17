<?php 
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>

	<article>
        
       <?php
  // set up or arguments for our custom query
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $query_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'paged' => $paged
  );
  // create a new instance of WP_Query
  $the_query = new WP_Query( $query_args );
?>

<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
  <article>
      
        <div class="thumbnailfront2"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
    <h1 class="posttitle2" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                        <div class="categorie2" ><?php the_category(', '); ?></div>
                            
                            <h4 class="content2" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore1" href="<?php the_permalink($id); ?>">Lees meer</a>
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
        
</article>

		

<?php get_footer(); ?>