<?php
/* Template Name: Full-Width Template*/

get_header();
?>

<div class="main-content-width-wrapper">
            <div class="full-width-entry">
                        
                        <div class="thumbnailfront2"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                
                            <h1 class="posttitle2" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                        <div class="categorie2" ><?php the_category(', '); ?></div>
                            
                            <h4 class="content2" ><?php the_content(''); ?></h4>
                              
                    <?php
                        //start the loop
                      if (have_post()) :
                            while (have_posts()):
                                    the_post();
                                        the_content();
                            endwhile;
                        endif;
                    
                    ?>
                            
                            
                            <a id="readmorebutton1" class="readmore1" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                
                
                
                
                    
                
                    
                    
                    
          
    </div>



<?php get_footer(); ?>
