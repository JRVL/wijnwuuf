<?php
/* Template Name: Single page */

get_header();
?>


<div class="single-main">
    <div class="single-container">
    
            <div class="single-title">
                <h1><?php echo get_the_title(); ?></h1></div>
                <div class="single-date"><h5>Geschreven op: <?php echo get_the_date(); ?></h5></div>
                
                    
                <main class="single-content">
                     
                <div class="single-thumb">
                    <div data-aos="fade-up" data-aos-duration="1200">
            
                        <?php 
	                   // Get this attachment ID
	                       $attachment_id = get_post_thumbnail_id( $post->ID );
	   $image_large_src = wp_get_attachment_image_src( $attachment_id, 'small' );
                ?>
                <img src="<?php echo $image_large_src[0]; ?>"
                  srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'non-cropped-extra-large' ); ?>"
                  sizes="(min-width: 1200px) 56vw ,
            (min-width: 1024px) 56vw ,
            (min-width: 768px) 80vw,
            100vw"
                  alt="<?php get_post_meta( $attachment_id, 'wijnwuuf_wp_attachment_image_alt', true) ?>">
                    </div></div>
                    
                    <div class="single-content"><?php
                        //start the loop
                      if (have_posts()) :
                            while (have_posts()):
                                    the_post();
                                        the_content();
                                
                            endwhile;
                        endif;
                    
                    ?></div>
                   
<script>
  AOS.init();
</script>
                    
                    
                </main>
    </div>
    
    <div class="widget-container-down"><img src="<?php bloginfo ('template_url') ?>/images/wavesdown.svg"  alt="wave" style="width: 100vw; ;"></div>
    <div class="related">
        <h1 class="title-big-trending">Misschien</h1>
        <div class="title-under-trending">vind je dit ook leuk?</div></div>
   <?php $orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) {
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
$args=array(
'tag__in' => $tag_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=>3, // Number of related posts that will be shown.
'ignore_sticky_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '
<div class="relatedcontent">';
while( $my_query->have_posts() ) {
$my_query->the_post();?>

        <div class="related-item img-hover-zoom-trending img-hover-zoom--brightness"> <a href="<?php the_permalink($id); ?>">
         <div class="related-image img-hover-zoom img-hover-zoom--brightness">
               <?php the_post_thumbnail(); ?></div>
             
<div class="related-data" >
    <div class="related-title"><?php the_title(); ?></div>
	<div class="related-cat">
        <h5><?php the_category(', '); ?></h5></div></div></a></div>
<?
}

}
}
$post = $orig_post;
wp_reset_query(); ?>
        
        
</div>


    
    
    


<?php get_footer(); ?>
