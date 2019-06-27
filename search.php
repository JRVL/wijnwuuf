<?php
/*
Template Name: Search
*/
 get_header();
?>

<section class="searcharticle" id="post-<php the_ID(); ?>" <?php post_class(); ?>>
    
     <div class="searchhead">
            <h1 class="title-big-search">Zoeken</h1>
         <div class="title-under-search">op Wijnwuuf</div>
        
			<?php get_search_form('searchpage'); ?> </div>
    

    <div class="searchhome">
    <?php
$s=get_search_query();
$args = array(
    'posts_per_page' => 100,
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
        _e("<h5 style='font-weight:400;color:#000; text-align: center; margin: 50px;'>Resultaten voor: ".get_query_var('s')."</h5>");
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
    ?> 
    
    <div class="searchitem"><a href="<?php the_permalink($id); ?>">
    <div class="searchthumb img-hover-zoom img-hover-zoom--brightness"> <a href="<?php the_permalink($id); ?>">
         <div class="searchthumb img-hover-zoom img-hover-zoom--brightness">
               <?php the_post_thumbnail(); ?></div>
        
        
                    <div class="searchcontent">
                    <h1 class="posttitle-search" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_excerpt( get_the_title() ); ?></h1>
                        
                        <div class="categorie-search" ><?php the_category(', '); ?></div>
                            
        <h4 class="content-search" ><?php the_excerpt(); ?></h4>
                            
        </div>  </a></div> </a></div>
                    
                 <?php
        }
    }else{
?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
    </div>

</section>



<?php get_footer(); ?>