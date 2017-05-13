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
    <?php wp_enqueue_style("font", "https://fonts.googleapis.com/css?family=Roboto&subset=latin,latin-ext"); ?>
    <?php wp_enqueue_style('main', get_template_directory_uri() . '/style.css?v='.time(), array("bootstrap", "font")); ?>
    <?php wp_enqueue_style('font-awesome', get_template_directory_uri() . "/lib/font-awesome-4.7.0/css/font-awesome.min.css", array()); ?>


    <?php wp_head(); ?>
    <title><?php wp_title('|', true, 'right'); ?></title>
  </head>
  <body>

    <nav class="navbar navbar-default navbar-coralnotes navbar-fixed-top">
      <div class="container-fluid navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
              <div class='site-logo'>
                <a class="navbar-brand" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
			<img src='<?php echo bloginfo('stylesheet_directory'); ?>/images/napis_coralnotes.png' class='napis_coralnotes' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                </a>
              </div>
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

          <?php get_search_form(); ?>
        </div>
      </div>
    </nav>
<div style="height: 60px"></div>
