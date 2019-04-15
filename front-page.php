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

                    <div class="item1">
                        <div class="greenbox1"></div>
                        
                        <div class="thumbnailfront1" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail('thumbnail-front');?></div>
                        
                       
                        
                                <h1 class="posttitle1" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                        
                        <a class="categorie1"><?php the_category(', '); ?></a>
                            
                                    <h4 class="content1" ><?php the_content(''); ?></h4>
                            
                            
                                    <a id="readmorebutton" class="readmore" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                        
                       
                
                        
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
                    
                    <div class="item2">
                        
                        <div class="thumbnailfront2"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                
                            <h1 class="posttitle2" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                            
                            <h4 class="content2" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore1" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                       
                        
                    
                    
                    <?php elseif ($count == 3) : ?>   
                    
                  <div class="item3">
                        
                        <div class="thumbnailfront3"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                
                            <h1 class="posttitle3" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                            
                            <h4 class="content3" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore3" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                   
        
                    
                        <?php elseif ($count == 4) : ?>   
    
                   <div class="item4">
                        
                        <div class="thumbnailfront4"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_post_thumbnail('thumbnail-frontlow');?></a></div>
                
                            <h1 class="posttitle4" href="<?php the_permalink($id); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h1>
                            
                            <h4 class="content4" ><?php the_content(''); ?></h4>
                               
                            
                            
                            <a id="readmorebutton1" class="readmore4" href="<?php the_permalink($id); ?>">Lees meer</a></div>
                   
               
                            
                    
                    
                    <?php else : ?>

                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
        
         </div>
    
    <div class="trending">
            <h1 class="title-big-trending">Populair</h1>
            <div class="title-under-trending">meest gelezen blogs</div>
        
     
        
      
    </div>
                    
    

        
       
<?php get_footer(); ?>



