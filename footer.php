 <!-- Font awesome import -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">



<body>


<div class="footerimage">
<div class="row">
  <div class="column1">
      
      <h1 class="title-social1">Contact</h1>
    <div class="title-social2">Wine not ?</div>
      <h4 class="content-column1">
          Amber Lukaart<br><a style="color:#000;" href="mailto:info@wijnwuuf.nl">info@wijnwuuf.nl</a><br>
         <br><br> &copy; Wijnwuuf   -   Privacyverklaring
      
      </h4>
    
      
  </div>
  <div class="column2">
      
      <h1 class="title-social1">Alle blogs</h1>
    <div class="title-social2">Per categorie</div>
    <nav>
            <?php 
                    wp_nav_menu( $arg = array (
                        'menu_class' => 'footer-navigation',
                        'theme_location' => 'footer'
                    ));
            ?>
        </nav>
  </div>
  <div class="column3">
      
    <h1 class="title-social1">Volg mij op</h1>
    <div class="title-social2">Social Media</div>
      
<!-- Simple social icons -->
<ul class="icon-effect icon-effect-1a" style="margin-left: -40px;">
  <li><a href="#" class="icon" style="margin-right: 15px;"><i class="fab fa-instagram"></i></a></li>
  <li><a href="#" class="icon"><i class="fa fa-facebook"></i></a></li>
      </ul>
  </div>
   
    

    </div> </div>
   

</body>