<?php
/* Header Template*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">




        
        
    
    </script>
    
    <meta charset="UTF-8">
    <link href="<?php bloginfo('template_url') ?>/style.css" type="text/css" rel=stylesheet>
    <?php wp_head(); ?>
</head>

<body>
   
    
  
    
    <header class="header">
        <a href="index.php"><img src="<?php bloginfo ('template_url') ?>/images/logo.svg" alt="" class="logo"></a>
        <div id="main-navigation">
            <?php 
                    wp_nav_menu( $arg = array (
                        'menu_class' => 'main-navigation',
                        'theme_location' => 'primary'
                    ))
            ?> 
   
        </div>
    </header>