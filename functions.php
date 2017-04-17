<?php

add_theme_support( 'post-thumbnails' );

# remove "Sale!"
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

# remove from bottom of product page
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

# remove from top of product page
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

# Remove "SKU" from product details page.
add_filter( 'wc_product_sku_enabled', 'mycode_remove_sku_from_product_page' );
function mycode_remove_sku_from_product_page( $boolean ) {
	if ( is_single() ) {
		$boolean = false;
	}
	return $boolean;
}

function so_maybe_empty_cart( $valid ) {
    if( ( WC()->cart->get_cart_contents_count() != 0) && $valid ){
        WC()->cart->empty_cart();
    }

    return $valid;
}
add_filter( 'woocommerce_add_to_cart_validation', 'so_maybe_empty_cart', 10, 1 );

function wpbootstrap_scripts_with_jquery()
{
  wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
  wp_enqueue_script( 'bootstrap-js' );
  
  wp_register_script( 'scroll-back-to-top', get_template_directory_uri() . '/js/scroll-back-to-top.js', array( 'jquery' ) );
  wp_enqueue_script( 'scroll-back-to-top' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


function register_main_menu() {
  register_nav_menu( 'main-menu', __( 'Main Menu' ) );
}

add_action( 'init', 'register_main_menu' );

function localize_disqus() {
  $two_letter_lang = explode("_", get_locale())[0];

  echo "<script>
    window.disqus_config = function () {
        this.language = '".$two_letter_lang."'
    };
  </script>";
}
add_action( 'wp_enqueue_scripts', 'localize_disqus' );

require_once('wp_bootstrap_navwalker.php');

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function theme_name_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );

show_admin_bar(false);

function shape_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Widget Area', 'shape' ),
        'id' => 'footer',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>',
    ) );
}
add_action( 'widgets_init', 'shape_widgets_init' );

function front_page_widget_init() {
	register_sidebar( array(
		'name' => __( 'Front page widget area', 'shape' ),
		'id' => 'frontpage-widget',
		'before_widget' => '<aside id="%1$s" class="front-page-widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
}
add_action( 'widgets_init', 'front_page_widget_init' );

function naazymut_logo_customizer( $wp_customize ) {
	$wp_customize->add_section( 'naazymut_logo_section' , array(
		'title'       => __( 'Logo', 'naazymut' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );

	$wp_customize->add_setting( 'naazymut_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'naazymut_logo', array(
		'label'    => __( 'Logo', 'naazymut' ),
		'section'  => 'naazymut_logo_section',
		'settings' => 'naazymut_logo',
	) ) );
}
add_action( 'customize_register', 'naazymut_logo_customizer' );

// TRANSLATIONS
pll_register_string('wpbootstrap', 'More');
pll_register_string('wpbootstrap', 'Contact me');

require_once('widgets/featured_page.php');
add_action( 'widgets_init', function() {
	register_widget( 'CoralFeaturedWidget' );
});
?>
