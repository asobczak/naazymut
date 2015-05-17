<?php get_header(); ?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <p><em><?php the_time('l, F jS, Y'); ?></em></p>

        <?php the_content(); ?>

        <hr>
      <?php comments_template(); ?>

    <?php endwhile; else: ?>
      <p><?php _e('Sorry, this page does not exist.'); ?></p>
    <?php endif; ?>
  </div>
</div>

<div class="row">
  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
