<?php
/* Header Template*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    jQuery( document ).ready(function() {
var j$ = jQuery,
    $nav = j$(".main-navigation"),
    $slideLine = j$("#slide-line"),
    $currentItem = j$(".current-menu-item");

j$(function(){  
  // Menu has active item
  if ($currentItem[0]) {
    $slideLine.css({
      "width": $currentItem.width(),
      "left": $currentItem.position().left
    });
  }
  
  // Underline transition
  j$($nav).find("li").hover(
    // Hover on
    function(){
      $slideLine.css({
        "width": j$(this).width(),
        "left": j$(this).position().left
      });
    },
    // Hover out
    function(){
      if ($currentItem[0]) {
        // Go back to current
        $slideLine.css({
          "width": $currentItem.width(),
          "left": $currentItem.position().left
        });
      } else {
        // Disapear
        $slideLine.width(0);
      }
    }
   );
});


        
    });
    
    </script>
    
    <meta charset="UTF-8">
    <link href="<?php bloginfo('template_url') ?>/style.css" type="text/css" rel=stylesheet>
    <?php wp_head(); ?>
</head>

<body>
   
    
  
    
    <header class="header">
        <a href="index.php"><img src="<?php bloginfo ('template_url') ?>/images/logo.svg" alt="" class="logo"></a>
        <div class="main-navigation">
            <?php 
                    wp_nav_menu( $arg = array (
                        'menu_class' => 'main-navigation',
                        'theme_location' => 'primary',
                        'link_before' => '<span>',
                        'link_after' => '</span>'
                        
                    ))
            ?> 
             <span id="slide-line"></span>     
        </div>
    </header>