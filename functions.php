<?php

add_theme_support( 'post-thumbnails' );

function wpbootstrap_scripts_with_jquery()
{
  // Register the script like this for a theme:
  wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
  // For either a plugin or a theme, you can then enqueue the script:
  wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

add_action( 'init', 'register_nav_menu' );

function register_my_menu() {
  register_my_menu( 'my-menu', __( 'Navigation Menu' ) );
}

require_once('wp_bootstrap_navwalker.php');

?>
