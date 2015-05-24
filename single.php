<?php get_header(); ?>

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <p><em><?php the_time('l, F jS, Y'); ?></em></p>

        <?php the_content(); ?>

    <?php endwhile; else: ?>
      <p><?php _e('Sorry, this page does not exist.'); ?></p>
    <?php endif; ?>
  </div>
</div>

<?php
  function tag_names($tags) {
      $tag_names = array();
      foreach($tags as $individual_tag)
        $tag_names[] = $individual_tag->name;
      return implode(", ", $tag_names);
  }
?>

<div class="row related main-row">
  <div class='col-md-4 col-md-offset-4'>
    <h3>Więcej w postów tematyce: <?php echo tag_names(wp_get_post_tags($post->ID)); ?> </h3>
  </div>
</div>

<div class="row main-row">
<?php
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);


    if ($tags) {
        $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args=array(
            'tag__in' => $tag_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page'=>4, // Number of related posts to display.
            'caller_get_posts'=>1
        );

    $my_query = new wp_query( $args );

    $count = 0;

    while( $my_query->have_posts() ) {
      $count++;

      if ($count >= 4) {
        break;
      }

      $my_query->the_post();

      $c = get_the_content('', true);
      $teaser = substr($c, 0, 700);

      $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
      $image = "<a href='".get_the_permalink()."'><div class='image-container' style='background-image: url(".$img_url.");'></div></a>";
      $content = $image."
          <div class='text-container'>
            <a href='".get_the_permalink()."'><h2>".get_the_title()."</h2></a>
            <p>{$teaser}</p>
          </div>
          <div class='more pull-right'>
            <a href='".get_the_permalink()."'>Więcej...</a>
          </div>";

      $post_s = "<div class='col-md-4 col-sm-4 section'>
        <div class='content small-section'>
          {$content}
        </div>
      </div>";

      echo $post_s;
    }
  }

  $post = $orig_post;
  wp_reset_query();
  ?>
</div>
<div class="row main-row">
  <div class='col-md-6 col-md-offset-3'>
    <?php comments_template(); ?>
  </div>
</div>

<?php get_footer(); ?>
