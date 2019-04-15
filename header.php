<?php
/* Header Template*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/typewriter-effect/dist/core.js"></script>
<script>

   $( document ).ready(function() {
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
<script>
   $(function() {
       $(window).scroll(function () {
           if ($(window).scrollTop() > 5) {
               $('.header').addClass('smaller');
               $('.main-navigation').addClass('navifixed');
               
           }
           
           else {
               $('.header').removeClass('smaller');
               $('.main-navigation').removeClass('navifixed');
           }
       });
   });
    
    

       
    </script>
    
    <script>   
jQuery(document).ready(function($) {
  $(".search_icon").click(function() {
    $(".spicewpsearchform").slideToggle();
  });

  $(document).keydown(function(e) {
    if (e.keyCode == 27) {
      //$(modal_or_menu_element).closeElement();
      $(".spicewpsearchform").hide();
    }
  });
});
       
    </script>
    
    <script>
//TOGGLE FONT AWESOME ON CLICK
$('.search_icon').click(function(){
    $(this).find('i').toggleClass('fa ')
});
$('.search_icon').blur(function(){
    $(this).find('i').toggleClass('fa-plus-square-o fa-2x fa-minus-square-o fa-2x')
});
        
</script>
    
    <meta charset="UTF-8">
    <link href="<?php bloginfo('template_url') ?>/style.css" type="text/css" rel=stylesheet>
    <?php wp_head(); ?>
</head>

<body>
   
    
    <header class="header">
        <a href="#"><img src="<?php bloginfo ('template_url') ?>/images/logo.svg" alt="" class="logo"></a>
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