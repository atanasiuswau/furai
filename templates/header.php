<header class="banner" role="banner">
  <div class="row">
    <div class="large-12 columns">
      <nav class="nav-main right" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'inline-list'));
          endif;
        ?>
      </nav>
      <h1><a class="brand" href="<?php echo home_url('/') ?>"><?php bloginfo('name'); ?></a></h1>
    </div>
    <hr>
  </div>
</header>
