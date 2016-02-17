<?php get_header(); ?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <p><em><?php the_date(); ?></em></p>

        <?php the_content(); ?>

    <?php endwhile; else: ?>
      <p><?php _e('Sorry, this page does not exist.'); ?></p>
    <?php endif; ?>
  </div>
</div>
    
<div class="row">
  <div class='col-md-12'>
    <?php if ( is_active_sidebar( 'footer' ) ) : ?>
     <div id="tertiary" class="widget-area" role="supplementary">
      <?php dynamic_sidebar( 'footer' ); ?>
     </div>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>
