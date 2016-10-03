<?php get_header(); ?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
    
	<a href="<?php echo wp_get_attachment_url($post->id); ?>">Pobierz PDF</a>
	<?php endwhile; else: ?>
      <p><?php _e('Sorry, this page does not exist.'); ?></p>
    <?php endif; ?>
  </div>
</div>
    
<?php get_footer(); ?>
