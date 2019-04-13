<?php
/* The template for the main sidebar */

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    
<script>
   $(function() {
       $(window).onclick(function () {
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

<?php if (is_active_sidebar ('sidebar')): ?>
<aside class="sidebar widget-area">
<?php dynamic_sidebar('sidebar'); ?>

</aside>

<?php endif; ?>