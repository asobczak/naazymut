<html class="no-skrollr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
          <a class="navbar-brand" href="<?php echo get_site_url(); ?>">Na azymut</a>
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

  <div class="container-fluid">
