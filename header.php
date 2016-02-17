<html class="no-skrollr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="6jrH5SaYYSCRbsDJsq8f2ea4WlzVEf9qBkYilu_bcF4" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>

    <?php wp_enqueue_style("bootstrap", "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"); ?>
    <?php wp_enqueue_style("font", 'http://fonts.googleapis.com/css?family=EB+Garamond&subset=latin,latin-ext'); ?>
    <?php wp_enqueue_style('main', get_template_directory_uri() . '/style.css?v='.time(), array("bootstrap", "font")); ?> 
    
    <?php wp_head(); ?>
    <title><?php wp_title('|', true, 'right'); ?></title>
  </head>
  <body>

    <nav class="navbar navbar-default navbar-naazymut">
      <div class="container-fluid navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <?php if ( get_theme_mod( 'naazymut_logo' ) ) : ?>
              <div class='site-logo'>
                <a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'naazymut_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
              </div>
            <?php else : ?>
              <a class="navbar-brand" href="<?php echo get_site_url(); ?>">Na azymut</a>
            <?php endif; ?>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'main-menu',
	      'depth' => 2,
              'container' => false,
              'menu_class' => 'nav navbar-nav navbar-right',
              'walker' => new wp_bootstrap_navwalker()
            )
            );
          ?>
        </div>
      </div>
    </nav>
