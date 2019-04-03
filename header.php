<?php
/* Header Template*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="<?php bloginfo('template_url') ?>/style.css" type="text/css" rel=stylesheet>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <a href="index.php"><img src="<?php bloginfo ('template_url') ?>/images/logo.svg" alt="" class="logo"></a>
        <div class="main-navigation-container">
              
            <?php 
                    wp_nav_menu( $arg = array (
                        'menu_class' => 'main-navigation',
                        'theme_location' => 'primary'
                    ))
            ?>
        </div>
    </header>