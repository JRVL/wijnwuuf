<?php
/* Front page Template */

        get_header();
?>


<body>
   
    <div class="home">
        
       
                    
                    <?php if (have_posts()) : ?>
                    <?php $count = 0; ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php $count++; ?>
                    <?php if ($count == 1) : ?>

                    
        <div>
                 <div class="boxestop">  
                        
                        <div class="boxtop boxtexttop">
                         <div data-aos="fade-right" data-aos-duration="1200">
                                <h1 class="posttitle1"  href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                                    <div class="categorie1"><?php the_category(', '); ?></div>
                            
                                    <h4 class="content1" ><?php the_content(''); ?></h4>
                            
                                    <div class="button-wrap">
                                    <a id="readmorebutton" class="readmore" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                             </div>
                                    </div>
                     
                      <div class="boxtop boximagetop">
                        <div data-aos="fade-up" data-aos-duration="1200" >
                            <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
                            $image_large_src = wp_get_attachment_image_src( $attachment_id, 'large' );
                            ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 1200px) 638px, (min-width: 992px) 438px, (min-width: 768px) 360px,  (min-width: 320px) 120px"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                         </div></div>
                     
                     
                                </div>
                            </div>
                        </div>
                       </div>
                
                        
        <div class="widgetfront">
            <h1 class="title-big">Welkom</h1>
            <div class="title-under">op mijn blog</div>
            <h1 class="title-second">Lees alles over</h1><div id="typewriter"></div>
 
 <script>
 var app = document.getElementById('typewriter');
 
 var typewriter = new Typewriter(app, {
     loop: true
 });
 
 typewriter.typeString('wijn')
     .pauseFor(300)
     .deleteAll(100)
     .typeString('supermarkt reviews')
     .pauseFor(500)
     .deleteAll()
     .typeString('wijn en slijs')
     .pauseFor(200)
     .deleteChars(4)
     .typeString('pijs')
     .pauseFor(500)
     .deleteAll()
     .typeString('een wijnproeverij bij jou thuis')
     .pauseFor(500)
     .start();
 </script>
            
          <?php dynamic_sidebar('sidebar'); ?></div>
    
		                  

                        
                    <?php elseif ($count == 2) : ?> 
             
                        <div class="boxes">
                            
                            <div class="box boxtext">
                        
                            <h1 class="posttitle2" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                        <div class="categorie2" ><?php the_category(', '); ?></div>
                            
                            <h4 class="content2" ><?php the_content(''); ?></h4>
                            
                            <a id="readmorebutton1" class="readmore1" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                            
                            <div class="box boximage">
                             <div data-aos="fade-left" data-aos-duration="1200">
                               <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
	   $image_large_src = wp_get_attachment_image_src( $attachment_id, 'small' );
                ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 840px) 450px, (min-width: 720px) calc(50vw),  (min-width: 320px) calc(90vw - 10vw)"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                            
                            
                            </div>
                       
                        </div></div>
                    
                    
                    <?php elseif ($count == 3) : ?>   
                    
       
            
                <div class="boxes-middle">
                    
                        <div class="box boximage-middle">
                        <div data-aos="fade-right" data-aos-duration="1200">   <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
	   $image_large_src = wp_get_attachment_image_src( $attachment_id, 'small' );
                ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 840px) 450px, (min-width: 720px) calc(50vw),  (min-width: 320px) calc(90vw - 10vw)"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                            </div></div>
                    
                <div class="box boxtext-middle">
                            <h1 class="posttitle3" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                      
                      <div class="categorie3" ><?php the_category(', '); ?></div>
                            
                            <h4 class="content3" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore3" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                   
    </div>
                    
                        <?php elseif ($count == 4) : ?>   
                
               <div class="boxes">
                   
                   
                   <div class="box boxtext">
                            <h1 class="posttitle4" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                       
                       <div class="categorie4" ><?php the_category(', '); ?></div>                          
                       <h4 class="content4" ><?php the_content(''); ?></h4>
                            <a id="readmorebutton1" class="readmore4" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                   
                   
                        
                    <div class="box boximage">
                        <div data-aos="fade-left" data-aos-duration="1200">
                               <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
	   $image_large_src = wp_get_attachment_image_src( $attachment_id, 'small' );
                ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 840px) 450px, (min-width: 720px) calc(50vw),  (min-width: 320px) calc(90vw - 10vw)"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                
                           
                   </div>
               
                            
                    
                    
                    <?php else : ?>

                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
        
                   </div></div>
 
    
    
    <div class="trending">
            <h1 class="title-big-trending">Populair</h1>
            <div class="title-under-trending">meest gelezen blogs</div>
        
    <script>
  AOS.init({
    once: true,
});
</script>
        
      
    </div>
                    
    

        
       
<?php get_footer(); ?>



