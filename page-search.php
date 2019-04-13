<?php
/*
Template Name: Search
*/
 get_header();
?>


<div class="home">
            <div class="two-column-entry">
                <h1><?php echo get_the_title() ?></h1>
                    
                <main class="main-content">
                   zoek berichten
                    
                    <?php get_search_form(); ?>
                    
                </main>
    </div>

</div>

<?php get_footer(); ?>