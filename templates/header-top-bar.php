<header class="banner contain-to-grid" role="banner">
  <nav class="top-bar" data-topbar role="navigation"> 
    <ul class="title-area"> 
      <li class="name"> 
        <h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1> 
      </li> 
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li> 
    </ul> 

    <section class="top-bar-section"> 
      <?php 
      if (has_nav_menu('primary_navigation')) : 
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'left')); 
      endif; 
      ?> 
    </section> 
  </nav>
</header>